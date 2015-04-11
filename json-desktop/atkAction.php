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
			$lokasitujuan="http://localhost/ta-lms/json_dekstop/foto_atk/";
			
			$result = $mysqli->query("INSERT INTO tb_atk SET kode_alat='$_GET[kode_alat]', nama_alat='$_GET[nama_alat]', kode_lab='$_GET[kode_lab]', nama_lab='$_GET[nama_lab]', tgl_masuk='$_GET[tgl_masuk]', tgl_pengajuan='$_GET[tgl_pengajuan]',tgl_pengapusan='$_GET[tgl_pengapusan]', tipe='$_GET[tipe]', spesifikasi='$_GET[spesifikasi]', ket='$_GET[ket]',foto='$lokasitujuan$_GET[namafoto]';");
		}
		else if ($_GET["labms"]=="del")
		{
		$result = $mysqli->query("DELETE FROM tb_atk where kode_alat='$_GET[kode_alat]';");				
		}
		else if ($_GET["labms"]=="upd")
		{
		//Tempat untuk menyimpan foto
		$lokasitujuan="http://localhost/ta-lms/json_dekstop/foto_atk/";
		
		$result = $mysqli->query("UPDATE tb_atk SET kode_alat='$_GET[kode_alat]', nama_alat='$_GET[nama_alat]', kode_lab='$_GET[kode_lab]', nama_lab='$_GET[nama_lab]', tgl_masuk='$_GET[tgl_masuk]', tgl_pengajuan='$_GET[tgl_pengajuan]',tgl_pengapusan='$_GET[tgl_pengapusan]', tipe='$_GET[tipe]', spesifikasi='$_GET[spesifikasi]', ket='$_GET[ket]', foto='$lokasitujuan$_GET[namafoto]' WHERE kode_alat='$_GET[kode_alat]';");			
		}
		/*
		else if ($_GET["labms"]=="search")
		{
		$result = $mysqli->query("SELECT * FROM tb_atk WHERE kode_alat like %'$_GET[cariKodealat]'% OR nama_alat like %'$_GET[cariKodealat]'% OR kode_lab like %'$_GET[cariKodealat]'% OR nama_lab like %'$_GET[cariKodealat]'% OR tgl_pengajuan like %'$_GET[cariKodealat]'% OR tgl_masuk like %'$_GET[cariKodealat]'% OR tgl_penghapusan like %'$_GET[cariKodealat]'% OR spesifikasi like %'$_GET[cariKodealat]'% OR jenis_barang like %'$_GET[cariKodealat]'% OR thn_pembuatan like %'$_GET[cariKodealat]'% OR status like %'$_GET[cariKodealat]'% OR ket like %'$_GET[cariKodealat]'% ;");			
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
		
	//	print(json_encode(array($success)));
		
	}
?>
