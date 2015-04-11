<?php
error_reporting(0);
include '../../include/koneksi.php';
?>

<?
$idcourse=$course['id'];
$download=mysql_query("select * FROM tb_mdl_data_file WHERE idcategori='$idcategori' AND idcourse='$idcourse'");
$downloadFile=mysql_query("select * FROM tb_mdl_data_file WHERE idcategori='$idcategori' AND idcourse='$idcourse'
AND namatypefile='pdf' OR namatypefile='doc' OR namatypefile='doct'
");//
$downloadGambar=mysql_query("select * FROM tb_mdl_data_file WHERE idcategori='$idcategori' AND idcourse='$idcourse'
AND namatypefile='jpg' OR namatypefile='png' OR namatypefile='gif'
");//
$downloadAplikasi=mysql_query("select * FROM tb_mdl_data_file WHERE idcategori='$idcategori' AND idcourse='$idcourse'
AND namatypefile='exe' OR namatypefile='jar'
");//
$downloadcompres=mysql_query("select * FROM tb_mdl_data_file WHERE idcategori='$idcategori' AND idcourse='$idcourse'
AND namatypefile='zip' OR namatypefile='rar'
");//
$downloadLain=mysql_query("select * FROM tb_mdl_data_file WHERE idcategori='$idcategori' AND idcourse='$idcourse'
AND namatypefile!='pdf' AND namatypefile!='doc' AND namatypefile!='doct'
AND namatypefile!='jpg' AND namatypefile!='png' AND namatypefile!='gif'
AND namatypefile!='exe' AND namatypefile!='jar'
AND namatypefile!='zip' AND namatypefile!='rar'
");//

$cek=mysql_num_rows($download);
$c=0;
if($cek){
	?>
<table border="1" align="center">
	<tr>
		<th width="35" align="center">No</th>
		<th width="175" align="center">Judul</th>
		<th width="95" align="center">Tgl Buka</th>
		<th width="95" align="center">Tgl Tutup</th>
		<th width="75" align="center">Download</th>
	</tr>
</table>
	<?php
	if(mysql_num_rows($downloadFile))
	{
	?>

	<div style="font-style: italic; padding-top: 3px; padding-bottom: 3px; font-size: 15">Type File</div>

	<table border="1" align="center">
<?php
while($row=mysql_fetch_array($downloadFile)){
	?>
	<tr>
		<td width="35" align="center"><? echo $c=$c+1;?></td>
		<td width="175" align="center"><?=$row['judulfile'];?></td>
		<td width="95" align="center"><?=$row['tglbuka'];?></td>
		<td width="95" align="center"><?=$row['tgltutup'];?></td>
		<td width="75" align="center"><a
			href="download.php?id=<?=$row['id'];?>"><img
				src="../gambar/menu/download.png" border="0" /> </a></td>
	</tr>
	<?
}
?>
</table>
<?php
	}

	if(mysql_num_rows($downloadGambar))
	{
		?>
<div
	style="font-style: italic; padding-top: 3px; padding-bottom: 3px; font-size: 15">Type
	Aplikasi</div>
<table border="1" align="center">
<?php
while($row=mysql_fetch_array($downloadGambar)){
	?>
	<tr>
		<td width="35" align="center"><? echo $c=$c+1;?></td>
		<td width="175" align="center"><?=$row['judulfile'];?></td>
		<td width="95" align="center"><?=$row['tglbuka'];?></td>
		<td width="95" align="center"><?=$row['tgltutup'];?></td>
		<td width="75" align="center"><a
			href="download.php?id=<?=$row['id'];?>"><img
				src="gambar/menu/download.png" border="0" /> </a></td>
	</tr>
	<?
}
?>
</table>

<?php
	}
	if(mysql_num_rows($downloadAplikasi))
	{
?>
<div style="font-style: italic; padding-top: 3px; padding-bottom: 3px; font-size: 15">Type Aplikasi</div>
<table border="1" align="center">
<?php
while($row=mysql_fetch_array($downloadAplikasi)){
	?>
	<tr>
		<td width="35" align="center"><? echo $c=$c+1;?></td>
		<td width="175" align="center"><?=$row['judulfile'];?></td>
		<td width="95" align="center"><?=$row['tglbuka'];?></td>
		<td width="95" align="center"><?=$row['tgltutup'];?></td>
		<td width="75" align="center"><a
			href="download.php?id=<?=$row['id'];?>"><img
				src="../gambar/menu/download.png" border="0" /> </a></td>
	</tr>
	
	<?
}
?>
</table>

<?php
	}
	if(mysql_num_rows($downloadcompres))
	{
		?>
<span style="font-style: italic;">Type Compres</span>
<table border="1" align="center">
<?php
while($row=mysql_fetch_array($downloadcompres)){
	?>
	<tr>
		<td width="35" align="center"><? echo $c=$c+1;?></td>
		<td width="175" align="center"><?=$row['judulfile'];?></td>
		<td width="95" align="center"><?=$row['tglbuka'];?></td>
		<td width="95" align="center"><?=$row['tgltutup'];?></td>
		<td width="75" align="center"><a
			href="download.php?id=<?=$row['id'];?>"><img
				src="../gambar/menu/download.png" border="0" /> </a></td>
	</tr>
	
	<?
}
?>
</table>

<?php
	}
	if(mysql_num_rows($downloadLain))
	{
		?>
<div
	style="font-style: italic; padding-top: 3px; padding-bottom: 3px; font-size: 15">Type
	Lain-Lain</div>
<table border="1" align="center">
<?php
while($row=mysql_fetch_array($downloadLain)){
	?>
	<tr>
		<td width="35" align="center"><? echo $c=$c+1;?></td>
		<td width="175" align="center"><?=$row['judulfile'];?></td>
		<td width="95" align="center"><?=$row['tglbuka'];?></td>
		<td width="95" align="center"><?=$row['tgltutup'];?></td>
		<td width="75" align="center"><a
			href="download.php?id=<?=$row['id'];?>"><img
				src="gambar/menu/download.png" border="0" /> </a></td>
	</tr>
	
	<?
}
?>
</table>

<?php
	}

}else{
	echo "<font color=red><center><b>Belum Ada Data!!</b><center</font>";
}
?>