<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RuangAspira Teknik Komputer</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/index_style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</head>

<body>
    <header class="header-hero" id="home">
        <nav class=" navbar pill-style">
            <div class="logo">
                <img src="<?= base_url() ?>assets/landing/img/tekkom_logo.png" alt="logo" />
            </div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#faq">FAQ</a></li>
                <li><a href="#review">Review</a></li>
                <?php if ($this->session->userdata('nim') != null): // Cek jika sesi mahasiswa (nim) ada ?>
                <li><a href="<?= site_url('mahasiswa/aspirasi') ?>">Dashboard</a></li>
                <?php elseif ($this->session->userdata('id_petugas') != null): // Cek jika sesi petugas (id_petugas) ada ?>
                <li><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
                <?php else: ?>
                <li><a href="<?= site_url('auth/login') ?>">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="hero-text">
            <h1>Suarakan Aspirasimu di Teknik Komputer</h1>
            <p>Media penghubung antara mahasiswa dan pengelola program studi Teknik Komputer</p>
            <?php if ($this->session->userdata('nim') != null || $this->session->userdata('id_petugas') != null): ?>
            <a href="<?= site_url('aspirasi') ?>" class="btn-lapor">Aspirasikan Sekarang</a>
            <?php else: ?>
            <a href="<?= site_url('auth/login') ?>" class="btn-lapor">Masuk untuk Aspirasi</a>
            <?php endif; ?>
        </div>
    </header>

    <section class="about" id="about">
        <div class="about-container">
            <div class="about-text">
                <h2>Apa itu RuangAspira! Teknik Komputer</h2>
                <p>
                    RuangAspira! Teknik Komputer adalah sebuah layanan pengaduan dan aspirasi berbasis web
                    yang ditujukan khusus untuk mahasiswa Program Studi Teknik Komputer.
                </p>
                <p>
                    ASMA hadir sebagai bentuk partisipasi aktif mahasiswa dalam meningkatkan kualitas layanan akademik,
                    sarana dan prasarana, serta kebijakan-kebijakan yang berlaku di lingkungan Teknik Komputer.
                </p>
                <p>
                    Melalui platform ini, diharapkan tercipta budaya komunikasi yang sehat, kolaboratif, dan solutif
                    antara mahasiswa dan pengelola demi kemajuan bersama.
                </p>
            </div>
            <div class="about-img">
                <img src="<?= base_url() ?>assets/landing/img/bertanya.png" alt="Orang Bertanya" />
            </div>
        </div>
    </section>

    <section class="faq" id="faq">
        <div class="faq-container">
            <h2>Pertanyaan yang Sering Diajukan (FAQ)</h2>
            <div class="faq-item">
                <button class="faq-question">Apa itu ASMA Teknik Komputer?</button>
                <div class="faq-answer">
                    <p>ASMA adalah platform untuk menyampaikan aspirasi, saran, dan keluhan mahasiswa Teknik Komputer
                        secara langsung dan transparan kepada pihak pengelola prodi.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">Siapa saja yang bisa mengirim aspirasi?</button>
                <div class="faq-answer">
                    <p>Seluruh mahasiswa aktif Program Studi Teknik Komputer dapat mengirimkan aspirasi melalui platform
                        ini.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">Bagaimana proses tindak lanjut aspirasi?</button>
                <div class="faq-answer">
                    <p>Setiap aspirasi akan diteruskan ke pihak terkait di prodi, dibahas, lalu direspon melalui media
                        komunikasi resmi HIMA atau ASMA.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">Apakah saya bisa menyampaikan aspirasi lebih dari satu kali?</button>
                <div class="faq-answer">
                    <p>Ya, kamu dapat mengirimkan lebih dari satu aspirasi selama masih dalam konteks yang berbeda dan
                        relevan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="review" id="review">
        <div class="review-container">
            <h2>Ulasan Mahasiswa</h2>
            <div class="review-list">
                <div class="review-item">
                    <p class="review-isi">“Platform ini sangat membantu menyampaikan keresahan mahasiswa.”</p>
                    <p class="review-nama">– Nasyih, Teknik Komputer 2023</p>
                </div>
                <div class="review-item">
                    <p class="review-isi">“Responsnya cepat dan transparan. Keren!”</p>
                    <p class="review-nama">– Subhan, Teknik Komputer 2023</p>
                </div>
                <div class="review-item">
                    <p class="review-isi">“Harapannya makin banyak yang aktif pake ASMA.”</p>
                    <p class="review-nama">– Raras, Teknik Komputer 2023</p>
                </div>
            </div>
        </div>
    </section>

    <section class="login" id="login">
        <div class="login-container">
            <h2>Beri Ulasan</h2>
            <p>Anda dapat memberikan layanan LAPMAS ulasan. Kritik & Saran akan sangat membantu kami untuk terus
                berkembang.</p>
            <a href="login.html" class="login-button">LOGIN UNTUK MEMBERI ULASAN</a>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <p>© 2025 ASMA Teknik Komputer</p>
            <a href="https://www.instagram.com/teknikkomputer.upi?igsh=ZThxanRmOXR2dWp4" target="_blank"
                class="ig-link">
                <i class="bi bi-instagram"></i> @teknikkomputer.upi
            </a>
        </div>
    </footer>

    <script>
    const aboutSection = document.querySelector(".about-container");
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                aboutSection.classList.add("show");
            } else {
                aboutSection.classList.remove("show");
            }
        });
    }, {
        threshold: 0.3
    });
    observer.observe(aboutSection);
    </script>

    <script>
    const faqSection = document.querySelector(".faq-container");
    const observerFaq = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                faqSection.classList.add("show");
            } else {
                faqSection.classList.remove("show");
            }
        });
    }, {
        threshold: 0.3
    });
    observerFaq.observe(faqSection);
    </script>

    <script>
    const faqItems = document.querySelectorAll(".faq-item");
    faqItems.forEach((item) => {
        const question = item.querySelector(".faq-question");
        question.addEventListener("click", () => {
            const isActive = item.classList.contains("active");
            faqItems.forEach((otherItem) => otherItem.classList.remove("active"));
            if (!isActive) {
                item.classList.add("active");
            }
        });
    });
    </script>

    <script>
    const reviewSection = document.querySelector(".review-container");
    const observerreview = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                reviewSection.classList.add("show");
            } else {
                reviewSection.classList.remove("show");
            }
        });
    }, {
        threshold: 0.3
    });
    observerreview.observe(reviewSection);
    </script>

    <script>
    const loginSection = document.querySelector(".login-container");
    const observerlogin = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                loginSection.classList.add("show");
            } else {
                loginSection.classList.remove("show");
            }
        });
    }, {
        threshold: 0.3
    });
    observerlogin.observe(loginSection);
    </script>
</body>

</html>