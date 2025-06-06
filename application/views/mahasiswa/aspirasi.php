<div class="content-wrapper container">
    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">
        <section>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <?= $this->session->flashdata('message') ?>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Pengaduan</th>
                                                <th>Tanggal Pengaduan</th>
                                                <th>Judul Laporan</th>
                                                <th style="width: 10%">Lampiran</th>
                                                <th>Status</th>
                                                <!-- <th style="width: 20%">Bukti Selesai</th> -->
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; foreach ($aspirasi as $l) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $l->p_id ?></td>
                                                <td><?= $l->tgl_aspirasi ?></td>
                                                <td><?= $l->judul_aspirasi ?></td>
                                                <td>
                                                    <button type="button" class="btn badge bg-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#galleryModal<?= $l->p_id ?>">
                                                        Lihat
                                                    </button>
                                                </td>
                                                <?php if ($l->status == '0') { ?>
                                                <td><span class="btn badge bg-danger">Pending</span></td>
                                                <?php } else if($l->status == 'tolak') { ?>
                                                <td style='white-space: nowrap'>
                                                    <span class="btn badge bg-danger">Ditolak</span>
                                                    <button type="button" class="btn badge bg-primary"
                                                        data-bs-target="#alasanTolak<?= $l->p_id ?>"
                                                        data-bs-toggle="modal">
                                                        Lihat Alasan
                                                    </button>
                                                </td>
                                                <?php }else if($l->status == 'proses') { ?>
                                                <td>
                                                    <span class="btn badge bg-warning">Proses</span>
                                                </td>
                                                <?php } else { ?>
                                                <td style='white-space: nowrap'>
                                                    <span class="btn badge bg-success">Selesai</span>
                                                    <button type="button" class="btn badge bg-primary"
                                                        data-bs-target="#buktiSelesai<?= $l->p_id ?>"
                                                        data-bs-toggle="modal">
                                                        Lihat Bukti Selesai
                                                    </button>
                                                </td>

                                                <?php } ?>

                                                <td style='white-space: nowrap'>
                                                    <?php if ($l->status == 'selesai') { ?>
                                                    <button type="button" class="btn badge bg-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalScrollable<?= $l->id_aspirasi ?>">
                                                        Lihat Tanggapan Petugas
                                                    </button>
                                                    <button type="button" class="btn badge bg-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#default<?= $l->id_aspirasi ?>">
                                                        Lihat Tanggapan Saya
                                                    </button>
                                                    <a href="<?= site_url() ?>laporan/aspirasi/cetakSelesai/<?= $l->id_aspirasi ?>"
                                                        class="btn badge bg-secondary" target="_blank">
                                                        <i class="fa fa-print" aria-hidden="true"></i>
                                                        Print
                                                    </a>
                                                    <?php } ?>

                                                    <?php if ($l->status == 'proses' && $this->db->get_where('tanggapan', ['id_aspirasi' => $l->p_id])->num_rows() >= 1) { ?>
                                                    <button type="button" class="btn badge bg-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalScrollable<?= $l->id_aspirasi ?>">
                                                        Lihat Tanggapan Petugas
                                                    </button>
                                                    <?php if ($l->tanggapan_balik != null) { ?>
                                                    <button type="button" class="btn badge bg-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#default<?= $l->id_aspirasi ?>">
                                                        Lihat Tanggapan Saya
                                                    </button>
                                                    <?php } else { ?>
                                                    <button type="button" class="btn badge bg-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#inlineForm<?= $l->id_aspirasi ?>">
                                                        Beri Tanggapan
                                                        Balik
                                                    </button>
                                                    <?php } ?>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalScrollable<?= $l->id_aspirasi ?>"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                                Judul : <?= $l->judul_aspirasi ?> - Tanggal Tanggapan :
                                                                <?php $tanggal = date("Y-m-d", strtotime($l->tgl_tanggapan)); echo tgl_indo($tanggal, true) ?>
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <b>ISI TANGGAPAN :</b> <br><?= $l->tanggapan ?>
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

                                            <div class="modal fade text-left" id="default<?= $l->id_aspirasi ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel1">
                                                                <?= $l->p_id ?> - <?= $l->judul_aspirasi ?> -
                                                                <?= $l->nim ?>
                                                            </h5>
                                                            <button type="button" class="close rounded-pill"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                <?= $l->tanggapan_balik ?>
                                                            </p>
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

                                            <div class="modal fade"
                                                id="exampleModalScrollable_tanggapan_balik_<?= $l->id_aspirasi ?>"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                                <?= $l->p_id ?> - <?= $l->judul_aspirasi ?> -
                                                                <?= $l->nim ?>
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?= $l->tanggapan_balik ?>
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

                                            <!--form Modal -->
                                            <div class="modal fade text-left" id="inlineForm<?= $l->id_aspirasi ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel33">
                                                                Form Tanggapan Balik
                                                            </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="<?= site_url() ?>mahasiswa/tanggapanBalik/<?= $l->id_aspirasi ?> ?>"
                                                            method="POST">
                                                            <div class="modal-body">
                                                                <label>Tanggapan</label>
                                                                <div class="form-group">
                                                                    <textarea name="tanggapan_balik"
                                                                        class="form-control" cols="30"
                                                                        rows="10"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="submit" class="btn btn-primary ml-1"
                                                                    data-bs-dismiss="modal">
                                                                    <span class="d-none d-sm-block">Submit</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="galleryModal<?= $l->p_id ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="galleryModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                                Judul : <?= $l->judul_aspirasi ?> -
                                                                Tanggal Kejadian : <?= $l->tgl_kejadian ?>
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-secondary" role="alert">
                                                                <?php
                        $ekstensi_1 = substr($l->lampiran_1, -3);
                        if ($ekstensi_1 == 'mp4') { ?>
                                                                Lampiran 1 - <b><?= $l->lampiran_1 ?></b> - <a
                                                                    href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_1 ?>"
                                                                    type="button" class="btn badge btn-primary mb-2"
                                                                    download>Download</a>
                                                                <br>
                                                                <video width="730" height="570" controls>
                                                                    <source
                                                                        src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim?>/<?= $l->lampiran_1 ?>"
                                                                        type="video/mp4">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                                <?php } else if($ekstensi_1 == 'pdf') { ?>
                                                                Lampiran 1 - <b><?= $l->lampiran_1 ?></b> - <a
                                                                    href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_1 ?>"
                                                                    type="button" class="btn badge btn-primary mb-2"
                                                                    download>Download</a>
                                                                <?php } else { ?>
                                                                Lampiran 1 - <b><?= $l->lampiran_1 ?></b> - <a
                                                                    href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_1 ?>"
                                                                    type="button" class="btn badge btn-primary mb-2"
                                                                    download>Download</a>
                                                                <br>
                                                                <img src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_1 ?>"
                                                                    alt="<?= $l->lampiran_1 ?>" width="320"
                                                                    height="240">
                                                                <?php } ?>

                                                                <?php if ($l->lampiran_2 != null): ?>
                                                                <hr>
                                                                <?php
                        $ekstensi_2 = substr($l->lampiran_2, -3);
                        if ($ekstensi_2 == 'mp4') { ?>
                                                                Lampiran 2 - <b><?= $l->lampiran_2 ?></b> - <a
                                                                    href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_2 ?>"
                                                                    type="button" class="btn badge btn-primary mb-2"
                                                                    download>Download</a>
                                                                <br>
                                                                <video width="730" height="570" controls>
                                                                    <source
                                                                        src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_2 ?>"
                                                                        type="video/mp4">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                                <?php } else if($ekstensi_2 == 'pdf') { ?>
                                                                Lampiran 2 - <b><?= $l->lampiran_2 ?></b> - <a
                                                                    href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_2 ?>"
                                                                    type="button" class="btn badge btn-primary mb-2"
                                                                    download>Download</a>
                                                                <?php } else { ?>
                                                                Lampiran 2 - <b><?= $l->lampiran_2 ?></b> - <a
                                                                    href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_2 ?>"
                                                                    type="button" class="btn badge btn-primary mb-2"
                                                                    download>Download</a>
                                                                <br>
                                                                <img src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_2 ?>"
                                                                    alt="<?= $l->lampiran_2 ?>" width="320"
                                                                    height="240">
                                                                <?php } ?>
                                                                <?php endif; ?>

                                                                <?php if ($l->lampiran_3 != null): ?>
                                                                <hr>
                                                                <?php
                        $ekstensi_3 = substr($l->lampiran_3, -3);
                                if ($ekstensi_3 == 'mp4') { ?>
                                                                Lampiran 3 - <b><?= $l->lampiran_3 ?></b> - <a
                                                                    href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_3 ?>"
                                                                    type="button" class="btn badge btn-primary mb-2"
                                                                    download>Download</a>
                                                                <br>
                                                                <video width="730" height="570" controls>
                                                                    <source
                                                                        src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_3 ?>"
                                                                        type="video/mp4">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                                <?php } else if($ekstensi_3 == 'pdf') { ?>
                                                                Lampiran 3 - <b><?= $l->lampiran_3 ?></b> - <a
                                                                    href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_3 ?>"
                                                                    type="button" class="btn badge btn-primary mb-2"
                                                                    download>Download</a>
                                                                <?php } else { ?>
                                                                Lampiran 3 - <b><?= $l->lampiran_3 ?></b> - <a
                                                                    href="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_3 ?>"
                                                                    type="button" class="btn badge btn-primary mb-2"
                                                                    download>Download</a>
                                                                <br>
                                                                <img src="<?= base_url() ?>assets/images/laporan/aspirasi/<?= $l->nim ?>/<?= $l->lampiran_3 ?>"
                                                                    alt="<?= $l->lampiran_3 ?>" width="320"
                                                                    height="240">
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

                                            <div class="modal fade" id="buktiSelesai<?= $l->p_id ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="galleryModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                                Judul : <?= $l->judul_aspirasi ?> -
                                                                Tanggal Selesai :
                                                                <?php $tanggal = date("Y-m-d", strtotime($l->tgl_selesai)); echo tgl_indo($tanggal, true) ?>
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-secondary" role="alert">
                                                                Diselesaikan oleh <b>
                                                                    Petugas </b> pada
                                                                <b><?= tgl_indo(date("Y-m-d", strtotime($l->tgl_selesai))) ?></b>
                                                            </div>

                                                            <?php
                    $ekstensi_1 = substr($l->ls_1, -3);
                    if ($ekstensi_1 == 'mp4') { ?>
                                                            Lampiran 1 - <b><?= $l->ls_1 ?></b> - <a
                                                                href="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_1 ?>"
                                                                type="button" class="btn badge btn-primary mb-2"
                                                                download>Download</a>
                                                            <br>
                                                            <video width="730" height="570" controls>
                                                                <source
                                                                    src="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_1 ?>"
                                                                    type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                            <?php } else if($ekstensi_1 == 'pdf') { ?>
                                                            Lampiran 1 - <b><?= $l->ls_1 ?></b> - <a
                                                                href="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_1 ?>"
                                                                type="button" class="btn badge btn-primary mb-2"
                                                                download>Download</a>
                                                            <?php } else { ?>
                                                            Lampiran 1 - <b><?= $l->ls_1 ?></b> - <a
                                                                href="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_1 ?>"
                                                                type="button" class="btn badge btn-primary mb-2"
                                                                download>Download</a>
                                                            <br>
                                                            <img src="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_1 ?>"
                                                                alt="<?= $l->ls_1 ?>" width="320" height="240">
                                                            <?php } ?>

                                                            <?php if ($l->ls_2 != null): ?>
                                                            <hr>
                                                            <?php
                    $ekstensi_2 = substr($l->ls_2, -3);
                    if ($ekstensi_2 == 'mp4') { ?>
                                                            Lampiran 2 - <b><?= $l->ls_2 ?></b> - <a
                                                                href="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_2 ?>"
                                                                type="button" class="btn badge btn-primary mb-2"
                                                                download>Download</a>
                                                            <br>
                                                            <video width="730" height="570" controls>
                                                                <source
                                                                    src="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_2 ?>"
                                                                    type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                            <?php } else if($ekstensi_2 == 'pdf') { ?>
                                                            Lampiran 2 - <b><?= $l->ls_2 ?></b> - <a
                                                                href="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_2 ?>"
                                                                type="button" class="btn badge btn-primary mb-2"
                                                                download>Download</a>
                                                            <?php } else { ?>
                                                            Lampiran 2 - <b><?= $l->ls_2 ?></b> - <a
                                                                href="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_2 ?>"
                                                                type="button" class="btn badge btn-primary mb-2"
                                                                download>Download</a>
                                                            <br>
                                                            <img src="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_2 ?>"
                                                                alt="<?= $l->ls_2 ?>" width="320" height="240">
                                                            <?php } ?>
                                                            <?php endif; ?>

                                                            <?php if ($l->ls_3 != null): ?>
                                                            <hr>
                                                            <?php
                    $ekstensi_3 = substr($l->ls_3, -3);
                    if ($ekstensi_3 == 'mp4') { ?>
                                                            Lampiran 3 - <b><?= $l->ls_3 ?></b> - <a
                                                                href="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_3 ?>"
                                                                type="button" class="btn badge btn-primary mb-2"
                                                                download>Download</a>
                                                            <br>
                                                            <video width="730" height="570" controls>
                                                                <source
                                                                    src="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_3 ?>"
                                                                    type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                            <?php } else if($ekstensi_3 == 'pdf') { ?>
                                                            Lampiran 3 - <b><?= $l->ls_3 ?></b> - <a
                                                                href="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_3 ?>"
                                                                type="button" class="btn badge btn-primary mb-2"
                                                                download>Download</a>
                                                            <?php } else { ?>
                                                            Lampiran 3 - <b><?= $l->ls_3 ?></b> - <a
                                                                href="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_3 ?>"
                                                                type="button" class="btn badge btn-primary mb-2"
                                                                download>Download</a>
                                                            <br>
                                                            <img src="<?= base_url() ?>assets/images/laporan/selesai/<?= $l->ls_3 ?>"
                                                                alt="<?= $l->ls_3 ?>" width="320" height="240">
                                                            <?php } ?>
                                                            <?php endif; ?>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="alasanTolak<?= $l->p_id ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="galleryModalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-centered scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                                                Judul : <?= $l->judul_aspirasi ?> - Alasan Ditolak
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?= $l->alasan ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>