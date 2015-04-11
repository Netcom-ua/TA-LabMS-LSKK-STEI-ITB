
<?php
error_reporting(0);
include '../../include/koneksi.php';
?>

<?
$download=mysql_query("select * from tb_list_logbook WHERE idcategori='$idcategori' AND idcourse='$idcourse'");
$cek=mysql_num_rows($download);
$c=0;
if($cek){

	?>
<table class="datatable" align="center" border="1">
	<tr>
		<th width="35" align="center">No</th>
		<th width="175" align="center">Judul</th>
		<th width="95" align="center">Tgl Buka</th>
		<th width="95" align="center">Tgl Tutup</tu>
		<th width="75" align="center">View</th>
	</tr>
	<?
	while($row=mysql_fetch_array($download)){
		?>
	<tr>
		<td width="35" align="center"><? echo $c=$c+1;?></td>
		<td width="175" align="center"><?=$row['judulLogbook'];?></td>
		<td width="95" align="center"><?=$row['tglbuka'];?></td>
		<td width="95" align="center"><?=$row['tgltutup'];?></td>
		<td width="75" align="center"><a href="generate/pilih_waktu_logbook.php?idcategori=<?echo $idcategori?>&id=<?echo $row['idcourse'];?>"><img src="gambar/menu/zoom4.png" width="22" height="22" /></a></td>
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