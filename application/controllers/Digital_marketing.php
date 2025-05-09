<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Digital_marketing extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    // Halaman utama untuk posting IG
    public function posting_ig() {
        $this->load->view('digital_marketing/posting_ig');
    }

    // Halaman utama untuk posting TikTok
    public function posting_tiktok() {
        $this->load->view('digital_marketing/posting_tiktok');
    }

    // Halaman utama untuk posting FB
    public function posting_fb() {
        $this->load->view('digital_marketing/posting_fb');
    }

    public function share_instagram() {
        if ($_FILES['file']['name']) {
            $filePath = $_FILES['file']['tmp_name'];
    
            // Bagikan file ke Instagram menggunakan Android Intent
            echo "<script>
                var fileUri = '$filePath';
                var intent = new Intent(Intent.ACTION_SEND);
                intent.setType('image/*');
                intent.putExtra(Intent.EXTRA_STREAM, fileUri);
                startActivity(Intent.createChooser(intent, 'Bagikan ke'));
            </script>";
        } else {
            echo "File tidak ditemukan!";
        }
    }    
}
