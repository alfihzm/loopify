<?php
class Withdraw extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('WithdrawModel');
        $this->load->language('form_validation', 'indonesian');
    }

    public function index()
    {
        $data = [
            'judul' => "Data Transaksi Penarikan Tunai",
            'transaksi' => $this->WithdrawModel->getWithdraw(),
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

         if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view("admin/withdraw/index", $data);
            $this->load->view("templates/admin/footer");
        } else {
            $dataWithdraw = [
                'id_member' => $this->input->post('id_member'),
                'tanggal'  => $this->input->post('tanggal'),
                'username' => $this->input->post('username'),
                'lokasi' => $this->input->post('lokasi'),
                'catatan' => $this->input->post('catatan'),
                'status' => 'Belum dikonfirmasi',
            ];


            $this->load->model('WithdrawModel');
            $this->TransactionModel->newTransaction($dataWithdraw);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi tarik tunai telah berhasil ditambahkan!</div>');
            redirect('withdraw');
        }
    }
}
