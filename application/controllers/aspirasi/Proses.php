<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Aspirasi');
        $this->load->helper('form');
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

        $config['upload_path'] = './assets/images/laporan/aspirasi/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf|mp4';
        $config['max_size'] = 20480;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $lampiran_data = [];

        if (!empty($_FILES['lampiran_1']['name'])) {
            $config['file_name'] = 'lampiran_selesai_1_' . $id_aspirasi . '_' . time();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('lampiran_1')) {
                $lampiran_data['lampiran_selesai_1'] = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('aspirasi/proses/detail/' . $id_aspirasi);
                return;
            }
        }

        if (!empty($_FILES['lampiran_2']['name'])) {
            $config['file_name'] = 'lampiran_selesai_2_' . $id_aspirasi . '_' . time();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('lampiran_2')) {
                $lampiran_data['lampiran_selesai_2'] = $this->upload->data('file_name');
            }
        }

        if (!empty($_FILES['lampiran_3']['name'])) {
            $config['file_name'] = 'lampiran_selesai_3_' . $id_aspirasi . '_' . time();
            $this->upload->initialize($config);
            if ($this->upload->do_upload('lampiran_3')) {
                $lampiran_data['lampiran_selesai_3'] = $this->upload->data('file_name');
            }
        }

        $data_update = [
            'status' => 'selesai',
            'tgl_selesai' => date('Y-m-d H:i:s')
        ];
        $data_update = array_merge($data_update, $lampiran_data);

        if ($this->M_Aspirasi->updateAspirasi($id_aspirasi, $data_update)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aspirasi berhasil diselesaikan!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menyelesaikan aspirasi.</div>');
        }

        redirect('aspirasi/proses/detail/' . $id_aspirasi);
    }

    public function updateBatal($p_id)
    {
        $queryAspirasi = $this->M_Aspirasi->getAspirasiById($p_id);

        if ($queryAspirasi) {
            $id_aspirasi_to_update = $queryAspirasi['p_id'];

            $data_update = [
                'status' => 'ditolak',
                'tgl_batal' => date('Y-m-d H:i:s')
            ];

            if ($this->M_Aspirasi->updateAspirasi($id_aspirasi_to_update, $data_update)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aspirasi berhasil dibatalkan.</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal membatalkan aspirasi.</div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aspirasi tidak ditemukan.</div>');
        }

        redirect('aspirasi/proses/detail/' . $p_id);
    }
}
