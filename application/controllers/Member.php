<?php

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkLogin();
        $this->load->model('LimbahModel');
        $this->load->model('MemberModel');
    }

    public function index()
    {
        $data = [
            'judul'  => 'Recyloop - Penukaran Limbah Daur Ulang',
            'user'   => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'limbah' => $this->LimbahModel->getLimbah(),
            'bp'     => $this->LimbahModel->getLimbahById(1),
            'ka'     => $this->LimbahModel->getLimbahById(2),
            'kk'     => $this->LimbahModel->getLimbahById(3)
        ];

        $data['total'] = $data['bp']['total_sampah'] + $data['ka']['total_sampah'] + $data['kk']['total_sampah'];

        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('member/index/member-section1', $data);
        $this->load->view('member/index/member-section2', $data);
        $this->load->view('member/index/member-section3', $data);
        $this->load->view('member/index/member-section4', $data);
        $this->load->view('member/index/member-section5', $data);
        $this->load->view('member/index/member-section6', $data);
        $this->load->view('templates/member/footer');
    }

    public function about()
    {
        $data = [
            'judul' => 'Recyloop - Penukaran Limbah Daur Ulang',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'company' => $this->db->get('company')->result_array(),
            'review' => $this->MemberModel->getReview()
        ];

        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('member/about/about-section1', $data);
        $this->load->view('member/about/about-section2', $data);
        $this->load->view('member/about/about-section3', $data);
        $this->load->view('member/about/about-section4', $data);
        $this->load->view('member/about/about-section5', $data);
        $this->load->view('member/about/about-section6', $data);
        $this->load->view('member/about/about-footer');
        $this->load->view('templates/member/footer');
    }

    public function profil() {
        $data = [
            'judul' => 'Profil Saya',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('member/profil/index', $data);
        $this->load->view('templates/member/footer');
    }

    public function histori() {
        $data = [
            'judul'           => 'Histori Saya',
            'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'detailTransaksi' => $this->db->get_where('transaction', ['username' => $this->session->userdata('username')])->result_array(),
        ];
                        
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('member/histori/index', $data);
        $this->load->view('templates/member/footer');
    }

    public function withdraw() {
        $data = [
            'judul'           => 'Histori Saya',
            'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'detailWithdraw' => $this->db->get_where('withdraw', ['username' => $this->session->userdata('username')])->result_array(),
        ];
                        
        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('member/histori/withdraw', $data);
        $this->load->view('templates/member/footer');
    }
}