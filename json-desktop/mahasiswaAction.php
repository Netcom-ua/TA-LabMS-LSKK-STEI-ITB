<?php
	$DatabaseServer   = "localhost";
	$DatabaseUser     = "root";
	$DatabasePassword = "";
	$DatabaseName     = "db_lms";

	if(isset($_GET["labms"]))
	{
		$mysqli = new mysqli($DatabaseServer, $DatabaseUser, $DatabasePassword, $DatabaseName);
		if ($mysqli->connect_errno) 
		{
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}
		if($_GET["labms"]=="add")
		{
			//Tempat untuk menyimpan foto
			$lokasitujuan="http://localhost/ta-lms/json_dekstop/foto_mahasiswa/";
			
			$result = $mysqli->query("INSERT INTO tb_mahasiswa SET nim='$_GET[nim]', nama_mhs='$_GET[nama_mhs]', prodi='$_GET[prodi]', semester='$_GET[semester]', hp='$_GET[hp]', username='$_GET[username]', email='$_GET[email]', password='".md5("$_GET[password]")."', foto='$lokasitujuan$_GET[namafoto]' ,status='$_GET[status]', tgl_daftar='$_GET[tgl_daftar]';");
		}
		else if ($_GET["labms"]=="del")
		{
		$result = $mysqli->query("DELETE FROM tb_mahasiswa where nim='$_GET[nim]';");				
		}
		else if ($_GET["labms"]=="upd")
		{
		$lokasitujuan="http://localhost/ta-lms/json_dekstop/foto_mahasiswa/";
		$result = $mysqli->query("UPDATE tb_mahasiswa SET nim='$_GET[nim]', nama_mhs='$_GET[nama_mhs]', prodi='$_GET[prodi]', semester='$_GET[semester]', hp='$_GET[hp]', username='$_GET[username]', email='$_GET[email]',password='".md5("$_GET[password]")."', foto='$lokasitujuan$_GET[namafoto]', status='$_GET[status]', tgl_daftar='$_GET[tgl_daftar]' WHERE nim='$_GET[nim]';");		
		}
		/*else if ($_GET["labms"]=="search")
		{
		$result = $mysqli->query("SELECT * FROM tb_inventaris WHERE kode_alat like %'$_GET[cariKodealat]'% OR nama_alat like %'$_GET[cariKodealat]'% OR kode_lab like %'$_GET[cariKodealat]'% OR nama_lab like %'$_GET[cariKodealat]'% OR tgl_pengajuan like %'$_GET[cariKodealat]'% OR tgl_masuk like %'$_GET[cariKodealat]'% OR tgl_penghapusan like %'$_GET[cariKodealat]'% OR spesifikasi like %'$_GET[cariKodealat]'% OR jenis_barang like %'$_GET[cariKodealat]'% OR thn_pembuatan like %'$_GET[cariKodealat]'% OR status like %'$_GET[cariKodealat]'% OR ket like %'$_GET[cariKodealat]'% ;");			
		}
		*/
		if($result)
		{
		//	$success["success"] = 1;
		echo 1;
		}
			else
		{
		//	$success["success"] = 0;
		echo 0;
		}	             
		//result->close();
		$mysqli->close();
		
//		print(json_encode(array($success)));	
	}
?>
