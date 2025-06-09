<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Auth extends CI_Model
{
    function _register()
    {
        $data = [
            'nim' => htmlspecialchars($this->input->post('nim', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'telp' => $this->input->post('telp'),
            'alamat' => $this->input->post('alamat')
        ];
        $this->db->insert('mahasiswa', $data);
        $this->session->set_flashdata('message', '<div class="card-header"><h4 class="card-title">Akun berhasil dibuat! Silakan Login.</h4></div>');
        redirect('auth/login');
    }

function _login() {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $mahasiswa = $this->db->get_where('mahasiswa', ['username' => $username])->row_array();
    $petugas = $this->db->get_where('petugas', ['username' => $username])->row_array();

    if ($mahasiswa) {
        if ($mahasiswa['status'] === 'deleted') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Akun anda dinonaktifkan, silahkan hubungi admin!</div>');
            redirect('auth/login');
        }

        if (password_verify($password, $mahasiswa['password'])) {
            $data = [
                'nama' => $mahasiswa['nama'],
                'nim' => $mahasiswa['nim']
            ];
            $this->session->set_userdata($data);
            redirect('mahasiswa/aspirasi');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Password salah!</div>');
            redirect('auth/login');
        }
    } else if($petugas) {
        if ($petugas['status'] === 'deleted') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Akun anda telah dinonaktifkan, silahkan hubungi admin!</div>');
            redirect('auth/login');
        }

        if (password_verify($password, $petugas['password'])) {
            $data = [
                'id_petugas' => $petugas['id_petugas'],
                'nama_petugas' => $petugas['nama_petugas'],
                'level' => $petugas['level']
            ];
            $this->session->set_userdata($data);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Password salah!</div>');
            redirect('auth/login');
        }
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Username atau password salah!</div>');
        redirect('auth/login');
    }
}
}