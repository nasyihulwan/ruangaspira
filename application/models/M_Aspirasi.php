<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Aspirasi extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function getAspirasiById($id_aspirasi)
    {
        $this->db->select('a.*, ak.nama_kategori, m.nama as nama_pelapor, m.prodi, m.angkatan');
        $this->db->from('aspirasi a');
        $this->db->join('aspirasi_kategori ak', 'a.kategori = ak.id');
        $this->db->join('mahasiswa m', 'a.nim = m.nim');
        $this->db->where('a.id_aspirasi', $id_aspirasi);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function updateAspirasi($id_aspirasi, $data)
    {
        $this->db->where('id_aspirasi', $id_aspirasi);
        return $this->db->update('aspirasi', $data);
    }

    public function getAspirasiByStatus($status)
    {
        $this->db->select('a.*, ak.nama_kategori, m.nama as nama_pelapor, m.prodi, m.angkatan');
        $this->db->from('aspirasi a');
        $this->db->join('aspirasi_kategori ak', 'a.kategori = ak.id');
        $this->db->join('mahasiswa m', 'a.nim = m.nim');
        $this->db->where('a.status', $status);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAspirasiByStatusAndTingkat($status, $tingkat)
    {
        $this->db->select('a.*, ak.nama_kategori, m.nama as nama_pelapor, m.prodi, m.angkatan');
        $this->db->from('aspirasi a');
        $this->db->join('aspirasi_kategori ak', 'a.kategori = ak.id');
        $this->db->join('mahasiswa m', 'a.nim = m.nim');
        $this->db->where('a.status', $status);
        $this->db->where('a.tingkat', $tingkat);
        $query = $this->db->get();
        return $query->result();
    }

    function queryTolakAspirasi()
    {
        $this->db->select('a.*, ak.nama_kategori, m.nama as nama_pelapor, m.prodi, m.angkatan');
        $this->db->from('aspirasi a');
        $this->db->join('aspirasi_kategori ak', 'a.kategori = ak.id');
        $this->db->join('mahasiswa m', 'a.nim = m.nim');
        $this->db->where('a.status', 'tolak');
        return $this->db->get()->result();
    }

    function queryVerifikasiAspirasi()
    {
        $this->db->select('a.*, ak.nama_kategori, m.nama as nama_pelapor, m.prodi, m.angkatan');
        $this->db->from('aspirasi a');
        $this->db->join('aspirasi_kategori ak', 'a.kategori = ak.id');
        $this->db->join('mahasiswa m', 'a.nim = m.nim');
        $this->db->where('a.status', '0');
        return $this->db->get()->result();
    }

    function queryProsesAspirasi()
    {
        $this->db->select('a.*, ak.nama_kategori, m.nama as nama_pelapor, m.prodi, m.angkatan');
        $this->db->from('aspirasi a');
        $this->db->join('aspirasi_kategori ak', 'a.kategori = ak.id');
        $this->db->join('mahasiswa m', 'a.nim = m.nim');
        $this->db->where('a.status', 'proses');
        return $this->db->get()->result();
    }

    function queryAspirasiSelesai()
    {
        $this->db->select('a.id_aspirasi as p_id, ase.id_aspirasi as ps_id, a.*, ak.*, ase.*, m.nama as nama_pelapor, m.prodi, m.angkatan');
        $this->db->from('aspirasi a');
        $this->db->join('aspirasi_kategori ak', 'a.kategori = ak.id');
        $this->db->join('aspirasi_selesai ase', 'a.id_aspirasi = ase.id_aspirasi');
        $this->db->join('mahasiswa m', 'a.nim = m.nim');
        $this->db->where('a.status', 'selesai');
        return $this->db->get()->result();
    }

    function queryDetailAspirasi($id_aspirasi)
    {
        $this->db->where('a.id_aspirasi', $id_aspirasi);
        $this->db->select('a.*, a.id_aspirasi as p_id, ak.*, m.nama as nama_pelapor, m.prodi, m.angkatan');
        $this->db->from('aspirasi a');
        $this->db->join('aspirasi_kategori ak', 'a.kategori = ak.id');
        $this->db->join('mahasiswa m', 'a.nim = m.nim');
        return $this->db->get()->row_array();
    }

    function queryDetailAspirasiSelesai($id_aspirasi)
    {
        $this->db->where('a.id_aspirasi', $id_aspirasi);
        $this->db->select('
            a.*, a.id_aspirasi as p_id, ak.*, ase.tgl_selesai, pt.*, ase.lampiran_1 as ls_1, ase.lampiran_2 as ls_2, ase.lampiran_3 as ls_3, m.nama as nama_pelapor, m.prodi, m.angkatan
        ');
        $this->db->from('aspirasi a');
        $this->db->join('aspirasi_kategori ak', 'a.kategori = ak.id');
        $this->db->join('aspirasi_selesai ase', 'a.id_aspirasi = ase.id_aspirasi');
        $this->db->join('petugas pt', 'ase.id_petugas = pt.id_petugas');
        $this->db->join('mahasiswa m', 'a.nim = m.nim');
        return $this->db->get()->row_array();
    }

    function updateSelesai() {
        $id = $this->uri->segment(4);
        $this->db->set('status', 'selesai');
        $this->db->where('id_aspirasi', $id);
        $this->db->update('aspirasi');
    }

    function queryAspirasiCurrentSession()
    {
        $this->db->select('a.*, a.id_aspirasi as p_id, ak.*, ase.tgl_selesai, ase.lampiran_1 as ls_1, ase.lampiran_2 as ls_2, ase.lampiran_3 as ls_3, ad.alasan, m.prodi, m.angkatan');
        $this->db->from('aspirasi a');
        $this->db->join('aspirasi_kategori ak', 'a.kategori = ak.id');
        $this->db->join('mahasiswa m', 'a.nim = m.nim');
        $this->db->join('aspirasi_selesai ase', 'a.id_aspirasi = ase.id_aspirasi', 'LEFT');
        $this->db->join('aspirasi_ditolak ad', 'a.id_aspirasi = ad.id_aspirasi', 'LEFT');
        $this->db->where('a.nim', $this->session->userdata('nim'));
        return $this->db->get()->result();
    }

    function _selesai()
    {
        $id_aspirasi = $this->input->post('id_aspirasi');
        $lampiran_1 = $_FILES['lampiran_1']['name'];
        $lampiran_2 = $_FILES['lampiran_2']['name'];
        $lampiran_3 = $_FILES['lampiran_3']['name'];

        if ($lampiran_1) {
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|mp4';
            $config['max_size'] = '10240';
            $config['upload_path'] = './assets/images/laporan/selesai/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('lampiran_1')) {
                $lampiran_1 = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('aspirasi');
            }
        }
        if ($lampiran_2) {
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|mp4';
            $config['max_size'] = '10240';
            $config['upload_path'] = './assets/images/laporan/selesai/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('lampiran_2')) {
                $lampiran_2 = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('aspirasi');
            }
        }
        if ($lampiran_3) {
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|mp4';
            $config['max_size'] = '10240';
            $config['upload_path'] = './assets/images/laporan/selesai/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('lampiran_3')) {
                $lampiran_3 = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('aspirasi');
            }
        }

        $data = [
            'id_selesai' => rand(10000, 99999),
            'id_aspirasi' => $id_aspirasi,
            'tgl_selesai' => date('Y-m-d'),
            'lampiran_1' => $lampiran_1,
            'lampiran_2' => $lampiran_2,
            'lampiran_3' => $lampiran_3,
            'id_petugas' => $this->session->userdata('id_petugas')
        ];

        $this->db->insert('aspirasi_selesai', $data);
        $this->db->set('status', 'selesai');
        $this->db->where('id_aspirasi', $id_aspirasi);
        $this->db->update('aspirasi');
        $this->session->set_flashdata('updateSelesai', 'Action Completed');
        redirect('aspirasi/proses');
    }

    public function tolakAspirasi()
    {
        $id = $this->uri->segment(4);
        $this->db->set('status', 'tolak');
        $this->db->where('id_aspirasi', $id);
        $this->db->update('aspirasi');

        $data = [
            'id_tolak' => rand(10000, 99999),
            'id_aspirasi' => $id,
            'alasan' => $this->input->post('alasan_tolak'),
            'id_petugas' => $this->session->userdata('id_petugas')
        ];
        $this->db->insert('aspirasi_ditolak', $data);
        $this->session->set_flashdata('tolakSuccess', 'Action Completed');
        redirect('aspirasi/vnv');
    }

    function getAspirasiKategori()
    {
        $this->db->select('*');
        $this->db->from('aspirasi_kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        return $this->db->get()->result();
    }

    function hapus()
    {
        $id = $this->uri->segment(4);
        $this->db->where('id_aspirasi', $id);
        $this->db->delete('aspirasi_ditolak');
        $this->db->where('id_aspirasi', $id);
        $this->db->delete('aspirasi');
        $this->session->set_flashdata('deleteSuccess', 'Action Completed');
        redirect('aspirasi/ditolak');
    }
}