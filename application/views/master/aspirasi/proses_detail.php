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
                    <p class="text-subtitle text-muted"><?= $subtitle ?></p>
                </div>
                <?php $this->load->view("__partials/_breadcrumb.php") ?>
            </div>
        </div>

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <?= $this->session->flashdata('message') ?>
                        <div class="card-content">
                            <div class="card-body">
                                <form method="POST" action="">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="id-aspirasi-column">ID Aspirasi</label>
                                                <input type="text" name="id_petugas"
                                                    value="<?= $this->session->userdata('id_petugas') ?>" hidden>
                                                <input type="text" name="aspirasi"
                                                    value="<?= $queryAspirasi['id_aspirasi'] ?>" hidden>
                                                <input type="text" name="id_aspirasi_display" class="form-control"
                                                    value="<?= $queryAspirasi['p_id'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="nim-column">NIM</label>
                                                <input type="text" id="nim-column" class="form-control"
                                                    value="<?= $queryAspirasi['nim'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="tgl-aspirasi-column">Tanggal Aspirasi</label>
                                                <input type="text" name="tgl_aspirasi" class="form-control" value="<?php
                                                $tanggal = date("Y-m-d", strtotime($queryAspirasi['tgl_aspirasi']));
                                                echo tgl_indo($tanggal, true) ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="tgl-kejadian-column">Tanggal Kejadian</label>
                                                <input type="text" name="tgl_kejadian" class="form-control" value="<?php
                                                $tanggal = date("Y-m-d", strtotime($queryAspirasi['tgl_kejadian']));
                                                echo tgl_indo($tanggal, true) ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="judul-aspirasi-column">Judul Aspirasi</label>
                                                <input type="text" name="judul_aspirasi" class="form-control"
                                                    value="<?= $queryAspirasi['judul_aspirasi'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="tempat-kejadian-column">Tempat Kejadian</label>
                                                <input type="text" name="tempat_kejadian" class="form-control"
                                                    value="<?= $queryAspirasi['tempat_kejadian'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="kategori-column">Kategori</label>
                                                <input type="text" name="nama_kategori" class="form-control"
                                                    value="<?= $queryAspirasi['nama_kategori'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <div class="form-group mb-3">
                                                    <label for="isi-aspirasi-textarea" class="form-label">Isi
                                                        Aspirasi</label>
                                                    <button type="button" class="btn btn-block btn-outline-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalScrollable<?= $queryAspirasi['p_id'] ?>">
                                                        Lihat
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label class="form-label">Lampiran</label>
                                                <div class="form-group mb-3" data-bs-toggle="modal"
                                                    data-bs-target="#galleryModal">
                                                    <button type="button" class="btn btn-block btn-outline-primary">
                                                        Lihat
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <?php if ($queryAspirasi['status'] !== 'selesai' && $queryAspirasi['status'] !== 'dibatalkan') { ?>
                                            <div class="col-md-12 col-12 d-flex justify-content-between">
                                                <?php if (!($this->session->userdata('level') === 'prodi_tekkom')) { ?>
                                                <button type="button" class="btn btn-primary me-1 mb-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#xlarge<?= $queryAspirasi['p_id'] ?>">
                                                    SETUJUI (SELESAI)
                                                </button>
                                                <button type="button" class="btn btn-danger me-1 mb-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#default">
                                                    TOLAK
                                                </button>
                                                <?php } ?>
                                            </div>
                                            <?php } else { ?>
                                            <button class="btn btn-secondary me-1 mb-1" disabled>
                                                ASPIRASI <?= strtoupper($queryAspirasi['status']) ?>
                                            </button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="exampleModalScrollable<?= $queryAspirasi['p_id'] ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            <?= $queryAspirasi['judul_aspirasi'] ?> -
                            <?= tgl_indo(date("Y-m-d", strtotime($queryAspirasi['tgl_aspirasi'])), true) ?>
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= $queryAspirasi['isi_laporan'] ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            <?= $queryAspirasi['judul_aspirasi'] ?> -
                            <?= tgl_indo(date("Y-m-d", strtotime($queryAspirasi['tgl_aspirasi'])), true) ?>
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-secondary" role="alert">
                            <?php
                            $ekstensi_1 = substr($queryAspirasi['lampiran_1'], -3);
                            if ($ekstensi_1 == 'mp4') { ?>
                            Lampiran 1 - <b><?= $queryAspirasi['lampiran_1'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_1'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Unduh</a>
                            <br>
                            <video width="730" height="570" controls>
                                <source
                                    src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_1'] ?>"
                                    type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                            </video>
                            <?php } else if($ekstensi_1 == 'pdf') { ?>
                            Lampiran 1 - <b><?= $queryAspirasi['lampiran_1'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_1'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Unduh</a>
                            <?php } else { ?>
                            Lampiran 1 - <b><?= $queryAspirasi['lampiran_1'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_1'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Unduh</a>
                            <br>
                            <img src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_1'] ?>"
                                alt="<?= $queryAspirasi['lampiran_1'] ?>" width="320" height="240">
                            <?php } ?>

                            <?php if ($queryAspirasi['lampiran_2'] != null): ?>
                            <hr>
                            <?php
                            $ekstensi_2 = substr($queryAspirasi['lampiran_2'], -3);
                            if ($ekstensi_2 == 'mp4') { ?>
                            Lampiran 2 - <b><?= $queryAspirasi['lampiran_2'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_2'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Unduh</a>
                            <br>
                            <video width="730" height="570" controls>
                                <source
                                    src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_2'] ?>"
                                    type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                            </video>
                            <?php } else if($ekstensi_2 == 'pdf') { ?>
                            Lampiran 2 - <b><?= $queryAspirasi['lampiran_2'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_2'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Unduh</a>
                            <?php } else { ?>
                            Lampiran 2 - <b><?= $queryAspirasi['lampiran_2'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_2'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Unduh</a>
                            <br>
                            <img src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_2'] ?>"
                                alt="<?= $queryAspirasi['lampiran_2'] ?>" width="320" height="240">
                            <?php } ?>
                            <?php endif; ?>

                            <?php if ($queryAspirasi['lampiran_3'] != null): ?>
                            <hr>
                            <?php
                            $ekstensi_3 = substr($queryAspirasi['lampiran_3'], -3);
                            if ($ekstensi_3 == 'mp4') { ?>
                            Lampiran 3 - <b><?= $queryAspirasi['lampiran_3'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_3'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Unduh</a>
                            <br>
                            <video width="730" height="570" controls>
                                <source
                                    src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_3'] ?>"
                                    type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                            </video>
                            <?php } else if($ekstensi_3 == 'pdf') { ?>
                            Lampiran 3 - <b><?= $queryAspirasi['lampiran_3'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_3'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Unduh</a>
                            <?php } else { ?>
                            Lampiran 3 - <b><?= $queryAspirasi['lampiran_3'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_3'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Unduh</a>
                            <br>
                            <img src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_3'] ?>"
                                alt="<?= $queryAspirasi['lampiran_3'] ?>" width="320" height="240">
                            <?php } ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <form action="<?= site_url() ?>aspirasi/vnv/tolak/<?= $queryAspirasi['id_aspirasi'] ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">
                                Tolak Aspirasi
                            </h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-secondary" role="alert">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                <span>Silakan input alasan Anda menolak Aspirasi ini.</span>
                            </div>
                            <div class="form-group">
                                <textarea name="alasan_tolak" cols="15" rows="2.5" placeholder="Alasan" maxlength="50"
                                    class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                            <button type="submit" class="btn btn-danger ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tolak</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade text-left w-100" id="xlarge<?= $queryAspirasi['p_id'] ?>" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                <div class="modal-content">
                    <?php echo form_open_multipart('aspirasi/proses/updateSelesai'); ?>
                    <div class="row">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel16">
                                Unggah Bukti Selesai
                            </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_aspirasi" value="<?= $queryAspirasi['id_aspirasi'] ?>">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <div class="alert alert-secondary" role="alert">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        <span>Ekstensi file yang didukung: jpg, jpeg, png, pdf &
                                            mp4. Anda dapat mengunggah bukti selesai hingga
                                            maksimal 3 lampiran</span>
                                    </div>
                                    <label>Lampiran 1</label>
                                    <input type="file" class="form-control" id="lampiran_1" name="lampiran_1" required>
                                    <br>
                                    <div id="div_lam_2">
                                        <label>Lampiran 2 (Opsional)</label>
                                        <input type="file" class="form-control" id="lampiran_2" name="lampiran_2">
                                        <br>
                                    </div>
                                    <div id="div_lam_3">
                                        <label>Lampiran 3 (Opsional)</label>
                                        <input type="file" class="form-control" id="lampiran_3" name="lampiran_3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tutup</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Konfirmasi</span>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/extensions/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/custom_aspirasi.js"></script>
    <script>
    $('textarea[name="alasan_tolak"]').maxlength({
        alwaysShow: true,
        validate: false,
        allowOverMax: true,
        customMaxAttribute: "50",
    });
    </script>
</div>