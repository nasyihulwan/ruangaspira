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

                                    <form>
                                        <p>Create a new account</p>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="nameInput" class="form-control"
                                                placeholder="Full Name" />
                                            <label class="form-label" for="nameInput">Full Name</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" id="emailInput" class="form-control"
                                                placeholder="Email address" />
                                            <label class="form-label" for="emailInput">Email</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="usernameInput" class="form-control"
                                                placeholder="Username" />
                                            <label class="form-label" for="usernameInput">Username</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="passwordInput" class="form-control"
                                                placeholder="Password" />
                                            <label class="form-label" for="passwordInput">Password</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="confirmPasswordInput" class="form-control"
                                                placeholder="Confirm Password" />
                                            <label class="form-label" for="confirmPasswordInput">Confirm
                                                Password</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button type="submit"
                                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">
                                                Register
                                            </button>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <a class="mb-0 me-2 fw-medium text-dark">Already have an account?</a>
                                            <a href="<?= site_url('auth/register') ?>"
                                                class="btn btn-outline-danger">Login</a>
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
