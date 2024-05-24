<?php

class LimbahModel extends CI_Model
{
    public function getLimbah()
    {
        return $this->db->get('sampah')->result_array();
    }
}
