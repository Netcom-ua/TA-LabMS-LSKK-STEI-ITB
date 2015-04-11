<?php
session_start();
error_reporting(0);
require'config/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - Admin LMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
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
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php"><img src="../img/logo-itb.png" alt=""></a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="index.php?page=login">Login</a></li>
              <li><a href="index.php?page=daftar">Pendaftaran</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> Mhd. Syarif <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Profile</a></li>
              <li><a href="../include/logout.php">Logout</a></li>
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
        <li class="active"><a href="index.php?page_kordas=index"><i class="icon-home"></i><span>Home</span> </a> </li>
        <li><a href="informasi_lab.php"><i class="icon-tasks"></i><span>Informasi Lab</span> </a> </li>
        <li><a href="upload_mahasiswa.php"><i class="icon-list"></i><span>Unggah Data Mahasiswa</span> </a> </li>
        <li><a href="upload_jadwal.php"><i class="icon-tags"></i><span>Unggah Jadwal</span> </a> </li>
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
        <div class="span6">
          <!-- /widget -->
          <!-- /widget -->
          <!-- /widget -->
</div>
        <!-- /span6 -->
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-home"></i>
              <h3>Halaman Koordinator Asisten</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts">
			  <a href="index.php?page_kordas_praktikum=course_categories" class="shortcut">
			  <i class="shortcut-icon icon-list-alt"></i>
			  <span class="shortcut-label">Praktikum</span></a>
			  <a href="#" class="shortcut">
			  <i class="shortcut-icon icon-bookmark"></i>
			  <span class="shortcut-label">Bank Penilaian Praktikum</span> </a>
			  <a href="#" class="shortcut">
			  <i class="shortcut-icon icon-group"></i> <span class="shortcut-label">Konfirmasi Tukar Jadwal Praktikum</span> </a>
			  <a href="javascript:;" class="shortcut">
			  <i class="shortcut-icon icon-group"></i><span class="shortcut-label">Konfirmasi Tukar Jadwal Asisten</span> </a>
			  <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-group"></i>
			  <span class="shortcut-label">Konfirmasi Pindah Jadwal</span> </a>
			  <a href="javascript:;" class="shortcut">
			  <i class="shortcut-icon icon-file"></i><span class="shortcut-label">Hasil Penilaian</span> </a>
			  <a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-print "></i>
			  <span class="shortcut-label">Generate Laporan</span> </a> </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          <!-- /widget -->
          <!-- /widget -->
          <!-- /widget -->
        </div>
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
<script language="javascript" type="text/javascript" src="../js/full-calendar/fullcalendar.min.js"></script>
 
<script src="../js/base.js"></script> 

</body>
</html>
