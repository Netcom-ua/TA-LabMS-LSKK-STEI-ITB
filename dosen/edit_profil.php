<?php
	require_once'template/header.php';
	
	
	#baca variabel URL (if register global on)
	//$edit = md5
	$edit=$data['username'];
	//$edit = md5($_GET['edit']);
	$query =  "select * from tb_dosen where username ='$edit'";
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
					 <img src="foto_dosen/<?php echo $data['foto']?>" width=230 height=200 title="<?php echo $data['nama_dosen']?>" class="img-thumbnail"></a>
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
			          	<td>NID: </td> 
			          	<td><input  id="nid" name="nid" type="text" value="<?php echo $data['nid']?>" disabled="disabled"></td>
			          </tr>
					  <tr>
			          	<td>Nama Lengkap :</td> 
			          	<td><input id="nama_dosen" name="nama_dosen" type="text" value="<?php echo $data['nama_dosen']?>" require="require"></td>
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
          </div> 
      <!-- /row --> 
    </div>
    <!-- /container -->
<?php
	require_once'template/footer.php';

	$nama_dosen= $_POST['nama_dosen'];
	$hp = $_POST['hp'];
	$email = $_POST['email'];
	$lokasi_file=$_FILES['foto']['tmp_name'];
	
	if(!empty($nama_dosen)){
	//if(empty($lokasi_file)){
		$query="UPDATE tb_dosen SET
			nama_dosen = '$nama_dosen', 
			hp = '$hp', 
			email = '$email'
			WHERE username = '$edit'";
			$result = $mysqli->query($query);
		//var_dump($query);
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
		
	if(!empty($lokasi_file) && !empty($nama_dosen)){
		$lokasi_file=$_FILES['foto']['tmp_name'];
		$nama_file=$_FILES['foto']['name'];
		move_uploaded_file($lokasi_file,"foto_dosen/$nama_file");
		$query="UPDATE tb_dosen SET
			nama_dosen = '$nama_dosen', 
			hp = '$hp', 
			email = '$email',
			foto ='$nama_file'
			WHERE username = '$edit'";
		$result = $mysqli->query($query);
		//var_dump($query);

	}
?>