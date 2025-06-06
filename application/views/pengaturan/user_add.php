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
        <section class="section col-6">
            <div class="card">
                <div class="card-body">
                    <a href="<?= site_url() ?>user/add/masyarakat" class="col-12 btn btn-info mb-3">Masyarakat</a>
                    <a href="<?= site_url() ?>user/add/petugas" class="col-12 btn btn-primary">Petugas</a>
                </div>
            </div>
        </section>
        <?php if ($this->uri->segment(3) == 'petugas') { 
            $this->load->view('pengaturan/petugas_add');
        } else if ($this->uri->segment(3) == 'masyarakat') {
            $this->load->view('pengaturan/masyarakat_add');
        } ?>
        <!-- Basic Tables end -->


    </div>