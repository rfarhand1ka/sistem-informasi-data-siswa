<?php
/**
 * functions.php
 * ---------------------------------------------------------------------
 * Kumpulan fungsi untuk operasi CRUD (Create, Read, Update, Delete)
 * data siswa. Dipisah dari halaman tampilan (index.php, tambah.php,
 * dst.) supaya logika dan tampilan tidak bercampur.
 * ---------------------------------------------------------------------
 * Bukti Unit Kompetensi:
 *  - Mengimplementasikan pemrograman terstruktur (dipecah jadi fungsi
 *    kecil, masing-masing punya satu tugas / single responsibility)
 *  - Menggunakan struktur data (array asosiatif & array bertingkat)
 *  - Menulis kode sesuai guidelines & best practice (nama fungsi
 *    verbNoun yang jelas: getAllSiswa, tambahSiswa, dst; setiap fungsi
 *    diberi komentar docblock)
 */

require_once 'config.php';

/**
 * Mengambil semua data siswa dari database.
 * Bisa difilter berdasarkan kata kunci nama (fitur pencarian).
 *
 * @param mysqli $koneksi
 * @param string $keyword kata kunci pencarian nama (opsional)
 * @return array daftar siswa dalam bentuk array asosiatif
 */
function getAllSiswa($koneksi, $keyword = '')
{
    $keyword = mysqli_real_escape_string($koneksi, $keyword);
    $sql = "SELECT * FROM siswa WHERE nama LIKE '%$keyword%' ORDER BY nama ASC";
    $hasil = mysqli_query($koneksi, $sql);

    $data = []; // struktur data: array untuk menampung banyak baris siswa
    while ($baris = mysqli_fetch_assoc($hasil)) {
        $data[] = $baris; // setiap elemen array berisi array asosiatif 1 siswa
    }
    return $data;
}

/**
 * Mengambil satu data siswa berdasarkan id. Dipakai di halaman edit.
 *
 * @param mysqli $koneksi
 * @param int $id
 * @return array|null
 */
function getSiswaById($koneksi, $id)
{
    $id = (int) $id; // paksa jadi integer supaya aman dari SQL injection
    $sql = "SELECT * FROM siswa WHERE id = $id";
    $hasil = mysqli_query($koneksi, $sql);
    return mysqli_fetch_assoc($hasil); // null kalau id tidak ditemukan
}

/**
 * Menambahkan data siswa baru.
 *
 * @return bool true jika berhasil
 */
function tambahSiswa($koneksi, $nama, $nis, $kelas, $jurusan, $no_hp, $alamat)
{
    $nama    = mysqli_real_escape_string($koneksi, $nama);
    $nis     = mysqli_real_escape_string($koneksi, $nis);
    $kelas   = mysqli_real_escape_string($koneksi, $kelas);
    $jurusan = mysqli_real_escape_string($koneksi, $jurusan);
    $no_hp   = mysqli_real_escape_string($koneksi, $no_hp);
    $alamat  = mysqli_real_escape_string($koneksi, $alamat);

    $sql = "INSERT INTO siswa (nama, nis, kelas, jurusan, no_hp, alamat)
            VALUES ('$nama', '$nis', '$kelas', '$jurusan', '$no_hp', '$alamat')";

    return mysqli_query($koneksi, $sql);
}

/**
 * Mengubah data siswa yang sudah ada berdasarkan id.
 *
 * @return bool true jika berhasil
 */
function updateSiswa($koneksi, $id, $nama, $nis, $kelas, $jurusan, $no_hp, $alamat)
{
    $id      = (int) $id;
    $nama    = mysqli_real_escape_string($koneksi, $nama);
    $nis     = mysqli_real_escape_string($koneksi, $nis);
    $kelas   = mysqli_real_escape_string($koneksi, $kelas);
    $jurusan = mysqli_real_escape_string($koneksi, $jurusan);
    $no_hp   = mysqli_real_escape_string($koneksi, $no_hp);
    $alamat  = mysqli_real_escape_string($koneksi, $alamat);

    $sql = "UPDATE siswa SET
                nama = '$nama',
                nis = '$nis',
                kelas = '$kelas',
                jurusan = '$jurusan',
                no_hp = '$no_hp',
                alamat = '$alamat'
            WHERE id = $id";

    return mysqli_query($koneksi, $sql);
}

/**
 * Menghapus data siswa berdasarkan id.
 *
 * @return bool true jika berhasil
 */
function hapusSiswa($koneksi, $id)
{
    $id = (int) $id;
    $sql = "DELETE FROM siswa WHERE id = $id";
    return mysqli_query($koneksi, $sql);
}

/**
 * Mengelompokkan data siswa per kelas menggunakan array asosiatif.
 * Dipakai di halaman rekap.php untuk menunjukkan pengolahan struktur
 * data (bukan hanya query database mentah).
 *
 * Contoh hasil:
 *  [
 *    'X'   => 1,
 *    'XI'  => 2,
 *    'XII' => 2,
 *  ]
 *
 * @param array $daftarSiswa hasil dari getAllSiswa()
 * @return array jumlah siswa per kelas
 */
function rekapPerKelas($daftarSiswa)
{
    $rekap = []; // array asosiatif kosong: kelas => jumlah

    foreach ($daftarSiswa as $siswa) {
        $kelas = $siswa['kelas'];

        if (!isset($rekap[$kelas])) {
            $rekap[$kelas] = 0; // inisialisasi kalau kelas baru ditemukan
        }
        $rekap[$kelas]++;
    }

    ksort($rekap); // urutkan berdasarkan nama kelas (X, XI, XII)
    return $rekap;
}
