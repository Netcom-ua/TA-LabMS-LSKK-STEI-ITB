<?php 
	session_start();
	include 'koneksi/session.php';
	require '../include/koneksi.php';
	$cekDb=mysql_query("SELECT * FROM tb_mdl_labname");
	$info=mysql_fetch_array($cekDb);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - Asisten LabMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="../css/font-awesome.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/pages/dashboard.css" rel="stylesheet">
<link href="../css/pages/signin.css" rel="stylesheet" type="text/css">
<link href="css/pages/dashboard.css" rel="stylesheet">
<link href="css/datepicker.css" rel="stylesheet" type="text/css">
<link href="../css/pages/faq.css" rel="stylesheet"> 
<link rel="shortcut icon" href="../img/favicon.png">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php"><img src="../img/<?php echo $info['logo'];?>" alt=""></a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
		  <?php 	
			$id_pengenal = $_SESSION['id_pengenal'];
			$query =  "select * from tb_user where id_pengenal ='$id_pengenal'";
					  $result = $mysqli->query($query)
						or die('Query failed: ' . mysql_error());
						$data = $result->fetch_array();  
						$username = $data['username'];
						$nama = $data['nama_user'];
						//$no++;
			?>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo $data['nama_user']?><b class="caret"></b></a>
            <ul class="dropdown-menu">
			  <li><a href="javascript:;"><img src="../tatausaha/user/foto_user/<?php echo $data['foto']?>" width=100 height=100 title="<?php echo $data['nama']?>" class="img-thumbnail"></a></li>
              <li><a href="profil.html">Profile</a></li>
			  <li><a href="#ubahPassword" role="button" data-toggle="modal">Change Password</a></li>
              <li><a href="../include/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <!--<form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>-->
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
		<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>Profil</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="profil.html">Lihat Profil</a></li>
          </ul>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-calendar"></i><span>Praktikum</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="jadwal_praktikum.html">Jadwal Praktikum Mahasiswa</a></li>
			<li><a href="jadwal_praktikum_asisten.html">Jadwal Praktikum Asisten</a></li>
		</ul>
        <li><a href="video.html"><i class="icon-facetime-video"></i><span>Video</span> </a> </li>
        <li><a href="software.html"><i class="icon-list-alt"></i><span>Software</span> </a> 
		<li><a href="forum.html"><i class="icon-comments"></i><span>Forum</span> </a></li>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
  <div class="subnavbar1">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="index.html"><i class="icon-home"></i><span>Home</span> </a> </li>
		<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>Profil</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="profil.html">Lihat Profil</a></li>
          </ul>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-calendar"></i><span>Praktikum</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="jadwal_praktikum.html">Jadwal Praktikum Mahasiswa</a></li>
			<li><a href="jadwal_praktikum_asisten.html">Jadwal Praktikum Asisten</a></li>
		</ul>
        <li><a href="charts.html"><i class="icon-facetime-video"></i><span>Video</span> </a> </li>
        <li><a href="reports.html"><i class="icon-list-alt"></i><span>Software</span> </a> </li>
		<li><a href="forum.html"><i class="icon-comments"></i><span>Forum</span> </a></li>
        
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner1 -->
</div>
<!-- /subnavbar -->

<!-- Change Password -->
<div class="control-group">
	<div class="controls">
		<!-- Modal -->
		<form id="form" action="action.php?action=change_password" method="post" >
			<div id="ubahPassword" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<input type="hidden" name="id" value="<?php echo  $data['id_pengenal'] ?>"/>
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
				<h3 id="myModalLabel">Change Password</h3>
			  </div>
			  <div class="modal-body">
				<label> Password </label>
				<input	id="change_password" name="change_password" type="password" required="required"/>
				<label> Confirm Password </label>
				<input	id="confirm_password" name="confirm_password" type="password"required="required"/>
			  </div>
			  <div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<button class="btn btn-primary" onclick="return confirm('Anda yakin ingin merubah kata sandi ?')">Save changes</button>
			  </div>
			</div>
		</form>
	</div> <!-- /controls -->	
</div> <!-- /control-group -->
<!-- End Change Password -->