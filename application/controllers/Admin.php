<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		$this->load->model('admin_model', 'admin');
		$this->load->model('Pengumuman_model');
		$this->load->model('Pesanan_model');
		// $this->load->library('excel');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['page'] 	= 'dashboard/index';
		$this->load->view('templates/app', $data);
	}


	public function list_pesanan()
	{
		$data['pesanan'] = $this->Pesanan_model->getAllPesanan();
		$data['title'] = 'List Pesanan';
		$data['page'] 	= 'admin/pemesanan/list_pemesanan';
		$this->load->view('templates/app', $data);
	}

    public function export_excel() {
        $pesanan = $this->Pesanan_model->getAllPesanan();

        // Buat objek Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->setActiveSheetIndex(0);

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Lengkap');
        $sheet->setCellValue('C1', 'Nomor WhatsApp');
        $sheet->setCellValue('D1', 'Alamat');
        $sheet->setCellValue('E1', 'Jenis Kaos');
        $sheet->setCellValue('F1', 'Warna Kaos');
        $sheet->setCellValue('G1', 'Ukuran');
        $sheet->setCellValue('H1', 'Jumlah Pesanan');
        $sheet->setCellValue('I1', 'Teknik Sablon');
        $sheet->setCellValue('J1', 'Catatan');
        $sheet->setCellValue('K1', 'Desain');

        // Data
        $row = 2;
        $no = 1;
        foreach ($pesanan as $p) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $p['nama']);
            $sheet->setCellValue('C' . $row, $p['no_wa']);
            $sheet->setCellValue('D' . $row, $p['alamat']);
            $sheet->setCellValue('E' . $row, $p['jenis_kaos']);
            $sheet->setCellValue('F' . $row, $p['warna_kaos']);
            $sheet->setCellValue('G' . $row, $p['ukuran']);
            $sheet->setCellValue('H' . $row, $p['jmlh_pesanan']);
            $sheet->setCellValue('I' . $row, $p['t_sablon']);
            $sheet->setCellValue('J' . $row, $p['catatan']);
            $sheet->setCellValue('K' . $row, base_url('uploads/desain/' . $p['foto_desain']));
            $row++;
        }

        // Nama file dan output
        $filename = 'Data_Pesanan_' . date('Ymd_His') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Simpan file menggunakan Xlsx writer
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }


	public function pengumuman_upload_process() {
		$config['upload_path'] = './uploads/pengumuman/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);
	
		if (!$this->upload->do_upload('foto')) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect('admin/pengumuman_upload'); // Redirect jika upload gagal
		} else {
			$file_data = $this->upload->data();
			$data = [
				'judul' => $this->input->post('judul'),
				'foto' => $file_data['file_name'],
			];
			$this->Pengumuman_model->insert_pengumuman($data);  // Menyimpan data ke database
			$this->session->set_flashdata('success', 'Pengumuman berhasil diunggah!');
			redirect('admin/pengumuman_list');  // Redirect ke list pengumuman
		}
	}
	

    public function pengumuman_upload() {
        $data['title'] = 'Upload Pengumuman';  // Pastikan title diatur
		$data['page'] = 'admin/pengumuman/upload_pengumuman'; // Halaman upload pengumuman
		$this->load->view('templates/app', $data);
    }

    public function pengumuman_list() {
		$data['pengumuman'] = $this->Pengumuman_model->get_all_pengumuman(); // Ambil data pengumuman dari model
		$data['title'] = 'List Pengumuman';  // Set title halaman
		$data['page'] = 'admin/pengumuman/list_pengumuman'; // Halaman list pengumuman
		$this->load->view('templates/app', $data);
    }


    public function delete($id_pengumuman) {
		// Pastikan model sudah dimuat di constructor
		$this->Pengumuman_model->delete_pengumuman($id_pengumuman);
		$this->session->set_flashdata('success', 'Pengumuman berhasil dihapus!');
		redirect('admin/pengumuman_list');
	}


	public function up_bahan()
	{
		$data['title'] = 'Upload Bahan';
		$data['page'] = 'admin/bahan_postingan/up_bahan';
		$this->load->view('templates/app', $data);
	}

	public function bahan_post()
	{
		$data['title'] = 'Bahan Postingan';
		$data['files'] = $this->db->get('bahan_postingan')->result_array();
		$data['page'] = 'admin/bahan_postingan/bahan_post';
		$this->load->view('templates/app', $data);
	}

	public function upload_bahan() 
	{
		// Set validation rules
		$this->form_validation->set_rules('upload_date', 'Tanggal', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Load the form again if validation fails
			$data['title'] = 'Upload Bahan';
			$data['page'] = 'admin/bahan_postingan/up_bahan';
			$this->load->view('templates/app', $data);
		} else {
			// Check if file is uploaded
			if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] == 0) {
				$config['upload_path'] = './uploads/bahan_postingan/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|avi|mov';
				$config['max_size'] = 102400; // 100 MB

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file_upload')) {
					$file_data = $this->upload->data();
					$upload_date = $this->input->post('upload_date');
					$file_name = $file_data['file_name'];
					$file_type = $file_data['file_type'];
					$file_size = $file_data['file_size'];

					// Insert data into the database
					$data = [
						'upload_date' => $upload_date,
						'file_name'   => $file_name,
						'file_type'   => $file_type,
						'file_size'   => $file_size
					];
					$this->db->insert('bahan_postingan', $data);

					// Redirect to bahan_post.php after success
					redirect(base_url('admin/bahan_postingan/bahan_post'));
				} else {
					$this->session->set_flashdata('error', 'File upload failed. Please try again.');
					redirect(base_url('admin/bahan_postingan/up_bahan'));
				}
			}
		}
	}

	public function laporan_kerja($kategori = 'screenshoot_postingan')
	{
		$data['title'] = 'Laporan Kerja';
		$data['kategori'] = $kategori;
		$data['laporan'] = $this->db->get_where('laporan_kerja', ['kategori' => $kategori])->result_array();
		$data['page'] = 'admin/laporan_kerja/laporan_kerja';
		$this->load->view('templates/app', $data);
	}
	
	public function profile()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]',[
			'required' => 'Email tidak boleh kosong.',
			'is_unique'=> 'Email sudah terdaftar.'
		]);

		if($this->form_validation->run() == FALSE){
			$data['title']		= 'Biodata';
			$data['page'] 		= 'admin/profile/profile';
			$data['admin']		= $this->admin->getAdminProfile();
			$data['position'] = $this->admin->getPosition();

			$this->load->view('templates/app', $data);
		}else{
			$data = [
				'email' => $this->input->post('email'),
			];

			$this->admin->updateProfile($data);
			$this->session->set_flashdata('message', 'Data admin berhasil diupdate.');

			redirect(base_url('admin'));
		}
	}

	public function change_password()
	{
		$this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim',[
			'required' => 'Password baru tidak boleh kosong.',
		]);
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[new_password]',[
			'required' => 'Konfirmasi password tidak boleh kosong.',
			'matches'  => 'Konfirmasi password tidak sesuai'
		]);

		if($this->form_validation->run() == FALSE){
			$data['title']		= 'Ubah Password';
			$data['page'] 		= 'admin/profile/password';

			$this->load->view('templates/app', $data);
		}else{
			$data = [
				'password' => hashEncrypt($this->input->post('new_password')),
			];

			$this->admin->updatePassword($data);
			$this->session->set_flashdata('message', 'Password berhasil diupdate.');

			redirect(base_url('admin'));
		}
	}

}

/* End of file Anggota.php */
