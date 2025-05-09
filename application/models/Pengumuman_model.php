<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_model extends CI_Model {

    public function get_all_pengumuman() {
        $query = $this->db->get('pengumuman');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return [];
        }
    }
    
    // public function get_all_pengumuman() {
    //     return $this->db->get('pengumuman')->result_array();
    // }

    public function insert_pengumuman($data) {
        $this->db->insert('pengumuman', $data);
    }
    

    public function delete_pengumuman($id) {
        $pengumuman = $this->db->get_where('pengumuman', ['id_pengumuman' => $id])->row();
        if ($pengumuman && file_exists('./uploads/pengumuman/' . $pengumuman->foto)) {
            unlink('./uploads/pengumuman/' . $pengumuman->foto);
        }
        $this->db->delete('pengumuman', ['id_pengumuman' => $id]);
    }
}
