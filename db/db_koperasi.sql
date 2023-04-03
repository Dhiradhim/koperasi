-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 05:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(10) NOT NULL,
  `no_anggota` int(10) NOT NULL,
  `no_karyawan` int(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `no_anggota`, `no_karyawan`, `tempat_lahir`, `nama_anggota`, `nohp`, `alamat`, `jk`, `tgl_lahir`) VALUES
(1, 2, 2, 'Tangerang', 'Dhimas Radhito', '08123123334', 'Jl. Kejora', 'Laki-laki', '1993-03-25'),
(4, 5, 5, 'Tangerang', 'Lillik Pratama Siwi', '081263517263', 'Jl. Bunga', 'Laki-laki', '2016-04-07'),
(5, 1, 1, 'Jakarta', 'Administrator', '0834532342', 'Jl. Jalan', 'Laki-laki', '1999-04-11'),
(6, 6, 6, 'Surakarta', 'Dino Dino', '08345345544', 'Jl. Kenanga', 'Laki-laki', '2006-04-21'),
(7, 7, 7, 'Tangerang', 'Dhimas ', '08234234343', 'Jl. Kamboja', 'Laki-laki', '2023-04-01'),
(8, 8, 8, 'Jakarta', 'Doni Doni', '08213675162', 'Jl. Melawai', 'Laki-laki', '2023-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id` int(5) NOT NULL,
  `no_anggota` int(10) NOT NULL,
  `no_pinjaman` varchar(10) NOT NULL,
  `angsuran_ke` int(3) NOT NULL,
  `tgl_angsuran` date NOT NULL,
  `jml_angsuran` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id`, `no_anggota`, `no_pinjaman`, `angsuran_ke`, `tgl_angsuran`, `jml_angsuran`) VALUES
(8, 5, '4', 1, '2023-04-03', 500000),
(9, 5, '4', 2, '2023-04-03', 1000000),
(11, 5, '4', 3, '2023-04-03', 2000000),
(13, 5, '4', 4, '2023-04-03', 1750000);

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `no_anggota` int(10) NOT NULL,
  `no_pinjaman` int(10) NOT NULL,
  `jml_pinjaman` int(50) NOT NULL,
  `tgl_pinjaman` date NOT NULL,
  `bunga` int(2) NOT NULL,
  `lama_pinjaman` int(4) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`no_anggota`, `no_pinjaman`, `jml_pinjaman`, `tgl_pinjaman`, `bunga`, `lama_pinjaman`, `status`) VALUES
(8, 3, 5000000, '2023-04-03', 3, 6, 2),
(5, 4, 5250000, '2023-04-03', 5, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id` int(5) NOT NULL,
  `no_anggota` int(10) NOT NULL,
  `jml_simpanan` int(50) NOT NULL,
  `tgl_simpanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id`, `no_anggota`, `jml_simpanan`, `tgl_simpanan`) VALUES
(1, 2, 5000000, '2023-04-02'),
(2, 5, 6000000, '2023-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no_anggota` int(10) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no_anggota`, `user_id`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'dhimas', '7e1cee418ddd51adbc9e4c272a6ab028'),
(5, 'tama', '407b056f5e6197a948b7f836567fb63d'),
(6, 'dino', 'b246ff693d453c3b1a3049752da2bc75'),
(7, 'dhimas1', '85232afea08837ee24d869782c870e65'),
(8, 'doni', '2da9cd653f63c010b6d6c5a5ad73fe32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`no_pinjaman`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`no_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `no_pinjaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `no_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
