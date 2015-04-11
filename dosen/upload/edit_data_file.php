<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
include '../../include/koneksi.php';
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
?>
<?php
$sql="SELECT * FROM tb_upload_data_sementara_edit";
$aksi=mysql_query($sql);
$data=mysql_fetch_array($aksi);
$id=$data['id'];
$idcategori=$data['idcategori'];
$idcourse=$data['idcourse'];
$judulfile=$data['judulfile'];
$keteranganfile=$data['keteranganfile'];
$alamat=$data['alamat'];
$tglbuka=$data['tglbuka'];
$tgltutup=$data['tgltutup'];

include 'alamatFile.php';

$update = mysql_query
(
			"UPDATE tb_mdl_data_file
			SET 
			judulfile='$judulfile',
			keteranganfile='$keteranganfile',
			tglbuka='$tglbuka',
			tgltutup='$tgltutup',
			namafolder='$namaFolder',
			namafile='$namaFile',
			namatypefile='$namaTypeFile'
			WHERE id='$id'
			"
);
echo $update;
header("location:../course&idcategori=$idcategori");

?>
