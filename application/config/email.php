<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  File Konfigurasi Email
| -------------------------------------------------------------------
| File ini berisi semua pengaturan untuk library Email.
| Pengaturan ini digunakan oleh helper atau controller mana pun
| yang memuat library Email.
|
*/

// Pengaturan untuk SMTP Gmail
$config['protocol']     = 'smtp';
$config['smtp_host']    = 'ssl://smtp.gmail.com';
$config['smtp_port']    = 465;
$config['smtp_user']    = 'ruangaspira@gmail.com'; 
$config['smtp_pass']    = 'gmlhhlqjgtddqucp';   
$config['mailtype']     = 'html';
$config['charset']      = 'iso-8859-1';
$config['wordwrap']     = TRUE;
$config['newline']      = "\r\n"; // Penting untuk beberapa server

/*
=====================================================================
PENTING UNTUK GMAIL:
1.  Gunakan "Password Aplikasi" (App Password), BUKAN password utama email Anda.
2.  Untuk mendapatkannya, aktifkan "Verifikasi 2 Langkah" di Akun Google Anda.
3.  Setelah aktif, buat Password Aplikasi di: https://myaccount.google.com/apppasswords
=====================================================================
*/