<?php

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkLogin();
    }

    public function index()
    {
        $data = [
            'judul' => 'Recyloop - Penukaran Limbah Daur Ulang'
        ];

        $this->load->view('member/home_header', $data);
        $this->load->view('member/member', $data);
        $this->load->view('member/home_footer');
    }

    public function about()
    {
        $data['judul'] = 'Recyloop.id';

        $this->load->view('member/home_header', $data);
        $this->load->view('member/about', $data);
        $this->load->view('member/home_footer');
    }
}
