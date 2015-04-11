<?php
require_once'template/header.php';

$tanggal = $_GET['tanggal'];
$waktu = $_GET['waktu'];
$kd_modul = $_GET['kd_modul'];
$nim= $_GET['nim'];
$idpenilaian = $_GET['id'];

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
              <h3>Halaman Asisten</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
				<div class="alert alert-success" align="center">
						<h3 class="bigstats" align="center"> Penilaian Praktikum <br/> Laboratorium Dasar Teknik Elektro <br/> Sekolah Teknik Elektro dan Informatika - ITB</h3> 
					<br/>
				<?php 
						$query=mysql_query("SELECT tb_matakuliah.kd_mk, tb_matakuliah.nama_mk, tb_mdl_praktikum.nm_modul, tb_mdl_praktikum.kd_modul from tb_matakuliah inner join tb_mdl_praktikum on tb_matakuliah.kd_mk = tb_mdl_praktikum.kd_mk   WHERE tb_mdl_praktikum.kd_modul ='$kd_modul'");
						
						$row1=mysql_fetch_array($query);
				?>
				<table width="700">
					<tr >
						<td width="350"><h4>Kode Praktikum / Mata Kuliah</td>
						<td width="10" align="center"><h4>:</h4></td>
						<td width="440">
						<h4>
						<?php
						$kd_modul = $row1['kd_modul'];
						$nm_mk = $row1['nama_mk'];
						echo $kd_modul;
						?> / <?php
						$kd_mk = $row1['kd_mk'];
						echo $kd_mk.' '.$nm_mk;
						?>
						</h4>
						</td>
					</tr>
					<tr>
						<td width="250"><h4>Nama Percobaan</h4></td>
						<td align="center"><h4>:</h4></td>
						<td><h4>
						<?php 
						//$Course=mysql_fetch_array(mysql_query("SELECT * FROM  mdl_course   WHERE id ='$idcourse'"));
						echo $row1['nm_modul'];
						?> 
						</h4>
						</td>
					</tr>
					<tr>
						<td><h4>Tanggal / Jam Pelaksanan</h4></td>
						<td align="center"><h4>:</h4></td>
						<td><h4><?php echo $tanggal?> / <?php echo $waktu?></h4></td>
					</tr>
					<tr>
						<td><h4>Nama Asisten / NIM </h4><?php 
						?>
						</td>
						<td align="center"><h4>:</h4></td>
						<td><h4><?php echo  $data['nama_user']?> / <?php echo $id_pengenal ?></h4></td>
					</tr>
				</table>
				<br/>
				
				<h4 class="bigstats"> Data Mahasiswa</h4><br/>
				  <table class="table table-bordered">
					<thead>
					  <tr>
						<td class="alert-danger"> NIM </td>
						<td class="alert-danger"> Nama Mahasiswa </td>
						<td class="alert-danger"> Email </td>
					  </tr>
					</thead>
					<tbody>
					<!-- Menampilkan data Mahasiswa yang belum dikonfirmasi -->
					<?php 
					
						$data=mysql_query("select * from tb_mahasiswa where nim='$nim'");
						//echo $data;
						while($row=mysql_fetch_array($data)){
						?>
					  <tr>	
						<td class="alert-info"> <?php echo $row['nim']; ?> </td>
						<td class="alert-info"> <?php echo $row['nama_mhs']; ?> </td>
						<td class="alert-info"> <?php echo $row['email']; ?> </td>
					  </tr>
					  <?php 
						} 
						?>
					</tbody>
				  </table>
				  
				  <!--<form method="post" action="#"
					name="formPenilaian">-->
				  <h4 class="bigstats" align="center"> Jenis Penilaian</h4><br/>
				 <table class="table table-bordered">
					<thead>
					  <tr>
						<td class="alert-danger"> No </td>
						<td class="alert-danger"> Judul </td>
						<td class="alert-danger"> Keterangan</td>
						<td class="alert-danger"> Nilai Awal</td>
						<td class="alert-danger"> Nilai </td>
						<td class="alert-danger"> Nilai Akhir</td>
						<td class="alert-danger"> Penilaian</td>
					  </tr>
					</thead>
					<tbody>
					<!--  -->
					<?php
					
						$status = 0;
						
						$query3=mysql_query("SELECT tb_matakuliah.kd_mk, tb_matakuliah.nama_mk, tb_mdl_praktikum.nm_modul, tb_mdl_praktikum.kd_modul from tb_matakuliah inner join tb_mdl_praktikum on tb_matakuliah.kd_mk = tb_mdl_praktikum.kd_mk   WHERE tb_mdl_praktikum.kd_modul ='$kd_modul'");

						$row9=mysql_fetch_array($query3);
						
						$datax=mysql_query("SELECT *
							FROM tb_idpenilaianpelaksananpraktikum
							WHERE kd_mk = '$kd_mk'
							AND kd_modul = '$kd_modul'");
							
						while($rowx=mysql_fetch_array($datax)){
						$idnilai2 = $rowx['id'];
						$jumlahNilai = $rowx['nilaiawal'];
						//echo $idnilai2;
						
						$status=1;
						
						$sql="select tb_idpenilaianpelaksananpraktikum.id, tb_idpenilaianpelaksananpraktikum.kd_mk, tb_idpenilaianpelaksananpraktikum.kd_modul, tb_idpenilaianpelaksananpraktikum.judul, tb_idpenilaianpelaksananpraktikum.keterangan, tb_idpenilaianpelaksananpraktikum.nilaiawal, tb_idpenilaianpelaksananpraktikum.bobot, tb_penilaianpelaksananpraktikum.idpenilaian, tb_penilaianpelaksananpraktikum.indexnilai, tb_klasifikasipenilaian.indexnilai, tb_klasifikasipenilaian.noid, tb_klasifikasipenilaian.jenispenilaian, tb_klasifikasipenilaian.media, tb_klasifikasipenilaian.oprasi, tb_klasifikasipenilaian.nilai, tb_bankpenilaian.noid, tb_bankpenilaian.namapenilaian from tb_idpenilaianpelaksananpraktikum inner join tb_penilaianpelaksananpraktikum on tb_idpenilaianpelaksananpraktikum.id = tb_penilaianpelaksananpraktikum.idpenilaian inner join tb_klasifikasipenilaian ON tb_penilaianpelaksananpraktikum.indexnilai = tb_klasifikasipenilaian.indexnilai inner join tb_bankpenilaian ON tb_klasifikasipenilaian.noid = tb_bankpenilaian.noid where tb_idpenilaianpelaksananpraktikum.id='$idnilai2'
						group by tb_penilaianpelaksananpraktikum.idpenilaian, tb_penilaianpelaksananpraktikum.indexnilai";
						//echo $sql;
						$aksi1=mysql_query($sql);
						
							while ($data1=mysql_fetch_array($aksi1)){
		
							
							$oprasi=$data1['oprasi'];
							
							$indexnilai = $data1['indexnilai'];
							
							$sql4="SELECT * FROM  tb_datapenilaiapraktikum WHERE nim='$nim' AND idpenilaian = '$idnilai2' AND indexnilai='$indexnilai' ";
							
							//echo $sql4;
							$aksi4=mysql_query($sql4);
							while ($data4=mysql_fetch_array($aksi4))
								{
									$pembebananNilai=$data4['nilai'];
									//echo $pembebananNilai;
									//echo $jumlahNilai;
									//echo $oprasi;
								
							if($oprasi=="+")
								{
								$jumlahNilai=$jumlahNilai+$pembebananNilai;
								}
							elseif ($oprasi=="-")
								{
								$jumlahNilai=$jumlahNilai-$pembebananNilai;
								}
							}
							
							
						}
						
						$nilaiawal= $rowx['nilaiawal'];
						//echo $nilaiawal;
						
						$bobot = $rowx['bobot'];
						//echo $bobot;
						
						$nilaiakhir = ($jumlahNilai/$nilaiawal)*$bobot;
						//echo $nilaiakhir;
						
						$tot_nilai[$nilaiakhir] = $nilaiakhir;	

						$total = array_sum($tot_nilai);	
						
						//echo $jumlahNilai;
						//echo $nim;
						//echo $kd_mk;
						//echo $id_pengenal;
						
						$query="select * from tb_nilaiakhir where nim='$nim' and kd_mk='$kd_mk' and kd_modul='$kd_modul' nilai='$jumlahNilai;'";
						//echo $query;
						
						//$aksi1=mysql_query($query);						
						//while ($data1=mysql_fetch_array($aksi1))//{

						if($data1['nilai'])
						{
							$query="INSERT INTO `tb_nilaiakhir` (
								`nim` ,
								`kd_mk` ,
								`kd_modul` ,
								`nilai` ,
								`id_asisten` ,
								`tanggal`
								)
								VALUES (
								'$nim', '$kd_mk', '$kd_modul', '$jumlahNilai', '$id_pengenal', NOW())";
							$result = $mysqli->query($query);
							return;	
						}else
						{
						 
						}
						
						//}
											
					?>
					  <tr>	
						<td class="alert-info"> <?php echo $no=$no+1; ?> </td>
						<td class="alert-info"> <?php echo $rowx['judul']; ?> ( <?php echo $rowx['bobot']; ?> ) </td>
						<td class="alert-info">  <?php echo $rowx['keterangan']; ?> </td>
						<td class="alert-info">  <?php echo $rowx['nilaiawal']; ?> </td>
						<td class="alert-info"> <?php echo $jumlahNilai;?> </td>
						<td class="alert-info">  <?php echo $nilaiakhir ?> </td>
						<td class="alert-info"> <a href="#myModal<?php echo $idnilai2 ?> " role="button" class="btn btn-success" data-toggle="modal" title="Tambah"><i class="icon-tags" title="Penilaian"></i> Nilai</a>
						<a href="#myModaledit<?php echo $idnilai2 ?>" role="button" class="btn btn-success" data-toggle="modal" title="Edit"><i class="icon-pencil" title="Penilaian"></i> Edit</a></td>
					  </tr>
					  
					  <?php
						} 
						?>
						
					</tbody>
				  </table>
				  
				</div>
					<div class="alert alert-danger" align="center">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong class="btn btn-primary"> Total Nilai : 
							<?php
								echo $total;
							?>
							</strong> 
					</div>
				  
				 <?php
						$query3=mysql_query("SELECT tb_matakuliah.kd_mk, tb_matakuliah.nama_mk, tb_mdl_praktikum.nm_modul, tb_mdl_praktikum.kd_modul from tb_matakuliah inner join tb_mdl_praktikum on tb_matakuliah.kd_mk = tb_mdl_praktikum.kd_mk   WHERE tb_mdl_praktikum.kd_modul ='$kd_modul'");

						$row9=mysql_fetch_array($query3);
						
						$datax=mysql_query("SELECT *
							FROM tb_idpenilaianpelaksananpraktikum
							WHERE kd_mk = '$kd_mk'
							AND kd_modul = '$kd_modul'");
						
			
						while($rowx=mysql_fetch_array($datax)){
						$idnilai2 = $rowx['id'];
						?> 
						<br/>
						
						<!-- Pop up Modal -->
						<div id="myModal<?php echo $idnilai2 ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h3 id="myModalLabel"><?php echo $rowx['judul']; ?></h3>
						  </div>
						  <div class="modal-body">
						  
						  <form id="form" action="action.php?action=add_penilaian&idpenilaian=<?php echo $idnilai2 ?>&modul=<?php echo $kd_mk ?>&kd_modul=<?php echo $kd_modul ?>&nim=<?php echo $nim ?>&id_asisten=<?php echo $id_pengenal ?>" method="post">
						  <!-- Kirim variabel Post untuk redirect kehalaman penilaian -->
							<input type="hidden" name=
							"tanggal" id="tanggal" value=
							"<? echo $tanggal?>" />
							<input type="hidden" name=
							"waktu" id="waktu" value=
							"<? echo $waktu?>" />
							<input type="hidden" name=
							"kd_modul" id="kd_modul" value=
							"<? echo $kd_modul?>" />
							<input type="hidden" name=
							"nim" id="nim" value=
							"<? echo $nim?>" />
							<input type="hidden" name=
							"id" id="id" value=
							"<? echo $idpenilaian?>" />
							<!-- /End Post -->
							
						   <div class="control-group">
							<label class="control-label"></label>
							<?php
							
							$sql1="select tb_idpenilaianpelaksananpraktikum.id, tb_idpenilaianpelaksananpraktikum.kd_mk, tb_idpenilaianpelaksananpraktikum.kd_modul, tb_idpenilaianpelaksananpraktikum.judul, tb_idpenilaianpelaksananpraktikum.keterangan, tb_idpenilaianpelaksananpraktikum.nilaiawal, tb_idpenilaianpelaksananpraktikum.bobot, tb_penilaianpelaksananpraktikum.idpenilaian, tb_penilaianpelaksananpraktikum.indexnilai, tb_klasifikasipenilaian.indexnilai, tb_klasifikasipenilaian.noid, tb_klasifikasipenilaian.jenispenilaian, tb_klasifikasipenilaian.media, tb_klasifikasipenilaian.oprasi, tb_klasifikasipenilaian.nilai, tb_bankpenilaian.noid, tb_bankpenilaian.namapenilaian from tb_idpenilaianpelaksananpraktikum inner join tb_penilaianpelaksananpraktikum on tb_idpenilaianpelaksananpraktikum.id = tb_penilaianpelaksananpraktikum.idpenilaian inner join tb_klasifikasipenilaian ON tb_penilaianpelaksananpraktikum.indexnilai = tb_klasifikasipenilaian.indexnilai inner join tb_bankpenilaian ON tb_klasifikasipenilaian.noid = tb_bankpenilaian.noid where tb_idpenilaianpelaksananpraktikum.id='$idnilai2' group by tb_bankpenilaian.namapenilaian ";
							$aksi1=mysql_query($sql1);
							while ($data1=mysql_fetch_array($aksi1))
							{
							
							?>
							
							<div class="controls">
								 <div class="accordion" id="accordion2">
								  <div class="accordion-group">
									<div class="accordion-heading ">
									  <a class="accordion-toggle alert-info" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $data1['noid'] ?>">
										<?php echo $data1['namapenilaian']; ?>
									  </a>
									</div>
									<div id="collapse<?php echo $data1['noid'] ?>" class="accordion-body collapse">
									  <div class="accordion-inner">
									  <?php
										$index=$data1['noid'];
										//echo $index;
										$data2=mysql_query("SELECT * FROM  tb_klasifikasipenilaian WHERE noid='$index'");

										while ($row6=mysql_fetch_array($data2)){
										?>
										<table class="table table-bordered">
											<tr>
												<td width="350"><?php echo $row6['jenispenilaian'];?></td>
												<td width="50"><a HREF="keteranganjenispenilaian.php"
													onClick="popup = window.open('keteranganjenispenilaian.php?a=<?php echo $row6['noid'];?>&b=<?php echo $row6['jenispenilaian'];?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false"target="_blank"> Ket
												</td>
												<td width="50"><?php echo $row6['oprasi'];?></td>
												<td width="50"><?php echo $row6['nilai'];?></td>
												<td width="50">
												<?php
												if($row6['media']==0)
													{?> <input type="radio"
														name="indexnilai<?php echo $row6['indexnilai'];?>" value="<?php echo $row6['indexnilai']."<br>"."on";?>" checked>No <br>
													<input type="radio"
														name="indexnilai<?php echo $row6['indexnilai'];?>" value="<?php echo $row6['indexnilai']."<br>"." ";?>">Yes <?php }
														else
														{
															echo $row6['nilai']."(MAX)";
														}
														?></td>
											</tr>
										</table>
										<?php
										
										}
										?>
									  </div>
									  
									</div>
									
								  </div>
								  
								</div>
								
							</div> <!-- /controls -->
							<?php
							
							}
							?>
						
						</div> <!-- /control-group -->
						  </div>
						  <div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button class="btn btn-primary">Save changes</button>
						  </div>
						  </form>
						</div>
						<!-- End Modal Add  -->		
						
						<!-- Pop up Edit Modal -->
						<div id="myModaledit<?php echo $idnilai2 ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabeledit" aria-hidden="true">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h3 id="myModalLabeledit">Edit <?php echo $rowx['judul']; ?></h3>
						  </div>
						  <div class="modal-body">
							<div class="alert alert-danger" align="center">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong class="btn btn-primary"> Edit nilai dari awal
								</strong> 
							</div>
						  <form id="form" action="action.php?action=edit_penilaian&idpenilaian=<?php echo $idnilai2 ?>&modul=<?php echo $kd_mk ?>&kd_modul=<?php echo $kd_modul ?>&nim=<?php echo $nim ?>&id_asisten=<?php echo $id_pengenal ?>" method="post">
						  <!-- Kirim variabel Post untuk redirect kehalaman penilaian -->
							<input type="hidden" name=
							"tanggal" id="tanggal" value=
							"<? echo $tanggal?>" />
							<input type="hidden" name=
							"waktu" id="waktu" value=
							"<? echo $waktu?>" />
							<input type="hidden" name=
							"kd_modul" id="kd_modul" value=
							"<? echo $kd_modul?>" />
							<input type="hidden" name=
							"nim" id="nim" value=
							"<? echo $nim?>" />
							<input type="hidden" name=
							"id" id="id" value=
							"<? echo $idpenilaian?>" />
							<!-- /End Post -->
							
						   <div class="control-group">
							<label class="control-label"></label>
							<?php
							
							$sql1="select tb_idpenilaianpelaksananpraktikum.id, tb_idpenilaianpelaksananpraktikum.kd_mk, tb_idpenilaianpelaksananpraktikum.kd_modul, tb_idpenilaianpelaksananpraktikum.judul, tb_idpenilaianpelaksananpraktikum.keterangan, tb_idpenilaianpelaksananpraktikum.nilaiawal, tb_idpenilaianpelaksananpraktikum.bobot, tb_penilaianpelaksananpraktikum.idpenilaian, tb_penilaianpelaksananpraktikum.indexnilai, tb_klasifikasipenilaian.indexnilai, tb_klasifikasipenilaian.noid, tb_klasifikasipenilaian.jenispenilaian, tb_klasifikasipenilaian.media, tb_klasifikasipenilaian.oprasi, tb_klasifikasipenilaian.nilai, tb_bankpenilaian.noid, tb_bankpenilaian.namapenilaian from tb_idpenilaianpelaksananpraktikum inner join tb_penilaianpelaksananpraktikum on tb_idpenilaianpelaksananpraktikum.id = tb_penilaianpelaksananpraktikum.idpenilaian inner join tb_klasifikasipenilaian ON tb_penilaianpelaksananpraktikum.indexnilai = tb_klasifikasipenilaian.indexnilai inner join tb_bankpenilaian ON tb_klasifikasipenilaian.noid = tb_bankpenilaian.noid where tb_idpenilaianpelaksananpraktikum.id='$idnilai2' group by tb_bankpenilaian.namapenilaian ";
							$aksi1=mysql_query($sql1);
							while ($data1=mysql_fetch_array($aksi1))
							{
							
							?>
							
							<div class="controls">
								 <div class="accordion" id="accordion">
								  <div class="accordion-group">
									<div class="accordion-heading ">
									  <a class="accordion-toggle alert-info" data-toggle="collapse" data-parent="#accordion" href="#collap<?php echo $data1['noid'] ?>">
										<?php echo $data1['namapenilaian']; ?>
									  </a>
									</div>
									<div id="collap<?php echo $data1['noid'] ?>" class="accordion-body collapse">
									  <div class="accordion-inner">
									  <?php
										$index=$data1['noid'];
										//echo $index;
										$data2=mysql_query("SELECT * FROM  tb_klasifikasipenilaian WHERE noid='$index'");

										while ($row6=mysql_fetch_array($data2)){
										?>
										<table class="table table-bordered">
											<tr>
												<td width="350"><?php echo $row6['jenispenilaian'];?></td>
												<td width="50"><a HREF="keteranganjenispenilaian.php"
													onClick="popup = window.open('keteranganjenispenilaian.php?a=<?php echo $row6['noid'];?>&b=<?php echo $row6['jenispenilaian'];?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false"target="_blank"> Ket
												</td>
												<td width="50"><?php echo $row6['oprasi'];?></td>
												<td width="50"><?php echo $row6['nilai'];?></td>
												<td width="50">
												<?php
												if($row6['media']==0)
													{?> <input type="radio"
														name="indexnilai<?php echo $row6['indexnilai'];?>" value="<?php echo $row6['indexnilai']."<br>"."on";?>" checked>N0 <br>
													<input type="radio"
														name="indexnilai<?php echo $row6['indexnilai'];?>" value="<?php echo $row6['indexnilai']."<br>"." ";?>">Yes <?php }
														else
														{
															echo $row6['nilai']."(MAX)";
														}
														?></td>
											</tr>
										</table>
										<?php
										
										}
										?>
									  </div>
									  
									</div>
									
								  </div>
								  
								</div>
								
							</div> <!-- /controls -->
							<?php
							
							}
							?>
						
						</div> <!-- /control-group -->
						  </div>
						  <div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button class="btn btn-primary">Save changes</button>
						  </div>
						  </form>
						</div>
						<!-- End Modal Edit -->	
					</div>
					<?php
						}
						?>
		</div>
   </div>
</div>

<!-- /widget-header -->

<?php
require_once'template/footer.php';
?>