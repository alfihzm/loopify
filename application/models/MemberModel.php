<?php

class MemberModel extends CI_Model
{
    public function getMember()
    {
        $query = $this->db->get('member');
        return $query->num_rows();
    }

    public function getMemberById($id)
    {
        $query = $this->db->get_where('user', ['id' => $id]);
        return $query->row_array();
    }

    public function getMemberByRole($role_id)
    {
        $query = $this->db->get_where('user', ['role_id' => $role_id]);

        return $query->result_array();
    }

    public function tambahMember($data)
    {
        if ($this->db->insert('user', $data)) {
            return true;
        } else {
            $error = $this->db->error();
            if ($error['code'] == 1062) {
                echo 'Error: No. Pegawai sudah ada dalam database';
            } else {
                echo 'Database Error (' . $error['code'] . '): ' . $error['message'];
            }
            return false;
        }
    }
}
