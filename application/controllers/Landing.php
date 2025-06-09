<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Landing');
		$this->load->helper('url');

        if ($this->session->userdata('id_petugas') != null) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data['ulasan_mahasiswa'] = $this->M_Landing->queryTanggapanMahasiswa();
		$this->load->view('landing/index.php', $data);
    }
}
