<?php

function is_login()
{
    $var = get_instance();

    if (!$var->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $var->session->userdata('role_id');
        $menu = $var->uri->segment(1);

        $queryMenu = $var->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu;

        if ($role_id == 1) {
            return;
        }

        $userAccess = $var->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
