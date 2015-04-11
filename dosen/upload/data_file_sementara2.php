<?php
include '../../include/koneksi.php';
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
?>
<?php
$judulfile=$_POST['judulfile'];
$keteranganfile=$_POST['keteranganfile'];
$update = mysql_query
(
"UPDATE upload_data_sementara
SET 
judulfile='$judulfile',
keteranganfile='$keteranganfile'"
);

header("location:../../index.php?page=viewUploadData");
?>

