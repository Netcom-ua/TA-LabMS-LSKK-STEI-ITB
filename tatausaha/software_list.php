<?php
error_reporting(0);
include '../include/koneksi.php';
require_once'template/header.php';
$query = "SELECT id, nama_mk FROM tb_matakuliah";
$hasil=mysql_query($query);
$data=mysql_fetch_array($hasil);
$no=0;
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">

            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Tata Usaha</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
				<div class="alert alert-info" align="center">
                  <h3> Software </h3>
				 </div>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->

			<form action="" method="post" enctype="multipart/form-data"
				style="margin-top: 20px;">
				<div>
					<table align="center">
						<tr>
							<th class="alert-info" width="30px" align="center">No</th>
							<th class="alert-info" width="280px" align="center">Nama Praktikum</th>
							<th class="alert-info" width="120px" align="center">Unggah Software</th>
						</tr>
						<?php do{ $no++;?>

						<tr>
							<td align="center"><?php echo $no;?></td>
							<td><?php echo $data['nama_mk'];?></td>
							<td align="center"><a
								href="software_upload.php?id=<?php echo $data['id'];?>"><img
									src="gambar/menu/upload.png"> </a></td>
						</tr>
						<?php }while ($data=mysql_fetch_array($hasil))?>
					</table>
				</div>
			</form>
			








</div>
                <!-- /widget-content --> 
          </div>
        </div>
      </div>
          <!-- /widget -->
          <!-- /widget -->
          <!-- /widget -->
    </div>
    <!-- /span6 -->
        
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
	require_once'template/footer.php'
?>