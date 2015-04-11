<?php
	require_once'template/header.php';
	$id = $_GET['id'];
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
       	<div class="span8">
	      		
	      		<div class="widget">
	      			
	      			<div class="widget-content">
	      				
			      		<h2></h2>
			      		
			      		<?php 
			$query =  "SELECT * FROM tb_mdl_newsfeed where id='$id'";
			$result = $mysqli->query($query)
			or die('<b>-- Query failed -- </b> ' . mysql_error());
			while ($data = $result->fetch_array()){
			$new=$data['deskripsi']; 
			//$berita=substr($new,0, 500);
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
			<h3>Berita LabMS</h3>
			<div class="widget-content">
              <ul class="news-items">
				
                <li>	
                  <div class="news-item-date"> <span class="news-item-day"><?php echo $tanggal.' '.$bulan ?></span> <span class="news-item-month"><?php echo $tahun?></span> </div>
                  <div class="news-item-detail"> <a href="#" class="news-item-title" ><h3><?php echo $data['topik'] ?></h3></a>
                    <p class="news-item-preview"><?php echo $data['deskripsi']; ?></p> Sumber : 
					<a href="<?php echo $data['link'] ?>"> <?php echo $data['link'] ?></a>
                  </div>
                </li>
              </ul>
            </div>
			<?php } ?>
		      		</div> <!-- /widget-content -->
		      		
	      		</div> <!-- /widget -->
	      		
      		</div> <!-- /span12 -->
      		
	      	<div class="span4">
	      		
	      		<div class="widget">
	      			
	      			<div class="widget-content">
	      				
			      		<h3>Berita Terbaru</h3>
						<?php
						$query =  "SELECT * FROM tb_mdl_newsfeed";
						$result = $mysqli->query($query)
						or die('<b>-- Query failed -- </b> ' . mysql_error());
						while ($data = $result->fetch_array()){
						$new=$data['deskripsi']; 
						//$berita=substr($new,0, 500);
						$tanggal=$data['tanggal'];
						?>
						
			      		<ul>
							<li><a href="news.html?id=<?php echo $data['id'] ?>" class="news-item-title" ><?php echo $data['topik'] ?></a></li>
						</ul>
						<?php } ?>
		      		</div> <!-- /widget-content -->
		      		
	      		</div> <!-- /widget -->
	      		
      		</div> <!-- /span6 -->
      		 	
	      	
	      	

      	
  <!-- /main-inner --> 
	</div>
</div><br/>
<?php
	require_once'template/footer.php';
?>