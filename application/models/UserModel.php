<?php

class UserModel extends CI_Model
{
    public function getMember()
    {
        $query = $this->db->get('member');
        return $query->num_rows();
    }

    public function getUserByRole($role_id)
    {
        $query = $this->db->get_where('user', ['role_id' => $role_id]);

        return $query->result_array();
    }

    public function getInfoByRoleId($role_id)
    {
        $query = $this->db->get_where('user', ['role_id' => $role_id]);
        return $query->result_array();
    }

    public function tambahUser($data)
    {
        return $this->db->insert('user', $data);
    }

    public function editUser($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    public function getStaffById($id)
    {
        $query = $this->db->get_where('user', ['id_staff' => $id]);
        return $query->row_array();
    }

    public function getMemberById($id)
    {
        $query = $this->db->get_where('user', ['id_member' => $id]);
        return $query->row_array();
    }
}