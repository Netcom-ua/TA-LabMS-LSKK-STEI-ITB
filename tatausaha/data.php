<?php
error_reporting(0);
include '../include/koneksi.php';
?>

<?php
if(isset($_GET['id'])){
	$sqldel=mysql_query("DELETE FROM tb_mdl_user WHERE Nim='".$_GET['id']."'");

}
$uploadnumber=mysql_query("SELECT * FROM `tb_mdl_user` group by uploadnumber order by uploadnumber asc");

if (isset($_POST['unduh'])){
		if (!empty($_POST['jumlahkopi']) && abs($_POST['jumlahkopi'])){
			$_SESSION["jumlah"]=$_POST['jumlahkopi'];
			$_SESSION["urutan"]=$_POST['urutan'];
			$_SESSION["tanggalupload"]=tglSQL2($_POST['tanggal']);
			include 'tatausaha/proses_excel/proses_export2.php';
		}
		else {
			print("<script>alert('isi data dengan benar');</script>");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Laboratorium Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/menu3.css">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	

<script type="text/javascript"
	src="tatausaha/mahasiswa/pindahjadwal/jquery-1.4.3.min.js"></script>
<script type="text/javascript"
	src="tatausaha/mahasiswa/pindahjadwal/date/ui.core.js"></script>
<script type="text/javascript"
	src="tatausaha/mahasiswa/pindahjadwal/date/ui.datepicker.js"></script>
<link type="text/css" href="tatausaha/mahasiswa/pindahjadwal/date/base/ui.all.css"
	rel="stylesheet" />
<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({altField: '#alternate', altFormat: 'DD, d MM, yy'});
        //$("#datepicker2").datepicker({altField: '#alternate2', altFormat: 'DD, d MM, yy'});
	});
</script>	


