<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>

    <style>
    @media all {
        body {
            font-family: Tahoma !important;
            margin: 50px;
        }

        .disdik {
            width: 100%;
            max-width: 75px;
            float: left;
            padding-right: 10px;
        }

        hr {
            height: 5px;
            color: black !important;
            background-color: black !important;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            border: 2px solid black;
            padding: 5px;
        }
    }
    </style>
</head>

<body>
    <div>
        <img src="<?= base_url() ?>assets/images/no_outline_logo.png" alt="logo_disdik" class="disdik">
        <small class="profile">
            <div>
                <h4 style="margin-bottom: -5px">LAPMAS.</h4>
                <small>Aplikasi Layanan Pengaduan Masyarakat Berbasis Web.</small>
            </div>

            <p>http://nasyihulwan.site/lapmas</p>
        </small>
    </div>
    <hr>
    <h4 align="center" style="margin-bottom: 30px; margin-top: 30px">Pengaduan Selesai : <?= $ls['judul_laporan'] ?>
        <br>
        <small></small>
    </h4>


    <table width="100%" style="margin-bottom: 30px;">
        <thead>
            <tr>
                <th colspan="2" style="text-align:center">Data Masyarakat (Pemohon Aduan)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="width: 500px; ">NIK</th>
                <td><?= $ls['m_nik'] ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?= $ls['nama_masyarakat'] ?></td>
            </tr>
            <tr>
                <th>No Ponsel / Telp</th>
                <td><?= $ls['m_telp'] ?></td>
            </tr>
        </tbody>
    </table>

    <table width="100%" style="margin-bottom: 30px">
        <thead>
            <tr>
                <th colspan="2" style="text-align:center">Data Pengaduan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="width: 500px">ID Pengaduan</th>
                <td><?= $ls['p_id'] ?></td>
            </tr>
            <tr>
                <th>Judul</th>
                <td><?= $ls['judul_laporan'] ?></td>
            </tr>
            <tr>
                <th>ID - Nama Kategori</th>
                <td><?= $ls['kategori'] . ' - ' . $ls['nama_kategori'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Pengaduan</th>
                <td><?= $ls['tgl_pengaduan'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Kejadian</th>
                <td><?= $ls['tgl_kejadian'] ?></td>
            </tr>
            <tr>
                <th>Isi Laporan</th>
                <td><?= $ls['isi_laporan'] ?></td>
            </tr>
            <tr>
                <th>Tempat Kejadian</th>
                <td><?= $ls['tempat_kejadian'] ?></td>
            </tr>
            <tr>
                <th>Lampiran 1</th>
                <td><?= $ls['pl_1'] ?></td>
            </tr>
            <tr>
                <th>Lampiran 2</th>
                <td>
                    <?php if ($ls['pl_2'] == null) {
                        echo "-";
                    } else{ $ls['pl_2']; } ?>
                </td>
            </tr>
            <tr>
                <th>Lampiran 3</th>
                <td><?php if ($ls['pl_3'] == null) {
                        echo "-";
                    } else{ $ls['pl_3']; } ?></td>
            </tr>
        </tbody>
    </table>

    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin-bottom: 30px">
        <thead>
            <tr>
                <th colspan="2" style="text-align:center">Tanggapan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="width: 500px"> ID Tanggapan</th>
                <td><?= $ls['id_tanggapan'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Tanggapan (Petugas)</th>
                <td><?= $ls['tgl_tanggapan_petugas'] ?></td>
            </tr>
            <tr>
                <th>Tanggapan</th>
                <td><?= $ls['tanggapan_petugas'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Tanggapan Balik (Masyarakat)</th>
                <td><?= $ls['tgl_tanggapan_masyarakat'] ?></td>
            </tr>
            <tr>
                <th>Tanggapan Masyarakat</th>
                <td><?= $ls['tanggapan_masyarakat'] ?></td>
            </tr>
        </tbody>
    </table>

    <table width="100%">
        <thead>
            <tr>
                <th colspan="2" style="text-align:center">Data Selesai</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="width: 500px">ID Selesai</th>
                <td><?= $ls['id_selesai'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Diselesaikan</th>
                <td><?= $ls['tgl_selesai'] ?></td>
            </tr>
            <tr>
                <th>Bukti Lampiran 1</th>
                <td><?= $ls['ps_1'] ?></td>
            </tr>
            <tr>
                <th>Bukti Lampiran 2</th>
                <td><?php if ($ls['ps_3'] == null) {
                        echo "-";
                    } else{ $ls['ps_3']; } ?></td>
            </tr>
            <tr>
                <th>Bukti Lampiran 3</th>
                <td><?php if ($ls['ps_3'] == null) {
                        echo "-";
                    } else{ $ls['ps_3']; } ?></td>
            </tr>
            <tr>
                <th>ID - Nama Petugas</th>
                <td><?= $ls['id_petugas'] . " - " . $ls['nama_petugas'] ?></td>
            </tr>
        </tbody>
    </table>

    <script>
    window.onload = function() {
        window.print();
    }
    </script>
</body>

</html>