<?php
error_reporting(0);
include '../include/koneksi.php';
?>

<?php
if (isset($_GET['page']))
{
	$hal = $_GET['page'];
	if ($hal == "software_upload")
	{
		$idpraktikum = $_GET['id'];
			
		$query = "SELECT * FROM tb_mdl_upload_software WHERE praktikumid = '$idpraktikum'";
		$hasil = mysql_query($query);
		$data = mysql_fetch_array($hasil);

		$query2 = "SELECT name FROM tb_mdl_coursecategories WHERE id = '$idpraktikum'";
		$hasil2 = mysql_query($query2);
		$data2 = mysql_fetch_array($hasil2);
		$namaPraktikum = $data2['name'];

		if(!empty($data)){
			if ($data != $idpraktikum){
				$thisdir = getcwd();
				(mkdir($thisdir ."/upload/data/".$namaPraktikum."/" , 0777));
				(mkdir($thisdir ."/upload/data/".$namaPraktikum."/software_tambahan/" , 0777));
			}
		}else{
			$thisdir = getcwd();
			(mkdir($thisdir ."/upload/data/".$namaPraktikum."/" , 0777));
			(mkdir($thisdir ."/upload/data/".$namaPraktikum."/software_tambahan/", 0777));
		}

	}
}
$no = 0;
?>


<?php
if(isset($_POST['Submit'])){
	$software_name = $_FILES["file"]["name"];
	$size = $_FILES["file"]["size"];
	$type = $_FILES["file"]["type"];
	$path = "upload/data/".$namaPraktikum."/software_tambahan/" . $_FILES["file"]["name"];
	$date = date("Y-m-d", time()+60*60*7);
	$time = date("H:i:s", time()+60*60*5);

	error_reporting(0);
	$allowedExts = array("zip","exe");
	$extension = end(explode(".", $_FILES["file"]["name"]));
	if ((($_FILES["file"]["type"] == "application/zip")
	|| ($_FILES["file"]["type"] == "application/octet-stream"))
	&& ($_FILES["file"]["size"] < 128000000) //10mb
	&& in_array($extension, $allowedExts))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			//echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		}
		else
		{
			if (file_exists("upload/data/".$namaPraktikum."/software_tambahan/" .$_FILES["file"]["name"]))
			{
				echo "<script>alert ('File Name Already Exist')</script>";
			}

			else
			{

				//echo "Stored in: " . "asisten/" . $courseid . "/" . $_FILES["file"]["name"];


				$query = "INSERT INTO tb_mdl_upload_software VALUES ('null','$idpraktikum','$software_name','$size','$type','$path','$date','$time')";
				$hasil = mysql_query($query);
				if ($hasil){
					move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/data/".$namaPraktikum."/software_tambahan/"  . $_FILES["file"]["name"]);

					echo "<script language=javascript>
				alert('Software Berhasil Diunggah');</script>";	
					?>
<script type=text/javascript>
				window.location = "index.php?page=software_upload&id=<?php echo $idpraktikum;?>";
				</script>
';
					<?php
				}else {
					echo "<script language=javascript>
				alert('Software Gagal Diunggah');</script>";	
				}


			}
		}
	}
	else
	{
		echo "<script>alert ('Invalid File')</script>";
	};
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
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/menu3.css">
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
        <li class="active"><a href="informasi_lab.php"><i class="icon-tasks"></i><span>Informasi Lab</span> </a> </li>
        <li><a href="#"><i class="icon-list"></i><span>Unggah Data Mahasiswa</span> </a> </li>
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
                  <h6 class="bigstats" align="center">Newsfeed</h6>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->








			<form action="" method="post" enctype="multipart/form-data">
				<div
					style="width: 450px; margin: 0 auto; margin-top: 15px; padding: 15px 0px; border-radius: 15px; background-color: #87CEFA;">
					<table align="center">
						<tr>
							<td><span>Unggah Software</span></td>
							<td>:</td>
							<td><input type="file" name="file" id="file"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><input type="submit" name="Submit" value="Submit"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><span style="font-size: 12px; color: red;">Hanya file bertipe zip/exe</span> <? echo "$namaPraktikum";?></td>
						</tr>
					
					</table>				
				</div>
				<span style="font-size: 14px;"><a href="software_list.php">Back</a></span>
			</form>
			
			
			<?php
			$query = "SELECT * FROM tb_mdl_upload_software WHERE praktikumid = '$idpraktikum'";
			$hasil = mysql_query($query) or die("".mysql_error());
			$data = mysql_fetch_array($hasil);
	
			$query2 = "SELECT name FROM tb_mdl_coursecategories WHERE id = '$idpraktikum'";
			$hasil2 = mysql_query($query2);
			$data2 = mysql_fetch_array($hasil2);
			$namaPraktikum = $data2['name'];
		
			if (!empty($data)){?>

			<div style="margin-top: 20px; margin-bottom: 15px;">
				<table align="center" border="1">
					<tr>
						<th width="35px" align="center">No</th>
						<th width="220px" align="center">Nama Software</th>
						<th width="90px" align="center">Ukuran (B)</th>
						<th width="90px" align="center">Tanggal</th>
						<th width="50px" align="center">Unduh</th>
						<th width="50px" align="center">Hapus</th>
					</tr>
					<?php do { $no++;?>
					<tr>
						<td width="35px" align="center"><?php echo $no;?></td>
						<td width="220px" align="center"><?php echo basename($data['path'],".exe");?>
						</td>
						<td width="90px" align="center"><?php echo $data['size']?></td>
						<td width="90px" align="center"><?php echo $data['date']?></td>
						<td width="50px" align="center"><a
							href="software_download.php?id=<?php echo $data['id'];?>"><img
								src="gambar/menu/download.png"> </a> </td>
						<td width="50px" align="center"><a
							href="javascript:if(confirm('Apakah Anda yakin akan menghapus software ini?')){document.location='software_delete.php?id=<? echo $data['id'];?>'}"><img
								src="gambar/menu/delete.png"> </a></td>
					</tr>
					<?php }while ($data = mysql_fetch_array($hasil))?>

				</table>
			</div>

			<?php }else {
			echo "kosong kjfkghjhjhgd";
			}?>
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


