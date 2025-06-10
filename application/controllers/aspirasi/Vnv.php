<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vnv extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Aspirasi');
        $this->load->helper('email');

        if ($this->session->userdata('level') === 'prodi_tekkom') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak memiliki akses ke halaman ini.</div>');
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data['queryAspirasi'] = $this->M_Aspirasi->queryVerifikasiAspirasi();
        $data['title'] = 'Data Aspirasi - Verifikasi & Validasi';
        $data['subtitle'] = 'Pastikan kebenaran aspirasi sebelum melakukan verifikasi & validasi';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('master/aspirasi/index', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }

    public function update($id_aspirasi)
    {
        $id_aspirasi_real = $this->input->post('id_aspirasi_hidden');

        if (empty($id_aspirasi_real) || $id_aspirasi_real != $id_aspirasi) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID Aspirasi tidak valid.</div>');
            redirect('aspirasi/vnv/detail/' . $id_aspirasi);
            return;
        }

        $aspirasi = $this->M_Aspirasi->getAspirasiById($id_aspirasi_real);
        if (!$aspirasi) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aspirasi tidak ditemukan.</div>');
            redirect('aspirasi/vnv');
            return;
        }

        $old_status = $aspirasi['status'];
        $new_status = 'proses';

        $tingkat_aspirasi = $this->input->post('tingkat_aspirasi');
        $data_update = [
            'status'          => $new_status,
            'tgl_disetujui'   => date('Y-m-d H:i:s'),
            'tingkat'         => $tingkat_aspirasi
        ];

        if ($this->M_Aspirasi->updateAspirasi($id_aspirasi_real, $data_update)) {
            $email_sent = send_status_update_email(
                $aspirasi['email_mahasiswa'],
                $aspirasi['judul'],
                $old_status,
                $new_status
            );

            $message = "Aspirasi berhasil disetujui!";
            if ($email_sent) {
                $message .= " Notifikasi email telah dikirim ke mahasiswa.";
                $alert_type = "success";
            } else {
                $message .= " Namun, notifikasi email gagal dikirim. Periksa konfigurasi.";
                $alert_type = "warning";
            }
            $this->session->set_flashdata('message', '<div class="alert alert-' . $alert_type . '" role="alert">' . $message . '</div>');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menyetujui aspirasi.</div>');
        }

        redirect('aspirasi/vnv/detail/' . $id_aspirasi);
    }

    public function tolak($id_aspirasi)
    {
        $alasan_tolak = $this->input->post('alasan_tolak');

        $aspirasi = $this->M_Aspirasi->getAspirasiById($id_aspirasi);
        if (!$aspirasi) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aspirasi tidak ditemukan.</div>');
            redirect('aspirasi/vnv');
            return;
        }
        
        $id_aspirasi_real = $aspirasi['id_aspirasi'];
        $old_status = $aspirasi['status'];
        $new_status = 'tolak';

        $data_update = [
            'status'        => $new_status,
            'tgl_ditolak'   => date('Y-m-d H:i:s')
        ];

        if ($this->M_Aspirasi->updateAspirasi($id_aspirasi_real, $data_update)) {
            $this->M_Aspirasi->tolakAspirasi($id_aspirasi_real, $alasan_tolak);
            
            $email_sent = send_status_update_email(
                $aspirasi['email_mahasiswa'],
                $aspirasi['judul'],
                $old_status,
                $new_status,
                $alasan_tolak
            );

            $message = "Aspirasi berhasil ditolak.";
            if ($email_sent) {
                $message .= " Notifikasi email telah dikirim ke mahasiswa.";
                $alert_type = "success";
            } else {
                $message .= " Namun, notifikasi email gagal dikirim. Periksa konfigurasi.";
                $alert_type = "warning";
            }
            $this->session->set_flashdata('message', '<div class="alert alert-' . $alert_type . '" role="alert">' . $message . '</div>');
            
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menolak aspirasi.</div>');
        }

        redirect('aspirasi/vnv/');
    }

    public function detail($id_aspirasi)
    {
        $data['title'] = "Detail Aspirasi";
        $data['subtitle'] = "Lihat detail dan lakukan verifikasi aspirasi";
        $data['queryAspirasi'] = $this->M_Aspirasi->getAspirasiById($id_aspirasi);

        if (!$data['queryAspirasi']) {
            show_404();
        }

        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('master/aspirasi/vnv_detail', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }
}