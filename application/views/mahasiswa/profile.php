<!-- Additonal Icons -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
<!-- Custom CSS -->
<style>
body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden;
}

.card {
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
}

.bg-template-default {
    background: #435EBE;
}

.user-profile {
    padding: 20px 0;
}

.card-block {
    padding: 1.25rem;
}

.m-b-25 {
    margin-bottom: 25px;
}

.img-radius {
    border-radius: 5px;
}

h6 {
    font-size: 20px;
}

.card .card-block p {
    line-height: 25px;
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px;
    }
}

.card-block {
    padding: 1.25rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
    margin-bottom: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.card .card-block p {
    line-height: 25px;
}

.m-b-10 {
    margin-bottom: 10px;
}

.text-muted {
    color: #919aa3 !important;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
    font-weight: 600;
}

.m-b-20 {
    margin-bottom: 20px;
}

.m-t-40 {
    margin-top: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-40 {
    margin-top: 20px;
}

.user-card-full .social-link li {
    display: inline-block;
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.joined {
    position: absolute;
    bottom: 0;
}
</style>
<div class="content-wrapper container">
    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">
        <section class="section">
            <?= $this->session->flashdata('message') ?>
            <div class="col-xl-12 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-template-default user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img src="<?= base_url('assets/images/faces/1.jpg') ?>" class="img-radius"
                                        style="max-width: 150px;" alt="User-Profile-Image">
                                </div>
                                <h6 class="f-w-600"><?= $user['nama'] ?></h6>
                                <!-- <button class="btn badge bg-info">
                                    Edit
                                </button> -->
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="col-sm-8">
    <div class="card-block mb-5">
        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informasi Akun</h6>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <p class="m-b-10 f-w-600">NIM</p>
                <h6 class="text-muted f-w-400"><?= $user['nim']; ?></h6>
            </div>
            <div class="col-sm-6 mb-3">
                <p class="m-b-10 f-w-600">Nama Lengkap</p>
                <h6 class="text-muted f-w-400"><?= $user['nama']; ?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <p class="m-b-10 f-w-600">Program Studi</p>
                <h6 class="text-muted f-w-400"><?= $user['prodi']; ?></h6>
            </div>
            <div class="col-sm-6 mb-3">
                <p class="m-b-10 f-w-600">Angkatan</p>
                <h6 class="text-muted f-w-400"><?= $user['angkatan']; ?></h6>
            </div>
        </div>
        <div class="row">
             <div class="col-sm-6 mb-3">
                <p class="m-b-10 f-w-600">Username</p>
                <h6 class="text-muted f-w-400"><?= $user['username']; ?></h6>
            </div>
            <div class="col-sm-6 mb-3">
                <p class="m-b-10 f-w-600">Telp / Nomor Ponsel</p>
                <h6 class="text-muted f-w-400"><?= $user['telp']; ?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-3">
                <p class="m-b-10 f-w-600">Alamat</p>
                <h6 class="text-muted f-w-400"><?= $user['alamat']; ?></h6>
            </div>
        </div>
    </div>
</div>
                            <!-- <div class="card-block joined mt-3">
                                <p class="card-text "><small class="text-muted">Bergabung sejak
                                        <?= date('d F Y') ?></small></p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>