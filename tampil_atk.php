<?php
	require_once'template/header.php';
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Halaman Mahasiswa</h3>
            </div>
            <!-- /widget-header -->
                <div class="widget-content">
					<div class="alert alert-warning" align="center">
						<h3>Informasi Data Alat Tulis Kantor (ATK)</h3>
					</div>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
				            <?php include "tampil_atk1.php"?>
				   
                </div>
                </div><br/>
                <!-- /widget-content -->
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