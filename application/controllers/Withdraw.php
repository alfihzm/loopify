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
            $dataWithdraw = [
                'id_member' => $this->input->post('id_member'),
                'username' => $this->input->post('username'),
                'nominal' => $this->input->post('nominal'),
                'jam' => date('H:i:s'),
                'tanggal' => date('Y-m-d'),
                'metode'  => $this->input->post('metode'),
                'lokasi'  => $this->input->post('lokasi'),
                'catatan'  => $this->input->post('catatan'),
                'status' => 'Belum diproses'
            ];


            $this->load->model('WithdrawModel');
            $this->WithdrawModel->newWithdraw($dataWithdraw);
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
                'koin' => $user['koin'] // tambahkan koin ke respon JSON
            ]);
        } else {
            echo json_encode(['username' => '', 'koin' => '']);
        }
    }
}
