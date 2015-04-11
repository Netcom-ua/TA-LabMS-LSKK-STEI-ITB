<?php
	require_once'template/header.php';
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Data Inventaris</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
				      <?php include "tampil_inventaris1.php"?>
				   
                </div>
                <!-- /widget-content --> 
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
