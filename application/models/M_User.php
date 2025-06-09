<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    function _addMahasiswa()
    {
        $data = [
            'nim' => htmlspecialchars($this->input->post('nim', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'status' => 'active',
            'telp' => $this->input->post('telp'),
            'alamat' => $this->input->post('alamat')
        ];
        $this->db->insert('mahasiswa', $data);
        $this->session->set_flashdata('addMahasiswaSuccess', 'Action Completed');
        redirect('master/mahasiswa');
    }

    function _addPetugas()
    {
        $data = [
            'id_petugas' => rand(10000, 99999),
            'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'telp' => $this->input->post('telp'),
            'level' => $this->input->post('level'),
            'status' => 'active',
        ];
        $this->db->insert('petugas', $data);
        $this->session->set_flashdata('addPetugasSuccess', 'Action Completed');
        redirect('master/petugas');
    }

    function getMahasiswaCurrentSession()
    {
        return $this->db->get_where('mahasiswa', ['nim' => $this->session->userdata('nim')])->row_array();
    }

    function updateStatusMahasiswa()
    {
        $nim = $this->uri->segment(3);

        $this->db->set('status', $this->input->post('status'));
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa');

        redirect('master/mahasiswa');
    }

    function updateStatusPetugas()
    {
        $id_petugas = $this->uri->segment(3);

        $this->db->set('status', $this->input->post('status'));
        $this->db->where('id_petugas', $id_petugas);
        $this->db->update('petugas');

        redirect('master/petugas');
    }
}