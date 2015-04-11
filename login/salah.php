<!DOCTYPE html>
<html lang="en">
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
<link href="css/pages/masuk.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="img/favicon.png">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				Login LMS			
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					<li class="">						
						<a href="daftar" class="">
							Belum punya akun ? Daftar Sekarang
						</a>
						
					</li>
					
					<li class="">						
						<a href="index.html" class="">
							<i class="icon-chevron-left"></i>
							Kembali ke halaman utama
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->

<div class="account-container">
	<img src="img/labms.png" alt="" width=380 height=150>
	<div class="content clearfix">
		
		<form action="login/cek_verifikasi.php" method="post">
		
			<h1><font color="#FF0000">Kode yang Anda masukkan salah.</font></h1>		
			
			<div class="login-fields">
				
				<p>Silahkan input kembali kode verifikasi anda</p>
				
				<div class="field">
					<label for="username">Kode verifikasi</label>
					<input type="text" id="kodever" name="kodever" value="" placeholder="Kode verifikasi" class="login password-field" required="required" />
				</div> <!-- /field -->
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
			
				<button class="button btn btn-success btn-large">Kirim</button>
				
			</div> <!-- .actions -->
			<p>Jika pesan belum diterima silahkan cek kode verifikasi ke email Anda</p>
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
<!-- <div class="login-extra">
	<a href="#">Reset Password</a>
</div> <!-- /login-extra --> 


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

</body>

</html>