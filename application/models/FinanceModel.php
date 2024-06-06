<?php
class FinanceModel extends CI_Model
{
    public function getFinance()
    {
        $query = $this->db->get('finance');
        return $query->result_array();
    }

    public function getFinanceById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('finance');
        return $query->row_array();
    }

    public function updateFinance($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('finance', $data);
    }

    public function tambahSaldo($id, $jumlah)
    {
        $this->db->set('saldo', 'saldo + ' . (int)$jumlah, FALSE);
        $this->db->where('id', $id);
        return $this->db->update('finance');
    }

    public function transferSaldo($idFrom, $idTo, $jumlah)
    {
        $this->db->trans_start();

        $this->db->set('saldo', 'saldo - ' . (int)$jumlah, FALSE);
        $this->db->where('id', $idFrom);
        $this->db->update('finance');

        $this->db->set('saldo', 'saldo + ' . (int)$jumlah, FALSE);
        $this->db->where('id', $idTo);
        $this->db->update('finance');

        $this->db->trans_complete();

        return $this->db->trans_status();
    }
}
