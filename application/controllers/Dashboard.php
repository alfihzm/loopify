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
}