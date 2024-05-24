<?php

function role_id()
{
    $var = get_instance();

    // Ini meriksa user login pokoknya
    if ($var->session->userdata('username')) {
        $user = $var->db->get_where('user', ['username' => $var->session->userdata('username')])->row_array();

        if ($user) {
            if ($user['role_id'] == 2) {
                redirect('staff');
                return;
            } else if ($user['role_id'] == 3) {
                redirect('member');
                return;
            }
        }
    }
    // Klo pengguna belum login, gausah ngecek
}
