<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Fungsi untuk mengirim email pembaruan status aspirasi.
 *
 * @param string $mahasiswaEmail Email tujuan.
 * @param string $judulAspirasi Judul aspirasi.
 * @param string $oldStatus Status lama.
 * @param string $newStatus Status baru.
 * @param string|null $alasan Alasan penolakan (opsional).
 * @param string|null $buktiSelesaiLink Link ke bukti selesai (opsional).
 * @return bool TRUE jika berhasil, FALSE jika gagal.
 */
function send_status_update_email($mahasiswaEmail, $judulAspirasi, $oldStatus, $newStatus, $alasan = null, $buktiSelesaiLink = null) {
    // Dapatkan instance CodeIgniter agar bisa menggunakan semua library-nya
    $CI =& get_instance();

    // Pastikan library email sudah dimuat
    $CI->load->library('email');

    // Mengambil konfigurasi dari config/email.php
    // $CI->email->initialize($CI->config->load('email')); // Baris ini tidak perlu jika sudah di-autoload atau di-load di controller

    // Setel pengirim dari file konfigurasi
    $from_email = $CI->config->item('smtp_user');
    $from_name = 'RuangAspira! Teknik Komputer'; // Ganti jika perlu

    $CI->email->from($from_email, $from_name);
    $CI->email->to($mahasiswaEmail);
    $CI->email->subject('Pembaruan Status Aspirasi Anda: ' . $judulAspirasi);

    // Siapkan data untuk dikirim ke view template email
    $data['judulAspirasi'] = $judulAspirasi;
    $data['oldStatus'] = $oldStatus;
    $data['newStatus'] = $newStatus;
    $data['alasan'] = $alasan;
    $data['buktiSelesaiLink'] = $buktiSelesaiLink;

    // Muat view template email sebagai string
    $emailContent = $CI->load->view('_emailTemplates/status_update_email', $data, TRUE);

    $CI->email->message($emailContent);

    // Kirim email
    if ($CI->email->send()) {
        return TRUE;
    } else {
        // Anda bisa mencatat error di sini jika perlu
        // log_message('error', $CI->email->print_debugger());
        return FALSE;
    }
}

function send_submission_confirmation($mahasiswaEmail, $judulAspirasi, $tipeAksi = 'dibuat') {
    $CI =& get_instance();
    $CI->load->library('email');

    $from_email = $CI->config->item('smtp_user');
    $from_name = 'RuangAspira! Teknik Komputer';

    $CI->email->from($from_email, $from_name);
    $CI->email->to($mahasiswaEmail);
    $CI->email->subject('Konfirmasi Laporan Aspirasi Anda');

    $data['judulAspirasi'] = $judulAspirasi;
    $data['tipeAksi'] = $tipeAksi; // Mengirim variabel 'dibuat' atau 'diperbarui' ke view

    $emailContent = $CI->load->view('_emailTemplates/submission_confirmation_email', $data, TRUE);
    $CI->email->message($emailContent);

    if ($CI->email->send()) {
        return TRUE;
    } else {
        return FALSE;
    }
}