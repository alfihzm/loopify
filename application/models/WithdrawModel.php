<?php

class WithdrawModel extends CI_Model
{
    public function getWithdraw()
    {
        $query = $this->db->get('withdraw');
        return $query->result_array();
    }

    public function newWithdraw($data)
    {
        return $this->db->insert('withdraw', $data);
    }
}
?>