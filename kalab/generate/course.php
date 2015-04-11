<?php
error_reporting(0);
include '../../include/koneksi.php';
?>

<?php
$idcategori=$_GET['idcategori'];
$categori=mysql_fetch_array(mysql_query("SELECT * FROM tb_mdl_coursecategories WHERE id=$idcategori"));
$cekDb=mysql_query("SELECT * FROM tb_mdl_course WHERE category=$idcategori");
$i=1;
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
<link rel="stylesheet" type="text/css" href="../../css/menu2.css">

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
                  <h6 class="bigstats" align="center"><?php echo $categori['name'];?></h6>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
				   
				   
				   
				   
				   


			
			<?php
			while ($course=mysql_fetch_array($cekDb))
			{
				?>
			<div>
				<table width="690" border="1px" align="center">
					<tr>
						<td width="680">
							<table width="684" align="left" border="0">
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td width="20" valign="top"><span style="font-weight: bold; font-size: 15px;"><?php echo $i;?>
									</span></td>
									<td width="624"><span style="font-weight: bold; font-size: 15px;"><?php echo $course['fullname'];?>
									</span>&nbsp;<span style="font-size: 15px">(Bobot Modul: <?php echo $course['bobot'];?>)</span> </td>
									<td width="22">&nbsp;</td>
								</tr>
								<tr>
									<td></td>
									<td width="624" style="font-size: 14px;"><?php echo $course['description'];?></td>
									<td width="22">&nbsp;</td>
								</tr>
								<?php
								if ($role == 3){}
								else {
								?>
							
								<?php }?>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td width="20" valign="top">&nbsp;</td>
									<td width="624" align="center"><span
										style="text-decoration: underline; font-weight: 600; font-size: 15;">Data
											Penilaian</span></td>
									<td width="22">&nbsp;</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php include "view_list_penilaian_praktikum.php";?>
									</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<?php 
								if ($role == 3){}
								else {
								?>
								<tr>
									<td width="20" valign="top">&nbsp;</td>
									<td width="624" align="center"><span
										style="text-decoration: underline; font-weight: 600; font-size: 15">
											Berita Acara Praktikum</span></td>
									<td width="22">&nbsp;</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php include "view_list_logbook.php";
									?></td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<?php }?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td width="20" valign="top">&nbsp;</td>
									<td width="624" align="center"><span
										style="text-decoration: underline; font-weight: 600; font-size: 15;">Daftar Unggah Tugas</span></td>
									<td width="22">&nbsp;</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php include "view_list_upload_tugas.php";?>
									</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr><td>
								<span style="font-size: 14px;"><a href="course_categories.php?idcategori=1">Back</a></span>					
								</tr></td>
							</table>
						</td>
					</tr>
				</table>						
				<br>
			</div>
			<?php
			$i++;
			}
			?>
		</div>
	</div>
</body>
</html>
