<?php
	require_once'template/header.php';
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-home"></i>
              <h3>Halaman Mahasiswa</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
					<div class="alert alert-success" align="center">
						<h3>Form Peminjaman</h3>
					</div>
				  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
				   <?php 
                include "form_peminjaman1.php";
           ?>
				   
                </div>
                <!-- /widget-content --> 
                
              </div>
            </div>
          </div>
          
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
	require_once'template/footer.php';
?>
