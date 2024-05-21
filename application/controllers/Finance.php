<?php
class Finance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('FinanceModel');
        $this->load->language('form_validation', 'indonesian');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $finance1 = $this->FinanceModel->getFinanceById(1);
        $finance2 = $this->FinanceModel->getFinanceById(2);

        $data = [
            'judul' => "Data Keuangan Internal",
            'transaksi' => $this->FinanceModel->getFinance(),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'saldoModalAwal' => $finance1['saldo'],
            'tgl_update1' => $finance1['tgl_update'],
            'jam_update1' => $finance1['jam_update'],
            'username_update1' => $finance1['username'],
            'saldoKasSaatIni' => $finance2['saldo'],
            'tgl_update2' => $finance2['tgl_update'],
            'jam_update2' => $finance2['jam_update'],
            'username_update2' => $finance2['username']
        ];

        $this->form_validation->set_rules('saldo', 'Saldo', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view("admin/finance/index", $data);
            $this->load->view("templates/admin/footer");
        } else {
            $id = $this->input->post('id');
            $dataFinance = [
                'saldo' => $this->input->post('saldo'),
                'tgl_update' => date('Y-m-d'),
                'jam_update' => date('H:i:s'),
                'username' => $this->session->userdata('username'),
            ];

            if ($this->FinanceModel->updateFinance($id, $dataFinance)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data keuangan telah diperbarui!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal memperbarui data keuangan!</div>');
            }
            redirect('finance');
        }
    }

    public function tambahSaldo()
    {
        $id = $this->input->post('id');
        $jumlah = $this->input->post('jumlah');

        if ($this->FinanceModel->tambahSaldo($id, $jumlah)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Saldo berhasil ditambahkan!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan saldo!</div>');
        }
        redirect('finance');
    }
}
