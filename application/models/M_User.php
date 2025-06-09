<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    public function _addPetugas()
    {
        $data = [
            'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'telp' => htmlspecialchars($this->input->post('telp', true)),
            'level' => htmlspecialchars($this->input->post('level', true)),
            'status' => 'active'
        ];
        $this->db->insert('petugas', $data);
        $this->session->set_flashdata('addPetugasSuccess', 'Action Completed');
        redirect('master/petugas');
    }

    public function _addMahasiswa()
    {
        $data = [
            'nim' => htmlspecialchars($this->input->post('nim', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'status' => 'active',
            'telp' => htmlspecialchars($this->input->post('telp', true)),
            'angkatan' => htmlspecialchars($this->input->post('angkatan', true)),
            'prodi' => htmlspecialchars($this->input->post('prodi', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true))
        ];
        $this->db->insert('mahasiswa', $data);
        $this->session->set_flashdata('addMahasiswaSuccess', 'Action Completed');
        redirect('master/mahasiswa');
    }

    public function getAngkatanList()
    {
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('angkatan')->result();
    }

    public function getProdiList()
    {
        $this->db->order_by('nama_prodi', 'ASC');
        return $this->db->get('prodi')->result();
    }

    public function getPetugasLevels()
    {
        return ['master_admin', 'hima_tekkom', 'prodi_tekkom'];
    }
}