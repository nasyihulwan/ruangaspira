<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembaruan Status Aspirasi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            padding: 25px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .image-banner img {
            max-width: 150px; /* Atur ukuran gambar sesuai kebutuhan */
            height: auto;
        }
        .content {
            padding: 30px;
            line-height: 1.6;
            color: #555;
        }
        .content h2 {
            color: #333;
            margin-top: 0;
            font-size: 20px;
        }
        .status-box {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 5px solid #007bff;
        }
        .status-box p {
            margin: 5px 0;
        }
        .status-box strong {
            color: #007bff;
        }
        .status-box .badge-danger {
            background-color: #dc3545;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            display: inline-block;
        }
        .status-box .badge-warning {
            background-color: #ffc107;
            color: #333;
            padding: 4px 8px;
            border-radius: 4px;
            display: inline-block;
        }
        .status-box .badge-success {
            background-color: #28a745;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            display: inline-block;
        }
        .button-container {
            text-align: center;
            margin-top: 25px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff !important;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .footer {
            background-color: #f1f1f1;
            color: #777;
            text-align: center;
            padding: 20px;
            font-size: 12px;
            border-top: 1px solid #e9ecef;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            RuangAspira! Teknik Komputer
        </div>
        <div class="content">
            <p>Yth. Mahasiswa,</p>
            <p>Kami ingin memberitahukan bahwa status aspirasi Anda telah diperbarui.</p>

            <div class="status-box">
                <p><strong>Judul Aspirasi:</strong> <?= htmlspecialchars($judulAspirasi) ?></p>
                <p><strong>Status Sebelumnya:</strong>
                    <?php
                        switch ($oldStatus) {
                            case '0': echo '<span class="badge-danger">Pending</span>'; break;
                            case 'tolak': echo '<span class="badge-danger">Ditolak</span>'; break;
                            case 'proses': echo '<span class="badge-warning">Proses</span>'; break;
                            case 'selesai': echo '<span class="badge-success">Selesai</span>'; break;
                            default: echo htmlspecialchars(ucfirst($oldStatus)); break;
                        }
                    ?>
                </p>
                <p><strong>Status Terbaru:</strong>
                    <?php
                        switch ($newStatus) {
                            case '0': echo '<span class="badge-danger">Pending</span>'; break;
                            case 'tolak': echo '<span class="badge-danger">Ditolak</span>'; break;
                            case 'proses': echo '<span class="badge-warning">Proses</span>'; break;
                            case 'selesai': echo '<span class="badge-success">Selesai</span>'; break;
                            default: echo htmlspecialchars(ucfirst($newStatus)); break;
                        }
                    ?>
                </p>
                <?php if (!empty($alasan) && $newStatus == 'tolak'): ?>
                    <p><strong>Alasan Penolakan:</strong> <?= htmlspecialchars($alasan) ?></p>
                <?php endif; ?>
                <?php if (!empty($buktiSelesaiLink) && $newStatus == 'selesai'): ?>
                    <p><strong>Lihat Bukti Selesai:</strong> <a href="<?= htmlspecialchars($buktiSelesaiLink) ?>" class="btn badge-success" target="_blank">Lihat Bukti</a></p>
                <?php endif; ?>
            </div>

            <p>Silakan kunjungi akun Anda untuk melihat detail lengkap aspirasi Anda.</p>
            
            <div class="button-container">
                <a href="<?= base_url('mahasiswa/aspirasi') ?>" class="button">Lihat Aspirasi Saya</a>
            </div>

            <p>Terima kasih atas partisipasi Anda.</p>
            <p>Hormat kami,<br>Tim RuangAspira! Teknik Komputer</p>
        </div>
        <div class="footer">
            Ini adalah email otomatis, mohon tidak membalas. <br>
            Jika ada pertanyaan, silakan hubungi <a href="mailto:ruangaspira@gmail.com">ruangaspira@gmail.com</a>
        </div>
    </div>
</body>
</html>