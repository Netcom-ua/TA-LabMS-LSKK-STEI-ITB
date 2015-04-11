<?php
	require_once'template/header.php';	
	#baca variabel URL (if register global on)
	//$edit = md5
	$edit=$data['username'];
	//$edit = md5($_GET['edit']);
	$query =  "select * from tb_mahasiswa where username ='$edit'";
	$result = $mysqli->query($query)
		or die('Query failed: ' . mysql_error());
	$data = $result->fetch_array()  
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
	  <form id="form" enctype="multipart/form-data"  action="" method="post">
			 <div class="span3">
				 <div class="widget-header"> <i class="icon-camera-retro"></i>
				 </div>
				 <div class="widget-content">
					 <img src="foto_mahasiswa/<?php echo $data['foto']?>" width=230 height=200 title="<?php echo $data['nama_mhs']?>" class="img-thumbnail"></a>
					 <input name="foto" id="foto" type="file" placeholder="foto" title="Foto"/>
				 </div>
				</div>
			 <div class="span8">
				 <div class="widget-header"> <i class="icon-user"></i>
				  <h3> Detail </h3>
				 </div>
				 <div class="widget-content">
					 <table class="table">
					<tbody>
			          <tr>
			          	<td>NIM: </td> 
			          	<td><input  id="nim" name="nim" type="text" value="<?php echo $data['nim']?>" disabled="disabled"></td>
			          </tr>
					  <tr>
			          	<td>Nama Lengkap :</td> 
			          	<td><input id="nama_mhs" name="nama_mhs" type="text" value="<?php echo $data['nama_mhs']?>" require="require"></td>
					  </tr>
			          <tr>
			          	<td>No Handphone :</td> 
			          	<td><input id="hp" name="hp" type="text" value="<?php echo $data['hp']?>" equire="require"></td>
					  </tr>
			          	<td>Username :</td> 
			          	<td><input id="username" name="username" type="text" value="<?php echo $data['username']?>" disabled="disabled"></td>
			          </tr>
			          <tr>
			          	<td>Email :</td> 
			          	<td><input id="email" name="email" type="text" value="<?php echo $data['email']?>" equire="require"></td>
			          </tr>
					  <tr>
			          	<td>Program Studi :</td> 
			          	<td>
							<select id="prodi" name="prodi" title="Program Studi" class="login" type="text" required="required">
							<option value="<?php echo $data['prodi']?>"><?php echo $data['prodi']?></option>
							<option value="Teknik Elektro">Teknik Elektro (EL)</option>
							<option value="Teknik Komputer Jaringan dan Media Digital">Teknik Komputer Jaringan dan Media Digital (TKJMD)</option>
							<option value="Teknik Telekomunikasi">Teknik Telekomunikasi (ET)</option>
							<option value="Sistem dan Teknologi Informasi">Sistem dan Teknologi Informasi (II)</option>
							<option value="Teknik Informatika">Teknik Informatika (IF)</option>
						</select>
						</td>
			          </tr><!-- /field -->
					  <tr>
			          	<td>Semester :</td> 
			          	<td>
							<select id="semester" name="semester" title="Semester" class="login" type="text" required="required">
								<option value="<?php echo $data['semester']?>"><?php echo $data['semester']?></option>
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
						</td>
			          </tr><!-- /field -->
					  <tr>
						<td></td> 
						<td><button class="button btn-primary btn-large">Update</button></td>
					  </tr>
					</tbody>
				  </table>	
				</div> <!-- .actions -->		
				</form>
				</div>
				<!-- /widget-content --> 
			</div>
          <!-- /widget --> 
          </div> <br/>
          </div> 
      <!-- /row --> 
    </div>
    <!-- /container -->
<?php
	require_once'template/footer.php';

	$nama_mhs= $_POST['nama_mhs'];
	$hp = $_POST['hp'];
	$prodi = $_POST['prodi'];
	$semester = $_POST['semester'];
	$email = $_POST['email'];
	$lokasi_file=$_FILES['foto']['tmp_name'];
	
	if(!empty($nama_mhs)){
	//if(empty($lokasi_file)){
		$query="UPDATE tb_mahasiswa SET
			nama_mhs = '$nama_mhs', 
			prodi = '$prodi',
			semester = '$semester',
			hp = '$hp', 
			email = '$email'
			WHERE username = '$edit'";
			$result = $mysqli->query($query);
		if($result == 1)
		{
			echo "<script>
				alert('Data berhasil diganti');
			setTimeout(function() {
					document.location.href='profil.html';
			}, 1000);
			</script>";
		} else {
			echo "<script>
				alert('Gagal update data');
			setTimeout(function() {
					document.location.href='profil.html';
			}, 1000);
			</script>";
		}
	}
		
	if(!empty($lokasi_file) && !empty($nama_mhs)){
		$lokasi_file=$_FILES['foto']['tmp_name'];
		$nama_file=$_FILES['foto']['name'];
		move_uploaded_file($lokasi_file,"foto_mahasiswa/$nama_file");
		
		$query="UPDATE tb_mahasiswa SET
		nama_mhs = '$nama_mhs', 
		prodi = '$prodi',
		semester = '$semester',
		hp = '$hp', 
		email = '$email',
		foto = '$nama_file'
		WHERE username = '$edit'";
		$result = $mysqli->query($query);

	}
?>