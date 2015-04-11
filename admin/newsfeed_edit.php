<?php
error_reporting(0);
require'template/header.php';
include '../include/koneksi.php';

		$id = $_GET['id'];
		$query = "SELECT * FROM tb_mdl_newsfeed WHERE id = '$id'";
		$hasil = mysql_query($query);
		$data = mysql_fetch_array($hasil);

if(isset($_POST['newsfeed_edit'])){
	$topik = $_POST['inputTopik'];
	$deskripsi = $_POST['deskripsi'];
	$link = $_POST['inputLink'];
	$tanggal = $_POST['inputTanggal'];

	$query = "UPDATE tb_mdl_newsfeed SET topik = '$topik', deskripsi = '$deskripsi', link = '$link', tanggal = '$tanggal' WHERE id = '$id'";
	$sql = mysql_query($query);
	if ($sql)
	{

		print '<script>window.location.href = "newsfeed_view.php";</script>';
	}
	else
	{
		echo "<script>alert ('Maaf data gagal di ubah !')</script>";
	}

}

?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Administrator</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                  <div class="alert alert-info" align="center">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong><h2>Ubah Berita</h2></strong> 
					</div>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
		
				<form action="" name="form_newsfeed_insert" method="post">
				<table>
					<tr>
						<td>Topik</td>
						<td><input type="text" name="inputTopik" value="<?php echo $data['topik'];?>" style="width: 455px;">
						</td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td><textarea id="ckeditor_full" name="deskripsi" required="required"/><?php echo $data['deskripsi'];?></textarea>
						</td>
					</tr>
					<tr>
						<td>Link</td>
						<td valign="top"><input type="text" name="inputLink" value="<?php echo $data['link'];?>"
							style="width: 300px;">
						</td>
					</tr>
					<tr>
					<td></td>
						<td><input type="submit" name="newsfeed_edit" value="Ubah">
						<input type="button" name="batal_edit" value="Batal"
							onClick="self.history.back()"></td>
					</tr>
					
				</table>
			</form>
			
		</div>
	</div> 
				   
                </div>
                <!-- /widget-content --> 
              </div>
            </div>
          </div>
          <!-- /widget -->
<?php
	require'template/footer.php';
?>