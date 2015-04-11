<?php
	require_once'template/header.php';
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
		   <div class="widget">
            <div class="widget-header"> 
			<i class="icon-bookmark"></i>
              <h3>Data</h3>
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
				<span class="badge badge-warning pull-center" style="line-height:18px;">
			   <?php printf("%d",$rowcount);?></span></a>
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
			   <a href="dosen.html" class="shortcut"> 
			   <i class="shortcut-icon icon-user"></i>
			   <span class="shortcut-label">Dosen</span>
			   <span class="badge badge-warning pull-center" style="line-height:18px;"><?php printf("%d",$rowcount);?></span> </a>
			   
			   <!-- Menampilkan Jumlah data Staf  -->	
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
			   <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Tatausaha</span> <span class="badge badge-warning pull-center" style="line-height:18px;"><?php printf("%d",$rowcount);?></span> </a>
			   
			   <!-- Menampilkan Jumlah data Staf  -->	
				<?php
					$sql="select * from tb_staf where jabatan='teknisi'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			   <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-user"></i> <span class="shortcut-label">Teknisi Laboratorium</span> <span class="badge badge-warning pull-center" style="line-height:18px;"><?php printf("%d",$rowcount);?></span></span> </a>
			   <?php
					$sql="select * from tb_user where level='asisten'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount1=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
				
			   <a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-user"></i><span class="shortcut-label">Asisten Laboratorium</span><span class="badge badge-warning pull-center" style="line-height:18px;"><?php printf("%d",$rowcount1);?> </span> </a>
			    <?php
					$sql="select * from tb_user where level='kordas'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount1=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			   <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-user"></i>
			   <span class="shortcut-label">Koordinator Asisten</span>
			   <span class="badge badge-warning pull-center" style="line-height:18px;"><?php printf("%d",$rowcount1);?> </span> </a>
			   
			   <a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-user"></i><span class="shortcut-label">Asisten Laboratorium</span><span class="badge badge-warning pull-center" style="line-height:18px;"><?php printf("%d",$rowcount1);?> </span> </a>

			   </div>
              <!-- /shortcuts --> 
            </div>
            </div>
			
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Berita</h3>
            </div>
			<?php 
			$query =  "SELECT * FROM tb_mdl_newsfeed ORDER BY tanggal DESC limit 6";
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
					$bulan="Jan";
				break;
				case"02";
					$bulan="Feb";
				break;
				case"03";
					$bulan="Mar";
				break;
				case"04";
					$bulan="Apr";
				break;
				case"05";
					$bulan="Mei";
				break;
				case"06";
					$bulan="Jun";
				break;
				case"07";
					$bulan="Jul";
				break;
				case"08";
					$bulan="Agus";
				break;
				case"09";
					$bulan="Sept";
				break;
				case"10";
					$bulan="Okt";
				break;
				case"11";
					$bulan="Nov";
				break;
				case"12";
					$bulan="Des";
				break;
			}
			?>	
			<div class="widget-content">
              <ul class="news-items">

                <li>	
                  <div class="news-item-date"> <span class="news-item-day"><?php echo $tanggal.' '.$bulan ?></span> <span class="news-item-month"><?php echo $tahun?></span> </div>
                  <div class="news-item-detail"> <a href="news.html?id=<?php echo $data['id'] ?>" class="news-item-title" ><?php echo $data['topik'] ?></a>
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

        <!-- /span6 -->
        <div class="span6">
         <div class="widget">
            
          <div class="widget">
            <div class="widget-header"> <i class="icon-download"></i>
              <h3>Download Versi Android dan Desktop</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 
			   <a href="aplikasi_android.html"><img src="img/android1.png" width="150" height="150" title="Download Versi Android"></a>
			    <a href="aplikasi_desktop.html"><img src="img/Desktop.png" width="150" height="150" title="Download Versi Desktop"></a>
			   
			   </div>
              <!-- /shortcuts --> 
            </div>
			
			</div>
            <div class="widget-header"> 
			  <div class="widget-header"> <i class="icon-comment"></i>
              <h3> Forum</h3>
            </div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <?php
			
				$query=mysql_query("select * from tb_topik order by tanggal desc limit 3");
				
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
          
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>		  
	<br/>
  <!-- /main-inner --> 
</div>
<?php
	require_once'template/footer.php';
?>