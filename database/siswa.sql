-- =====================================================================
-- Database: db_simpel_siswa
-- Aplikasi : Sistem Informasi Data Siswa Sederhana
-- Deskripsi: Struktur tabel + data contoh untuk aplikasi CRUD siswa.
--            Import file ini lewat phpMyAdmin (tab "Import") atau
--            lewat terminal: mysql -u root -p db_simpel_siswa < siswa.sql
-- =====================================================================

CREATE DATABASE IF NOT EXISTS db_simpel_siswa;
USE db_simpel_siswa;

-- Tabel utama data siswa
CREATE TABLE IF NOT EXISTS siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nis VARCHAR(20) NOT NULL,
    kelas VARCHAR(20) NOT NULL,
    jurusan VARCHAR(50) NOT NULL,
    no_hp VARCHAR(20) DEFAULT NULL,
    alamat TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data contoh (dummy) supaya aplikasi langsung ada isinya saat pertama dibuka
INSERT INTO siswa (nama, nis, kelas, jurusan, no_hp, alamat) VALUES
('Ahmad Fauzi', '2024001', 'XII', 'Rekayasa Perangkat Lunak', '081234567801', 'Solo'),
('Siti Aminah', '2024002', 'XII', 'Rekayasa Perangkat Lunak', '081234567802', 'Sukoharjo'),
('Budi Santoso', '2024003', 'XI', 'Teknik Komputer Jaringan', '081234567803', 'Karanganyar'),
('Dewi Lestari', '2024004', 'XI', 'Multimedia', '081234567804', 'Boyolali'),
('Rizal Pratama', '2024005', 'X', 'Rekayasa Perangkat Lunak', '081234567805', 'Solo');
