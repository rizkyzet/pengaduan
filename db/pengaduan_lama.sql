-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 02:13 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_jawab`
--

CREATE TABLE `detail_jawab` (
  `no_urut` int(11) NOT NULL,
  `kd_jawab` int(11) NOT NULL,
  `kd_pertanyaan` int(11) NOT NULL,
  `hasil` varchar(258) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jawab`
--

INSERT INTO `detail_jawab` (`no_urut`, `kd_jawab`, `kd_pertanyaan`, `hasil`) VALUES
(39, 13, 4, 'sb'),
(40, 13, 5, 'b'),
(41, 13, 6, 'sb'),
(42, 13, 7, 'sb'),
(43, 13, 8, 'b'),
(44, 13, 15, 'sb'),
(45, 14, 16, 'sb'),
(46, 14, 17, 'b'),
(47, 15, 9, 'sb'),
(48, 15, 10, 'b'),
(49, 15, 11, 'sb'),
(50, 16, 20, 'sb'),
(51, 16, 21, 'sb'),
(52, 16, 22, 'sb'),
(53, 16, 23, 'b'),
(54, 16, 24, 'b'),
(55, 16, 25, 'b'),
(56, 16, 26, 'b'),
(57, 16, 27, 'c'),
(58, 16, 28, 'sb'),
(59, 16, 29, 'b'),
(60, 16, 30, 'b'),
(61, 16, 31, 'b'),
(62, 16, 32, 'b'),
(63, 17, 20, 'c'),
(64, 17, 21, 'b'),
(65, 17, 22, 'b'),
(66, 17, 24, 'b'),
(67, 17, 25, 'b'),
(68, 17, 26, 'c'),
(69, 17, 27, 'sk'),
(70, 18, 20, 'sk'),
(71, 18, 21, 'sb'),
(72, 18, 22, 'sb'),
(73, 18, 24, 'b'),
(74, 18, 25, 'k'),
(75, 18, 26, 'c'),
(76, 18, 27, 'sk'),
(77, 19, 33, 'sb'),
(78, 19, 34, 'b');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Fakultas Ilmu Komputer'),
(2, 'Fakultas Teknik'),
(3, 'Fakultas Keguruan & Ilmu Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `jawab`
--

CREATE TABLE `jawab` (
  `kd_jawab` int(11) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `kd_kuesioner` varchar(50) NOT NULL,
  `tgl_jawab` date NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawab`
--

INSERT INTO `jawab` (`kd_jawab`, `npm`, `kd_kuesioner`, `tgl_jawab`, `saran`) VALUES
(13, '1201161042', 'KS-20200708-1594201421', '2020-07-26', 'tes 123'),
(14, '1201161042', 'KS-20200720-1595245279', '2020-07-26', 'ser'),
(15, '1201161042', 'KS-20200711-1594443266', '2020-07-29', ''),
(16, '1201161042', 'KS-20200804-1596559753', '2020-08-05', 'Test'),
(17, '11201161020', 'KS-20200804-1596559753', '2020-08-05', 'tolong fasilitasi akses internet untuk kami semester akhir yang banyak pengeluaran jadikan kampus sarana yang bisa kami tuju'),
(18, '1201161056', 'KS-20200804-1596559753', '2020-08-05', 'bla bla bla'),
(19, '1201161042', 'KS-20200810-1597062682', '2020-08-14', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner`
--

CREATE TABLE `kuesioner` (
  `kd_kuesioner` varchar(50) NOT NULL,
  `judul_kuesioner` varchar(150) NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuesioner`
--

INSERT INTO `kuesioner` (`kd_kuesioner`, `judul_kuesioner`, `tgl_dibuat`) VALUES
('KS-20200804-1596559753', 'Fasilitas UNBAJA', '2020-08-04'),
('KS-20200810-1597062682', 'kuesioner 1', '2020-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `kd_pertanyaan` int(11) NOT NULL,
  `kd_kuesioner` varchar(50) NOT NULL,
  `isi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`kd_pertanyaan`, `kd_kuesioner`, `isi`) VALUES
(2, 'KS-20200708', 'Bagaimanakah cara'),
(4, 'KS-20200708-1594201421', 'Fasilitas Ruangan atau Kelas mahasiswa'),
(5, 'KS-20200708-1594201421', 'Perpustakaan dan Fasilitasnya'),
(6, 'KS-20200708-1594201421', 'Sarana Olahragaa'),
(7, 'KS-20200708-1594201421', 'Fasilitas Umum (Masjid,kKantin,dll)'),
(8, 'KS-20200708-1594201421', 'Kualifikasi dn kompetensi Dosen'),
(9, 'KS-20200711-1594443266', 'Apakah buku lengkap ?'),
(10, 'KS-20200711-1594443266', 'Apa pelayanan bagus ?'),
(11, 'KS-20200711-1594443266', 'Sentimentil ?'),
(12, 'KS-20200711-1594443385', 'apakah'),
(13, 'KS-20200711-1594443385', 'bagaimana'),
(15, 'KS-20200708-1594201421', 'dimanakah maho berada'),
(16, 'KS-20200720-1595245279', 'Bagaimanakah dia ?'),
(17, 'KS-20200720-1595245279', 'nama dosen mk blablablaaa'),
(18, 'KS-20200721-1595326678', 'Bagaimanakah pelayanan warung di ibu juned?'),
(19, 'KS-20200721-1595326678', 'Bagaimana rasa ayam geprek?'),
(20, 'KS-20200804-1596559753', 'Fasilitas Ruangan atau Kelas'),
(21, 'KS-20200804-1596559753', 'Fasilitas Umum (Masjid,Kantin,dll)'),
(22, 'KS-20200804-1596559753', 'Perpustakaan dan Fasilitasnya'),
(24, 'KS-20200804-1596559753', 'Pelayanan Akademik'),
(25, 'KS-20200804-1596559753', 'Pelayanan Keuangan'),
(26, 'KS-20200804-1596559753', 'Pelayanan Kemahasiswaan'),
(27, 'KS-20200804-1596559753', 'Pelayanan Akses Internet'),
(33, 'KS-20200810-1597062682', 'apakah ?'),
(34, 'KS-20200810-1597062682', 'bagaimanakah ?');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`) VALUES
(1, 1, 'Sistem Informasi-S1'),
(2, 1, 'Teknik Informatika-S1'),
(3, 1, 'Teknik Informatika-D3'),
(4, 1, 'Manajemen Informatika-D3'),
(5, 1, 'Komputerisasi Akuntansii-D3'),
(6, 2, 'Teknik Sipil-S1'),
(7, 2, 'Teknik Industri-S1'),
(8, 2, 'Teknik Lingkungan-S1'),
(9, 3, 'Pendidikan Bahasa Inggris-S1'),
(10, 3, 'Pendidikan Akntansi-S1'),
(11, 3, 'Pendidikan Pancasila & Kewarganegaraan-S1'),
(13, 1, 'Sistem Komputer'),
(14, 1, 'Sistem Informasi Komputerr');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `npm` varchar(15) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `psw` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_prodi` int(50) NOT NULL,
  `role_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `npm`, `nik`, `psw`, `nama`, `jk`, `alamat`, `no_tlp`, `gambar`, `id_prodi`, `role_id`) VALUES
(1, '', '1202020', '$2y$10$xZsCsTqFmHrJevcJ1jplSOD8A.D9n5OBsQMn4dXepkIDa21WHBIrO', 'Khusnul Khotimah', 'perempuan', 'Kp. Suka Jaya', '081574830500', '1202020.png', 0, 2),
(2, '1201161042', '', '$2y$10$6lo3sA5hkZuOm9uPCaJ2BeTZfX09C29JdWR.JXykpi7oHYY3ZvWOe', 'Muhamad Rizky', 'laki-laki', 'ciracas', '0895359449377', 'admin.JPG', 1, 1),
(4, '1201161056', '', '$2y$10$YGAWMvlO5U0bAKTFrpA8YOTrKH39XOXIxQELeEik8seTF1qrVPd12', 'Fazri Azhari', 'laki-laki', 'Labuan', '0895359449377', 'default.png', 1, 1),
(5, '11201161020', '', '$2y$10$vFMqkQDcCKRoqChGMNhlHupB0ID2LYNQ8.U4JUsIM5oW7MwMTQicW', 'Eka Nur Hajijah', 'perempuan', 'Link. Pekarungan', '089651587837', 'default.png', 1, 1),
(6, '3302161038', '', '$2y$10$ZhZLHwBw2UB3MDcbpHcPQufxL/h2KhqPrmDP9OxncsAG3Va/7fEjq', 'Sulistia Siko', 'perempuan', 'Kp. Cikampak', '085282598230', 'mhs.JPG', 9, 1),
(7, '2302161063', '', '$2y$10$0hbgsbOuT.LR4kKN8BuIiesEfA.h3EH08Z4HnVR15gnpeUbgcT0em', 'Ekawati Sri Apriani', 'perempuan', 'Pandeglang', '087882661738', 'default.png', 7, 1),
(8, '', '1202021', '$2y$10$Zc7T7Ez/P8rWo4azltl.GOZ3W8vLWwNDGIMtHzutSehr17JqMgSu2', 'Indra Gunawan', 'laki-laki', 'Serang', '087780759791', '1202021.JPG', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `nama_role`) VALUES
(1, 'mahasiswa'),
(2, 'admin'),
(3, 'kabag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_jawab`
--
ALTER TABLE `detail_jawab`
  ADD PRIMARY KEY (`no_urut`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `jawab`
--
ALTER TABLE `jawab`
  ADD PRIMARY KEY (`kd_jawab`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`kd_kuesioner`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`kd_pertanyaan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_jawab`
--
ALTER TABLE `detail_jawab`
  MODIFY `no_urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jawab`
--
ALTER TABLE `jawab`
  MODIFY `kd_jawab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `kd_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
