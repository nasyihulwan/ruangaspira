<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="<?= site_url() ?>mahasiswa"><img
                                    src="<?= base_url() ?>assets/landing/img/tekkom_logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="header-top-right">
                            <div class="dropdown">
                                <a href="#" id="topbarUserDropdown"
                                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md2">
                                        <img src="<?= base_url() ?>assets/images/faces/1.jpg" alt="Avatar" />
                                    </div>
                                    <div class="text">
                                        <h6 class="user-dropdown-name"><?= $this->session->userdata('nama') ?></h6>
                                        <p class="user-dropdown-status text-sm text-muted">
                                            <?= $this->session->userdata('nim') ?>
                                        </p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg"
                                    aria-labelledby="topbarUserDropdown">
                                    <li><a class="dropdown-item" href="<?= site_url() ?>mahasiswa/profile">Profile</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= site_url() ?>auth/m_logout">Logout</a>
                                    </li>
                                </ul>
                            </div>

                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li class="menu-item">
                                <a href="<?= site_url() ?>" class="menu-link">
                                    <span><i class="bi bi-arrow-left"></i> Halaman Utama</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url() ?>mahasiswa" class="menu-link">
                                    <span><i class="bi bi-grid-fill"></i> Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url() ?>lapor" class="menu-link">
                                    <span><i class="bi bi-send-fill"></i> Kirim Aspirasi</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url() ?>mahasiswa/aspirasi" class="menu-link">
                                    <span><i class="bi bi-stack"></i> Aspirasi Saya</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= site_url() ?>mahasiswa/ulasan" class="menu-link">
                                    <span><i class="bi bi-star-fill"></i> Beri Ulasan</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>

            </div>
    </div>
</body>