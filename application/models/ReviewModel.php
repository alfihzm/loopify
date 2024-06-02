<?php

class ReviewModel extends CI_Model
{
    public function tambahReview($data)
    {
        return $this->db->insert('review', $data);
    }
}
