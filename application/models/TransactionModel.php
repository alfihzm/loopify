<?php

class TransactionModel extends CI_Model
{
    public function getTransaction()
    {
        $query = $this->db->get('transaction');
        return $query->result_array();
    }

    public function newTransaction($data)
    {
        return $this->db->insert('transaction', $data);
    }

    public function editTransaction($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('transaction', $data);
    }

    public function getTransactionById($id)
    {
        $query = $this->db->get_where('transaction', ['id' => $id]);
        return $query->row_array();
    }
}
