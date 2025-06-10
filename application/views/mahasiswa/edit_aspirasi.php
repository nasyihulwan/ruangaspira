<div class="content-wrapper container">
    <div class="page-heading">
        <h3>Edit Laporan Aspirasi</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Laporan Aspirasi</h4>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('mahasiswa/update_aspirasi'); ?>
                        <input type="hidden" name="id_aspirasi" value="<?= $aspirasi->id_aspirasi ?>">
                        <input type="hidden" name="nim" value="<?= $aspirasi->nim ?>">

                        <div class="mb-3">
                            <label for="judul_aspirasi" class="form-label">Judul Laporan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="judul_aspirasi" name="judul_aspirasi" value="<?= set_value('judul_aspirasi', $aspirasi->judul_aspirasi) ?>" required>
                            <?= form_error('judul_aspirasi', '<small class="text-danger ps-1">', '</small>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="isi_laporan" class="form-label">Isi Laporan <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="5" required><?= set_value('isi_laporan', $aspirasi->isi_laporan) ?></textarea>
                            <?= form_error('isi_laporan', '<small class="text-danger ps-1">', '</small>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="tgl_kejadian" class="form-label">Tanggal Kejadian <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="tgl_kejadian" name="tgl_kejadian" value="<?= set_value('tgl_kejadian', $aspirasi->tgl_kejadian) ?>" required>
                            <?= form_error('tgl_kejadian', '<small class="text-danger ps-1">', '</small>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="tempat_kejadian" class="form-label">Tempat Kejadian <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tempat_kejadian" name="tempat_kejadian" value="<?= set_value('tempat_kejadian', $aspirasi->tempat_kejadian) ?>" required>
                            <?= form_error('tempat_kejadian', '<small class="text-danger ps-1">', '</small>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" value="<?= set_value('kategori', $aspirasi->kategori) ?>">
                            <?= form_error('kategori', '<small class="text-danger ps-1">', '</small>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="tingkat" class="form-label">Tingkat</label>
                            <select class="form-select" id="tingkat" name="tingkat">
                                <option value="hima" <?= set_select('tingkat', 'hima', ($aspirasi->tingkat == 'hima' ? TRUE : FALSE)); ?>>HIMA</option>
                                <option value="prodi" <?= set_select('tingkat', 'prodi', ($aspirasi->tingkat == 'prodi' ? TRUE : FALSE)); ?>>Prodi</option>
                            </select>
                            <?= form_error('tingkat', '<small class="text-danger ps-1">', '</small>'); ?>
                        </div>


                        <hr class="my-4">
                        <h5>Lampiran (Foto/Video/PDF) - Opsional</h5>
                        <p class="text-muted"><small>Biarkan kosong jika tidak ingin mengubah lampiran. Maks: 2MB per file (gif, jpg, png, mp4, pdf)</small></p>

                        <div class="mb-3">
                            <label for="lampiran_1" class="form-label">Lampiran 1</label>
                            <?php if (!empty($aspirasi->lampiran_1)): ?>
                                <p class="mb-1">File saat ini: <a href="<?= base_url('assets/images/laporan/aspirasi/' . $aspirasi->nim . '/' . $aspirasi->lampiran_1) ?>" target="_blank"><?= $aspirasi->lampiran_1 ?></a></p>
                            <?php else: ?>
                                <p class="mb-1">Tidak ada lampiran 1 saat ini.</p>
                            <?php endif; ?>
                            <input type="file" class="form-control" id="lampiran_1" name="lampiran_1" accept=".gif,.jpg,.png,.mp4,.pdf">
                        </div>

                        <div class="mb-3">
                            <label for="lampiran_2" class="form-label">Lampiran 2</label>
                            <?php if (!empty($aspirasi->lampiran_2)): ?>
                                <p class="mb-1">File saat ini: <a href="<?= base_url('assets/images/laporan/aspirasi/' . $aspirasi->nim . '/' . $aspirasi->lampiran_2) ?>" target="_blank"><?= $aspirasi->lampiran_2 ?></a></p>
                            <?php else: ?>
                                <p class="mb-1">Tidak ada lampiran 2 saat ini.</p>
                            <?php endif; ?>
                            <input type="file" class="form-control" id="lampiran_2" name="lampiran_2" accept=".gif,.jpg,.png,.mp4,.pdf">
                        </div>

                        <div class="mb-3">
                            <label for="lampiran_3" class="form-label">Lampiran 3</label>
                            <?php if (!empty($aspirasi->lampiran_3)): ?>
                                <p class="mb-1">File saat ini: <a href="<?= base_url('assets/images/laporan/aspirasi/' . $aspirasi->nim . '/' . $aspirasi->lampiran_3) ?>" target="_blank"><?= $aspirasi->lampiran_3 ?></a></p>
                            <?php else: ?>
                                <p class="mb-1">Tidak ada lampiran 3 saat ini.</p>
                            <?php endif; ?>
                            <input type="file" class="form-control" id="lampiran_3" name="lampiran_3" accept=".gif,.jpg,.png,.mp4,.pdf">
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary me-2"><i class="bi bi-save"></i> Update Laporan</button>
                            <a href="<?= base_url('mahasiswa/aspirasi') ?>" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Batal</a>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </section>
    </div>