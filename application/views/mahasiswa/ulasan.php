<div class="content-wrapper container">
    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">
        <section id="horizontal-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <?= $this->session->flashdata('message') ?>
                        <div class="card-body">
                            <div class="row">
                                <form action="<?= site_url() ?>mahasiswa/ulasan" method="POST">
                                    <div class="col-12">
                                        <div class="form-group row align-items-center">
                                            <div class="col-lg-2 col-3">
                                                <label class="col-form-label">Sensor Nama</label>
                                            </div>
                                            <div class="col-lg-10 col-9">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" name="sensor" type="checkbox"
                                                        id="flexSwitchCheckDefault" value="1" <?php if ($countUlasan != null) {
                                                            if ($ulasan['is_censored'] == '1') { echo "checked"; }
                                                        } ?> />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <div class="col-lg-2 col-3">
                                                <label class="col-form-label">Ulasan</label>
                                            </div>
                                            <div class="col-lg-10 col-9">
                                                <textarea class="form-control ulasan" id="ulasan" rows="3"
                                                    maxlength="100" placeholder="Jelaskan pengalaman Anda"
                                                    name="ulasan"><?php if ($countUlasan != null) {
                                                            if ($ulasan['ulasan'] != null) { echo htmlspecialchars($ulasan['ulasan']); }
                                                        } ?></textarea>
                                                <?= form_error('ulasan', '<small class="text-danger pl-2">', '</small>') ?>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <div class="col-lg-2 col-3">
                                                <label class="col-form-label">Tingkat Kepuasan</label>
                                            </div>
                                            <div class="col-lg-10 col-9">
                                                <input type="radio" class="btn-check" name="tk" id="sangat_puas"
                                                    autocomplete="off" value="Sangat Puas" <?php if ($countUlasan != null) {
                                                            if ($ulasan['tingkat_kepuasan'] == 'Sangat Puas') { echo "checked"; }
                                                        }  ?> />
                                                <label class="btn btn-outline-primary" for="sangat_puas">Sangat
                                                    Puas</label>

                                                <input type="radio" class="btn-check" name="tk" id="puas"
                                                    autocomplete="off" value="Puas" <?php if ($countUlasan != null) {
                                                            if ($ulasan['tingkat_kepuasan'] == 'Puas') { echo "checked"; }
                                                        }  ?> />
                                                <label class="btn btn-outline-primary" for="puas">Puas</label>

                                                <input type="radio" class="btn-check" name="tk" id="kurang_puas"
                                                    autocomplete="off" value="Kurang Puas" <?php if ($countUlasan != null) {
                                                            if ($ulasan['tingkat_kepuasan'] == 'Kurang Puas') { echo "checked"; }
                                                        }  ?> />
                                                <label class="btn btn-outline-primary" for="kurang_puas">Kurang
                                                    Puas</label>

                                                <input type="radio" class="btn-check" name="tk" id="tidak_puas"
                                                    autocomplete="off" value="Tidak Puas" <?php if ($countUlasan != null) {
                                                            if ($ulasan['tingkat_kepuasan'] == 'Tidak Puas') { echo "checked"; }
                                                        }  ?> />
                                                <label class="btn btn-outline-primary" for="tidak_puas">Tidak
                                                    Puas</label>

                                                <input type="radio" class="btn-check" name="tk" id="sangat_tidak_puas"
                                                    autocomplete="off" value="Sangat Tidak Puas" <?php if ($countUlasan != null) {
                                                            if ($ulasan['tingkat_kepuasan'] == 'Sangat Tidak Puas') { echo "checked"; }
                                                        }  ?> />
                                                <label class="btn btn-outline-primary" for="sangat_tidak_puas">Sangat
                                                    Tidak
                                                    Puas</label>
                                            </div>
                                            <?= form_error('tk', '<small class="text-danger pl-2">', '</small>') ?>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <?php if ($countUlasan != null) { ?>
                                            <button type="submit"
                                                class="btn btn-outline-primary float-right">UPDATE</button>
                                            <?php } else { ?>
                                            <button type="submit"
                                                class="btn btn-outline-primary float-right">KIRIM</button>
                                            <?php }  ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="<?= base_url() ?>assets/extensions/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/extensions/bootstrap-maxlength.min.js"></script>
    <script>
    // Setup maxlength
    $('.ulasan').maxlength({
        alwaysShow: true,
        validate: false,
        allowOverMax: true,
        customMaxAttribute: "100",
    });

    // validate form before submit
    $('form').on('submit', function(e) {
        $('.form-control').each(
            function() {
                if ($(this).hasClass('overmax')) {
                    alert('prevent submit here');
                    e.preventDefault();
                    return false;
                }
            }
        );
    })

    $('textarea').on('autosize:resized', function() {
        $(this).trigger('maxlength.reposition');
    })
    </script>
