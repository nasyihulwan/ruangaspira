<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Selesai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Aspirasi');
        
    }

    public function index()
    {
        $data['queryAspirasi'] = $this->M_Aspirasi->queryAspirasiSelesai();
        $data['title'] = 'Data Aspirasi - Selesai';
        $data['subtitle'] = 'Laporan Aspirasi yang telah selesai';
        
        
        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('master/aspirasi/index', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }

    function detail($id_aspirasi)
    {
        $data['queryAspirasi'] = $this->M_Aspirasi->queryDetailAspirasiSelesai($id_aspirasi);
        $data['title'] = 'Data Aspirasi - Selesai Detail';
        $data['subtitle'] = 'Detail data aspirasi dengan status selesai';
        
        
        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('master/aspirasi/selesai_detail', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }
}
