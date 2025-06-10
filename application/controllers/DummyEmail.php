<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller ini hanya untuk tujuan tes (dummy).
 * Fungsinya untuk memeriksa apakah konfigurasi dan fungsi pengiriman email berjalan dengan baik.
 */
class DummyEmail extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Memuat helper email yang sudah kita buat sebelumnya
        $this->load->helper('email');
    }

    /**
     * Method untuk memicu pengiriman email tes.
     */
    public function test_send()
    {
        echo "<h1>Mencoba Mengirim Email Percobaan...</h1>";

        // --- Data Dummy ---
        $email_tujuan  = 'muhnasyihulwan@gmail.com'; // Sesuai permintaan Anda
        $judul         = 'Percobaan Kirim Email dari Controller Dummy';
        $status_lama   = 'Pending';
        $status_baru   = 'Proses';
        $alasan_tolak  = null; // Kita set null karena ini contoh email persetujuan

        // Memanggil fungsi helper untuk mengirim email
        $is_sent = send_status_update_email(
            $email_tujuan,
            $judul,
            $status_lama,
            $status_baru,
            $alasan_tolak
        );

        // --- Memberikan Umpan Balik ---
        if ($is_sent) {
            echo "<p style='color:green; font-weight:bold;'>BERHASIL!</p>";
            echo "<p>Email percobaan telah dikirim ke <strong>" . $email_tujuan . "</strong>.</p>";
            echo "<p>Silakan periksa folder Inbox atau Spam di akun Gmail Anda.</p>";
        } else {
            echo "<p style='color:red; font-weight:bold;'>GAGAL!</p>";
            echo "<p>Email tidak dapat dikirim. Berikut beberapa hal yang perlu diperiksa:</p>";
            echo "<ul>";
            echo "<li>Apakah file <strong>application/config/email.php</strong> sudah diisi dengan benar?</li>";
            echo "<li>Apakah <strong>smtp_user</strong> (email Anda) dan <strong>smtp_pass</strong> (password aplikasi) sudah valid?</li>";
            echo "<li>Apakah koneksi internet dari server Anda berjalan normal?</li>";
            echo "<li>Coba lihat log error CodeIgniter di folder <strong>application/logs/</strong> untuk detail teknis kegagalan.</li>";
            echo "</ul>";

            // Untuk debugging lebih lanjut, Anda bisa menampilkan error langsung dari library email
            // echo "<h3>Detail Error:</h3>";
            // echo $this->email->print_debugger();
        }
    }
}