<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Mahasiswa Terdaftar</h6>
                                        <h6 class="font-extrabold mb-0"><?= $mahasiswaCount ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Aspirasi Masuk</h6>
                                        <h6 class="font-extrabold mb-0"><?= $this->db->get('aspirasi')->num_rows() ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon red mb-2">
                                            <i class="fa fa-list-ul"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Aspirasi Pending</h6>
                                        <h6 class="font-extrabold mb-0">
                                            <?= $this->db->get_where('aspirasi', ['status' => 'pending'])->num_rows() ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon blue mb-2">
                                            <i class="fa fa-list-ul"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Aspirasi Proses</h6>
                                        <h6 class="font-extrabold mb-0">
                                            <?= $this->db->get_where('aspirasi', ['status' => 'proses'])->num_rows() ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon green mb-2">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Aspirasi Selesai</h6>
                                        <h6 class="font-extrabold mb-0">
                                            <?= $this->db->get_where('aspirasi', ['status' => 'selesai'])->num_rows() ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Ulasan Mahasiswa (Pengguna)</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?= site_url() ?>dashboard/umChartFilter" method="post">
                                    <input type="hidden"
                                        value="<?= $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Sangat Puas'])->num_rows() ?>"
                                        id="sangatPuas" class="sangatPuas">
                                    <input type="hidden"
                                        value="<?= $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Puas'])->num_rows() ?>"
                                        id="puas" class="puas">
                                    <input type="hidden"
                                        value="<?= $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Kurang Puas'])->num_rows() ?>"
                                        id="kurangPuas" class="kurangPuas">
                                    <input type="hidden"
                                        value="<?= $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Tidak Puas'])->num_rows() ?>"
                                        id="tidakPuas" class="tidakPuas">
                                    <input type="hidden"
                                        value="<?= $this->db->get_where('ulasan_mahasiswa', ['tingkat_kepuasan' => 'Sangat Tidak Puas'])->num_rows() ?>"
                                        id="sangatTidakPuas" class="sangatTidakPuas">
                                    <div id="chart-ulasan"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
