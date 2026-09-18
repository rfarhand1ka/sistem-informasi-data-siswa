<?php
/**
 * index.php
 * ---------------------------------------------------------------------
 * Halaman utama: menampilkan daftar semua siswa + fitur pencarian
 * berdasarkan nama.
 * ---------------------------------------------------------------------
 * Bukti Unit Kompetensi:
 *  - Mengimplementasikan User Interface (tabel, badge, tombol aksi)
 *  - Mengimplementasikan pemrograman terstruktur (memanggil fungsi dari
 *    functions.php, bukan query mentah di halaman ini)
 */

require_once 'functions.php';

// Ambil kata kunci pencarian dari form GET (kalau ada)
$keyword = isset($_GET['cari']) ? trim($_GET['cari']) : '';

// Ambil data siswa lewat fungsi terstruktur di functions.php
$daftarSiswa = getAllSiswa($koneksi, $keyword);

require_once 'includes/header.php';
?>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0"><i class="fa-solid fa-users"></i> Daftar Siswa</h4>
        <a href="tambah.php" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Siswa
        </a>
    </div>

    <?php if (isset($_GET['pesan'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
                $pesan = $_GET['pesan'];
                if ($pesan === 'tambah')  echo 'Data siswa berhasil ditambahkan.';
                if ($pesan === 'edit')    echo 'Data siswa berhasil diubah.';
                if ($pesan === 'hapus')   echo 'Data siswa berhasil dihapus.';
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" action="index.php" class="row g-2">
                <div class="col-sm-9">
                    <input type="text" name="cari" class="form-control"
                           placeholder="Cari berdasarkan nama..."
                           value="<?= htmlspecialchars($keyword) ?>">
                </div>
                <div class="col-sm-3 d-grid">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fa-solid fa-magnifying-glass"></i> Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>No. HP</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($daftarSiswa) === 0): ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Belum ada data siswa<?= $keyword ? ' yang cocok dengan pencarian "' . htmlspecialchars($keyword) . '"' : '' ?>.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1; ?>
                            <?php foreach ($daftarSiswa as $siswa): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($siswa['nama']) ?></td>
                                    <td><?= htmlspecialchars($siswa['nis']) ?></td>
                                    <td><span class="badge bg-primary badge-kelas"><?= htmlspecialchars($siswa['kelas']) ?></span></td>
                                    <td><?= htmlspecialchars($siswa['jurusan']) ?></td>
                                    <td><?= htmlspecialchars($siswa['no_hp'] ?: '-') ?></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?= $siswa['id'] ?>" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="hapus.php?id=<?= $siswa['id'] ?>"
                                           class="btn btn-sm btn-danger btn-hapus"
                                           data-nama="<?= htmlspecialchars($siswa['nama']) ?>"
                                           title="Hapus">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>
