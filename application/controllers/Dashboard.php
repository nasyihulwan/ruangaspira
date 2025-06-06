<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Mahasiswa');

        if ($this->session->userdata('nim') != null) {
            redirect('lapor');
        } else if($this->session->userdata('id_petugas') == null) {
            redirect('/');
        }
    }

    public function index()
    {
        $data['mahasiswaCount'] = $this->M_Mahasiswa->queryAllMahasiswa()->num_rows();
        $data['title'] = 'Dashboard';
        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }
    public function umChartFilter()
    {
        $data['mahasiswaCount'] = $this->M_Mahasiswa->queryAllMahasiswa()->num_rows();
        $data['title'] = 'Dashboard';

        $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('__partials/_head');
            $this->load->view('__partials/_sidebar');
            $this->load->view('dashboard', $data);
            $this->load->view('__partials/_footer');
            $this->load->view('__partials/_js');
        } else { 
            echo "Chart dari "  . $this->input->post('tanggal_awal') . " Sampai " . $this->input->post('tanggal_akhir');
        }
    }
}
