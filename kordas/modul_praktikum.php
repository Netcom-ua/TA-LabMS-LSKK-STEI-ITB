<?php
	require'template/header.php';
	
	#baca variabel URL (if register global on)
	$modul = $_GET['modul'];
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
		<!-- Mengakibatkan table tidak responsive -->
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Tata Usaha</h3>
            </div>
			
			<?php $data=mysql_query("select * from tb_matakuliah where kd_mk='$modul'");
				//echo $data;
				while ($row=mysql_fetch_array($data)){
				$kd_mk = $row['kd_mk'];
			?>
            <div class="widget-content">
			<h3 class="bigstats" align="center"><?php echo $row['kd_mk']; ?> <?php echo $row['nama_mk']; ?> <a href="add_modul.html?add_modul=<?php echo $row['kd_mk'];?>" <i class="icon-list-alt"> Tambah Modul</i></a> 
			</h3> 
			<br/><br/>
			<?php 
				$data=mysql_query("select * from tb_mdl_praktikum where kd_mk='$modul' order by kd_modul asc");
				$n=1;
				while($row=mysql_fetch_array($data)){
				$kode_modul = $row['kd_modul'];
			?>
				
				<table width="690" align="center">
					<td width="680">
						<h3 align="center"><?php echo $kode_modul?> <a href="#editModul<?php echo $kode_modul ?>" role="button" data-toggle="modal"><i class="icon-pencil" title="Add Modul" ></i></a>&nbsp;&nbsp;<a
						href="javascript:if(confirm('Anda yakin akan menghapus data ini ?')){document.location='action.php?action=delpraktikum&kd_modul=<?php echo $kode_modul ?>&modul=<?php echo $modul?>';}"><i class="icon-trash" title="Hapus" ></i> </a></h3>
						<hr/>
						<table class="table table-bordered">
							<tr>
								<td width="100" class="alert alert-success"><h3>Modul Ke-<?php echo $n ?></h3></td>
								<td class="alert alert-success"><h3><?php echo $row['nm_modul']?>
								(Bobot Modul: <?php echo $row['bobot'];?>)</h3></span> </td>
							</tr>
							<tr>
								<td>Deskripsi</td>
								<td><?php echo $row['deskripsi'];?></td>
							</tr>
						</table>
						
						<!-- Edit Modul Praktikum -->
						<div class="control-group">
							<div class="controls">
							 <!-- Button to trigger modal -->
							<!-- Modal -->
							<div id="editModul<?php echo $kode_modul ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
								<h3 id="myModalLabel">Edit Praktikum</h3>
							  </div>
							  <div class="modal-body">
								<div class="field">
								<form id="form" enctype="multipart/form-data"  action="action.php?action=editpraktikum&kd_modul=<?php echo $kode_modul ?>&modul=<?php echo $modul?>" method="post">
									<label for="nama">Kode Matakuliah :</label>
									<input class="alert alert-info" id="kd_mk" name="kd_mk" type="hidden" value="<?php echo $row['kd_mk']?>">
									<input class="alert alert-info" id="" name="" type="text" value="<?php echo $row['kd_mk']?>" required="" disabled="disabled">
									
									<label for="nama">Kode Modul :</label>
									<input class="alert alert-info" id="kd_modul" name="kd_modul" type="hidden" value="<?php echo $kode_modul ?>"">
									<input class="alert alert-info" id="" name="" type="text" value="<?php echo $kode_modul ?>" required="" disabled="disabled">
									
									<label for="nama">Nama Praktikum :</label>
									<textarea rows="5" class="alert alert-info" id="nm_modul" name="nm_modul" placeholder="" required=""><?php echo $row['nm_modul'] ?></textarea>
									
									<label for="nama">Singkatan :</label>
									<input class="alert alert-info" id="singkatan" name="singkatan" type="text" value="<?php echo $row['singkatan'] ?>" placeholder="Singkatan" required="">
									
									<label for="nama">Deskripsi :</label>
									<textarea rows="5" class="alert alert-info" id="deskripsi" name="deskripsi" placeholder="deskripsi" required=""><?php echo $row['deskripsi'] ?></textarea>
									
									
									<label for="nama">Koordinator Asisten :</label>
									<select class="input-xlarge" id="" name="nama_kordas" title="Koordinator Asisten" class="login" type="text" required="required">
									
									<option value="<?php echo $row['nama_kordas'];?>">
									<?php echo $row['nama_kordas']?> </option>
									
									<?php
									$query =  "select * from tb_user where level='kordas'";
									//var_dump($query);
									$result = $mysqli->query($query)
									or die('<b>-- Query failed -- </b> ' . mysql_error());
									while ($row = $result->fetch_array()){
									?>	
									<option value="<?php echo $row['nama_user'];?>">
									<?php echo $row['nama_user']?> |  <?php echo $row['id_pengenal'];?> </option>
									<?php 
									}
									?>
									</select>
							 </div> <!-- /field -->
							  </div>
							  <div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
								<button class="btn btn-primary" name="btnUpload">Update</button>
							  </div>
							</div>
							</form>
							</div> <!-- /controls -->	
						</div> <!-- /control-group -->
						<!-- END Edit praktikum -->
						
						<h3 align="center">Data Modul <a href="#addModul<?php echo $kode_modul ?>" role="button" class="btn btn-success"data-toggle="modal"><i class="icon-plus" title="Add Modul" ></i> Add</a></h3>
						<hr/>
						 <table class="table table-bordered">
							  <tr>
								<td width="20" class="alert alert-primary"> No </td>
								<td class="alert alert-primary">Judul </td>
								<td class="alert alert-primary">Nama File </td>
								<td class="alert alert-primary"> Download Modul</td>
								<td class="alert alert-primary"> </td>
							  </tr>
							<tbody>
							<?php 
							
								$data7=mysql_query("select * from tb_mdl_data where kd_modul='$kode_modul'");
								$no=1;
								//echo $kode_modul;
								while($row1=mysql_fetch_array($data7)){
								$jd_modul = $row1['judul_modul'];
								$nm_file = $row1['nama_file'];
								$ket_file = $row1['ket_file'];
								?>
							  <tr>							  
								<td> <?php echo $no ?> </td>
								<td><?php echo $row1['judul_modul'];?>  </td>
								<td><?php echo $row1['nama_file'];?>  </td>
								<td> <a href="../tatausaha/upload/modul/<?php echo $row1['nama_file']; ?>" class="btn btn-small btn-primary"><?php  $nama_file = explode('/',$row1['nama_file']); echo Download; ?></a></td>
								<td><a href="#editModulprak<?php echo $kode_modul ?>" role="button" data-toggle="modal"><button class="btn btn-danger btn-small" >Edit</button></a>
								<a href="action.php?action=delmodul&kd_modul=<?php echo $kode_modul ?>&modul=<?php echo $modul?>"><button class="btn btn-danger btn-small" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')" >Delete</button></a></td>
							  </tr>
							  <?php 
								} 
								?>
							</tbody>
						</table>
						
						<!-- Add Modul -->
						<div class="control-group">
							<div class="controls">
							 <!-- Button to trigger modal -->
							<!-- Modal -->
							<div id="addModul<?php echo $kode_modul ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
								<h3 id="myModalLabel">Tambah Modul Praktikum</h3>
							  </div>
							  <div class="modal-body">
								<div class="field">
								<form method="post" enctype="multipart/form-data" action="action.php?action=add_modul">
									<label for="nama">Kode Matakuliah :</label>
									<input class="alert alert-info" id="kd_mk" name="kd_mk" type="hidden" value="<?php echo $kd_mk ?>">
									<input class="alert alert-info" id="" name="" type="text" value="<?php echo $kd_mk ?>" required="" disabled="disabled">
									
									<label for="nama">Kode Modul :</label>
									<input class="alert alert-info" id="kd_modul" name="kd_modul" type="hidden" value="<?php echo $kode_modul ?>"">
									<input class="alert alert-info" id="" name="" type="text" value="<?php echo $kode_modul ?>" required="" disabled="disabled">
									
									<label for="nama">Judul Modul :</label>
									<input class="alert alert-info" id="judul" name="judul" type="text" value="" placeholder="Judul Penilaian" required="">
									
									<label for="nama">Keterangan :</label>
									<textarea rows="5" class="alert alert-info" id="keterangan" name="keterangan" placeholder="Keterangan" required=""></textarea>
									
									<label for="nama">File :</label>
									<input type="file" name="file" required=""/>
									
							  </div> <!-- /field -->
							  </div>
							  <div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
								<button class="btn btn-primary" name="btnUpload">Upload</button>
							  </div>
							</div>
							</form>
							</div> <!-- /controls -->	
						</div> <!-- /control-group -->
						<!-- END Add Modul -->
						
						<!-- Edit Modul -->
						<div class="control-group">
							<div class="controls">
							 <!-- Button to trigger modal -->
							<!-- Modal -->
							<div id="editModulprak<?php echo $kode_modul ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
								<h3 id="myModalLabel">Edit Data Modul</h3>
							  </div>
							  
							  <div class="modal-body">
								<div class="field">
								<form method="post" enctype="multipart/form-data" action="action.php?action=editmodul">
									<label for="nama">Kode Matakuliah :</label>
									<input class="alert alert-info" id="kd_mk" name="kd_mk" type="hidden" value="<?php echo $kd_mk ?>">
									<input class="alert alert-info" id="" name="" type="text" value="<?php echo $kd_mk ?>" required="" disabled="disabled">
									
									<label for="nama">Kode Modul :</label>
									<input class="alert alert-info" id="kd_modul" name="kd_modul" type="hidden" value="<?php echo $kode_modul ?>">
									<input class="alert alert-info" id="" name="" type="text" value="<?php echo $kode_modul ?>" required="" disabled="disabled">
									
									<label for="nama">Judul Modul :</label>
									<textarea rows="5" class="alert alert-info" id="jd_modul" name="jd_modul" placeholder="" required=""><?php echo $jd_modul ?>
									</textarea>
									
									<label for="nama">Keterangan Modul :</label>
									<textarea rows="5" class="alert alert-info" id="ket_file" name="ket_file" placeholder="" required=""><?php echo $ket_file ?>
									</textarea>
									
									<label for="nama">Nama File :</label>
									<textarea rows="5" class="alert alert-info" id="file" name="file" placeholder="" required="" disabled="disabled"><?php echo $nm_file ?>
									</textarea>
									
									<label for="nama">File :</label>
									<input type="file" name="file" />

							 </div> <!-- /field -->
							  </div>
							  <div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
								<button class="btn btn-primary" name="btnUpload">Update</button>
							  </div>
							</div>
							</form>
							</div> <!-- /controls -->	
						</div> <!-- /control-group -->
						<!-- END Edit Modul -->
						
				
						<h3 align="center">Data Penilaian<a href="#myModal<?php echo $kode_modul ?>" role="button" class="btn btn-success" data-toggle="modal" title="Tambah"><i class="icon-tags" title="Edit"></i> Add</a></h3>
						
						<hr/>
						<table class="table table-bordered">
							<thead>
							  <tr>
								<td class="alert alert-success"> No </td>
								<td class="alert alert-success"> Judul </td>
								<td class="alert alert-success"> Nilai Awal </td>
								<td class="alert alert-success"> Bobot </td>
								<td class="alert alert-success"> </td>
							  </tr>
							</thead>
						<tbody>
						<!-- Menampilkan daftar tugas Mahasiswa  -->
						<?php 
							//echo	$kode_modul;
							$data2=mysql_query("SELECT * from tb_idpenilaianpelaksananpraktikum WHERE kd_modul = '$kode_modul'");
							$no=0;
							while($row2=mysql_fetch_array($data2)){
							$id = $row2['id'];
							$judul = $row2['judul'];
							$keterangan = $row2['keterangan'];
							$nilaiawal = $row2['nilaiawal'];
							$bobot = $row2['bobot'];
							?>
							<tr>	
							<td> <?php echo $no=$no+1;?> 
							
							<td><?php echo $row2['judul']?></td>
							
							<td> <?php echo $row2['nilaiawal']?></td>
							
							<td> <?php echo $row2['bobot']?></td>
							
							<td><a href="#editDataPenilaian<?php echo $kode_modul ?><?php echo $id ?>" role="button" data-toggle="modal"><button class="btn btn-danger btn-small" >Edit</button></a>
							<a href="action.php?action=deldatanilai&id=<?php echo $id ?>&modul=<?php echo $modul?>"><button class="btn btn-danger btn-small" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')" >Delete</button></a></td>
							</td>
							<!-- Edit Data Penilaian -->
						<div class="control-group">
							<div class="controls">
							 <!-- Button to trigger modal -->
							<!-- Modal -->
							<div id="editDataPenilaian<?php echo $kode_modul ?><?php echo $id ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
								<h3 id="myModalLabel">Edit Data Penilaian</h3>
							  </div>
							  
							  <div class="modal-body">
								<div class="field">
								<form method="post" action="action.php?action=editdatanilai&modul=<?php echo $kd_mk ?>">
									<label for="nama">Kode Matakuliah :</label>
									<input class="alert alert-info" id="kd_mk" name="id" type="hidden" value="<?php echo $id ?>">
									<input class="alert alert-info" id="kd_mk" name="kd_mk" type="hidden" value="<?php echo $kd_mk ?>">
									<input class="alert alert-info" id="" name="" type="text" value="<?php echo $kd_mk ?>" required="" disabled="disabled">
									
									<label for="nama">Kode Modul :</label>
									<input class="alert alert-info" id="kd_modul" name="kd_modul" type="hidden" value="<?php echo $kode_modul ?>">
									<input class="alert alert-info" id="" name="" type="text" value="<?php echo $kode_modul ?>" required="" disabled="disabled">
									
									<label for="nama">Judul :</label>
									<input class="alert alert-info" id="" name="judul" type="text" value="<?php echo $judul ?>" required="">
									
									<label for="nama">Keterangan Modul :</label>
									<textarea rows="5" class="alert alert-info" id="keterangan" name="keterangan" placeholder="" required=""><?php echo $keterangan ?>
									</textarea>
									
									<label for="nama">Nilai Awal :</label>
									<input class="alert alert-info" id="" name="nilaiawal" type="text" value="<?php echo $nilaiawal ?>" required="">
									
									<label for="nama">Bobot :</label>
									<input class="alert alert-info" id="" name="bobot" type="text" value="<?php echo $bobot ?>" required="">

							 </div> <!-- /field -->
							  </div>
							  <div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
								<button class="btn btn-primary" name="btnUpload">Update</button>
							  </div>
							</div>
							</form>
							</div> <!-- /controls -->	
						</div> <!-- /control-group -->
						<!-- END Edit Data Penilaian -->
	
						  <?php 
							} 
							?>
						</tbody>
						</table>
						
						
						<!-- Tambah Penilaian -->
							<div id="myModal<?php echo $kode_modul ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
								<h3 id="myModalLabel">Tambah Penilain</h3>
							  </div>
							  <div class="modal-body">
							  <form id="form" action="action.php?action=add_penilaian&modul=<?php echo $modul?>&kd_modul=<?php echo $row['kd_modul'] ?>" method="post">
								<div class="field">
							
									<label for="nama">Kode Matakuliah :</label>
									<input class="alert alert-info" id="kd_mk" name="kd_mk" type="text" value="<?php echo $kd_mk ?>" required="" disabled="disabled">
									
									<label for="nama">Kode Modul :</label>
									<input class="alert alert-info" id="kd_modul" name="kd_modul" type="text" value="<?php echo $kode_modul ?>" required="" disabled="disabled">
									
									<label for="nama">Judul Penilaian :</label>
									<input class="alert alert-info" id="judul" name="judul" type="text" value="" placeholder="Judul Penilaian" required="">
									
									<label for="nama">Keterangan :</label>
									<textarea class="alert alert-info" id="keterangan" name="keterangan" placeholder="Keterangan" required=""></textarea>
																		
									<label for="nama">Nilai Awal :</label>
									<input class="alert alert-info" id="nilai" name="nilai" type="text" value="" placeholder="Nilai Awal" required="">
									
									<label for="nama">Bobot :</label>
									<input class="alert alert-info" id="bobot" name="bobot" type="text" value="" placeholder="bobot"required="">
							  </div> <!-- /field -->
							  
							   <div class="control-group">
								<label class="control-label"></label>
								<?php
							  $query5=mysql_query("SELECT tb_bankpenilaian.noid, tb_bankpenilaian.namapenilaian, tb_klasifikasipenilaian.jenispenilaian, tb_klasifikasipenilaian.ketjenispenilaian, tb_klasifikasipenilaian.media, tb_klasifikasipenilaian.oprasi, tb_klasifikasipenilaian.nilai
								FROM tb_bankpenilaian
								INNER JOIN tb_klasifikasipenilaian ON tb_klasifikasipenilaian.noid = tb_bankpenilaian.noid
								GROUP BY tb_bankpenilaian.namapenilaian
								");
								
								while ($row5=mysql_fetch_array($query5))
								{
								
							  ?>
								<div class="controls">
									 <div class="accordion" id="accordion2">
									  <div class="accordion-group">
										<div class="accordion-heading ">
										
							
										  <a class="accordion-toggle alert-info" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $row5['noid'] ?>">
											<?php echo $row5['namapenilaian']; ?>
										  </a>
										</div>
										<div id="collapse<?php echo $row5['noid'] ?>" class="accordion-body collapse">
										  <div class="accordion-inner">
										  <?php
											$index=$row5['noid'];
											//echo $index;
											$data1=mysql_query("SELECT * FROM  tb_klasifikasipenilaian WHERE noid='$index'");

											while ($row6=mysql_fetch_array($data1)){

										  ?>
											<table class="table table-bordered">
												<tr>
													<td width="350"><?php echo $row6['jenispenilaian'];?></td>
													<td width="50"><?php 
													if($row6['media']==0)
													{echo "CekBox";}
													else
													{echo "TextBox";}
													?>
													</td>
													<td width="50"><?php echo $row6['oprasi'];?></td>
													<td width="50"><?php echo $row6['nilai'];?></td>
													<td width="50"><a HREF="keteranganjenispenilaian.php"
														onClick="popup = window.open('keteranganjenispenilaian.php?a=<?php echo $row6['noid'];?>&b=<?php echo $row6['jenispenilaian'];?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false"
														target="_blank"> Lihat</td>
													<td width="50"><input type="checkbox"
														name="indexnilai<?php echo $row6['indexnilai'];?>" value="<?php echo $row6['indexnilai'];?>"></td>
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
							<!-- /END Tambah Penilaian -->
						
						<h3 align="center">Data Tugas </h3>
						<hr/>
						<table class="table table-bordered">
							<thead>
							  <tr>
								<td class="alert alert-info">  No </td>
								<td class="alert alert-info">  Tanggal Praktikum </td>
								<td class="alert alert-info">  Judul Tugas </td>
								<td class="alert alert-info">  Tanggal Buka</td>
								<td class="alert alert-info">  Tanggal Tutup </td>
								<td class="alert alert-info">  Keterangan</td>
							  </tr>
							</thead>
						<tbody>
						<!-- Menampilkan daftar tugas Mahasiswa  -->
						<?php 
							//echo	$kode_modul;
							$data2=mysql_query("SELECT * from tb_list_upload_tugas WHERE kd_modul = '$kode_modul'ORDER BY tgl_praktikum ASC ");
							$no=0;
							while($row2=mysql_fetch_array($data2)){
							?>
						  <tr>	
						  <form id="form" enctype="multipart/form-data"  action="action.php?action=uptugas&tgl_praktikum=<?php echo $row2['tgl_praktikum'] ?>&modul=<?php echo $modul?>" method="post">
							
							<td> <?php echo $no=$no+1;?>
							<td> <?php echo $row2['tgl_praktikum'];?> 
							
							<td><input id="judul_tugas" name="judul_tugas" type="text" value="<?php echo $row2['judul_tugas']?>" required=""></td>
							
							<td> <input  id="tgl_buka" name="tgl_buka" type="text" value="<?php echo $row2['tgl_buka']?>" required="">
							
							<input  id="w_buka" name="w_buka" type="text" value="<?php echo $row2['w_buka']?>" required=""></td>
							
							<td> <input  id="tgl_tutup" name="tgl_tutup" type="text" value="<?php echo $row2['tgl_tutup']?>" required="">
							
							<input  id="w_tutup" name="w_tutup" type="text" value="<?php echo $row2['w_tutup']?>" required=""></td>
							
							<td><button class="btn btn-danger btn-small" onclick="return confirm('Apakah Anda yakin ingin merubah data ini ?')" >Update</button></td>
							</td>
							
							</form>

						  <?php 
							} 
							?>
						</tbody>
						</table>
						</table>
					</td>
				</table>
			
					<div class="alert alert-danger" align="center"></div>
				
			<?php
				$n++;
			}
			?>
			<?php
			}
			?>
				
			  </div>
				</div>
          	<!-- /widget-header -->
			</div>  
          <!-- /widget --> 
        </div>  
      </div>
  </div>
<?php
	require'template/footer.php';
?>