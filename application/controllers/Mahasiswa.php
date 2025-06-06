<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Aspirasi');
        $this->load->model('M_Mahasiswa');
        $this->load->model('M_User');

        if ($this->session->userdata('nim') == null) {
            redirect('auth/login');
        } else if ($this->session->userdata('id_petugas') != null) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard - Mahasiswa';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/mahasiswa_topbar');
        $this->load->view('mahasiswa/dashboard', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }
    public function aspirasi()
    {
        $data['aspirasi'] = $this->M_Aspirasi->queryAspirasiCurrentSession();
        $data['title'] = 'Aspirasi Saya';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/mahasiswa_topbar');
        $this->load->view('mahasiswa/aspirasi', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }
    public function ulasan()
    {
        if ($this->db->get_where('ulasan_mahasiswa', ['nim' => $this->session->userdata('nim')])->num_rows() >= 1) {
            $data['ulasan'] = $this->M_Mahasiswa->ulasan();
        }
        $data['countUlasan'] = $this->db->get_where('ulasan_mahasiswa', ['nim' => $this->session->userdata('nim')])->num_rows();
        $data['title'] = 'Beri Ulasan';

        $this->form_validation->set_rules('ulasan', 'Ulasan', 'required');
        $this->form_validation->set_rules('tk', 'Tingkat Kepuasan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('__partials/_head');
            $this->load->view('__partials/mahasiswa_topbar');
            $this->load->view('mahasiswa/ulasan', $data);
            $this->load->view('__partials/_footer');
            $this->load->view('__partials/_js');
        } else {
            $this->M_Mahasiswa->_sendUlasan();
        }
    }

    public function tanggapanBalik()
    {
        $this->M_Mahasiswa->_sendTanggapanBalik();
    }

    public function profile()
    {
        $data['user'] = $this->M_User->getMahasiswaCurrentSession();
        $data['title'] = 'Profil Saya';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/mahasiswa_topbar');
        $this->load->view('mahasiswa/profile', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }
}
