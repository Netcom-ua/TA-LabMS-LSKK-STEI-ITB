<?php
error_reporting(0);
include('../include/koneksi.php');
$Kode_Alat 		= $_POST['kode_alat'];
$Nama_Alat	 	= $_POST['nama_alat'];
$Kode_Lab 		= $_POST['kode_lab'];
$Nama_Lab 		= $_POST['nama_lab'];
$Tgl_Masuk	 	= $_POST['tgl_masuk'];
$Tgl_Pengajuan	= $_POST['tgl_pengajuan'];
$Tgl_Penghapusan = $_POST['tgl_penghapusan'];
$Type	 		= $_POST['tipe'];
$Spesifikasi	= $_POST['spesifikasi'];
$Stok	 		= $_POST['stok'];
$Ket	 		= $_POST['ket'];
$target = "img/foto_alat_atk/"; 
	$target = $target . basename( $_FILES['foto']['name']); 

	// membaca nama file
	$foto = $_FILES['foto']['name'];
	
	// memindahkan foto ke folder foto_mahasiswa   
	move_uploaded_file($_FILES['foto']['tmp_name'], $target);

	// membaca nama file temporary
	$tmpName  = $_FILES['foto']['tmp_name'];
	 
	// membaca size file
	$fileSize = $_FILES['foto']['size'];
	 
	// membaca tipe file
	$fileType = $_FILES['foto']['type'];

if (empty($foto)){
	$a=mysql_query("UPDATE tb_atk SET nama_alat='".$Nama_Alat."',kode_lab='".$Kode_Lab."',nama_lab='".$Nama_Lab."',tgl_pengajuan='".$Tgl_Pengajuan."',tgl_masuk='".$Tgl_Masuk."',tgl_pengapusan='".$Tgl_Penghapusan."',tipe='".$Type."',stok='".$Stok."',ket='".$Ket."' where kode_alat='".$Kode_Alat."' ");
}else{
$a=mysql_query("UPDATE tb_atk SET nama_alat='".$Nama_Alat."',kode_lab='".$Kode_Lab."',nama_lab='".$Nama_Lab."',tgl_pengajuan='".$Tgl_Pengajuan."',tgl_masuk='".$Tgl_Masuk."',tgl_pengapusan='".$Tgl_Penghapusan."',tipe='".$Type."',stok='".$Stok."',ket='".$Ket."',foto='".$foto."' where kode_alat='".$Kode_Alat."' ");

}


print '<script>alert ("Edit data Alat Berhasil.."); window.location.href = "tampil_atk.php";</script>';
?>