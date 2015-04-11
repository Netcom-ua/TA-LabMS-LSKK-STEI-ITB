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
              <h3>Halaman Dosen</h3>
            </div>
			
			<?php $data=mysql_query("select * from tb_matakuliah where kd_mk='$modul'");
				//echo $data;
				while ($row=mysql_fetch_array($data)){
				$nm_mk = $row['nama_mk'];
			?>
            <div class="widget-content">
			<h3 class="bigstats" align="center"><?php echo $row['kd_mk']; ?> <?php echo $row['nama_mk']; ?> 
			</h3> 
			<br/><br/>
			<?php 
				$data=mysql_query("select * from tb_mdl_praktikum where kd_mk='$modul'");
				$n=1;
				while($row=mysql_fetch_array($data)){
				$kode_modul = $row['kd_modul'];
			?>
				
				<table width="690" align="center">
					<td width="680">
						<h3 align="center"><?php echo $row['kd_modul']?> </h3>
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
						
						<h3 align="center">Data Modul </h3>
						<hr/>
						 <table class="table table-bordered">
							  <tr>
								<td width="20" class="alert alert-primary"> No </td>
								<td class="alert alert-primary">Judul </td>
								<td class="alert alert-primary"> Download Modul</td>
							  </tr>
							<tbody>
							<?php 
								$data1=mysql_query("select * from tb_mdl_data where kd_modul='$kode_modul'");
								$no=1;
								//echo $kode_modul;
								while($row1=mysql_fetch_array($data1)){
								?>
							  <tr>	
								<td> <?php echo $no ?> </td>
								<td><?php echo $row1['judul_modul'];?>  </td>
								<td> <a href="../tatausaha/upload/modul/<?php echo $row1['nama_file']; ?>" class="btn btn-small btn-primary"><?php  $nama_file = explode('/',$row1['nama_file']); echo Download; ?></a></td>
							  </tr>
							  <?php 
								$no++;
								} 
								?>
							</tbody>
						</table>
						
						<h3 align="center">Data Penilaian </h3>
						
						<hr/>
						<table class="table table-bordered">
							<thead>
							  <tr>
								<td class="alert alert-success"> No </td>
								<td class="alert alert-success"> Judul </td>
								<td class="alert alert-success"> Nilai Awal </td>
								<td class="alert alert-success"> Bobot </td>
							  </tr>
							</thead>
						<tbody>
						<!-- Menampilkan daftar tugas Mahasiswa  -->
						<?php 
							//echo	$kode_modul;
							$data2=mysql_query("SELECT * from tb_idpenilaianpelaksananpraktikum WHERE kd_modul = '$kode_modul'");
							$no=0;
							while($row2=mysql_fetch_array($data2)){
							?>
							<tr>	
							<td> <?php echo $no=$no+1;?> 
							
							<td><?php echo $row2['judul']?></td>
							
							<td> <?php echo $row2['nilaiawal']?></td>
							
							<td> <?php echo $row2['bobot']?></td>
							
							</td>
							
						  <?php 
							} 
							?>
						</tbody>
						</table>
						
						
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
						  
							<td> <?php echo $no=$no+1;?>
							<td> <?php echo $row2['tgl_praktikum'];?> 
							
							<td><?php echo $row2['judul_tugas']?></td>
							
							<td> <?php echo $row2['tgl_buka']?>
							
							<?php echo $row2['w_buka']?></td>
							
							<td> <?php echo $row2['tgl_tutup']?>
							
							<?php echo $row2['w_tutup']?></td>
							
							
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