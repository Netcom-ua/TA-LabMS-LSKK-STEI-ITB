<?php
	require_once'template/header.php';
?>
<div class="main">
 <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
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
								$sql="select * from tb_mahasiswa where status='nonaktif'";
								if ($result=mysqli_query($mysqli,$sql))
								  {
								  // Return the number of rows in result set
								  $rowcount1=mysqli_num_rows($result);
								  // Free result set
								  mysqli_free_result($result);
							  }
							?>
							<?php
							$n= $rowcount1;
							if($n!=0){
							?>
							  <h3>Konfirmasi Mahasiswa&nbsp;<span class="badge badge-success pull-right" style="line-height:18px;" title="Belum dikonfirmasi"> <?php printf("%d",$rowcount1);?> </span></h3>
							<?php
							  }else{
							  ?>
							  <h3> Konfirmasi Mahasiswa </h3>
							  <?php
							  }
							  ?>
							</div>
						  </a>
						</div>
						<div id="collapseOne" class="accordion-body collapse">
						  <div class="accordion-inner">
							
							<!-- /widget-header -->
							<div class="widget-content">
							  <table class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th> NIM </th>
									<th> Nama </th>
									<th> Tanggal Daftar </th>
									<th> Status </th>
									<th class="td-actions"> </th>
								  </tr>
								</thead>
								<tbody>
								<!-- Menampilkan data Mahasiswa yang belum dikonfirmasi -->
								<?php 
									$query =  "select * from tb_mahasiswa where status='nonaktif'";
									//var_dump($query);
									$result = $mysqli->query($query)
									or die('<b>-- Query failed -- </b> ' . mysql_error());
									while ($data = $result->fetch_array()){
									?>
								  <tr>
									<td> <?php echo $data['nim']; ?> </td>
									<td> <?php echo $data['nama_mhs']; ?> </td>
									<td> <?php echo $data['tgl_daftar']; ?> </td>
									<td> <?php echo $data['status']; ?></td>
									<td class="td-actions"><a href="konfirmasi.php?action=konfmhs&nim=<?php echo $data['nim'] ?>&hp=<?php echo $data['hp'] ?>&email=<?php echo $data['email']?>&nama_mhs=<?php $data['nama_mhs'] ?>"onclick="return confirm('Apakah Anda yakin mengkonfirmasi Mahasiswa : <?php echo $data['nama_mhs'];?> ?')" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok" title="Konfirmasi"> </i></a><a href="konfirmasi.php?action=delmhs&nim=<?php echo $data['nim'] ?>" onclick="return confirm('Apakah Anda yakin menghapus data Mahasiswa : <?php echo $data['nama_mhs'];?> ?')"class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
								  </tr>
								  <?php 
									//$no++;
								} 
									?>
								</tbody>
							  </table>
							</div>
						  </div>
						</div>
					  </div>
					  <div class="accordion-group">
						<div class="accordion-heading">
						  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseTree">
							<div class="widget-header"> <i class="icon-user"></i>
							<!-- Menampilkan Jumlah data Dosen  -->	
							<?php
								$sql="select * from tb_dosen where status='nonaktif'";
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
							  <h3>Konfirmasi Dosen&nbsp;<span class="badge badge-success pull-right" style="line-height:18px;" title="Belum dikonfirmasi"> <?php printf("%d",$rowcount2);?> </span></h3>
							<?php
							}else {
							?>
							<h3>Konfirmasi Dosen </h3>
							<?php
							}
							?>
							</div>
						  </a>
						</div>
						<div id="collapseTree" class="accordion-body collapse">
						  <div class="accordion-inner">
							<div class="widget widget-table action-table">
								<!-- /widget-header -->
								<div class="widget-content">
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
										$query =  "select * from tb_dosen where status='nonaktif'";
										//var_dump($query);
										$result = $mysqli->query($query)
										or die('<b>-- Query failed -- </b> ' . mysql_error());
										while ($data = $result->fetch_array()){
										?>
									  <tr>
										<td> <?php echo $data['nid']; ?> </td>
										<td> <?php echo $data['nama_dosen']; ?> </td>
										<td> <?php echo $data['tgl_daftar']; ?> </td>
										<td> <?php echo $data['status']; ?></td>
										<td class="td-actions">
										<a href="konfirmasi.php?action=konfdsn&nid=<?php echo $data['nid'] ?>&hp=<?php echo $data['hp'] ?>&nama_dosen=<?php echo $data['nama_dosen'] ?>&email=<?php echo $data['email'] ?>"onclick="return confirm('Apakah Anda yakin menkonfirmasi Dosen : <?php echo $data['nama_dosen'];?> ?')" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok" title="Konfirmasi"> </i></a><a href="konfirmasi.php?action=deldsn&nim=<?php echo $data['nip'] ?>" onclick="return confirm('Apakah Anda yakin menghapus data Dosen : <?php echo $data['nama_dosen'];?> ?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
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
					  <div class="accordion-group">
						<div class="accordion-heading">
						  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion4" href="#collapsefour">
							<div class="widget-header"> <i class="icon-user"></i>
							<!-- Menampilkan Jumlah data staf  -->	
							<?php
								$sql="select * from tb_staf where status='nonaktif'";
								if ($result=mysqli_query($mysqli,$sql))
								  {
								  // Return the number of rows in result set
								  $rowcount3=mysqli_num_rows($result);
								  // Free result set
								  mysqli_free_result($result);
							  }
							?>
							<?php
							$n= $rowcount3;
							if($n!=0){
							?>
							  <h3>Konfirmasi Staf Laboratorium&nbsp;<span class="badge badge-success pull-right" style="line-height:18px;" title="Belum dikonfirmasi"> <?php printf("%d",$rowcount3);?> </span></h3>
							<?php
							}else{
							?>
							<h3>Konfirmasi Staf Laboratorium </h3>
							<?php
							}
							?>
							</div>
						  </a>
						</div>
						<div id="collapsefour" class="accordion-body collapse">
						  <div class="accordion-inner">
							<div class="widget widget-table action-table">
								<!-- /widget-header -->
								<div class="widget-content">
								  <div class="widget widget-table action-table">
									<!-- /widget-header -->
									<div class="widget-content">
									  <table class="table table-striped table-bordered">
										<thead>
										  <tr>
											<th> NIP </th>
											<th> Nama </th>
											<th> Jabatan </th>
											<th> Tanggal Daftar </th>
											<th> Status </th>
											<th class="td-actions"> </th>
										  </tr>
										</thead>
										<tbody>
										<!-- Menampilkan data staf yang belum dikonfirmasi -->
										<?php 
											$query =  "select * from tb_staf where status='nonaktif'";
											//var_dump($query);
											$result = $mysqli->query($query)
											or die('<b>-- Query failed -- </b> ' . mysql_error());
											while ($data = $result->fetch_array()){
											?>
										  <tr>
											<td> <?php echo $data['nip_staf']; ?> </td>
											<td> <?php echo $data['nama_staf']; ?> </td>
											<td> <?php echo $data['jabatan']; ?> </td>
											<td> <?php echo $data['tgl_daftar']; ?> </td>
											<td> <?php echo $data['status']; ?></td>
											<td class="td-actions"><a href="konfirmasi.php?action=konfstaf&nip_staf=<?php echo $data['nip_staf'] ?>&hp=<?php echo $data['hp'] ?>&jabatan=<?php echo $data['jabatan'] ?>&nama_staf=<?php echo $data['nama_staf'] ?>&email=<?php echo $data['email'] ?>"onclick="return confirm('Apakah Anda yakin mengkonfirmasi User : <?php echo $data['nama_staf'];?> ?')" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok" title="Konfirmasi"> </i></a><a href="konfirmasi.php?action=delstaf&nip_staf=<?php echo $data['nip_staf'] ?>" onclick="return confirm('Apakah Anda yakin menghapus data Dosen : <?php echo $data['nama_staf'];?> ?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
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
						</div>
					  </div>
					  <div class="accordion-group">
						<div class="accordion-heading">
						  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion5" href="#collapsefive">
							<div class="widget-header"> <i class="icon-user"></i>
							<!-- Menampilkan Jumlah data staf  -->	
							<?php
								$sql="select * from tb_user where status='nonaktif'";
								if ($result=mysqli_query($mysqli,$sql))
								  {
								  // Return the number of rows in result set
								  $rowcount4=mysqli_num_rows($result);
								  // Free result set
								  mysqli_free_result($result);
							  }
							?>
							<?php
							$n= $rowcount4;
							if($n!=0){
							?>
							  <h3>Konfirmasi User&nbsp;<span class="badge badge-success pull-right" style="line-height:18px;" title="Belum dikonfirmasi"> <?php printf("%d",$rowcount4);?> </span></h3>
							<?php
							}else{
							?>
								<h3>Konfirmasi User</h3>
							<?php
							}
							?>
							</div>
						  </a>
						</div>
						<div id="collapsefive" class="accordion-body collapse">
						  <div class="accordion-inner">
							<div class="widget widget-table action-table">
								<!-- /widget-header -->
									<!-- /widget-header -->
									<div class="widget-content">
									  <table class="table table-striped table-bordered">
										<thead>
										  <tr>
											<th> NIM/NIP </th>
											<th> Nama </th>
											<th> Level </th>
											<th> Tanggal Daftar </th>
											<th> Status </th>
											<th class="td-actions"> </th>
										  </tr>
										</thead>
										<tbody>
										<!-- Menampilkan data staf yang belum dikonfirmasi -->
										<?php 
											$query =  "select * from tb_user where status='nonaktif'";
											//var_dump($query);
											$result = $mysqli->query($query)
											or die('<b>-- Query failed -- </b> ' . mysql_error());
											while ($data = $result->fetch_array()){
											?>
										  <tr>
											<td> <?php echo $data['id_pengenal']; ?> </td>
											<td> <?php echo $data['nama_user']; ?> </td>
											<td> <?php echo $data['level']; ?> </td>
											<td> <?php echo $data['tgl_daftar']; ?> </td>
											<td> <?php echo $data['status']; ?></td>
											<td class="td-actions"><a href="konfirmasi.php?action=konfuser&id_pengenal=<?php echo $data['id_pengenal'] ?>&hp=<?php echo $data['hp'] ?>&level=<?php echo $data['level'] ?>&nama_user=<?php echo $data['nama_user'] ?>&email=<?php echo $data['email'] ?>"onclick="return confirm('Apakah Anda yakin mengkonfirmasi User : <?php echo $data['nama_user'];?> ?')" class="btn btn-small btn-success" title="Konfirmasi"><i class="btn-icon-only icon-ok" > </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
										  </tr>
										  <?php 
											$no++;
										} 
											?>
										</tbody>
									  </table>
								  </div>
								</div>
								<!-- /widget-content --> 
						  </div>
						</div>
					  </div>
					  <div class="accordion-group">
						<div class="accordion-heading">
						  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion6" href="#collapsesix">
							<div class="widget-header"> <i class="icon-user"></i>
							<!-- Menampilkan Jumlah data staf  -->	
							<?php
								$sql="select * from tb_pinjam where status='Belum Disetujui'";
								if ($result=mysqli_query($mysqli,$sql))
								  {
								  // Return the number of rows in result set
								  $rowcount4=mysqli_num_rows($result);
								  // Free result set
								  mysqli_free_result($result);
							  }
							?>
							<?php
							$n= $rowcount4;
							if($n!=0){
							?>
							  <h3>Konfirmasi Peminjaman Barang&nbsp;<span class="badge badge-success pull-right" style="line-height:18px;" title="Belum dikonfirmasi"> <?php printf("%d",$rowcount4);?> </span></h3>
							 <?php
							 }else{
							 ?>
							 <h3>Konfirmasi Peminjaman Barang</h3>
							 <?php
							 }
							 ?>
							</div>
						  </a>
						</div>
						<div id="collapsesix" class="accordion-body collapse">
						  <div class="accordion-inner">
								<!-- /widget-header -->
								  <div class="widget widget-table action-table">
									<!-- /widget-header -->
									<div class="widget-content">
									  <table class="table table-striped table-bordered">
										<thead>
										  <tr>
											<th> NIM </th>
											<th> Nama </th>
											<th> Nama Alat </th>
											<th> Tanggal Pinjam </th>
											<th> Status </th>
											<th class="td-actions"> </th>
										  </tr>
										</thead>
										<tbody>
										<!-- Menampilkan data staf yang belum dikonfirmasi -->
										<?php 
											$query =  "select * from tb_pinjam where status='Belum Disetujui'";
											//var_dump($query);
											$result = $mysqli->query($query)
											or die('<b>-- Query failed -- </b> ' . mysql_error());
											while ($data = $result->fetch_array()){
											?>
										  <tr>
											<td> <?php echo $data['nim']; ?> </td>
											<td> <?php echo $data['nama']; ?> </td>
											<td> <?php echo $data['nama_alat']; ?> </td>
											<td> <?php echo $data['tgl_pinjam']; ?> </td>
											<td> <?php echo $data['status']; ?></td>
											<td class="td-actions"><a href="konfirmasi.php?action=konfuser&id_pengenal=<?php echo $data['id_pengenal'] ?>&hp=<?php echo $data['hp'] ?>&level=<?php echo $data['level'] ?>&nama_user=<?php echo $data['nama_user'] ?>&email=<?php echo $data['email'] ?>"onclick="return confirm('Apakah Anda yakin mengkonfirmasi User : <?php echo $data['nama_user'];?> ?')" class="btn btn-small btn-success" title="Konfirmasi"><i class="btn-icon-only icon-ok" > </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
										  </tr>
										  <?php 
											$no++;
										} 
											?>
										</tbody>
									  </table>
								  </div>
								<!-- /widget-content --> 
							  </div>
						  </div>
						</div>
					  </div>
					</div>
				</div> <!-- /controls -->	
			</div> <!-- /control-group -->
		    <!-- /widget-content --> 
			<div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
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
			<?php } ?>
            <!-- /widget-header -->
          </div>
          <!-- /widget -->
          </div>
          <!-- /widget -->
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
        <div class="span6">
          <div class="widget">
		  <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>LabMS</h3>
            </div>
		  <div class="widget-content">
              <div class="shortcuts">
			  <a href="informasi_lab.html" class="shortcut">
			  <i class="shortcut-icon icon-list-alt"></i>
			  <span class="shortcut-label">Informasi Lab</span></a>
			  <a href="upload_mahasiswa.html" class="shortcut">
			  <i class="shortcut-icon icon-user"></i>
			  <span class="shortcut-label">Unggah Data Mahasiswa</span> </a>
			  <a href="upload_jadwal.html" class="shortcut">
			  <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Unggah Jadwal Praktikum</span> </a>
			   <a href="upload_jadwal_laporan.html" class="shortcut">
			  <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Unggah Jadwal Laporan</span> </a>
			  <a href="praktikum.html" class="shortcut">
			  <i class="shortcut-icon icon-list-alt"></i> <span class="shortcut-label">Tambah Praktikum</span> </a>
			   <a href="bank_penilaian.html" class="shortcut">
			  <i class="shortcut-icon icon-bookmark"></i>
			  <span class="shortcut-label">Bank Penilaian Praktikum</span> </a>
			  <a href="video_upload.html" class="shortcut">
			  <i class="shortcut-icon icon-facetime-video"></i><span class="shortcut-label">Unggah Video</span> </a>
			  <a href="user" class="shortcut"><i class="shortcut-icon icon-user"></i>
			  <span class="shortcut-label">Tambah User</span> </a>
			  <a href="software_list.html" class="shortcut"><i class="shortcut-icon icon-list-alt"></i>
			  <span class="shortcut-label">Unggah Software</span> </a>
			  <a href="daftar_praktikum.html" class="shortcut">
			  <i class="shortcut-icon icon-file"></i><span class="shortcut-label">Hasil Penilaian</span> </a>
			  <a href="generate_laporan_praktikum.html" class="shortcut">
			  <i class="shortcut-icon icon-file"></i><span class="shortcut-label">Generate Laporan</span> </a>
			  
              <!-- /shortcuts --> 
            </div>
			</div>
            <!-- /widget-content --> 
          </div>
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Informasi</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 
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
			  <a href="mahasiswa.html" class="shortcut"><i class="shortcut-icon icon-user"></i>
			   <span class="shortcut-label">Mahasiswa</span>
				<span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data">
			   <?php printf("%d",$rowcount);?></span> <span class="badge badge-success pull-center" style="line-height:18px;" title="Belum dikonfirmasi">
			   <?php printf("%d",$rowcount1);?></span></a>
			   <!-- Menampilkan Jumlah data Dosen  -->	
				<?php
					$sql="select * from tb_dosen";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			   <a href="javascript:;" class="shortcut"> 
			   <i class="shortcut-icon icon-user"></i>
			   <span class="shortcut-label">Dosen</span>
			   <span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data"><?php printf("%d",$rowcount);?></span> <span class="badge badge-success pull-center" style="line-height:18px;" title="Belum dikonfirmasi"><?php printf("%d",$rowcount2);?></span> </a>
			   
			   <!-- Menampilkan Jumlah data Tata Usaha  -->	
				<?php
					$sql="select * from tb_staf where jabatan='tu'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				 //Menampilkan Jumlah data Tata Usaha yang belum dikonfirmasi
					$sql="select * from tb_staf where jabatan='tu' and status='nonaktif'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount3=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			   <a href="staf.php" class="shortcut"><i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Tata Usaha</span> <span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data"><?php printf("%d",$rowcount);?></span> <span class="badge badge-success pull-center" style="line-height:18px;" title="Belum dikonfirmasi">
			   <?php printf("%d",$rowcount3);?></span> </a>
			   
			   <!-- Menampilkan Jumlah data Teknisi Laboratorium  -->	
				<?php
					$sql="select * from tb_staf where jabatan='teknisi'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				  //Menampilkan Jumlah data Teknisi Laboratorium yang belum dikonfirmasi
					$sql="select * from tb_staf where jabatan='teknisi' and status='nonaktif'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount3=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			   <a href="staf.php" class="shortcut"><i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Teknisi Laboratorium</span> <span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data"><?php printf("%d",$rowcount);?></span> <span class="badge badge-success pull-center" style="line-height:18px;" title="Belum dikonfirmasi">
			   <?php printf("%d",$rowcount3);?></span> </a>
			   
			   <!-- Menampilkan Jumlah data Asisten  -->	
				<?php
					$sql="select * from tb_staf where level='asisten'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				   //Menampilkan Jumlah data Asisten praktikum yang belum dikonfirmasi
					$sql="select * from tb_user where level='asisten' and status='nonaktif'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount3=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			   <a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-user"></i><span class="shortcut-label">Asisten Praktikum</span> <span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data"><?php printf("%d",$rowcount);?></span> <span class="badge badge-success pull-center" style="line-height:18px;" title="Belum dikonfirmasi"><?php printf("%d",$rowcount3);?> </span></a>
			   
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
				  //Menampilkan Jumlah data Koordinator Asisten yang belum dikonfirmasi
					$sql="select * from tb_user where level='kordas' and status='nonaktif'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount3=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			   <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-user"></i>
			   <span class="shortcut-label">Koordinator Asisten</span>
			   <span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data"><?php printf("%d",$rowcount);?></span> <span class="badge badge-success pull-center" style="line-height:18px;" title="Belum dikonfirmasi"><?php printf("%d",$rowcount3);?></span> </a>
			   
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
  
			   <!-- Menampilkan Jumlah SMS Keluar  -->	
				<?php
					$sql="select * from sentitems";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			   <a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-envelope"></i><span class="shortcut-label">SMS Keluar</span><span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data"><?php printf("%d",$rowcount);?></span> </a>
			   
			   <a href="javascript:;" class="shortcut"><span class="badge badge-warning pull-center" style="line-height:18px;"></span> <span class="shortcut-label">Jumlah Data</span><span class="badge badge-success pull-center" style="line-height:18px;"></span> <span class="shortcut-label">Belum dikonfirmasi</span></a>
			   </div>
              <!-- /shortcuts --> 
            </div>
			<br/>
            <!-- /widget-content --> 
         
		  <div class="widget widget-table action-table">
            <div class="widget-header"> 
			<!-- Menampilkan Jumlah Pesan SMS Keluar  -->	
			<?php
		  		$sql="select * from sentitems";
				if ($result=mysqli_query($mysqli,$sql))
				  {
				  // Return the number of rows in result set
				  $rowcount=mysqli_num_rows($result);
				  // Free result set
				  mysqli_free_result($result);
			  }
			?>
			<i class="icon-envelope"></i>
              <h3>SMS Keluar&nbsp;<span class="badge badge-warning pull-right" style="line-height:18px;"> <?php printf("%d",$rowcount);?> </span></h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Tanggal Masuk </th>
					<th> Pengirim </th>
					<th> Isi </th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
				
				<!-- Menampilkan pesan keluar -->
				<?php 
					$query =  "select * from sentitems order by SendingDateTime desc limit 5";
					$no=1;
					$result = $mysqli->query($query)
					or die('<b>-- Query failed -- </b> ' . mysql_error());
					while ($data = $result->fetch_array())
					{
					?>
                  <tr>
					<td> <?php echo $no ?> </td>
                    <td> <?php echo $data['SendingDateTime']; ?> </td>
                    <td> <?php echo $data['DestinationNumber']; ?> </td>
					<td> <?php echo $data['TextDecoded']; ?> </td>
                    <td class="td-actions">
					<a href="hapus_inbox.php?action=delsentitems&id=<?php echo $data['ID'] ?>" onclick="return confirm('Apakah Anda yakin menghapus pesan ini : <?php echo $data['TextDecoded'];?> ?')" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
                  </tr>
				  <?php 
					$no++;
				} 
					?>
                </tbody>
              </table>
			  
            </div>
            <!-- /widget-content --> 
          </div>
		  
          </div>
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
</div>
<!-- /main -->
<?php
	require_once'template/footer.php';
?>