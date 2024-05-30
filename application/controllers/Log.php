<?php
class Log extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('WithdrawModel');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function transaction()
    {
        $data = [
            'judul' => "Log Transaksi Penyerahan Sampah",
            'transaction' => $this->TransactionModel->getTransaction(),
            'withdraw' => $this->WithdrawModel->getWithdraw(),
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view("templates/admin/header", $data);
        $this->load->view("templates/admin/sidebar", $data);
        $this->load->view("templates/admin/topbar", $data);
        $this->load->view("admin/log/transaction", $data);
        $this->load->view("templates/admin/footer");
    }

    
}
