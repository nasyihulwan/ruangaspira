<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Mahasiswa');

        if ($this->session->userdata('level') != 'master_admin') {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data['mahasiswa'] = $this->M_Mahasiswa->queryAllMahasiswa()->result();
        $data['title'] = 'Data Mahasiswa';
        $data['subtitle'] = 'List data mahasiswa yang terdaftar';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('master/mahasiswa/index', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }
}
