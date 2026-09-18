# Panduan Instalasi Software & Menjalankan Project

Panduan ini juga jadi bukti untuk **Unit Kompetensi 1: Melakukan instalasi
software tools pemrograman** — screenshot tiap langkah di bawah ini untuk
dilampirkan di form dokumentasi UJK.

## 1. Install text editor — Visual Studio Code

1. Download di https://code.visualstudio.com/ sesuai sistem operasimu.
2. Jalankan installer, next-next sampai selesai.
3. Buka VS Code, install extension "PHP Intelephense" (opsional, membantu
   penulisan kode PHP).

📸 **Screenshot untuk portofolio:** tampilan VS Code sudah terbuka dengan
folder project ini di sidebar.

## 2. Install server lokal — XAMPP (atau Laragon)

Pilih salah satu, tidak perlu dua-duanya. **XAMPP** paling umum dipakai
untuk latihan/ujian.

### Opsi A — XAMPP

1. Download di https://www.apachefriends.org/ (pilih versi PHP 8.x).
2. Jalankan installer, next-next sampai selesai (boleh un-check komponen
   yang tidak perlu seperti Mercury/Tomcat).
3. Buka **XAMPP Control Panel**, klik tombol **Start** pada baris
   **Apache** dan **MySQL** sampai keduanya berwarna hijau.

📸 **Screenshot untuk portofolio:** XAMPP Control Panel dengan Apache &
MySQL berstatus "Running" (hijau).

### Opsi B — Laragon

1. Download di https://laragon.org/download/.
2. Install seperti biasa, lalu buka Laragon.
3. Klik tombol **Start All**.

📸 **Screenshot untuk portofolio:** Laragon dengan Apache & MySQL aktif.

## 3. Menempatkan file project

1. Extract/salin folder `simpel-data-siswa` ke:
   - XAMPP → `C:\xampp\htdocs\simpel-data-siswa`
   - Laragon → `C:\laragon\www\simpel-data-siswa`

📸 **Screenshot untuk portofolio:** File Explorer menampilkan isi folder
`simpel-data-siswa` di lokasi `htdocs`/`www`.

## 4. Membuat database

1. Buka browser, akses `http://localhost/phpmyadmin`.
2. Klik tab **Import** di bagian atas.
3. Klik **Choose File**, pilih file `database/siswa.sql` dari project ini.
4. Klik tombol **Go** / **Import** di bagian bawah halaman.
5. Setelah berhasil, akan muncul database baru bernama `db_simpel_siswa`
   berisi tabel `siswa`.

📸 **Screenshot untuk portofolio:** phpMyAdmin menampilkan tabel `siswa`
beserta isi datanya.

## 5. Menjalankan aplikasi

1. Buka browser, akses:

   ```
   http://localhost/simpel-data-siswa/
   ```

2. Halaman daftar siswa akan muncul berisi 5 data contoh.

📸 **Screenshot untuk portofolio:** tampilan halaman utama aplikasi di
browser.

## Troubleshooting singkat (bukti debugging)

| Masalah | Kemungkinan penyebab | Solusi |
|---|---|---|
| Halaman blank / error 404 | Folder project bukan di `htdocs`/`www`, atau salah nama folder di URL | Cek kembali lokasi folder & penulisan URL |
| "Koneksi database gagal" | MySQL di XAMPP/Laragon belum di-Start, atau database belum diimport | Start MySQL, ulangi langkah import |
| Data tidak muncul | Salah import file SQL, atau nama database di `config.php` tidak cocok | Cek nama database di phpMyAdmin harus `db_simpel_siswa` |
