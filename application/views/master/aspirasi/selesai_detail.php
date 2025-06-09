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

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">ID Aspirasi</label>
                                            <input type="text" class="form-control"
                                                value="<?= $queryAspirasi['p_id'] ?>" name="id_aspirasi" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">NIM</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                value="<?= $queryAspirasi['nim'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Tanggal Aspirasi</label>
                                            <input type="text" name="tgl_aspirasi" class="form-control" value="<?php 
                                                    $tanggal = date("Y-m-d", strtotime($queryAspirasi['tgl_aspirasi']));  
                                                    echo tgl_indo($tanggal, true) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Tanggal Kejadian</label>
                                            <input type="text" name="tgl_aspirasi" class="form-control" value="<?php 
                                                    $tanggal = date("Y-m-d", strtotime($queryAspirasi['tgl_kejadian']));  
                                                    echo tgl_indo($tanggal, true) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Tanggal Selesai</label>
                                            <input type="text" name="tgl_aspirasi" class="form-control" value="<?php 
                                                    $tanggal = date("Y-m-d", strtotime($queryAspirasi['tgl_selesai']));  
                                                    echo tgl_indo($tanggal, true) ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Judul Laporan</label>
                                            <input type="text" name="tgl_aspirasi" class="form-control"
                                                value="<?= $queryAspirasi['judul_aspirasi'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Tempat Kejadian</label>
                                            <input type="text" name="tgl_aspirasi" class="form-control"
                                                value="<?= $queryAspirasi['tempat_kejadian'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Kategori</label>
                                            <input type="text" name="tgl_aspirasi" class="form-control"
                                                value="<?= $queryAspirasi['nama_kategori'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Isi
                                                    Laporan</label>
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
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">ID - Nama Petugas</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                value="<?= $queryAspirasi['id_petugas'] . " - " . $queryAspirasi['nama_petugas'] ?>"
                                                name="status_aspirasi" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Lampiran Bukti Selesai</label>
                                            <div class="form-group mb-3" data-bs-toggle="modal"
                                                data-bs-target="#buktiSelesai">
                                                <button type="button" class="btn btn-block btn-outline-primary">
                                                    Lihat
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex">
                                        <a href="<?= site_url() ?>aspirasi/selesai"
                                            class="btn btn-block btn-outline-secondary me-1 mb-1">KEMBALI</a>
                                    </div>
                                    <div class="col-6 d-flex">
                                        <a href="#" class="btn btn-block btn-primary me-1 mb-1"
                                            onclick="window.print(); return false;">PRINT</a>
                                    </div>
                                </div>
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
                            Tanggal Aspirasi :
                            <?php $tanggal = date("Y-m-d", strtotime($queryAspirasi['tgl_aspirasi'])); echo tgl_indo($tanggal, true) ?>
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
                            <span class="d-none d-sm-block">Close</span>
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
                            Tanggal Aspirasi :
                            <?php $tanggal = date("Y-m-d", strtotime($queryAspirasi['tgl_aspirasi'])); echo tgl_indo($tanggal, true) ?>
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
                                href="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_1'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Download</a>
                            <br>
                            <video width="730" height="570" controls>
                                <source
                                    src="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_1'] ?>"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <?php } else if($ekstensi_1 == 'pdf') { ?>
                            Lampiran 1 - <b><?= $queryAspirasi['lampiran_1'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_1'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Download</a>
                            <?php } else { ?>
                            Lampiran 1 - <b><?= $queryAspirasi['lampiran_1'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_1'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Download</a>
                            <br>
                            <img src="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_1'] ?>"
                                alt="<?= $queryAspirasi['lampiran_1'] ?>" width="320" height="240">
                            <?php } ?>

                            <?php if ($queryAspirasi['lampiran_2'] != null): ?>
                            <hr>
                            <?php 
                            $ekstensi_2 = substr($queryAspirasi['lampiran_2'], -3); 
                            if ($ekstensi_2 == 'mp4') { ?>
                            Lampiran 2 - <b><?= $queryAspirasi['lampiran_2'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_2'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Download</a>
                            <br>
                            <video width="730" height="570" controls>
                                <source
                                    src="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_2'] ?>"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <?php } else if($ekstensi_2 == 'pdf') { ?>
                            Lampiran 2 - <b><?= $queryAspirasi['lampiran_2'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_2'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Download</a>
                            <?php } else { ?>
                            Lampiran 2 - <b><?= $queryAspirasi['lampiran_2'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_2'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Download</a>
                            <br>
                            <img src="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_2'] ?>"
                                alt="<?= $queryAspirasi['lampiran_2'] ?>" width="320" height="240">
                            <?php } ?>
                            <?php endif; ?>

                            <?php if ($queryAspirasi['lampiran_3'] != null): ?>
                            <hr>
                            <?php 
                            $ekstensi_3 = substr($queryAspirasi['lampiran_3'], -3); 
                            if ($ekstensi_3 == 'mp4') { ?>
                            Lampiran 3 - <b><?= $queryAspirasi['lampiran_3'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_3'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Download</a>
                            <br>
                            <video width="730" height="570" controls>
                                <source
                                    src="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_3'] ?>"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <?php } else if($ekstensi_3 == 'pdf') { ?>
                            Lampiran 3 - <b><?= $queryAspirasi['lampiran_3'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_3'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Download</a>
                            <?php } else { ?>
                            Lampiran 3 - <b><?= $queryAspirasi['lampiran_3'] ?></b> - <a
                                href="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_3'] ?>"
                                type="button" class="btn badge btn-primary mb-2" download>Download</a>
                            <br>
                            <img src="<?= base_url() ?>assets/images/laporan/pengAspirasi/<?= $queryAspirasi['nim'] ?>/<?= $queryAspirasi['lampiran_3'] ?>"
                                alt="<?= $queryAspirasi['lampiran_3'] ?>" width="320" height="240">
                            <?php } ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="buktiSelesai" tabindex="-1" role="dialog" aria-labelledby="galleryModalTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            <?= $queryAspirasi['judul_aspirasi'] ?> -
                            Tanggal Aspirasi :
                            <?php $tanggal = date("Y-m-d", strtotime($queryAspirasi['tgl_aspirasi'])); echo tgl_indo($tanggal, true) ?>
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-secondary" role="alert">
                            Diselesaikan oleh <b>
                                Petugas: <?= $queryAspirasi['nama_petugas'] ?></b> pada
                            <b><?= tgl_indo(date("Y-m-d", strtotime($queryAspirasi['tgl_selesai']))) ?></b>
                        </div>

                        <?php 
                            $ekstensi_1 = substr($queryAspirasi['ls_1'], -3); 
                            if ($ekstensi_1 == 'mp4') { ?>
                        Lampiran 1 - <b><?= $queryAspirasi['ls_1'] ?></b> - <a
                            href="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_1'] ?>"
                            type="button" class="btn badge btn-primary mb-2" download>Download</a>
                        <br>
                        <video width="730" height="570" controls>
                            <source src="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_1'] ?>"
                                type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <?php } else if($ekstensi_1 == 'pdf') { ?>
                        Lampiran 1 - <b><?= $queryAspirasi['ls_1'] ?></b> - <a
                            href="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_1'] ?>"
                            type="button" class="btn badge btn-primary mb-2" download>Download</a>
                        <?php } else { ?>
                        Lampiran 1 - <b><?= $queryAspirasi['ls_1'] ?></b> - <a
                            href="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_1'] ?>"
                            type="button" class="btn badge btn-primary mb-2" download>Download</a>
                        <br>
                        <img src="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_1'] ?>"
                            alt="<?= $queryAspirasi['ls_1'] ?>" width="320" height="240">
                        <?php } ?>

                        <?php if ($queryAspirasi['ls_2'] != null): ?>
                        <hr>
                        <?php 
                            $ekstensi_2 = substr($queryAspirasi['ls_2'], -3); 
                            if ($ekstensi_2 == 'mp4') { ?>
                        Lampiran 2 - <b><?= $queryAspirasi['ls_2'] ?></b> - <a
                            href="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_2'] ?>"
                            type="button" class="btn badge btn-primary mb-2" download>Download</a>
                        <br>
                        <video width="730" height="570" controls>
                            <source src="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_2'] ?>"
                                type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <?php } else if($ekstensi_2 == 'pdf') { ?>
                        Lampiran 2 - <b><?= $queryAspirasi['ls_2'] ?></b> - <a
                            href="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_2'] ?>"
                            type="button" class="btn badge btn-primary mb-2" download>Download</a>
                        <?php } else { ?>
                        Lampiran 2 - <b><?= $queryAspirasi['ls_2'] ?></b> - <a
                            href="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_2'] ?>"
                            type="button" class="btn badge btn-primary mb-2" download>Download</a>
                        <br>
                        <img src="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_2'] ?>"
                            alt="<?= $queryAspirasi['ls_2'] ?>" width="320" height="240">
                        <?php } ?>
                        <?php endif; ?>

                        <?php if ($queryAspirasi['ls_3'] != null): ?>
                        <hr>
                        <?php 
                            $ekstensi_3 = substr($queryAspirasi['ls_3'], -3); 
                            if ($ekstensi_3 == 'mp4') { ?>
                        Lampiran 3 - <b><?= $queryAspirasi['ls_3'] ?></b> - <a
                            href="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_3'] ?>"
                            type="button" class="btn badge btn-primary mb-2" download>Download</a>
                        <br>
                        <video width="730" height="570" controls>
                            <source src="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_3'] ?>"
                                type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <?php } else if($ekstensi_3 == 'pdf') { ?>
                        Lampiran 3 - <b><?= $queryAspirasi['ls_3'] ?></b> - <a
                            href="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_3'] ?>"
                            type="button" class="btn badge btn-primary mb-2" download>Download</a>
                        <?php } else { ?>
                        Lampiran 3 - <b><?= $queryAspirasi['ls_3'] ?></b> - <a
                            href="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_3'] ?>"
                            type="button" class="btn badge btn-primary mb-2" download>Download</a>
                        <br>
                        <img src="<?= base_url() ?>assets/images/laporan/selesai/<?= $queryAspirasi['ls_3'] ?>"
                            alt="<?= $queryAspirasi['ls_3'] ?>" width="320" height="240">
                        <?php } ?>
                        <?php endif; ?>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tanggapanPetugas<?= $queryAspirasi['p_id'] ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            Tanggapan Admin/Petugas -
                            <?= $queryAspirasi['judul_aspirasi'] ?> - Tanggal Aspirasi :
                            <?php $tanggal = date("Y-m-d", strtotime($queryAspirasi['tgl_aspirasi'])); echo tgl_indo($tanggal, true) ?>
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-secondary" role="alert">
                            Ditanggapi oleh <b>
                                Petugas: <?= $queryAspirasi['nama_petugas'] ?></b> pada
                            <b><?= tgl_indo(date("Y-m-d", strtotime($queryAspirasi['tgl_tanggapan']))) ?></b>
                        </div>
                        <?= $queryAspirasi['tanggapan'] ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tanggapanBalik<?= $queryAspirasi['p_id'] ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">
                            Tanggapan Masyarakat -
                            <?= $queryAspirasi['judul_aspirasi'] ?> - Tanggal Aspirasi :
                            <?php $tanggal = date("Y-m-d", strtotime($queryAspirasi['tgl_aspirasi'])); echo tgl_indo($tanggal, true) ?>
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php if ($queryAspirasi['tanggapan_balik'] == null) { ?>
                        <div class="alert alert-secondary" role="alert">
                            Belum ditanggapi oleh Masyarakat
                        </div>
                        <?php } else { ?>
                        <div class="alert alert-secondary" role="alert">
                            Ditanggapi oleh Masyarakat pada
                            <b><?= tgl_indo(date("Y-m-d", strtotime($queryAspirasi['tgl_tanggapan_balik']))) ?></b>
                        </div>
                        <?= $getDate['tanggapan_balik'] ?>
                        <?php } ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>