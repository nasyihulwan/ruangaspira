<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Pastikan semua model dan helper yang dibutuhkan dimuat
        $this->load->model('M_Aspirasi');
        $this->load->model('M_User'); // Diperlukan untuk mengambil email mahasiswa
        $this->load->model('M_Lapor'); // Diperlukan untuk mengambil email mahasiswa
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('email'); // Helper email WAJIB dimuat
    }

    public function index()
    {
        // Aturan validasi form
        $this->form_validation->set_rules('judul_aspirasi', 'Judul Aspirasi', 'required|trim');
        $this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required|trim');
        $this->form_validation->set_rules('tempat_kejadian', 'Tempat Kejadian', 'required|trim');
        $this->form_validation->set_rules('kategori', 'Kategori Aspirasi', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form
            $data['kategori_aspirasi'] = $this->M_Lapor->getAspirasiKategori();
            if (validation_errors()) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>');
            }
            $this->load->view('landing/input.php', $data); // Ganti dengan path view Anda
        } else {
            // Jika validasi berhasil, proses data dan email
            $nim = $this->session->userdata('nim');
            $uploaded_files = [];
            $file_fields = ['lampiran_1', 'lampiran_2', 'lampiran_3'];

            // Konfigurasi Upload
            $upload_path = './assets/images/laporan/aspirasi/' . $nim .'/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, TRUE);
            }
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|mp4';
            $config['max_size'] = '10240';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);

            // Proses Upload File
            foreach ($file_fields as $field) {
                if (!empty($_FILES[$field]['name'])) {
                    if ($this->upload->do_upload($field)) {
                        $uploaded_files[$field] = $this->upload->data('file_name');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                        redirect('lapor');
                        return; // Hentikan proses jika upload gagal
                    }
                }
            }

            // Siapkan data untuk disimpan ke database
            $data = [
                'id_aspirasi' => rand(10000, 99999),
                'tgl_aspirasi' => date('Y-m-d H:i:s'),
                'tgl_kejadian' => $this->input->post('tgl_kejadian'),
                'nim' => $nim,
                'judul_aspirasi' => $this->input->post('judul_aspirasi'),
                'isi_laporan' => $this->input->post('isi_laporan'),
                'tempat_kejadian' => $this->input->post('tempat_kejadian'),
                'lampiran_1' => isset($uploaded_files['lampiran_1']) ? $uploaded_files['lampiran_1'] : null,
                'lampiran_2' => isset($uploaded_files['lampiran_2']) ? $uploaded_files['lampiran_2'] : null,
                'lampiran_3' => isset($uploaded_files['lampiran_3']) ? $uploaded_files['lampiran_3'] : null,
                'kategori' => $this->input->post('kategori'),
                'status' => '0',
                'tingkat' => '0' 
            ];

            // Panggil model untuk menyimpan data
            if ($this->M_Aspirasi->simpanAspirasi($data)) {
                
                // BAGIAN KIRIM EMAIL
                $mahasiswa = $this->M_User->getMahasiswaByNim($nim);
                
                if ($mahasiswa) {
                    $email_sent = send_submission_confirmation(
                        $mahasiswa->email, 
                        $data['judul_aspirasi'], 
                        'dibuat'
                    );
    
                    if ($email_sent) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aspirasi Anda berhasil dikirim dan notifikasi telah dikirim ke email Anda!</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Aspirasi berhasil disimpan, namun notifikasi email gagal dikirim.</div>');
                    }
                } else {
                     $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Aspirasi berhasil disimpan, namun email mahasiswa tidak ditemukan untuk pengiriman notifikasi.</div>');
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan saat menyimpan aspirasi Anda.</div>');
            }
            
            redirect('mahasiswa/aspirasi');
        }
    }
}