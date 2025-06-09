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
                                    <th>Program Studi</th> <th>Angkatan</th>   <th>Judul Aspirasi</th>
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
                                    <td><?= $r->prodi ?></td>      <td><?= $r->angkatan ?></td>   <td><?= $r->judul_aspirasi ?></td>
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
                                    
                                    <div class="modal fade" id="exampleModalScrollable<?= $r->id_aspirasi ?>" ...>...</div>
                                    <div class="modal fade" id="galleryModal<?= $r->id_aspirasi ?>" ...>...</div>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>