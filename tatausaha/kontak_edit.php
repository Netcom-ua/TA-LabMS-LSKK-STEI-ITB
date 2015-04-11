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
              <h3>Halaman Tata Usaha</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                 <div class="alert alert-info" align="center">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong><h2>Ubah Informasi Kontak</h2></strong> 
					</div>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
				   
			<?php
			$cekDb=mysql_query("SELECT * FROM tb_mdl_labname");
			$info=mysql_fetch_array($cekDb);
			
			if(isset($_POST['kontak_update'])){
				$info_kontak = $_POST['info_kontak'];
				$query = "UPDATE tb_mdl_labname SET info_kontak = '$info_kontak' WHERE id=1";
				mysql_query($query);
				if ($query)
				{
					print '<script>window.location.href = "kontak_view.php";</script>';
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
					style="margin: 0 auto; width: 675px; background-color: #ffffff; border-radius: 30px; padding-top: 3px; margin-bottom: 13px; margin-top: 13px;">
					
					<form method="post" action="">
						<textarea id="ckeditor_full" name="info_kontak" required="required"/><?php echo $info['info_kontak'];?></textarea>
						<br/>
						<input type="submit" value="Ubah"  name="kontak_update" > 
						<input type="button" value=Batal onClick="self.history.back()" >
								
					</form>
					</div>
				</div>
			</div>


				   
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
	require'template/footer.php';
?>