<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Mahasiswa');
        $this->load->library('form_validation');

        if ($this->session->userdata('nim') != null) {
            redirect('lapor');
        } else if ($this->session->userdata('id_petugas') == null) {
            redirect('/');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        $data['mahasiswaCount'] = $this->M_Mahasiswa->queryAllMahasiswa()->num_rows();

        $data['totalAspirasiMasuk'] = $this->db->get('aspirasi')->num_rows();
        $data['totalAspirasiPending'] = $this->db->get_where('aspirasi', ['status' => 'pending'])->num_rows();
        $data['totalAspirasiProses'] = $this->db->get_where('aspirasi', ['status' => 'proses'])->num_rows();
        $data['totalAspirasiSelesai'] = $this->db->get_where('aspirasi', ['status' => 'selesai'])->num_rows();

        $data['prodiAspirasiMasuk'] = 0;
        $data['prodiAspirasiPending'] = 0;
        $data['prodiAspirasiProses'] = 0;
        $data['prodiAspirasiSelesai'] = 0;

        if ($this->session->userdata('level') == 'prodi_tekkom') {
            $data['prodiAspirasiMasuk'] = $this->db->get_where('aspirasi', ['tingkat' => 'prodi'])->num_rows();
            $data['prodiAspirasiPending'] = $this->db->get_where('aspirasi', ['status' => 'pending', 'tingkat' => 'prodi'])->num_rows();
            $data['prodiAspirasiProses'] = $this->db->get_where('aspirasi', ['status' => 'proses', 'tingkat' => 'prodi'])->num_rows();
            $data['prodiAspirasiSelesai'] = $this->db->get_where('aspirasi', ['status' => 'selesai', 'tingkat' => 'prodi'])->num_rows();
        }

        $data['ulasanSangatPuas'] = $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Sangat Puas'])->num_rows();
        $data['ulasanPuas'] = $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Puas'])->num_rows();
        $data['ulasanKurangPuas'] = $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Kurang Puas'])->num_rows();
        $data['ulasanTidakPuas'] = $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Tidak Puas'])->num_rows();
        $data['ulasanSangatTidakPuas'] = $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Sangat Tidak Puas'])->num_rows();

        $this->load->view('__partials/_head');
        $this->load->view('__partials/_sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('__partials/_footer');
        $this->load->view('__partials/_js');
    }

    public function umChartFilter()
    {
        $data['title'] = 'Dashboard';
        $data['mahasiswaCount'] = $this->M_Mahasiswa->queryAllMahasiswa()->num_rows();

        $data['totalAspirasiMasuk'] = $this->db->get('aspirasi')->num_rows();
        $data['totalAspirasiPending'] = $this->db->get_where('aspirasi', ['status' => 'pending'])->num_rows();
        $data['totalAspirasiProses'] = $this->db->get_where('aspirasi', ['status' => 'proses'])->num_rows();
        $data['totalAspirasiSelesai'] = $this->db->get_where('aspirasi', ['status' => 'selesai'])->num_rows();

        $data['prodiAspirasiMasuk'] = 0;
        $data['prodiAspirasiPending'] = 0;
        $data['prodiAspirasiProses'] = 0;
        $data['prodiAspirasiSelesai'] = 0;

        if ($this->session->userdata('level') == 'prodi_tekkom') {
            $data['prodiAspirasiMasuk'] = $this->db->get_where('aspirasi', ['tingkat' => 'prodi'])->num_rows();
            $data['prodiAspirasiPending'] = $this->db->get_where('aspirasi', ['status' => 'pending', 'tingkat' => 'prodi'])->num_rows();
            $data['prodiAspirasiProses'] = $this->db->get_where('aspirasi', ['status' => 'proses', 'tingkat' => 'prodi'])->num_rows();
            $data['prodiAspirasiSelesai'] = $this->db->get_where('aspirasi', ['status' => 'selesai', 'tingkat' => 'prodi'])->num_rows();
        }
        
        $data['ulasanSangatPuas'] = $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Sangat Puas'])->num_rows();
        $data['ulasanPuas'] = $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Puas'])->num_rows();
        $data['ulasanKurangPuas'] = $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Kurang Puas'])->num_rows();
        $data['ulasanTidakPuas'] = $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Tidak Puas'])->num_rows();
        $data['ulasanSangatTidakPuas'] = $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Sangat Tidak Puas'])->num_rows();

        $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('__partials/_head');
            $this->load->view('__partials/_sidebar');
            $this->load->view('dashboard', $data);
            $this->load->view('__partials/_footer');
            $this->load->view('__partials/_js');
        } else {
            echo "Chart dari " . $this->input->post('tanggal_awal') . " Sampai " . $this->input->post('tanggal_akhir');
        }
    }
}