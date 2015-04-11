<?php 
	include 'template/header.php';  
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
			<!-- Menampilkan Jumlah data Mahasiswa  -->	
				<?php
					$sql="select * from tb_dosen";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount1=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
			   // Menampilkan Jumlah data Mahasiswa
					$sql="select * from tb_dosen where status='nonaktif'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount2=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			<div class="widget-header">
			<i class="icon-user"></i>
            <h3> Jumlah Dosen&nbsp;<span class="badge badge-success pull-right" style="line-height:18px;"> <?php printf("%d",$rowcount2);?></span><span class="badge badge-warning pull-right" style="line-height:18px;" title="Belum dikonfirmasi"> <?php printf("%d",$rowcount1);?></span></h3> 
			
				<!-- textbox untuk pencarian data Mahasiswa -->
				<div class="input-prepend pull-right">
				  <input type="text" class="search-query" id="prependedInput" type="text" name="pencarian" placeholder="Pencarian Dosen..">
				</div>
			</div>
			<!-- tempat untuk menampilkan data mahasiswa -->
			<div id="data-dosen"></div>
		
        <!-- /span6 -->
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
		</div>
        
          </div>
          <!-- /widget -->
        </div>
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