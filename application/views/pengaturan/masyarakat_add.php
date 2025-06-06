<section class="section col-6">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div>
                    <form action="<?= site_url() ?>user/add/masyarakat" method="post">
                        <h6>NIK</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" class="form-control" placeholder="NIK" name="nik"
                                value="<?= set_value('nik') ?>" />
                            <?= form_error('nik', '<small class="text-danger pl-2">', '</small>') ?>
                            <div class=" form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h6>Nama</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" class="form-control" placeholder="Nama Masyarakat" name="nama_masyarakat"
                                value="<?= set_value('nama_masyarakat') ?>" />
                            <?= form_error('nama_masyarakat', '<small class="text-danger pl-2">', '</small>') ?>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h6>Username</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="username"
                                value="<?= set_value('username') ?>" />
                            <?= form_error('username', '<small class="text-danger pl-2">', '</small>') ?>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h6>Password</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password1" />
                            <?= form_error('password1', '<small class="text-danger pl-2">', '</small>') ?>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h6>Ulangi Password</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="password" class="form-control" placeholder="Ulangi Password"
                                name="password2" />
                            <?= form_error('password2', '<small class="text-danger pl-2">', '</small>') ?>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h6>Nomor Ponsel / Telp</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" class="form-control" placeholder="Nomor Ponsel / Telp" name="telp"
                                value="<?= set_value('telp') ?>" />
                            <?= form_error('telp', '<small class="text-danger pl-2">', '</small>') ?>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h6>Alamat</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <!-- <input type="text" class="form-control" placeholder="Nomor Ponsel / Telp" name="telp"
                                value="<?= set_value('telp') ?>" /> -->
                            <textarea name="alamat" class="form-control" cols="30" rows="3" placeholder="Alamat"
                                maxlength="50"></textarea>
                            <?= form_error('telp', '<small class="text-danger pl-2">', '</small>') ?>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-outline-primary">TAMBAH</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>