<?php
error_reporting(0);
include '../include/koneksi.php';
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
		<th width="95" align="center">Tgl Tutup</th>
		<th width="75" align="center">View</th>
		<th width="50" align="center">Edit</th>
		<th width="50" align="center">Delete</th>
	</tr>
	<?
	while($row=mysql_fetch_array($download)){
		?>
	<tr>
		<td width="35" align="center"><? echo $c=$c+1;?></td>
		<td width="175" align="center"><?=$row['judulLogbook'];?></td>
		<td width="95" align="center"><?=$row['tglbuka'];?></td>
		<td width="95" align="center"><?=$row['tgltutup'];?></td>
		<td width="75" align="center"><a
			href=""><img
			src="../gambar/menu/zoom4.png" width="20" height="20" /> </a></td>
		<td width="50" align="center"><a
			href=""> <img
			src="../gambar/menu/edit3.png" border="0" /></a></td>
		<td width="50" align="center">			<a
			href="javascript:if(confirm('Anda yakin akan menghapus berita acara ini ?')){document.location='kordas/logbook/deleteLogbook.php?id=<?=$row['id'];?>';}"><img
				src="../gambar/menu/delete.png" width="18" height="18" /> </a></td>
			

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