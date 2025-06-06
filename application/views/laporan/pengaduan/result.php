<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Pengaduan</th>
                                <th>Tanggal Pengaduan</th>
                                <th>NIK</th>
                                <th>Judul Laporan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($laporan as $l) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $l->id_aspirasi ?></td>
                                <td><?= $l->tgl_aspirasi ?></td>
                                <td><?= $l->nim ?></td>
                                <td><?= $l->judul_aspirasi ?></td>
                                <?php if ($l->status == '0') { ?>
                                <td><span class="badge bg-danger">Pending</span></td>
                                <?php } else if($l->status == 'proses') { ?>
                                <td><span class="badge bg-warning">Proses</span></td>
                                <?php } else if($l->status == 'tolak'){ ?>
                                <td><span class="badge bg-danger">Ditolak</span></td>
                                <?php } else { ?>
                                <td><span class="badge bg-success">Selesai</span></td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
