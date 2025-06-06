<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Petugas');
        
        if ($this->session->userdata('level') != 'master admin' && $this->session->userdata('level') != 'admin') {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data['petugas'] = $this->M_Petugas->queryAllPetugas();
        $data['title'] = 'Data Petugas';
        $data['subtitle'] = 'List data petugas yang terdaftar';
        
        
        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('master/petugas/index', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }
}