</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">Administrator Management System</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Login</a></li>
              <li><a href="javascript:;">Pendaftaran</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>
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
        <li class="active"><a href="upload_mahasiswa.php"><i class="icon-list"></i><span>Unggah Data Mahasiswa</span> </a> </li>
        <li><a href="#"><i class="icon-tags"></i><span>Unggah Jadwal</span> </a> </li>
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
                  <h6 class="bigstats" align="center">Generate Jadwal</h6>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->











	<form method="post" enctype="multipart/form-data">
		<table align="center" border="1">
			<tr>
				<td colspan="2">Ekspor Jadwal:</td>
			</tr>
			<tr>
				<td>Tanggal Upload</td>
				<td><input type="text" size="10" id="datepicker" name="tanggal" /> <input
					type="text" size="30" id="alternate" name="tanggal1" readonly />
				</td>
			</tr>
			<tr>

				<td>Urutan Upload ke</td>
				<td><select name="urutan">
				<?php while ($row=mysql_fetch_array($uploadnumber)){
					echo "<option value=".$row['uploadnumber']." >";
					echo $row['uploadnumber']."</option>";
				}?>
				</select>
				</td>
			</tr>
			<tr>
				<td>Cetak Per User</td>
				<td><input type="text" name="jumlahkopi">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="cek" value="Cek"> <input
					type="submit" name="unduh" value="Eksport"></td>
			</tr>
		</table>
	</form>
	<br>
	<br>
	<?php

	if(!isset($_POST['cek'])){
		$showhal='';
		// jumlah data yang akan ditampilkan per halaman

		$dataPerhal = 10;

		// apabila $_GET['hal'] sudah didefinisikan, gunakan nomor halaman tersebut,
		// sedangkan apabila belum, nomor halamannya 1.

		if(isset($_GET['hal']))
		{
			$nohal = $_GET['hal'];
		}
		else $nohal = 1;

		// perhitungan offset

		$offset = ($nohal - 1) * $dataPerhal;

		// query SQL untuk menampilkan data perhalaman sesuai offset
		$query=mysql_query("SELECT *,DATE(uploaddate)as tanggal,TIME(uploaddate) as jam from tb_mdl_user WHERE role=6 order by uploaddate desc, uploadnumber asc LIMIT $offset, $dataPerhal ");


		if(mysql_num_rows($query)!==0){
			echo "<table border=1 align='center'>
		<tr>
		<th>Nim</th>
		<th>Nama</th>
		<th>Tanggal upload</th>
		<th>Jam</th>
		<th>Urutan</th>
		<th></th>
		</tr>";

			while ($row=mysql_fetch_array($query)){
				echo "<tr>
	<td>".$row["nim"]."</td>
	<td>".$row["username"]."</td>
	<td>".tglSQL($row["tanggal"])."</td>
	<td>".$row["jam"]."</td>
	<td>ke- ".$row["uploadnumber"]."</td>
	<td><a href='data.php?id=".$row['nim']."'>Hapus</a></td>
		</tr>";
			}
			echo "</table><br>";
		}

		else{
			echo "<center>no result database</center>";
		}
		$query   = "SELECT COUNT(*) AS jumData FROM tb_mdl_user";
		$hasil  = mysql_query($query);
		$data     = mysql_fetch_array($hasil);

		$jumData = $data['jumData'];

		// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

		$jumhal = ceil($jumData/$dataPerhal);

		// menampilkan link previous
		echo '<div align="center">';
		if ($nohal > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?page=datauser&hal=".($nohal-1)."'>&lt;&lt; Prev</a>";

		// memunculkan nomor halaman dan linknya

		for($hal = 1; $hal <= $jumhal; $hal++)
		{
			if ((($hal >= $nohal - 3) && ($hal <= $nohal + 3)) || ($hal == 1) || ($hal == $jumhal))
			{
				if (($showhal == 1) && ($hal != 2))  echo "...";
				if (($showhal != ($jumhal - 1)) && ($hal == $jumhal))  echo "...";
				if ($hal == $nohal) echo " <b>".$hal."</b> ";
				else echo " <a href='".$_SERVER['PHP_SELF']."?page=datauser&hal=".$hal."'>".$hal."</a> ";
				$showhal = $hal;
			}
		}
		// menampilkan link next
		if ($nohal < $jumhal) echo "<a href='".$_SERVER['PHP_SELF']."?page=datauser&hal=".($nohal+1)."'>Next &gt;&gt;</a>";
		echo '</div>';
	}
	
	
	else if(isset($_POST['cek'])){
		if (!empty($_POST['tanggal'])||!empty($_POST['urutan'])){
			$tanggal=tglSQL2($_POST['tanggal']);
			$urutan=$_POST['urutan'];
			$showhal='';
			// jumlah data yang akan ditampilkan per halaman

			$dataPerhal = 10;

			// apabila $_GET['hal'] sudah didefinisikan, gunakan nomor halaman tersebut,
			// sedangkan apabila belum, nomor halamannya 1.

			if(isset($_GET['hal']))
			{
				$nohal = $_GET['hal'];
			}
			else $nohal = 1;

			// perhitungan offset

			$offset = ($nohal - 1) * $dataPerhal;

			// query SQL untuk menampilkan data perhalaman sesuai offset
			$query=mysql_query("SELECT *,DATE(uploaddate)as tanggal,TIME(uploaddate) as jam from mdl_user WHERE DATE(uploaddate)='$tanggal' AND role=6 AND uploadnumber='$urutan' order by uploaddate desc, uploadnumber asc LIMIT $offset, $dataPerhal ");



			if(mysql_num_rows($query)!==0){
				echo "<table border=1 align='center'>
		<tr>
		<th>Nim</th>
		<th>Nama</th>
		<th>Tanggal upload</th>
		<th>Jam</th>
		<th>Urutan</th>
		<th></th>
		</tr>";

				while ($row=mysql_fetch_array($query)){
					echo "<tr>
	<td>".$row["nim"]."</td>
	<td>".$row["username"]."</td>
	<td>".tglSQL($row["tanggal"])."</td>
	<td>".$row["jam"]."</td>
	<td>ke- ".$row["uploadnumber"]."</td>
	<td><a href='data.php?id=".$row['nim']."'>Hapus</a></td>
		</tr>";
				}
				echo "</table><br>";
			}

			else{
				echo "<center>no result database</center>";
			}
			$query   = "SELECT COUNT(*) AS jumData FROM tb_mdl_user";
			$hasil  = mysql_query($query);
			$data     = mysql_fetch_array($hasil);

			$jumData = $data['jumData'];

			// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

			$jumhal = ceil($jumData/$dataPerhal);

			// menampilkan link previous
			echo '<div align="center">';
			if ($nohal > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?page=datauser&hal=".($nohal-1)."'>&lt;&lt; Prev</a>";

			// memunculkan nomor halaman dan linknya

			for($hal = 1; $hal <= $jumhal; $hal++)
			{
				if ((($hal >= $nohal - 3) && ($hal <= $nohal + 3)) || ($hal == 1) || ($hal == $jumhal))
				{
					if (($showhal == 1) && ($hal != 2))  echo "...";
					if (($showhal != ($jumhal - 1)) && ($hal == $jumhal))  echo "...";
					if ($hal == $nohal) echo " <b>".$hal."</b> ";
					else echo " <a href='".$_SERVER['PHP_SELF']."?page=datauser&hal=".$hal."'>".$hal."</a> ";
					$showhal = $hal;
				}
			}
			// menampilkan link next
			if ($nohal < $jumhal) echo "<a href='".$_SERVER['PHP_SELF']."?page=datauser&hal=".($nohal+1)."'>Next &gt;&gt;</a>";
			echo '</div>';
		}else {
			print("<script>alert('isi data dengan benar');</script>");
		}
	}


	?>















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
<div class="extra">
  <div class="extra-inner">
    <div class="container">
      <div class="row">
                    <div class="span3">
                        <h4>
                            About Free Admin Template</h4>
                        <ul>
                            <li><a href="javascript:;">EGrappler.com</a></li>
                            <li><a href="javascript:;">Web Development Resources</a></li>
                            <li><a href="javascript:;">Responsive HTML5 Portfolio Templates</a></li>
                            <li><a href="javascript:;">Free Resources and Scripts</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                            Support</h4>
                        <ul>
                            <li><a href="javascript:;">Frequently Asked Questions</a></li>
                            <li><a href="javascript:;">Ask a Question</a></li>
                            <li><a href="javascript:;">Video Tutorial</a></li>
                            <li><a href="javascript:;">Feedback</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                            Something Legal</h4>
                        <ul>
                            <li><a href="javascript:;">Read License</a></li>
                            <li><a href="javascript:;">Terms of Use</a></li>
                            <li><a href="javascript:;">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                            Open Source jQuery Plugins</h4>
                        <ul>
                            <li><a href="http://www.egrappler.com">Open Source jQuery Plugins</a></li>
                            <li><a href="http://www.egrappler.com;">HTML5 Responsive Tempaltes</a></li>
                            <li><a href="http://www.egrappler.com;">Free Contact Form Plugin</a></li>
                            <li><a href="http://www.egrappler.com;">Flat UI PSD</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                </div>
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
        <div class="span12"> &copy; 2013 <a href="http://www.egrappler.com/">Bootstrap Responsive Admin Template</a>. </div>
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




