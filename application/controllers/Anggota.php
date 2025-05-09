<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		$this->load->model('anggota_model', 'anggota');
	}

	public function manager()
	{
		$data['title']	= 'Manager';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getManager();

		$this->load->view('templates/app', $data);
	}

	public function HRD()
	{
		$data['title']	= 'HRD';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getHRD();

		$this->load->view('templates/app', $data);
	}

	public function staffit()
	{
		$data['title']	= 'Staff IT';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getStaffIT();

		$this->load->view('templates/app', $data);
	}

	public function staffdesain()
	{
		$data['title']	= 'Staff Desain';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getStaffDesain();

		$this->load->view('templates/app', $data);
	}

	public function staffvendor()
	{
		$data['title']	= 'Staff Vendor';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getStaffVendor();

		$this->load->view('templates/app', $data);
	}
	public function staffsupervisor()
	{
		$data['title']	= 'Staff Supervisor';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getStaffSupervisor();

		$this->load->view('templates/app', $data);
	}

	public function staffleaderdm()
	{
		$data['title']	= 'Staff Leader DM';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getStaffLeaderDM();

		$this->load->view('templates/app', $data);
	}

	public function anggotadigitalmarketing()
	{
		$data['title']	= 'Anggota Digital Marketing';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getAnggotaDigitalMarketing();

		$this->load->view('templates/app', $data);
	}
	
	public function direksi()
	{
		$data['title']	= 'Direksi';
		$data['page']	= 'admin/anggota/index';
		$data['users'] = $this->anggota->getDireksi();

		$this->load->view('templates/app', $data);
	}

	public function add()
	{
			$this->form_validation->set_rules('no_employee', 'No Karyawan', 'required|trim|is_unique[users.no_employee]',[
				'required'  => 'No karyawan tidak boleh kosong.',
				'is_unique' => 'No karyawan sudah terdaftar.' 
			]);
			$this->form_validation->set_rules('name', 'Nama', 'required|trim',[
				'required' => 'Nama tidak boleh kosong.'
			]);
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]',[
				'required' 	  => 'Email tidak boleh kosong.',
				'valid_email' => 'Email tidak valid',
			'is_unique'	  => 'Email sudah terdaftar.' 
			]);

			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Tambah Anggota';
				$data['page'] = 'admin/anggota/add';
				$data['position'] = $this->anggota->getPosition();
			
				$this->load->view('templates/app', $data);
			} else {
				// Data default
				$data = [
					'no_employee' => $this->input->post('no_employee'),
					'name' => $this->input->post('name'),
					'gender' => $this->input->post('gender'),
					'email' => strtolower($this->input->post('email')),
					'no_wa' => $this->input->post('nowa'),
					'alamat' => $this->input->post('alamat'),
					'photo' => null,
					'username' => $this->input->post('username'),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Tambahkan hashing
					'tgl_mulai_kerja' => $this->input->post('tgl_mulai_kerja'),
					'role_id' => 2,
					'position_id' => $this->input->post('position_id'),
					'date_created' => date('Y-m-d')
				];				
			
				// Proses upload file
				if (!empty($_FILES['photo']['name'])) {
					$config['upload_path'] = './image/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size'] = 2048; // Maksimal 2MB
					$config['file_name'] = 'photo_' . time();
			
					$this->load->library('upload', $config);
			
					if ($this->upload->do_upload('photo')) {
						$uploadData = $this->upload->data();
						$data['photo'] = $uploadData['file_name']; // Simpan nama file ke database
					} else {
						$this->session->set_flashdata('error', $this->upload->display_errors());
						redirect('anggota/add'); // Redirect jika upload gagal
					}
				}
			
				$this->anggota->insertUser($data);
				$this->session->set_flashdata('message', 'Data anggota berhasil ditambahkan.');
			
				// Redirect berdasarkan position_id
				switch ($data['position_id']) {
					case 1: redirect(base_url('anggota/manager')); break;
					case 2: redirect(base_url('anggota/HRD')); break;
					case 3: redirect(base_url('anggota/staffit')); break;
					case 4: redirect(base_url('anggota/staffdesain')); break;
					case 5: redirect(base_url('anggota/staffvendor')); break;
					case 6: redirect(base_url('anggota/staffsupervisor')); break;
					case 7: redirect(base_url('anggota/staffleaderdm')); break;
					case 8: redirect(base_url('anggota/anggotadigitalmarketing')); break;
					case 9: redirect(base_url('anggota/direksi')); break;
				}
			}			
	}

	public function edit($id)
	{
		// Validasi form
		$this->form_validation->set_rules('no_employee', 'No Karyawan', 'required|trim', [
			'required' => 'No karyawan tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('name', 'Nama', 'required|trim', [
			'required' => 'Nama tidak boleh kosong.'
		]);

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal
			$data['title'] = 'Ubah Anggota';
			$data['page'] = 'admin/anggota/edit';
			$data['user'] = $this->anggota->getDetailUser($id);
			$data['position'] = $this->anggota->getPosition();

			$this->load->view('templates/app', $data);
		} else {
			// Jika validasi berhasil
			$data = [
				'no_employee' => $this->input->post('no_employee'),
				'name' => $this->input->post('name'),
				'gender' => $this->input->post('gender'),
				'email' => strtolower($this->input->post('email')),
				'no_wa' => $this->input->post('nowa'),
				'alamat' => $this->input->post('alamat'),
				// 'photo' => $this->input->post('photo'),
				'username' => $this->input->post('username'),
				// 'password' => hashEncrypt($this->input->post('password')),
				'tgl_mulai_kerja' => $this->input->post('tgl_mulai_kerja'),
				'position_id' => $this->input->post('position_id'),
			];

			// Proses upload foto
			if (!empty($_FILES['photo']['name'])) {
				$config['upload_path'] = './image/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 2048; // Maksimal 2MB
				$config['file_name'] = uniqid() . '_' . $_FILES['photo']['name'];

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('photo')) {
					// Hapus foto lama jika ada
					$old_photo = $this->anggota->getDetailUser($id)['photo'];
					if ($old_photo && file_exists('./image/' . $old_photo)) {
						unlink('./image/' . $old_photo);
					}

					$data['photo'] = $this->upload->data('file_name');
				} else {
					// Tampilkan error jika gagal upload
					$this->session->set_flashdata('error', $this->upload->display_errors());
					redirect(base_url('anggota/edit/' . $id));
				}
			}

			// Update data anggota
			$this->anggota->updateUser($id, $data);
			$this->session->set_flashdata('message', 'Data anggota berhasil diubah.');

			// Redirect sesuai posisi
			switch ($data['position_id']) {
				case 1: redirect(base_url('anggota/manager')); break;
				case 2: redirect(base_url('anggota/HRD')); break;
				case 3: redirect(base_url('anggota/staffit')); break;
				case 4: redirect(base_url('anggota/staffdesain')); break;
				case 5: redirect(base_url('anggota/staffvendor')); break;
				case 6: redirect(base_url('anggota/staffsupervisor')); break;
				case 7: redirect(base_url('anggota/staffleaderdm')); break;
				case 8: redirect(base_url('anggota/anggotadigitalmarketing')); break;
				case 9: redirect(base_url('anggota/direksi')); break;
			}
		}
	}

	public function delete($id)
	{
		$user	= $this->anggota->getDetailUser($id);
		$this->anggota->deleteUser($id);
		$this->session->set_flashdata('message', 'Data anggota berhasil dihapus.');

		switch ($user['position_id']) {
			case 1: redirect(base_url('anggota/manager')); break;
			case 2: redirect(base_url('anggota/HRD')); break;
			case 3: redirect(base_url('anggota/staffit')); break;
			case 4: redirect(base_url('anggota/staffdesain')); break;
			case 5: redirect(base_url('anggota/staffvendor')); break;
			case 6: redirect(base_url('anggota/staffsupervisor')); break;
			case 7: redirect(base_url('anggota/staffleaderdm')); break;
			case 8: redirect(base_url('anggota/anggotadigitalmarketing')); break;
			case 9: redirect(base_url('anggota/direksi')); break;
		}
	}

}

/* End of file Controllername.php */
