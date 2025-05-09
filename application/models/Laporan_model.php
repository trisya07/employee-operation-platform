<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan_model extends CI_Model
{
    public function insert_laporan($data)
    {
        $this->db->insert('laporan_kerja', $data);
    }
}