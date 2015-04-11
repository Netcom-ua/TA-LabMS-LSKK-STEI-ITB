<?php
error_reporting(0);
include '../../include/koneksi.php';
?>

<?php
$cekDb=mysql_query("SELECT * FROM tb_mdl_coursecategories");
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
<link rel="stylesheet" type="text/css" href="../../css/kordas2.css">
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
        <li class="active"><a href="index.php"><i class="icon-home"></i><span>Home</span> </a> </li>
        <li><a href="course_categories.php"><i class="icon-tasks"></i><span>Praktikum</span> </a> </li>
        <li><a href="upload_mahasiswa.php"><i class="icon-list"></i><span>Nilai Praktikan</span> </a> </li>
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
              <h3>Halaman Kepala Lab</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <h6 class="bigstats" align="center">Daftar Praktikum</h6>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
	
	
	<div id="menu_area">
		<div id="persegi">
			<table border="0">
			<?php
			while ($categories=mysql_fetch_array($cekDb)):
			?>
				<tr>
					<td width="250px">

						<div id="inti_2">
							<a
								href="course.php?idcategori=<?php echo $categories['id'];?>">
								<?php echo $categories['name'];?> </a>
						</div>
						<div id="ball_2"></div>
					</td>
					<td width="100" align="center">
						<font color="red"><?php echo $categories['date'];?></font>
					</td>
					<td width="110" align="center">
						<font style="font-size: 12px"><a href="jumlah_penilaian_max2.php?idcategori=<?php echo $categories['id'];?> " target="_blank">Generate Excel</a></font>
					</td>
					<td width="110" align="center">
						<font style="font-size: 12px;"><a href="pdf_jumlah_penilaian.php?idcategori=<?php echo $categories['id'];?> " target="_blank">Generate PDF</a></font>
					</td>
				</tr>
				<?php
				endwhile;
				?>
			</table>
		</div>
		<span style="font-size: 14px;"><a href="../index.php">Back</a></span>
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





