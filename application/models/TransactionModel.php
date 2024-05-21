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

    public function updatetransaction($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('transaction', array('status' => $status));
    }

    public function delete_transaction($id)
    {
        $transaction = $this->db->get_where('transaction', ['id' => $id])->row_array();
        if ($transaction) {
            $this->db->where('id', $id);
            $this->db->delete('transaction');
            return true; 
        } else {
            return false; 
        }
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
