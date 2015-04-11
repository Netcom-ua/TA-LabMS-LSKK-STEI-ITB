<?php
error_reporting(0);
include '../include/koneksi.php';
?>

<?
$download=mysql_query("select * from tb_idpenilaianpelaksananpraktikum WHERE idcategori='$idcategori' AND idcourse='$idcourse'");
$cek=mysql_num_rows($download);
$c=0;
if($cek){

	?>
<table class="datatable" align="center" border="1">
	<tr>
		<th width="35" align="center">No</th>
		<th width="150" align="center">Judul</th>
		<th width="95" align="center">Tgl Buka</th>
		<th width="95" align="center">Tgl Tutup</th>
		<th width="25" align="center">Bobot</th>
	</tr>
	<?
	while($row=mysql_fetch_array($download)){
		?>
	<tr>
		<td width="35" align="center"><? echo $c=$c+1;?></td>
		<td width="150" align="center"><?=$row['namapenilaianharian'];?></td>
		<td width="95" align="center"><?=$row['tglbuka'];?></td>
		<td width="95" align="center"><?=$row['tgltutup'];?></td>
		<td width="25" align="center"><?=$row['bobot'];?></td>
		
	</tr>
	<?
	}
	?>
</table>
	<?

}else{
	echo "<font color=red><center><b>Belum Ada Data</b><center</font>";
}


?>