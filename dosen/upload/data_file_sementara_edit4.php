<?php
include '../../include/koneksi.php';
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
?>

<?php
$judulfile=$_POST['judulfile'];
$keteranganfile=$_POST['keteranganfile'];
$alamat=$_POST['alamat'];
$tglbuka=$_POST['tglbuka'];
$tgltutup=$_POST['tgltutup'];
$update = mysql_query
(
"UPDATE tb_upload_data_sementara_edit
SET 
judulfile='$judulfile',
keteranganfile='$keteranganfile',
alamat='$alamat',
tglbuka='$tglbuka',
tgltutup='$tgltutup'"
);

header("location:editDataFile.php");
?>



