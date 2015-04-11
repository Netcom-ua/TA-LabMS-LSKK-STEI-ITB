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
              <h3>Halaman Tata Usaha</h3>
            </div>
            <!-- /widget-header -->
                <div class="widget-content">
                  <div class="alert alert-info" align="center">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong><h2>Panduan Praktikum</h2></strong> 
					</div>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->

	
				<form method='post' action='update_pass.php' enctype='multipart/form-data'>
				<table width="650" align="center">
				<tr>
					<td width="650" align="left" valign="top"><span
					style="font-size: 14px;"><?php echo $info['info_panduan'];?> </span>
					</td>
				</tr>
				<tr>
					
				</tr>
				</table>
				</form>
				
					<div class="alert alert-info" align="center">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong class="btn"><a href="informasi_lab.html"> Back </a> | <a href="panduan_edit.html">Edit</a></strong> 
				</div>
				</div>
           
          </div>
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
	require'template/footer.php';
?>