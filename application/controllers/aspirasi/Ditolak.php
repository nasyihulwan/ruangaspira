<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ditolak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Aspirasi');
    }

    public function index()
    {
        $data['queryAspirasi'] = $this->M_Aspirasi->queryTolakAspirasi();
        $data['title'] = 'Data Aspirasi - Ditolak';
        $data['subtitle'] = 'List data aspirasi yang ditolak';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('master/aspirasi/index', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');

    }

    public function hapus()
    {
        $this->M_Aspirasi->hapus();
    }

    public function pulihkan()
    {
        $id = $this->uri->segment(4);

        $this->db->where('id_aspirasi', $id);
        $this->db->delete('aspirasi_ditolak');

        $this->db->set('status', '0');
        $this->db->where('id_aspirasi', $id);
        $this->db->update('aspirasi');

        $this->session->set_flashdata('pulihSuccess', 'Action Completed');
        redirect('aspirasi/ditolak');
    }

}