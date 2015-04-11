-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 03. September 2014 jam 14:29
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_lms`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjam`
--

CREATE TABLE IF NOT EXISTS `tb_pinjam` (
  `id_pinjam` int(5) NOT NULL AUTO_INCREMENT,
  `nim` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kode_alat` varchar(50) NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `nim`, `nama`, `email`, `kode_alat`, `nama_alat`, `tgl_pinjam`, `tgl_kembali`, `status`, `jumlah`, `penanggung_jawab`) VALUES
(1, '03213008', 'Bastoni Yahya', 'bastoniyahya@gmail.com', '01.01.1111.00.00.00.00.000.0001', 'Keping DVR-R', '2014-08-13', '0000-00-00', '', '', '0â€³ selected='),
(2, '03213008', 'Bastoni Yahya', 'bastoniyahya@gmail.com', '01.01.1111.00.00.00.00.000.0001', 'Keping DVR-R', '2014-08-13', '0000-00-00', '', '', '0â€³ selected='),
(3, '03213008', 'Bastoni Yahya', 'bastoniyahya@gmail.com', '01.01.1111.00.00.00.00.000.0001', 'Keping DVR-R', '2014-08-13', '0000-00-00', '', '', '0â€³ selected='),
(4, '03213008', 'Bastoni Yahya', 'bastoniyahya@gmail.com', '01.01.1111.00.00.00.00.000.0001', 'Keping DVR-R', '2014-08-13', '2014-08-20', '', '', '0â€³ selected='),
(5, '03213008', 'Bastoni Yahya', 'bastoniyahya@gmail.com', '01.01.2001.00.01.01.00.000.0001', 'Lemari Besi', '2014-08-13', '2014-08-21', '', '', '0â€³ selected='),
(6, '03213008', 'Bastoni Yahya', 'bastoniyahya@gmail.com', '01.01.2001.00.01.01.00.000.0001', 'Lemari Besi', '2014-08-14', '2014-08-21', '', '', '0â€³ selected='),
(7, '', '', '', '', '', '2014-08-08', '2014-08-18', 'Belum Disetujui', '', ''),
(8, '', '', '', '', '', '2014-08-08', '2014-08-18', 'Belum Disetujui', '', ''),
(9, '03213038', 'Mentari', 'mentaritumpil67@gmail.com', '01.01.1111.00.00.00.00.000.0001', 'Keping DVR-R', '2014-08-08', '2014-08-18', 'Belum Disetujui', '', ''),
(10, '03213038', 'Mentari', 'mentaritumpil67@gmail.com', '01.01.2222.00.00.00.00.000.0001', 'Kertas A4 80 gr', '2014-08-08', '2014-08-18', 'Belum Disetujui', '', ''),
(11, '03213039', 'Mhd. Syarif', 'mhdsyarif.ms@gmail.com', '12345', 'Gelas Cantik', '2014-09-03', '2014-08-18', 'Belum Disetujui', '', ''),
(12, '03213038', 'Mentari', 'mentaritumpil67@gmail.com', '123453', 'aaaa', '2014-08-29', '2014-08-18', 'Belum Disetujui', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
