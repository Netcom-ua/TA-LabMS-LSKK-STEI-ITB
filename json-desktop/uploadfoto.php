<?php
	$DatabaseServer   = "localhost";
	$DatabaseUser     = "root";
	$DatabasePassword = "";
	$DatabaseName     = "db_lms";

	$mysqli = new mysqli($DatabaseServer, $DatabaseUser, $DatabasePassword, $DatabaseName);
	
	if ($mysqli->connect_errno) 
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	foreach($_FILES as $value){
		if($_GET){
			$allowed_ext	= array( 'jpg', 'png');
			$file_name		= $value['name'];
			$file_ext		= strtolower(end(explode('.', $file_name)));
			$file_size		= $value['size'];
			$file_tmp		= $value['tmp_name'];
			$nama			= $_GET['nama_file'];
			if(in_array($file_ext, $allowed_ext) === true){
				if($file_size < 1073741824){
					$lokasi = 'foto_inventaris/'.$nama.'.'.$file_ext;
					move_uploaded_file($file_tmp, $lokasi);
					}
				else{
					echo '<div class="error">ERROR: Besar ukuran file (file size) maksimal 1 Mb!</div>';
					}
				}
				else{
					echo '<div class="error">ERROR: Ekstensi file tidak di izinkan!</div>';
			}
		} 
	}
?>
            
