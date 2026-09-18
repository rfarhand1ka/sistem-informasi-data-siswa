<?php
/**
 * includes/header.php
 * ---------------------------------------------------------------------
 * Bagian atas halaman (navbar) yang dipakai berulang di semua halaman.
 * Dipisah ke file sendiri supaya tidak menulis kode HTML yang sama
 * berkali-kali di setiap file (prinsip DRY - Don't Repeat Yourself).
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Data Siswa</title>

    <!-- Library / komponen pre-existing yang dipakai (unit kompetensi:
         Menggunakan library atau komponen pre-existing) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="fa-solid fa-graduation-cap"></i> Data Siswa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php"><i class="fa-solid fa-list"></i> Daftar Siswa</a></li>
                <li class="nav-item"><a class="nav-link" href="tambah.php"><i class="fa-solid fa-plus"></i> Tambah Siswa</a></li>
                <li class="nav-item"><a class="nav-link" href="rekap.php"><i class="fa-solid fa-chart-simple"></i> Rekap per Kelas</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mb-5">
