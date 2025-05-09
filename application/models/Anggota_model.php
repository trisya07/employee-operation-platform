<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

	public function getManager()
	{
		$this->db->select('users.*, positions.position_name');
		$this->db->from('users');
		$this->db->join('positions', 'users.position_id = positions.id_positions');
		$this->db->where('position_id', 1);
      return $this->db->get()->result_array();
	}

	public function getHRD()
	{
		$this->db->select('users.*, positions.position_name');
		$this->db->from('users');
		$this->db->join('positions', 'users.position_id = positions.id_positions');
		$this->db->where('position_id', 2);
      return $this->db->get()->result_array();
	}

	public function getStaffIT()
	{
		$this->db->select('users.*, positions.position_name');
		$this->db->from('users');
		$this->db->join('positions', 'users.position_id = positions.id_positions');
		$this->db->where('position_id', 3);
      return $this->db->get()->result_array();
	}

	public function getStaffDesain()
	{
		$this->db->select('users.*, positions.position_name');
		$this->db->from('users');
		$this->db->join('positions', 'users.position_id = positions.id_positions');
		$this->db->where('position_id', 4);
      return $this->db->get()->result_array();
	}

	public function getStaffVendor()
	{
		$this->db->select('users.*, positions.position_name');
		$this->db->from('users');
		$this->db->join('positions', 'users.position_id = positions.id_positions');
		$this->db->where('position_id', 5);
      return $this->db->get()->result_array();
	}

	public function getStaffSupervisor()
	{
		$this->db->select('users.*, positions.position_name');
		$this->db->from('users');
		$this->db->join('positions', 'users.position_id = positions.id_positions');
		$this->db->where('position_id', 6);
      return $this->db->get()->result_array();
	}

	public function getStaffLeaderDM()
	{
		$this->db->select('users.*, positions.position_name');
		$this->db->from('users');
		$this->db->join('positions', 'users.position_id = positions.id_positions');
		$this->db->where('position_id', 7);
      return $this->db->get()->result_array();
	}

	public function getAnggotaDigitalMarketing()
	{
		$this->db->select('users.*, positions.position_name');
		$this->db->from('users');
		$this->db->join('positions', 'users.position_id = positions.id_positions');
		$this->db->where('position_id', 8);
      return $this->db->get()->result_array();
	}
	public function getDireksi()
	{
		$this->db->select('users.*, positions.position_name');
		$this->db->from('users');
		$this->db->join('positions', 'users.position_id = positions.id_positions');
		$this->db->where('position_id', 9);
      return $this->db->get()->result_array();
	}

	public function getDetailUser($id)
	{
		return $this->db->get_where('users', ['id_users' => $id])->row_array();
	}

	public function getPosition()
	{
		return $this->db->get('positions')->result_array();
	}

	public function insertUser($data)
	{
		$this->db->insert('users', $data);
	}

	public function updateUser($id, $data)
	{
		$this->db->update('users', $data, ['id_users' => $id]);
		return $this->db->affected_rows();
	}

	public function deleteUser($id)
	{
		$this->db->where('id_users', $id);
      $this->db->delete('users');
	}

}

/* End of file ModelName.php */
