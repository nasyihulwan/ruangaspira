<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="card-title text-center">
                Laporan Pengaduan
                <?php if ($status == '*') {
                    echo "Semua Status";
                } else if($status == '0') {
                    echo "Pending";
                } else {
                    echo ucfirst($status);
                } ?>
                <br> Periode <?= $dari ?> - <?= $sampai ?>
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Aspirasi</th>
                                            <th>Tanggal Aspirasi</th>
                                            <th>NIM</th>
                                            <th>Judul Aspirasi</th>
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
        </div>
    </div>
</div>

<script>
window.onload = function() {
    window.print();
}
</script>
