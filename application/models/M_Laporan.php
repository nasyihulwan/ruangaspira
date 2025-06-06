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
        masyarakat.nik as m_nik,masyarakat.nama as nama_masyarakat,masyarakat.telp as m_telp,
        pengaduan.id_pengaduan as p_id,pengaduan.judul_laporan,pengaduan.kategori,tgl_pengaduan,tgl_kejadian,isi_laporan,tempat_kejadian,pengaduan.lampiran_1 as pl_1,pengaduan.lampiran_2 as pl_2,pengaduan.lampiran_3 as pl_3,
        tanggapan.id_tanggapan,tanggapan.tgl_tanggapan as tgl_tanggapan_petugas,tanggapan.tgl_tanggapan_balik as tgl_tanggapan_masyarakat,tanggapan.tanggapan as tanggapan_petugas,tanggapan.tanggapan_balik as tanggapan_masyarakat,
        pengaduan_selesai.id_selesai,tgl_selesai,pengaduan_selesai.lampiran_1 as ps_1,pengaduan_selesai.lampiran_2 as ps_2,pengaduan_selesai.lampiran_3 as ps_3,pengaduan_selesai.id_petugas as petugas_selesai,
        petugas.*,
        pengaduan_kategori.*
        ');
        $this->db->from('masyarakat');
        $this->db->join('pengaduan', 'masyarakat.nik = pengaduan.nik');
        $this->db->join('tanggapan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan');
        $this->db->join('pengaduan_selesai', 'pengaduan.id_pengaduan = pengaduan_selesai.id_pengaduan');
        $this->db->join('petugas', 'pengaduan_selesai.id_petugas = petugas.id_petugas');
        $this->db->join('pengaduan_kategori', 'pengaduan.kategori = pengaduan_kategori.id');
        $this->db->where('pengaduan.id_pengaduan', $this->uri->segment(4));
        $this->db->where('pengaduan.status', 'selesai');
        return $this->db->get()->row_array();
    }
}