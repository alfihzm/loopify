<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = [
            'judul' => "Dashboard",
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("admin/index", $data);
        $this->load->view("templates/footer");
    }

    public function my_profile()
    {
        $data = [
            'judul' => 'Profil Saya',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view('admin/my_profile', $data);
        $this->load->view("templates/footer");
    }

    public function edit_profile()
    {
        $data = [
            'judul' => 'Ubah Profil',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view('admin/edit_profile', $data);
        $this->load->view("templates/footer");
    }

    public function add_staff()
    {
        $data = [
            'judul' => 'Tambah Staff',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view('admin/add_staff', $data);
        $this->load->view("templates/footer");
    }

    public function staff_info()
    {
        $data = [
            'judul' => 'Informasi Staff',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view('admin/staff_info', $data);
        $this->load->view("templates/footer");
    }
}