<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('absensi_model', 'absensi');
    }
    
    public function upload()
    {
        $user_id = $this->session->userdata('id_users');
        $information = $this->input->post('information');
        
        if ($this->absensi->cekAbsensiHariIni($user_id)) {
            $this->session->set_flashdata('message', 'Anda sudah absen hari ini.');
        } else {
            // Konfigurasi upload
            $config['upload_path'] = './uploads/surat/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = $user_id . '_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $file_data = $this->upload->data();

                $data = [
                    'user_id' => $user_id,
                    'date' => date('Y-m-d'),
                    'time' => date('H:i:s'),
                    'information' => $information,
                    'status' => 1,
                    'file_name' => $file_data['file_name']
                ];

                $this->absensi->insertEntri($data);
                $this->session->set_flashdata('message', 'Entri kehadiran berhasil dengan surat.');
            } else {
                $this->session->set_flashdata('message', 'Gagal upload file: ' . $this->upload->display_errors('', ''));
            }
        }

        redirect(base_url('absensi/entri'));
    }
    public function entri()
	{
		$user_id = $this->session->userdata('id_users');
		$sudah_absen = $this->absensi->cekAbsensiHariIni($user_id);
		
		$data['title'] = 'Entri Kehadiran';
		$data['page']  = 'user/kehadiran/entri';
		$data['sudah_absen'] = $sudah_absen; // Tambahkan data pengecekan absensi

		$this->load->view('templates/app', $data);
	}


    public function masuk()
    {
        $user_id = $this->session->userdata('id_users');
        
        if ($this->absensi->cekAbsensiHariIni($user_id)) {
            $this->session->set_flashdata('message', 'Anda sudah absen hari ini.');
        } else {
            $data = [
                'user_id'       => $user_id,
                'date'          => date('Y-m-d'),
                'time'          => date('H:i:s'),
                'information'   => 'M',
                'status'        => 1
            ];

            $this->absensi->insertEntri($data);
            $this->session->set_flashdata('message', 'Entri kehadiran berhasil');
        }

        redirect(base_url('absensi/entri'));
    }

    public function ijin()
    {
        $user_id = $this->session->userdata('id_users');
        
        if ($this->absensi->cekAbsensiHariIni($user_id)) {
            $this->session->set_flashdata('message', 'Anda sudah absen hari ini.');
        } else {
            $data = [
                'user_id'       => $user_id,
                'date'          => date('Y-m-d'),
                'time'          => date('H:i:s'),
                'information'   => 'I',
                'status'        => 1
            ];

            $this->absensi->insertEntri($data);
            $this->session->set_flashdata('message', 'Entri kehadiran berhasil');
        }

        redirect(base_url('absensi/entri'));
    }

    public function sakit()
    {
        $user_id = $this->session->userdata('id_users');
        
        if ($this->absensi->cekAbsensiHariIni($user_id)) {
            $this->session->set_flashdata('message', 'Anda sudah absen hari ini.');
        } else {
            $data = [
                'user_id'       => $user_id,
                'date'          => date('Y-m-d'),
                'time'          => date('H:i:s'),
                'information'   => 'S',
                'status'        => 1
            ];

            $this->absensi->insertEntri($data);
            $this->session->set_flashdata('message', 'Entri kehadiran berhasil');
        }

        redirect(base_url('absensi/entri'));
    }

    public function tabel()
    {
        $data['title']  = 'Tabel Kehadiran';
        $data['page']   = 'user/kehadiran/tabel';
        $data['absensi'] = $this->absensi->getAbsensi();

        $this->load->view('templates/app', $data);
    }

    public function rekap()
    {
        $data['title']  = 'Rekap Kehadiran';
        $data['page']   = 'user/kehadiran/rekap';
        $data['hadir']  = $this->absensi->getHadir();
        $data['ijin']   = $this->absensi->getIjin();
        $data['sakit']  = $this->absensi->getSakit();

        $this->load->view('templates/app', $data);
    }
}

// End of file Absensi.php