<?php

include('../include/koneksi.php');
//tangkap data dari form registrasi
$username			= $_POST['username'];
$nama			= $_POST['nama'];
$email			= $_POST['email'];
$kode_alat			= $_POST['kode_alat'];
$nama_alat			= $_POST['nama_alat'];
$tgl_p 	= $_POST['tgl_pinjam'];
$tgl_k 	= $_POST['tgl_kembali'];
$status 	= 'Sudah Dikembalikan';
$stok 	= 'Tersedia';
$dosen_pj 	= $_POST['penanggung_jawab'];

mysql_query("insert into tb_pengembalian_atk values('','$nama','$username','$email','$kode_alat','$nama_alat','$tgl_p','$tgl_k','$status','$stok','$dosen_pj')");

$update=mysql_query("UPDATE tb_atk SET stok='Tersedia' where kode_alat='{$kode_alat}'");
$update2=mysql_query("UPDATE tb_pinjam_atk SET status='{$status}' where username='{$username}'");


print '<script>alert ("pengembalian barang berhasil.."); window.location.href = "tampil_peminjam.php";</script>';

?>
