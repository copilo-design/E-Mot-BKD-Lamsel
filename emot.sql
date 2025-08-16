CREATE DATABASE emot;
USE emot;

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admin (username, password) VALUES
('admin', MD5('admin123'));

CREATE TABLE surat_masuk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    no_register VARCHAR(50) NOT NULL,
    pengirim VARCHAR(100) NOT NULL,
    opd VARCHAR(100) NOT NULL,
    no_surat VARCHAR(100) NOT NULL,
    perihal VARCHAR(200) NOT NULL,
    penerima VARCHAR(100) NOT NULL,
    tgl_masuk DATE NOT NULL,
    status ENUM('Diterima', 'Diproses', 'Selesai', 'Ditolak') NOT NULL,
    bidang ENUM('Bidang Mutasi', 'Bidang Kepegawaian', 'Bidang Pengembangan', 'Bidang Administrasi') NOT NULL,
    tgl_update DATE DEFAULT NULL,
    keterangan TEXT DEFAULT NULL
);