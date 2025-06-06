<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    function _addMasyarakat()
    {
        $data = [
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'nama' => htmlspecialchars($this->input->post('nama_masyarakat', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'status' => 'active',
            'telp' => $this->input->post('telp'),
            'alamat' => $this->input->post('alamat')
        ];
        $this->db->insert('masyarakat', $data);
        $this->session->set_flashdata('addMasyarakatSuccess', 'Action Completed');
        redirect('master/masyarakat');
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

    function getMasyarakatCurrentSession()
    {
        return $this->db->get_where('masyarakat', ['nik' => $this->session->userdata('nik')])->row_array();
    }

    function updateStatusMasyarakat()
    {
        $nik = $this->uri->segment(3);

        $this->db->set('status', $this->input->post('status'));
        $this->db->where('nik', $nik);
        $this->db->update('masyarakat');

        redirect('master/masyarakat');
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