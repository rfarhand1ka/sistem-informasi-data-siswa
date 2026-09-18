/**
 * assets/js/app.js
 * ---------------------------------------------------------------------
 * Script kecil untuk menampilkan dialog konfirmasi sebelum data siswa
 * dihapus, memakai library SweetAlert2 (lihat footer.php).
 * ---------------------------------------------------------------------
 * Bukti Unit Kompetensi:
 *  - Mengimplementasikan User Interface (interaksi/feedback ke pengguna)
 *  - Menggunakan library atau komponen pre-existing (SweetAlert2)
 */

// Pasang event ke semua tombol hapus yang ada di halaman
document.addEventListener('DOMContentLoaded', function () {
    const tombolHapus = document.querySelectorAll('.btn-hapus');

    tombolHapus.forEach(function (tombol) {
        tombol.addEventListener('click', function (event) {
            event.preventDefault(); // jangan langsung pindah halaman dulu

            const url = tombol.getAttribute('href');
            const nama = tombol.getAttribute('data-nama');

            Swal.fire({
                title: 'Hapus data siswa?',
                text: 'Data "' + nama + '" akan dihapus permanen dan tidak bisa dikembalikan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#dc3545'
            }).then(function (result) {
                if (result.isConfirmed) {
                    window.location.href = url; // baru pindah ke hapus.php kalau dikonfirmasi
                }
            });
        });
    });
});
