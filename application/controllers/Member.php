<?php

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkLogin();
        $this->load->model('LimbahModel');
        $this->load->model('MemberModel');
        $this->load->model('ReviewModel');
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

    public function profil()
    {
        $data = [
            'judul' => 'Profil Saya',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('member/profil/index', $data);
        $this->load->view('templates/member/footer');
    }

    public function ubahProfil()
    {
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Masukkan nama lengkap anda dengan benar.'
        ]);

        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Masukkan email dengan benar.',
            'valid_email' => 'Masukkan format email dengan benar'
        ]);

        if ($this->input->post('email') != $user['email']) {
            $this->form_validation->set_rules('email', 'Email', 'is_unique[user.email]', [
                'is_unique' => 'Email sudah dipakai, mohon gunakan email yang lain.'
            ]);
        }

        $this->form_validation->set_rules('notelp', 'No. Telp', 'required|trim|integer', [
            'required' => 'Masukkan no. telp anda dengan benar.',
            'integer' => 'Nomor telepon hanya berisi angka'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Masukkan alamat anda dengan benar.'
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'judul' => 'Profil Saya',
                'user' => $user,
            ];

            $this->load->view('templates/member/header', $data);
            $this->load->view('templates/member/sidebar', $data);
            $this->load->view('member/profil/ubahProfil', $data);
            $this->load->view('templates/member/footer');
        } else {
            $dataMember = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('notelp'),
                'alamat' => $this->input->post('alamat')
            ];

            $uploadImage = $_FILES['photo']['name'];
            if ($uploadImage) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '4096';
                $config['max_width'] = '3084';
                $config['max_height'] = '3084';
                $config['upload_path'] = './assets/images/user/profile/';
                $config['file_name'] = 'user_' . $user['username'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('photo')) {
                    $gambarLama = $user['photo'];
                    if ($gambarLama != 'default.png') {
                        unlink(FCPATH . 'assets/images/user/profile/' . $gambarLama);
                    }

                    $gambarBaru = $this->upload->data('file_name');
                    $this->db->set('photo', $gambarBaru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->UserModel->editUser($user['id'], $dataMember);

            $this->session->set_flashdata('message', '<div id="successInput" class="alert alert-success" role="alert">Berhasil menerapkan perubahan.</div>');
            redirect('member/profil');
        }
    }


    public function histori()
    {
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

    public function withdraw()
    {
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

    public function review()
    {
        $data = [
            'judul' => 'Tambah Review',
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->form_validation->set_rules('review', 'Review', 'required', [
            'required' => 'Masukkan format ulasan dengan benar.'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/member/header', $data);
            $this->load->view('templates/member/sidebar', $data);
            $this->load->view('member/review/index', $data);
            $this->load->view('templates/member/footer');
        } else {
            $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $dataReview = [
                'id_member' => $user['id_member'],
                'nama' => $user['nama'],
                'photo' => $user['photo'],
                'tanggal' => date('Y-m-d'),
                'review' => $this->input->post('review')
            ];

            $this->ReviewModel->tambahReview($dataReview);
            redirect('member/about#rev');
        }
    }

    public function coupon()
    {
        $cinderamata = $this->db->get_where('cinderamata', ['id' => 1])->row_array();
        $cinderamata2 = $this->db->get_where('cinderamata', ['id' => 2])->row_array();
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $koin = $user['koin'] >= 0;
        $koin2 = $user['koin'] >= 0;
        $stok = $cinderamata['stok'];
        $stok2 = $cinderamata2['stok'];


        $data = [
            'judul' => 'Kupon Cinderamata',
            'user'  => $user,
            'gift' => $this->GiftModel->getGift(),
            'kupon1' => $koin,
            'kupon2' => $koin2,
            'stok' => $stok,
            'stok2' => $stok2
        ];

        $this->load->view('templates/member/header', $data);
        $this->load->view('templates/member/sidebar', $data);
        $this->load->view('member/coupon/coupon', $data);
        $this->load->view('templates/member/footer');
    }
}
