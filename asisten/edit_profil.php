<?php
	require_once'template/header.php';
	
	
	#baca variabel URL (if register global on)
	$edit = $_GET['edit'];
	$query =  "select * from tb_user where username ='$edit'";
	$result = $mysqli->query($query)
		or die('Query failed: ' . mysql_error());
	$row = $result->fetch_array()  
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
					 <img src="../tatausaha/user/foto_user/<?php echo $row['foto']?>" width=230 height=200 title="<?php echo $row['nama_user']?>" class="img-thumbnail"></a>
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
			          	<td>Id Pengenal: </td> 
			          	<td><input  id="id_pengenal" name="id_pengenal" type="text" value="<?php echo $row['id_pengenal']?>" disabled="disabled"></td>
			          </tr>
					  <tr>
			          	<td>Nama Lengkap :</td> 
			          	<td><input id="nama_user" name="nama_user" type="text" value="<?php echo $row['nama_user']?>"></td>
					  </tr>
			          <tr>
			          	<td>No Handphone :</td> 
			          	<td><input id="hp" name="hp" type="text" value="<?php echo $row['hp']?>"></td>
					  </tr>
			          	<td>Username :</td> 
			          	<td><input id="username" name="username" type="text" value="<?php echo $row['username']?>" disabled="disabled"></td>
			          </tr>
			          <tr>
			          	<td>Email :</td> 
			          	<td><input id="email" name="email" type="text" value="<?php echo $row['email']?>"></td>
			          </tr>
					  <tr>
						<td></td> 
						<td><button class="button-left btn-primary btn-large">Update</button></td>
					  </tr>
					</tbody>
				  </table>	
				</div> <!-- .actions -->		
				</form>
				</div>
				<!-- /widget-content --> 
			</div>
          <!-- /widget --> 
          </div> 
      <!-- /row --> 
    </div>
    <!-- /container -->
<?php
	require_once'template/footer.php';

	$nama_user= $_POST['nama_user'];
	$hp = $_POST['hp'];
	$email = $_POST['email'];
	$lokasi_file=$_FILES['foto']['tmp_name'];
	
	if(!empty($nama_user)){
	//if(empty($lokasi_file)){
		$query="UPDATE tb_user SET
			nama_user = '$nama_user', 
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
		}
	}
		
	if(!empty($lokasi_file) && !empty($nama_user)){
		$lokasi_file=$_FILES['foto']['tmp_name'];
		$nama_file=$_FILES['foto']['name'];
		move_uploaded_file($lokasi_file,".../tatausaha/user/foto_user/$nama_file");
		
		$query="UPDATE tb_user SET
		nama_user = '$nama_user', 
		hp = '$hp', 
		email = '$email',
		foto = '$nama_file'
		WHERE username = '$edit'";
		$result = $mysqli->query($query);
	}
?>