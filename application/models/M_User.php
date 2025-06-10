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

    public function getMahasiswaByNim($nim)
{
    return $this->db->get_where('mahasiswa', ['nim' => $nim])->row();
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

    public function get_email_by_nim($nim) {
        return $this->db->select('email')->get_where('mahasiswa', ['nim' => $nim])->row();
    }
}