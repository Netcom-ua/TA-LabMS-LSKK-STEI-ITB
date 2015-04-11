<?php
require_once'template/header.php';

$no=1;
$kd_mk=$_GET['modul'];
//echo $kd_mk;
$categoriCourse=mysql_query("SELECT * FROM  tb_matakuliah WHERE kd_mk ='$kd_mk'");
$showDate=mysql_fetch_array($categoriCourse);

$sqlBanyakModul=mysql_query("SELECT * FROM tb_mdl_praktikum WHERE kd_mk='$kd_mk'");
//$showDate1=mysql_fetch_array($sqlBanyakModul);

$sqlBanyakModul1=mysql_query("SELECT * FROM tb_mdl_praktikum WHERE kd_mk='$kd_mk'");
//$showDate2=mysql_fetch_array($sqlBanyakModul1);

?>
					
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span10">
		<!-- Mengakibatkan table tidak responsive
          <div class="widget widget-nopad">
		  -->
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Administrator</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
				<div class="alert alert-success" align="center">
						<h3 class="bigstats" align="center"> Daftar Nilai Praktikum <br/> <?php echo $showDate['kd_mk'];?> <?php echo $showDate['nama_mk'];?> <br/> Laboratorium Dasar Teknik Elektro <br/> Sekolah Teknik Elektro dan Informatika - ITB</h3> 
					<br/>
				
			</div>
			<form action="" method="post" enctype="multipart/form-data"
				style="margin-top: 20px;">
				<div style="overflow: auto;">
				
					 <table class="table table-bordered" border="1">
						<tr>
      						<td class="alert-danger" width="30" rowspan="2">No</td>
					    	<td class="alert-danger" width="300" rowspan="2">Nama</td>
							<td class="alert-danger" width="200" rowspan="2">Nim</td>
							<?php
							while ($modul1=mysql_fetch_array($sqlBanyakModul))
							{
								$idcours=$modul1['kd_modul'];
								//echo $idcours;
								$sqlJumlahPenilaian=mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE kd_mk='$kd_mk' AND kd_modul='$idcours'");
								//echo $sqlJumlahPenilaian;
								$jumlahPenilaian = mysql_num_rows($sqlJumlahPenilaian);
							?>
							<td class="alert-danger" colspan="<?php echo $jumlahPenilaian+1;?>"><p align="center" > <?php echo $modul1['kd_modul'];?> ( <?php echo $modul1['bobot'];?> )</p></td>
							<?php 
							}
							?>
							<td class="alert-danger" width="100" rowspan="2">Total Nilai</td>
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
							<td class="alert-danger" width="200" align="center"><?php echo $namaPenilaian['judul'];?> (<?php echo $namaPenilaian['bobot'];?>)</td>
							<?php
								} 
							?>
							<td class="alert-danger" width="200">Total Nilai</td>
							<?php
							}
							?>
						</tr>
						<?php
						//$dateCategori=$showDate['kd_mk'];
						//echo $dateCategori;
						$sqlMahasiswa=mysql_query("SELECT nim FROM  tb_jadwal_praktikum WHERE kd_mk ='$kd_mk'");
						//echo $sqlMahasiswa;
						while ($mahasiswa=mysql_fetch_array($sqlMahasiswa))
						{
							$idMahasiswa=$mahasiswa['nim'];
							//echo $idMahasiswa;
							$sqlketMahasiswa=mysql_query("SELECT * FROM  tb_mahasiswa WHERE nim ='$idMahasiswa'");
							$ketMahasiswa=mysql_fetch_array($sqlketMahasiswa);
							
							$sqlModul=mysql_query("SELECT * FROM tb_mdl_praktikum WHERE kd_mk='$kd_mk'");
							
							//echo $sqlModul;
							
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
							//echo $idcourse;
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
						
						
						<td class="alert-info" align='center'><?php echo round($nilaiPraktikum,2)?></td>
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
   </div>
   </div>
     <br/>
<!-- /main -->

<?php
	require_once'template/footer.php';
?>