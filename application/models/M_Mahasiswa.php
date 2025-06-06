<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Mahasiswa extends CI_Model
{
    function queryAllMahasiswa()
    {
        return $this->db->query('SELECT * FROM mahasiswa WHERE nim NOT LIKE "ANONYMOUS%"');
    }

    function _sendTanggapanBalik()
    {
        $data = [
            'tgl_tanggapan_balik' => date('Y-m-d'),
            'tanggapan_balik' => $this->input->post('tanggapan_balik')
        ];

        // Assuming 'id_aspirasi' is the correct foreign key in the 'tanggapan' table
        $this->db->where('id_aspirasi', $this->uri->segment(3));
        $this->db->update('tanggapan', $data);
        $this->session->set_flashdata('sendTanggapanBalikSuccess', 'Action Completed');
        redirect('mahasiswa/aspirasi'); // Changed redirect to 'mahasiswa/aspirasi'
    }

    function _sendUlasan()
    {
        $getLastId = $this->db->query("SELECT id_ulasan FROM ulasan_mahasiswa ORDER BY id_ulasan DESC LIMIT 1")->row_array();
        $nomorTerakhir = $getLastId['id_ulasan'];

        $check_ulasan = $this->db->get_where('ulasan_mahasiswa', ['nim' => $this->session->userdata('nim')])->num_rows();
        $is_censored = '';

        if($this->input->post('sensor') != null){
            $is_censored = $this->input->post('sensor');
        } else {
            $is_censored = '0';
        }

        if ($check_ulasan <= 0) {
            $data = [
                'id_ulasan' => buatKode($nomorTerakhir, 1, 4),
                'nim' => $this->session->userdata('nim'),
                'tgl_ulasan' => date('Y-m-d'),
                'ulasan' => $this->input->post('ulasan'),
                'tingkat_kepuasan' => $this->input->post('tk'),
                'is_censored' => $is_censored
            ];

            $this->db->insert('ulasan_mahasiswa', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Ulasan Anda berhasil dikirim!</div>');
            redirect('mahasiswa/ulasan'); // Changed redirect to 'mahasiswa/ulasan'
        } else if($check_ulasan >= 1) {
            $data = [
                'nim' => $this->session->userdata('nim'),
                'tgl_ulasan' => date('Y-m-d'),
                'ulasan' => $this->input->post('ulasan'),
                'tingkat_kepuasan' => $this->input->post('tk'),
                'is_censored' => $is_censored
            ];

            $this->db->where('nim', $this->session->userdata('nim'));
            $this->db->update('ulasan_mahasiswa', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Ulasan Anda berhasil diperbarui!</div>');
            redirect('mahasiswa/ulasan'); // Changed redirect to 'mahasiswa/ulasan'
        }
    }

    function ulasan()
    {
        return $this->db->get_where('ulasan_mahasiswa', ['nim' => $this->session->userdata('nim')])->row_array();
    }
}
