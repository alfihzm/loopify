<?php

class GiftModel extends CI_Model
{
    public function getGift()
    {
        $query = $this->db->get('cinderamata');
        return $query->result_array();
    }

    public function tambahGift($data)
    {
        return $this->db->insert('cinderamata', $data);
    }

    public function editGift($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('cinderamata', $data);
    }

    public function getGiftById($id)
    {
        $query = $this->db->get_where('cinderamata', ['id' => $id]);
        return $query->row_array();
    }
}
