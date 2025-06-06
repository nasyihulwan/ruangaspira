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
        <section class="section col-lg-6">
            <?= $this->session->flashdata('message') ?>
            <div class="card">
                <div class="card-body">
                    <form action="<?= site_url() ?>pengaturan/tambahKategori" method="post">
                        <h6>Nama Kategori</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kategori" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            <?= form_error('nama_kategori', '<small class="text-danger pl-2">', '</small>') ?>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <div class="form-check">
                                <div class="checkbox">
                                    <input type="checkbox" id="checkbox1" name="is_checked" class="form-check-input"
                                        value="1" />
                                    <label for="checkbox1">Tampilkan (Dapat diubah nanti)</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-outline-primary">TAMBAH</button>
                    </form>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    </div>