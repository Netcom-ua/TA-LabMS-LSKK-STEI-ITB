<?php 
// Setingan
include"../include/koneksi.php";
//$_GET['Kode_Alat'];

if(isset($_GET['Kode_Alat'])) {
        $sql = "select * from tb_atk where kode_alat = '{$_GET['Kode_Alat']}'";
		$result = mysql_query($sql) or die("" . mysql_error());
		$data = mysql_fetch_array($result);
	}
	mysql_close($connected);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Lab Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/jquery.qrcode.min.js"></script>
<script>
jQuery(function(){
	jQuery('#output').qrcode("Kode: <?php echo  $data['kode_alat']?>\u000aNama: <?php echo  $data['nama_alat']?>\u000aNama Lab: <?php echo  $data['nama_lab']?>\u000aSpesifikasi: <?php echo  $data['spesifikasi']?>");
})
</script>

</head>
<body>

<div class="main">
<div class="main-inner">
    <div class="container">
    <div class="row">
        <div class="span12">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-qrcode"></i>
              <h3> QR Code <?php echo  $data['nama_alat'] ?></h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
				<div class="widget big-stats-container">
					<div class="widget-content">
					<h1 align="center">---</h1>
					<h6 class="bigstats" id="output" align="center"></h6> 				  
					</div>
				</div>
				
          </div>			 
        </div> 
		</div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
	</div>
  <!-- /main-inner --> 
</div>
</div>

</body>
</html>
