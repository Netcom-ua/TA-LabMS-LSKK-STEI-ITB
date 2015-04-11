<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Lab Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="../../css/font-awesome.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
<link href="../../css/pages/dashboard.css" rel="stylesheet">
<link href="../../css/pages/signin.css" rel="stylesheet" type="text/css">
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
		
		<a class="brand" href="index.php">
			Laboratory Management System				
		</a>		
		
		<div class="nav-collapse">
			<ul class="nav pull-right">
				<!-- <li class="">						
					<a href="index.php?page=login" class="">
						Sudah punya akun? Masuk Sekarang
					</a>
				</li> -->
				<li class="">						
					<a href="../index.php" class="">
						<i class="icon-chevron-left"></i>
						Kembali ke halaman Administrator
					</a>
					
				</li>
			</ul>
			
		</div><!--/.nav-collapse -->	

	</div> <!-- /container -->
	
</div> <!-- /navbar-inner -->

</div> <!-- /navbar -->

<div class="account-container register">

<div class="content clearfix">
	<i class="icon-user">
	<h3>Pendaftaran</h3></i>
		<div class="login-fields">
		<p>Isi data dengan akurat dan benar</p>
		<form id="form" enctype="multipart/form-data"  action="simpan_user.php" method="post">
				<div class="field">
					<p>Id Pengenal NIM/NIP</p>	
					<input type="text" id="id_pengenal" name="id_pengenal" value="" title="Id Pengenal NIM/NIP" placeholder="Id Pengenal NIM/NIP" class="login" required="required"/>
				</div> <!-- /field -->
				
				<div class="field">
					<p>Nama Lengkap</p>
					<input type="text" id="nama_user" name="nama_user" value=""  title="Nama Lengkap" placeholder="Nama Lengkap" class="login" required="required"/>
				</div> <!-- /field -->
				
				<div class="field">
					<p>No Handphone</p>
					<input type="text" id="hp" name="hp" value=""  title="No Handphone" placeholder="No Handphone" class="login" required="required"/>
				</div> <!-- /field -->

				<div class="field">
					<p>Email</p>	
					<input type="text" id="email" name="email" value="" title="Email" placeholder="Email" class="login" required="required"/>
				</div> <!-- /field -->
				
				<div class="field">
					<p>Username</p>	
					<input type="text" id="username" name="username" value="" title="username" placeholder="username" class="login" required="required"/>
				</div> <!-- /field -->
				
				<div class="field">
					<p>Password</p>
					<input type="password" id="password" name="password" value="" title="password" placeholder="Password" class="login" required="required"/>
				</div> <!-- /field -->
				
				<div class="field">
				<p>Konfirmasi Password</p>
					<label for="konfirmasi_password">Konfirmasi Password:</label>
					<input type="password" id="konfirmasi_password" name="konfirmasi_password" value="" title="Konfirmasi Password" placeholder="Konfirmasi Password" class="login"/>
				</div> <!-- /field -->


				<div class="field">
				<p>Level</p>
					<select id="level" name="level" title="Level" class="login" type="text" required="required">
						<option value="level">Level</option>
						<option value="kordas">Koordinator Asisten</option>
						<option value="asisten">Asisten</option>
						<option value="kalab">Kepala Laboratorium</option>
					</select>
				</div> <!-- /field -->
				
				<div class="field">
					<p>Foto</p>
					<input name="foto" id="foto" type="file" placeholder="Foto" title="Foto" required="required"/>
				</div> <!-- /field -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
			<button class="button btn btn-primary btn-large">Daftar</button>
			
			</div> <!-- .actions -->
			
		</form>
			
				
		</div> <!-- /widget -->
  		
    </div> <!-- /span8 -->
	
</div> <!-- /content -->

</div> <!-- /account-container -->	

<!-- Text Under Box -->
<div class="login-extra">
<a href="../index.php">Kembali kehalaman Tata Usaha</a>
</div> <!-- /login-extra -->

<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/signin.js"></script>
</body>
</html>