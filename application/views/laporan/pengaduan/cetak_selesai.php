<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Aspirasi Selesai</title>

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
                <h4 style="margin-bottom: -5px">RuangAspira!</h4>
                <small>Aplikasi Layanan Aspirasi Mahasiswa Berbasis Web.</small>
            </div>

            <p>http://nasyihulwan.site/ruangaspirasi</p>
        </small>
    </div>
    <hr>
    <h4 align="center" style="margin-bottom: 30px; margin-top: 30px">Aspirasi Selesai: <?= $ls['judul_aspirasi'] ?>
        <br>
        <small></small>
    </h4>


    <table width="100%" style="margin-bottom: 30px;">
        <thead>
            <tr>
                <th colspan="2" style="text-align:center">Data Mahasiswa (Pemohon Aspirasi)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="width: 500px; ">NIM</th>
                <td><?= $ls['m_nim'] ?></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><?= $ls['nama_mahasiswa'] ?></td>
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
                <th colspan="2" style="text-align:center">Data Aspirasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="width: 500px">ID Aspirasi</th>
                <td><?= $ls['a_id'] ?></td>
            </tr>
            <tr>
                <th>Judul Aspirasi</th>
                <td><?= $ls['judul_aspirasi'] ?></td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td><?= $ls['nama_kategori_aspirasi'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Aspirasi</th>
                <td><?= $ls['tgl_aspirasi'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Kejadian</th>
                <td><?= $ls['tgl_kejadian'] ?></td>
            </tr>
            <tr>
                <th>Isi Aspirasi</th>
                <td><?= $ls['isi_laporan'] ?></td>
            </tr>
            <tr>
                <th>Tempat Kejadian</th>
                <td><?= $ls['tempat_kejadian'] ?></td>
            </tr>
            <tr>
                <th>Lampiran 1</th>
                <td><?= $ls['al_1'] ?></td>
            </tr>
            <tr>
                <th>Lampiran 2</th>
                <td>
                    <?php if (empty($ls['al_2'])) { echo "-"; } else { echo $ls['al_2']; } ?>
                </td>
            </tr>
            <tr>
                <th>Lampiran 3</th>
                <td>
                    <?php if (empty($ls['al_3'])) { echo "-"; } else { echo $ls['al_3']; } ?>
                </td>
            </tr>
        </tbody>
    </table>

    <table width="100%">
        <thead>
            <tr>
                <th colspan="2" style="text-align:center">Data Penyelesaian Aspirasi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="width: 500px">ID Penyelesaian</th>
                <td><?= $ls['id_selesai'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Diselesaikan</th>
                <td><?= $ls['tgl_selesai'] ?></td>
            </tr>
            <tr>
                <th>Bukti Lampiran 1</th>
                <td><?= $ls['as_1'] ?></td>
            </tr>
            <tr>
                <th>Bukti Lampiran 2</th>
                <td>
                    <?php if (empty($ls['as_2'])) { echo "-"; } else { echo $ls['as_2']; } ?>
                </td>
            </tr>
            <tr>
                <th>Bukti Lampiran 3</th>
                <td>
                    <?php if (empty($ls['as_3'])) { echo "-"; } else { echo $ls['as_3']; } ?>
                </td>
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