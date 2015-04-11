<?php
error_reporting(0);
include('../include/koneksi.php');
$Kode_Alat 	= $_POST['kode_barang'];
$Nama_Alat	= $_POST['nama_barang'];
$Kode_Lab 		= $_POST['kode_lab'];
$Nama_Lab 		= $_POST['nama_lab'];
/* $Tgl_Pengajuan	= $_POST['tgl_pengajuan'];
$Tgl_Masuk	 	= $_POST['tgl_masuk'];
$Tgl_Penghapusan = $_POST['tgl_penghapusan'];*/
$Spesifikasi	= $_POST['spesifikasi'];
$Jenis_Praktikum	= $_POST['jenis_prak'];
$Tn_Pembuatan   = $_POST['tahun_pem'];
$Stok	 		= $_POST['stok'];
$Satuan	 		= $_POST['satuan'];
$Ket	 		= $_POST['ket'];
//Lokasi folder produk
	$target = "img/foto_alat/"; 
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
	$a=mysql_query("UPDATE tb_inventaris SET nama_alat='".$Nama_Alat."',kode_lab='".$Kode_Lab."',nama_lab='".$Nama_Lab."',spesifikasi='".$Spesifikasi."',jenis_praktikum='".$Jenis_Praktikum."',thn_pembuatan='".$Tn_Pembuatan."',jumlah='".$Stok."',satuan='".$Satuan."',ket='".$Ket."' where kode_alat='".$Kode_Alat."' ");


}else{
$a=mysql_query("UPDATE tb_inventaris SET nama_alat='".$Nama_Alat."',kode_lab='".$Kode_Lab."',nama_lab='".$Nama_Lab."',spesifikasi='".$Spesifikasi."',jenis_praktikum='".$Jenis_Praktikum."',thn_pembuatan='".$Tn_Pembuatan."',jumlah='".$Stok."',satuan='".$Satuan."',ket='".$Ket."',foto='".$foto."' where kode_alat='".$Kode_Alat."' ");


}
	
print '<script>alert ("Update data alat Berhasil.."); window.location.href = "tampil_inventaris.php";</script>';
	


?>