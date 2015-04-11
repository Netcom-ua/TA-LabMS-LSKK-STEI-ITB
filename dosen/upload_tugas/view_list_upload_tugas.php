<?php
error_reporting(0);
include '../include/koneksi.php';
?>

<?
$download=mysql_query("select * from tb_list_upload_tugas WHERE idcategori='$idcategori' AND idcourse='$idcourse'");
$cek=mysql_num_rows($download);
$c=0;
if($cek){

	?>
<table class="datatable" align="center" border="1">
	<tr>
		<th width="35" align="center">No</th>
		<th width="275" align="center">Judul</th>
		<th width="90" align="center">Tgl Buka</th>
		<th width="90" align="center">Tgl Tutup</th>
	</tr>
	<?
	while($row=mysql_fetch_array($download)){
		?>
	<tr>
		<td width="35" align="center"><? echo $c=$c+1;?></td>
		<td width="275" align="center"><?=$row['juduluploadtugas'];?></td>
		<td width="90" align="center"><?=$row['tglbuka'];?></td>
		<td width="90" align="center"><?=$row['tgltutup'];?></td>
	</tr>
	<?
	}
	?>
</table>
	<?

}else{
	echo "<font color=red><center><b>Belum Ada Data!!</b><center</font>";
}


?>