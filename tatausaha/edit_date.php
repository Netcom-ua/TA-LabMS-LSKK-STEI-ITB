<?php
error_reporting(0);
include '../include/koneksi.php';
?>

<?php 
$id_matakuliah=$_GET['id'];
$proses=mysql_query("SELECT id, tgl_daftar from tb_matakuliah WHERE id='$id_matakuliah'");
list ($id, $tgl_daftar)=mysql_fetch_row($proses);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Lab Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="../css/font-awesome.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="../index.php">Administrator Management System</a>
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
        <li><a href="../index.php"><i class="icon-home"></i><span>Home</span> </a> </li>
        <li class="active"><a href="../tatausaha/informasi_lab.php"><i class="icon-tasks"></i><span>Informasi Lab</span> </a> </li>
        <li><a href="#"><i class="icon-list"></i><span>Unggah Data Mahasiswa</span> </a> </li>
        <li><a href="#"><i class="icon-tags"></i><span>Unggah Jadwal</span> </a> </li>
        <li><a href="../charts.html"><i class="icon-bar-chart"></i><span>Unggah Video</span> </a> </li>
        <li><a href="../reports.html"><i class="icon-list-alt"></i><span>Unggah Software</span> </a> </li>
        <li><a href="../shortcodes.html"><i class="icon-code"></i><span>Generate Laporan</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="../icons.html">Icons</a></li>
            <li><a href="../faq.html">FAQ</a></li>
            <li><a href="../pricing.html">Pricing Plans</a></li>
            <li><a href="../login.html">Login</a></li>
            <li><a href="../signup.html">Signup</a></li>
            <li><a href="../error.html">404</a></li>
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
                  <h6 class="bigstats" align="center">Ubah Tanggal</h6>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->


<form action="edit_dateDb.php" method="post">
<input name="id" type="hidden" value="<?php echo $id_matakuliah?>" />
<div style="background-color: #ffffff; width: 680px; margin: 0 auto; border-radius: 10px;">
<div class='post-body entry-content' id='post-body-1189136973779971313'
	itemprop='articleBody'>
<fieldset id="tocfs"><legend id="tocfsl">Tanggal</legend>
<table align="center">
	<tr>
		<td width="650">
		<div class='post-body entry-content'
			id='post-body-1189136973779971313' itemprop='articleBody'>
		<fieldset id="tocfs"><legend id="tocfsl">mulai</legend>
		<table width="620" align="center">
			<tr>
				<td width="" colspan="10">pilih tanggal : <input  type="text" placeholder="Tanggal" value="<?echo $tgl_daftar?>" name="tgl_daftar" style="width: 155px;"></td>
			</tr>
		</table>
		</fieldset>
		</div>
		</td>
	</tr>
</table>
</fieldset>
</div>

<div class='post-body entry-content' id='post-body-1189136973779971313'
	itemprop='articleBody'>
<fieldset id="tocfs"><legend id="tocfsl">Save</legend>
<table align="center">
	<tr>
		<td>
			<!--<input type="hidden" name="id" value="<?php echo $idategories;?>">-->
			
			<input type="submit">
		</td>
	</tr>
</table>
</fieldset>
</div>
</div>
</form>
<span style="font-size: 14px;"><a href="course_categories.php">Back</a></span>
<!-- /widget-content --> 
              </div>
            </div>
          </div>
          <!-- /widget -->
          <div class="widget widget-nopad">
            
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
            format: "yyyy/mm/dd"
        });  
    
    });
 </script>
</body>
</html>

