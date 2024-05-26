<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        role_id();
        $this->load->model('LimbahModel');
    }

    public function index()
    {
        $data['judul'] = 'Recyloop.id';
        $data = [
            'limbah' => $this->LimbahModel->getLimbah()
        ];

        $this->load->view('templates/home_header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/home_footer');
    }
}
