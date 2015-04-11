<?php
error_reporting(0);
include '../include/koneksi.php';
require_once'template/header.php';
?>

<?php

		$query2 ="SELECT * FROM tb_mdl_upload_video";
		$hasil2 =  mysql_query($query2);
		$data2 = mysql_fetch_array($hasil2);
		$no=0;

?>

<?php
if(isset($_POST['Submit'])){
	error_reporting(0);
	$video_name = $_FILES["file"]["name"];
	$new_name = str_replace (" ", "", $video_name);
	$size = $_FILES["file"]["size"];
	$type = $_FILES["file"]["type"];
	$path = "../tatausaha/video/" . $_FILES["file"]["name"];
	//$date = date("Y-m-d", time()+60*60*7);
	//$time = date("H:i:s", time()+60*60*5);

	$allowedExts = array("FLV","flv");
	$extension = end(explode(".", $_FILES["file"]["name"]));
	if ((($_FILES["file"]["type"] == "application/octet-stream"))
	&& in_array($extension, $allowedExts))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		}
		{

			if (file_exists("video/" .$_FILES["file"]["name"]))
			{
				echo "<script>alert ('Video sudah ada')</script>";
			}

			else
			{
				$query = "INSERT INTO tb_mdl_upload_video VALUES ('null','$video_name','$size','$type','$path',now())";
				$hasil = mysql_query($query);
				if ($hasil){
						
					move_uploaded_file($_FILES["file"]["tmp_name"],
					"video/" . $video_name);

					echo "<script language=javascript>
				alert('Video Berhasil Diunggah');</script>";
					echo '<script type=text/javascript>
				window.location = "video_upload.html";
				</script>';
				}else {
					echo "<script language=javascript>
				alert('Video Gagal Diunggah');</script>";
				}
			}
		}
	}
	else
	{
		echo "<script>alert ('Tipe video salah')</script>";
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
                <div class="alert alert-danger" align="center">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Upload Video</strong> 
				</div>
					<form action="" method="post" enctype="multipart/form-data">
						<table align="center">
							<tr>
								<td><input type="hidden" name="MAX_FILE_SIZE" value="128000000">
								</td>
							</tr>

							<tr>
								<td></td>
								<td><input type="file" name="file" id="file" required=""></td>
							</tr>

							<tr>
								<td></td>
								<td><input class="btn btn-primary" type="submit" name="Submit" value="Submit"></td>
							</tr>
						</table>
					</form>
					<div class="alert alert-danger" align="center">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Tipe Video: FLV</strong> 
					</div>
			
			<?php 
			$query2 ="SELECT * FROM tb_mdl_upload_video";
			$hasil2 =  mysql_query($query2);
			$data2 = mysql_fetch_array($hasil2);

			if (!empty($data2)){
			?>
				<table class="table table-striped table-bordered">
					<tr>
						<th width="30px" align="center">No
						
						</td>
						<th width="210px" align="center">Nama Video</th>
						<th width="90px" align="center">Ukuran (B)</th>
						<th width="90px" align="center">Tanggal</th>
						<th width="50px" align="center">Putar</th>
						<th width="50px" align="center">Unduh</th>
						<th width="50px" align="center">Hapus</th>
					</tr>
					
					<?php do{ $no++;?>

					<tr>
						<td align="center"><?php echo $no;?></td>
						<td align="center"><?php echo basename($data2['path'],".FLV");?></td>
						<td align="center"><?php echo $data2['size'];?></td>
						<td align="center"><?php echo $data2['date'];?></td>
						<td align="center"><a
							href="video_play.php?id=<?php echo $data2['id'];?>"><img
								src="../tatausaha/gambar/menu/play.png"> </a></td>
						<td align="center"><a
							href="video_download.php?id=<?php echo $data2['id'];?>"><img
								src="../tatausaha/gambar/menu/download.png"> </a></td>
						<td align="center"><a
							href="javascript:if(confirm('Apakah Anda yakin akan menghapus video ini?')){document.location='video_delete.php?id=<?php echo $data2['id'];?>'}"><img
								src="../tatausaha/gambar/menu/delete.png"> </a></td>
					</tr>
					<?php 
					}
					while ($data2=mysql_fetch_array($hasil2))
					?>
				</table>
				<?php 
				}else {
					}
				?>
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