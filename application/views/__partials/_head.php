<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
        if ($this->uri->segment(3) !== null) {
            echo SITE_NAME . " : " . ucfirst($this->uri->segment(1)) . " - " . ucfirst($this->uri->segment(2));
        } else if ($this->uri->segment(2) !== null) {
            echo SITE_NAME . " : " . ucfirst($this->uri->segment(1)) . " - " . ucfirst($this->uri->segment(2));
        } else if ($this->uri->segment(1) !== null) {
            echo SITE_NAME . " : " . ucfirst($this->uri->segment(1));
        } else {
            echo SITE_NAME;
        }
        ?>
    </title>

    <link rel="stylesheet" href="<?= base_url() ?>assets/extensions/choices.js/public/assets/styles/choices.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main/app-dark.css">
    <?php if ($this->uri->segment(1) == 'auth') { ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/auth.css">
    <?php } ?>


    <link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/fontawesome.css">
    <link rel="stylesheet"
        href="<?= base_url() ?>assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/datatables.css">

    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo/lapmas_logo.png" type="image/png">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/shared/iconly.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/extensions/sweetalert2/sweetalert2.min.css" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/dropify.css">

</head>