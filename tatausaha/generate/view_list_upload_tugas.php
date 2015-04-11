<?php
error_reporting(0);
include '../../include/koneksi.php';
?>

<?php
$baik=0;$idbaik="";
$buruk=1000000000000000;$idburuk="";
$idcategori=$_GET['idcategori'];
$categoriCourse=mysql_query("SELECT * FROM  tb_mdl_coursecategories WHERE id ='$idcategori'");
$showDate=mysql_fetch_array($categoriCourse);
$dateCategori=$showDate['date'];
$sqlMahasiswa=mysql_query("SELECT DISTINCT userid FROM  tb_mdl_jadwal WHERE date>='$dateCategori'");
while ($mahasiswa=mysql_fetch_array($sqlMahasiswa))
{
	$idMahasiswa=$mahasiswa['userid'];
	$idcourse=$course['id'];
	$sqlNilaiAwal=mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE idcategori='$idcategori' AND idcourse='$idcourse' AND laporan=1");
	$total=0;
	$nilaimodul=0;
	while ($nilaiAwal=mysql_fetch_array($sqlNilaiAwal))
	{
		$nilaiMahasiswa=$nilaiAwal['nilaiawal'];
		$nilaiMax=$nilaiAwal['nilaiawal'];
		$idpenilaian=$nilaiAwal['idpenilaian'];
		$sqlpelaksanaan=mysql_query("SELECT * FROM tb_penilaianpelaksananpraktikum WHERE idpenilaian=$idpenilaian");
		while ($pelaksanaan=mysql_fetch_array($sqlpelaksanaan))
		{
			$indexnilai=$pelaksanaan['indexnilai'];
			$sqlklasifikasipenilaian=mysql_query("SELECT * FROM tb_klasifikasipenilaian WHERE indexnilai='$indexnilai'");
			while ($klasifikasipenilaian=mysql_fetch_array($sqlklasifikasipenilaian))
			{
				$oprasi=$klasifikasipenilaian['oprasi'];
				if($oprasi=='+')
				{
					$nilaiMax=$nilaiMax+$klasifikasipenilaian['nilai'];
				}
			}
		}

		$idnilaiMahasiswa=0;
		$sqldatapenilaian=mysql_query("SELECT * FROM tb_datapenilaiapraktikum WHERE idmahasiswa='$idMahasiswa' AND idpenilaian='$idpenilaian' AND idcourse='$idcourse'");
		while ( $datapenilaian=mysql_fetch_array($sqldatapenilaian))
		{
			$indexnilai=$datapenilaian['indexnilai'];
			$sqlklasifikasipenilaian=mysql_query("SELECT * FROM tb_klasifikasipenilaian WHERE indexnilai='$indexnilai'");
			while ($klasifikasipenilaian=mysql_fetch_array($sqlklasifikasipenilaian))
			{
				$oprasi=$klasifikasipenilaian['oprasi'];
				if($oprasi=='+')
				{
					$nilaiMahasiswa=$nilaiMahasiswa+$datapenilaian['nilai'];
				}
				else if($oprasi=='-')
				{
					$nilaiMahasiswa=$nilaiMahasiswa-$datapenilaian['nilai'];
				}//echo $nilaiMahasiswa;
			}
			$idnilaiMahasiswa=1;
		}
		if($idnilaiMahasiswa==0)
		{
			$nilaiMahasiswa=0;
		}
		$nilaiperpenilaian=($nilaiMahasiswa/$nilaiMax)*$nilaiAwal['bobot'];
		$nilaimodul=$nilaimodul+$nilaiperpenilaian;

	}
	if($baik<$nilaimodul)
	{
		$baik=$nilaimodul;
		$idbaik=$idMahasiswa;
	}
	else 
	{
		
	}
	if($buruk>=$nilaimodul)
	{
		$buruk=$nilaimodul;
		$idburuk=$idMahasiswa;
	}
	else {}
}

$nilaiPraktikum=$nilaiPraktikum+(($nilaimodul)*$modul['bobot']/100);

///////////////////////////////////////////////////////////////////////////////////////
$download=mysql_query("select * from tb_list_upload_tugas WHERE idcategori='$idcategori' AND idcourse='$idcourse'");
$cek=mysql_num_rows($download);
$c=0;
if($cek){

	?>
<table class="datatable" align="center" border="1">
	<tr>
		<th width="35" align="center">No</th>
		<th width="175" align="center">Judul</th>
		<th width="90" align="center">Tgl Buka</th>
		<th width="90" align="center">Tgl Tutup</th>
		<th width="50" align="center" colspan="2">Download</th>
	</tr>
	<?
	while($row=mysql_fetch_array($download)){
		
		?>
	<tr>
		<td align="center"><? echo $c=$c+1;?></td>
		<td align="center"><?=$row['juduluploadtugas'];?></td>
		<td align="center"><?=$row['tglbuka'];?></td>
		<td align="center"><?=$row['tgltutup'];?></td>
		<?php $tugasid=$row['id'];?>
		<td align="center"><a href="">baik</a></td>
		<td align="center"><a href="">buruk</a></td>

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