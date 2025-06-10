<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RuangAspira! Teknik Komputer</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/input_style.css" />

    <style>
    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1080;
    }
    </style>
</head>

<body>

    <div class="bg-image-vertical"></div>

    <section class="intro">
        <div class="mask d-flex align-items-center h-100 w-100">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <div class="card" style="border-radius: 1rem">
                            <div class="card-body p-5">
                                <h1 class="mb-4 text-center">Sampaikan Aspirasi Anda</h1>

                                <?php if ($this->session->flashdata('form_errors')) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('form_errors'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->session->flashdata('message')) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('message'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                <form action="<?= base_url('lapor/index'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-outline mb-4">
                                        <input type="text" id="judulLaporan" name="judul_aspirasi" class="form-control" placeholder="Contoh: Jalan Rusak" value="<?= set_value('judul_aspirasi'); ?>" />
                                        <label class="form-label" for="judulLaporan">Ketik Judul Laporan Anda</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <textarea class="form-control" id="isiLaporan" name="isi_laporan" rows="5" placeholder="Ceritakan kronologi atau informasi lainnya..."><?= set_value('isi_laporan'); ?></textarea>
                                        <label class="form-label" for="isiLaporan">Ketik Isi Laporan Anda</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="lokasiKejadian" name="tempat_kejadian" class="form-control" placeholder="Contoh: Gedung Baru" value="<?= set_value('tempat_kejadian'); ?>" />
                                        <label class="form-label" for="lokasiKejadian">Lokasi Kejadian</label>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label" for="aspirasiKategori">Kategori Aspirasi</label>
                                        <select class="form-control" id="aspirasiKategori" name="kategori">
                                            <option value="">Pilih Kategori</option>
                                            <?php foreach ($kategori_aspirasi as $kategori) : ?>
                                                <option value="<?= $kategori->id ?>" <?= set_select('kategori', $kategori->nama_kategori); ?>>
                                                    <?= $kategori->nama_kategori ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="date" id="tglKejadian" name="tgl_kejadian" class="form-control" value="<?= set_value('tgl_kejadian'); ?>" />
                                        <label class="form-label" for="tglKejadian">Tanggal Kejadian (Opsional)</label>
                                    </div>

                                    <div class="mb-4">
                                        <label for="lampiran_1" class="form-label d-block">Upload File Lampiran 1 (Opsional):</label>
                                        <input class="form-control dropify" type="file" id="lampiran_1" name="lampiran_1" data-height="100" />
                                    </div>
                                    <div class="mb-4 attachment-field" id="lampiran_2_container">
                                        <label for="lampiran_2" class="form-label d-block">Upload File Lampiran 2 (Opsional):</label>
                                        <input class="form-control dropify" type="file" id="lampiran_2" name="lampiran_2" data-height="100" />
                                    </div>
                                    <div class="mb-4 attachment-field" id="lampiran_3_container">
                                        <label for="lampiran_3" class="form-label d-block">Upload File Lampiran 3 (Opsional):</label>
                                        <input class="form-control dropify" type="file" id="lampiran_3" name="lampiran_3" data-height="100" />
                                    </div>

                                    <a href="javascript:history.back()" class="btn btn-light btn-block fa-lg mb-3">Kembali</a>

                                    <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">
                                        Kirim Laporan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card" style="border-radius: 1rem">
                        <div class="card-body p-5">
                            <h1 class="mb-4 text-center">Beri Ulasan</h1>

                            <p class="text-center mb-4 text-muted">
                                Anda dapat memberikan layanan RuangAspira! Teknik Komputer ulasan. Kritik & Saran akan sangat membantu kami untuk terus berkembang.
                            </p>

                            <div class="text-center">
                                <a href="<?= site_url('mahasiswa/ulasan') ?>" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">
                                    Beri Ulasan
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center py-4 bg-light">
        <p class="mb-1">© 2025 RuangAspira! Teknik Komputer</p>
        <a href="https://instagram.com/teknikkomputer.upi" target="_blank"
            class="text-dark text-decoration-none ig-link">
            <i class="bi bi-instagram"></i> @teknikkomputer.upi
        </a>
    </footer>

    <div class="toast-container">
        <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Dropify
            $('.dropify').dropify({
                messages: {
                    'default': 'Seret dan lepas file di sini atau klik',
                    'replace': 'Seret dan lepas atau klik untuk mengganti',
                    'remove': 'Hapus',
                    'error': 'Ups, ada yang salah.'
                },
                error: {
                    'fileSize': 'Ukuran file terlalu besar (maks {{ value }}).',
                    'minWidth': 'Lebar gambar terlalu kecil (min {{ value }}px).',
                    'maxWidth': 'Lebar gambar terlalu besar (maks {{ value }}px).',
                    'minHeight': 'Tinggi gambar terlalu kecil (min {{ value }}px).',
                    'maxHeight': 'Tinggi gambar terlalu besar (maks {{ value }}px).',
                    'imageFormat': 'Format gambar tidak diizinkan (hanya {{ value }}).',
                    'fileExtension': 'Ekstensi file tidak diizinkan (hanya {{ value }}).'
                }
            });

            // Initialize Choices.js for the select dropdown
            var aspirasiKategori = document.querySelector('#aspirasiKategori');
            var choices = new Choices(aspirasiKategori, {
                searchEnabled: false,
                itemSelectText: 'Pilih',
                placeholder: true,
                placeholderValue: 'Pilih Kategori',
            });

            // MDBootstrap form outline initialization for dynamically added elements or if not automatically initialized
            document.querySelectorAll('.form-outline').forEach((formOutline) => {
                new mdb.Input(formOutline).init();
            });

            <?php if ($this->session->flashdata('success')) : ?>
                var successToast = document.getElementById('successToast');
                var toastBody = successToast.querySelector('.toast-body');
                toastBody.textContent = '<?= $this->session->flashdata('success'); ?>';
                var bsToast = new bootstrap.Toast(successToast);
                bsToast.show();
            <?php endif; ?>

            // Dynamic attachment fields logic
            const lampiran1 = document.getElementById('lampiran_1');
            const lampiran2Container = document.getElementById('lampiran_2_container');
            const lampiran3Container = document.getElementById('lampiran_3_container');
            const lampiran2Input = document.getElementById('lampiran_2');

            function toggleAttachmentFields() {
                if (lampiran1.value) { // Check if a file is selected in lampiran_1
                    lampiran2Container.style.display = 'block';
                } else {
                    lampiran2Container.style.display = 'none';
                    lampiran3Container.style.display = 'none'; // Hide lampiran_3 if lampiran_1 is empty
                    // Optionally clear file inputs if they were hidden
                    if (lampiran2Input.dropify) lampiran2Input.dropify().destroy();
                    if (document.getElementById('lampiran_3').dropify) document.getElementById('lampiran_3').dropify().destroy();
                    // Reinitialize if needed after hiding/showing
                    $('.dropify').dropify({
                        messages: {
                            'default': 'Seret dan lepas file di sini atau klik',
                            'replace': 'Seret dan lepas atau klik untuk mengganti',
                            'remove': 'Hapus',
                            'error': 'Ups, ada yang salah.'
                        },
                        error: {
                            'fileSize': 'Ukuran file terlalu besar (maks {{ value }}).',
                            'minWidth': 'Lebar gambar terlalu kecil (min {{ value }}px).',
                            'maxWidth': 'Lebar gambar terlalu besar (maks {{ value }}px).',
                            'minHeight': 'Tinggi gambar terlalu kecil (min {{ value }}px).',
                            'maxHeight': 'Tinggi gambar terlalu besar (maks {{ value }}px).',
                            'imageFormat': 'Format gambar tidak diizinkan (hanya {{ value }}).',
                            'fileExtension': 'Ekstensi file tidak diizinkan (hanya {{ value }}).'
                        }
                    });
                }

                if (lampiran2Input.value) { // Check if a file is selected in lampiran_2
                    lampiran3Container.style.display = 'block';
                } else {
                    lampiran3Container.style.display = 'none';
                    if (document.getElementById('lampiran_3').dropify) document.getElementById('lampiran_3').dropify().destroy();
                    $('.dropify').dropify({
                        messages: {
                            'default': 'Seret dan lepas file di sini atau klik',
                            'replace': 'Seret dan lepas atau klik untuk mengganti',
                            'remove': 'Hapus',
                            'error': 'Ups, ada yang salah.'
                        },
                        error: {
                            'fileSize': 'Ukuran file terlalu besar (maks {{ value }}).',
                            'minWidth': 'Lebar gambar terlalu kecil (min {{ value }}px).',
                            'maxWidth': 'Lebar gambar terlalu besar (maks {{ value }}px).',
                            'minHeight': 'Tinggi gambar terlalu kecil (min {{ value }}px).',
                            'maxHeight': 'Tinggi gambar terlalu besar (maks {{ value }}px).',
                            'imageFormat': 'Format gambar tidak diizinkan (hanya {{ value }}).',
                            'fileExtension': 'Ekstensi file tidak diizinkan (hanya {{ value }}).'
                        }
                    });
                }
            }

            // Call on page load to set initial state
            toggleAttachmentFields();

            // Add event listeners for changes
            lampiran1.addEventListener('change', toggleAttachmentFields);
            lampiran2Input.addEventListener('change', toggleAttachmentFields);
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if ($this->session->flashdata('success')) : ?>
        var successToast = document.getElementById('successToast');
        var toastBody = successToast.querySelector('.toast-body');
        toastBody.textContent = '<?= $this->session->flashdata('success'); ?>';
        var bsToast = new bootstrap.Toast(successToast);
        bsToast.show();
        <?php endif; ?>
    });
    </script>
</body>

</html>