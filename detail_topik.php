<?php
	require'template/header.php';
	$topik = $_GET['topik'];
	$id= base64_decode($topik);
?>
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
    	<div class="row">
         </div>	
    
	      <div class="row">
	      	
	      	<div class="span12">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-comment"></i>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
						<?php
						
							$query=mysql_query("select * from tb_topik where id='$id' order by tanggal asc");
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
							<a href="#" class="avatar"><img src="tatausaha/user/foto_user/<?php echo $row1['foto'] ?>" width="70" height="70"/></a>
							<?php
							}elseif($username1 == $cek2){
							?>
							<a href="#" class="avatar"><img src="tatausaha/user/foto_user/<?php echo $row2['foto'] ?>" width="70" height="70"/></a>
							<?php
							}elseif($username1 == $cek3){
							?>
							<a href="#" class="avatar"><img src="tatausaha/user/foto_user/<?php echo $row3['foto'] ?>" width="70" height="70"/></a>
							<?php
							}elseif($username1 == $cek4){
							?>
							<a href="#" class="avatar"><img src="tatausaha/user/foto_user/<?php echo $row4['foto'] ?>" width="70" height="70"/></a>
							<?php
							}elseif($username1 == $cek5){
							?>
							<a href="#" class="avatar"><img src="tatausaha/user/foto_user/<?php echo $row5['foto'] ?>" width="70" height="70"/></a>
							<?php
							}elseif($username1 == $cek6){
							?>
							<a href="#" class="avatar"><img src="tatausaha/user/foto_user/<?php echo $row6['foto'] ?>" width="70" height="70"/></a>
							<?php
							}elseif($username1 == $cek7 ){
							?>
							<a href="#" class="avatar"><img src="dosen/foto_dosen/<?php echo $row7['foto'] ?>" width="70" height="70"/></a>
							<?php
							}elseif($username1 != $cek8 ){
							?>
							<a href="#" class="avatar"><img src="mahasiswa/foto_mahasiswa/<?php echo $row8['foto'] ?>" width="70" height="70"/></a>
							<?php
							}
							?>	
							  <div class="message_wrap"> <span class="arrow"></span>
								<div class="info"> <a class="name"><?php echo $row['username']?></a> <span class="time"><?php echo "$hari hari, $jumlah_jam Jam, $jumlah_menit Menit, dan $jumlah_detik Detik";?> | Komentar <?php echo $row ['total_balasan'] ?> Kali</span>
								
								  <div class="options_arrow">
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
										order by tb_reply.tanggal desc limit 2";
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
									<a href="#" class="avatar"><img src="tatausaha/user/foto_user/<?php echo $row1['foto'] ?>" width="70" height="70"/></a>
								<?php
								}elseif($username1 == $cek2){
								?>
								<a href="#" class="avatar"><img src="tatausaha/user/foto_user/<?php echo $row2['foto'] ?>" width="70" height="70"/></a>
								<?php
								}elseif($username1 == $cek3){
								?>
								<a href="#" class="avatar"><img src="tatausaha/user/foto_user/<?php echo $row3['foto'] ?>" width="70" height="70"/></a>
								<?php
								}elseif($username1 == $cek4){
								?>
								<a href="#" class="avatar"><img src="tatausaha/user/foto_user/<?php echo $row4['foto'] ?>" width="70" height="70"/></a>
								<?php
								}elseif($username1 == $cek5){
								?>
								<a href="#" class="avatar"><img src="tatausaha/user/foto_user/<?php echo $row5['foto'] ?>" width="70" height="70"/></a>
								<?php
								}elseif($username1 == $cek6){
								?>
								<a href="#" class="avatar"><img src="tatausaha/user/foto_user/<?php echo $row6['foto'] ?>" width="70" height="70"/></a>
								<?php
								}elseif($username1 == $cek7){
								?>
								<a href="#" class="avatar"><img src="dosen/foto_dosen/<?php echo $row7['foto'] ?>" width="70" height="70"/></a>
								<?php
								}elseif($username1 != $cek8 ){
								?>
								<a href="#" class="avatar"><img src="mahasiswa/foto_mahasiswa/<?php echo $row8['foto'] ?>" width="70" height="70"/></a>
								<?php
								}
								?>
							  <div class="message_wrap"> <span class="arrow"></span>
								<div class="info"> <a class="name"><?php echo $data1['username']?></a> <span class="time"><?php echo "$hari hari, $jumlah_jam Jam, $jumlah_menit Menit, dan $jumlah_detik Detik";?></span>
								 
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
 

<?php
	require'template/footer.php';
?>