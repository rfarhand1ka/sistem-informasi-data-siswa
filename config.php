<?php
/**
 * config.php
 * ---------------------------------------------------------------------
 * File konfigurasi koneksi database.
 * Semua halaman lain memanggil file ini di baris paling atas supaya
 * satu koneksi database bisa dipakai bersama (prinsip DRY / tidak
 * mengulang kode yang sama di banyak file).
 * ---------------------------------------------------------------------
 * Bukti Unit Kompetensi:
 *  - Mengimplementasikan pemrograman terstruktur (kode dipisah per fungsi)
 *  - Menulis kode sesuai guidelines & best practice (penamaan jelas,
 *    dikomentari, satu file satu tanggung jawab)
 */

// Tampilkan error saat development supaya mudah di-debug.
// (unit kompetensi: Melakukan debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// --- Kredensial database -------------------------------------------
// Sesuaikan jika username/password MySQL di komputermu berbeda.
// Default XAMPP/Laragon: user "root", password kosong.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_simpel_siswa');

// --- Membuat koneksi menggunakan MySQLi ------------------------------
$koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Jika koneksi gagal, hentikan aplikasi dan tampilkan pesan yang jelas
// (bagian ini juga bukti kemampuan debugging: menangani error dengan rapi)
if (!$koneksi) {
    die('Koneksi database gagal: ' . mysqli_connect_error() .
        '. Pastikan XAMPP/Laragon sudah dijalankan dan database "db_simpel_siswa" sudah diimport.');
}

// Pastikan karakter unicode (misal nama dengan huruf khusus) tersimpan benar
mysqli_set_charset($koneksi, 'utf8mb4');
