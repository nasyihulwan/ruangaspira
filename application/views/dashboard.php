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

                    <?php if ($this->session->userdata('level') == 'prodi_tekkom') : ?>
                        <div class="col-12 text-end mb-3">
                            <button class="btn btn-outline-primary" id="toggleAspirasiView">
                                <span id="toggleText">Lihat Data Prodi</span>
                            </button>
                        </div>
                    <?php endif; ?>

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
                                        <h6 class="font-extrabold mb-0 aspirasi-count"
                                            data-total="<?= $totalAspirasiMasuk ?>"
                                            data-prodi="<?= $prodiAspirasiMasuk ?>">
                                            <?= $totalAspirasiMasuk ?>
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
                                        <h6 class="font-extrabold mb-0 aspirasi-count"
                                            data-total="<?= $totalAspirasiPending ?>"
                                            data-prodi="<?= $prodiAspirasiPending ?>">
                                            <?= $totalAspirasiPending ?>
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
                                        <h6 class="font-extrabold mb-0 aspirasi-count"
                                            data-total="<?= $totalAspirasiProses ?>"
                                            data-prodi="<?= $prodiAspirasiProses ?>">
                                            <?= $totalAspirasiProses ?>
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
                                        <h6 class="font-extrabold mb-0 aspirasi-count"
                                            data-total="<?= $totalAspirasiSelesai ?>"
                                            data-prodi="<?= $prodiAspirasiSelesai ?>">
                                            <?= $totalAspirasiSelesai ?>
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
                                        value="<?= $ulasanSangatPuas ?>"
                                        id="sangatPuas" class="sangatPuas">
                                    <input type="hidden"
                                        value="<?= $ulasanPuas ?>"
                                        id="puas" class="puas">
                                    <input type="hidden"
                                        value="<?= $ulasanKurangPuas ?>"
                                        id="kurangPuas" class="kurangPuas">
                                    <input type="hidden"
                                        value="<?= $ulasanTidakPuas ?>"
                                        id="tidakPuas" class="tidakPuas">
                                    <input type="hidden"
                                        value="<?= $ulasanSangatTidakPuas ?>"
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
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('toggleAspirasiView');
    const toggleText = document.getElementById('toggleText');
    const aspirasiCounts = document.querySelectorAll('.aspirasi-count');
    let showingTotal = true;

    if (toggleButton) {
        // Initial state for prodi_tekkom: Show prodi-specific data first if desired.
        // If you want to show TOTAL first, remove this initial block.
        showingTotal = false;
        aspirasiCounts.forEach(el => {
            el.textContent = el.dataset.prodi;
        });
        toggleText.textContent = 'Lihat Data Keseluruhan';
    }

    if (toggleButton) {
        toggleButton.addEventListener('click', function() {
            if (showingTotal) {
                aspirasiCounts.forEach(el => {
                    el.textContent = el.dataset.prodi;
                });
                toggleText.textContent = 'Lihat Data Keseluruhan';
            } else {
                aspirasiCounts.forEach(el => {
                    el.textContent = el.dataset.total;
                });
                toggleText.textContent = 'Lihat Data Prodi';
            }
            showingTotal = !showingTotal;
        });
    }
});
</script>