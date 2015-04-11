<?php 
include'template/header.php';
#baca variabel URL (if register global on)
$tanggal = $_GET['tanggal'];
$waktu = $_GET['waktu'];
$kd_modul = $_GET['kd_modul'];

?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span5">
		<div class="widget">
            
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
          
          <!-- /widget -->
         
          <!-- /widget --> 
        </div>
        <!-- /span6 -->
        <div class="span7">
		<div class="widget widget-table action-table">
			<div class="control-group">
				<!--<label class="control-label"></label>-->
				<div class="controls">
				 <div class="accordion" id="accordion2">
				  <div class="accordion-group">
					<div class="accordion-heading">
					  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
						<div class="widget-header"> <i class="icon-user"></i>
							<!-- Menampilkan Jumlah data Mahasiswa  -->	
							
							<?php
								$sql="select * from  tb_jadwal_praktikum where id_asisten='$id_pengenal'";
								if ($result=mysqli_query($mysqli,$sql))
								  {
								  // Return the number of rows in result set
								  $rowcount1=mysqli_num_rows($result);
								  // Free result set
								  mysqli_free_result($result);
							  }
							?>
							  <h3> Praktikum : <?php echo $tanggal.' '.$waktu ?>&nbsp;<span class="badge badge-success pull-right" style="line-height:18px;" title="Belum dikonfirmasi"> <?php printf("%d",$rowcount1);?> </span></h3>
							</div>
						  </a>
						</div>
						<div id="collapseOne" class="accordion-body collapse in">
						  <div class="accordion-inner">
						 
							<center><h3>Mata Kuliah : <?php echo $data5['nama_mk']; ?> | Kode Modul : <?php echo $data5['kd_modul'];?></h3></center>
							<!-- /widget-header -->
							<div class="widget-content">
							  <table class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th> No </th>
									<th> NIM</th>
									<th> Mahasiswa</th>
									<th> Upload Tugas</th>
									<th> Download</th>
									<th> Tanggal Upload</th>
									<th class="td-actions"> </th>
								  </tr>
								</thead>
								<tbody>
								 <?php 
									$query ="SELECT tb_jadwal_praktikum.nim, tb_jadwal_praktikum.group, tb_jadwal_praktikum.ruangan,	tb_jadwal_praktikum.tanggal, tb_jadwal_praktikum.waktu, tb_matakuliah.nama_mk, tb_matakuliah.semester,	tb_matakuliah.akademik, tb_matakuliah.nip_dosen, tb_mdl_praktikum.kd_mk, tb_mdl_praktikum.kd_modul, tb_mdl_praktikum.nm_modul, tb_mdl_praktikum.singkatan, tb_mdl_praktikum.nama_kordas, tb_mahasiswa.nim, tb_mahasiswa.nama_mhs, tb_user.id_pengenal, tb_user.nama_user, tb_dosen.nama_dosen,
									tb_mdl_upload_laporan.nim AS nim_,
									tb_mdl_upload_laporan.file_name,
									tb_mdl_upload_laporan.kd_modul AS kd_modul_,
									tb_mdl_upload_laporan.date
									FROM tb_jadwal_praktikum INNER JOIN tb_matakuliah ON tb_jadwal_praktikum.kd_mk = tb_matakuliah.kd_mk INNER JOIN tb_mdl_praktikum ON tb_jadwal_praktikum.kd_modul = tb_mdl_praktikum.kd_modul INNER JOIN tb_mahasiswa ON tb_jadwal_praktikum.nim = tb_mahasiswa.nim INNER JOIN tb_mdl_upload_laporan ON tb_mahasiswa.nim = tb_mdl_upload_laporan.nim INNER JOIN tb_user ON tb_jadwal_praktikum.id_asisten = tb_user.id_pengenal INNER JOIN tb_dosen ON tb_dosen.nid = tb_matakuliah.nip_dosen where tb_jadwal_praktikum.tanggal='$tanggal' and tb_jadwal_praktikum.waktu ='$waktu' and tb_mdl_upload_laporan.kd_modul='$kd_modul' group by tb_mdl_upload_laporan.nim, tb_mdl_upload_laporan.kd_modul ";
									//echo $query;
									
									
										
									$query8="select * from tb_idpenilaianpelaksananpraktikum where kd_modul='$kd_modul'";
									$result = $mysqli->query($query8)
									or die('<b>-- Query failed -- </b> ' . mysql_error());
									$data8 = $result->fetch_array(); 
									
									$result = $mysqli->query($query)
									or die('<b>-- Query failed -- </b> ' . mysql_error());
									$no++;
									while ($data5 = $result->fetch_array()){
									$nim= $data5['nim'];
								?>
								<!-- Menampilkan data Mahasiswa yang belum dikonfirmasi -->
								
								  <tr>
									<td> <?php echo $no; ?> </td>
									<td> <?php echo $data5['nim']; ?> </td>
									<td> <?php echo $data5['nama_mhs']; ?> </td>
									<?php
									$a =$data5['nim'].' '.$data5['kd_modul'];
									$b =$data5['nim_'].' '.$data5['kd_modul_'];
									$file = $data5['nim'].'/'.$data5['file_name'];
									//echo $a;
									
									//echo $b;
									if(!empty($data5['file_name'])){
									?>	
									<td class="td-actions"> <b class="btn btn-small btn-primary"><?php echo $data5['file_name']; ?></td>
									<td><a href="../asisten/upload/<?php echo $file ?>" class="btn btn-small btn-primary"><?php  $file_name = explode('/',$data5['file_name']); echo Download; ?></a>
									</td>
									<td> <?php echo $data5['date']?></td>
									<?php
									}else{
									?>
									<td class="td-actions"> <b class="btn btn-small btn-warning">Belum diupload</td>
									<td> </td>
									<?php
									}
									?>
									<td class="td-actions"><a href="penilaian.html?tanggal=<?php echo $tanggal;?>&waktu=<?php echo $waktu;?>&kd_modul=<?php echo $kd_modul?>&nim=<?php echo $data5['nim'] ?>&id=<?php echo $data8['id'] ?>" class="btn btn-success"><i class="icon-only icon-book" title="Nilai Mahasiswa"> </i></a></td>
								  </tr>
								  <?php
									}
									?>
									
								</tbody>
							  </table>
							   
							</div>
						  </div>
						</div>
					  </div>
					</div>
				</div> <!-- /controls -->	
			</div> <!-- /control-group -->
            
          <!-- /widget -->
          
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
<?php 
include'template/footer.php';
?>