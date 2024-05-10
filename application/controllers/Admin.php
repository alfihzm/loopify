<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StaffModel', 'SampahModel', 'GiftModel');
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
        $this->load->view("admin/dashboard/index", $data);
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
        $this->load->view('admin/konfigurasi_admin/my_profile', $data);
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
            $this->load->view('admin/konfigurasi_admin/edit_profile', $data);
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

    public function ubah_password()
    {
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[5]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[5]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/konfigurasi_admin/ubah_password', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password saat ini salah.</div>');
                redirect('user/ubah_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password saat ini</div>');
                    redirect('admin/ubah_password');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                    redirect('admin/my_profile');
                }
            }
        }
    }

    // -> ! LIST STAFF ! <-
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
        $this->load->view('admin/staff/staff', $data);
        $this->load->view("templates/admin/footer");
    }

    // TAMBAH STAFF
    public function add_staff()
    {
        // ID Staff
        $this->form_validation->set_rules('idstaff', 'ID Staff', 'required|trim|max_length[16]|is_unique[user.id_staff]|integer', [
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
            $this->load->view('admin/staff/add_staff', $data);
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
        $this->load->view('admin/staff/staff_info', $data);
        $this->load->view("templates/admin/footer");
    }
    public function staff_edit($id)
    {
        $data['user'] = $this->UserModel->getStaffById($id);
        $data['judul'] = 'Ubah Informasi Staff';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view('admin/staff/staff_edit', $data);
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

    // -> ! LIST MEMBER ! <-
    // INFORMASI TABEL MEMBER
    public function member()
    {
        $data = [
            'judul' => 'Manajemen Member',
            'members' => $this->UserModel->getUserByRole(3),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->load->view("templates/admin/header", $data);
        $this->load->view("templates/admin/sidebar", $data);
        $this->load->view("templates/admin/topbar", $data);
        $this->load->view('admin/member/member', $data);
        $this->load->view("templates/admin/footer");
    }

    // TAMBAH STAFF
    public function add_member()
    {
        // ID Staff
        $this->form_validation->set_rules('idmember', 'ID Member', 'required|trim|max_length[16]|is_unique[user.id_member]|integer', [
            'required'    => 'Masukkan ID Member dengan Benar!',
            'max_length'  => 'Maksimal 16 Karakter',
            'is_unique'   => 'ID Member sudah ada di dalam database',
            'integer'     => 'ID Member hanya berisi angka'
        ]);
        // Nama
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required'    => 'Masukkan Nama Lengkap Member dengan Benar',
        ]);
        // Tanggal Lahir
        $this->form_validation->set_rules('lahir', 'Tanggal Lahir', 'required', [
            'required'    => 'Masukkan Tanggal Lahir Member dengan Benar'
        ]);
        // Email
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required'    => 'Masukkan Email Member dengan Benar!',
            'valid_email' => 'Masukkan Email Member dengan Sesuai'
        ]);
        // Username
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required'    => 'Masukkan Username Member dengan Benar'
        ]);
        // No_telp
        $this->form_validation->set_rules('no_telp', 'No. Telp', 'required|integer', [
            'required'    => 'Masukkan No. Telp Member dengan Benar',
            'integer'     => 'Nomor Telepon hanya berisi angka'
        ]);
        // Alamat
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required'    => 'Masukkan Alamat Member dengan Benar',
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'judul' => 'Tambah Member',
                'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
            ];

            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/member/add_member', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $dataUser = [
                'id_member'    => htmlspecialchars($this->input->post('idmember')),
                'nama'         => htmlspecialchars($this->input->post('nama')),
                'lahir'        => date('Y-m-d', strtotime($this->input->post('lahir'))),
                'email'        => htmlspecialchars($this->input->post('email')),
                'username'     => htmlspecialchars($this->input->post('username')),
                'password'     => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id'      => 3,
                'photo'        => 'default.jpg',
                'no_telp'      => htmlspecialchars($this->input->post('no_telp')),
                'alamat'       => htmlspecialchars($this->input->post('alamat')),
                'total_sampah' => 0,
                'level'        => 1,
                'poin'         => 0,
                'date_created' => time(),
                'is_active'    => 1,
            ];

            $this->load->model('UserModel');
            $userSaved = $this->UserModel->tambahUser($dataUser);

            if ($userSaved) {
                $this->session->set_flashdata('message', '<div style="color: #FFF; background: #1f283E;" class="alert alert-success" role="alert">Member Berhasil Ditambahkan</div>');
                redirect('admin/member');
            } else {
                $this->db->trans_rollback();
                $this->session->set_flashdata('message', '<div style="color: #FFF; background: #1f283E;" class="alert alert-danger" role="alert">Gagal menambahkan Member</div>');
                redirect('admin/add_member');
            }
        }
    }

    public function member_info($id)
    {
        $data = [
            'judul' => 'Informasi Member',
            'user' => $this->db->get_where('user', ['id_member' => $id])->row_array()
        ];

        $this->load->view("templates/admin/header", $data);
        $this->load->view("templates/admin/sidebar", $data);
        $this->load->view("templates/admin/topbar", $data);
        $this->load->view('admin/member/member_info', $data);
        $this->load->view("templates/admin/footer");
    }

    public function member_edit($id)
    {
        $data['user'] = $this->UserModel->getMemberById($id);
        $data['judul'] = 'Ubah Informasi Member';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            // $this->load->view("templates/admin/topbar", $data);
            $this->load->view('admin/member/member_edit', $data);
            $this->load->view("templates/admin/footer");
        } else {
            $userData = [
                'nama' => htmlspecialchars($this->input->post('nama')),
                'email' => htmlspecialchars($this->input->post('email'))
            ];

            $this->UserModel->editUser($id, $userData);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Member telah Diubah</div>');
            redirect('admin/member');
        }
    }

    public function member_delete($id)
    {
        $user = $this->db->get_where('user', ['id_member' => $id])->row_array();

        if ($user) {
            $this->db->delete('user', ['id_member' => $id]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" background: #1f283E;" role="alert">Member berhasil dihapus</div>');
            redirect('admin/member');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" background: #1f283E;" role="alert">Member gagal dihapus!</div>');
        }
    }

    // -> ! LIST SAMPAH ! <-
    // INFORMASI TABEL MEMBER
    public function sampah()
    {
        $data = [
            'judul' => 'Manajemen Sampah',
            'sampah' => $this->SampahModel->getSampah(),
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view("templates/admin/header", $data);
        $this->load->view("templates/admin/sidebar", $data);
        $this->load->view("templates/admin/topbar", $data);
        $this->load->view('admin/sampah/sampah', $data);
        $this->load->view("templates/admin/footer");
    }

    public function tambah_sampah()
    {
        $this->form_validation->set_rules('jenis_sampah', 'Jenis Sampah', 'required', [
            'required' => 'Masukkan Jenis Sampah dengan benar',
        ]);
        $this->form_validation->set_rules('nilai_tukar', 'Nilai Tukar', 'required|integer', [
            'required' => 'Masukkan Nilai Tukar dengan benar',
            'integer'  => 'Nilai Tukar Sampah hanya bernilai angka',
        ]);


        if ($this->form_validation->run() == false) {
            $data = [
                'judul' => 'Tambah Sampah',
                'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            ];

            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view('admin/sampah/tambah_sampah', $data);
            $this->load->view("templates/admin/footer");
        } else {
            $dataSampah = [
                'jenis_sampah' => $this->input->post('jenis_sampah'),
                'nilai_tukar'  => $this->input->post('nilai_tukar'),
            ];

            $this->load->model('SampahModel');
            $this->SampahModel->tambahSampah($dataSampah);

            $this->session->set_flashdata('message', '<div style="color: #FFF; background: #1f283E;" class="alert alert-success" role="alert">Sampah Berhasil Ditambahkan</div>');
            redirect('admin/sampah');
        }
    }

    public function ubah_sampah($id)
    {
        $data['sampah'] = $this->SampahModel->getSampahById($id);

        $data = array_merge($data, [
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'judul' => 'Ubah Informasi Sampah'
        ]);


        $this->form_validation->set_rules('jenis_sampah', 'Jenis Sampah', 'required', [
            'required' => 'Masukkan Jenis Sampah dengan benar',
        ]);
        $this->form_validation->set_rules('nilai_tukar', 'Nilai Tukar', 'required|integer', [
            'required' => 'Masukkan Nilai Tukar dengan benar',
            'integer'  => 'Nilai Tukar Sampah hanya bernilai angka',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view('admin/sampah/ubah_sampah', $data);
            $this->load->view("templates/admin/footer");
        } else {
            $sampahData = [
                'jenis_sampah' => htmlspecialchars($this->input->post('jenis_sampah')),
                'nilai_tukar' => htmlspecialchars($this->input->post('nilai_tukar'))
            ];

            $this->SampahModel->editSampah($id, $sampahData);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi Sampah telah diubah</div>');
            redirect('admin/sampah');
        }
    }

    public function hapus_sampah($id)
    {
        $sampah = $this->db->get_where('sampah', ['id' => $id])->row_array();

        if ($sampah) {
            $this->db->delete('sampah', ['id' => $id]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sampah berhasil dihapus</div>');
            redirect('admin/sampah');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anggota gagal dihapus!</div>');
        }
    }

    public function cinderamata()
    {
        $data = [
            'judul' => 'Manajemen Cinderamata',
            'cinderamata' => $this->GiftModel->getGift(),
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->load->view("templates/admin/header", $data);
        $this->load->view("templates/admin/sidebar", $data);
        $this->load->view("templates/admin/topbar", $data);
        $this->load->view('admin/cinderamata/cinderamata', $data);
        $this->load->view("templates/admin/footer");
    }

    public function tambah_gift()
    {
        $this->form_validation->set_rules('nama_gift', 'Nama Cinderamata', 'required', [
            'required' => 'Masukkan Nama Cinderamata dengan benar',
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer', [
            'required' => 'Masukkan Harga Cinderamata dengan benar',
            'integer'  => 'Harga Cinderamata hanya bernilai angka',
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Cinderamata', 'required', [
            'required' => 'Masukkan Deskripsi Cinderamata dengan benar',
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'judul' => 'Tambah Cinderamata',
                'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            ];

            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view('admin/cinderamata/tambah_gift', $data);
            $this->load->view("templates/admin/footer");
        } else {
            $dataGift = [
                'nama_gift' => htmlspecialchars($this->input->post('nama_gift')),
                'harga'     => htmlspecialchars($this->input->post('harga')),
                'photo'     => 'default_gift.jpg',
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi'))
            ];

            $this->load->model('GiftModel');
            $this->GiftModel->tambahGift($dataGift);

            $this->session->set_flashdata('message', '<div style="color: #FFF; background: #1f283E;" class="alert alert-success" role="alert">Cinderamata Berhasil Ditambahkan</div>');
            redirect('admin/cinderamata');
        }
    }

    // UBAH CINDERAMATA
    public function ubah_gift($id)
    {
        $data['cinderamata'] = $this->GiftModel->getGiftById($id);

        $data = array_merge($data, [
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'judul' => 'Ubah Informasi Cinderamata'
        ]);

        $this->form_validation->set_rules('nama_gift', 'Nama Cinderamata', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Cinderamata', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/admin/header", $data);
            $this->load->view("templates/admin/sidebar", $data);
            $this->load->view("templates/admin/topbar", $data);
            $this->load->view('admin/cinderamata/ubah_gift', $data);
            $this->load->view("templates/admin/footer");
        } else {
            $nama_gift = $this->input->post('nama_gift');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');

            $dataGift = [
                'nama_gift' => $nama_gift,
                'harga' => $harga,
                'deskripsi' => $deskripsi
            ];

            if (!empty($_FILES['photo']['name'])) {
                $config['upload_path'] = './assets/images/cinderamata/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 10240;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('photo')) {
                    if ($data['cinderamata']['photo'] != 'default_gift.jpg') {
                        unlink('./assets/images/cinderamata/' . $data['cinderamata']['photo']);
                    }

                    $gambarGiftBaru = $this->upload->data('file_name');
                    $dataGift['photo'] = $gambarGiftBaru;
                } else {
                    $upload_error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $upload_error . '</div>');
                    redirect('admin/ubah_gift/' . $id);
                }
            }

            $this->GiftModel->editGift($id, $dataGift);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi Cinderamata telah diubah</div>');

            redirect('admin/cinderamata');
        }
    }



    public function hapus_gift($id)
    {
        $gift = $this->db->get_where('cinderamata', ['id' => $id])->row_array();

        if ($gift) {
            $this->db->delete('cinderamata', ['id' => $id]);

            $this->session->set_flashdata('message', '<div style="color: #FFF; background: #1f283E;" class="alert alert-success" role="alert">Cinderamata berhasil dihapus</div>');
            redirect('admin/cinderamata');
        } else {
            $this->session->set_flashdata('message', '<div style="color: #FFF; background: #1f283E;" class="alert alert-danger" role="alert">Cinderamata gagal dihapus!</div>');
        }
    }
}