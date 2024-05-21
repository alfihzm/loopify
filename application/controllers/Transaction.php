<?php
class Transaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('TransactionModel');
        $this->load->language('form_validation', 'indonesian');
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


        if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view("admin/transaction/index", $data);
            $this->load->view("templates/admin/footer");
        } else {
            $jumlah_botol = $this->input->post('jumlah_botol');
            $jumlah_kaleng = $this->input->post('jumlah_kaleng');
            $jumlah_kardus = $this->input->post('jumlah_kardus');

            $harga_botol = $this->db->get_where('sampah', ['id' => 1])->row()->nilai_tukar;
            $harga_kaleng = $this->db->get_where('sampah', ['id' => 2])->row()->nilai_tukar;
            $harga_kardus = $this->db->get_where('sampah', ['id' => 3])->row()->nilai_tukar;
            $totalkoin = ($jumlah_botol * $harga_botol) + ($jumlah_kaleng * $harga_kaleng) + ($jumlah_kardus * $harga_kardus);

            $dataTransaction = [
                'id_member' => $this->input->post('id_member'),
                'tanggal'  => $this->input->post('tanggal'),
                'username' => $this->input->post('username'),
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
        $this->load->model('TransactionModel');
        $this->TransactionModel->updatetransaction($id, $status);
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
        $data['transaction'] = $this->TransactionModel->getTransactionById($id);
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data = array_merge($data, [
            'user'  => $user,
            'judul' => 'Edit Transaksi milik ' . $user['username']
        ]);

        // $this->form_validation->set_rules('jenis_sampah', 'Jenis Sampah', 'required', [
        //     'required' => 'Masukkan Jenis Sampah dengan benar',
        // ]);
        // $this->form_validation->set_rules('nilai_tukar', 'Nilai Tukar', 'required|integer', [
        //     'required' => 'Masukkan Nilai Tukar dengan benar',
        //     'integer'  => 'Nilai Tukar Sampah hanya bernilai angka',
        // ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view('admin/transaction/edit_transaction', $data);
            $this->load->view("templates/admin/footer");
        } else {
            $transactionData = [
                'jenis_sampah' => htmlspecialchars($this->input->post('jenis_sampah')),
                'nilai_tukar' => htmlspecialchars($this->input->post('nilai_tukar'))
            ];
            $this->TransactionModel->editTransaction($id, $transactionData);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data transaksi telah diubah</div>');
            redirect('transaction');
        }
    }
}
