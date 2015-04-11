<?php
error_reporting(0);
include '../include/koneksi.php';
require_once'template/header.php'
?>
<?php
		$idpraktikum = $_GET['id'];
			
		$query = "SELECT * FROM tb_mdl_upload_software WHERE praktikumid = '$idpraktikum'";
		$hasil = mysql_query($query) or die("".mysql_error());
		$data = mysql_fetch_array($hasil);

		$query2 = "SELECT nama_mk FROM tb_matakuliah WHERE id = '$idpraktikum'";
		$hasil2 = mysql_query($query2);
		$data2 = mysql_fetch_array($hasil2);
		$namaPraktikum = $data2['nama_mk'];

		if(!empty($data)){
			if ($data != $idpraktikum){
				$thisdir = getcwd();
				(mkdir($thisdir ."../upload/data/".$namaPraktikum."/" , 0777));
				(mkdir($thisdir ."../upload/data/".$namaPraktikum."/software_tambahan/", 0777));
			}
		}else{
			$thisdir = getcwd();
			(mkdir($thisdir ."../upload/data/".$namaPraktikum."/" , 0777));
			(mkdir($thisdir ."../upload/data/".$namaPraktikum."/software_tambahan/", 0777));
		}


$no = 0;
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">

            <div class="widget-header"> <i class="icon-home"></i>
              <h3>Download Software</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <div id="big_stats" class="cf">
			
			
			<?php
			$query = "SELECT * FROM tb_mdl_upload_software WHERE praktikumid = '$idpraktikum'";
			$hasil = mysql_query($query) or die("".mysql_error());
			$data = mysql_fetch_array($hasil);
	
			$query2 = "SELECT name FROM tb_matakuliah WHERE id = '$idpraktikum'";
			$hasil2 = mysql_query($query2);
			$data2 = mysql_fetch_array($hasil2);
			$namaPraktikum = $data2['name'];
		
			if (!empty($data)){?>

			<div style="margin-top: 20px; margin-bottom: 15px;">
				<table align="center" border="0">
					<tr>
						<th class="alert-info" width="35px" align="center">No</th>
						<th class="alert-info" width="220px" align="center">Nama Software</th>
						<th class="alert-info" width="90px" align="center">Ukuran (B)</th>
						<th class="alert-info" width="90px" align="center">Tanggal</th>
						<th class="alert-info" width="50px" align="center">Unduh</th>
						
					</tr>
					<?php do { $no++;?>
					<tr>
						<td width="35px" align="center"><?php echo $no;?></td>
						<td width="220px" align="center"><?php echo basename($data['path'],".exe");?>
						</td>
						<td width="90px" align="center"><?php echo $data['size']?></td>
						<td width="90px" align="center"><?php echo $data['date']?></td>
						<td width="50px" align="center"><a
							href="software_download.html?id=<?php echo $data['id'];?>"><i class="btn icon-download-alt" title="Download"></i> </a> </td>
					</tr>
					<?php }while ($data = mysql_fetch_array($hasil))?>

				</table>
			</div>

			<?php }else {
			echo "kosong";
			}?>
		</div>
	</div>


  </div>
                <!-- /widget-content --> 
          </div>
        </div>
          <!-- /widget -->
          <!-- /widget -->
          <!-- /widget -->
        
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