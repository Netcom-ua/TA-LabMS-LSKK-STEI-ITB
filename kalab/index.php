<?php
	require_once'template/header.php'
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
		</div>
        <!-- /span6 -->
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Halaman Kepala Lab</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts">
			  <a href="daftar_praktikum.html" class="shortcut"><i class="shortcut-icon icon-user"></i>
			  <span class="shortcut-label">Nilai Praktikan</span> </a>
			  <a href="generate_laporan_praktikum.html" class="shortcut"> <i class="shortcut-icon icon-print "></i>
			  <span class="shortcut-label">Generate Laporan</span> </a> 
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
	  <div class="span6">
          <div class="widget">
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
			   <a href="dosen.html" class="shortcut"> 
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
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
    </div>
    </div>
    </div>
    <!-- /container --> 
  </div>
<?php
	require_once'template/footer.php';
?>