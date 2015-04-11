<?php

include('../include/koneksi.php');
//tangkap data dari form registrasi
$Kode_Alat 	= $_POST['kode_barang'];
$Nama_Alat	= $_POST['nama_barang'];
$Kode_Lab 		= $_POST['kode_lab'];
$Nama_Lab 		= $_POST['nama_lab'];
/* $Tgl_Pengajuan	= $_POST['tgl_pengajuan'];
$Tgl_Masuk	 	= $_POST['tgl_masuk'];
$Tgl_Penghapusan = $_POST['tgl_penghapusan']; */
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




$a=mysql_query("select kode_alat from tb_inventaris where kode_alat='".$Kode_Alat."' ");
$qa=mysql_num_rows($a);

if ($Kode_Alat==''||$Nama_Alat==''||$Kode_Lab==''||$Nama_Lab==''||$Spesifikasi==''||$Jenis_Praktikum==''||$Tn_Pembuatan==''||$Stok==''||$Satuan==''||$Ket==''||$foto=='')
{
	print '<script>alert ("Maaf Anda Harus Mengisi Semua Field "); window.location.href = "form_input_inventaris.php";</script>';
}

elseif($qa > 0)
{
	print '<script>alert ("Maaf Kode Alat yang Anda Masukkan Sudah Ada "); window.location.href = "form_input_inventaris.php";</script>';
}

else {
//simpan data ke database
$query = mysql_query("INSERT INTO `tb_inventaris` (
`kode_alat` ,
`nama_alat` ,
`kode_lab` ,
`nama_lab` ,
`spesifikasi` ,
`jenis_praktikum` ,
`thn_pembuatan` ,
`jumlah` ,
`satuan` ,
`ket` ,
`foto` ,
`tgl_masuk`
)
VALUES (
'$Kode_Alat',  '$Nama_Alat',  '$Kode_Lab',  '$Nama_Lab',  '$Spesifikasi',  '$Jenis_Praktikum',  '$Tn_Pembuatan',  '$Stok',  '$Satuan',  '$Ket',  '$foto', NOW()
)");
	var_dump($query);
	}

/* print '<script>alert ("Input data alat Berhasil.."); window.location.href = "tampil_inventaris.php";</script>'; */

?>
