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
            'judul' => "Transaksi Penyerahan Sampah",
            'transaksi' => $this->TransactionModel->getTransaction(),
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->form_validation->set_rules('judul', 'announcement', 'required');
        $this->form_validation->set_rules('deskripsi', 'announcement', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view("admin/transaction/index", $data);
            $this->load->view("templates/admin/footer");
        } else {
            $dataTransaction = [
                'jenis_sampah' => $this->input->post('jenis_sampah'),
                'nilai_tukar'  => $this->input->post('nilai_tukar'),
            ];

            $this->load->model('TransactionModel');
            $this->TransactionModel->newTransaction($dataTransaction);

            #Ini coding dari WP II jangan diapa-apain
            // $this->db->insert('announcement', [
            //     'judul' => $this->input->post('judul'),
            //     'deskripsi' => $this->input->post('deskripsi'),
            //     'tanggal' => $this->input->post('tanggal'),
            //     'date_created' => time()
            // ]);

            // // Simpand data event dalam sesi
            // $announ_data = [
            //     'judul' => $this->input->post('judul'),
            //     'deskripsi' => $this->input->post('deskripsi'),
            //     'tanggal' => date('j F Y'),
            //     'date_created' => time()
            // ];

            // $this->session->set_userdata('announ_data', $announ_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman Telah ditambahkan!</div>');
            redirect('announcement');
        }
    }

    public function sampah()
    {
        $data = [
            'judul' => 'Manajemen Sampah',
            'sampah' => $this->SampahModel->getSampah(),
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view("templates/admin/header", $data);
        $this->load->view("templates/admin/sidebar", $data);
        $this->load->view("templates/admin/topbar", $data);
        $this->load->view('admin/sampah/sampah', $data);
        $this->load->view("templates/admin/footer");
    }
}
