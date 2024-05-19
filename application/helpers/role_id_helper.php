<?php

function role_id()
{
    $var = get_instance();

    $user = $var->db->get_where('user', ['username' => $var->session->userdata('username')])->row_array();

    if ($user['role_id'] == 2) {
        redirect('staff');
        return;
    }
}