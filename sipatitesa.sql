-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 03:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipatitesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_gejala`
--

CREATE TABLE `detail_gejala` (
  `iddetail_gejala` int(11) NOT NULL,
  `idgejala` int(11) NOT NULL,
  `idtekanan` int(11) NOT NULL,
  `banding_gejala` varchar(50) NOT NULL,
  `rentang-gejala` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `idhasil` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `hsl_tekanan` varchar(50) NOT NULL,
  `bobot` double NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`idhasil`, `iduser`, `hsl_tekanan`, `bobot`, `tgl`) VALUES
(3, 5, 'tinggi', 72.4, '2023-08-29 03:21:23'),
(4, 5, 'tinggi', 90, '2023-08-29 03:52:48'),
(5, 1, 'sedang', 61.03, '2023-08-29 04:32:04'),
(8, 4, 'tinggi', 71.14, '2023-08-29 07:46:50'),
(9, 4, 'tinggi', 75.61, '2023-08-29 07:48:11'),
(11, 7, 'tinggi', 81.03, '2023-08-29 07:58:47'),
(12, 5, 'tinggi', 70.71, '2023-08-29 08:02:45'),
(13, 5, 'tinggi', 70.71, '2023-08-29 08:03:28'),
(15, 7, 'tinggi', 60.65, '2023-08-29 08:16:43'),
(16, 7, 'tinggi', 76.67, '2023-08-29 08:17:31'),
(17, 7, 'tinggi', 76.67, '2023-08-29 08:18:10'),
(19, 7, 'rendah', 0, '2023-08-29 08:21:06'),
(20, 7, 'rendah', 0, '2023-08-29 08:21:53'),
(21, 7, 'tinggi', 71.54, '2023-08-29 08:22:30'),
(22, 8, 'tinggi', 71.54, '2023-08-29 08:24:50'),
(23, 8, 'tinggi', 70, '2023-08-29 08:27:18'),
(24, 8, 'tinggi', 68.52, '2023-08-29 08:27:55'),
(27, 1, 'tinggi', 82.88, '2023-08-29 08:44:18'),
(29, 1, 'tinggi', 78.44, '2023-08-29 08:45:51'),
(30, 1, 'tinggi', 83.33, '2023-08-29 08:46:36'),
(31, 7, 'tinggi', 69.07, '2023-08-29 09:12:13'),
(32, 7, 'tinggi', 77.7, '2023-08-29 09:14:54'),
(33, 5, 'tinggi', 88.18, '2023-08-29 09:17:48'),
(36, 7, 'tinggi', 66.67, '2023-08-29 09:45:32'),
(37, 1, 'tinggi', 85.86, '2023-08-29 10:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `idindikator` int(11) NOT NULL,
  `idkarakteristik` int(11) NOT NULL,
  `kode_indikator` varchar(25) NOT NULL,
  `indikator` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`idindikator`, `idkarakteristik`, `kode_indikator`, `indikator`) VALUES
(1, 3, 'i1', 'Penghargaan atas diri rendah'),
(2, 1, 'i2', 'Merasa tidak dapat mengendalikan perasaan'),
(3, 1, 'i3', 'Merasa tidak dapat mengendalikan diri'),
(4, 2, 'i4', 'Tertekan dan kesulitan '),
(5, 2, 'i5', 'Tidak dapat mengatasi masalah'),
(7, 5, 'i6', 'Gejala fisik yang keluar');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `idjawaban` int(11) NOT NULL,
  `kode_jawaban` varchar(20) NOT NULL,
  `jawaban` text NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`idjawaban`, `kode_jawaban`, `jawaban`, `bobot`) VALUES
(1, 'SS', 'Sangat Sering', 1),
(2, 'CS', 'Cukup Sering', 0.8),
(11, 'kk', 'Kadang-Kadang', 0.5),
(12, 'htp', 'Hampir Tiidak Pernah', 0.2),
(13, 'tp', 'Tidak Pernah', 0);

-- --------------------------------------------------------

--
-- Table structure for table `karakteristik`
--

CREATE TABLE `karakteristik` (
  `idkarakteristik` int(11) NOT NULL,
  `kode_karakteristik` varchar(30) NOT NULL,
  `karakteristik` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `karakteristik`
--

INSERT INTO `karakteristik` (`idkarakteristik`, `kode_karakteristik`, `karakteristik`, `deskripsi`) VALUES
(1, 'k1', 'Emosi', 'Emosi merupakan salah satu penyebab terjadinya stres, karna dari emosi terkadang dapat merasa cepat marah, bimbang, dan lain-lain.'),
(2, 'k2', 'Perilaku', 'Perilaku dapat mempengaruhi seseorang karena ketidak sesuian keinginan dengan kenyataan. '),
(3, 'k3', 'Pikiran', 'Pikiran adalah penyebab utama tekanan dan stres, karena Ketika suatu keinginan tidak sesuai atau tercapai maka akan menyebabkan tekanan terhadap otak.'),
(5, 'k4', 'Fisik', 'Fisik adalah .........');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `idpertanyaan` int(11) NOT NULL,
  `idindikator` int(11) NOT NULL,
  `kode_pertanyaan` varchar(25) NOT NULL,
  `pertanyaan` text NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`idpertanyaan`, `idindikator`, `kode_pertanyaan`, `pertanyaan`, `bobot`) VALUES
(1, 1, 'g1', 'Saya tidak percaya diri ketika menyelesaikan tugas kuliah?', 0.4),
(2, 1, 'g2', 'Saya sering ingin menyerah untuk tidak melanjutkan perkuliahan?', 1),
(3, 1, 'g3', 'Saya berfikir tugas perkuliahan susah dan tidak dapat di selesaikan?', 0.4),
(4, 1, 'g4', 'Saya berfikir mengerjakan tugas kuliah itu sia-sia?', 0.7),
(5, 1, 'g5', 'Saya berfikir bahwa tidak memiliki teman yang dapat membantu aktivitas perkulihan?', 0.2),
(6, 1, 'g6', 'Saya berfikir akan gagal dalam menyelesaikan perkuliahan dan mengecewakan semua orang?', 0.8),
(7, 2, 'g7', 'Saya sering kesal karena mendapat tugas dari dosen?', 0.4),
(8, 2, 'g8', 'Saya sering merasa cemas ketika tidak dapat menyelesaikan tugas kuliah?', 0.5),
(9, 2, 'g9', 'Saya sering merasakan sedih ketika mendapat nilai MK rendah?', 0.8),
(10, 2, 'g10', 'Saya mengalami emosi yang tidak stabil (kadang marah,kadang semangat pada saat menjalani perkuliahan) ?', 0.9),
(11, 3, 'g11', 'Saya sering merasa capek dan jenuh saat melakukan aktivitas perkuliahan?', 0.4),
(12, 3, 'g12', 'Saya sering merasa tidak berdaya ketika sedang menyelesaikan tugas kuliah?', 1),
(13, 4, 'g13', 'Saya  sering gugup dan tertekan ketika melakukan aktivitas perkuliahan?', 0.5),
(14, 4, 'g14', 'Saya sering mengumpat ketika mendapat tugas kuliah yang sulit?', 0.7),
(15, 4, 'g15', 'Saya sering menyalahkan diri sendiri akibat menundan-nunda tugas perkuliahan?', 0.4),
(16, 5, 'g16', 'Saya menangis dan berteriak Ketika mendapat tugas kuliah?', 1),
(17, 5, 'g17', 'Saya berdiam diri Ketika mendapat tugas perkuliahan? ', 0.3),
(18, 5, 'g18', 'Saya tidak pernah membuat jadwal dan mengabaikan perkuliahan?', 0.6),
(19, 7, 'g19', 'Saya merasa jantung berdebar-debar ketika ?', 0.8),
(20, 7, 'g20', 'Saya sering pusing ketika mengerjakan tugas perkuliahan?', 1),
(21, 7, 'g21', 'Saya sering sakit perut ketika mengerjakan kegiatan perkuliahan?', 0.4),
(22, 7, 'g22', 'Saya mengalami kerontokan rambut yang parah ketika mengerjakan tugas perkuliahan?', 0.5),
(23, 7, 'g23', 'Saya merasa mual tanpa sebab ketika mengerjakan tugas perkuliahan?', 0.2),
(32, 7, 'g24', 'Timbul jerawat ketika saya mengerjakan tugas perkuliahan?', 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `idsolusi` int(11) NOT NULL,
  `idtekanan` int(11) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`idsolusi`, `idtekanan`, `solusi`) VALUES
(1, 1, 'Tingkat tekanan stres ringan bisa di cegah dengan cara : mengonsumsi makanan sehat, menyediakan waktu beristirahat, olahraga secara teratur, dan menetapkan harapan yang relistis dan tidak membebani diri sendiri.'),
(2, 2, 'Mengalami tekanan stres tingkat sedang adalah suatu hal yang wajar, cara mengatasinya adalah dengan  menghindari menunda-nunda tugas, menentukan prioritas, dan melakukan hobi yang di sukai.'),
(3, 3, 'Mengalami tekanan stres tingkat berat solusinya adalah dengan berkonsultasi dengan psikolog.');

-- --------------------------------------------------------

--
-- Table structure for table `tingkattekanan_stres`
--

CREATE TABLE `tingkattekanan_stres` (
  `idtekanan` int(11) NOT NULL,
  `tekanan` varchar(50) NOT NULL,
  `range_atas` double NOT NULL,
  `range_bawah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tingkattekanan_stres`
--

INSERT INTO `tingkattekanan_stres` (`idtekanan`, `tekanan`, `range_atas`, `range_bawah`) VALUES
(1, 'rendah', 107.893, 0),
(2, 'sedang', 215.787, 107.894),
(3, 'tinggi', 323.68, 215.788);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `instansi` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `nama`, `instansi`, `email`, `level`) VALUES
(1, 'eka', '$2y$10$/ZMuY1mfa5LNd2pqV3JZbOBSZqcYHLIjS8eJ6SgsMN0WEZaEuuzty', 'Eka Nurseva Saniyah', 'UMC', 'ekanursevas@gmail.com', ''),
(3, 'eka21', '$2y$10$p5BwoZv6/ZMXVjydwqGWg.2Aq75/HdWc06xJd0PRNTV1hFSLrbDaW', 'Eka Nurseva', 'UMC', 'ekanurseva@gmail.com', 'User'),
(4, 'mtiwi', '$2y$10$T0g27XeaemTWbwNKeGp0UeLK8b6Os2qvgf4aDx0OrSV7THq9hPN7m', 'M. G. Pratiwi', 'UMC', 'mgpratiwwi@gmail.com', 'Admin'),
(5, 'admin', '$2y$10$5T1oMI835YuZGrW5jBGUpuOOmjT.9rro.Sz3lsesvGL0vrcFnmVRC', 'admin', 'admin', 'admin@gmail.com', 'Admin'),
(6, 'hhh', '$2y$10$qTjW9rB/jOAq3aPB7.oIX.9FlsEbthowfkhQGUnBBOgkxmoE6mi9m', 'hhh', 'UMC', 'hhh@gmail.com', 'User'),
(7, 'siapa', '$2y$10$o6l/ZEfhZzM0B0ycIcagleisUaUKo/KFGLCoQbUScYMzf.ZaWPtRG', 'Siapa Aja Ya', 'Universitas Muhammadiyah Cireb', 'siapaaja@gmail.com', 'User'),
(8, 'hh2', '$2y$10$0giRT9JYfSiA7F1SRWRPfuuid0vd0bm4X1B3ArImqPtgY9IZjbZv2', 'Haha', 'UMC Ughul', 'hahaahaha@gmail.com', 'User'),
(9, 'Guest', 'Guest', 'Guest', 'Guest', 'Guest@example.com', 'Guest'),
(10, 'Guest', 'Guest', 'Guest', 'Guest', 'Guest@example.com', 'Guest'),
(11, 'Guest', 'Guest', 'Guest', 'Guest', 'Guest@example.com', 'Guest'),
(12, 'Guest', 'Guest', 'Guest', 'Guest', 'Guest@example.com', 'Guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_gejala`
--
ALTER TABLE `detail_gejala`
  ADD PRIMARY KEY (`iddetail_gejala`),
  ADD UNIQUE KEY `idgejala` (`idgejala`),
  ADD UNIQUE KEY `idtekanan` (`idtekanan`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`idhasil`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`idindikator`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`idjawaban`);

--
-- Indexes for table `karakteristik`
--
ALTER TABLE `karakteristik`
  ADD PRIMARY KEY (`idkarakteristik`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`idpertanyaan`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`idsolusi`);

--
-- Indexes for table `tingkattekanan_stres`
--
ALTER TABLE `tingkattekanan_stres`
  ADD PRIMARY KEY (`idtekanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `idhasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `idindikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `idjawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `karakteristik`
--
ALTER TABLE `karakteristik`
  MODIFY `idkarakteristik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `idpertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
  MODIFY `idsolusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tingkattekanan_stres`
--
ALTER TABLE `tingkattekanan_stres`
  MODIFY `idtekanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_gejala`
--
ALTER TABLE `detail_gejala`
  ADD CONSTRAINT `detail_gejala_ibfk_1` FOREIGN KEY (`idgejala`) REFERENCES `gejala` (`idgejala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_gejala_ibfk_2` FOREIGN KEY (`idtekanan`) REFERENCES `tingkattekanan_stres` (`idtekanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
