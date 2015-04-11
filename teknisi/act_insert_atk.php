<?php

include('../include/koneksi.php');
//tangkap data dari form registrasi
$Kode_Alat 	= $_POST['kode_alat'];
$Nama_Alat	= $_POST['nama_alat'];
$Kode_Lab 		= $_POST['kode_lab'];
$Nama_Lab 		= $_POST['nama_lab'];
$Tgl_Pengajuan	= $_POST['tgl_pengajuan'];
$Tgl_Masuk	 	= $_POST['tgl_masuk'];
$Tgl_Penghapusan = $_POST['tgl_penghapusan'];
$Spesifikasi	= $_POST['spesifikasi'];
$Type   = $_POST['tipe'];
$Stok	 		= $_POST['stok'];
$Ket	 		= $_POST['ket'];
//Lokasi folder produk
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




$a=mysql_query("select kode_alat from tb_atk where kode_alat='".$Kode_Alat."' ");
$qa=mysql_num_rows($a);

if ($Kode_Alat==''||$Nama_Alat==''||$Kode_Lab==''||$Nama_Lab==''||$Tgl_Pengajuan==''||$Tgl_Masuk==''||$Tgl_Penghapusan==''||$Spesifikasi==''||$Type==''||$Stok==''||$Ket==''||$foto=='')
{
	print '<script>alert ("Maaf Anda Harus Mengisi Semua Field "); window.location.href = "form_input_atk.php";</script>';
}

elseif($qa > 0)
{
	print '<script>alert ("Maaf Kode Alat yang Anda Masukkan Sudah Ada "); window.location.href = "form_input_atk.php";</script>';
}

else {
//simpan data ke database
$query = mysql_query("insert into tb_atk values('".$Kode_Alat."','".$Nama_Alat."','".$Kode_Lab."','".$Nama_Lab."','".$Tgl_Masuk."','".$Tgl_Pengajuan."','".$Tgl_Penghapusan."','".$Type."','".$Spesifikasi."','".$Stok."','".$Ket."','".$foto."')");
	print '<script>alert ("Input data alat Berhasil.."); window.location.href = "tampil_atk.php";</script>';
	}




?>
