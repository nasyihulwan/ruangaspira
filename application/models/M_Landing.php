<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Landing extends CI_Model
{
    function queryTanggapanMahasiswa()
    {
        // Select all from ulasan_mahasiswa, and specific columns (nama, angkatan, prodi) from mahasiswa
        $this->db->select('ulasan_mahasiswa.*, mahasiswa.nama as mn, mahasiswa.angkatan, mahasiswa.prodi');
        $this->db->from('ulasan_mahasiswa');
        $this->db->join('mahasiswa', 'ulasan_mahasiswa.nim = mahasiswa.nim', 'LEFT');
        $this->db->order_by('tingkat_kepuasan', 'ASC');
        $this->db->limit(9);
        return $this->db->get()->result();
    }
}