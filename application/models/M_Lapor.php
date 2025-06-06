<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Lapor extends CI_Model
{
    function _sendLapor() {
        $nim = $this->session->userdata('nim');
        $uploaded_files = [];
        $file_fields = ['lampiran_1', 'lampiran_2', 'lampiran_3'];

        foreach ($file_fields as $field) {
            if (!empty($_FILES[$field]['name'])) {
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|mp4';
                $config['max_size'] = '10240';
                $config['upload_path'] = './assets/images/laporan/aspirasi/'.$nim;
                $config['file_name'] = uniqid($field . '_');

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!is_dir('./assets/images/laporan/aspirasi/'.$nim)) {
                    mkdir('./assets/images/laporan/aspirasi/' . $nim, 0777, TRUE);
                }

                if ($this->upload->do_upload($field)) {
                    $uploaded_files[$field] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('lapor');
                }
            } else {
                $uploaded_files[$field] = '';
            }
        }

        $data = [
            'id_aspirasi' => rand(0, 99999),
            'tgl_aspirasi' => date('Y-m-d'),
            'tgl_kejadian' => $this->input->post('tgl_kejadian') ? $this->input->post('tgl_kejadian') : NULL,
            'nim' => $nim,
            'judul_aspirasi' => $this->input->post('judul_aspirasi'),
            'isi_laporan' => $this->input->post('isi_laporan'),
            'tempat_kejadian' => $this->input->post('tempat_kejadian'),
            'lampiran_1' => $uploaded_files['lampiran_1'],
            'lampiran_2' => $uploaded_files['lampiran_2'],
            'lampiran_3' => $uploaded_files['lampiran_3'],
            'kategori' => $this->input->post('aspirasi_kategori'),
            'status' => '0',
            'tingkat' => '0'
        ];

        $this->db->insert('aspirasi', $data);
        $this->session->set_flashdata('success', 'Aspirasi Anda berhasil dikirim!');
        redirect('lapor');
    }

    function getAspirasiKategori()
    {
        $this->db->select('*');
        $this->db->from('aspirasi_kategori');
        $this->db->where('is_checked', '1');
        $this->db->order_by('nama_kategori', 'ASC');
        return $this->db->get()->result();
    }
}