-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2017 at 03:59 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal212`
--

-- --------------------------------------------------------

--
-- Table structure for table `f_admin`
--

CREATE TABLE `f_admin` (
  `fa_user` varchar(15) NOT NULL COMMENT 'Username',
  `fa_pass` varchar(32) NOT NULL COMMENT 'Password',
  `fa_pin` int(4) NOT NULL DEFAULT '1234' COMMENT 'PIN Admin',
  `fa_nama` varchar(35) NOT NULL COMMENT 'Nama Admin',
  `fa_level` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Superadmin / Admin',
  `fa_status` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Tidak Aktif / Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_admin`
--

INSERT INTO `f_admin` (`fa_user`, `fa_pass`, `fa_pin`, `fa_nama`, `fa_level`, `fa_status`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1234, 'Bambang Tri', '1', '1'),
('aktif', '6d44126fb27ccf225596e792d036664b', 1234, 'Jaenudin Jae', '1', '0'),
('super', '1b3231655cebb7a1f783eddf27d254ca', 4321, 'Udin Dwi', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `f_batal`
--

CREATE TABLE `f_batal` (
  `fb_id` int(3) NOT NULL,
  `fb_ds` int(7) NOT NULL COMMENT 'Id Detail Sewa',
  `fb_tanggal` date NOT NULL COMMENT 'Tanggal Pembatalan',
  `fb_admin` varchar(35) NOT NULL COMMENT 'Nama Admin',
  `fb_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `f_diskon`
--

CREATE TABLE `f_diskon` (
  `fd_id` int(6) NOT NULL,
  `fd_ds` int(7) NOT NULL COMMENT 'Id Detail Sewa',
  `fd_nama` varchar(30) NOT NULL COMMENT 'Member / Pelajar / Nama Diskon Lain',
  `fd_jumlah` int(5) NOT NULL COMMENT 'Nominal Diskon'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `f_dtlinvoice`
--

CREATE TABLE `f_dtlinvoice` (
  `fdi_id` int(4) NOT NULL,
  `fdi_inv` int(3) NOT NULL COMMENT 'Id Invoice',
  `fdi_sewa` int(6) NOT NULL COMMENT 'Id Sewa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `f_dtlsewa`
--

CREATE TABLE `f_dtlsewa` (
  `fds_id` int(7) NOT NULL,
  `fds_sewa` int(6) NOT NULL COMMENT 'Id Sewa',
  `fds_lapang` int(1) NOT NULL COMMENT 'No Lapang',
  `fds_jam` int(2) NOT NULL COMMENT 'Jam Main',
  `fds_lama` int(2) NOT NULL COMMENT 'Lama Sewa',
  `fds_harga` int(5) NOT NULL COMMENT 'Harga Per Jam',
  `fds_total` int(6) NOT NULL COMMENT 'Harga Sewa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `f_invoice`
--

CREATE TABLE `f_invoice` (
  `fi_id` int(3) NOT NULL,
  `fi_kode` varchar(10) NOT NULL COMMENT 'Kode Yang Akan Dicetak',
  `fi_buat` date NOT NULL COMMENT 'Tanggal Buat',
  `fi_bayar` date NOT NULL COMMENT 'Tanggal Bayar',
  `fi_jumlah` int(7) NOT NULL COMMENT 'Nominal Bayar',
  `fi_metode` enum('0','1') NOT NULL COMMENT 'Cash / Transfer',
  `fi_status` enum('0','1','2') NOT NULL COMMENT 'DP / Pelunasan / Bayar Lunas'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `f_logmember`
--

CREATE TABLE `f_logmember` (
  `fl_id` int(4) NOT NULL,
  `fl_member` int(3) NOT NULL COMMENT 'Id Member',
  `fl_tanggal` date NOT NULL,
  `fl_aktifitas` enum('0','1','2','3','4') NOT NULL COMMENT 'Daftar / Perpanjang / Blacklist / Aktifasi / Edit Data',
  `fl_admin` varchar(35) NOT NULL COMMENT 'Nama Admin',
  `fl_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `f_member`
--

CREATE TABLE `f_member` (
  `fm_id` int(3) NOT NULL,
  `fm_kode` varchar(8) NOT NULL COMMENT 'Id Kartu',
  `fm_nama` varchar(35) NOT NULL,
  `fm_jenis` enum('0','1') NOT NULL COMMENT 'Umum / Pelajar',
  `fm_buat` date NOT NULL COMMENT 'Tanggal Buat',
  `fm_kadaluarsa` date NOT NULL COMMENT 'Tangal Kadaluarsa',
  `fm_penanggung` varchar(35) NOT NULL COMMENT 'Penanggung Jawab',
  `fm_alamat` text NOT NULL,
  `fm_telepon` varchar(30) NOT NULL,
  `fm_email` varchar(30) NOT NULL,
  `fm_status` enum('0','1','2') NOT NULL COMMENT 'Kadalursa / Blacklist / Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `f_pembayaran`
--

CREATE TABLE `f_pembayaran` (
  `fp_id` int(7) NOT NULL,
  `fp_sewa` int(6) NOT NULL COMMENT 'Id Sewa',
  `fp_kode` varchar(9) NOT NULL COMMENT 'Kode Yang Akan Dicetak',
  `fp_tanggal` date NOT NULL,
  `fp_jumlah` int(11) NOT NULL,
  `fp_metode` enum('0','1') NOT NULL COMMENT 'Cash / Transfer',
  `fp_status` enum('0','1','2') NOT NULL COMMENT 'DP / Pelunasan / Bayar Lunas',
  `fp_admin` varchar(35) NOT NULL COMMENT 'Nama Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `f_pindah`
--

CREATE TABLE `f_pindah` (
  `fpd_id` int(3) NOT NULL,
  `fpd_ds` int(7) NOT NULL COMMENT 'Id Detail Sewa',
  `fpd_pindah` enum('0','1') NOT NULL COMMENT 'Lapang / Jadwal',
  `fpd_awal` int(2) NOT NULL,
  `fpd_akhir` int(2) NOT NULL,
  `fpd_tanggal` date NOT NULL COMMENT 'Tanggal Pengajuan',
  `fpd_admin` varchar(35) NOT NULL COMMENT 'Nama Admin',
  `fpd_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `f_pricelist`
--

CREATE TABLE `f_pricelist` (
  `fpl_hari` int(1) NOT NULL,
  `fpl_jam` int(2) NOT NULL,
  `fpl_harga` int(5) NOT NULL DEFAULT '100000',
  `fpl_dispel` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Tidak Aktif / Aktif',
  `fpl_dismem` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Tidak Aktif / Aktif',
  `fpl_status` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Tidak Aktif / Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_pricelist`
--

INSERT INTO `f_pricelist` (`fpl_hari`, `fpl_jam`, `fpl_harga`, `fpl_dispel`, `fpl_dismem`, `fpl_status`) VALUES
(1, 8, 100000, '0', '0', '1'),
(1, 9, 100000, '0', '0', '1'),
(1, 10, 100000, '0', '0', '1'),
(1, 11, 100000, '0', '0', '1'),
(1, 12, 100000, '0', '0', '1'),
(1, 13, 100000, '0', '0', '1'),
(1, 14, 100000, '0', '0', '1'),
(1, 15, 100000, '0', '0', '1'),
(1, 16, 100000, '0', '0', '1'),
(1, 17, 100000, '0', '0', '1'),
(1, 18, 100000, '0', '0', '1'),
(1, 19, 100000, '0', '0', '1'),
(1, 20, 100000, '0', '0', '1'),
(1, 21, 100000, '0', '0', '1'),
(1, 22, 100000, '0', '0', '1'),
(1, 23, 100000, '0', '0', '1'),
(2, 8, 100000, '0', '0', '1'),
(2, 9, 100000, '0', '0', '1'),
(2, 10, 100000, '0', '0', '1'),
(2, 11, 100000, '0', '0', '1'),
(2, 12, 100000, '0', '0', '1'),
(2, 13, 100000, '0', '0', '1'),
(2, 14, 100000, '0', '0', '1'),
(2, 15, 100000, '0', '0', '1'),
(2, 16, 100000, '0', '0', '1'),
(2, 17, 100000, '0', '0', '1'),
(2, 18, 100000, '0', '0', '1'),
(2, 19, 100000, '0', '0', '1'),
(2, 20, 100000, '0', '0', '1'),
(2, 21, 100000, '0', '0', '1'),
(2, 22, 100000, '0', '0', '1'),
(2, 23, 100000, '0', '0', '1'),
(3, 8, 100000, '0', '0', '1'),
(3, 9, 100000, '0', '0', '1'),
(3, 10, 100000, '0', '0', '1'),
(3, 11, 100000, '0', '0', '1'),
(3, 12, 100000, '0', '0', '1'),
(3, 13, 100000, '0', '0', '1'),
(3, 14, 100000, '0', '0', '1'),
(3, 15, 100000, '0', '0', '1'),
(3, 16, 100000, '0', '0', '1'),
(3, 17, 100000, '0', '0', '1'),
(3, 18, 100000, '0', '0', '1'),
(3, 19, 100000, '0', '0', '1'),
(3, 20, 100000, '0', '0', '1'),
(3, 21, 100000, '0', '0', '1'),
(3, 22, 100000, '0', '0', '1'),
(3, 23, 100000, '0', '0', '1'),
(4, 8, 100000, '0', '0', '1'),
(4, 9, 100000, '0', '0', '1'),
(4, 10, 100000, '0', '0', '1'),
(4, 11, 100000, '0', '0', '1'),
(4, 12, 100000, '0', '0', '1'),
(4, 13, 100000, '0', '0', '1'),
(4, 14, 100000, '0', '0', '1'),
(4, 15, 100000, '0', '0', '1'),
(4, 16, 100000, '0', '0', '1'),
(4, 17, 100000, '0', '0', '1'),
(4, 18, 100000, '0', '0', '1'),
(4, 19, 100000, '0', '0', '1'),
(4, 20, 100000, '0', '0', '1'),
(4, 21, 100000, '0', '0', '1'),
(4, 22, 100000, '0', '0', '1'),
(4, 23, 100000, '0', '0', '1'),
(5, 8, 100000, '0', '0', '1'),
(5, 9, 100000, '0', '0', '1'),
(5, 10, 100000, '0', '0', '1'),
(5, 11, 100000, '0', '0', '1'),
(5, 12, 100000, '0', '0', '1'),
(5, 13, 100000, '0', '0', '1'),
(5, 14, 100000, '0', '0', '1'),
(5, 15, 100000, '0', '0', '1'),
(5, 16, 100000, '0', '0', '1'),
(5, 17, 100000, '0', '0', '1'),
(5, 18, 100000, '0', '0', '1'),
(5, 19, 100000, '0', '0', '1'),
(5, 20, 100000, '0', '0', '1'),
(5, 21, 100000, '0', '0', '1'),
(5, 22, 100000, '0', '0', '1'),
(5, 23, 100000, '0', '0', '1'),
(6, 8, 100000, '0', '0', '1'),
(6, 9, 100000, '0', '0', '1'),
(6, 10, 100000, '0', '0', '1'),
(6, 11, 100000, '0', '0', '1'),
(6, 12, 100000, '0', '0', '1'),
(6, 13, 100000, '0', '0', '1'),
(6, 14, 100000, '0', '0', '1'),
(6, 15, 100000, '0', '0', '1'),
(6, 16, 100000, '0', '0', '1'),
(6, 17, 100000, '0', '0', '1'),
(6, 18, 100000, '0', '0', '1'),
(6, 19, 100000, '0', '0', '1'),
(6, 20, 100000, '0', '0', '1'),
(6, 21, 100000, '0', '0', '1'),
(6, 22, 100000, '0', '0', '1'),
(6, 23, 100000, '0', '0', '1'),
(7, 8, 100000, '0', '0', '1'),
(7, 9, 100000, '0', '0', '1'),
(7, 10, 100000, '0', '0', '1'),
(7, 11, 100000, '0', '0', '1'),
(7, 12, 100000, '0', '0', '1'),
(7, 13, 100000, '0', '0', '1'),
(7, 14, 100000, '0', '0', '1'),
(7, 15, 100000, '0', '0', '1'),
(7, 16, 100000, '0', '0', '1'),
(7, 17, 100000, '0', '0', '1'),
(7, 18, 100000, '0', '0', '1'),
(7, 19, 100000, '0', '0', '1'),
(7, 20, 100000, '0', '0', '1'),
(7, 21, 100000, '0', '0', '1'),
(7, 22, 100000, '0', '0', '1'),
(7, 23, 100000, '0', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `f_sewa`
--

CREATE TABLE `f_sewa` (
  `fs_id` int(6) NOT NULL,
  `fs_nama` varchar(15) NOT NULL COMMENT 'Nama Penyewa',
  `fs_member` varchar(3) NOT NULL COMMENT 'Y(idmember) / N',
  `fs_reservasi` date NOT NULL COMMENT 'Tanggal Reservasi',
  `fs_admin` varchar(35) NOT NULL COMMENT 'Nama Admin',
  `fs_tanggal` date NOT NULL COMMENT 'Tanggal Main',
  `fs_sewa` int(2) NOT NULL COMMENT 'Lama Sewa (jam)',
  `fs_harga` int(7) NOT NULL COMMENT 'Harga Sewa',
  `fs_diskon` int(6) NOT NULL COMMENT 'Diskon Sewa',
  `fs_total` int(7) NOT NULL COMMENT 'Total Harga',
  `fs_bayar` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Pasca / Pra',
  `fs_ket` text NOT NULL,
  `fs_komen` text NOT NULL COMMENT 'Pindah Jadwal / Lapang (tidak dapat dihapus)',
  `fs_status` enum('0','1','2') NOT NULL COMMENT 'Belum Lunas / Lunas / Batal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_sewa`
--

INSERT INTO `f_sewa` (`fs_id`, `fs_nama`, `fs_member`, `fs_reservasi`, `fs_admin`, `fs_tanggal`, `fs_sewa`, `fs_harga`, `fs_diskon`, `fs_total`, `fs_bayar`, `fs_ket`, `fs_komen`, `fs_status`) VALUES
(1, 'Arif', 'N', '2017-10-03', 'Bambang', '2017-10-09', 1, 100000, 0, 100000, '1', '', '', '1'),
(2, 'Usman', 'N', '2017-10-05', 'Dwi', '2017-10-09', 2, 200000, 20000, 180000, '1', '', '', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `f_admin`
--
ALTER TABLE `f_admin`
  ADD PRIMARY KEY (`fa_user`);

--
-- Indexes for table `f_batal`
--
ALTER TABLE `f_batal`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `f_diskon`
--
ALTER TABLE `f_diskon`
  ADD PRIMARY KEY (`fd_id`);

--
-- Indexes for table `f_dtlinvoice`
--
ALTER TABLE `f_dtlinvoice`
  ADD PRIMARY KEY (`fdi_id`);

--
-- Indexes for table `f_dtlsewa`
--
ALTER TABLE `f_dtlsewa`
  ADD PRIMARY KEY (`fds_id`);

--
-- Indexes for table `f_invoice`
--
ALTER TABLE `f_invoice`
  ADD PRIMARY KEY (`fi_id`);

--
-- Indexes for table `f_logmember`
--
ALTER TABLE `f_logmember`
  ADD PRIMARY KEY (`fl_id`);

--
-- Indexes for table `f_member`
--
ALTER TABLE `f_member`
  ADD PRIMARY KEY (`fm_id`);

--
-- Indexes for table `f_pembayaran`
--
ALTER TABLE `f_pembayaran`
  ADD PRIMARY KEY (`fp_id`);

--
-- Indexes for table `f_pindah`
--
ALTER TABLE `f_pindah`
  ADD PRIMARY KEY (`fpd_id`);

--
-- Indexes for table `f_pricelist`
--
ALTER TABLE `f_pricelist`
  ADD PRIMARY KEY (`fpl_hari`,`fpl_jam`);

--
-- Indexes for table `f_sewa`
--
ALTER TABLE `f_sewa`
  ADD PRIMARY KEY (`fs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `f_batal`
--
ALTER TABLE `f_batal`
  MODIFY `fb_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_diskon`
--
ALTER TABLE `f_diskon`
  MODIFY `fd_id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_dtlinvoice`
--
ALTER TABLE `f_dtlinvoice`
  MODIFY `fdi_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_dtlsewa`
--
ALTER TABLE `f_dtlsewa`
  MODIFY `fds_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_invoice`
--
ALTER TABLE `f_invoice`
  MODIFY `fi_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_logmember`
--
ALTER TABLE `f_logmember`
  MODIFY `fl_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_member`
--
ALTER TABLE `f_member`
  MODIFY `fm_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_pembayaran`
--
ALTER TABLE `f_pembayaran`
  MODIFY `fp_id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_pindah`
--
ALTER TABLE `f_pindah`
  MODIFY `fpd_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `f_sewa`
--
ALTER TABLE `f_sewa`
  MODIFY `fs_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
