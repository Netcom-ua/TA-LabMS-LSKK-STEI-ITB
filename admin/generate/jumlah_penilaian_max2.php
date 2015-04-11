<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");


include '../../include/koneksi.php';
include '../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
?>

<?php 
$no=1;
$idcategori=$_GET['idcategori'];
//$idcategori=1;
$categoriCourse=mysql_query("SELECT * FROM  tb_mdl_coursecategories WHERE id ='$idcategori'");
$showDate=mysql_fetch_array($categoriCourse);

$sqlBanyakModul=mysql_query("SELECT * FROM tb_mdl_course WHERE category=$idcategori");
$sqlBanyakModul1=mysql_query("SELECT * FROM tb_mdl_course WHERE category=$idcategori");
$namaPraktikum=str_replace(" ", "_", $showDate['name']);


// Mendefinisikan nama file ekspor "hasil-export.xls"
//header("Content-Disposition: attachment; filename=Daftar_Nilai.xls");
header("Cache-Control: no-cache, must-revalidate");
header("Content-Disposition: attachment; filename=Data_Nilai_Praktikum_".$namaPraktikum.".xls");
?>

<html>
<head>
</head>
<body>
	<div id="area">
			<div>
			<span style="font-size: 18px; font-weight: bold;"><center>Daftar Nilai Praktikum<br><?php echo $showDate['name'];?><br>&nbsp;</center></span>
			</div>
			<form action="" method="post" enctype="multipart/form-data"
				style="margin-top: 20px;">
				<div>
					<table align="center" border="1px">
						<tr>
      						<td width="30" rowspan="2">No</td>
					    	<td width="300" rowspan="2">Nama</td>
							<td width="200" rowspan="2">Nim</td>
							<?php
							while ($modul1=mysql_fetch_array($sqlBanyakModul))
							{
								$idcours=$modul1['id'];
								$sqlJumlahPenilaian=mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE idcategori='$idcategori' AND idcourse='$idcours'");
								$jumlahPenilaian = mysql_num_rows($sqlJumlahPenilaian);
							?>
							<td colspan="<?php echo $jumlahPenilaian+1;?>"><?php echo $modul1['id'];?> (<?php echo $modul1['bobot'];?>)</td>
							<?php 
							}
							?>
							<td width="100" rowspan="2">Total Nilai</td>
						</tr>
						<tr>
							<?php
							while ($modul2=mysql_fetch_array($sqlBanyakModul1))
							{
								$idcoursee=$modul2['id'];
								$sqlNamaPenilaian=mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE idcategori='$idcategori' AND idcourse='$idcoursee'");
								while ($namaPenilaian=mysql_fetch_array($sqlNamaPenilaian))
	
								{
							?>
							<td width="200"><?php echo $namaPenilaian['namapenilaianharian'];?> (<?php echo $namaPenilaian['bobot'];?>)</td>
							<?php
								} 
							?>
							<td width="200">Total Nilai</td>
							<?php
							}
							?>
						</tr>
<?php
$dateCategori=$showDate['date'];
$sqlMahasiswa=mysql_query("SELECT DISTINCT userid FROM  tb_mdl_jadwal WHERE date>='$dateCategori'");
while ($mahasiswa=mysql_fetch_array($sqlMahasiswa))
{
	$idMahasiswa=$mahasiswa['userid'];
	$sqlketMahasiswa=mysql_query("SELECT * FROM  tb_mdl_user WHERE id ='$idMahasiswa'");
	$ketMahasiswa=mysql_fetch_array($sqlketMahasiswa);
	
	$sqlModul=mysql_query("SELECT * FROM tb_mdl_course WHERE category=$idcategori");
	
	
	$nilaiPraktikum=0;
	?>
						<tr>
							<td><?php echo $no;$no++;?></td>
							<td><?php echo $ketMahasiswa['username'];?></td>
							<td><?php echo $ketMahasiswa['nim'];?></td>
	<?
	while ($modul=mysql_fetch_array($sqlModul))
	{
		$idcourse=$modul['id'];
		$sqlNilaiAwal=mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE idcategori='$idcategori' AND idcourse='$idcourse'");
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
			?>
							<td align='center'><?php echo round($nilaiMahasiswa/$nilaiMax*100,2);?></td>
			<?
		}
			?>
							<td align='center'><?php echo round($nilaimodul,2);?></td>
			<?
		$nilaiPraktikum=$nilaiPraktikum+(($nilaimodul)*$modul['bobot']/100);
	}
	
	?>
						
							
							<td align='center'><?php echo round($nilaiPraktikum,2)?></td>
						</tr>
<?php
	//echo $idMahasiswa."=".$mahasiswa['userid']."=";
	//echo $nilaiPraktikum."<br>";
}
?>
	
					</table>
				</div>
			</form>
		</div>
	</div>
</body>
</html>	


