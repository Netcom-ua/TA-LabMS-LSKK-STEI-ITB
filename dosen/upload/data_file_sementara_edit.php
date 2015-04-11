<?php
include '../../include/koneksi.php';
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
?>

<?php
$id=$_GET['id'];

$sql="SELECT * FROM  tb_mdl_data_file WHERE id='$id'";
$aksi=mysql_query($sql);
$data=mysql_fetch_array($aksi);
$idcategori=$data['idcategori'];
$idcourse=$data['idcourse'];
$judulfile=$data['judulfile'];
$keteranganfile=$data['keteranganfile'];
$alamat=$data['namafolder'].$data['namafile'].".".$data['namatypefile'];
$tglbuka=$data['tglbuka'];
$tgltutup=$data['tgltutup'];
echo $id." ".$idcategori." ".$idcourse." ".$judulfile." ".$keteranganfile." ".$alamat." ".$tglbuka." ".$tgltutup;

$update = mysql_query
(
"UPDATE upload_data_sementara_edit
SET 
id='$id',
idcategori='$idcategori',
idcourse='$idcourse',
judulfile='$judulfile',
keteranganfile='$keteranganfile',
alamat='$alamat',
tglbuka='$tglbuka',
tgltutup='$tgltutup'"
);

header("location:edit_data_praktikan.php");
?>

