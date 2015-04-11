<?php
session_start();
error_reporting(0);
include '../include/koneksi.php';
require_once'template/header.php';

if (isset($_POST["upload"])){
	if(!empty($_FILES["userfile"]) && ($_FILES["userfile"]["error"]==0)){
		$filename= basename($_FILES['userfile']['name']);

		//read extension
		$ekstensi=substr($filename, strrpos($filename,'.')+1);

		if($ekstensi=="xlsx" || $ekstensi=="XLSX"){
			include "proses_excel/proses_xlsx.php";
		}
		else{
			echo "<script>alert('File ekstensi anda salah, ekstensi anda ".$ekstensi."');</script>";
		}

	}else{
		echo "<script>alert('No file uploaded');</script>";
	}
}
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <!--<div class="widget widget-nopad">-->
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Tata Usaha</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <h6 class="bigstats" align="center">Upload Jadwal Laporan Praktikum</h6>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
					<form method="post" enctype="multipart/form-data">
						<table align="center">
							<tr>
								<td>Silakan Pilih File Excel Ekstensi <b>.xlsx</b></td>
							</tr>
							<tr>
								<td><input name="userfile" type="file"></td>
							</tr>
							<tr>
								<td><input name="upload" type="submit" value="Import"></td>
							</tr>
						</table>
						
					</form>
					</div>
					
            </div>
          </div>
		 </div>
          	<!-- /widget-header -->
			
            
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<?php
	require_once'template/footer.php';
?>