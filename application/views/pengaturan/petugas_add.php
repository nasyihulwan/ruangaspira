<section class="section col-6">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div>
                    <form action="<?= site_url('user/add/petugas') ?>" method="post">
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

                        <h6>Level</h6>
                        <div class="form-group mb-3">
                            <?php if ($this->session->userdata('level') == 'master_admin') : ?>
                                <select class="form-select" name="level" id="levelSelect">
                                    <option value="">Pilih Level Petugas</option>
                                    <?php
                                    if (!empty($petugas_levels)) :
                                        foreach ($petugas_levels as $level) :
                                            if (in_array($level, ['hima_tekkom', 'prodi_tekkom'])) :
                                    ?>
                                                <option value="<?= htmlspecialchars($level); ?>"
                                                    <?= set_select('level', $level); ?>>
                                                    <?= ucwords(str_replace('_', ' ', $level)); ?>
                                                </option>
                                    <?php
                                            endif;
                                        endforeach;
                                    endif;
                                    ?>
                                </select>
                            <?php else : ?>
                                <input type="hidden" name="level" value="hima_tekkom">
                                <input type="text" class="form-control" placeholder="Level" value="Hima Tekkom" disabled />
                            <?php endif; ?>
                            <?= form_error('level', '<small class="text-danger pl-2">', '</small>') ?>
                        </div>
                        <button type="submit" class="btn btn-block btn-outline-primary">TAMBAH</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>