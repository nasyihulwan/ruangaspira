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

        <section>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <?php if ($this->uri->segment(2) == 'result') { ?>
                                <form action="<?= base_url() ?>laporan/cetak" method="post" target="_blank">
                                    <?php } else { ?>
                                    <form action="<?= base_url() ?>laporan/result" method="post">
                                        <?php } ?>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="choices form-select" name="status">
                                                <option value="0"
                                                    class="<?php if ($status == '0'){ echo "selected"; } ?>">
                                                    Pending
                                                </option>
                                                <option value="proses"
                                                    <?php if ($status == 'proses'){ echo "selected"; } ?>>
                                                    Proses
                                                </option>
                                                <option value="selesai"
                                                    <?php if ($status == 'selesai'){ echo "selected"; } ?>>
                                                    Selesai
                                                </option>
                                                <option value="tolak"
                                                    <?php if ($status == 'tolak'){ echo "selected"; } ?>>
                                                    Ditolak
                                                </option>
                                                <option value="*" <?php if ($status == '*') { echo "selected"; } ?>>
                                                    Semua
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Periode</label>
                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="dari"
                                                        id="laporan_dari" placeholder="Dari" value="<?= $dari ?>">
                                                </div>
                                                <div class="col-6 ">
                                                    <input type="text" class="form-control" name="sampai"
                                                        id="laporan_sampai" placeholder="Sampai" value="<?= $sampai ?>">
                                                </div>
                                            </div>


                                            <?php if ($this->uri->segment(2) == 'result') { ?>
                                            <button type="submit"
                                                class="btn btn-block btn-outline-primary mb-3">PRINT</button>
                                            <a href="<?= site_url() ?>laporan"
                                                class="btn btn-block btn-outline-danger mb-3">RESET</a>
                                            <?php } else { ?>
                                            <button type="submit" class="btn btn-block btn-outline-primary mb-3">CARI
                                                DATA</button>
                                            <?php } ?>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php if ($this->uri->segment(2) == 'result') { $this->load->view('laporan/pengaduan/result'); }  ?>

        </section>


    </div>