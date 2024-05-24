<?php

class MemberModel extends CI_Model
{
    public function getUser()
    {
        return $this->db->get('user')->result_array();
    }
}
