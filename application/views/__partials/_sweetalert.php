<?php if ($this->session->flashdata('updateSelesai')): ?>
<script>
let timerInterval
Swal.fire({
    icon: 'success',
    title: 'Laporan berhasil diselesaikan!',
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

<?php if ($this->session->flashdata('insertTanggapan')): ?>
<script>
let timerInterval
Swal.fire({
    icon: 'success',
    title: 'Laporan berhasil ditanggapi!',
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



<?php if ($this->session->flashdata('tolakSuccess')): ?>
<script>
let timerInterval
Swal.fire({
    icon: 'success',
    title: 'Laporan berhasil ditolak!',
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
document.getElementById("hapusTolak").addEventListener("click", async (e) => {
    Swal.fire({
        title: 'Konfirmasi hapus',
        showDenyButton: true,
        showCancelButton: true,
        showConfirmButton: false,
        denyButtonText: `Hapus`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isDenied) {
            window.location =
                `<?= site_url() ?>pengaduan/ditolak/hapus/` + $("#id_pengaduan_row").val();
        }
    })

});
document.getElementById("pulihkanTolak").addEventListener("click", async (e) => {
    Swal.fire({
        title: 'Konfirmasi',
        showCancelButton: true,
        confirmButtonText: 'Pulihkan',
        denyButtonText: `Hapus`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location =
                `<?= site_url() ?>pengaduan/ditolak/pulihkan/` + $("#id_pengaduan_row").val();
        }
    })

});
</script>

<?php if ($this->session->flashdata('deleteSuccess')): ?>
<script>
let timerInterval
Swal.fire({
    icon: 'success',
    title: 'Laporan berhasil dihapus!',
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

<?php if ($this->session->flashdata('pulihSuccess')): ?>
<script>
let timerInterval
Swal.fire({
    icon: 'success',
    title: 'Laporan berhasil dipulihkan!',
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

<?php if ($this->session->flashdata('addMasyarakatSuccess')): ?>
<script>
let timerInterval
Swal.fire({
    icon: 'success',
    title: 'Data Masyarakat berhasil ditambah!',
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

<?php if ($this->session->flashdata('addPetugasSuccess')): ?>
<script>
let timerInterval
Swal.fire({
    icon: 'success',
    title: 'Data Petugas berhasil ditambah!',
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

<?php if ($this->session->flashdata('sendTanggapanBalikSuccess')): ?>
<script>
let timerInterval
Swal.fire({
    icon: 'success',
    title: 'Berhasil mengirim tanggapan balik!',
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