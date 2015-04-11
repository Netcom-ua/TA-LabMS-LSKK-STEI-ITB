<?php
require 'include/koneksi.php';
$cekDb=mysql_query("SELECT * FROM tb_mdl_labname");
$info=mysql_fetch_array($cekDb);
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
<link href="css/font-googleapis.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<!--<link href="css/pages/masuk.css" rel="stylesheet" type="text/css"> -->
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">
<link href="css/pages/plans.css" rel="stylesheet"> 
<link href="css/pages/faq.css" rel="stylesheet"> 
<link rel="shortcut icon" href="img/favicon.png">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html"><img src="img/<?php echo $info['logo'];?>" alt=""></a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Akun <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="login/labms">Masuk</a></li>
              <li><a href="register/labms">Pendaftaran</a></li>
              <!--<li><a href="help">Bantuan</a></li>-->
            </ul>
          </li>
        </ul>
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
        <li class="active"><a href="index.html"><i class="icon-home"></i><span>Home</span> </a> </li>
		<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-calendar"></i><span>Profil</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="about.html">Tentang Aplikasi</a></li>
			<li><a href="aplikasi_android.html">Aplikasi Android</a></li>
			<li><a href="aplikasi_desktop.html">Aplikasi Desktop</a></li>
			<li><a href="team.html">Team LabMS</a></li>
          </ul>
        <li><a href="tampil_atk.html"><i class="icon-tasks"></i><span>Informasi ATK</span> </a> </li>
        <li><a href="tampil_inventaris.html"><i class="icon-list"></i><span>Informasi Inventaris</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-calendar"></i><span>Praktikum</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="jadwal_praktikum.html">Jadwal Praktikum</a></li>
          </ul>
		  <li><a href="video.html"><i class="icon-facetime-video"></i><span>Video Praktikum</span> </a></li>
		  <li><a href="software.html"><i class="icon-paper-clip"></i><span>Software</span> </a></li>
		<li><a href="forum.html"><i class="icon-comments"></i><span>Forum</span> </a></li>
        <!--<li><a href="#"><i class="icon-book"></i><span>Bantuan</span> </a></li>-->
        <li><a href="kontak.html"><i class="icon-phone-sign"></i><span>Kontak</span> </a></li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
  <div class="subnavbar1">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="index.html"><i class="icon-home"></i><span>Home</span> </a> </li>
		<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-calendar"></i><span>Profil</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="about.html">Tentang Aplikasi</a></li>
			<li><a href="aplikasi_android.html">Aplikasi Android</a></li>
			<li><a href="aplikasi_desktop.html">Aplikasi Desktop</a></li>
			<li><a href="team.html">Team LabMS</a></li>
          </ul>
        <li><a href="tampil_atk.html"><i class="icon-tasks"></i><span>Informasi ATK</span> </a> </li>
        <li><a href="tampil_inventaris.html"><i class="icon-list"></i><span>Informasi Inventaris</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-calendar"></i><span>Praktikum</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="jadwal_praktikum.html">Jadwal Praktikum</a></li>
          </ul>
		  <li><a href="video.html"><i class="icon-facetime-video"></i><span>Video Praktikum</span> </a></li>
		  <li><a href="software.html"><i class="icon-paper-clip"></i><span>Software</span> </a></li>
		<li><a href="forum.html"><i class="icon-comments"></i><span>Forum</span> </a></li>
        <!--<li><a href="#"><i class="icon-book"></i><span>Bantuan</span> </a></li>-->
        <li><a href="kontak.html"><i class="icon-phone-sign"></i><span>Kontak</span> </a></li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner1 -->
</div>
<!-- /subnavbar -->
<!--<marquee behavior="alternate"><h3>Mohon Maaf, Sistem Masih Dalam Tahap Pengembangan | Blog : <a href="http://ta.seab8.com/lms">http://ta.seab8.com/lms</h3></a></marquee>-->