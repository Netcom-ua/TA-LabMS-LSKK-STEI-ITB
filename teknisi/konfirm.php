<?php 
// Setingan
include"../include/koneksi.php";
//$_GET['Kode_Alat'];

if(isset($_GET['Id'])) {
        $sql = "select * from tb_pinjam where id_pinjam = '{$_GET['Id']}'";
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

</head>
<body>

<div class="main">
<div class="main-inner">
    <div class="container">
    <div class="row">
        <div class="span12">
        <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-qrcode"></i>
              <h3> Konfirmasi </h3>
			  
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
				<div class="widget big-stats-container">
					<div class="widget-content">
					<h1 align="center">.</h1>
					<h6></h6>
					<form action="act_konfirm.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
					<input name="id_pinj" readonly="readonly" type="text"  value="<?php echo $data['id_pinjam']; ?>"   />
					<input name="email" readonly="readonly" type="text"  value="<?php echo $data['email']; ?>"   />
					<input name="kode_alat" readonly="readonly" type="text"  value="<?php echo $data['kode_alat']; ?>"   />
					
						<label>Konfirm </label>
						<select name="status">
						  <option><?php echo $data['status'] ?></option>
						  <option value="Disetujui">Disetujui</option>
						  <option value="Belum Disetujui">Belum Disetujui</option>
						</select>
						<div>
						<input type="submit" name="update" value="Simpan" >
						<div>
					</form>
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
