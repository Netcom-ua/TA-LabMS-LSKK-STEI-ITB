<?php
error_reporting(0);
include '../../include/koneksi.php';
?>

<?php
		$idPraktikum = $_GET['id'];
			
		$query ="SELECT name FROM tb_mdl_coursecategories WHERE id = '$idPraktikum'";
		$hasil =  mysql_query($query);
		$data = mysql_fetch_array($hasil);

		$query2 = "SELECT * FROM tb_mdl_upload_software WHERE praktikumid = '$idPraktikum'";
		$hasil2 = mysql_query($query2);
		$data2 = mysql_fetch_array($hasil2);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - Admin LMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="../../css/font-awesome.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
<link href="../../css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/menu3.css">
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">Administrator Management System</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> EGrappler.com <b class="caret"></b></a>
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
        <li class="active"><a href="../index.php"><i class="icon-home"></i><span>Home</span> </a> </li>
        <li><a href="praktikum/course_categories.php"><i class="icon-tasks"></i><span>Praktikum</span> </a> </li>
        <li><a href="jadwal_praktikum/view_jadwal.php"><i class="icon-list"></i><span>Jadwal Praktikum</span> </a> </li>
        <li><a href="upload_jadwal.php"><i class="icon-tags"></i><span>Tukar Jadwal</span> </a> </li>
        <li><a href="video/list_video.php"><i class="icon-bar-chart"></i><span>Video</span> </a> </li>
        <li><a href="software/list_software.php"><i class="icon-list-alt"></i><span>Software</span> </a> </li>
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
              <h3>Halaman Asisten</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <h6 class="bigstats" align="center">Software Praktikum <?php echo $data['name'];?></h6>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
				   
				   
				   
	

			<div style="margin-top: 20px; margin-bottom: 15px;">
				<table align="center" border="1">
					<tr>
					<th width=30px" align="center">No</th>
						<th width="260px" align="center">Nama Software</th>
						<th width="100px" align="center">Ukuran (B)</th>
						<th width="100px" align="center">Download</th>
					</tr>
					<?php do { $no++?>
					<tr>
					<td width=40px" align="center"><?php echo  $no;?></td>
						<td width="260px"><?php echo basename($data2['path'],".exe");?>
						</td>
						<td width="130px" align="center"><?php echo $data2['size']?></td>
						<td align="center"><a
							href="download_software.php?id=<?php echo $data2['id'];?>"><img
								src="../../gambar/menu/download.png"> </a></td>
					</tr>
					<?php }while ($data2 = mysql_fetch_array($hasil2))?>
				</table>
				<span style="font-size: 14px;"><a href="list_software.php">Back</a></span>
			</div>

			
		</div>
	</div>





</div>	
</div>	
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





