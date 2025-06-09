<section class="section col-6">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div>
                    <form action="<?= site_url() ?>user/add/mahasiswa" method="post">
                        <h6>NIM</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" class="form-control" placeholder="NIM" name="nim"
                                value="<?= set_value('nim') ?>" />
                            <?= form_error('nim', '<small class="text-danger pl-2">', '</small>') ?>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <h6>Nama</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" class="form-control" placeholder="Nama Mahasiswa" name="nama"
                                value="<?= set_value('nama') ?>" />
                            <?= form_error('nama', '<small class="text-danger pl-2">', '</small>') ?>
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
                                <i class="bi bi-lock"></i>
                            </div>
                        </div>
                        <h6>Ulangi Password</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="password" class="form-control" placeholder="Ulangi Password"
                                name="password2" />
                            <?= form_error('password2', '<small class="text-danger pl-2">', '</small>') ?>
                            <div class="form-control-icon">
                                <i class="bi bi-lock"></i>
                            </div>
                        </div>
                        <h6>Nomor Ponsel / Telp</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <input type="text" class="form-control" placeholder="Nomor Ponsel / Telp" name="telp"
                                value="<?= set_value('telp') ?>" />
                            <?= form_error('telp', '<small class="text-danger pl-2">', '</small>') ?>
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                        </div>
                        <h6>Angkatan</h6>
                        <div class="form-group mb-3"> <select class="form-select" name="angkatan" id="angkatanSelect">
                                <option value="">Pilih Angkatan</option>
                                <?php if (!empty($angkatan_list)) : ?>
                                    <?php foreach ($angkatan_list as $angkatan) : ?>
                                        <option value="<?= htmlspecialchars($angkatan->tahun); ?>"
                                            <?= set_select('angkatan', $angkatan->tahun); ?>>
                                            <?= htmlspecialchars($angkatan->tahun); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <?= form_error('angkatan', '<small class="text-danger pl-2">', '</small>') ?>
                            </div>
                        <h6>Program Studi</h6>
                        <div class="form-group mb-3"> <select class="form-select" name="prodi" id="prodiSelect">
                                <option value="">Pilih Program Studi</option>
                                <?php if (!empty($prodi_list)) : ?>
                                    <?php foreach ($prodi_list as $prodi) : ?>
                                        <option value="<?= htmlspecialchars($prodi->nama_prodi); ?>"
                                            <?= set_select('prodi', $prodi->nama_prodi); ?>>
                                            <?= htmlspecialchars($prodi->nama_prodi); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <?= form_error('prodi', '<small class="text-danger pl-2">', '</small>') ?>
                            </div>
                        <h6>Alamat</h6>
                        <div class="form-group position-relative has-icon-left mb-3">
                            <textarea name="alamat" class="form-control" cols="30" rows="3" placeholder="Alamat"
                                maxlength="500"><?= set_value('alamat') ?></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>') ?>
                            <div class="form-control-icon">
                                <i class="bi bi-house"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-outline-primary">TAMBAH</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>