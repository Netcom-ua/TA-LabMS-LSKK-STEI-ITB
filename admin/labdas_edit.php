<?php
require'template/header.php';
$cekDb=mysql_query("SELECT * FROM tb_mdl_labname");
$info=mysql_fetch_array($cekDb);
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
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
			<?php
			$cekDb=mysql_query("SELECT * FROM tb_mdl_labname") or die ("".mysql_error());
			$info=mysql_fetch_array($cekDb);
			
			if(isset($_POST['labdas_update'])){
				$nama_lab = $_POST['nama_lab'];
				$nama_lab_full = $_POST['nama_lab_full'];
				$universitas = $_POST['universitas'];
				$info_lab = $_POST['info_lab'];
				$lokasi_file=$_FILES['logo']['tmp_name'];
				
				if(!empty($nama_lab)){
				$query = "UPDATE tb_mdl_labname SET nama_lab = '$nama_lab', info_lab = '$info_lab', nama_lab_full = '$nama_lab_full',universitas = '$universitas' WHERE id=1";
				$result = $mysqli->query($query);
				if($result == 1)
				{
					echo "<script>
						alert('Data berhasil diganti');
					setTimeout(function() {
							document.location.href='labdas_view.html';
					}, 1000);
					</script>"; 
				} else {
					echo "<script>
						alert('Gagal update data');
					setTimeout(function() {
							document.location.href='labdas_view.html';
					}, 1000);
					</script>";
				} 
			}
				
			if(!empty($lokasi_file) && !empty($nama_lab)){
				$lokasi_file=$_FILES['logo']['tmp_name'];
				$nama_file=$_FILES['logo']['name'];
				move_uploaded_file($lokasi_file,"../img/$nama_file");
				
				$query = "UPDATE tb_mdl_labname SET nama_lab = '$nama_lab', 
				logo = '$nama_file',
				info_lab = '$info_lab', 
				nama_lab_full = '$nama_lab_full',
				universitas = '$universitas' WHERE id=1";
				//var_dump($query);
				$result = $mysqli->query($query);

			}
			}
			?>
			<div class="alert alert-success" align="center">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><h2>Ubah Data Laboratory Management System (LabMS)</h2></strong> 
					
					<form method="post" action="" enctype="multipart/form-data" style="padding: 0px; margin: 0px;">
						<table class="table">
							<tr>
								<td class="alert alert-info"><span style="font-size: 15px;">Singkatan Lab </td>
								<td class="alert alert-warning"></span><input name='nama_lab' type='text' style="width: 300px"value="<?php echo $info['nama_lab'];?>">
								</td>
							</tr>
							<tr>
								<td class="alert alert-info"><span style="font-size: 15px; ">Nama Lab </td>
								<td class="alert alert-warning"></span><input name='nama_lab_full' type='text' style="width: 300px"
									value="<?php echo $info['nama_lab_full'];?>">
								</td>
							</tr>
							
							<tr>
								<td class="alert alert-info"><span style="font-size: 15px; ">Logo Header </td>
								<td class="alert alert-warning"></span><img src="../img/<?php echo $info['logo'];?>" alt="">
								</td>
							</tr>
							<tr>
								<td class="alert alert-info"><span style="font-size: 15px; "> Ukuran 590 Pixel x 105 Pixel</td>
								<td class="alert alert-warning"></span>
								 <input name="logo" id="logo" type="file" placeholder="logo" title="logo"/>
								</td>
							</tr>
							<tr>
								<td class="alert alert-info"><span style="font-size: 15px">Fakultas, Universitas</td>
								<td class="alert alert-warning"></span><input name='universitas' type='text' style="width: 300px"
									value="<?php echo $info['universitas'];?>">
								</td>
							</tr>
							<tr>
								<td class="alert alert-info">Deskripsi</td>
								<td class="alert alert-warning">
								<!--<textarea cols="60" rows="10" id="info_lab" name="info_lab">
								<?php echo $info['info_lab'];?>
								</textarea> <script type="text/javascript">
								var editor = CKEDITOR.replace('info_lab');
								</script>-->
								<textarea id="ckeditor_full" name="info_lab" required="required"/><?php echo $info['info_lab'];?></textarea>
								</td>
							</tr>
							
							<tr>
								<td class="alert alert-info"></td>
								<td class="alert alert-warning" colspan="2"><input type="submit" value="Ubah" style="width: 78px; padding-bottom: 3px;" 
									name="labdas_update"></a><input type="button" value=Batal
									onClick="self.history.back()" style="width: 75px; padding-bottom: 3px;">
								</td>
							</tr>
						</table>
					</form>
					
			</div>
                <!-- /widget-content --> 
              </div>
          </div>
          <!-- /widget -->
          
          <!-- /widget --> 
        </div>
        <!-- /span6 -->
        
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