<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ditolak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Aspirasi');
        
        $this->load->helper('email');
    }

    public function index()
    {
        $data['queryAspirasi'] = $this->M_Aspirasi->queryTolakAspirasi();
        $data['title'] = 'Data Aspirasi - Ditolak';
        $data['subtitle'] = 'List data aspirasi yang ditolak';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('master/aspirasi/index', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');

    }

    public function hapus()
    {
        $this->M_Aspirasi->hapus();
    }

    public function pulihkan()
    {
        $id = $this->uri->segment(4);
        $aspirasi = $this->M_Aspirasi->getAspirasiById($id);
        $this->db->where('id_aspirasi', $id);
        $this->db->delete('aspirasi_ditolak');

        $this->db->set('status', '0');
        $this->db->set('tgl_ditolak', NULL);
        $this->db->where('id_aspirasi', $id);
        $this->db->update('aspirasi');

        $old_status = $aspirasi['status'];
        $new_status = 'proses';

        $email_sent = send_status_update_email(
                $aspirasi['email_mahasiswa'],
                $aspirasi['judul'],
                $old_status,
                $new_status,
        );

        $this->session->set_flashdata('pulihSuccess', 'Action Completed');
        redirect('aspirasi/ditolak');
    }

}