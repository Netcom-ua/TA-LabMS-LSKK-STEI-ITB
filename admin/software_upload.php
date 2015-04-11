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
				(mkdir($thisdir ."../tatausaha/upload/data/".$namaPraktikum."/" , 0777));
				(mkdir($thisdir ."../tatausaha/upload/data/".$namaPraktikum."/software_tambahan/", 0777));
			}
		}else{
			$thisdir = getcwd();
			(mkdir($thisdir ."../tatausaha/upload/data/".$namaPraktikum."/" , 0777));
			(mkdir($thisdir ."../tatausaha/upload/data/".$namaPraktikum."/software_tambahan/", 0777));
		}


$no = 0;
?>
<?php

if(isset($_POST['Submit'])){
	$software_name = $_FILES["file"]["name"];
	$size = $_FILES["file"]["size"];
	$type = $_FILES["file"]["type"];
	$path = "upload/data/".$namaPraktikum."/software_tambahan/" . $_FILES["file"]["name"];
	$date = date("Y-m-d", time()+60*60*7);
	$time = date("H:i:s", time()+60*60*5);

	error_reporting(0);
	$allowedExts = array("zip","exe");
	$extension = end(explode(".", $_FILES["file"]["name"]));
	if ((($_FILES["file"]["type"] == "application/zip")
	|| ($_FILES["file"]["type"] == "application/x-msdownload"))
	&& ($_FILES["file"]["size"] < 128000000) //10mb
	&& in_array($extension, $allowedExts))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			//echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		}
		else
		{
			if (file_exists("upload/data/".$namaPraktikum."/software_tambahan/".$_FILES["file"]["name"]))
			{
				echo "<script>alert ('File Name Already Exist')</script>";
			}

			else
			{

				//echo "Stored in: " . "asisten/" . $courseid . "/" . $_FILES["file"]["name"];


				$query = "INSERT INTO tb_mdl_upload_software VALUES ('null','$idpraktikum','$software_name','$size','$type','$path','$date','$time')";
				$hasil = mysql_query($query);
				if ($hasil){
					move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/data/".$namaPraktikum."/software_tambahan/". $_FILES["file"]["name"]);

					echo "<script language=javascript>
				alert('Software Berhasil Diunggah');</script>";	
					?>
				<script type=text/javascript>
				window.location ="software_upload.php?id=<?php echo $idpraktikum;?>";
				</script>
					<?php
				}else {
					echo "<script language=javascript>
				alert('Software Gagal Diunggah');</script>";	
				}


			}
		}
	}
	else
	{
		echo "<script>alert ('Invalid File')</script>";
	};
}
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">

            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Administrator</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
				<div class="alert alert-info" align="center">
                  <h3>Software Upload</h3>
				 </div>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->

			<form action="" method="post" enctype="multipart/form-data">
				<div>
					<table align="center">
						<tr>
							<td><span>Unggah Software</span></td>
							<td>:</td>
							<td><input type="file" name="file" id="file"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><input type="submit" name="Submit" value="Submit"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><span style="font-size: 12px; color: red;">Hanya file bertipe zip/exe</span></td>
						</tr>
					</table>				
				</div>
			</form>
			
			
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
						<th class="alert-info" width="50px" align="center">Hapus</th>
					</tr>
					<?php do { $no++;?>
					<tr>
						<td width="35px" align="center"><?php echo $no;?></td>
						<td width="220px" align="center"><?php echo basename($data['path'],".exe");?>
						</td>
						<td width="90px" align="center"><?php echo $data['size']?></td>
						<td width="90px" align="center"><?php echo $data['date']?></td>
						<td width="50px" align="center"><a
							href="software_download.php?id=<?php echo $data['id'];?>"><img
								src="../tatausaha/gambar/menu/download.png"> </a> </td>
						<td width="50px" align="center"><a
							href="javascript:if(confirm('Apakah Anda yakin akan menghapus software ini?')){document.location='software_delete.php?id=<? echo $data['id'];?>'}"><img
								src="../tatausaha/gambar/menu/delete.png"> </a></td>
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