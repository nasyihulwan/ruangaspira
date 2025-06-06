<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
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

        $this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[petugas.username]', [
            'is_unique' => 'Username already exists!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
        $this->form_validation->set_rules('telp', 'Nomor Ponsel', 'numeric|required|trim');
        
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

    public function masyarakat()
    {
        $data['title'] = 'Tambah User Baru - Masyarakat';
        $data['subtitle'] = 'Menambahkan masyarakat baru';

        $this->form_validation->set_rules('nik', 'NIK', 'numeric|required|trim|is_unique[masyarakat.nik]', [
            'is_unique' => 'NIK already exists!'
        ]);
        $this->form_validation->set_rules('nama_masyarakat', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[masyarakat.username]', [
            'is_unique' => 'Username already exists!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
        $this->form_validation->set_rules('telp', 'Nomor Ponsel', 'numeric|required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('__partials/_head');
            $this->load->view('__partials/_sidebar');
            $this->load->view('pengaturan/user_add', $data);
            $this->load->view('__partials/_footer');
            $this->load->view('__partials/_js');
        } else {
            $this->M_User->_addMasyarakat();
        }
    
    }
}