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

        <section class="section">
            <?= $this->session->flashdata('message') ?>
            <div class="alert alert-dark" role="alert">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                Kolom tampilkan bertujuan untuk menampilkan kategori kepada Mahasiswa ketika melakukan input Data
                Aspirasi.
            </div>
            <div class="card">
                <div class="card-header">
                    <a href="<?= site_url() ?>pengaturan/tambahKategori" class="btn btn-outline-primary">Tambah
                        Kategori</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th width="10%">Tampilkan</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kategoriAspirasi as $r) { ?>
                                <tr>
                                    <form action="<?= site_url() ?>pengaturan/updateKategori/<?= $r->id ?>"
                                        method="post">
                                        <td><?= $r->id ?></td>
                                        <td><?= $r->nama_kategori ?></td>
                                        <td>
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="checkbox1" name="is_checked"
                                                        class="form-check-input" value="1"
                                                        <?php if ($r->is_checked == 1) { echo "checked"; } ?> />
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-outline-primary">Update</button>
                                        </td>
                                    </form>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        </div>
