<?php
	require_once'template/header.php';
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
          <!-- /widget -->
          <!-- /widget -->
          <!-- /widget -->
</div>
        <!-- /span6 -->
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Halaman Tata Usaha</h3>
            </div>
            <!-- /widget-header -->
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
			  <a href="video_upload.html" class="shortcut">
			  <i class="shortcut-icon icon-facetime-video"></i><span class="shortcut-label">Unggah Video</span> </a>
			  <a href="user" class="shortcut"><i class="shortcut-icon icon-user"></i>
			  <span class="shortcut-label">Tambah User</span> </a>
			  <a href="software_list.html" class="shortcut"><i class="shortcut-icon icon-list-alt"></i>
			  <span class="shortcut-label">Unggah Software</span> </a>
			  <a href="generate_laporan_praktikum.html" class="shortcut">
			  <i class="shortcut-icon icon-file"></i><span class="shortcut-label">Generate Laporan</span> </a>
			  
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
				  $sql="select * from tb_mahasiswa where status='nonaktif'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount1=mysqli_num_rows($result);
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
			   
			   <!-- Menampilkan Jumlah SMS Masuk  -->	
				<?php
					$sql="select * from inbox";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
			   <a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-envelope"></i><span class="shortcut-label">SMS Keluar</span><span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data"><?php printf("%d",$rowcount);?></span> </a>
			   
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
			   <a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-envelope"></i><span class="shortcut-label">SMS Masuk</span><span class="badge badge-warning pull-center" style="line-height:18px;" title="Jumlah data"><?php printf("%d",$rowcount);?></span> </a>
			   
			   <a href="javascript:;" class="shortcut"><span class="badge badge-warning pull-center" style="line-height:18px;"></span> <span class="shortcut-label">Jumlah Data</span><span class="badge badge-success pull-center" style="line-height:18px;"></span> <span class="shortcut-label">Belum dikonfirmasi</span></a>
			   </div>
              <!-- /shortcuts --> 
            </div>
			</div>
            <!-- /widget-content --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<?php 
	require_once'template/footer.php';
?>