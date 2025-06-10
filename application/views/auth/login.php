<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>

    <!-- Google Font: Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- MDB UI Kit CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/login_style.css" />
        <link rel="shortcut icon" href="<?= base_url() ?>assets/landing/img/tekkom_logo.png" type="image/png">

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

                                    <form action="<?= site_url('auth/login') ?>" method="POST">
                                        <p>Please login to your account</p>

                                        <?php if ($this->session->flashdata('message')): ?>
                                        <div class="alert alert-info text-center" role="alert">
                                            <?= $this->session->flashdata('message') ?>
                                        </div>
                                        <?php endif; ?>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="form2Example11" class="form-control"
                                                name="username"
                                                value="<?= set_value('username') ?>" />
                                            <label class="form-label" for="form2Example11">Username</label>
                                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="form2Example22" class="form-control"
                                                name="password" />
                                            <label class="form-label" for="form2Example22">Password</label>
                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button type="submit"
                                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">
                                                Log in
                                            </button>
                                            <a class="text-muted" href="#!">Forgot password?</a>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2 fw-medium">
                                                Don't have an account?
                                            </p>
                                            <a href="<?= site_url('auth/register') ?>"
                                                class="btn btn-outline-danger">Create new</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center image-background">

                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4 fw-bold">RuangAspira! Teknik Komputer</h4>
                                    <p class="small mb-0">
                                        RuangAspira! Teknik Komputer adalah sebuah
                                        layanan pengaduan dan aspirasi berbasis web yang ditujukan
                                        khusus untuk mahasiswa Program Studi Teknik Komputer.
                                        Platform ini memfasilitasi penyampaian keluhan, saran,
                                        maupun masukan yang membangun secara langsung kepada pihak
                                        pengelola program studi.
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
