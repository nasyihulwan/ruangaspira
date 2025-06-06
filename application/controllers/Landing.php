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
        $data['ulasan'] = $this->M_Landing->queryTanggapanMahasiswa();

        // $this->load->view('landing/_partials/_head');
        // $this->load->view('landing/_partials/_headers/landing_header');
        // $this->load->view('landing/_partials/_about');
        // $this->load->view('landing/_partials/_faq');
        // $this->load->view('landing/_partials/_review');
        // $this->load->view('landing/_partials/_login');
        // $this->load->view('landing/_partials/_footer');
        // $this->load->view('landing/_partials/js');

		$this->load->view('landing/index.php');
    }
}
