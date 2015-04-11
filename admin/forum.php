<?php
	require'template/header.php';
?>
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
    	
    	<div class="row">
    	<div class="span12">
						
				<div class="widget widget-plain">
					
					<div class="widget-content">
						
						<a href="javascript:;" class="btn btn-large btn-success btn-support-ask">Forum</a>
					</div> <!-- /widget-content -->
					
					
					<div class="widget-content">
						
						 <div class="alert alert-danger" align="center"><h2>Topik Terbaru
						 <a href="#myModal" role="button" class="btn" data-toggle="modal"><i class="icon-comment" title="Topik Baru"></i></a></h2>
						<table class="table table-striped ">
							<thead>
							  <tr>
								<th class="alert-info"> No </th>
								<th  class="alert-info"> Topik </th>
								<th  class="alert-info"> Pengirim</th>
								<th  class="alert-info"> Pesan</th>
								<th  class="alert-info"> Komentar </th>
								<th  class="alert-info"> tanggal </th>
							  </tr>
							</thead>
							<tbody>
							
							<?php 
								$data=mysql_query("select * from tb_topik");
								$no=0;
								while($row=mysql_fetch_array($data)){
								$id_topik=base64_encode($row['id']);
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
								?>
							  <tr>	
								<td class="alert-success"> <?php echo $no=$no+1; ?> </td>
								<td class="alert-success"> <a href="detail_topik.html?topik=<?php echo $id_topik; ?>"><?php echo $row['topik']; ?></a> </td>
								<td class="alert-success"> <?php echo $row['username']; ?> </td>
								<td class="alert-success"> <?php echo $row['isi']; ?></td>
								<td class="alert-success"> <?php echo $row['total_balasan']; ?></td>
								<td class="alert-success"> <?php echo "$hari hari, $jumlah_jam Jam, $jumlah_menit Menit, dan $jumlah_detik Detik";?></td>
							  </tr>
							  <?php 
							} 
								?>
							</tbody>
						  </table>
						</div>
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
				
			</div> <!-- /span12 -->
         </div>	
    
	      <div class="row">
	      	
	      	<div class="span12">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-comment"></i>
						
					</div> <!-- /widget-header -->
					
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
								<div class="info"> <a class="name"><?php echo $row['username']?></a> <span class="time"><?php echo "$hari hari, $jumlah_jam Jam, $jumlah_menit Menit, dan $jumlah_detik Detik";?> | Komentar <?php echo $row ['total_balasan'] ?> Kali</span>
								
								  <div class="options_arrow">
									<div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
									  <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
										<li><a href="#koment<?php echo $id ?>" role="button" data-toggle="modal"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
									  </ul>
									</div>
								  </div>
								  
								</div>
								<div class="text"> <h3> <i class="icon-comment"> <?php echo $row['topik']?></h3></i></div>
								<div class="text"><?php echo $row['isi']?></div>
							  </div>
							  
							  <!-- Add Komen topik -->
							 <div class="control-group">
								<div class="controls">
									<!-- Modal -->
									<div id="koment<?php echo $id ?>" class="modal-forum hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
										<h3 id="myModalLabel">Komentar Topik : <?php echo $row['topik']?></h3>
									  </div>
									  <div class="modal-body">
										<form id="form" action="action.php?action=add_comment" method="POST" >
										<input id="id" name="id" value="<?php echo $id ?>" type="hidden">
											<table class="table table-badge-success">
												<tr>
													<td class="alert-info">Username*</td>
													<td class="alert-info"><input id="username" name="username" value="<?php echo $nama ?>" type="hidden"/>
													<input id="" name="" value="<?php echo $nama ?>" type="text" disabled/></td>
												</tr>
												<tr>
													<td class="alert-info">Topik*</td>
													<td class="alert-info"> <input id="topik" name="topik" value="<?php echo $row['topik']?>" type="hidden"/><input  id="" name="" type="text" value="<?php echo $row['topik']?>" disabled/></td>
												</tr>
												<tr>
													<td class="alert-info"> Isi* </td>
													<td class="alert-info"> 
													<textarea id="ckeditor_full" name="isi" required="required"/></textarea></td>
												</tr>
											</table>
									  </div>
									  <div class="modal-footer">
										<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
										<button class="btn btn-primary">Save</button>
									  </div>
									  </form>
									</div>
								</div> <!-- /controls -->	
							</div> <!-- /control-group -->
							<!-- End Add Koment --> 
							  
							  
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
										<li><a href="#koment<?php echo $id ?>" role="button" data-toggle="modal"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
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
						  </ul>
							 
							<?php 
							} 
							?>
						</div>
						<!-- /widget-content --> 
						
					</div> <!-- /spa12 -->
					
				</div> <!-- /row -->
	
			</div> <!-- /container -->
    
	</div> <!-- /main-inner -->
	    
</div> <!-- /main -->
    
 <!-- Add topik -->
 <div class="control-group">
	<div class="controls">
		<!-- Modal -->
		<div id="myModal" class="modal-forum hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
			<h3 id="myModalLabel">Tambah Topik Baru</h3>
		  </div>
		  <div class="modal-body">
			<form id="form" action="action.php?action=add_topik" method="POST" >
			<input id="id" name="id" value="<?php echo $id; ?>" type="hidden">
				<table class="table table-badge-success">
					<tr>
						<td class="alert-info">Username*</td>
						<td class="alert-info"><input id="username" name="username" value="<?php echo $nama ?>" type="hidden"/>
						<input id="" name="" value="<?php echo $nama ?>" type="text" disabled/></td>
					</tr>
					<tr>
						<td class="alert-info">Topik*</td>
						<td class="alert-info"> <input  id="topik" name="topik" type="text" value="" required=""/></td>
					</tr>
					<tr>
						<td class="alert-info"> Isi* </td>
						<td class="alert-info"> 
						<textarea id="ckeditor_full" name="isi" required="required"/></textarea></td>
					</tr>
				</table>
		  </div>
		  <div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button class="btn btn-primary">Save</button>
		  </div>
		  </form>
		</div>
	</div> <!-- /controls -->	
</div> <!-- /control-group -->
 <!-- End Add topik -->    



<?php
	require'template/footer.php';
?>