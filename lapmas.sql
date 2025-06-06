-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 11:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latlapmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','deleted') NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `status`, `telp`, `alamat`) VALUES
('098765', 'Opet', 'opet', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', 'active', '081321314', 'KAMBOJA'),
('110305', 'Nasul Satoru', 'satoru', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', 'active', '08977777', 'BANDUNG KIDUL'),
('1298674189', 'Jotaro', 'jojo', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', 'active', '1241415', 'ARCAMANIK'),
('3273241103050003', 'Sain', 'sain', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', 'active', '089123', 'ANTAPANI'),
('3273241805140005', 'Nasyih Wawan', 'anasbuek', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', 'active', '123', 'BOJONG AWI'),
('91857189', 'Akainu', 'akainu', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', 'active', '1214551', 'CICADAS');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `tgl_kejadian` date DEFAULT NULL,
  `nik` char(16) NOT NULL,
  `judul_laporan` varchar(255) NOT NULL,
  `isi_laporan` text NOT NULL,
  `tempat_kejadian` varchar(255) NOT NULL,
  `lampiran_1` varchar(255) NOT NULL,
  `lampiran_2` varchar(255) NOT NULL,
  `lampiran_3` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `status` enum('0','tolak','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `tgl_kejadian`, `nik`, `judul_laporan`, `isi_laporan`, `tempat_kejadian`, `lampiran_1`, `lampiran_2`, `lampiran_3`, `kategori`, `status`) VALUES
(17256, '2023-03-16', '2023-03-01', '3273241103050003', 'Jalan Berlubang', 'Jalan Berlubang Menggangu, Takutnya Ada Yang Celaka', 'KAMBOJA', 'jalan_berlubang.jpeg', '', '', 'KAT10001', 'selesai'),
(28890, '2023-03-16', '2023-03-01', '3273241103050003', 'Pencurian Di Rumah', 'Pencurian barang berharga, tolong segera tangkap', 'Bojong Awi Kaler, No. 116', 'pencuri.jpeg', '', '', 'KAT10000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_ditolak`
--

CREATE TABLE `pengaduan_ditolak` (
  `id_tolak` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `alasan` varchar(50) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_kategori`
--

CREATE TABLE `pengaduan_kategori` (
  `id` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `is_checked` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan_kategori`
--

INSERT INTO `pengaduan_kategori` (`id`, `nama_kategori`, `is_checked`) VALUES
('KAT10000', 'Pencurian', '1'),
('KAT10001', 'Lainnya', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_selesai`
--

CREATE TABLE `pengaduan_selesai` (
  `id_selesai` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `lampiran_1` varchar(255) DEFAULT NULL,
  `lampiran_2` varchar(255) DEFAULT NULL,
  `lampiran_3` varchar(255) DEFAULT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan_selesai`
--

INSERT INTO `pengaduan_selesai` (`id_selesai`, `id_pengaduan`, `tgl_selesai`, `lampiran_1`, `lampiran_2`, `lampiran_3`, `id_petugas`) VALUES
(82028, 17256, '2023-03-16', 'perbaikan_jalan.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('master admin','admin','petugas') NOT NULL,
  `status` enum('active','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `status`) VALUES
(1, 'Nasyih', 'master_admin', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', '08912345678', 'master admin', 'active'),
(2, 'Pablo', 'petugas', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', '08932112421', 'petugas', 'active'),
(39060, 'Wawan', 'admin', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', '12341234', 'admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tgl_tanggapan_balik` date DEFAULT NULL,
  `tanggapan` text NOT NULL,
  `tanggapan_balik` text DEFAULT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tgl_tanggapan_balik`, `tanggapan`, `tanggapan_balik`, `id_petugas`) VALUES
(95252, 17256, '2023-03-16', '2023-03-16', 'SEGERA LAKSANAKAN', 'MANTAP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan_masyarakat`
--

CREATE TABLE `ulasan_masyarakat` (
  `id_ulasan` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `tgl_ulasan` date NOT NULL,
  `ulasan` varchar(255) NOT NULL,
  `tingkat_kepuasan` enum('Sangat Puas','Puas','Kurang Puas','Tidak Puas','Sangat Tidak Puas') NOT NULL,
  `is_censored` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan_masyarakat`
--

INSERT INTO `ulasan_masyarakat` (`id_ulasan`, `nik`, `tgl_ulasan`, `ulasan`, `tingkat_kepuasan`, `is_censored`) VALUES
(10001, '3273241805140005', '2023-03-09', 'MANTAP', 'Sangat Puas', '0'),
(10002, '098765', '2023-03-09', 'Admin tidak ramah', 'Kurang Puas', '0'),
(10003, '110305', '2023-03-09', 'Admin wibu, selebihnya oke', 'Puas', '1'),
(10004, '1298674189', '2023-03-09', 'ORAORAORAORAORA', 'Tidak Puas', '0'),
(10005, '91857189', '2023-03-09', 'NICE!', 'Sangat Puas', '0'),
(10006, '3273241103050003', '2023-03-19', 'MANTAP LAPMAS!!!!', 'Sangat Puas', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `pengaduan_ditolak`
--
ALTER TABLE `pengaduan_ditolak`
  ADD PRIMARY KEY (`id_tolak`),
  ADD KEY `id_pengaduan` (`id_pengaduan`);

--
-- Indexes for table `pengaduan_kategori`
--
ALTER TABLE `pengaduan_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan_selesai`
--
ALTER TABLE `pengaduan_selesai`
  ADD PRIMARY KEY (`id_selesai`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `ulasan_masyarakat`
--
ALTER TABLE `ulasan_masyarakat`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `nik` (`nik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`),
  ADD CONSTRAINT `pengaduan_ibfk_2` FOREIGN KEY (`kategori`) REFERENCES `pengaduan_kategori` (`id`);

--
-- Constraints for table `pengaduan_ditolak`
--
ALTER TABLE `pengaduan_ditolak`
  ADD CONSTRAINT `pengaduan_ditolak_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`);

--
-- Constraints for table `pengaduan_selesai`
--
ALTER TABLE `pengaduan_selesai`
  ADD CONSTRAINT `pengaduan_selesai_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`),
  ADD CONSTRAINT `pengaduan_selesai_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`),
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Constraints for table `ulasan_masyarakat`
--
ALTER TABLE `ulasan_masyarakat`
  ADD CONSTRAINT `ulasan_masyarakat_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
