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
                        <?= $this->session->flashdata('message') ?>
                        <div class="card-content">
                            <div class="card-body">
                                <form
                                    action="<?= site_url() ?>pengaduan/proses/updateSelesai/<?= $queryAduan['p_id'] ?>"
                                    method="POST">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">ID Pengaduan</label>
                                            <input type="text" name="id_petugas"
                                                value="<?= $this->session->userdata('id_petugas') ?>" hidden>
                                            <input type="text" name="aduan" value="<?= $queryAduan['id_pengaduan'] ?>"
                                                hidden>
                                            <input type="text" name="id_pengaduan" class="form-control"
                                                value="<?= $queryAduan['p_id'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">NIK</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                value="<?= $queryAduan['nik'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Tanggal Pengaduan</label>
                                            <input type="text" name="tgl_pengaduan" class="form-control"
                                                value="<?= $queryAduan['tgl_pengaduan'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Isi
                                                    Laporan</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="9"
                                                    disabled>
                                                        <?php echo htmlspecialchars($queryAduan['isi_laporan']); ?>
                                                    </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label class="form-label">Foto</label>
                                            <div class="row gallery" data-bs-toggle="modal"
                                                data-bs-target="#galleryModal">
                                                <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                                    <a href="#">
                                                        <img class="w-100 active"
                                                            src="<?= base_url() ?>assets/images/laporan/<?= $queryAduan['foto'] ?>"
                                                            data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Status</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                value="<?= ucfirst($queryAduan['status']) ?>" name="status_pengaduan"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Tanggapan
                                                    Petugas</label>
                                                <textarea name="tanggapan" class="form-control"
                                                    id="exampleFormControlTextarea1" rows="9" required <?php 
                                                            if ($this->db->get_where('tanggapan', ['id_pengaduan' => $queryAduan['id_pengaduan']])->num_rows() >= 1) {
                                                                echo "disabled";
                                                            } ?>>
                                                            <?php if ($this->db->get_where('tanggapan', ['id_pengaduan' => $queryAduan['id_pengaduan']])->num_rows() >= 1) {
                                                                echo htmlspecialchars($getDate['tanggapan']);
                                                            } ?>
                                                        </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <div class="form-group mb-3">
                                                    <label>Foto Bukti</label>
                                                    <input type="file" class="dropify" id="foto_bukti_selesai"
                                                        name="foto_bukti_selesai"
                                                        data-allowed-file-extensions="jpg png jpeg">
                                                    <?= form_error('foto_bukti_selesai', '<h6 class="text-danger pl-2">', '</h6>') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">SELESAI</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Modal -->
        <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="galleryModalTitle">
                            <?= $queryAduan['id_pengaduan'] . ' - ' . $queryAduan['nik'] . ' - ' . $queryAduan['foto']?>
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div id="Gallerycarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <!-- <div class="carousel-indicators">
                                <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="3"
                                    aria-label="Slide 4"></button>
                            </div> -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100"
                                        src="<?= base_url() ?>assets/images/laporan/<?= $queryAduan['foto'] ?>">
                                </div>
                            </div>
                            <!-- <a class="carousel-control-prev" href="#Gallerycarousel" role="button" type="button"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next" href="#Gallerycarousel" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a> -->
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>