<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BahanPostingan_model extends CI_Model {
    public function insert_bahan($data)
    {
        // Insert the data into the bahan_postingan table
        $this->db->insert('bahan_postingan', $data);
    }
}

