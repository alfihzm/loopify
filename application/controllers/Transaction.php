<?php
class Transaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('TransactionModel');
        $this->load->language('form_validation', 'indonesian');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = [
            'judul' => "Data Transaksi Penyerahan Sampah",
            'transaksi' => $this->TransactionModel->getTransaction(),
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->form_validation->set_rules('id_member', 'ID Member', 'required', [
            'required' => 'ID Member wajib diisi!',
        ]);
        $this->form_validation->set_rules('tanggal', 'Tanggal Penukaran', 'required', [
            'required' => 'Tanggal wajib diisi!',
        ]);
        $this->form_validation->set_rules('jumlah_botol', 'Jumlah Botol', 'required|numeric', [
            'required' => 'Jumlah botol wajib diisi!',
            'numeric' => 'Jumlah botol harus berupa angka!',
        ]);
        $this->form_validation->set_rules('jumlah_kaleng', 'Jumlah Kaleng', 'required|numeric', [
            'required' => 'Jumlah kaleng wajib diisi!',
            'numeric' => 'Jumlah kaleng harus berupa angka!',
        ]);
        $this->form_validation->set_rules('jumlah_kardus', 'Jumlah Kardus', 'required|numeric', [
            'required' => 'Jumlah kardus wajib diisi!',
            'numeric' => 'Jumlah kardus harus berupa angka!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view("admin/transaction/index", $data);
            $this->load->view("templates/admin/footer");
        } else {
            // Memeriksa apakah ID Member ada dalam tabel user
            $id_member = $this->input->post('id_member');
            $userData = $this->db->get_where('user', ['id_member' => $id_member])->row_array();
            if (!$userData) {
                // Jika ID Member tidak ditemukan, tampilkan pesan kesalahan dan redirect kembali
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID Member tidak ditemukan! Periksa kembali ID Member!</div>');
                redirect('transaction');
            }

            $jumlah_botol = $this->input->post('jumlah_botol');
            $jumlah_kaleng = $this->input->post('jumlah_kaleng');
            $jumlah_kardus = $this->input->post('jumlah_kardus');

            // Ambil kapasitas penyimpanan dari database
            $kapasitas_botol = $this->db->get_where('sampah', ['id' => 1])->row()->kapasitas;
            $kapasitas_kaleng = $this->db->get_where('sampah', ['id' => 2])->row()->kapasitas;
            $kapasitas_kardus = $this->db->get_where('sampah', ['id' => 3])->row()->kapasitas;

            // Cek apakah jumlah input melebihi kapasitas
            if ($jumlah_botol > $kapasitas_botol || $jumlah_kaleng > $kapasitas_kaleng || $jumlah_kardus > $kapasitas_kardus) {
                // Jika melebihi kapasitas, tampilkan pesan kesalahan dan redirect kembali
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal transaksi, jumlah melebihi kapasitas gudang!</div>');
                redirect('transaction');
            }

            $harga_botol = $this->db->get_where('sampah', ['id' => 1])->row()->nilai_tukar;
            $harga_kaleng = $this->db->get_where('sampah', ['id' => 2])->row()->nilai_tukar;
            $harga_kardus = $this->db->get_where('sampah', ['id' => 3])->row()->nilai_tukar;
            $totalkoin = ($jumlah_botol * $harga_botol) + ($jumlah_kaleng * $harga_kaleng) + ($jumlah_kardus * $harga_kardus);

            // Update nilai koin dalam tabel user
            $this->db->where('id_member', $id_member);
            $this->db->set('koin', 'koin+' . $totalkoin, FALSE); // Menambahkan nilai baru ke koin
            $this->db->update('user');

            $dataTransaction = [
                'id_member' => $id_member,
                'tanggal'  => $this->input->post('tanggal'),
                'username' => $userData['username'], // Ambil username dari data user yang ditemukan
                'jumlah_botol' => $jumlah_botol,
                'jumlah_kaleng' => $jumlah_kaleng,
                'jumlah_kardus' => $jumlah_kardus,
                'total' => $jumlah_botol + $jumlah_kaleng + $jumlah_kardus,
                'totalkoin' => $totalkoin,
                'lokasi' => $this->input->post('lokasi'),
                'catatan' => $this->input->post('catatan'),
                'status' => 'Belum dikonfirmasi',
            ];

            $this->load->model('TransactionModel');
            $this->TransactionModel->newTransaction($dataTransaction);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi pengguna telah berhasil ditambahkan!</div>');
            redirect('transaction');
        }
    }


    public function getUsernameByIdMember()
    {
        $id_member = $this->input->post('id_member');
        $user = $this->db->get_where('user', ['id_member' => $id_member])->row_array();

        if ($user) {
            echo json_encode(['username' => $user['username']]);
        } else {
            echo json_encode(['username' => '']);
        }
    }


    public function updatetransaction($id)
    {
        $status = 'Sudah dikonfirmasi';
        $tgl_validasi = date('Y-m-d');
        $this->load->model('TransactionModel');
        $this->TransactionModel->updatetransaction($id, $status, $tgl_validasi);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Penyerahan sudah terkonfirmasi!</div>');
        redirect('transaction');
    }

    public function delete_transaksi($id)
    {
        $this->load->model('TransactionModel');
        $deleted = $this->TransactionModel->delete_transaction($id);
        if ($deleted) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi berhasil dihilangkan</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Transaksi gagal dihilangkan!</div>');
        }
        redirect('transaction');
    }

    public function edit_transaction($id)
    {
        $transaction = $this->TransactionModel->getTransactionById($id);

        if (!$transaction) {
            redirect('transaction');
        }

        $username = $transaction['username'];

        $judul = 'Edit Transaksi milik ' . $username;
        $data = [
            'transaction' => $transaction,
            'user'  => $this->db->get_where('user', ['username' => $username])->row_array(),
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'judul' => $judul
        ];

        $jumlah_botol = $this->input->post('jumlah_botol');
        $jumlah_kaleng = $this->input->post('jumlah_kaleng');
        $jumlah_kardus = $this->input->post('jumlah_kardus');

        $harga_botol = $this->db->get_where('sampah', ['id' => 1])->row()->nilai_tukar;
        $harga_kaleng = $this->db->get_where('sampah', ['id' => 2])->row()->nilai_tukar;
        $harga_kardus = $this->db->get_where('sampah', ['id' => 3])->row()->nilai_tukar;
        $totalkoin = ($jumlah_botol * $harga_botol) + ($jumlah_kaleng * $harga_kaleng) + ($jumlah_kardus * $harga_kardus);

        $this->form_validation->set_rules('id_member', 'ID Member', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view('admin/transaction/edit_transaction', $data);
            $this->load->view("templates/admin/footer");
        } else {
            $transactionData = [
                'id_member' => htmlspecialchars($this->input->post('id_member')),
                'username' => htmlspecialchars($this->input->post('username')),
                'tanggal' => htmlspecialchars($this->input->post('tanggal')),
                'jumlah_botol' => htmlspecialchars($this->input->post('jumlah_botol')),
                'jumlah_kaleng' => htmlspecialchars($this->input->post('jumlah_kaleng')),
                'jumlah_kardus' => htmlspecialchars($this->input->post('jumlah_kardus')),
                'total' => $jumlah_botol + $jumlah_kaleng + $jumlah_kardus,
                'totalkoin' => $totalkoin,
                'lokasi' => $this->input->post('lokasi'),
                'catatan' => $this->input->post('catatan')
            ];

            $this->TransactionModel->editTransaction($id, $transactionData);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data transaksi telah diubah</div>');
            redirect('transaction');
        }
    }

    public function info_transaction($id)
    {
        $transaction = $this->TransactionModel->getTransactionById($id);

        if ($transaction) {
            $username = $transaction['username'];
            $judul = 'Detail Transaksi milik ' . $username;

            $data = [
                'transaction' => $transaction,
                'user'  => $this->db->get_where('user', ['username' => $username])->row_array(),
                'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
                'judul' => $judul
            ];

            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view('admin/transaction/info_transaction', $data);
            $this->load->view("templates/admin/footer");
        } else {
            redirect('transaction');
        }
    }
}
