<?php 
include'template/header.php';
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span5">
		<div class="widget">
            <div class="widget-header"> <i class="icon-home"></i>
              <h3>Halaman Asisten Laboratorium</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts">
			  <a href="jadwal_praktikum_asisten.html" class="shortcut">
			  <i class="shortcut-icon icon-list-alt"></i>
			  <span class="shortcut-label">Jadwal Praktikum</span></a>
			  
			  <!--<a href="javascript:;" class="shortcut">
			  <i class="shortcut-icon icon-group"></i><span class="shortcut-label">Tukar Jadwal Asisten</span> </a>
			  
			  <a href="javascript:;" class="shortcut">
			  <i class="shortcut-icon icon-group"></i><span class="shortcut-label">Tukar Jadwal</span> </a>-->

			  <a href="software/list_software.php" class="shortcut">
			  <i class="shortcut-icon icon-facetime-video"></i><span class="shortcut-label">Video</span> </a>
			  <a href="javascript:;" class="shortcut">
			  <i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Software</span> </a>
			  <a href="javascript:;" class="shortcut">
			  <i class="shortcut-icon icon-file"></i><span class="shortcut-label">Hasil Penilaian</span> </a>
			  <a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-print "></i>
			  <span class="shortcut-label">Generate Laporan</span> </a> 
			  
			  <!-- Menampilkan Jumlah data Mahasiswa  -->	
				<?php
					$sql="select * from tb_mahasiswa";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			  <a href="#" class="shortcut"><i class="shortcut-icon icon-user"></i>
			   <span class="shortcut-label">Mahasiswa</span>
				<span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data">
			   <?php printf("%d",$rowcount);?></span> </a>
			   
			   <?php
					$sql="select * from tb_staf where jabatan='tu'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			   
			   <a href="#" class="shortcut"><i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Teknisi Laboratorium</span> <span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data"><?php printf("%d",$rowcount);?></span>  </a>
			   
			   <!-- Menampilkan Jumlah data Asisten  -->	
				<?php
					$sql="	";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount4=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
				
			   <a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-user"></i><span class="shortcut-label">Asisten Praktikum</span> <span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data"><?php printf("%d",$rowcount4);?></span> </a>
			   
			    <!-- Menampilkan Jumlah data Kordas  -->	
				<?php
					$sql="select * from tb_user where level='kordas'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			   <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-user"></i>
			   <span class="shortcut-label">Koordinator Asisten</span>
			   <span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data"><?php printf("%d",$rowcount);?></span> </a>
			   
			   <!-- Menampilkan Jumlah data Kepala Laboratorium  -->	
				<?php
					$sql="select * from tb_user where level='kalab'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			   <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-user"></i>
			   <span class="shortcut-label"> Kepala Laboratorium </span> <span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data"><?php printf("%d",$rowcount);?> </span> </a> </span> </a>
			   
			   <!-- Menampilkan Jumlah data Kepala Administrator  -->	
				<?php
					$sql="select * from tb_user where level='admin'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			   <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-user"></i>
			   <span class="shortcut-label">Administrator</span> <span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data"><?php printf("%d",$rowcount);?> </span> </a> </span> </a>
			   
			   <a href="javascript:;" class="shortcut"><span class="badge badge-warning pull-center" style="line-height:18px;"></span> <span class="shortcut-label">Jumlah Data</span></a>
			  </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
          <div class="widget-header"> 
			  <div class="widget-header"> <i class="icon-comment"></i>
              <h3> Forum</h3>
            </div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <?php
			
				$query=mysql_query("select * from tb_topik order by tanggal asc");
				
				while($row=mysql_fetch_array($query)){
				$username1 = $row['username'];
				$id = $row['id'];
				//Menghitung selisih tanggal post dengan tanggal hari ini
				//Mengambil Waktu Komputer
				$tgl = gmdate("Y-m-d H:i:s", time()+60*60*7); # WIB 
				$tgl1=$row['tanggal'];
				$tgl2 = $tgl;
				
				$selisih_waktu = strtotime($tgl2) -  strtotime($tgl1);

				$hari = floor($selisih_waktu/86400);
				//Untuk menghitung jumlah dalam satuan jam:
				$sisa = $selisih_waktu % 86400;
				$jumlah_jam = floor($sisa/3600);

				//Untuk menghitung jumlah dalam satuan menit:
				$sisa = $sisa % 3600;
				$jumlah_menit = floor($sisa/60);

				//Untuk menghitung jumlah dalam satuan detik:
				$sisa = $sisa % 60;
				$jumlah_detik = floor($sisa/1);
				
				//Cek user level admin
				$query1=mysql_query("select * from tb_user where username='$username1'");
					$row1=mysql_fetch_array($query1);
					$cek1 = $row1['level'];
					
				//Cek user level kordas
				$query2=mysql_query("select * from tb_user where username='$username1'");
					$row2=mysql_fetch_array($query2);
					$cek2 = $row2['level'];
				
				//Cek user level asisten
				$query3=mysql_query("select * from tb_user where username='$username1'");
					$row3=mysql_fetch_array($query3);
					$cek3 = $row3['level'];
				
				//Cek user level kalab
				$query4=mysql_query("select * from tb_user where username='$username1'");
					$row4=mysql_fetch_array($query4);
					$cek4 = $row4['level'];
					
				//Cek staf jabatan TU
				$query5=mysql_query("select * from tb_staf where username='$username1'");
					$row5=mysql_fetch_array($query4);
					$cek5 = $row5['jabatan'];
				
				//Cek staf jabatan teknisi
				$query6=mysql_query("select * from tb_staf where username='$username1'");
					$row6=mysql_fetch_array($query6);
					$cek6 = $row6['jabatan'];
					
				//Cek Dosen
				$query7=mysql_query("select * from tb_dosen where username='$username1'");
					$row7=mysql_fetch_array($query7);
					$cek7 = $row7['foto'];
				
				//Cek Mahasiswa
				$query8=mysql_query("select * from tb_mahasiswa where username='$username1'");
					$row8=mysql_fetch_array($query8);
					$cek8 = $row8['foto'];
			?>
			  <ul class="messages_layout">
				<li class="from_user left"> 
				<?php 
					if($username1 == $cek1 ){
				?>
					<a href="#" class="avatar"><img src="../tatausaha/user/foto_user/<?php echo $row1['foto'] ?>" width="70" height="70"/></a>
				<?php
				}elseif($username1 == $cek2){
				?>
				<a href="#" class="avatar"><img src="../tatausaha/user/foto_user/<?php echo $row2['foto'] ?>" width="70" height="70"/></a>
				<?php
				}elseif($username1 == $cek3){
				?>
				<a href="#" class="avatar"><img src="../tatausaha/user/foto_user/<?php echo $row3['foto'] ?>" width="70" height="70"/></a>
				<?php
				}elseif($username1 == $cek4){
				?>
				<a href="#" class="avatar"><img src="../tatausaha/user/foto_user/<?php echo $row4['foto'] ?>" width="70" height="70"/></a>
				<?php
				}elseif($username1 == $cek5){
				?>
				<a href="#" class="avatar"><img src="../tatausaha/user/foto_user/<?php echo $row5['foto'] ?>" width="70" height="70"/></a>
				<?php
				}elseif($username1 == $cek6){
				?>
				<a href="#" class="avatar"><img src="../tatausaha/user/foto_user/<?php echo $row6['foto'] ?>" width="70" height="70"/></a>
				<?php
				}elseif($username1 == $cek7 ){
				?>
				<a href="#" class="avatar"><img src="../dosen/foto_dosen/<?php echo $row7['foto'] ?>" width="70" height="70"/></a>
				<?php
				}elseif($username1 != $cek8 ){
				?>
				<a href="#" class="avatar"><img src="../mahasiswa/foto_mahasiswa/<?php echo $row8['foto'] ?>" width="70" height="70"/></a>
				<?php
				}
				?>
				  <div class="message_wrap"> <span class="arrow"></span>
					<div class="info"> <a class="name"><?php echo $row['username']?></a> <span class="time"><?php echo "$hari hari, $jumlah_jam Jam, $jumlah_menit Menit, dan $jumlah_detik Detik";?> | Komentar <?php echo $row ['total_balasan'] ?> </span>
					
					  <div class="options_arrow">
						<div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
						  <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
							<li><a href="#koment" role="button" data-toggle="modal"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
						  </ul>
						</div>
					  </div>
					  
					</div>
					<div class="text"> <h3> <i class="icon-comment"> <?php echo $row['topik']?></h3></i></div>
					<div class="text"><?php echo $row['isi']?></div>
				  </div>
				</li>
				
				<?php 
					$queryx =  "select tb_topik.id, tb_topik.username, tb_topik.topik,tb_reply.id_topik, tb_reply.username, tb_reply.isi, tb_reply.tanggal
								from tb_topik
								inner join tb_reply on tb_reply.id_topik = tb_topik.id where tb_topik.id='$id'
								order by tb_reply.tanggal asc";
					$result = $mysqli->query($queryx)
					or die('<b>-- Query failed -- </b> ' . mysql_error());
					while ($data1 = $result->fetch_array()){
					$username1 = $data1['username'];
					$id = $row['id'];
					//Menghitung selisih tanggal post dengan tanggal hari ini
					//Mengambil Waktu Komputer
					$tgl = gmdate("Y-m-d H:i:s", time()+60*60*7); # WIB 
					$tgl1=$data1['tanggal'];
					$tgl2 = $tgl;
					
					$selisih_waktu = strtotime($tgl2) -  strtotime($tgl1);

					$hari = floor($selisih_waktu/86400);
					//Untuk menghitung jumlah dalam satuan jam:
					$sisa = $selisih_waktu % 86400;
					$jumlah_jam = floor($sisa/3600);

					//Untuk menghitung jumlah dalam satuan menit:
					$sisa = $sisa % 3600;
					$jumlah_menit = floor($sisa/60);

					//Untuk menghitung jumlah dalam satuan detik:
					$sisa = $sisa % 60;
					$jumlah_detik = floor($sisa/1);
				
					//Cek user level admin
					$query1=mysql_query("select * from tb_user where username='$username1'");
						$row1=mysql_fetch_array($query1);
						$cek1 = $row1['level'];
						
					//Cek user level kordas
					$query2=mysql_query("select * from tb_user where username='$username1'");
						$row2=mysql_fetch_array($query2);
						$cek2 = $row2['level'];
					
					//Cek user level asisten
					$query3=mysql_query("select * from tb_user where username='$username1'");
						$row3=mysql_fetch_array($query3);
						$cek3 = $row3['level'];
					
					//Cek user level kalab
					$query4=mysql_query("select * from tb_user where username='$username1'");
						$row4=mysql_fetch_array($query4);
						$cek4 = $row4['level'];
						
					//Cek staf jabatan TU
					$query5=mysql_query("select * from tb_staf where username='$username1'");
						$row5=mysql_fetch_array($query4);
						$cek5 = $row5['jabatan'];
					
					//Cek staf jabatan teknisi
					$query6=mysql_query("select * from tb_staf where username='$username1'");
						$row6=mysql_fetch_array($query6);
						$cek6 = $row6['jabatan'];
						
					//Cek Dosen
					$query7=mysql_query("select * from tb_dosen where username='$username1'");
						$row7=mysql_fetch_array($query7);
						$cek7 = $row7['username'];
					
					//Cek Mahasiswa
					$query8=mysql_query("select * from tb_mahasiswa where username='$username1'");
						$row8=mysql_fetch_array($query8);
						$cek8 = $row8['foto'];
					?>
					<li class="by_myself right"> 
					<?php 
						if($username1 == $cek1 ){
					?>
						<a href="#" class="avatar"><img src="../tatausaha/user/foto_user/<?php echo $row1['foto'] ?>" width="70" height="70"/></a>
					<?php
					}elseif($username1 == $cek2){
					?>
					<a href="#" class="avatar"><img src="../tatausaha/user/foto_user/<?php echo $row2['foto'] ?>" width="70" height="70"/></a>
					<?php
					}elseif($username1 == $cek3){
					?>
					<a href="#" class="avatar"><img src="../tatausaha/user/foto_user/<?php echo $row3['foto'] ?>" width="70" height="70"/></a>
					<?php
					}elseif($username1 == $cek4){
					?>
					<a href="#" class="avatar"><img src="../tatausaha/user/foto_user/<?php echo $row4['foto'] ?>" width="70" height="70"/></a>
					<?php
					}elseif($username1 == $cek5){
					?>
					<a href="#" class="avatar"><img src="../tatausaha/user/foto_user/<?php echo $row5['foto'] ?>" width="70" height="70"/></a>
					<?php
					}elseif($username1 == $cek6){
					?>
					<a href="#" class="avatar"><img src="../tatausaha/user/foto_user/<?php echo $row6['foto'] ?>" width="70" height="70"/></a>
					<?php
					}elseif($username1 == $cek7){
					?>
					<a href="#" class="avatar"><img src="../dosen/foto_dosen/<?php echo $row7['foto'] ?>" width="70" height="70"/></a>
					<?php
					}elseif($username1 != $cek8 ){
					?>
					<a href="#" class="avatar"><img src="../mahasiswa/foto_mahasiswa/<?php echo $row8['foto'] ?>" width="70" height="70"/></a>
					<?php
					}
					?>
				
				  <div class="message_wrap"> <span class="arrow"></span>
					<div class="info"> <a class="name"><?php echo $data1['username']?></a> <span class="time"><?php echo "$hari hari, $jumlah_jam Jam, $jumlah_menit Menit, dan $jumlah_detik Detik";?></span>
					  <div class="options_arrow">
						<div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
						  <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
							<li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
						  </ul>
						</div>
					  </div>
					</div><i class="icon-comments"> </i>
					<div class="alert-info text"><?php echo $data1['isi']?> </div>
				  </div>
				</li>
				
				<?php 
				} 
				?>
				<?php 
				} 
				?>
			  </ul>
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
							  <h3> Jadwal Asisten Praktikum : <?php echo $data['nama_user']?>&nbsp;<span class="badge badge-success pull-right" style="line-height:18px;" title="Belum dikonfirmasi"> <?php printf("%d",$rowcount1);?> </span></h3>
							</div>
						  </a>
						</div>
						<div id="collapseOne" class="accordion-body collapse in">
						  <div class="accordion-inner">
							
							<!-- /widget-header -->
							<div class="widget-content">
							  <table class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th> Tanggal Praktikum </th>
									<th> Matakuliah</th>
									<th> Nama Modul </th>
									<th> Asisten</th>
									<th> Kordas</th>
									<th> Dosen</th>
									<th> Ruangan </th>
									<th class="td-actions"> </th>
								  </tr>
								</thead>
								<tbody>
								<!-- Menampilkan data Praktikum Mahasiswa -->
								<?php 
									$query = mysql_query("SELECT 
									tb_jadwal_praktikum.id,
									tb_jadwal_praktikum.nim, 	tb_jadwal_praktikum.id_asisten, tb_jadwal_praktikum.group, 
									tb_jadwal_praktikum.ruangan,
									tb_jadwal_praktikum.id_dosen,
									tb_jadwal_praktikum.id_kordas,
									tb_jadwal_praktikum.tanggal, tb_jadwal_praktikum.waktu, tb_matakuliah.nama_mk, 
									tb_matakuliah.semester,
									tb_matakuliah.akademik,
									tb_matakuliah.nip_dosen, tb_mdl_praktikum.kd_mk, tb_mdl_praktikum.kd_modul, tb_mdl_praktikum.nm_modul, tb_mdl_praktikum.singkatan, tb_mdl_praktikum.nama_kordas, tb_user.id_pengenal, tb_user.nama_user, tb_dosen.nama_dosen
								FROM tb_jadwal_praktikum
								INNER JOIN tb_matakuliah ON tb_jadwal_praktikum.kd_mk = tb_matakuliah.kd_mk
								INNER JOIN tb_mdl_praktikum ON tb_jadwal_praktikum.kd_modul = tb_mdl_praktikum.kd_modul
								INNER JOIN tb_user ON tb_jadwal_praktikum.id_asisten = tb_user.id_pengenal
								INNER JOIN tb_dosen ON tb_dosen.nid = tb_matakuliah.nip_dosen
								where tb_jadwal_praktikum.id_asisten='$id_pengenal'");
									while ($data = mysql_fetch_assoc($query)) {
									$id = $data ['id_kordas'];
									$nid = $data ['id_dosen'];
									
									$query1="select * from tb_user where id_pengenal='$id'";
									$result = $mysqli->query($query1);
									$data1 = $result->fetch_array();
									$nm_kordas = $data1['nama_user'];
									
									$query2="select * from tb_dosen where nid='$nid'";
									$result = $mysqli->query($query2);
									$data2 = $result->fetch_array();
									$nm_dosen = $data2['nama_dosen'];		
						
									?>
								  <tr>
								  <?php
								  //if ($data['tanggal'].' '.$data['waktu'] ==1){
								  ?>
									<td> <?php echo $data['tanggal'].' '.$data['waktu'] ?> </td>
									<td> <?php echo $data['nama_mk']; ?> </td>
									<td> <?php echo $data['kd_modul']; ?> </td>
									<td> <?php echo $data['nama_user']; ?> </td>
									<td> <?php echo $nm_kordas ?> </td>
									<td> <?php echo $nm_dosen ?> </td>
									<td> <?php echo $data['ruangan']; ?> </td>
									<td class="td-actions"><a href="praktikum.html?tanggal=<?php echo $data['tanggal']?>&waktu=<?php echo $data['waktu']?>&kd_modul=<?php echo $data['kd_modul']?>" class="btn btn-success"><i class="icon-only icon-user" title="Lihat Mahasiswa"> </i></a></td>
								  </tr>
								  <?php
								  //}
								  ?>
								  
								  <?php 
								  
									} 
									?>
								</tbody>
							  </table>
							</div>
						  </div>
						</div>
					  </div>
					 <!-- <div class="accordion-group">
						<div class="accordion-heading">
						  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseTree">
							<div class="widget-header"> <i class="icon-user"></i>
							<!-- Menampilkan Jumlah data Dosen  -->	
							<?php
								/* $sql="select * from tb_user where status='nonaktif'";
								if ($result=mysqli_query($mysqli,$sql))
								  {
								  // Return the number of rows in result set
								  $rowcount2=mysqli_num_rows($result);
								  // Free result set
								  mysqli_free_result($result);
							  } */
							?>
							 <!-- <h3>Konfirmasi Tukar Jadwal Praktikum Asisten&nbsp;<span class="badge badge-success pull-right" style="line-height:18px;" title="Belum dikonfirmasi"> <?php printf("%d",$rowcount2);?> </span></h3>
							</div>
						  </a>
						</div>
						<div id="collapseTree" class="accordion-body collapse">
						  <div class="accordion-inner">
							<div class="widget widget-table action-table">
								<!-- /widget-header -->
								<!--<div class="widget-content">
								  <table class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th> NIP </th>
										<th> Nama </th>
										<th> Tanggal Daftar </th>
										<th> Status </th>
										<th class="td-actions"> </th>
									  </tr>
									</thead>
									<tbody>
									<!-- Menampilkan data Dosen yang belum dikonfirmasi -->
									<?php 
										/* $query =  "select * from tb_user where status='nonaktif'";
										//var_dump($query);
										$result = $mysqli->query($query)
										or die('<b>-- Query failed -- </b> ' . mysql_error());
										while ($data = $result->fetch_array()){ */
										?>
									  <!--<tr>
										<td> <?php echo $data['id_pengenal']; ?> </td>
										<td> <?php echo $data['nama_user']; ?> </td>
										<td> <?php echo $data['tgl_daftar']; ?> </td>
										<td> <?php echo $data['status']; ?></td>
										<td class="td-actions">
										<a href="konfirmasi.php?action=konfdsn&nip=<?php echo $data['nip'] ?>&hp=<?php echo $data['hp'] ?>&nama=<?php echo $data['nama'] ?>&email=<?php echo $data['email'] ?>"onclick="return confirm('Apakah Anda yakin menkonfirmasi Dosen : <?php echo $data['nama'];?> ?')" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok" title="Konfirmasi"> </i></a><a href="konfirmasi.php?action=deldsn&nim=<?php echo $data['nip'] ?>" onclick="return confirm('Apakah Anda yakin menghapus data Mahasiswa : <?php echo $data['nama'];?> ?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
									  </tr>
									  <?php 
										$no++;
									//} 
										?>
									</tbody>
								  </table>
								</div> 
							  </div>
						  </div>
						</div>
					  </div>-->
					  
					  <div class="accordion-group">
						<div class="accordion-heading">
						  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseFor">
							<div class="widget-header"> <i class="icon-user"></i>
							<!-- Menampilkan Jumlah data Dosen  -->	
							<?php
								$sql="select * from tb_tukar_jadwal where id_asisten='$id_pengenal' and status='Y'";
								if ($result=mysqli_query($mysqli,$sql))
								  {
								  // Return the number of rows in result set
								  $rowcount2=mysqli_num_rows($result);
								  // Free result set
								  mysqli_free_result($result);
							  }
							?>
							<?php
							$n= $rowcount2;
							if($n!=0){
							?>
							  <h3>Konfirmasi Tukar Jadwal Praktikum Mahasiswa&nbsp;<span class="badge badge-success pull-right" style="line-height:18px;" title="Belum dikonfirmasi"> <?php printf("%d",$rowcount2);?> </span></h3>
							  <?php
								}else{
								?>
							 <h3>Konfirmasi Tukar Jadwal Praktikum Mahasiswa&nbsp;</h3>
							  <?php
								}
							  ?>
							</div>
						  </a>
						</div>
						<div id="collapseFor" class="accordion-body collapse">
						  <div class="accordion-inner">
							<div class="widget widget-table action-table">
								<!-- /widget-header -->
								<div class="widget-content">
								  <table class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th> NIM  </th>
										<th> NIM Tukar</th>
										<th> Kode Modul </th>
										<th> Tanggal Tukar </th>
										<th> Waktu Tukar </th>
										<th class="td-actions"> </th>
									  </tr>
									</thead>
									<tbody>
									<!-- Menampilkan data Dosen yang belum dikonfirmasi -->
									<?php 
										$query ="select * from tb_tukar_jadwal where id_asisten='$id_pengenal' and status='Y'";
										//var_dump($query);
										$result = $mysqli->query($query)
										or die('<b>-- Query failed -- </b> ' . mysql_error());
										while ($data = $result->fetch_array()){
										?>
									  <tr>
										<td> <?php echo $data['nim']; ?> </td>
										<td> <?php echo $data['nim_tujuan']; ?> </td>
										<td> <?php echo $data['kd_modul']; ?> </td>
										<td> <?php echo $data['tanggal_tujuan']; ?> </td>
										<td> <?php echo $data['waktu_tujuan']; ?></td>
										<td class="td-actions">
										<a href="action.php?action=update_jadwal&id=<?php echo $data['id_jadwal']?>&id_tukar=<?php echo $data['id_jadwal_tukar'] ?>&kd_modul=<?php echo $data['kd_modul'] ?>&nim=<?php echo $data['nim']?>&nim_tujuan=<?php echo $data['nim_tujuan']?>&tanggal=<?php $data['tanggal_tujuan']?>&waktu=<?php echo $data['waktu_tujuan'] ?>"onclick="return confirm('Apakah Anda menyutujui pertukaran jadwal Mahasiswa : <?php echo $data['nim'];?> dengan <?php echo $data['nim_tujuan'];?>?')" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok" title="Konfirmasi"> </i></a><a href="konfirmasi.php?action=deldsn&nim=<?php echo $data['nip'] ?>" onclick="return confirm('Apakah Anda yakin menolak pertukaran jadwal Mahasiswa : <?php echo $data['nim_tujuan'];?> ?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
									  </tr>
									  <?php 
										$no++;
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
			<div class="widget-header"> 
			<i class="icon-list-alt"></i>
              <h3> Berita</h3>
            </div>
			<?php 
			$query =  "SELECT * FROM tb_mdl_newsfeed ORDER BY tanggal DESC";
			$result = $mysqli->query($query)
			or die('<b>-- Query failed -- </b> ' . mysql_error());
			while ($data = $result->fetch_array()){
			$new=$data['deskripsi']; 
			$berita=substr($new,0, 500);
			$tanggal=$data['tanggal'];
			
			//pisahkan tanggal
			$array1=explode("-",$tanggal);
			$tahun=$array1[0];
			$bulan=$array1[1];
			$sisa1=$array1[2];
			$array2=explode(" ",$sisa1);
			$tanggal=$array2[0];
			$sisa2=$array2[1];
			$array3=explode(":",$sisa2);
			$jam=$array3[0];
			$menit=$array3[1];
			$detik=$array3[2];
			//ubah nama bulan menjadi bahasa indonesia
			switch($bulan)
			{
				case"01";
					$bulan="Januari";
				break;
				case"02";
					$bulan="Februari";
				break;
				case"03";
					$bulan="Maret";
				break;
				case"04";
					$bulan="April";
				break;
				case"05";
					$bulan="Mei";
				break;
				case"06";
					$bulan="Juni";
				break;
				case"07";
					$bulan="Juli";
				break;
				case"08";
					$bulan="Agustus";
				break;
				case"09";
					$bulan="September";
				break;
				case"10";
					$bulan="Oktober";
				break;
				case"11";
					$bulan="November";
				break;
				case"12";
					$bulan="Desember";
				break;
			}
			?>	
			<div class="widget-content">
              <ul class="news-items">

                <li>	
                  <div class="news-item-date"> <span class="news-item-day"><?php echo $tanggal.' '.$bulan ?></span> <span class="news-item-month"><?php echo $tahun?></span> </div>
                  <div class="news-item-detail"> <a href="<?php echo $data['link'] ?>" class="news-item-title" target="_blank"><?php echo $data['topik'] ?></a>
                    <p class="news-item-preview"><?php echo $berita; ?></p> 
					<a href="<?php echo $data['link'] ?>"> Selanjutnya</a>
                  </div>
                </li>
              </ul>
            </div>
			<?php 
				} 
			?>
			
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<?php 
require'template/footer.php';
?>