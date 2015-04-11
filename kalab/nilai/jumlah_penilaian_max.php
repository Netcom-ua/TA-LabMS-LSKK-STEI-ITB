<?php
error_reporting(0);
include '../../include/koneksi.php';
?>

<?php 
$cekDb=mysql_query("SELECT * FROM tb_mdl_labname");
$info=mysql_fetch_array($cekDb);

$no=1;
$idcategori=$_GET["id"];

$categoriCourse=mysql_query("SELECT * FROM  tb_mdl_coursecategories WHERE id ='$idcategori'") or die ("".mysql_error());
$showDate=mysql_fetch_array($categoriCourse);

$sqlBanyakModul=mysql_query("SELECT * FROM tb_mdl_course WHERE category=$idcategori") or die ("".mysql_error());
$sqlBanyakModul1=mysql_query("SELECT * FROM tb_mdl_course WHERE category=$idcategori") or die ("".mysql_error());
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
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/menu3.css">

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
                  <h6 class="bigstats" align="center">
                  <span style="font-size: 16.5px; font-weight: bold;">Daftar Nilai Praktikum<br><br>
				  <?php echo $showDate['name']; ?><br><br>
				  <?php echo $info['nama_lab_full'];?><br><br>
				  <?php echo $info['universitas'];?><br><br>
				  </span>
				  </h6>
				  
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
				   
	
			
			<form action="" method="post" enctype="multipart/form-data"
				style="margin-top: 20px;">
				<div style="overflow: auto;">
					<table align="center" border="1">
						<tr>
      						<th width="30" rowspan="2">No</th>
					    	<th width="300" rowspan="2">Nama</th>
							<th width="200" rowspan="2">Nim</th>
							<?php
							while ($modul1=mysql_fetch_array($sqlBanyakModul))
							{
								$idcours=$modul1['id'];
								$sqlJumlahPenilaian=mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE idcategori='$idcategori' AND idcourse='$idcours'");
								$jumlahPenilaian = mysql_num_rows($sqlJumlahPenilaian);
							?>
							<th colspan="<?php echo $jumlahPenilaian+1;?>"><?php echo $modul1['id'];?> (<?php echo $modul1['bobot'];?>)</th>
							<?php 
							}
							?>
							<th width="100" rowspan="2">Total Nilai</th>
						</tr>
						<tr>
							<?php
							while ($modul2=mysql_fetch_array($sqlBanyakModul1))
							{
								$idcoursee=$modul2['id'];
								$sqlNamaPenilaian=mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE idcategori='$idcategori' AND idcourse='$idcoursee'");
								while ($namaPenilaian=mysql_fetch_array($sqlNamaPenilaian))
	
								{
							?>
							<th width="200"><?php echo $namaPenilaian['namapenilaianharian'];?> (<?php echo $namaPenilaian['bobot'];?>)</th>
							<?php
								} 
							?>
							<th width="200">Total Nilai</th>
							<?php
							}
							?>
						</tr>
<?php
$dateCategori=$showDate['date'];
$sqlMahasiswa=mysql_query("SELECT DISTINCT userid FROM  tb_mdl_jadwal WHERE date >='$dateCategori'");
while ($mahasiswa=mysql_fetch_array($sqlMahasiswa))
{
	$idMahasiswa=$mahasiswa['userid'];
	$sqlketMahasiswa=mysql_query("SELECT * FROM  tb_mdl_user WHERE id ='$idMahasiswa'");
	$ketMahasiswa=mysql_fetch_array($sqlketMahasiswa);
	
	$sqlModul=mysql_query("SELECT * FROM tb_mdl_course WHERE category=$idcategori");
	
	
	$nilaiPraktikum=0;
	?>
						<tr>
						
							<td> <?php echo $no;$no++; ?></td>
							<td><?php echo $ketMahasiswa['username'];?></td>
							<td><?php echo $ketMahasiswa['nim'];?></td>
	<?
	while ($modul=mysql_fetch_array($sqlModul))
	{
		$idcourse=$modul['id'];
		$sqlNilaiAwal=mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE idcategori='$idcategori' AND idcourse='$idcourse'");
		$total=0;
		$nilaimodul=0;
		while ($nilaiAwal=mysql_fetch_array($sqlNilaiAwal))
		{
			$nilaiMahasiswa=$nilaiAwal['nilaiawal'];
			$nilaiMax=$nilaiAwal['nilaiawal'];
			$idpenilaian=$nilaiAwal['idpenilaian'];
			$sqlpelaksanaan=mysql_query("SELECT * FROM tb_penilaianpelaksananpraktikum WHERE idpenilaian=$idpenilaian");
			while ($pelaksanaan=mysql_fetch_array($sqlpelaksanaan))
			{
				$indexnilai=$pelaksanaan['indexnilai'];
				$sqlklasifikasipenilaian=mysql_query("SELECT * FROM tb_klasifikasipenilaian WHERE indexnilai='$indexnilai'");
				while ($klasifikasipenilaian=mysql_fetch_array($sqlklasifikasipenilaian))
				{
					$oprasi=$klasifikasipenilaian['oprasi'];
					if($oprasi=='+')
					{
						$nilaiMax=$nilaiMax+$klasifikasipenilaian['nilai'];
					}
				}
			}
				
			$idnilaiMahasiswa=0;
			$sqldatapenilaian=mysql_query("SELECT * FROM tb_datapenilaiapraktikum WHERE idmahasiswa='$idMahasiswa' AND idpenilaian='$idpenilaian' AND idcourse='$idcourse'");
			while ( $datapenilaian=mysql_fetch_array($sqldatapenilaian))
			{
				$indexnilai=$datapenilaian['indexnilai'];
				$sqlklasifikasipenilaian=mysql_query("SELECT * FROM tb_klasifikasipenilaian WHERE indexnilai='$indexnilai'");
				while ($klasifikasipenilaian=mysql_fetch_array($sqlklasifikasipenilaian))
				{
					$oprasi=$klasifikasipenilaian['oprasi'];
					if($oprasi=='+')
					{
						$nilaiMahasiswa=$nilaiMahasiswa+$datapenilaian['nilai'];
					}
					else if($oprasi=='-')
					{
						$nilaiMahasiswa=$nilaiMahasiswa-$datapenilaian['nilai'];
					}//echo $nilaiMahasiswa;
				}
				$idnilaiMahasiswa=1;
			}
			if($idnilaiMahasiswa==0)
			{
				$nilaiMahasiswa=0;
			}
			$nilaiperpenilaian=($nilaiMahasiswa/$nilaiMax)*$nilaiAwal['bobot'];
			$nilaimodul=$nilaimodul+$nilaiperpenilaian;
			?>
							<td align='center'><?php echo round($nilaiMahasiswa/$nilaiMax*100,2);?></td>
			<?
		}
			?>
							<td align='center'><?php echo round($nilaimodul,2);?></td>
			<?
		$nilaiPraktikum=$nilaiPraktikum+(($nilaimodul)*$modul['bobot']/100);
	}
	
	?>
						
							
							<td align='center'><?php echo round($nilaiPraktikum,2)?></td>
						</tr>
<?php
	//echo $idMahasiswa."=".$mahasiswa['userid']."=";
	//echo $nilaiPraktikum."<br>";
}
?>
	
					</table>
					<span style="font-size: 14px;"><a href="course_categories.php">Back</a></span>
				</div>
			</form>
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







