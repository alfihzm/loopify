<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        role_id();
    }

    public function index()
    {
        $data['judul'] = 'Recyloop.id';

        $this->load->view('templates/home_header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/home_footer');
    }
}
