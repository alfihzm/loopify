<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['judul'] = "Dashboard";

        $this->load->view("dashboard/header", $data);
        $this->load->view("dashboard/sidebar", $data);
        $this->load->view("dashboard/topbar", $data);
        $this->load->view("dashboard/index", $data);
        $this->load->view("dashboard/footer");
    }

    public function my_profile()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        echo 'Selamat Datang ' . $data['user']['name'];
    }
}