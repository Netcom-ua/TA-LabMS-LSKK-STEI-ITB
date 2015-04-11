-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 15. Juli 2014 jam 09:47
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
-- Struktur dari tabel `tb_mdl_labname`
--

CREATE TABLE IF NOT EXISTS `tb_mdl_labname` (
  `id` int(11) NOT NULL,
  `nama_lab` varchar(200) NOT NULL,
  `info_lab` text NOT NULL,
  `info_praktikum` text NOT NULL,
  `info_panduan` text NOT NULL,
  `info_kontak` text NOT NULL,
  `universitas` varchar(200) NOT NULL,
  `nama_lab_full` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mdl_labname`
--

INSERT INTO `tb_mdl_labname` (`id`, `nama_lab`, `info_lab`, `info_praktikum`, `info_panduan`, `info_kontak`, `universitas`, `nama_lab_full`) VALUES
(1, 'Labdas', '																																																	<p style="text-align: justify;">\r\n	Web ini merupakan media yang diguakan oleh Laboratorium Dasar Teknik Elektro, Sekolah Teknik Elektro dan Informatikan, Institut Teknologi Bandung, untuk memberikan informasi seputar praktikum yang sedang dilaksanakan selama semester berlangsung dan.</p>\r\n<p style="text-align: justify;">\r\n	"Semoga semua usaha yang telah dilakkan Laboratorium Dasar Teknik Elektro berkontribusi pada dihasilkannya lulusan program Teknik Elektro sebagai engineer dengan standar internasional. </p>\r\n																																									', '<p>\r\n	This is a info of praktikum in Bandung Institut of Technology.</p>\r\n', '					<p style="text-align: justify;">\r\n	<strong>1. Pengumpulan Laporan dan BCL</strong></p>\r\n<p style="text-align: justify;">\r\n	Mengirimkan file laporan melalui surat elektronik (E-mail) dalam lampiran ke : labdasar@ee.itb.ac.id dengan format sebagai berikut :</p>\r\n<p style="text-align: justify;">\r\n	Nama File Laporan : [modul ke] _ [NIM]</p>\r\n<p style="text-align: justify;">\r\n	Subject : Laporan Praktikum [kode mata kuliah] _ [modul ke] _ [Nama Asisten]</p>\r\n<p style="text-align: justify;">\r\n	Isi : Dikirimkan dalam bentuk attachment dalam bentuk .doc , .pdf atau .docx</p>\r\n<p style="text-align: justify;">\r\n	Waktu pengiriman paling lambat jam 12.00 wib, dua hari kerja berikutnya setelah praktikum, kecuali ada kesepakatan lain dengan dosen pengajar, pengiriman laporan yang tidak sesuai format yang telah ditentukan tidak akan diproses.</p>\r\n<p style="text-align: justify;">\r\n	<strong>2. Sanksi</strong></p>\r\n<p style="text-align: justify;">\r\n	Bagi praktikan  yang telah melanggar ketentuan-ketentuan yang ada, akan dikenakan sanksi sesuai dengan daftar sanksi yang terdapat pada tabel sanksi praktikum laboratorium dasar teknik elektro.</p>\r\n				', '<p>\r\n	<strong><span class="style12">Laboratorium Dasar Teknik Elektro</span></strong><br />\r\n	<br style="line-height:6px" />\r\n	Jl. Ganeca No.10-12 Gedung Achmad Bakrie<br />\r\n	Labtek VIII STEI Lantai 3, Bandung - 40132<br />\r\n	IP Phone: 50027 <br />\r\n	E-mail: <a href="mailto:labdasar@stei.itb.ac.id" target="_blank">labdasar@stei.itb.ac.id</a></p>\r\n<p>\r\n	<span class="style19"><strong>Ketua Lab. Dasar:</strong></span><br />\r\n	<a class="style26" href="http://labdasar.ee.itb.ac.id/images/dosen/Dosen-P%27Mervin.gif" target="_blank">Dr. Ir. Mervin T Hutabarat, M.Sc., Ph.D.</a><br />\r\n	Telephone:&nbsp;+62 855 210 7733 <br />\r\n	E-mail: <a href="mailto:m.hutabarat@ieee.org" target="_blank">m.hutabarat@ieee.org</a><br />\r\n	YM: <a href="ymsgr:SendIM?mhutabar" target="_self">mhutabar </a></p>\r\n<p>\r\n	<strong><span class="style40">Kordas-EL2195 </span> <a class="style22" href="http://labdasar.ee.itb.ac.id/images/kordas/kordas-harry.gif" target="_blank">Harry Septanto</a></strong><br />\r\n	Telephone:&nbsp;+62 856 1135 926 <br />\r\n	E-mail: <a href="mailto:hseptanto@gmail.com" target="_blank">hseptanto@gmail.com<br />\r\n	</a>YM: <a href="ymsgr:SendIM?jackstarhs" target="_self">jackstarhs</a></p>\r\n<p>\r\n	<strong><span class="style33">Kordas-EL3192</span></strong><strong><a class="style22" href="http://www.facebook.com/#%21/erwin.cahyadi1" target="_self"> Erwin Cahyadi </a></strong><br />\r\n	Telephone:&nbsp;+62 81 8022 33 117 <br />\r\n	E-mail: <a href="mailto:erwin@dsp.itb.ac.id" target="_blank">erwin@dsp.itb.ac.id</a><br />\r\n	YM: <a href="ymsgr:SendIM?erwin_132" target="_self">erwin_132</a></p>\r\n', 'Sekolah Teknik Elektro dan Informatika - ITB', 'Laboratorium Dasar Teknik Elektro');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
