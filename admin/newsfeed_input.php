<?php
require_once'template/header.php';
?>

<?php
if(isset($_POST['newsfeed_insert'])){
	$topik = $_POST['inputTopik'];
	$deskripsi = $_POST['inputDeskripsi'];
	$link = $_POST['inputLink'];
	//$tanggal = $_POST['inputTanggal'];

	$query = "INSERT INTO tb_mdl_newsfeed VALUES ('null','$topik','$deskripsi','$link',NOW())";
	$sql = mysql_query($query);
	$hasil = count($info);
	if ($sql)
	{

		print '<script>window.location.href = "newsfeed_view.php";</script>';
	}
	else
	{
		echo "<script>alert ('Maaf data gagal disimpan !')</script>";
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
                  <h3>Tambah berita</h3>
				 </div> 
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
				   
	
					<form action="" name="newsfeed_insert" method="post">
				<table>
					<tr>
						<td>Topik</td>
						<td><input type="text" name="inputTopik" style="width: 455px;">
						</td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td><textarea id="ckeditor_full" name="inputDeskripsi" required="required"/></textarea>
						</td>
					</tr>
					<tr>
						<td>Sumber</td>
						<td valign="top"><input type="text" name="inputLink" value="" required="required"/>
						</td>
					</tr>
					<tr>
					<td></td>
						<td><input type="submit" name="newsfeed_insert" value="Tambah">
						<input type="button" name="batal_edit" value="Batal"
							onClick="self.history.back()"></td>
					</tr>
					
				</table>
			</form>
				
			</div>
			</div>
			</div>
			</div>
			</div>
           
<?php
	require_once'template/footer.php';
?>