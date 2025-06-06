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
            <?php if ($this->uri->segment(2) == 'ditolak') { ?>
            <div class="alert alert-dark" role="alert">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                Anda dapat memulihkan kembali aspirasi yang belum
                dihapus.
            </div>
            <?php } ?>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Aspirasi</th>
                                    <?php if ($this->uri->segment(2) == 'selesai') { ?>
                                    <th>Tanggal Selesai</th>
                                    <?php } ?>
                                    <th>Nama Pelapor</th>
                                    <th>Judul Aspirasi</th>
                                    <th>Kategori</th>
                                    <?php if ($this->uri->segment(2) == 'proses') { ?>
                                    <th>Tingkat Aspirasi</th>
                                    <?php } ?>
                                    <?php if ($this->uri->segment(2) == 'ditolak') { ?>
                                    <th>Isi Aspirasi</th>
                                    <th>Lampiran</th>
                                    <?php } ?>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1; foreach ($queryAspirasi as $r) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= tgl_indo(date("Y-m-d", strtotime($r->tgl_aspirasi))) ?></td>
                                    <?php if ($this->uri->segment(2) == 'selesai') { ?>
                                    <td><?= tgl_indo(date("Y-m-d", strtotime($r->tgl_selesai))) ?></td>
                                    <?php } ?>
                                    <td><?= $r->nama_pelapor ?></td>
                                    <td><?= $r->judul_aspirasi ?></td>
                                    <td><?= $r->nama_kategori ?></td>
                                    <?php if ($this->uri->segment(2) == 'proses') { ?>
                                    <td><?= $r->tingkat ?></td>
                                    <?php } ?>
                                    <?php if ($this->uri->segment(2) == 'ditolak') { ?>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalScrollable<?= $r->id_aspirasi ?>">
                                            Lihat
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#galleryModal<?= $r->id_aspirasi ?>">
                                            Lihat
                                        </button>
                                    </td>
                                    <?php } ?>
                                    <td>
                                        <?php if ($this->uri->segment(2) == 'vnv') { ?>
                                        <a href="<?= site_url() ?>aspirasi/vnv/detail/<?= $r->id_aspirasi ?>"
                                            class="btn btn-outline-primary">Detail</a>
                                        <?php } else if ($this->uri->segment(2) == 'proses') { ?>
                                        <a href="<?= site_url() ?>aspirasi/proses/detail/<?= $r->id_aspirasi ?>"
                                            class="btn btn-outline-primary">Detail</a>
                                        <?php } else if ($this->uri->segment(2) == 'ditolak') { ?>
                                        <input id="id_aspirasi_row" type="hidden" value="<?= $r->id_aspirasi ?>">
                                        <a id="pulihkanTolak" href="#" class="btn btn-outline-secondary">Pulihkan</a>
                                        <a id="hapusTolak" href="#" class="btn btn-outline-danger">Hapus</a>
                                        <?php } else { ?>
                                        <a href="<?= site_url() ?>laporan/aspirasi/cetakSelesai/<?= $r->id_aspirasi ?>"
                                            class="btn btn-outline-secondary"><i class="fa fa-print"
                                                aria-hidden="true"></i> Print</a>
                                        <a href="<?= site_url() ?>aspirasi/selesai/detail/<?= $r->id_aspirasi ?>"
                                            class="btn btn-outline-primary">Detail</a>
                                        <?php } ?>
                                    </td>
                                    <div class="modal fade" id="exampleModalScrollable<?= $r->id_aspirasi ?>"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                        <?= $r->judul_aspirasi ?> -
                                                        <?= $r->tgl_aspirasi ?>
                                                    </h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?= $r->isi_laporan ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="galleryModal<?= $r->id_aspirasi ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="galleryModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                        <?= $r->judul_aspirasi ?> -
                                                        <?= $r->tgl_aspirasi ?>
                                                    </h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-secondary" role="alert">

                                                        <?php
                                                    $ekstensi_1 = substr($r->lampiran_1, -3);
                                                    if ($ekstensi_1 == 'mp4') { ?>
                                                        Lampiran 1 - <b><?= $r->lampiran_1 ?></b> - <a
                                                            href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_1 ?>"
                                                            type="button" class="btn badge btn-primary mb-2"
                                                            download>Download</a>
                                                        <br>
                                                        <video width="730" height="570" controls>
                                                            <source
                                                                src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim?>/<?= $r->lampiran_1 ?>"
                                                                type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <?php } else if($ekstensi_1 == 'pdf') { ?>
                                                        Lampiran 1 - <b><?= $r->lampiran_1 ?></b> - <a
                                                            href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_1 ?>"
                                                            type="button" class="btn badge btn-primary mb-2"
                                                            download>Download</a>
                                                        <?php } else { ?>
                                                        Lampiran 1 - <b><?= $r->lampiran_1 ?></b> - <a
                                                            href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_1 ?>"
                                                            type="button" class="btn badge btn-primary mb-2"
                                                            download>Download</a>
                                                        <br>
                                                        <img src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_1 ?>"
                                                            alt="<?= $r->lampiran_1 ?>" width="320" height="240">
                                                        <?php } ?>

                                                        <?php if ($r->lampiran_2 != null): ?>
                                                        <hr>
                                                        <?php
                                                    $ekstensi_2 = substr($r->lampiran_2, -3);
                                                    if ($ekstensi_2 == 'mp4') { ?>
                                                        Lampiran 2 - <b><?= $r->lampiran_2 ?></b> - <a
                                                            href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_2 ?>"
                                                            type="button" class="btn badge btn-primary mb-2"
                                                            download>Download</a>
                                                        <br>
                                                        <video width="730" height="570" controls>
                                                            <source
                                                                src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_2 ?>"
                                                                type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <?php } else if($ekstensi_2 == 'pdf') { ?>
                                                        Lampiran 2 - <b><?= $r->lampiran_2 ?></b> - <a
                                                            href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_2 ?>"
                                                            type="button" class="btn badge btn-primary mb-2"
                                                            download>Download</a>
                                                        <?php } else { ?>
                                                        Lampiran 2 - <b><?= $r->lampiran_2 ?></b> - <a
                                                            href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_2 ?>"
                                                            type="button" class="btn badge btn-primary mb-2"
                                                            download>Download</a>
                                                        <br>
                                                        <img src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_2 ?>"
                                                            alt="<?= $r->lampiran_2 ?>" width="320" height="240">
                                                        <?php } ?>
                                                        <?php endif; ?>

                                                        <?php if ($r->lampiran_3 != null): ?>
                                                        <hr>
                                                        <?php
                                                    $ekstensi_3 = substr($r->lampiran_3, -3);
                                                                            if ($ekstensi_3 == 'mp4') { ?>
                                                        Lampiran 3 - <b><?= $r->lampiran_3 ?></b> - <a
                                                            href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_3 ?>"
                                                            type="button" class="btn badge btn-primary mb-2"
                                                            download>Download</a>
                                                        <br>
                                                        <video width="730" height="570" controls>
                                                            <source
                                                                src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_3 ?>"
                                                                type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <?php } else if($ekstensi_3 == 'pdf') { ?>
                                                        Lampiran 3 - <b><?= $r->lampiran_3 ?></b> - <a
                                                            href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_3 ?>"
                                                            type="button" class="btn badge btn-primary mb-2"
                                                            download>Download</a>
                                                        <?php } else { ?>
                                                        Lampiran 3 - <b><?= $r->lampiran_3 ?></b> - <a
                                                            href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_3 ?>"
                                                            type="button" class="btn badge btn-primary mb-2"
                                                            download>Download</a>
                                                        <br>
                                                        <img src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $r->nim ?>/<?= $r->lampiran_3 ?>"
                                                            alt="<?= $r->lampiran_3 ?>" width="320" height="240">
                                                        <?php } ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>
