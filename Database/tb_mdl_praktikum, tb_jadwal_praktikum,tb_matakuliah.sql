-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2014 at 09:08 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `db_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_praktikum`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal_praktikum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_mk` varchar(10) NOT NULL,
  `kd_modul` varchar(10) NOT NULL,
  `nim` char(10) NOT NULL,
  `id_asisten` char(10) NOT NULL,
  `group` int(3) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `ruangan` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `tb_jadwal_praktikum`
--

INSERT INTO `tb_jadwal_praktikum` (`id`, `kd_mk`, `kd_modul`, `nim`, `id_asisten`, `group`, `tanggal`, `waktu`, `ruangan`) VALUES
(102, 'EL2101', 'EL2101-1', '03213008', '99999', 3, '28 Agustus 2014', '08:00 - 11:00 WIB', 'Lab Elektro A01'),
(101, 'EL2101', 'EL2101-1', '03213038', '99999', 2, '26 Agustus 2014', '13:00 - 16:00 WIB', 'Lab Elektro A02'),
(100, 'EL2101', 'EL2101-1', '03213039', '99999', 1, '26 Agustus 2014', '08:00 - 11:00 WIB', 'Lab Elektro A01'),
(103, 'EL2101', 'EL2101-1', '03213002', '99999', 3, '29 Agustus 2014', '08:00 - 11:00 WIB', 'Lab Elektro A02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matakuliah`
--

CREATE TABLE IF NOT EXISTS `tb_matakuliah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `semester` varchar(2) NOT NULL,
  `akademik` varchar(10) NOT NULL,
  `nip_dosen` char(15) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kd_practicum` (`kd_mk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_matakuliah`
--

INSERT INTO `tb_matakuliah` (`id`, `kd_mk`, `nama_mk`, `deskripsi`, `semester`, `akademik`, `nip_dosen`, `tgl_daftar`) VALUES
(1, 'EL2101', 'Praktikum Rangkaian Elektrik', 'EL2101 Praktikum Rangkaian Elektrik', 'I', '2014/2015', '1234567', '2014-08-23 11:16:46'),
(2, 'EL2102', 'Praktikum Sistem Digital', 'EL2101 Praktikum Rangkaian Elektrik', 'I', '2014/2015', '1234567', '2014-08-23 11:28:22'),
(3, 'EL2142', 'Praktikum Sistem Digital dan Mikroprosesor', 'EL2142 Praktikum Sistem Digital dan Mikroprosesor', 'I', '2014/2015', '1234567', '2014-08-23 11:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mdl_praktikum`
--

CREATE TABLE IF NOT EXISTS `tb_mdl_praktikum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_mk` varchar(10) NOT NULL,
  `kd_modul` varchar(10) NOT NULL,
  `nm_modul` varchar(100) NOT NULL,
  `singkatan` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kordas` char(10) NOT NULL,
  `toleransi` int(11) NOT NULL,
  `bobot` int(2) NOT NULL,
  `mak_praktikum` int(3) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_mdl_praktikum`
--

INSERT INTO `tb_mdl_praktikum` (`id`, `kd_mk`, `kd_modul`, `nm_modul`, `singkatan`, `deskripsi`, `id_kordas`, `toleransi`, `bobot`, `mak_praktikum`, `tgl_daftar`) VALUES
(1, 'EL2101', 'EL2101-1', 'Modul EL2101 Praktikum Rangkaian Elektrik (2013)', 'PRE', 'Modul EL2101 Praktikum Rangkaian Elektrik (2013)', '222222', 2, 40, 20, '2014-08-26 12:00:27');
