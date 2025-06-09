<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Tambah User Baru';
        $data['subtitle'] = '';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('pengaturan/user_add', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }

    public function petugas()
    {
        $data['title'] = 'Tambah User Baru - Petugas';
        $data['subtitle'] = 'Menambahkan petugas baru';

        $data['petugas_levels'] = $this->M_User->getPetugasLevels();

        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[petugas.username]', [
            'is_unique' => 'Username already exists!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
        $this->form_validation->set_rules('telp', 'Nomor Ponsel', 'numeric|required|trim');
        // Updated in_list to match new levels
        $this->form_validation->set_rules('level', 'Level', 'required|in_list[master_admin,hima_tekkom,prodi_tekkom]');

        if ($this->form_validation->run() == false) {
            $this->load->view('__partials/_head');
            $this->load->view('__partials/_sidebar');
            $this->load->view('pengaturan/user_add', $data);
            $this->load->view('__partials/_footer');
            $this->load->view('__partials/_js');
        } else {
            $this->M_User->_addPetugas();
        }
    }

    public function mahasiswa()
    {
        $data['title'] = 'Tambah User Baru - Mahasiswa';
        $data['subtitle'] = 'Menambahkan mahasiswa baru';

        $data['angkatan_list'] = $this->M_User->getAngkatanList();
        $data['prodi_list'] = $this->M_User->getProdiList();

        $this->form_validation->set_rules('nim', 'NIM', 'numeric|required|trim|is_unique[mahasiswa.nim]', [
            'is_unique' => 'NIM already exists!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[mahasiswa.username]', [
            'is_unique' => 'Username already exists!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
        $this->form_validation->set_rules('telp', 'Nomor Ponsel', 'numeric|required|trim');
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('__partials/_head');
            $this->load->view('__partials/_sidebar');
            $this->load->view('pengaturan/user_add', $data);
            $this->load->view('__partials/_footer');
            $this->load->view('__partials/_js');
        } else {
            $this->M_User->_addMahasiswa();
        }
    }
}