<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Lapor extends CI_Model
{
    function getAspirasiKategori()
    {
        $this->db->select('*');
        $this->db->from('aspirasi_kategori');
        $this->db->where('is_checked', '1');
        $this->db->order_by('nama_kategori', 'ASC');
        return $this->db->get()->result();
    }
}