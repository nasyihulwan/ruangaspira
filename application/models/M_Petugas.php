<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Petugas extends CI_Model
{
    function queryAllPetugas() 
    {
        $this->db->where('id_petugas !=', $this->session->userdata('id_petugas'));
        $this->db->select('*');
        $this->db->from('petugas');

        return $this->db->get()->result();
    }
    function queryCurrentUser()
    {
        return $this->db->get_where('petugas', ['id_petugas' => $this->session->userdata('id_petugas')])->row_array();
    }
}