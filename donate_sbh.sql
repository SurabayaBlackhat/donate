-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 28, 2015 at 08:43 PM
-- Server version: 5.5.44-MariaDB-1~trusty-log
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `donate_sbh`
--

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `atas_nama_konfirmasi` varchar(100) NOT NULL,
  `no_rekening_konfirmasi` varchar(100) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `berita_rekening` text,
  `status` enum('VALID','INVALID') DEFAULT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `ke_rekening` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_user`, `atas_nama_konfirmasi`, `no_rekening_konfirmasi`, `jumlah`, `berita_rekening`, `status`, `tanggal_waktu`, `ke_rekening`, `hash`) VALUES
(1, 1, 'CAHYADI TRIYANSAH', '12345678', '10000', 'nothing else', 'VALID', '2015-07-27 05:13:13', 2, '3861492746257d2d67ab46ba9ad765982249eef9'),
(2, 2, 'SIAPA SAYA', '334342432432', '44334234', 'sdadsasdadsa', NULL, '2015-07-26 16:49:07', 1, '6bdf853170df60ecd4d8f2781b92da152d0f2a7c');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_gambar`
--

CREATE TABLE IF NOT EXISTS `konfirmasi_gambar` (
  `id_konfirmasi_gambar` int(11) NOT NULL,
  `id_konfirmasi_relation` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE IF NOT EXISTS `rekening` (
  `id_rekening` int(11) NOT NULL,
  `atas_nama_rekening` varchar(100) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `atas_nama_rekening`, `no_rekening`, `bank`) VALUES
(1, 'Andik Noeviyanto', '?', '?'),
(2, 'CAHYADI TRIYANSAH', '4564924603', 'BCA'),
(3, 'CAHYADI TRIYANSAH', '6618-01-015413-53-2', 'BRI');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('89da03418acb5d98e61e59d2aa2d1edc266dc3e1', '127.0.0.1', 1438013558, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433383031333534353b69645f757365727c733a313a2231223b757365726e616d657c733a31333a2253756e44693379616e73796168223b726f6c657c733a313a2231223b),
('9d1cebeda9868802127e2ef4ecffb09b82c19011', '127.0.0.1', 1438090925, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433383039303932323b69645f757365727c733a313a2231223b757365726e616d657c733a31333a2253756e44693379616e73796168223b726f6c657c733a313a2231223b);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `verifikasi_email` enum('0','1') NOT NULL DEFAULT '0',
  `code_verifikasi` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama_user`, `role`, `verifikasi_email`, `code_verifikasi`) VALUES
(1, 'SunDi3yansyah', '3cce714f8dcb7680922b275752311f8bac178639', 'sundi3yansyah@gmail.com', 'Cahyadi Triyansyah', 1, '1', ''),
(2, 'demo', '3cce714f8dcb7680922b275752311f8bac178639', 'sundi3yansyah@gmail.com', 'demo user', 2, '1', ''),
(3, 'demos', '3cce714f8dcb7680922b275752311f8bac178639', 'sundi3yansssyah@gmail.com', 'demo user', 2, '0', '08403b62d2c24f62f5ba8f5dc9652fc4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`), ADD KEY `id_user` (`id_user`), ADD KEY `ke_rekening` (`ke_rekening`), ADD KEY `ke_rekening_2` (`ke_rekening`);

--
-- Indexes for table `konfirmasi_gambar`
--
ALTER TABLE `konfirmasi_gambar`
  ADD PRIMARY KEY (`id_konfirmasi_gambar`), ADD KEY `id_konfirmasi` (`id_konfirmasi_relation`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`), ADD KEY `session_timestamp` (`timestamp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `username` (`username`), ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `konfirmasi_gambar`
--
ALTER TABLE `konfirmasi_gambar`
  MODIFY `id_konfirmasi_gambar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
ADD CONSTRAINT `konfirmasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
ADD CONSTRAINT `konfirmasi_ibfk_2` FOREIGN KEY (`ke_rekening`) REFERENCES `rekening` (`id_rekening`);

--
-- Constraints for table `konfirmasi_gambar`
--
ALTER TABLE `konfirmasi_gambar`
ADD CONSTRAINT `konfirmasi_gambar_ibfk_1` FOREIGN KEY (`id_konfirmasi_relation`) REFERENCES `konfirmasi` (`id_konfirmasi`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
