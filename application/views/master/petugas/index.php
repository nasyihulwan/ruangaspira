<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last ">
                    <h3><?= $title ?></h3>
                    <p class="text-subtitle text-muted"><?= $subtitle ?>
                    </p>
                </div>



                <?php $this->load->view("__partials/_breadcrumb.php") ?>


            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="<?= site_url() ?>user/add/petugas" class="btn btn-outline-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>No Telp</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($petugas as $p) { ?>
                            <tr>
                                <form action="<?= site_url() ?>pengaturan/updateStatusPetugas/<?= $p->id_petugas ?>"
                                    method="post">
                                    <td><?= $no ?></td>
                                    <td><?= $p->id_petugas ?></td>
                                    <td><?= $p->nama_petugas ?></td>
                                    <td><?= $p->username ?></td>
                                    <td><?= $p->telp ?></td>
                                    <td><?= ucfirst($p->level) ?></td>
                                    <td> <?php if ($p->status == 'active') { ?>
                                        <button type="button" class="btn badge bg-success">
                                            Aktif
                                        </button>
                                        <?php } else if($p->status == '0') { ?>
                                        <button type="button" class="btn badge bg-warning">
                                            Nonaktif
                                        </button>
                                        <?php } else { ?>
                                        <button type="button" class="btn badge bg-danger">
                                            Soft Deleted
                                        </button>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <select name="status" class="form-select">
                                                        <option value="active" <?php if ($p->status == 'active') {
                                                echo "selected"; } ?>>Aktif</option>
                                                        <option value="0" <?php if ($p->status == '0') {
                                                echo "selected"; } ?>>Nonaktif</option>
                                                        <option value="deleted" <?php if ($p->status == 'deleted') {
                                                echo "selected"; } ?>>Soft Deleted</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" class="btn btn-block btn-primary">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->


    </div>