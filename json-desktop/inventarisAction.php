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
			$lokasitujuan="http://localhost/ta-lms/json_dekstop/foto_inventaris/";
			
			$result = $mysqli->query("INSERT INTO tb_inventaris SET kode_alat='$_GET[kode_alat]', nama_alat='$_GET[nama_alat]', kode_lab='$_GET[kode_lab]', nama_lab='$_GET[nama_lab]', spesifikasi='$_GET[spesifikasi]', jenis_praktikum='$_GET[jenis_praktikum]', thn_pembuatan='$_GET[thn_pembuatan]', jumlah='$_GET[jumlah]', satuan='$_GET[satuan]', ket='$_GET[ket]', foto='$_GET[namafoto]', tgl_masuk='$_GET[tgl_masuk]';");
		}
		else if ($_GET["labms"]=="del")
		{
		$result = $mysqli->query("DELETE FROM tb_inventaris where kode_alat='$_GET[kode_alat]';");				
		}
		else if ($_GET["labms"]=="upd")
		{
		$lokasitujuan="http://localhost/ta-lms/json_dekstop/foto_inventaris/";
		
		$result = $mysqli->query("UPDATE tb_inventaris SET kode_alat='$_GET[kode_alat]', nama_alat='$_GET[nama_alat]', kode_lab='$_GET[kode_lab]', nama_lab='$_GET[nama_lab]', spesifikasi='$_GET[spesifikasi]', jenis_praktikum='$_GET[jenis_praktikum]', thn_pembuatan='$_GET[thn_pembuatan]', jumlah='$_GET[jumlah]', satuan='$_GET[satuan]', ket='$_GET[ket]',foto='$_GET[namafoto]', tgl_masuk='$_GET[tgl_masuk]' WHERE kode_alat='$_GET[kode_alat]';");			
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
		
		//print(json_encode(array($success)));
	}
?>
