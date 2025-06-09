<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Laporan extends CI_Model
{
    function queryLaporan($status = "", $dari = "", $sampai = "") {

        if ($status != '*') {
            $this->db->where('status', $status);
        }
        $this->db->where('tgl_aspirasi >=', $dari);
        $this->db->where('tgl_aspirasi <=', $sampai);
        $this->db->select('*');
        $this->db->from('aspirasi');

        return $this->db->get()->result();
    }

function cetakLaporanSelesai()
{
    $this->db->select('
        mahasiswa.nim as m_nim, mahasiswa.nama as nama_mahasiswa, mahasiswa.telp as m_telp,
        aspirasi.id_aspirasi as a_id, aspirasi.judul_aspirasi, aspirasi.kategori, tgl_aspirasi, tgl_kejadian, isi_laporan, tempat_kejadian, aspirasi.lampiran_1 as al_1, aspirasi.lampiran_2 as al_2, aspirasi.lampiran_3 as al_3,
        aspirasi_selesai.id_selesai, tgl_selesai, aspirasi_selesai.lampiran_1 as as_1, aspirasi_selesai.lampiran_2 as as_2, aspirasi_selesai.lampiran_3 as as_3, aspirasi_selesai.id_petugas as petugas_selesai,
        petugas.*,
        aspirasi_kategori.nama_kategori as nama_kategori_aspirasi
    ');
    $this->db->from('mahasiswa');
    $this->db->join('aspirasi', 'mahasiswa.nim = aspirasi.nim');
    $this->db->join('aspirasi_selesai', 'aspirasi.id_aspirasi = aspirasi_selesai.id_aspirasi');
    $this->db->join('petugas', 'aspirasi_selesai.id_petugas = petugas.id_petugas');
    $this->db->join('aspirasi_kategori', 'aspirasi.kategori = aspirasi_kategori.id');
    $this->db->where('aspirasi.id_aspirasi', $this->uri->segment(3));
    $this->db->where('aspirasi.status', 'selesai');
    return $this->db->get()->row_array();
}
}