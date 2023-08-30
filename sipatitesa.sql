-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2023 pada 21.38
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

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
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `idhasil` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `hsl_tekanan` varchar(50) NOT NULL,
  `bobot` double NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`idhasil`, `iduser`, `hsl_tekanan`, `bobot`, `tgl`) VALUES
(3, 5, 'tinggi', 72.4, '2023-08-29 03:21:23'),
(4, 5, 'tinggi', 90, '2023-08-29 03:52:48'),
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
(31, 7, 'tinggi', 69.07, '2023-08-29 09:12:13'),
(32, 7, 'tinggi', 77.7, '2023-08-29 09:14:54'),
(33, 5, 'tinggi', 88.18, '2023-08-29 09:17:48'),
(36, 7, 'tinggi', 66.67, '2023-08-29 09:45:32'),
(43, 19, 'tinggi', 83.51, '2023-08-30 04:49:31'),
(44, 19, 'sedang', 75.71, '2023-08-30 04:50:16'),
(45, 19, 'rendah', 0, '2023-08-30 04:54:02'),
(46, 5, 'tinggi', 74.55, '2023-08-30 09:31:54'),
(47, 5, 'tinggi', 82.86, '2023-08-30 16:08:44'),
(48, 5, 'tinggi', 77.62, '2023-08-30 16:12:04'),
(49, 5, 'tinggi', 77.62, '2023-08-30 16:13:20'),
(50, 5, 'tinggi', 75.37, '2023-08-30 16:18:11'),
(51, 5, 'rendah', 0, '2023-08-30 16:40:25'),
(52, 5, 'rendah', 0, '2023-08-30 16:40:30'),
(53, 5, 'tinggi', 75.37, '2023-08-30 16:41:30'),
(54, 5, 'tinggi', 75.37, '2023-08-30 16:42:41'),
(55, 5, 'sedang', 70.21, '2023-08-30 16:50:05'),
(56, 5, 'sedang', 70.21, '2023-08-30 16:55:29'),
(57, 5, 'sedang', 70.21, '2023-08-30 16:56:21'),
(58, 5, 'sedang', 70.21, '2023-08-30 16:56:21'),
(59, 5, 'rendah', 80, '2023-08-30 17:02:15'),
(60, 5, 'sedang', 70.21, '2023-08-30 17:02:52'),
(61, 5, 'sedang', 70.21, '2023-08-30 17:03:47'),
(62, 5, 'rendah', 5.87, '2023-08-30 17:04:39'),
(63, 5, 'sedang', 70.21, '2023-08-30 17:07:16'),
(64, 5, 'sedang', 70.21, '2023-08-30 17:11:23'),
(65, 5, 'sedang', 70.21, '2023-08-30 17:11:43'),
(66, 5, 'sedang', 70.21, '2023-08-30 17:38:37'),
(67, 5, 'sedang', 70.21, '2023-08-30 17:39:42'),
(68, 5, 'sedang', 70.21, '2023-08-30 17:39:44'),
(69, 5, 'sedang', 70.21, '2023-08-30 17:57:40'),
(70, 5, 'sedang', 70.21, '2023-08-30 17:58:50'),
(71, 5, 'sedang', 70.21, '2023-08-30 17:59:45'),
(72, 5, 'tinggi', 90, '2023-08-30 18:00:32'),
(73, 5, 'tinggi', 90, '2023-08-30 18:00:34'),
(74, 5, 'rendah', 60, '2023-08-30 18:03:47'),
(75, 5, 'rendah', 60, '2023-08-30 18:04:08'),
(76, 5, 'sedang', 70.21, '2023-08-30 18:04:55'),
(77, 5, 'sedang', 70.21, '2023-08-30 18:16:23'),
(78, 5, 'sedang', 70.21, '2023-08-30 18:19:57'),
(79, 5, 'sedang', 70.21, '2023-08-30 18:20:03'),
(80, 5, 'sedang', 70.21, '2023-08-30 18:23:40'),
(81, 5, 'sedang', 70.21, '2023-08-30 18:24:13'),
(82, 8, 'tinggi', 91.3, '2023-08-30 19:17:37'),
(83, 8, 'rendah', 0, '2023-08-30 19:21:34'),
(84, 8, 'rendah', 0, '2023-08-30 19:24:04'),
(85, 8, 'rendah', 0, '2023-08-30 19:32:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator`
--

CREATE TABLE `indikator` (
  `idindikator` int(11) NOT NULL,
  `idkarakteristik` int(11) NOT NULL,
  `kode_indikator` varchar(25) NOT NULL,
  `indikator` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `indikator`
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
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `idjawaban` int(11) NOT NULL,
  `kode_jawaban` varchar(20) NOT NULL,
  `jawaban` text NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`idjawaban`, `kode_jawaban`, `jawaban`, `bobot`) VALUES
(1, 'SS', 'Sangat Sering', 1),
(2, 'CS', 'Cukup Sering', 0.8),
(11, 'kk', 'Kadang-Kadang', 0.5),
(12, 'htp', 'Hampir Tiidak Pernah', 0.2),
(13, 'tp', 'Tidak Pernah', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karakteristik`
--

CREATE TABLE `karakteristik` (
  `idkarakteristik` int(11) NOT NULL,
  `kode_karakteristik` varchar(30) NOT NULL,
  `karakteristik` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `karakteristik`
--

INSERT INTO `karakteristik` (`idkarakteristik`, `kode_karakteristik`, `karakteristik`, `deskripsi`) VALUES
(1, 'k1', 'Emosi', 'Emosi merupakan salah satu penyebab terjadinya stres, karna dari emosi terkadang dapat merasa cepat marah, bimbang, dan lain-lain.'),
(2, 'k2', 'Perilaku', 'Perilaku dapat mempengaruhi seseorang karena ketidak sesuian keinginan dengan kenyataan. '),
(3, 'k3', 'Pikiran', 'Pikiran adalah penyebab utama tekanan dan stres, karena Ketika suatu keinginan tidak sesuai atau tercapai maka akan menyebabkan tekanan terhadap otak.'),
(5, 'k4', 'Fisik', 'Fisik adalah dampak yang muncul ketika seseorang berhadapan dengan hal-hal yang menggangu aktivitasnya.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `idpertanyaan` int(11) NOT NULL,
  `idindikator` int(11) NOT NULL,
  `kode_pertanyaan` varchar(25) NOT NULL,
  `pertanyaan` text NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan`
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
-- Struktur dari tabel `solusi`
--

CREATE TABLE `solusi` (
  `idsolusi` int(11) NOT NULL,
  `idtekanan` int(11) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `solusi`
--

INSERT INTO `solusi` (`idsolusi`, `idtekanan`, `solusi`) VALUES
(1, 1, 'Tingkat tekanan stres ringan bisa di cegah dengan cara : mengonsumsi makanan sehat, menyediakan waktu beristirahat, olahraga secara teratur, dan menetapkan harapan yang relistis dan tidak membebani diri sendiri.'),
(2, 2, 'Mengalami tekanan stres tingkat sedang adalah suatu hal yang wajar, cara mengatasinya adalah dengan  menghindari menunda-nunda tugas, menentukan prioritas, dan melakukan hobi yang di sukai.'),
(3, 3, 'Mengalami tekanan stres tingkat berat solusinya adalah dengan berkonsultasi dengan psikolog.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temporary`
--

CREATE TABLE `temporary` (
  `id` int(11) NOT NULL,
  `hsl_tekanan` varchar(50) NOT NULL,
  `bobot` double NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkattekanan_stres`
--

CREATE TABLE `tingkattekanan_stres` (
  `idtekanan` int(11) NOT NULL,
  `tekanan` varchar(50) NOT NULL,
  `range_atas` double NOT NULL,
  `range_bawah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tingkattekanan_stres`
--

INSERT INTO `tingkattekanan_stres` (`idtekanan`, `tekanan`, `range_atas`, `range_bawah`) VALUES
(1, 'rendah', 105.323, 0),
(2, 'sedang', 210.647, 105.324),
(3, 'tinggi', 315.97, 210.648);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `nama`, `instansi`, `email`, `level`) VALUES
(4, 'mtiwi', '$2y$10$bRRCwTy2ww50XeySYDil8edhLQU6FF7UB9Qk7mStlM0/dpQ3v6PtK', 'M. G. Pratiwi', 'UMC', 'mgpratiwwi@gmail.com', 'Admin'),
(5, 'admin', '$2y$10$5T1oMI835YuZGrW5jBGUpuOOmjT.9rro.Sz3lsesvGL0vrcFnmVRC', 'admin', 'admin', 'admin@gmail.com', 'Admin'),
(6, 'hhh', '$2y$10$qTjW9rB/jOAq3aPB7.oIX.9FlsEbthowfkhQGUnBBOgkxmoE6mi9m', 'hhh', 'UMC', 'hhh@gmail.com', 'User'),
(7, 'siapa', '$2y$10$o6l/ZEfhZzM0B0ycIcagleisUaUKo/KFGLCoQbUScYMzf.ZaWPtRG', 'Siapa Aja Ya', 'Universitas Muhammadiyah Cireb', 'siapaaja@gmail.com', 'User'),
(8, 'hh2', '$2y$10$0giRT9JYfSiA7F1SRWRPfuuid0vd0bm4X1B3ArImqPtgY9IZjbZv2', 'Haha', 'UMC Ughul', 'hahaahaha@gmail.com', 'User'),
(17, 'mn', '$2y$10$w/BQzTKPyBtT2uJ2txNoQ.fQm9ka/tQLdRs8wqG4b8BON9/CXxBGu', 'gdds', 'umc', 'stru@gdfh', 'User'),
(18, 'mmg', '$2y$10$lzK6NZ1wUFNLTFUSxz6MmuxNphjl9PCn1jaDkb9AMiYMcULuI5BrO', 'mah', 'admin', 'mamah@gmail.com', 'Admin'),
(19, 'tiww', '$2y$10$rUcbpqebSftqD2t3M5P7vubgsO7AaGCuo3szPJPmHccoprVgkhiq2', 'TW', 'umc', 'mgpratiwwi@gmail.com', 'User'),
(20, 'wii', '$2y$10$xgN5o.0Be.WCtaD/BgFhT.qUq/EEHISDOFs6rRZabVv2lRE8.OzT6', 'ww', 'admin', 'mgpratiwwi@gmail.com', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`idhasil`),
  ADD KEY `iduser` (`iduser`);

--
-- Indeks untuk tabel `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`idindikator`),
  ADD KEY `idkarakteristik` (`idkarakteristik`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`idjawaban`);

--
-- Indeks untuk tabel `karakteristik`
--
ALTER TABLE `karakteristik`
  ADD PRIMARY KEY (`idkarakteristik`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`idpertanyaan`),
  ADD KEY `idindikator` (`idindikator`);

--
-- Indeks untuk tabel `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`idsolusi`),
  ADD KEY `idtekanan` (`idtekanan`);

--
-- Indeks untuk tabel `temporary`
--
ALTER TABLE `temporary`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tingkattekanan_stres`
--
ALTER TABLE `tingkattekanan_stres`
  ADD PRIMARY KEY (`idtekanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `idhasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `indikator`
--
ALTER TABLE `indikator`
  MODIFY `idindikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `idjawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `karakteristik`
--
ALTER TABLE `karakteristik`
  MODIFY `idkarakteristik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `idpertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `solusi`
--
ALTER TABLE `solusi`
  MODIFY `idsolusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `temporary`
--
ALTER TABLE `temporary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tingkattekanan_stres`
--
ALTER TABLE `tingkattekanan_stres`
  MODIFY `idtekanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `indikator`
--
ALTER TABLE `indikator`
  ADD CONSTRAINT `indikator_ibfk_1` FOREIGN KEY (`idkarakteristik`) REFERENCES `karakteristik` (`idkarakteristik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`idindikator`) REFERENCES `indikator` (`idindikator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `solusi_ibfk_1` FOREIGN KEY (`idtekanan`) REFERENCES `tingkattekanan_stres` (`idtekanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
