<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Lab Management System</title>
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
<link rel="shortcut icon" href="../img/favicon.png">
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
		
		<a class="brand" href="../index.html">
			Laboratory Management System				
		</a>		
		
		<div class="nav-collapse">
			<ul class="nav pull-right">
				<li class="">						
					<a href="../login/labms" class="">
						Sudah punya akun? Masuk Sekarang
					</a>
					
				</li>
				<li class="">						
					<a href="../index.html" class="">
						<i class="icon-chevron-left"></i>
						Kembali ke halaman utama
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
				</div> <!-- /widget-header -->
			<div class="widget-content">
				<div class="tabbable">
				<ul class="nav nav-tabs">
				  <li>
				    <a href="#dosen" data-toggle="tab">Dosen</a>
				  </li>
				  <li class="active">
				  	<a href="#mahasiswa" data-toggle="tab">Mahasiswa</a>
				  </li>
				  <li>
				  	<a href="#staf" data-toggle="tab">Staf</a>
				  </li>
				</ul>
				<br>
					<div class="tab-content">
						<div class="tab-pane" id="dosen">
							<form id="form" enctype="multipart/form-data"  action="../dosen/simpan_dosen.php" method="post">
							<div class="login-fields">
								
								<p>Isi data dengan akurat dan benar</p>
								
								<div class="field">
									<p>Nama Lengkap</p>
									<label for="nama">Nama Lengkap :</label>
									<input type="text" id="nama_dosen" name="nama_dosen" value=""  title="Nama Lengkap" placeholder="Nama Lengkap" class="login" required="Test"/>
								</div> <!-- /field -->
								
								<div class="field">
									<p>No Induk Dosen (NID)</p>
									<label for="NID">NID :</label>	
									<input type="text" id="nid" name="nid" value="" title="No Induk Dosen" placeholder="No Induk Dosen" class="login" required="required"/>
								</div> <!-- /field-->

								<div class="field">
									<p>No Handphone</p>
									<label for="hp">No Hp :</label>	
									<input type="text" id="hp" name="hp" value="" title="No HP" placeholder=" No Handphone" class="login" required="required"/>
								</div> <!-- /field -->

								<!--<div class="field">
									<label for="jabatan">Jabatan :</label>
									<input type="text" id="jabatan" name="jabatan" value="" title="Jabatan" placeholder="Jabatan" class="login" required="required"/>
								</div> <!-- /field -->

								<div class="field">
									<p>Username</p>
									<label for="username">Username :</label>
									<input type="text" id="username" name="username" value="" title="Username" placeholder="Username" class="login" required="required"/>
								</div> <!-- /field -->

								<div class="field">
									<p>Email</p>
									<label for="email">Email :</label>
									<input type="text" id="email" name="email" value="" title="Email" placeholder="Email" class="login" required="required"/>
								</div> <!-- /field -->

								<div class="field">
									<p>Password</p>
									<label for="password">Password:</label>
									<input type="password" id="password" name="password" value="" title="password" placeholder="Password" class="login" required="required"/>
								</div> <!-- /field -->
								
								<div class="field">
									<p>Konfirmasi Password</p>
									<label for="konfirmasi_password">onfirm Password:</label>
									<input type="password" id="konfirmasi_password" name="konfirmasi_password" value="" title="Konfirmasi Password" placeholder="Konfirmasi Password" class="login"/>
								</div> <!-- /field -->

								<div class="field">
									<label for="foto">Foto:</label>
									<p>Foto</p>
									<input name="foto" id="foto" type="file" placeholder="Foto" title="Foto" required="required"/>
								</div> <!-- /field -->
								
							</div> <!-- /login-fields -->
							
							<div class="login-actions">		
								<button class="button btn btn-primary btn-large">Daftar</button>
							</div> <!-- .actions -->
							
						</form>
						</div>
						
						<div class="tab-pane active" id="mahasiswa">

						<form id="form" enctype="multipart/form-data"  action="../mahasiswa/simpan_mhs.php" method="post">
							<div class="login-fields">
								
								<p><h3>Isi data dengan akurat dan benar</h3></p>
								
								<div class="field">
									<p>Nama Lengkap</p>
									<input type="text" id="nama_mhs" name="nama_mhs" value=""  title="Nama Lengkap" placeholder="Nama Lengkap" class="login" required="required"/>
								</div> <!-- /field -->
								
								<div class="field">
									<p>No Induk Mahasiswa</p>
									<input type="text" id="nim" name="nim" value="" title="No Induk Mahasiswa" placeholder="No Induk Mahasiswa" class="login" required="required"/>
								</div> <!-- /field-->

								<div class="field">
									<p>Program Studi</p>
									<select id="prodi" name="prodi" title="Program Studi" class="login" type="text" required="required">
										<option value="Teknik Komputer Jaringan dan Media Digital">Teknik Komputer Jaringan dan Media Digital (TKJMD)</option>
										<option value="Teknik Elektro">Teknik Elektro (EL)</option>
										<option value="Teknik Telekomunikasi">Teknik Telekomunikasi (ET)</option>
										<option value="Sistem dan Teknologi Informasi">Sistem dan Teknologi Informasi (II)</option>
										<option value="Teknik Informatika">Teknik Informatika (IF)</option>
									</select>
								</div> <!-- /field -->

								<div class="field">
									<p>Semester</p>
									<select id="semester" name="semester" title="Semester" class="login" type="text" required="required">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
									</select>
								</div> <!-- /field -->
								
								<div class="field">
									<p>No Handphone</p>
									<input type="text" id="hp" name="hp" value="" title="No HP" placeholder="No HP" class="login" required="required"/>
								</div> <!-- /field -->

								<div class="field">
									<p>Username</p>
									<input type="text" id="username" name="username" value="" title="Username" placeholder="Username" class="login" required="required"/>
								</div> <!-- /field -->


								<div class="field">
									<p>Email</p>
									<input type="text" id="email" name="email" value="" title="Email" placeholder="Email" class="login" required="required"/>
								</div> <!-- /field -->

								<div class="field">
									<p>Password</p>
									<input type="password" id="password" name="password" value="" title="password" placeholder="Password" class="login" required="required"/>
								</div> <!-- /field -->
								
								<div class="field">
									<p>Konfirmasi Password</p>
									<input type="password" id="konfirmasi_password" name="konfirmasi_password" value="" title="Konfirmasi Password" placeholder="Konfirmasi Password" class="login"/>
								</div> <!-- /field -->

								<div class="field">
									<label for="foto">Foto:</label>
									<p>Foto</p>
									<input name="foto" id="foto" type="file" placeholder="Foto" title="Foto" required="required"/>
								</div> <!-- /field -->
								
							</div> <!-- /login-fields -->
							
							<div class="login-actions">		
								<button class="button btn btn-primary btn-large">Daftar</button>
								
							</div> <!-- .actions -->
							
						</form>
						</div>

						<div class="tab-pane" id="staf">

						<form id="form" enctype="multipart/form-data"  action="../staf/simpan_staf.php" method="post">
							<div class="login-fields">
								
								<p>Isi data dengan akurat dan benar</p>
								
								<div class="field">
									<p>Nama Lengkap :</p>
									<input type="text" id="nama_staf" name="nama_staf" value=""  title="Nama Lengkap" placeholder="Nama Lengkap" class="login" required="Test"/>
								</div> <!-- /field -->
								
								<div class="field">
									<p>NIP :</p>	
									<input type="text" id="nip_staf" name="nip_staf" value="" title="No Induk Pegawai" placeholder="No Induk Pegawai" class="login" required="required"/>
								</div> <!-- /field-->

								<div class="field">
									<p>No Hp :</p>
									<input type="text" id="hp" name="hp" value="" title="No HP" placeholder="hp" class="login" required="required"/>
								</div> <!-- /field -->

								<div class="field">
									<p>Jabatan :</p>
									<select id="jabatan" name="jabatan" title="jabatan" class="login" type="text" required="required">
										<option value="Jabatan">Jabatan</option>
										<option value="Teknisi">Teknisi</option>
										<option value="Tata Usaha">Tata Usaha</option>
									</select>
								</div> <!-- /field -->

								<div class="field">
								<p>Username :</p>
									<label for="username">Username :</label>
									<input type="text" id="username" name="username" value="" title="Username" placeholder="Username" class="login" required="required"/>
								</div> <!-- /field -->

								<div class="field">
									<p>Email :</p>
									<label for="email">Email :</label>
									<input type="text" id="email" name="email" value="" title="Email" placeholder="Email" class="login" required="required"/>
								</div> <!-- /field -->

								<div class="field">
									<p>Password :</p>
									<label for="password">Password:</label>
									<input type="password" id="password" name="password" value="" title="password" placeholder="Password" class="login" required="required"/>
								</div> <!-- /field -->
								
								<div class="field">
									<p>Konfirmasi Password :</p>
									<label for="konfirmasi_password">Confirm Password:</label>
									<input type="password" id="konfirmasi_password" name="konfirmasi_password" value="" title="Konfirmasi Password" placeholder="Konfirmasi Password" class="login"/>
								</div> <!-- /field -->

								<div class="field">
									<label for="foto">Foto:</label>
									<p>Foto</p>
									<input name="foto" id="foto" type="file" placeholder="Foto" title="Foto" required="required"/>
								</div> <!-- /field -->
								
							</div> <!-- /login-fields -->
							
							<div class="login-actions">		
								<button class="button btn btn-primary btn-large">Daftar</button>
								
							</div> <!-- .actions -->
							
							</form>
						</div>
						
					</div>
				</div>
				
			</div> <!-- /widget-content -->
				
		</div> <!-- /widget -->
  		
    </div> <!-- /span8 -->
	
</div> <!-- /content -->

</div> <!-- /account-container -->	

<!-- Text Under Box -->
<div class="login-extra">
Sudah punya akun? <a href="../login/labms">Masuk dengan akun</a>
</div> <!-- /login-extra -->

<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/signin.js"></script>
</body>
</html>