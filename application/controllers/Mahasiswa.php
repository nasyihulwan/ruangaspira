<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Aspirasi');
        $this->load->model('M_Mahasiswa');
        $this->load->model('M_User');

        if ($this->session->userdata('nim') == null) {
            redirect('auth/login');
        } else if ($this->session->userdata('id_petugas') != null) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard - Mahasiswa';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/mahasiswa_topbar');
        $this->load->view('mahasiswa/dashboard', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }
    public function aspirasi()
    {
        $data['aspirasi'] = $this->M_Aspirasi->queryAspirasiCurrentSession();
        $data['title'] = 'Aspirasi Saya';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/mahasiswa_topbar');
        $this->load->view('mahasiswa/aspirasi', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }
    public function ulasan()
    {
        if ($this->db->get_where('ulasan_mahasiswa', ['nim' => $this->session->userdata('nim')])->num_rows() >= 1) {
            $data['ulasan'] = $this->M_Mahasiswa->ulasan();
        }
        $data['countUlasan'] = $this->db->get_where('ulasan_mahasiswa', ['nim' => $this->session->userdata('nim')])->num_rows();
        $data['title'] = 'Beri Ulasan';

        $this->form_validation->set_rules('ulasan', 'Ulasan', 'required');
        $this->form_validation->set_rules('tk', 'Tingkat Kepuasan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('__partials/_head');
            $this->load->view('__partials/mahasiswa_topbar');
            $this->load->view('mahasiswa/ulasan', $data);
            $this->load->view('__partials/_footer');
            $this->load->view('__partials/_js');
        } else {
            $this->M_Mahasiswa->_sendUlasan();
        }
    }

    public function profile()
    {
        $data['user'] = $this->M_User->getMahasiswaCurrentSession();
        $data['title'] = 'Profil Saya';

        $this->load->view('__partials/_head');
        $this->load->view('__partials/mahasiswa_topbar');
        $this->load->view('mahasiswa/profile', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }

    public function edit_aspirasi($id_aspirasi)
{
    // 1. Ambil data aspirasi dari model berdasarkan ID
    $aspirasi = $this->M_Aspirasi->getAspirasiById($id_aspirasi);

    // 2. Lakukan validasi keamanan dan kepemilikan
    if (!$aspirasi) {
        // Cek jika aspirasi tidak ditemukan
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aspirasi tidak ditemukan.</div>');
        redirect('mahasiswa/aspirasi');
    } elseif ($aspirasi['nim'] != $this->session->userdata('nim')) {
        // Cek jika mahasiswa mencoba mengakses aspirasi milik orang lain
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak memiliki akses untuk mengedit aspirasi ini.</div>');
        redirect('mahasiswa/aspirasi');
    } elseif ($aspirasi['status'] != '0') {
        // Cek jika statusnya bukan 'Pending'
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Aspirasi ini tidak dapat diubah karena sudah diproses.</div>');
        redirect('mahasiswa/aspirasi');
    }

    // 3. Siapkan semua data yang dibutuhkan oleh view
    $data['title'] = 'Edit Laporan Aspirasi';
    $data['aspirasi'] = $aspirasi;
    $data['kategori_list'] = $this->M_Aspirasi->getAspirasiKategori(); // Daftar kategori untuk dropdown
    $this->M_Aspirasi->getAspirasiById($id_aspirasi);

    // 4. Muat semua bagian view
    $this->load->view('__partials/_head', $data);
    $this->load->view('__partials/mahasiswa_topbar', $data);
    $this->load->view('mahasiswa/edit_aspirasi', $data); // Kirim data ke view
    $this->load->view('__partials/_footer');
    $this->load->view('__partials/_js');
}
}
