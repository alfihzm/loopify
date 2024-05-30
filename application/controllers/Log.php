<?php
class Log extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('WithdrawModel');
        $this->load->model('TransactionModel');
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
            $this->load->view('admin/log/info_transaction', $data);
            $this->load->view("templates/admin/footer");
        } else {
            redirect('log/transaction');
        }
    }
}
