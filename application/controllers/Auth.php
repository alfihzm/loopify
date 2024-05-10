<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->is_already_login()) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } elseif ($this->session->userdata('role_id') == 2) {
                redirect('staff');
            } else {
                redirect('home');
            }
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Masuk';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    public function is_already_login()
    {
        return $this->session->userdata('username');
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                        // Tambahkan data sesuai kebutuhan
                    ];

                    $this->session->set_userdata($data);

                    // Redirect sesuai role_id
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('staff');
                    } else {
                        redirect('home');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang Anda masukkan salah.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum diaktifkan.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ditemukan.</div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password terlalu pendek.'
        ]);
        $this->form_validation->set_rules('notelp', 'No. Telp', 'required|trim|integer');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Register';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'photo' => 'default.jpg',
                'no_telp' => $this->input->post('notelp'),
                'date_created' => time(),
                'is_active' => 1,
            ];

            $this->db->insert('user', $data);

            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil logout. </div>');

        redirect('auth');
    }

    public function blocked()
    {
        echo 'access blocked';
    }
}