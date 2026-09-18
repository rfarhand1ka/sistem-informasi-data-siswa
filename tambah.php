<?php
/**
 * tambah.php
 * ---------------------------------------------------------------------
 * Halaman + proses untuk menambahkan data siswa baru.
 * Satu file ini menangani dua hal: menampilkan form (saat diakses biasa)
 * dan memproses data (saat form di-submit / method POST).
 * ---------------------------------------------------------------------
 * Bukti Unit Kompetensi:
 *  - Mengimplementasikan User Interface (form input)
 *  - Mengimplementasikan pemrograman terstruktur (validasi lalu proses)
 *  - Melakukan debugging (pengecekan input kosong/error ditampilkan jelas)
 */

require_once 'functions.php';

$errors = []; // menampung pesan error validasi (struktur data: array)

// Jika form dikirim (submit)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = trim($_POST['nama'] ?? '');
    $nis     = trim($_POST['nis'] ?? '');
    $kelas   = trim($_POST['kelas'] ?? '');
    $jurusan = trim($_POST['jurusan'] ?? '');
    $no_hp   = trim($_POST['no_hp'] ?? '');
    $alamat  = trim($_POST['alamat'] ?? '');

    // Validasi sederhana - field wajib tidak boleh kosong
    if ($nama === '')  $errors[] = 'Nama wajib diisi.';
    if ($nis === '')   $errors[] = 'NIS wajib diisi.';
    if ($kelas === '') $errors[] = 'Kelas wajib diisi.';
    if ($jurusan === '') $errors[] = 'Jurusan wajib diisi.';

    // Kalau tidak ada error, simpan ke database lalu redirect
    if (count($errors) === 0) {
        $berhasil = tambahSiswa($koneksi, $nama, $nis, $kelas, $jurusan, $no_hp, $alamat);

        if ($berhasil) {
            header('Location: index.php?pesan=tambah');
            exit;
        } else {
            // Kalau query gagal, tampilkan pesan error asli dari MySQL
            // supaya mudah di-debug.
            $errors[] = 'Gagal menyimpan data: ' . mysqli_error($koneksi);
        }
    }
}

require_once 'includes/header.php';
?>

    <h4 class="mb-3"><i class="fa-solid fa-plus"></i> Tambah Siswa</h4>

    <?php if (count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="tambah.php">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control"
                               value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NIS</label>
                        <input type="text" name="nis" class="form-control"
                               value="<?= htmlspecialchars($_POST['nis'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Kelas</label>
                        <select name="kelas" class="form-select">
                            <?php foreach (['X', 'XI', 'XII'] as $opsi): ?>
                                <option value="<?= $opsi ?>" <?= (($_POST['kelas'] ?? '') === $opsi) ? 'selected' : '' ?>>
                                    <?= $opsi ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control"
                               value="<?= htmlspecialchars($_POST['jurusan'] ?? '') ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">No. HP</label>
                        <input type="text" name="no_hp" class="form-control"
                               value="<?= htmlspecialchars($_POST['no_hp'] ?? '') ?>">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2"><?= htmlspecialchars($_POST['alamat'] ?? '') ?></textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan
                    </button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>
