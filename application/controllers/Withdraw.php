<?php
class Withdraw extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('WithdrawModel');
        $this->load->model('FinanceModel');
        $this->load->model('UserModel');
        $this->load->language('form_validation', 'indonesian');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = [
            'judul' => "Data Transaksi Penarikan Tunai",
            'withdraw' => $this->WithdrawModel->getWithdraw(),
            'finance' => $this->FinanceModel->getFinance(),
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->form_validation->set_rules('id_member', 'ID Member', 'required', [
            'required' => 'ID Member wajib diisi!',
        ]);
        $this->form_validation->set_rules('nominal', 'Nominal', 'required', [
            'required' => 'Nominal wajib diisi!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view("admin/withdraw/index", $data);
            $this->load->view("templates/admin/footer");
        } else {
            $nominal = $this->input->post('nominal');
            $id_member = $this->input->post('id_member');

            // Memeriksa apakah ID Member ada dalam tabel user
            $userData = $this->db->get_where('user', ['id_member' => $id_member])->row_array();
            if (!$userData) {
                // Jika ID Member tidak ditemukan, tampilkan pesan kesalahan dan redirect kembali
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID Member tidak ditemukan! Periksa kembali ID Member!</div>');
                redirect('withdraw');
            }

            // Mendapatkan data user berdasarkan ID Member
            $userData = $this->db->get_where('user', ['id_member' => $id_member])->row_array();

            // Mendapatkan data finance dengan id 2
            $financeData = $this->db->get_where('finance', ['id' => 2])->row_array();

            // Mengurangi nilai koin sesuai dengan nominal yang diinput
            $koinSekarang = $userData['koin'] - $nominal;

            // Memastikan koin tidak kurang dari 0
            if ($koinSekarang < 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Koin tidak mencukupi untuk melakukan transaksi!</div>');
                redirect('withdraw');
            }

            // Memeriksa apakah saldo mencukupi untuk dikurangi
            $saldoSekarang = $financeData['saldo'] - $nominal;
            if ($saldoSekarang < 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Saldo arus kas perusahaan tidak mencukupi untuk melakukan transaksi!</div>');
                redirect('withdraw');
            }

            // Update nilai koin pada tabel user
            $this->db->where('id_member', $id_member);
            $this->db->update('user', ['koin' => $koinSekarang]);

            // Update nilai saldo pada tabel finance
            $this->db->where('id', 2);
            $this->db->update('finance', ['saldo' => $saldoSekarang]);

            // Ini status
            $metode = $this->input->post('metode');
            $status = '';

            if ($metode == 'Tunai') {
                $status = 'Diberikan tunai';
            } elseif ($metode == 'Transfer Bank') {
                $status = 'Sudah ditransfer';
            }

            // Menyiapkan data untuk transaksi penarikan tunai
            $dataWithdraw = [
                'id_member' => $this->input->post('id_member'),
                'username' => $this->input->post('username'),
                'koin1' => $userData['koin'],
                'koin2' => $koinSekarang,
                'nominal' => $nominal,
                'jam' => date('H:i:s'),
                'tanggal' => date('Y-m-d'),
                'metode'  => $metode,
                'lokasi'  => $this->input->post('lokasi'),
                'catatan'  => $this->input->post('catatan'),
                'petugas' => $data['user']['username'],
                'status' => $status
            ];

            // Memasukkan data transaksi penarikan tunai ke dalam database
            $this->load->model('WithdrawModel');
            $this->WithdrawModel->newWithdraw($dataWithdraw);

            // Memberikan pesan sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi tarik tunai telah berhasil ditambahkan!</div>');
            redirect('withdraw');
        }
    }

    public function getUserDataByIdMember()
    {
        $id_member = $this->input->post('id_member');
        $user = $this->db->get_where('user', ['id_member' => $id_member])->row_array();

        if ($user) {
            echo json_encode([
                'username' => $user['username'],
                'koin' => $user['koin']
            ]);
        } else {
            echo json_encode(['username' => '', 'koin' => '']);
        }
    }

    public function delete_withdraw($id)
    {
        $this->load->model('WithdrawModel');
        $deleted = $this->WithdrawModel->delete_withdraw($id);
        if ($deleted) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi berhasil dihilangkan</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Transaksi gagal dihilangkan!</div>');
        }
        redirect('withdraw');
    }

    public function info_withdraw($id)
    {
        $withdraw = $this->WithdrawModel->getwithdrawById($id);

        if ($withdraw) {
            $username = $withdraw['username'];
            $judul = 'Detail Transaksi milik ' . $username;

            $data = [
                'withdraw' => $withdraw,
                'user'  => $this->db->get_where('user', ['username' => $username])->row_array(),
                'judul' => $judul
            ];

            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view('admin/withdraw/info_withdraw', $data);
            $this->load->view("templates/admin/footer");
        } else {
            // $withdrawData = [
            //     'jenis_sampah' => htmlspecialchars($this->input->post('jenis_sampah')),
            //     'nilai_tukar' => htmlspecialchars($this->input->post('nilai_tukar'))
            // ];
            // $this->withdrawModel->editwithdraw($id, $withdrawData);
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data transaksi telah diubah</div>');
            redirect('withdraw');
        }
    }
    public function receipt($id)
    {
        $withdraw = $this->WithdrawModel->getwithdrawById($id);
        $date = new DateTime($withdraw['tanggal']);
        $withdraw['formatted_tanggal'] = $date->format('d F Y');

        $data = [
            'withdraw' => $withdraw,
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/recyloop/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();

        $html = $this->load->view('admin/withdraw/receipt', $data, TRUE);

        $options = $dompdf->getOptions();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf->setOptions($options);

        $paper_size = 'A4';
        $orientation = 'landscape';

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("receipt-withdraw-{$withdraw['username']}.pdf", array('Attachment' => 0));
    }
}
