<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Lapor');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('session');

        if ($this->session->userdata('nim') == null) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('judul_aspirasi', 'Judul Aspirasi', 'required|trim');
        $this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required|trim');
        $this->form_validation->set_rules('tempat_kejadian', 'Tempat Kejadian', 'required|trim');
        $this->form_validation->set_rules('tgl_kejadian', 'Tanggal Kejadian', 'trim');
        $this->form_validation->set_rules('aspirasi_kategori', 'Kategori Aspirasi', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['kategori_aspirasi'] = $this->M_Lapor->getAspirasiKategori();
            if (validation_errors()) {
                $this->session->set_flashdata('form_errors', validation_errors());
            }
            $this->load->view('landing/input.php', $data);
        } else {
            $this->M_Lapor->_sendLapor();
        }
    }
}
