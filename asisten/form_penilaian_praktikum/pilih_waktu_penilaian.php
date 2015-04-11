<?php
session_start();
error_reporting(0);
//include '../koneksi/session.php';
include '../../include/koneksi.php';
?>

<?php
$cekDb=mysql_query("SELECT * FROM tb_mdl_labname");
$info=mysql_fetch_array($cekDb);
$idpenilai=strip_tags(mysql_escape_string($_GET['idcategori']));
$id = strip_tags(mysql_escape_string($_GET['id']));
$jabatan= $_SESSION['jabatan'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Laboratorium Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="../../css/font-awesome.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
<link href="../../css/pages/dashboard.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../css/kordas2.css">
<link rel="stylesheet" type="text/css" href="../../css/menu3.css">
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
		  <?php
				$jabatan = $_SESSION['jabatan'];
				$staf=mysql_fetch_array(mysql_query("select * from tb_staf where jabatan ='$jabatan'"));
			?>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo $staf['nama']?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
			  <li><a href="javascript:;"><img src="../staf/foto_staf/<?php echo $staf['foto']?>" width=100 height=100 title="<?php echo $staf['nama']?>"></a></li>
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
        <li><a href="index.php"><i class="icon-home"></i><span>Home</span> </a> </li>
        <li><a href="informasi_lab.php"><i class="icon-tasks"></i><span>Informasi Lab</span> </a> </li>
        <li><a href="#"><i class="icon-list"></i><span>Unggah Data Mahasiswa</span> </a> </li>
        <li><a href="#"><i class="icon-tags"></i><span>Unggah Jadwal</span> </a> </li>
        <li><a href="charts.html"><i class="icon-bar-chart"></i><span>Unggah Video</span> </a> </li>
        <li><a href="reports.html"><i class="icon-list-alt"></i><span>Unggah Software</span> </a> </li>
        <li class="active"><a href="course_categories_generate.php"><i class="icon-code"></i><span>Generate Laporan</span> </a> </li>
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
                  <h3 class="bigstats" align="center">
					<?php
					$query=mysql_fetch_array(mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE idpenilaian = $id AND idcategori=$idpenilai")); 
					echo $query['namapenilaianharian'];
					?><br>
					<?php echo $info['nama_lab_full'];?><br>
					<?php echo $info['universitas'];?><br>
					</h3>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
	
	
	
<div style="margin: 0 auto; width: 672px; background-color: #ffffff; border-radius: 15px; padding-top: 3px; padding-bottom: 7px; margin-bottom: 13px; margin-top: 13px;">
		<h2 align="center">
		</h2>
		
		<table width="600">
			<tr>
				<td width="250">Mata Kuliah / Kode Praktikum</td>
				<td width="10" align="center">:</td>
				<td width="340">
				<?php
				$course_categories=mysql_fetch_array(mysql_query("SELECT * FROM  tb_mdl_coursecategories   WHERE id ='$idpenilai'"));
				echo $course_categories['name'];
				?> /
				<?php
				$Course=mysql_fetch_array(mysql_query("SELECT * FROM  tb_mdl_course   WHERE category ='$idpenilai'"));
				echo $Course['id'];
				?>
				</td>
			</tr>
			<tr>
				<td width="250">Nama Percobaan / Modul</td>
				<td align="center">:</td
				><td><?php 
				echo $Course['fullname'];
				?> / <?php
				
				$quer=mysql_fetch_array(mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE idpenilaian = $id")); 
				echo $quer['modul'];
				?>
				</td>
			</tr>
			<tr>
				<td width="250">Asisten</td>
				<td align="center">:</td><td>
				<?php
				$query1=mysql_fetch_array(mysql_query("SELECT * FROM tb_user WHERE id_pengenal = $id_pengenal")); 
				echo $query1['id_pengenal'];
				?>
				</td>
		</table>
		
		<br>
		<h2 style="text-align: center;">Pilih Tanggal penilaian</h2>
		<?php
		$idcateg=$Course['id'];
		
			$sql=mysql_query("SELECT DISTINCT tb_mdl_jadwal.date,tb_mdl_course.waktu FROM  tb_mdl_jadwal inner join tb_mdl_course on tb_mdl_jadwal.courseid = tb_mdl_course.id WHERE tb_mdl_course.kordasid='33333' AND tb_mdl_jadwal.courseid='$idcateg'");
		?>
		
		<table class="datatable" border="1" align="center">
			<tr>
				<th align="center" width="40">No</th>
				<th align="center" width="90">Tanggal</th>
				<th align="center" width="90">Waktu</th>
				<th align="center" width="60">Generate</th>
			</tr>
			<?
			$c=0;
			while($data=mysql_fetch_array($sql)){
				?>
			<tr>
				<td align="center"><? echo $c=$c+1;?></td>
				<td align="center"><?echo $data['date'];?></td>
				<td align="center"><?echo $data['waktu'];?></td>
				<td align="center"><a href="kordas/generate/pdfPenilaian.php?indexpenilaian=<?echo $idpenilaian;?>&date=<?php echo $data['date'];?>&time=<?php echo $data['waktu'];?>" target="_blank">
				<img src="../../gambar/menu/zoom4.png" width="20" height="20" /> </a></td>
	<?
	}
	?>
			</tr>
		</table>
		<span style="font-size: 14px;"><a href="../praktikum/course.php?idcategori=1">Back</a></span>
	</div>

	
	
	
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
                            Link</h4>
                        <ul>
                            <li><a href="javascript:;">ITB</a></li>
                            <li><a href="javascript:;">STEI ITB</a></li>
                            <li><a href="javascript:;"></a>LSKK ITB</li>
                            <li><a href="javascript:;"></a>D4 STEI ITB Batch VIII</li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                   <div class="span3">
                        <h4>
                            Link</h4>
                        <ul>
                            <li><a href="javascript:;">ITB</a></li>
                            <li><a href="javascript:;">STEI ITB</a></li>
                            <li><a href="javascript:;"></a>LSKK ITB</li>
                            <li><a href="javascript:;"></a>D4 STEI ITB Batch VIII</li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    
                    <!-- /span3 -->
                    
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
<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>
 
<script src="js/base.js"></script> 
</body>
</html>



