<!-- ***** Features Small Start ***** -->
<section class="section home-feature mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- ***** Features Small Item Start ***** -->
                    <div class="col-lg-12 col-md-6 col-sm-6 col-12"
                        data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                        <div class="features-small-item">
                            <!-- <div class="icon">
                                    <i><img src="assets/images/featured-item-01.png" alt=""></i>
                                </div> -->
                            <h3 class="features-title"> <b>Sampaikan Laporan Anda</b> </h3>
                            <p>Isi Form Dengan Benar Agar Tidak Terjadi Kesalahan.</p>
                            <p><b>Lihat Petunjuk Cara Mengisi Form Dengan Baik dan Benar.</b> <button type="button"
                                    class="btn btn-outline-danger" data-toggle="modal"
                                    data-target=".bd-example-modal-lg"><i class="fa fa-question"
                                        aria-hidden="true"></i></button></p>
                            <div class="col-lg-12 col-md-6 col-sm-12 mt-5">
                                <div class="contact-form">
                                    <!-- <form action="<?= site_url() ?>lapor/" method="POST"> -->
                                    <?= form_open_multipart('lapor/'); ?>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <fieldset>
                                                <input name="judul_laporan" type="text" class="form-control" id="name"
                                                    placeholder="Ketik Judul Laporan Anda (Wajib)" required="">
                                                <?= form_error('judul_laporan', '<small class="text-danger pl-2">', '</small>') ?>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <textarea name="isi_laporan" rows="12" class="form-control" id="message"
                                                    placeholder="Ketik Isi Laporan Anda (Wajib)" required=""></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <input type="text" class="form-control" name="tgl_kejadian"
                                                    id="tgl_kejadian" placeholder="Tanggal & Waktu Kejadian (Wajib)"
                                                    required>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <input type="text" class="form-control" name="tempat_kejadian"
                                                    placeholder="Lokasi Kejadian. Contoh: Bojong Awi Kaler (Wajib)"
                                                    required>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12 mb-4 justify-content-end">
                                            <fieldset>
                                                <input type="file" class="dropify" id="lampiran_1" name="lampiran_1"
                                                    data-allowed-file-extensions="jpg jpeg png pdf mp4" required>
                                                <br>
                                                <div id="div_lam_2">
                                                    <label class="float-left">Lampiran 2 (Opsional)</label>
                                                    <input type="file" class="dropify" id="lampiran_2" name="lampiran_2"
                                                        data-allowed-file-extensions="jpg jpeg png pdf mp4">
                                                    <br>
                                                </div>
                                                <div id="div_lam_3">
                                                    <label class="float-left">Lampiran 3 (Opsional)</label>
                                                    <input type="file" class="dropify" id="lampiran_3" name="lampiran_3"
                                                        data-allowed-file-extensions="jpg jpeg png pdf mp4">
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12 mb-4">
                                            <fieldset>
                                                <div class="form-group">
                                                    <select class="choices form-select" name="kategori_laporan">
                                                        <option value="0" selected>Kategori Laporan (Opsional, biarkan
                                                            default
                                                            jika
                                                            anda tidak yakin)</option>
                                                        <?php foreach ($pengaduanKategori as $r) { ?>
                                                        <option value="<?= $r->id ?>">
                                                            <?= $r->nama_kategori ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="main-button btn-block">
                                                    <b>LAPOR!</b> </button>
                                            </fieldset>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Features Small Item End ***** -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Features Small End ***** -->

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Petunjuk Cara Mengisi Form Dengan Baik dan Benar.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url() ?>assets/landing/images/petunjuk_pengaduan.png" alt="" style="width: 100%;">
            </div>
        </div>
    </div>
</div>