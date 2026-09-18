<?php
/**
 * edit.php
 * ---------------------------------------------------------------------
 * Halaman + proses untuk mengubah data siswa yang sudah ada.
 * Alurnya mirip tambah.php, tapi form diisi otomatis dengan data lama
 * (diambil lewat getSiswaById) dan menyimpan lewat updateSiswa().
 */

require_once 'functions.php';

$errors = [];

// Ambil id dari URL, misal edit.php?id=3
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$siswa = getSiswaById($koneksi, $id);

// Kalau id tidak valid / data tidak ditemukan, kembali ke daftar
if (!$siswa) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama    = trim($_POST['nama'] ?? '');
    $nis     = trim($_POST['nis'] ?? '');
    $kelas   = trim($_POST['kelas'] ?? '');
    $jurusan = trim($_POST['jurusan'] ?? '');
    $no_hp   = trim($_POST['no_hp'] ?? '');
    $alamat  = trim($_POST['alamat'] ?? '');

    if ($nama === '')  $errors[] = 'Nama wajib diisi.';
    if ($nis === '')   $errors[] = 'NIS wajib diisi.';
    if ($kelas === '') $errors[] = 'Kelas wajib diisi.';
    if ($jurusan === '') $errors[] = 'Jurusan wajib diisi.';

    if (count($errors) === 0) {
        $berhasil = updateSiswa($koneksi, $id, $nama, $nis, $kelas, $jurusan, $no_hp, $alamat);

        if ($berhasil) {
            header('Location: index.php?pesan=edit');
            exit;
        } else {
            $errors[] = 'Gagal mengubah data: ' . mysqli_error($koneksi);
        }
    }

    // Supaya form tetap menampilkan input yang baru diketik user meski gagal
    $siswa = array_merge($siswa, compact('nama', 'nis', 'kelas', 'jurusan', 'no_hp', 'alamat'));
}

require_once 'includes/header.php';
?>

    <h4 class="mb-3"><i class="fa-solid fa-pen"></i> Edit Siswa</h4>

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
            <form method="POST" action="edit.php?id=<?= $id ?>">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($siswa['nama']) ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NIS</label>
                        <input type="text" name="nis" class="form-control" value="<?= htmlspecialchars($siswa['nis']) ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Kelas</label>
                        <select name="kelas" class="form-select">
                            <?php foreach (['X', 'XI', 'XII'] as $opsi): ?>
                                <option value="<?= $opsi ?>" <?= ($siswa['kelas'] === $opsi) ? 'selected' : '' ?>>
                                    <?= $opsi ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" value="<?= htmlspecialchars($siswa['jurusan']) ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">No. HP</label>
                        <input type="text" name="no_hp" class="form-control" value="<?= htmlspecialchars($siswa['no_hp'] ?? '') ?>">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2"><?= htmlspecialchars($siswa['alamat'] ?? '') ?></textarea>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i> Update
                    </button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>
