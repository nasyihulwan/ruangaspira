<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Auth');
    }

    public function index()
    {
        if ($this->session->userdata('nim') != null) {
            redirect('aspirasi');
        } else if ($this->session->userdata('id_petugas') != null) {
            redirect('dashboard');
        } else {
        }
        redirect('auth/login');
    }

    public function login()
    {
        if ($this->session->userdata('nim') != null) {
            redirect('mahasiswa/aspirasi');
        } else if ($this->session->userdata('id_petugas') != null) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->M_Auth->_login();
        }
    }

    public function register()
    {
        if ($this->session->userdata('nim') != null) {
            redirect('aspirasi');
        } else if ($this->session->userdata('id_petugas') != null) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('nim', 'NIM', 'numeric|required|trim|is_unique[mahasiswa.nim]', [
            'is_unique' => 'NIM already exists!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telp / Nomor Ponsel', 'numeric');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[10]');

        if ($this->form_validation->run() == false) {
            $this->load->view('__partials/_head');
            $this->load->view('auth/register');
        } else {
            $this->M_Auth->_register();
        }
    }

    public function m_logout()
    {
        $data = ['nama', 'nim'];
        $this->session->unset_userdata($data);
        redirect('/');
    }

    public function logout()
    {
        $this->session->unset_userdata('id_petugas');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('level');
        redirect('/');
    }
}