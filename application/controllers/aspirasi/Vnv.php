<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vnv extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Aspirasi');

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

        $tingkat_aspirasi = $this->input->post('tingkat_aspirasi');

        $data_update = [
            'status'           => 'proses',
            'tgl_disetujui'    => date('Y-m-d H:i:s'),
            'tingkat'          => $tingkat_aspirasi
        ];

        if ($this->M_Aspirasi->updateAspirasi($id_aspirasi_real, $data_update)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aspirasi berhasil disetujui!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menyetujui aspirasi.</div>');
        }

        redirect('aspirasi/vnv/detail/' . $id_aspirasi);
    }

    public function tolak($id_aspirasi)
    {
        $alasan_tolak = $this->input->post('alasan_tolak');

        $queryAspirasi = $this->M_Aspirasi->getAspirasiById($id_aspirasi);

        if ($queryAspirasi) {
            $id_aspirasi_real = $queryAspirasi['id_aspirasi'];

            $data_update = [
                'status'        => 'tolak',
                'tgl_ditolak'   => date('Y-m-d H:i:s')
            ];

            if ($this->M_Aspirasi->updateAspirasi($id_aspirasi_real, $data_update)) {
                $this->M_Aspirasi->tolakAspirasi();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aspirasi berhasil ditolak.</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menolak aspirasi.</div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aspirasi tidak ditemukan.</div>');
        }

        redirect('aspirasi/vnv/detail/' . $id_aspirasi);
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