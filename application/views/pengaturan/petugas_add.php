<section class="section col-6">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div>
                    <form action="" method="post">
                        <h6>Nama Petugas</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" class="form-control" placeholder="Nama Petugas" name="nama_petugas"
                                value="<?= set_value('nama_petugas') ?>" />
                            <?= form_error('nama_petugas', '<small class="text-danger pl-2">', '</small>') ?>
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
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h6>Ulangi Password</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="password" class="form-control" placeholder="Ulangi Password"
                                name="password2" />
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
                        <h6>Level</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <?php if ($this->session->userdata('level') == 'master admin') { ?>
                            <div class="form-group">
                                <select class="choices form-select" name="level">
                                    <option value="petugas">
                                        Petugas
                                    </option>
                                    <option value="admin">
                                        Admin
                                    </option>
                                </select>
                            </div>
                            <?php } else { ?>
                            <input type="text" class="form-control" placeholder="Level" name="level" value="petugas"
                                disabled />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            <?php } ?>

                        </div>
                        <button type="submit" class="btn btn-block btn-outline-primary">TAMBAH</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>