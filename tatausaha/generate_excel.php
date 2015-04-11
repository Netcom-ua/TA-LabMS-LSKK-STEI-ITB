<?php
session_start();
include 'koneksi/session.php';
include '../include/koneksi.php';
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

?>
<?php 
$no=1;
$kd_mk=$_GET['kd_mk'];
//echo $kd_mk;
$categoriCourse=mysql_query("SELECT * FROM  tb_matakuliah WHERE kd_mk ='$kd_mk'");
$showDate=mysql_fetch_array($categoriCourse);

$sqlBanyakModul=mysql_query("SELECT * FROM tb_mdl_praktikum WHERE kd_mk='$kd_mk'");


$sqlBanyakModul1=mysql_query("SELECT * FROM tb_mdl_praktikum WHERE kd_mk='$kd_mk'");


//$namaPraktikum=str_replace(" ", "_", $showDate['name']);
$namaPraktikum=$showDate['kd_mk'].'_'.$showDate['nama_mk'];
$namaPraktikum1=$showDate['kd_mk'].' '.$showDate['nama_mk'];


// Mendefinisikan nama file ekspor "hasil-export.xls"
//header("Content-Disposition: attachment; filename=Daftar_Nilai.xls");
header("Content-Disposition: attachment; filename=Data_Nilai_Praktikum_".$namaPraktikum.".xls");
?>
<html>
<head>
</head>
<body>
	<div id="area">
			<div>
			<span style="font-size: 18px; font-weight: bold;"><center>Daftar Nilai Praktikum<br><?php echo $namaPraktikum1;?><br>&nbsp;</center></span>
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
								$idcours=$modul1['kd_modul'];
								//echo $idcours;
								$sqlJumlahPenilaian=mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE kd_mk='$kd_mk' AND kd_modul='$idcours'");
								//echo $sqlJumlahPenilaian;
								$jumlahPenilaian = mysql_num_rows($sqlJumlahPenilaian);
							?>
							<td colspan="<?php echo $jumlahPenilaian+1;?>"><?php echo $modul1['kd_modul'];?> (<?php echo $modul1['bobot'];?>)</td>
							<?php 
							}
							?>
							<td width="100" rowspan="2">Total Nilai</td>
						</tr>
						<tr>
							<?php
							while ($modul2=mysql_fetch_array($sqlBanyakModul1))
							{
								$idcoursee=$modul2['kd_modul'];
								$sqlNamaPenilaian=mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE kd_mk='$kd_mk' AND kd_modul='$idcoursee'");
								while ($namaPenilaian=mysql_fetch_array($sqlNamaPenilaian))
	
								{
							?>
							<td width="200"><?php echo $namaPenilaian['judul'];?> (<?php echo $namaPenilaian['bobot'];?>)</td>
							<?php
								} 
							?>
							<td width="200">Total Nilai</td>
							<?php
							}
							?>
						</tr>
						<?php
						$sqlMahasiswa=mysql_query("SELECT nim FROM  tb_jadwal_praktikum WHERE kd_mk ='$kd_mk'");
						//echo $sqlMahasiswa;
						while ($mahasiswa=mysql_fetch_array($sqlMahasiswa))
						{
							$idMahasiswa=$mahasiswa['nim'];
							//echo $idMahasiswa;
							$sqlketMahasiswa=mysql_query("SELECT * FROM  tb_mahasiswa WHERE nim ='$idMahasiswa'");
							$ketMahasiswa=mysql_fetch_array($sqlketMahasiswa);
							
							$sqlModul=mysql_query("SELECT * FROM tb_mdl_praktikum WHERE kd_mk='$kd_mk'");
							
							$nilaiPraktikum=0;
							?>
						<tr>
							<td class="alert-info"><?php echo $no;$no++;?></td>
							<td class="alert-info"><?php echo $ketMahasiswa['nama_mhs'];?></td>
							<td class="alert-info"><?php echo $ketMahasiswa['nim'];?></td>
						<?php
						while ($modul=mysql_fetch_array($sqlModul))
						{
							$idcourse=$modul['kd_modul'];
							$sqlNilaiAwal=mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE kd_mk='$kd_mk' AND kd_modul='$idcourse'");
							//echo $sqlNilaiAwal;
							$total=0;
							$nilaimodul=0;
							while ($nilaiAwal=mysql_fetch_array($sqlNilaiAwal))
							{
								$nilaiMahasiswa=$nilaiAwal['nilaiawal'];
								//echo $nilaiMahasiswa;
								$nilaiMax=$nilaiAwal['nilaiawal'];
								//echo $nilaiMax;
								$idpenilaian=$nilaiAwal['id'];
								//echo $idpenilaian;
								$sqlpelaksanaan=mysql_query("SELECT * FROM tb_penilaianpelaksananpraktikum WHERE idpenilaian='$idpenilaian'");
								while ($pelaksanaan=mysql_fetch_array($sqlpelaksanaan))
								{
									$indexnilai=$pelaksanaan['indexnilai'];
									//echo $indexnilai;
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
								$sqldatapenilaian=mysql_query("SELECT * FROM tb_datapenilaiapraktikum WHERE nim='$idMahasiswa' AND idpenilaian='$idpenilaian' AND kd_modul='$idcourse'");
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
									<td class="alert-info" align='center'><?php echo round($nilaiMahasiswa/$nilaiMax*100,2);?></td>
								<?php
							}
								?>
									<td class="alert-info" align='center'><?php echo round($nilaimodul,2);?></td>
								<?php
							$nilaiPraktikum=$nilaiPraktikum+(($nilaimodul)*$modul['bobot']/100);
						}
						
						?>		
							
							<td align='center'><?php echo round($nilaiPraktikum,2)?></td>
						</tr>
					<?php

					}
					?>
	
					</table>
				</div>
			</form>
		</div>
	</div>
</body>
</html>	