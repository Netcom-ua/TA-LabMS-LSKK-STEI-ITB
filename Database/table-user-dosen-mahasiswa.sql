-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2014 at 12:05 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `db_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE IF NOT EXISTS `tb_dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` char(10) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id`, `nip`, `nama_dosen`, `hp`, `jabatan`, `username`, `email`, `password`, `foto`, `status`, `tgl_daftar`) VALUES
(4, '1234567', 'Syarif', '085795297327', 'Kepala MIC', 'syarif', 'syarif@gmail.com', '8daa2f003d41f1ea865c1503b3d99d3d', '', 'aktif', '2014-07-24 11:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `tb_mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` char(10) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `nim` (`nim`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nim`, `nama_mhs`, `prodi`, `semester`, `hp`, `username`, `email`, `password`, `foto`, `status`, `tgl_daftar`) VALUES
(6, '03213008', 'Bastoni Yahya', 'Teknik Komputer Jaringan dan Media Digital', '8', '085365048772', 'bastoni', 'bastoni@gmail.com', '519c604b72c0e0dc65952b92d2fab661', 'BastoniYahya.jpg', 'aktif', '2014-08-18 11:34:30'),
(9, '03213038', 'Mentari', 'teknik komputer jaringan dan media digital', '8', '089628624976', 'mentari', 'mentaritumpil67@gmail.com', '5e1ddfa79b7f16f76b12e13a68e57f62', 'Mentari.jpg', 'aktif', '2014-08-18 12:43:16'),
(10, '03213034', 'sinta', 'Teknik Komputer Jaringan dan Media Digital', '8', '085795297327', 'sinta', 'sinta@gmail.com', '08ca451b5ef1a7c86763d31e7711a522', 'Mentari.jpg', 'aktif', '2014-08-19 12:15:45'),
(11, '55555555', 'eko', 'Teknik Komputer Jaringan dan Media Digital', '8', '085795297327', 'eko', 'eko@localhost.com', 'e5ea9b6d71086dfef3a15f726abcc5bf', 'Mentari.jpg', 'nonaktif', '2014-08-21 10:42:17'),
(41, '03213039', 'Mhd. Syarif', 'Teknik Komputer Jaringan dan Media Digital', '8', '085795297327', 'mhdsyarif', 'mhdsyarif.ms@gmail.com', '8daa2f003d41f1ea865c1503b3d99d3d', 'MhdSyarif.jpg', 'aktif', '2014-08-22 09:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staf`
--

CREATE TABLE IF NOT EXISTS `tb_staf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip_staf` char(10) NOT NULL,
  `nama_staf` varchar(100) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_staf`
--

INSERT INTO `tb_staf` (`id`, `nip_staf`, `nama_staf`, `hp`, `jabatan`, `username`, `email`, `password`, `foto`, `status`, `tgl_daftar`) VALUES
(5, '12345', 'Tata Usaha', '085365048772', 'tu', 'tatausaha', 'staf@lms.co.id', '82849c85acf1f4e6e4eec748f0aeddf4', 'Mentari.jpg', 'aktif', '2014-07-26 11:49:45'),
(6, '124535', 'Teknisi', '085795297327', 'teknisi', 'teknisi', 'titi@gmail.com', 'e21394aaeee10f917f581054d24b031f', 'Mentari.jpg', 'aktif', '2014-08-22 10:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengenal` char(10) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `id_pengenal`, `nama_user`, `hp`, `email`, `username`, `password`, `foto`, `level`, `status`, `tgl_daftar`) VALUES
(1, '111111', 'Admin', '085365048772', 'admin@lms.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'avatar.png', 'admin', 'aktif', '2014-08-18 07:17:58'),
(2, '222222', 'Kordas', '085365048772', 'kordas@localhost.com', 'kordas', 'd0ddbfa3c7d08c18868a22e29705d4fd', 'avatar.png', 'kordas', 'aktif', '2014-08-18 07:57:51'),
(15, '99999', 'Asisten', '089628624976', 'asisten@localhost.com', 'asisten', 'bf3fd5c967c0fb904bf15c054e4288dd', 'avatar.png', 'asisten', 'aktif', '2014-08-19 13:34:53'),
(17, '567322', 'Kepala Lab', '085795297327', 'lms.stei@gmail.com', 'kalab', '966676a567d83cf0fbeb8cd5c280a589', 'avatar.png', 'kalab', 'aktif', '2014-08-24 19:52:56');
