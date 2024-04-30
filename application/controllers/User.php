<?php

class User extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        echo 'Selamat Datang ' . $data['user']['name'];
    }
}