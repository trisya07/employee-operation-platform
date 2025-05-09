<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('profile_model', 'profile');
		$this->load->model('anggota_model', 'anggota');
		$this->load->model('user_model', 'user');
		$this->load->model('Pesanan_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['page'] 	= 'dashboard/index';
		$this->load->view('templates/app', $data);
	}

	public function pesanan() {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('no_wa', 'Nomor WhatsApp', 'required|trim|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenis_kaos[]', 'Jenis Kaos', 'required');
        $this->form_validation->set_rules('warna_kaos', 'Warna Kaos', 'required|trim');
        $this->form_validation->set_rules('ukuran[]', 'Ukuran', 'required');
        $this->form_validation->set_rules('jmlh_pesanan', 'Jumlah Pesanan', 'required|trim|numeric');
        $this->form_validation->set_rules('t_sablon', 'Teknik Sablon', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/pemesanan/form_pemesanan');
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'no_wa' => $this->input->post('no_wa', true),
                'alamat' => $this->input->post('alamat', true),
                'jenis_kaos' => implode(', ', $this->input->post('jenis_kaos', true)),
                'warna_kaos' => $this->input->post('warna_kaos', true),
                'ukuran' => implode(', ', $this->input->post('ukuran', true)),
                'jmlh_pesanan' => $this->input->post('jmlh_pesanan', true),
                't_sablon' => $this->input->post('t_sablon', true),
                'catatan' => $this->input->post('catatan', true),
                'foto_desain' => $this->_uploadImage()
            ];

            $this->Pesanan_model->insertPesanan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Pesanan berhasil disimpan!</div>');
            redirect(base_url('user/pemesanan/form_pemesanan'));
        }
    }

    private function _uploadImage() {
        $config['upload_path'] = './uploads/desain/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = uniqid();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_desain')) {
            return $this->upload->data('file_name');
        } else {
            return null; // Jika tidak ada upload
        }
    }


	public function bahan_post()
	{
		$data['title'] = 'Bahan Postingan';
		$data['files'] = $this->db->get('bahan_postingan')->result_array();
		$data['page'] = 'user/bahan_postingan/bahan_post';
		$this->load->view('templates/app', $data);
	}

	public function form_pemesanan()
	{
		$data['title'] = 'Form Pemesanan';
		$data['page'] = 'user/pemesanan/form_pemesanan';
		$this->load->view('templates/app', $data);
	}

	public function laporan_kerja()
	{
		$data['title'] = 'user/laporan_kerja';
		$data['page'] 	= 'user/laporan_kerja/laporan_kerja';
		$this->load->view('templates/app', $data);
	}

	public function upload_laporan()
	{
		$this->form_validation->set_rules('tanggal_laporan', 'Tanggal Laporan', 'required', [
			'required' => 'Tanggal laporan tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
			'required' => 'Deskripsi tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('kategori', 'Kategori', 'required', [
			'required' => 'Kategori harus dipilih.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('user/laporan_kerja');
		} else {
			$id_users = $this->session->userdata('id_users');
			$tanggal_laporan = $this->input->post('tanggal_laporan');
			$deskripsi = $this->input->post('deskripsi');
			$kategori = $this->input->post('kategori');
			$file_name = null;

			// Proses upload file
			if (!empty($_FILES['file_deskripsi']['name'])) {
				$config['upload_path'] = './uploads/laporan_kerja/';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
				$config['max_size'] = 10240; // Maksimum 2MB
				$config['file_name'] = time() . '_' . $_FILES['file_deskripsi']['name'];

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file_deskripsi')) {
					$file_name = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('error', 'Gagal mengunggah file: ' . $this->upload->display_errors());
					redirect('user/laporan_kerja'); // Kembali ke halaman form jika gagal
				}
			}

			// Simpan ke database
			$data = [
				'id_users' => $id_users,
				'tanggal_laporan' => $tanggal_laporan,
				'deskripsi' => $deskripsi,
				'file_deskripsi' => $file_name,
				'kategori' => $kategori
			];
			$this->db->insert('laporan_kerja', $data);

			$this->session->set_flashdata('success', 'Laporan kerja berhasil diunggah.');
			redirect('user/laporan_kerja');
		}
	}



	public function profil_perusahaan($page = '')
	{
		$pages = ['struktur', 'sejarah', 'jobdesk', 'produk', 'pengumuman'];
		if (in_array($page, $pages)) {
			$data['title'] = ucfirst($page) . ' Perusahaan';
			if ($page == 'pengumuman') {
				$this->load->model('Pengumuman_model');
				$data['dftr_pengumuman'] = $this->Pengumuman_model->get_all_pengumuman();
			}
			$data['page'] = 'user/profil_perusahaan/' . $page;
			$this->load->view('templates/app', $data);
		} else {
			show_404();
		}
	}



	public function profile()
	{
		$this->form_validation->set_rules('name', 'Nama', 'required|trim', [
			'required' => 'Nama tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required' => 'Email tidak boleh kosong.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$id = $this->session->userdata('id_users');
			$user = $this->profile->getProfile($id);

			$data['title']		= 'Biodata';
			$data['page'] 		= 'user/profile/profile';
			$data['user']		= $user;
			$data['position'] = $this->anggota->getPosition();

			$this->load->view('templates/app', $data);
		} else {
			$id = $this->input->post('id');

			$data = [
				'name'	=> $this->input->post('name'),
				'email' 	=> $this->input->post('email'),
				'gender'	=> $this->input->post('gender'),
			];

			// Jika foto diubah
			if (!empty($_FILES['photo']['name'])) {
				$upload 	 = $this->profile->uploadImage();

				// Jika upload berhasil
				if ($upload) {
					// Ambil data user
					$imageProfile = $this->profile->getProfile($id);
					// Hapus foto user sebelum di update
					if (file_exists('image/' . $imageProfile['photo']) && $imageProfile['photo']) {
						unlink('image/' . $imageProfile['photo']);
					}

					// Timpa data foto dengan nama yg baru
					$data['photo'] = $upload;
				} else {
					redirect(base_url("user/profile"));
				}
			}

			$this->profile->updateProfile($id, $data);
			$this->session->set_flashdata('message', 'Biodata Berhasil Diupdate. Silahkan login kembali untuk memperbaharui profile.');

			redirect(base_url('user/profile'));
		}
	}

	public function change_password()
	{
		$this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim', [
			'required' => 'Password baru tidak boleh kosong.',
		]);
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[new_password]', [
			'required' => 'Konfirmasi password tidak boleh kosong.',
			'matches'  => 'Konfirmasi password tidak sesuai'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data['title']		= 'Ubah Password';
			$data['page'] 		= 'user/profile/password';

			$this->load->view('templates/app', $data);
		} else {
			$id = $this->session->userdata('id_users');

			$data = [
				'password' => hashEncrypt($this->input->post('new_password')),
			];

			$this->user->updatePassword($id, $data);
			$this->session->set_flashdata('message', 'Password berhasil diupdate.');

			redirect(base_url('user'));
		}
	}
}

/* End of file User*/
