-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 06:54 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listrik3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `noPegawai` int(6) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `noPegawai`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin@email.com', 999991, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(8, 'ilham', 'msf@email.com', 111112, 'bank1', 'a7bbdbdbfa865645a06e58b6a7fa6b53', '2'),
(11, 'inimsf', 'inimsf@gmail.com', 3, 'inimsf', '643a85f5ff587cfc34fc369d7a539b5e', '2');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(2) NOT NULL,
  `bulan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_kwh` int(6) NOT NULL,
  `id_tarif` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama`, `email`, `alamat`, `nomor_kwh`, `id_tarif`) VALUES
(1, 'ilham', 'b63d204bf086017e34d8bd27ab969f28', 'ilham', 'ilham@gmail.com', 'Ds.ehfrhuu', 112233, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(4) NOT NULL,
  `id_tagihan` int(4) NOT NULL,
  `id_pelanggan` int(4) NOT NULL,
  `tanggal_pembayaran` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bulan_bayar` int(2) NOT NULL,
  `tahun_bayar` int(4) NOT NULL,
  `biaya_admin` int(3) NOT NULL,
  `total_bayar` int(10) NOT NULL,
  `id_admin` int(2) NOT NULL,
  `noKk` varchar(12) NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_tagihan`, `id_pelanggan`, `tanggal_pembayaran`, `bulan_bayar`, `tahun_bayar`, `biaya_admin`, `total_bayar`, `id_admin`, `noKk`, `status`) VALUES
(8, 4, 1, '2019-04-06 15:55:51', 12, 2014, 2000, 119360, 9, '214748364741', '2'),
(9, 3, 3, '2019-04-06 15:55:37', 1, 2014, 2000, 204800, 8, '214748364712', '2'),
(10, 10, 5, '2019-04-06 15:55:44', 2, 2017, 2000, 81950, 8, '214748364743', '2'),
(11, 9, 3, '2019-04-06 16:06:31', 2, 2014, 2000, 29040, 8, '214748364712', '2'),
(12, 8, 4, '2019-04-06 16:05:54', 2, 2014, 2000, 242000, 8, '123456789012', '2'),
(13, 18, 4, '2019-04-06 16:18:55', 2, 2014, 2000, 149600, 8, '123456789012', '2'),
(14, 11, 5, '2019-04-06 16:07:05', 1, 2015, 2000, 257840, 8, '545453423641', '2'),
(15, 22, 6, '2019-04-06 16:06:58', 1, 2014, 2000, 343000, 8, '123121414555', '2'),
(16, 23, 6, '2019-04-06 16:07:39', 2, 2014, 2000, 125000, 8, '123121414555', '2'),
(17, 31, 7, '2019-04-06 16:02:01', 12, 2013, 2000, 331070, 0, '967623563542', '1'),
(18, 32, 8, '2019-04-06 16:03:30', 2, 2013, 2000, 193174, 0, '564534654234', '1'),
(19, 5, 1, '2019-11-07 04:25:03', 1, 2015, 2000, 295400, 8, '123456789012', '2'),
(20, 34, 9, '2019-04-08 09:03:15', 1, 2017, 2000, 102000, 10, '111122223333', '2'),
(21, 26, 7, '2019-04-08 12:03:04', 1, 2014, 2000, 649171, 0, '111122223333', '1'),
(22, 38, 1, '2019-11-07 04:25:10', 4, 2023, 2000, 3569744, 8, '234556552432', '2');

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id_penggunaan` int(11) NOT NULL,
  `id_pelanggan` int(50) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `meter` int(50) NOT NULL,
  `event` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penggunaan`
--

INSERT INTO `penggunaan` (`id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `meter`, `event`) VALUES
(3, 1, '1', '2015', 200, '1'),
(4, 1, '5', '2015', 150, '1'),
(5, 1, '2', '2015', 90, '1'),
(11, 1, '12', '2014', 80, '1'),
(12, 3, '1', '2014', 150, '1'),
(13, 1, '1', '2015', 450, '1'),
(14, 4, '2', '2014', 200, '1'),
(15, 3, '2', '2014', 20, '1'),
(16, 5, '2', '2017', 50, '1'),
(17, 5, '1', '2015', 160, '1'),
(18, 5, '2', '2015', 123, '1'),
(19, 5, '3', '2015', 111, '1'),
(20, 3, '3', '2014', 231, '1'),
(21, 3, '5', '2014', 123, '1'),
(22, 3, '8', '2014', 145, '1'),
(23, 4, '2', '2014', 123, '1'),
(24, 4, '3', '2014', 133, '1'),
(25, 4, '4', '2014', 43, '1'),
(26, 4, '7', '2014', 12, '1'),
(29, 6, '2', '2014', 123, '1'),
(30, 6, '1', '2014', 341, '1'),
(31, 6, '3', '2014', 213, '1'),
(32, 6, '4', '2014', 201, '1'),
(33, 7, '1', '2014', 413, '1'),
(34, 7, '2', '2014', 213, '1'),
(35, 7, '3', '2014', 324, '1'),
(36, 8, '1', '2014', 120, '1'),
(37, 8, '2', '2014', 450, '1'),
(38, 7, '12', '2013', 210, '1'),
(39, 8, '2', '2013', 122, '1'),
(40, 8, '5', '2014', 123, '1'),
(41, 9, '1', '2017', 100, '1'),
(42, 1, '9', '2019', 150, '1'),
(43, 2, '3', '2018', 6, '1'),
(45, 1, '4', '2023', 2432, '1'),
(46, 1, '3', '12323', 123, '1');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subjek` varchar(30) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `email`, `subjek`, `pesan`, `status`) VALUES
(4, 'wfsef', 'sefs@gmail.com', 'sefs', 'efesfsefs', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_penggunaan` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` int(50) NOT NULL,
  `meter` int(50) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_pelanggan`, `id_penggunaan`, `bulan`, `tahun`, `meter`, `status`) VALUES
(35, 2, 43, '3', 2018, 6, '0'),
(36, 1, 42, '9', 2019, 150, '0'),
(37, 1, 46, '3', 12323, 123, '0'),
(38, 1, 45, '4', 2023, 2432, '2');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `daya` int(50) NOT NULL,
  `tarifperkwh` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `daya`, `tarifperkwh`) VALUES
(1, 450, 1000),
(2, 750, 1200),
(3, 900, 1352),
(4, 2200, 1467),
(5, 4400, 1567),
(6, 6600, 1599);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_tarif` (`id_tarif`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_tagihan` (`id_tagihan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_penggunaan` (`id_penggunaan`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bulan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `penggunaan`
--
ALTER TABLE `penggunaan`
  MODIFY `id_penggunaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
