<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StaffModel');
        is_login();
        $this->load->language('form_validation', 'indonesian');
    }

    public function index()
    {
        $data = [
            'judul' => "Dashboard",
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view("templates/admin/header", $data);
        $this->load->view("templates/admin/sidebar", $data);
        $this->load->view("templates/admin/topbar", $data);
        $this->load->view("admin/index", $data);
        $this->load->view("templates/admin/footer");
    }

    // INFORMASI PROFILE
    public function my_profile()
    {
        $data = [
            'judul' => 'Profil Saya',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view("templates/admin/header", $data);
        $this->load->view("templates/admin/sidebar", $data);
        $this->load->view("templates/admin/topbar", $data);
        $this->load->view('admin/my_profile', $data);
        $this->load->view("templates/admin/footer");
    }

    // PENGATURAN INFORMASI PROFILE
    public function edit_profile()
    {
        $data = [
            'judul' => 'Ubah Profil',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view('admin/edit_profile', $data);
            $this->load->view("templates/admin/footer");
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $uploadImage = $_FILES['photo']['name'];

            if ($uploadImage) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '4096';
                $config['max_width'] = '3084';
                $config['max_height'] = '3084';
                $config['upload_path'] = './assets/images/user/profile/';
                $config['file_name'] = 'user_' . $data['user']['nama'];

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('photo')) {
                    $gambarLama = $data['user']['photo'];
                    if ($gambarLama != 'default.png') {
                        unlink(FCPATH . 'assets/images/user/profile/' . $gambarLama);
                    }

                    $gambarBaru = $this->upload->data('file_name');
                    $this->db->set('photo', $gambarBaru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div style="color: #FFF; background: #1f283E;" id="successInput" class="alert alert-success" role="alert">Berhasil Menerapkan Perubahan</div>');
            redirect('admin/my_profile');
        }
    }

    // INFORMASI TABEL STAFF
    public function staff()
    {
        $data = [
            'judul' => 'Manajemen Staff',
            'members' => $this->UserModel->getUserByRole(2),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view("templates/admin/header", $data);
        $this->load->view("templates/admin/sidebar", $data);
        $this->load->view("templates/admin/topbar", $data);
        $this->load->view('admin/staff', $data);
        $this->load->view("templates/admin/footer");
    }

    // TAMBAH STAFF
    public function add_staff()
    {
        // ID Staff
        $this->form_validation->set_rules('idstaff', 'ID Staff', 'required|trim|max_length[16]|is_unique[staff.id_staff]|integer', [
            'required'    => 'Masukkan ID Staff dengan Benar!',
            'max_length'  => 'Maksimal 16 Karakter',
            'is_unique'   => 'ID Staff sudah ada di dalam database',
            'integer'     => 'ID Staff hanya berisi angka'
        ]);
        // Nama
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required'    => 'Masukkan Nama Lengkap dengan Benar',
        ]);
        // Tanggal Lahir
        $this->form_validation->set_rules('lahir', 'Tanggal Lahir', 'required', [
            'required'    => 'Masukkan Tanggal Lahir dengan Benar'
        ]);
        // Email
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required'    => 'Masukkan Email dengan Benar!',
            'valid_email' => 'Masukkan Email dengan Sesuai'
        ]);
        // Username
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required'    => 'Masukkan Username Staff dengan Benar'
        ]);
        // No_telp
        $this->form_validation->set_rules('no_telp', 'No. Telp', 'required|integer', [
            'required'    => 'Masukkan No. Telp Staff dengan Benar',
            'integer'     => 'Nomor Telepon hanya berisi angka'
        ]);
        // Alamat
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required'    => 'Masukkan Alamat Staff dengan Benar',
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'judul' => 'Tambah Staff',
                'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
            ];

            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/add_staff', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $dataUser = [
                'id_staff'  => htmlspecialchars($this->input->post('idstaff')),
                'nama'      => htmlspecialchars($this->input->post('nama')),
                'lahir'     => date('Y-m-d', strtotime($this->input->post('lahir'))),
                'email'     => htmlspecialchars($this->input->post('email')),
                'username'  => htmlspecialchars($this->input->post('username')),
                'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id'   => 2,
                'photo'     => 'default.jpg',
                'no_telp'   => htmlspecialchars($this->input->post('no_telp')),
                'alamat'    => htmlspecialchars($this->input->post('alamat')),
                'level'     => 1,
                'poin'      => 0,
                'date_created'  => time(),
                'is_active' => 1,
            ];

            $dataStaff = [
                'id_staff' => htmlspecialchars($this->input->post('idstaff')),
                'nama' => htmlspecialchars($this->input->post('nama')),
                'email' => htmlspecialchars($this->input->post('email')),
                'username' => htmlspecialchars($this->input->post('username')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'no_telp' => htmlspecialchars($this->input->post('no_telp')),
                'photo' => 'default.jpg',
                'role_id' => 2,
                'is_active' => 1,
            ];

            $this->db->trans_begin();

            $this->load->model('UserModel');
            $userSaved = $this->UserModel->tambahUser($dataUser);

            $this->load->model('StaffModel');
            $staffSaved = $this->StaffModel->tambahStaff($dataStaff);

            if ($userSaved && $staffSaved) {
                $this->db->trans_commit();
                $this->session->set_flashdata('message', '<div style="color: #FFF; background: #1f283E;" class="alert alert-success" role="alert">Staff Berhasil Ditambahkan</div>');
                redirect('admin/staff');
            } else {
                $this->db->trans_rollback();
                $this->session->set_flashdata('message', '<div style="color: #FFF; background: #1f283E;" class="alert alert-danger" role="alert">Gagal menambahkan Staff</div>');
                redirect('admin/add_staff');
            }
        }
    }

    public function staff_info($id)
    {
        $data = [
            'judul' => 'Informasi Staff',
            'user' => $this->db->get_where('user', ['id_staff' => $id])->row_array()
        ];

        $this->load->view("templates/admin/header", $data);
        $this->load->view("templates/admin/sidebar", $data);
        $this->load->view("templates/admin/topbar", $data);
        $this->load->view('admin/staff_info', $data);
        $this->load->view("templates/admin/footer");
    }
    public function staff_edit($id)
    {
        $data['user'] = $this->UserModel->getMemberById($id);
        $data['judul'] = 'Ubah Informasi Staff';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view('admin/staff_edit', $data);
            $this->load->view("templates/admin/footer");
        } else {
            $userData = [
                'nama' => htmlspecialchars($this->input->post('nama')),
                'email' => htmlspecialchars($this->input->post('email'))
            ];

            $this->UserModel->editUser($id, $userData);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Staff telah Diubah</div>');
            redirect('admin/staff');
        }
    }

    public function staff_delete($id)
    {
        $user = $this->db->get_where('user', ['id_staff' => $id])->row_array();

        if ($user) {
            $this->db->delete('user', ['id_staff' => $id]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Staff berhasil dihapus</div>');
            redirect('admin/staff');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anggota gagal dihapus!</div>');
        }
    }
}
