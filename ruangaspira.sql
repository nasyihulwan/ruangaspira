-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 11:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruangaspira`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id_aspirasi` int(11) NOT NULL,
  `tgl_aspirasi` date NOT NULL,
  `tgl_kejadian` date DEFAULT NULL,
  `nim` char(16) NOT NULL,
  `judul_aspirasi` varchar(255) NOT NULL,
  `isi_laporan` text NOT NULL,
  `tempat_kejadian` varchar(255) NOT NULL,
  `lampiran_1` varchar(255) NOT NULL,
  `lampiran_2` varchar(255) NOT NULL,
  `lampiran_3` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `tgl_disetujui` date NOT NULL,
  `status` enum('0','tolak','proses','selesai') NOT NULL,
  `tingkat` enum('0','hima','prodi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aspirasi`
--

INSERT INTO `aspirasi` (`id_aspirasi`, `tgl_aspirasi`, `tgl_kejadian`, `nim`, `judul_aspirasi`, `isi_laporan`, `tempat_kejadian`, `lampiran_1`, `lampiran_2`, `lampiran_3`, `kategori`, `tgl_disetujui`, `status`, `tingkat`) VALUES
(17256, '2023-03-16', '2023-03-01', '3273241103050003', 'Jalan Berlubang', 'Jalan Berlubang Menggangu, Takutnya Ada Yang Celaka', 'KAMBOJA', 'jalan_berlubang.jpeg', '', '', 'KAT10001', '2025-06-08', 'selesai', 'prodi'),
(28890, '2023-03-16', '2023-03-01', '3273241103050003', 'Pencurian Di Rumah', 'Pencurian barang berharga, tolong segera tangkap', 'Bojong Awi Kaler, No. 116', 'pencuri.jpeg', '', '', 'KAT10000', '0000-00-00', '0', '0'),
(77903, '2025-06-06', NULL, '3273241103050003', 'Departemen MIKAT', 'Tolong adakan playkom cewe', '-', '', '', '', 'KAT10001', '2025-06-06', 'proses', 'hima'),
(78887, '2025-06-06', '2025-06-07', '3273241103050003', 'Fasilitas rusak', 'lift tidak bisa digunakan', 'Gedung Biru', '', '', '', 'KAT10001', '2025-06-06', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi_ditolak`
--

CREATE TABLE `aspirasi_ditolak` (
  `id_tolak` int(11) NOT NULL,
  `id_aspirasi` int(11) NOT NULL,
  `alasan` varchar(50) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi_kategori`
--

CREATE TABLE `aspirasi_kategori` (
  `id` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `is_checked` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aspirasi_kategori`
--

INSERT INTO `aspirasi_kategori` (`id`, `nama_kategori`, `is_checked`) VALUES
('KAT10000', 'Pencurian', '1'),
('KAT10001', 'Lainnya', '1'),
('KAT27291', 'Fasilitas', '1'),
('KAT77475', 'Pelecehan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `aspirasi_selesai`
--

CREATE TABLE `aspirasi_selesai` (
  `id_selesai` int(11) NOT NULL,
  `id_aspirasi` int(11) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `lampiran_1` varchar(255) DEFAULT NULL,
  `lampiran_2` varchar(255) DEFAULT NULL,
  `lampiran_3` varchar(255) DEFAULT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aspirasi_selesai`
--

INSERT INTO `aspirasi_selesai` (`id_selesai`, `id_aspirasi`, `tgl_selesai`, `lampiran_1`, `lampiran_2`, `lampiran_3`, `id_petugas`) VALUES
(82028, 17256, '2023-03-16', 'perbaikan_jalan.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `prodi` enum('Teknik Komputer') NOT NULL,
  `angkatan` enum('2020','2021','2022','2023','2024') NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','deleted') NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `prodi`, `angkatan`, `username`, `password`, `status`, `telp`, `alamat`) VALUES
('098765', 'Opet', 'Teknik Komputer', '2020', 'opet', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', 'deleted', '081321314', 'KAMBOJA'),
('110305', 'Nasul Satoru', 'Teknik Komputer', '2021', 'satoru', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', 'active', '08977777', 'BANDUNG KIDUL'),
('1298674189', 'Jotaro', 'Teknik Komputer', '2023', 'jojo', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', 'active', '1241415', 'ARCAMANIK'),
('2301425', 'Subhan Alief Putra', 'Teknik Komputer', '2023', 'subhanalief', '$2y$10$vK0GR4FaskFrJSfIFENOpOETIEQKG2tqrcWoExr/k3nUJWhnuGr/K', 'active', '08912345678', 'Pilar Biru'),
('3273241103050003', 'Sain', 'Teknik Komputer', '2022', 'sain', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', 'active', '089123', 'ANTAPANI'),
('3273241805140005', 'Nasyih Wawan', 'Teknik Komputer', '2020', 'anasbuek', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', 'active', '123', 'BOJONG AWI'),
('91857189', 'Akainu', 'Teknik Komputer', '2022', 'akainu', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', 'active', '1214551', 'CICADAS');

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
  `level` enum('master admin','admin','petugas','prodi_tekkom','hima_tekkom') NOT NULL,
  `status` enum('active','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `status`) VALUES
(1, 'Nasyih', 'master_admin', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', '08912345678', 'master admin', 'active'),
(2, 'HIMA TEKKOM', 'hima_tekkom', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', '08932112421', 'hima_tekkom', 'active'),
(39060, 'PRODI TEKKOM', 'prodi_tekkom', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', '12341234', 'prodi_tekkom', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan_mahasiswa`
--

CREATE TABLE `ulasan_mahasiswa` (
  `id_ulasan` int(11) NOT NULL,
  `nim` char(16) NOT NULL,
  `tgl_ulasan` date NOT NULL,
  `ulasan` varchar(255) NOT NULL,
  `tingkat_kepuasan` enum('Sangat Puas','Puas','Kurang Puas','Tidak Puas','Sangat Tidak Puas') NOT NULL,
  `is_censored` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan_mahasiswa`
--

INSERT INTO `ulasan_mahasiswa` (`id_ulasan`, `nim`, `tgl_ulasan`, `ulasan`, `tingkat_kepuasan`, `is_censored`) VALUES
(10001, '3273241805140005', '2023-03-09', 'MANTAP', 'Sangat Puas', '0'),
(10002, '098765', '2023-03-09', 'Admin tidak ramah', 'Kurang Puas', '0'),
(10003, '110305', '2023-03-09', 'Admin wibu, selebihnya oke', 'Puas', '1'),
(10004, '1298674189', '2023-03-09', 'ORAORAORAORAORA', 'Tidak Puas', '0'),
(10005, '91857189', '2023-03-09', 'NICE!', 'Sangat Puas', '0'),
(10006, '3273241103050003', '2025-06-09', 'MANTAP RUANGASPIRA!!!!', 'Sangat Puas', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id_aspirasi`),
  ADD KEY `nik` (`nim`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `aspirasi_ditolak`
--
ALTER TABLE `aspirasi_ditolak`
  ADD PRIMARY KEY (`id_tolak`),
  ADD KEY `id_pengaduan` (`id_aspirasi`);

--
-- Indexes for table `aspirasi_kategori`
--
ALTER TABLE `aspirasi_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspirasi_selesai`
--
ALTER TABLE `aspirasi_selesai`
  ADD PRIMARY KEY (`id_selesai`),
  ADD KEY `id_pengaduan` (`id_aspirasi`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `ulasan_mahasiswa`
--
ALTER TABLE `ulasan_mahasiswa`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `nik` (`nim`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD CONSTRAINT `aspirasi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `aspirasi_ibfk_2` FOREIGN KEY (`kategori`) REFERENCES `aspirasi_kategori` (`id`);

--
-- Constraints for table `aspirasi_ditolak`
--
ALTER TABLE `aspirasi_ditolak`
  ADD CONSTRAINT `aspirasi_ditolak_ibfk_1` FOREIGN KEY (`id_aspirasi`) REFERENCES `aspirasi` (`id_aspirasi`);

--
-- Constraints for table `aspirasi_selesai`
--
ALTER TABLE `aspirasi_selesai`
  ADD CONSTRAINT `aspirasi_selesai_ibfk_1` FOREIGN KEY (`id_aspirasi`) REFERENCES `aspirasi` (`id_aspirasi`),
  ADD CONSTRAINT `aspirasi_selesai_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Constraints for table `ulasan_mahasiswa`
--
ALTER TABLE `ulasan_mahasiswa`
  ADD CONSTRAINT `ulasan_mahasiswa_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
