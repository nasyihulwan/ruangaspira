<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Aspirasi');
        $this->load->helper('form');
        $this->load->helper('email');
        $this->load->library('session');
    }

    public function index()
    {
        $user_level = $this->session->userdata('level');
        $data['title'] = 'Data Aspirasi - Proses';
        $data['subtitle'] = 'Tindaklanjuti aspirasi sebelum menyelesaikan';

        if ($user_level === 'prodi_tekkom') {
            $data['queryAspirasi'] = $this->M_Aspirasi->getAspirasiByStatusAndTingkat('proses', 'prodi');
        } else {
            $data['queryAspirasi'] = $this->M_Aspirasi->getAspirasiByStatus('proses');
        }

        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('master/aspirasi/index', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }

    function detail($id_aspirasi)
    {
        $data['queryAspirasi'] = $this->M_Aspirasi->queryDetailAspirasi($id_aspirasi);
        $data['title'] = 'Data Aspirasi - Proses Detail';
        $data['subtitle'] = 'Pastikan kebenaran aspirasi sebelum melakukan verifikasi';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('master/aspirasi/proses_detail', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }

    public function updateSelesai()
    {
        $this->load->library('upload');
        $id_aspirasi = $this->input->post('id_aspirasi');

        // Ambil data aspirasi untuk mendapatkan info email, judul, dll.
        $aspirasi = $this->M_Aspirasi->getAspirasiById($id_aspirasi);
        if (!$aspirasi) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aspirasi tidak ditemukan.</div>');
            redirect('aspirasi/proses');
            return;
        }

        // Proses Upload Lampiran Bukti Selesai
       $upload_path = FCPATH . 'assets/images/laporan/selesai/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, TRUE); // TRUE for recursive creation
        }
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|mp4';
        $config['max_size'] = 10240; // 10MB
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        $lampiran_selesai = [];
        $file_fields = ['lampiran_1', 'lampiran_2', 'lampiran_3'];
        foreach ($file_fields as $field) {
            if (!empty($_FILES[$field]['name'])) {
                if ($this->upload->do_upload($field)) {
                    $lampiran_selesai[$field] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('aspirasi/proses/detail/' . $id_aspirasi);
                    return;
                }
            }
        }
        
        
        $this->M_Aspirasi->_selesai($id_aspirasi);
            // Panggil helper untuk kirim email notifikasi
            $email_sent = send_status_update_email(
                $aspirasi['email_mahasiswa'],
                $aspirasi['judul'],
                'proses', // status lama
                'selesai', // status baru
            );

            if($email_sent){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aspirasi berhasil diselesaikan dan notifikasi email telah dikirim!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Aspirasi berhasil diselesaikan, namun notifikasi email gagal dikirim.</div>');
            }

        redirect('aspirasi/selesai/');
    }
}
