<?php
/**
 * hapus.php
 * ---------------------------------------------------------------------
 * Memproses penghapusan satu data siswa berdasarkan id lalu kembali
 * ke halaman daftar. Konfirmasi "yakin hapus?" sudah ditangani di sisi
 * tampilan (lihat assets/js/app.js + SweetAlert2), jadi file ini hanya
 * fokus pada logikanya saja.
 */

require_once 'functions.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
    hapusSiswa($koneksi, $id);
}

header('Location: index.php?pesan=hapus');
exit;
