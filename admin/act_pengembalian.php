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
$status 	= $_POST['status'];
$jumlah 	= $_POST['jumlah'];
$dosen_pj 	= $_POST['penanggung_jawab'];

mysql_query("insert into tb_pengembalian values('','$nama','$username','$email','$kode_alat','$nama_alat','$tgl_p','$tgl_k','$status','$jumlah','$dosen_pj')");

$update=mysql_query("UPDATE tb_pinjam SET status='{$status}' where username='{$username}'");

print '<script>alert ("pengembalian barang berhasil.."); window.location.href = "tampil_peminjam.php";</script>';

?>
