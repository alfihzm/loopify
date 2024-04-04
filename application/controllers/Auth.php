<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['judul'] = "Masuk";

        $this->load->view("templates/auth_header", $data);
        $this->load->view("auth/login", $data);
        // $this->load->view("templates/auth_footer");
    }
}