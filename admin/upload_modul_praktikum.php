<?php
session_start();
error_reporting(0);
include '../include/koneksi.php';

if (isset($_POST["upload"])){
	if(!empty($_FILES["userfile"]) && ($_FILES["userfile"]["error"]==0)){
		$filename= basename($_FILES['userfile']['name']);

		//read extension
		$ekstensi=substr($filename, strrpos($filename,'.')+1);

		if($ekstensi=="xls" || $ekstensi=="XLS"){
			include "proses_excel/proses_xls.php";
		}
		elseif ($ekstensi=="xlsx" || $ekstensi=="XLSX"){
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

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Lab Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">Administrator Management System</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> Mentari <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Profile</a></li>
              <li><a href="javascript:;">Logout</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="index.php"><i class="icon-home"></i><span>Home</span> </a> </li>
        <li><a href="informasi_lab.php"><i class="icon-tasks"></i><span>Informasi Lab</span> </a> </li>
        <li><a href="upload_mahasiswa.php"><i class="icon-list"></i><span>Unggah Data Mahasiswa</span> </a> </li>
        <li class="active"><a href="upload_jadwal.php"><i class="icon-tags"></i><span>Unggah Jadwal</span> </a> </li>
        <li><a href="charts.html"><i class="icon-bar-chart"></i><span>Unggah Video</span> </a> </li>
        <li><a href="reports.html"><i class="icon-list-alt"></i><span>Unggah Software</span> </a> </li>
        <li><a href="shortcodes.html"><i class="icon-code"></i><span>Generate Laporan</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
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
                  <h6 class="bigstats" align="center">Import Data Praktikum</h6>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
					<form method="post" enctype="multipart/form-data">
						<table align="center">
							<tr>
								<td>Silakan Pilih File Excel:</td>
								<td><input name="userfile" type="file"></td>
							</tr>
							<tr>
								<td></td>
								<td><input name="upload" type="submit" value="Import"></td>
							</tr>
						</table>
					</form>
					</div>
				</div>
                <!-- /widget-content --> 
              </div>
            </div>
          </div>
          	<!-- /widget-header -->
			
            <div class="widget-content">
			<div class="account-container register">
			<div class="content clearfix" align="center">
			<h6 class="bigstats" align="center">Input Data Praktikum</h6>
					<div class="login-fields">
					<p>Isi data dengan akurat dan benar</p>
						<form action="input_praktikum.php" method="post">
							<div class="field">
								<input class="input-xlarge" type="text" id="Kode Matakulaih" name="kd_matakuliah" value="" title="Kode Matakulaih" placeholder="Kode Matakulaih" class="login" required="required"/>
							</div> <!-- /field -->
							
							<div class="field">
								<input class="input-xlarge" type="text" id="" name="nama" value="" title="Nama Matakulaih" placeholder="Nama Matakulaih" class="login" required="required"/>
							</div> <!-- /field -->
							
							<div class="field">
							<textarea class="input-xlarge" rows="4" id="Deskripsi" name="deskripsi" value=""  title="Deskripsi" placeholder="Deskripsi" class="login" required="required"></textarea>
							</div> <!-- /field -->
							
							<div class="field">
									<select class="input-xlarge" id="semester" name="semester" title="Semester" class="login" type="text" required="required">
										<option value="I">Semester</option>
										<option value="I">I</option>
										<option value="III">II</option>
									</select>
							</div> <!-- /field -->
							
							<div class="field">
									<select class="input-xlarge" id="Tahun Akademik" name="akademik" title="Tahun Akademik" class="login" type="text" required="required">
										<option value="2014/2015">Tahun Akademik</option>
										<option value="2014/2015">2013/2014</option>
										<option value="2014/2015">2014/2015</option>
										<option value="2015/2016">2014/2016</option>
									</select>
							</div> <!-- /field -->
							<?php 
									
									require '../include/connect.php';
									$data=mysql_query("select * from tb_dosen");
									//var_dump($query);
									while($row=mysql_fetch_array($data)){
									?>
							<div class="field">
									<select class="input-xlarge" id="" name="nip_dosen" title="NIP Dosen" class="login" type="text" required="required">
										<option value="<?php echo $row['nip'];?>">NIP Dosen</option>
										<option value="<?php echo $row['nip'];?>"><?php echo $row['nip'];?> | <?php echo $row['nama']?></option>
									</select>
							</div> <!-- /field -->
							<?php
								}
							?>
							
							</div> <!-- /login-fields -->
							
							<div class="login-actions">
								
							<button class="button btn btn-primary btn-large">Daftar</button>
						
						</div> <!-- .actions -->
							
						</form>
						
					</div> <!-- /widget -->
				</div> <!-- /span8 -->
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
<div class="extra">
  <div class="extra-inner">
    <div class="container">
      
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /extra-inner --> 
</div>
<!-- /extra -->
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2014 <a href="#">Laboratorium Management System</a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="../js/jquery-1.7.2.min.js"></script> 
<script src="../js/excanvas.min.js"></script> 
<script src="../js/chart.min.js" type="text/javascript"></script> 
<script src="../js/bootstrap.js"></script> 
<script src="../js/base.js"></script> 
<script src="../js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {
        
        $('#tanggal').datepicker({
            format: "dd/mm/yyyy"
        });  
    
    });
 </script>
</body>
</html>