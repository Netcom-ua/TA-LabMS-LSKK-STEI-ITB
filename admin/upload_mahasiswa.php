<?php
session_start();
error_reporting(0);
include '../include/koneksi.php';
require_once'template/header.php';

// if ($_FILES[csv][size] > 0) {

    //get the csv file
    // $file = $_FILES[csv][tmp_name];
    // $handle = fopen($file,"r");
    
    //loop through the csv file and insert into database
    // do {
        // if ($data[0]) {
			
			//$data[2] = (avatar.png);
			// $data[3] = ($data[0]);
			// $data[4] = aktif;
			// $data[5] = md5($data[0]);
            // mysql_query("INSERT INTO tb_mahasiswa (nim, nama_mhs, foto, username, status, password) VALUES
                // (
                    // '".addslashes($data[0])."',
                    // '".addslashes($data[1])."',
					// '".addslashes($data[2])."',
					// '".addslashes($data[3])."',
					// '".addslashes($data[4])."',
					// '".addslashes($data[5])."'
                // )
            // ");
        // }
    // } while ($data = fgetcsv($handle,1000,",","'"));
    

    //redirect
    // header('Location: upload_mahasiswa.php?success=1'); die;

// }

if (isset($_POST["upload"])){
	if(!empty($_FILES["userfile"]) && ($_FILES["userfile"]["error"]==0)){
		$filename= basename($_FILES['userfile']['name']);

		//read extension
		$ekstensi=substr($filename, strrpos($filename,'.')+1);

		if($ekstensi=="xls" || $ekstensi=="XLS"){
			include "proses_excel/proses_xls_mhs.php";
		}
		elseif ($ekstensi=="xlsx" || $ekstensi=="XLSX"){
			include "proses_excel/proses_xlsx_mhs.php";
		}
		else{
			echo "<script>alert('File ekstensi anda salah, ekstensi anda ".$ekstensi."');</script>";
		}

	}else{
		echo "<script>alert('Tidak ada data yang diupload');</script>";
	}
}
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman  Administrator</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <h6 class="bigstats" align="center">Data Mahasiswa</h6>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
				<form method="post" enctype="multipart/form-data">
						<table align="center">
							<tr>
								<td>Silakan Pilih File Excel Ekstensi <b>.xls/xlsx</b></td>
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
                <!-- /widget-content --> 
              </div>
            </div>
          </div>
          <!-- /widget -->
          <div class="widget widget-nopad">
            <div class="widget-header"></div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div id='calendar'>              </div>
            </div>
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
	require_once'template/footer.php';
?>