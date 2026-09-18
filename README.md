HEAD
# Sistem Informasi Data Siswa Sederhana

Aplikasi web CRUD (Create, Read, Update, Delete) sederhana untuk mengelola
data siswa. Dibuat sebagai project latihan untuk **UJK (Uji Kompetensi)
Junior Web Programmer**, dan sengaja dirancang supaya satu project ini
mencakup semua unit kompetensi yang biasanya diujikan.

## Fitur

- Melihat daftar siswa (dengan pencarian nama)
- Menambah data siswa baru
- Mengubah data siswa
- Menghapus data siswa (dengan konfirmasi)
- Rekap jumlah siswa per kelas (dalam bentuk grafik)

## Teknologi yang dipakai

| Bagian     | Teknologi |
|------------|-----------|
| Bahasa server | PHP (native, tanpa framework) |
| Database   | MySQL / MariaDB |
| Tampilan   | HTML, CSS, [Bootstrap 5](https://getbootstrap.com/) |
| Ikon       | [Font Awesome](https://fontawesome.com/) |
| Notifikasi | [SweetAlert2](https://sweetalert2.github.io/) |
| Grafik     | [Chart.js](https://www.chartjs.org/) |

Semua library di atas dimuat lewat CDN (link internet), jadi tidak perlu
install Composer atau npm — cukup XAMPP/Laragon dan koneksi internet saat
membuka halamannya.

## Struktur folder

```
simpel-data-siswa/
├── assets/
│   ├── css/style.css      -> styling tambahan di atas Bootstrap
│   └── js/app.js          -> script konfirmasi hapus data (SweetAlert2)
├── database/
│   └── siswa.sql          -> struktur tabel + data contoh
├── includes/
│   ├── header.php         -> navbar & bagian <head>, dipakai di semua halaman
│   └── footer.php         -> penutup halaman & pemanggilan script
├── config.php              -> koneksi ke database
├── functions.php           -> semua fungsi CRUD (logika, terpisah dari tampilan)
├── index.php                -> halaman daftar siswa + pencarian
├── tambah.php                -> form & proses tambah data
├── edit.php                   -> form & proses ubah data
├── hapus.php                   -> proses hapus data
├── rekap.php                    -> rekap & grafik jumlah siswa per kelas
├── PANDUAN_INSTALASI.md          -> cara install XAMPP/Laragon & menjalankan project
└── PANDUAN_PORTOFOLIO.md          -> panduan mengisi form dokumentasi UJK
```

Kode dipisah per tanggung jawab (*separation of concerns*): file
`functions.php` hanya berisi logika, file `.php` di root hanya berisi
tampilan yang memanggil fungsi tersebut. Ini contoh penerapan pemrograman
terstruktur dan best practice penulisan kode.

## Cara menjalankan

Lihat langkah lengkap instalasi software di **`PANDUAN_INSTALASI.md`**.
Ringkasnya:

1. Install XAMPP atau Laragon.
2. Copy folder `simpel-data-siswa` ke folder `htdocs` (XAMPP) atau `www` (Laragon).
3. Buka phpMyAdmin, buat database, lalu import `database/siswa.sql`.
4. Buka `http://localhost/simpel-data-siswa/` di browser.

## Debugging

`config.php` sudah mengaktifkan `error_reporting(E_ALL)` dan
`display_errors` supaya pesan error PHP langsung terlihat di browser saat
development — ini memudahkan proses debugging. Contoh cara debug yang
dipakai di project ini:

- Jika halaman blank/putih, cek pesan error di browser (karena
  `display_errors` aktif) atau lihat file log Apache di
  `xampp/apache/logs/error.log`.
- Jika koneksi database gagal, `config.php` akan menampilkan pesan yang
  jelas ("Koneksi database gagal: ...") alih-alih halaman kosong.
- Jika query gagal (misalnya salah nama kolom), fungsi tambah/update akan
  menampilkan `mysqli_error($koneksi)` supaya penyebabnya langsung terlihat.
- Bisa juga pakai `var_dump($variabel);` sementara di tengah kode untuk
  memeriksa isi variabel saat debugging, lalu dihapus lagi setelah selesai.

## Catatan

Project ini sengaja dibuat sederhana (satu entitas: siswa) supaya mudah
dipahami dan cepat diselesaikan, namun tetap mencakup instalasi tools,
UI, pemrograman terstruktur, struktur data, pemakaian library, debugging,
dan dokumentasi kode — sesuai unit kompetensi yang diujikan.

# sistem-informasi-data-siswa
 b7f706b9516d7cb6c206d00ef3f0b869b818a2fd
