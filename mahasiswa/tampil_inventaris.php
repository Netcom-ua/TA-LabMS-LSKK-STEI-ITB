<?php
	require_once'template/header.php';
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
            <div class="widget-header"> <i class="icon-home"></i>
              <h3> Halaman Mahasiswa</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
				<div class="alert alert-warning" align="center">
                  <h3>Informasi Data Inventaris</h3>
				 </div>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
				   <?php include "tampil_inventaris1.php"?>
				   
               
          </div>
          </div>
          <!-- /widget -->
          
          <!-- /widget --> 
        </div>
        <!-- /span6 -->
        
        <!-- /span6 --> 
      </div></br>
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
