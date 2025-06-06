<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Aspirasi');
        $this->load->model('M_Petugas');
        $this->load->model('M_User');
    }

    public function profile()
    {
        $data['user'] = $this->M_Petugas->queryCurrentUser();
        $data['title'] = 'Profile Saya';
        $data['subtitle'] = '';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('pengaturan/profile', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }

    public function kategori()
    {
        $data['kategoriAspirasi'] = $this->M_Aspirasi->getAspirasiKategori();
        $data['title'] = 'Data Kategori Aspirasi';
        $data['subtitle'] = 'Untuk mengelola Data Kategori';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('pengaturan/kategori_aspirasi', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }

    public function tambahKategori()
    {
        $data['kategoriAspirasi'] = $this->M_Aspirasi->getAspirasiKategori();
        $data['title'] = 'Tambah Data Kategori Aspirasi';
        $data['subtitle'] = 'Untuk menambah data kategori';

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        $is_checked = '0';
        if ($this->input->post('is_checked') != null) {
            $is_checked = '1';
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('__partials/_head');
            $this->load->view('__partials/_sidebar');
            $this->load->view('pengaturan/kategori_tambah', $data);
            $this->load->view('__partials/_footer');
            $this->load->view('__partials/_js');
        } else {
            $data = [
                'id' => 'KAT' . rand(10000, 99999),
                'nama_kategori' => $this->input->post('nama_kategori'),
                'is_checked' => $is_checked,
            ];

            $this->db->insert('aspirasi_kategori', $data);
            $this->session->set_userdata('insertKategori', 'Action Success');
            redirect('pengaturan/kategori');
        }

    }

    public function updateKategori()
    {
        $id = $this->uri->segment(3);

        if ($this->input->post('is_checked') == null) {
            $this->db->set('is_checked', '0');
        } else {
            $this->db->set('is_checked', $this->input->post('is_checked'));
        }
        $this->db->where('id', $id);
        $this->db->update('aspirasi_kategori');

        redirect('pengaturan/kategori');

    }
    public function updateStatusMahasiswa()
    {
        $this->M_User->updateStatusMahasiswa();

    }

    public function updateStatusPetugas()
    {
        $this->M_User->updateStatusPetugas();
    }
}
