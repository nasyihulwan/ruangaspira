<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Page</title>

    <!-- Google Font: Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- MDB UI Kit CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/register_style.css" />
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="<?= base_url() ?>assets/landing/img/tekkom_logo.png"
                                            alt="Logo Teknik Komputer" style="width: 250px; margin-bottom: 30px" />
                                    </div>

                                    <form action="<?= base_url('auth/register'); ?>" method="post">
    <p>Create a new account</p>

    <?php if ($this->session->flashdata('message')) : ?>
        <?= $this->session->flashdata('message'); ?>
    <?php endif; ?>


    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="nim" name="nim" class="form-control" placeholder="NIM" value="<?= set_value('nim'); ?>" />
        <label class="form-label" for="nim">NIM</label>
        <?= form_error('nim', '<small class="text-danger ps-1">', '</small>'); ?>
    </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="nama" name="nama" class="form-control" placeholder="Full Name" value="<?= set_value('nama'); ?>" />
        <label class="form-label" for="nama">Full Name</label>
        <?= form_error('nama', '<small class="text-danger ps-1">', '</small>'); ?>
    </div>
    
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>"/>
        <label class="form-label" for="username">Username</label>
        <?= form_error('username', '<small class="text-danger ps-1">', '</small>'); ?>
    </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="telp" name="telp" class="form-control" placeholder="No. Telp / Ponsel" value="<?= set_value('telp'); ?>"/>
        <label class="form-label" for="telp">No. Telp / Ponsel</label>
        <?= form_error('telp', '<small class="text-danger ps-1">', '</small>'); ?>
    </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Alamat Lengkap"><?= set_value('alamat'); ?></textarea>
        <label class="form-label" for="alamat">Alamat</label>
        <?= form_error('alamat', '<small class="text-danger ps-1">', '</small>'); ?>
    </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" id="passwordInput" name="password1" class="form-control" placeholder="Password" />
        <label class="form-label" for="passwordInput">Password</label>
        <?= form_error('password1', '<small class="text-danger ps-1">', '</small>'); ?>
    </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" id="confirmPasswordInput" name="password2" class="form-control" placeholder="Confirm Password" />
        <label class="form-label" for="confirmPasswordInput">Confirm Password</label>
        <?= form_error('password2', '<small class="text-danger ps-1">', '</small>'); ?>
    </div>

    <div class="text-center pt-1 mb-5 pb-1">
        <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">
            Register
        </button>
    </div>

    <div class="d-flex align-items-center justify-content-center pb-4">
        <p class="mb-0 me-2">Already have an account?</p>
        <a href="<?= site_url('auth/login') ?>" class="btn btn-outline-danger">Login</a>
    </div>
</form>
                                </div>
                            </div>

                            <div class="col-lg-6 d-flex align-items-center image-background">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4 fw-bold">Bergabunglah dengan RuangAspira!</h4>
                                    <p class="small mb-0">
                                        Daftarkan akun Anda untuk menggunakan layanan aspirasi
                                        mahasiswa Teknik Komputer. Platform ini mendukung
                                        mahasiswa menyampaikan keluhan dan saran langsung kepada
                                        pengelola prodi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MDB UI Kit JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>

</html>
