<?php
error_reporting(0);
require'template/header.php';
include '../include/koneksi.php';

$cekDb=mysql_query("SELECT * FROM tb_mdl_newsfeed ORDER BY tanggal DESC ");
$info=mysql_fetch_array($cekDb);
$hasil = count($info);

$wrnaganjil = "#00ba8b";
$wrnagenap = "#07e6ae";
$content=0;
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      
        
        <!-- /span6 --> 
      
	  <div class="span12">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-th-large"></i>
						<h3>Newsfeed <a href="newsfeed_input.php">Insert</a></h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<div class="pricing-plans plans-3">
						<?php 
						$query =  "SELECT * FROM tb_mdl_newsfeed ORDER BY tanggal DESC";
									//var_dump($query);
									$result = $mysqli->query($query)
									or die('<b>-- Query failed -- </b> ' . mysql_error());
									while ($data = $result->fetch_array()){
									//Filter no HP
						$tgl=$data['tanggal']; 
						$tanggal=substr($tgl,0, 10);
						//$new=$data['deskripsi']; 
						//$berita=substr($new,0, 300);
						?>	
						<div class="plan-container">
						        <div class="plan-header">
					        <div class="plan green">
						        	<div class="plan-title">
						        		<a href="<?php echo $data['link'];?>"><?php echo $data['topik'];?> </a>    		
					        		</div> <!-- /plan-title -->
							</div>
					      	<div class="plan green">						
						            <div class="plan-price">
					                	<p><?php echo $tanggal;?></p>
									</div> <!-- /plan-price -->
									
						        </div> <!-- /plan-header -->
							</div>								
						        
						        <div class="plan-features">
									<ul>
										<li><?php echo $data['deskripsi'];?></li>
									</ul>
								</div> <!-- /plan-features -->
								
								<div class="plan-actions">				
									<a href="newsfeed_edit.php?page=newsfeed_edit&id=<?php echo $data['id']?>" class="btn">Edit</a>
									<a href="javascript:if(confirm('Anda yakin akan menghapus Newsfeed ini ?')){document.location='newsfeed_hapus.php?id=<?php echo $data['id'] ?>';}" class="btn">Delete</a>				
								</div> <!-- /plan-actions -->
					
							<!--</div>  /plan -->
					    </div> <!-- /plan-container -->
					    
					    <?php
						} ?>
					   
				
					</div> <!-- /pricing-plans -->
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->					
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