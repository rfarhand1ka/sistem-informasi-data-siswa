# Panduan Mengisi Form "Dokumentasi Assesmen Peserta"

File ini memetakan tiap **unit kompetensi** di form UJK-mu ke bagian
project ini, supaya kamu tinggal ambil screenshot dan salin penjelasan
singkatnya ke tabel di file Word `DOKUMENTASI ASSESMEN PESERTA.docx`.

Setiap unit di form itu ada 4 kolom "Bukti Foto/Screenshot" + 1 kolom
"Penjelasan". Kamu tidak wajib mengisi 4 foto sekaligus — isi sesuai
banyak bukti yang relevan, minimal 1-2 foto per unit sudah cukup asal
jelas.

---

### 1. J.620100.011.01 — Melakukan instalasi software tools pemrograman

**Screenshot:** ambil dari langkah-langkah di `PANDUAN_INSTALASI.md`
(VS Code terbuka, XAMPP/Laragon running, phpMyAdmin dengan tabel siswa).

**Contoh penjelasan:**
> "Saya menginstal VS Code sebagai text editor dan XAMPP sebagai server
> lokal (Apache + MySQL) untuk menjalankan aplikasi PHP. Database dibuat
> dan diimport melalui phpMyAdmin."

---

### 2. J.620100.005.02 — Mengimplementasikan User Interface

**Screenshot:** tampilan halaman `index.php` (daftar siswa), `tambah.php`
(form tambah), dan `rekap.php` (kartu + grafik) di browser.

**Contoh penjelasan:**
> "UI dibuat menggunakan HTML, CSS, dan Bootstrap 5 agar responsif dan
> rapi. Terdapat halaman daftar data dalam bentuk tabel, form input, serta
> tampilan kartu ringkasan dan grafik pada halaman rekap."

---

### 3. J.620100.017.02 — Mengimplementasikan pemrograman terstruktur

**Screenshot:** buka `functions.php` dan `index.php` di VS Code,
perlihatkan bagaimana halaman memanggil fungsi (`getAllSiswa()`, dst)
alih-alih menulis query langsung di halaman tampilan.

**Contoh penjelasan:**
> "Kode dipisah menjadi beberapa file dengan tanggung jawab masing-masing:
> `config.php` untuk koneksi database, `functions.php` untuk semua fungsi
> CRUD, dan file halaman (`index.php`, `tambah.php`, dst.) hanya untuk
> tampilan yang memanggil fungsi tersebut."

---

### 4. J.620100.004.02 — Menggunakan struktur data

**Screenshot:** buka fungsi `rekapPerKelas()` di `functions.php`, dan
tampilan hasilnya di `rekap.php`.

**Contoh penjelasan:**
> "Data siswa dari database diolah menggunakan array asosiatif PHP untuk
> menghitung jumlah siswa per kelas (`['X' => 1, 'XI' => 2, ...]`),
> kemudian ditampilkan sebagai kartu ringkasan dan grafik."

---

### 5. J.620100.019.02 — Menggunakan library atau komponen pre-existing

**Screenshot:** bagian `<link>`/`<script>` di `includes/header.php` dan
`includes/footer.php` yang memuat Bootstrap, Font Awesome, SweetAlert2,
dan Chart.js. Bisa juga screenshot efek visualnya (dialog konfirmasi
SweetAlert2 saat hapus data, grafik Chart.js di halaman rekap).

**Contoh penjelasan:**
> "Project ini menggunakan beberapa library pihak ketiga: Bootstrap 5
> untuk kerangka tampilan, Font Awesome untuk ikon, SweetAlert2 untuk
> dialog konfirmasi hapus data, dan Chart.js untuk menampilkan grafik
> rekap siswa per kelas."

---

### 6. J.620100.016.01 — Menulis kode dengan prinsip sesuai guidelines dan best practices

**Screenshot:** cuplikan kode mana saja yang menunjukkan komentar
docblock, penamaan fungsi/variabel yang konsisten, dan indentasi rapi
(misalnya bagian atas `functions.php`).

**Contoh penjelasan:**
> "Kode diberi komentar penjelasan di setiap fungsi, penamaan variabel
> dan fungsi menggunakan bahasa yang deskriptif (contoh: `getAllSiswa`,
> `tambahSiswa`), serta input dari user selalu di-escape
> (`mysqli_real_escape_string`) untuk mencegah SQL injection."

---

### 7. J.620100.025.02 — Melakukan debugging

**Screenshot:** salah satu dari:
- Pesan error yang muncul saat sengaja mematikan MySQL lalu membuka
  aplikasi (menunjukkan pesan "Koneksi database gagal: ...").
- Bagian kode `error_reporting(E_ALL)` di `config.php`.
- Contoh mengetik data kosong di form tambah → muncul pesan validasi
  error di halaman.

**Contoh penjelasan:**
> "Saat development, `error_reporting` dan `display_errors` diaktifkan di
> `config.php` agar error PHP langsung terlihat. Saya juga menguji kasus
> gagal (koneksi database mati, input form kosong) untuk memastikan
> aplikasi menampilkan pesan error yang jelas, bukan halaman kosong."

---

### 8. J.620100.023.02 — Membuat dokumen kode program

**Screenshot:** file `README.md` yang terbuka (baik di VS Code maupun di
GitHub jika sudah di-push), dan/atau komentar docblock di atas
`functions.php`.

**Contoh penjelasan:**
> "Dokumentasi project dibuat dalam `README.md` yang menjelaskan fitur,
> teknologi, struktur folder, dan cara menjalankan aplikasi. Setiap fungsi
> di `functions.php` juga diberi komentar docblock yang menjelaskan tujuan,
> parameter, dan nilai kembaliannya."

---

## Tabel "Portofolio Tambahan" di halaman terakhir form

Kalau kamu meng-upload project ini ke GitHub (form UJK memang meminta
Link GitHub), isi tabel portofolio tambahan dengan, misalnya:

| No | Nama Portofolio | Dokumen Pendukung (link) |
|----|------------------|----------------------------|
| 1  | Source code aplikasi | link repo GitHub kamu |
| 2  | README dokumentasi | link ke README.md di repo |
| 3  | Video demo aplikasi (opsional) | link YouTube/Drive kalau ada |
