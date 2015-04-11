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
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Administrator</h3>
            </div>
            <!-- /widget-header -->
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <div class="alert alert-info" align="center">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong><h2>Ubah Deskripsi Praktikum</h2></strong> 
					</div>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
	
				   
			<?php
			$cekDb=mysql_query("SELECT * FROM tb_mdl_labname");
			$info=mysql_fetch_array($cekDb);

			if(isset($_POST['panduan_update'])){
			$info_panduan = $_POST['info_panduan'];
			$query = "UPDATE tb_mdl_labname SET info_panduan = '$info_panduan' WHERE id=1";
			mysql_query($query);
			if ($query)
			{
			print '<script>window.location.href = "panduan_view.php";</script>';
			}
			else
			{
			echo "<script>alert ('Info Panduan gagal di edit')</script>";
			}	
			}
			?>

			<div align="center">
				<div id="area4">
						<div
					style="margin: 0 auto; width: 675px; background-color: #ffffff; border-radius: 15px; padding-top: 3px; margin-bottom: 13px; margin-top: 13px;">
					
					<form method="post" action="" style="padding: 0px; margin: 0px;">
						<textarea id="ckeditor_full" name="info_panduan" required="required"/><?php echo $info['info_panduan'];?></textarea>
								<br/>
							<input type="submit" value="Ubah" style="width: 78px; padding-bottom: 3px;" 
									name="panduan_update" > <input type="button" value=Batal
									onClick="self.history.back()" style="width: 75px; padding-bottom: 3px;">
								
						</table>
					</form>
				</div>
			</div>

                <!-- /widget-content --> 
              </div>
          </div>
          <!-- /widget -->
            <!-- /widget-header -->
           
            <!-- /widget-content --> 
          </div>
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
	require'template/footer.php';
?>