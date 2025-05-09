<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {

    public function insertPesanan($data) {
        $this->db->insert('pesanan', $data);
    }

    public function getAllPesanan() {
        return $this->db->get('pesanan')->result_array();
    }
    
}
