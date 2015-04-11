<?php
error_reporting(0);
include '../../include/koneksi.php';
?>

<?php
$idcategori=$_GET['idcategori'];
$idcourse=$_GET['idcourse'];
$judulfile=$data['judulfile'];
$keteranganfile=$data['keteranganfile'];
$alamat=$data['alamat'];

$update = mysql_query
(
"UPDATE upload_data_sementara
SET 
idcategori='$idcategori',
idcourse='$idcourse',
judulfile='$judulfile',
keteranganfile='$keteranganfile',
alamat='$alamat'"
);

$sqlfolderCategori=mysql_fetch_array(mysql_query("SELECT * FROM tb_mdl_coursecategories WHERE id=$idcategori"));

$folderCategori=$sqlfolderCategori['name'];
mkdir("upload/data/".$folderCategori, 0775);

//header("location:?page=prosesUploadData");
echo "<script>window.location = '?page=prosesUploadData';</script>";