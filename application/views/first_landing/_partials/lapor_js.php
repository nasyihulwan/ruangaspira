<script>
$(document).ready(function() {
    // *** DROPIFY *** ///
    // Used events
    var lampiran_1 = $('#lampiran_1').dropify();
    var lampiran_2 = $('#lampiran_2').dropify();

    lampiran_1.on('dropify.beforeClear', function(event, element) {
        return confirm("Apakah Anda benar-benar ingin menghapus \"" + element.file.name + "\" ?");
    });
    lampiran_2.on('dropify.beforeClear', function(event, element) {
        return confirm("Apakah Anda benar-benar ingin menghapus \"" + element.file.name + "\" ?");
    });

    lampiran_1.on('dropify.afterClear', function(event, element) {
        $("#div_lam_2").hide();
        $("#div_lam_3").hide();
        Swal.fire(
            'Dihapus!',
            'File Anda telah dihapus.',
            'success'
        )
    });
    lampiran_2.on('dropify.afterClear', function(event, element) {
        $("#div_lam_3").hide();
        Swal.fire(
            'Dihapus!',
            'File Anda telah dihapus.',
            'success'
        )
    });

    lampiran_1.on('dropify.errors', function(event, element) {
        console.log('Has Errors');
    });
    lampiran_2.on('dropify.errors', function(event, element) {
        console.log('Has Errors');
    });
    // *** DROPIFY END *** ///

    $("#div_lam_2").hide();
    $("#div_lam_3").hide();

    $('#lampiran_1').on("change", function() {
        if (document.getElementById("lampiran_1").files.length == 0) {
            $("#div_lam_2").hide();
            $("#div_lam_3").hide();
        } else if (document.getElementById("lampiran_1").files.length == 1) {
            $("#div_lam_2").show();
        }
    });

    $('#lampiran_2').on("change", function() {
        if (document.getElementById("lampiran_1").files.length == 0) {
            $("#div_lam_3").hide();
        } else if (document.getElementById("lampiran_1").files.length == 1) {
            $("#div_lam_3").show();
        }
    });


});
</script>
<?php if ($this->session->flashdata('success')): ?>
<script>
let timerInterval
Swal.fire({
    icon: 'success',
    title: 'Laporan Anda berhasil dikirim!',
    html: 'Menutup otomatis dalam <b></b> milidetik.',
    timer: 2000,
    timerProgressBar: true,
    didOpen: () => {
        Swal.showLoading()
        const b = Swal.getHtmlContainer().querySelector('b')
        timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
        }, 100)
    },
    willClose: () => {
        clearInterval(timerInterval)
    }
}).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
        console.log('I was closed by the timer')
    }
})
</script>
<?php endif; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    flatpickr(document.getElementById('tgl_kejadian'), {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
});
</script>

<script>
document.getElementById("petunjuk").addEventListener("click", async (e) => {
    alert('123');
});
</script>