<?php
/**
 * rekap.php
 * ---------------------------------------------------------------------
 * Halaman rekap jumlah siswa per kelas, ditampilkan sebagai grafik.
 * ---------------------------------------------------------------------
 * Bukti Unit Kompetensi:
 *  - Menggunakan struktur data (data siswa diolah jadi array asosiatif
 *    "kelas => jumlah" lewat fungsi rekapPerKelas() di functions.php)
 *  - Menggunakan library atau komponen pre-existing (Chart.js untuk
 *    menggambar grafik batang)
 */

require_once 'functions.php';

$daftarSiswa = getAllSiswa($koneksi);
$rekap = rekapPerKelas($daftarSiswa); // contoh: ['X' => 1, 'XI' => 2, 'XII' => 2]

// Siapkan data untuk dikirim ke Chart.js dalam format JSON
$labelKelas   = array_keys($rekap);
$jumlahSiswa  = array_values($rekap);

require_once 'includes/header.php';
?>

    <h4 class="mb-3"><i class="fa-solid fa-chart-simple"></i> Rekap Jumlah Siswa per Kelas</h4>

    <div class="row g-3 mb-4">
        <?php foreach ($rekap as $kelas => $jumlah): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-muted">Kelas <?= htmlspecialchars($kelas) ?></div>
                        <div class="display-6 fw-bold"><?= $jumlah ?></div>
                        <div class="text-muted small">siswa</div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if (count($rekap) === 0): ?>
            <div class="col-12">
                <div class="alert alert-info mb-0">Belum ada data siswa untuk direkap.</div>
            </div>
        <?php endif; ?>
    </div>

    <?php if (count($rekap) > 0): ?>
        <div class="card">
            <div class="card-body">
                <canvas id="grafikKelas" height="100"></canvas>
            </div>
        </div>
    <?php endif; ?>

<?php require_once 'includes/footer.php'; ?>

<?php if (count($rekap) > 0): ?>
<!-- Chart.js: library pre-existing untuk menggambar grafik -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
    const ctx = document.getElementById('grafikKelas');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($labelKelas) ?>,
            datasets: [{
                label: 'Jumlah Siswa',
                data: <?= json_encode($jumlahSiswa) ?>,
                backgroundColor: '#0d6efd'
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
        }
    });
</script>
<?php endif; ?>
