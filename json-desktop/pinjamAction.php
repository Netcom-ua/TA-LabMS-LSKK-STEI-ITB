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
			$result = $mysqli->query("INSERT INTO tb_pinjam SET nama_peminjam='$_GET[nama_peminjam]', username='$_GET[username]', email='$_GET[email]', kode_alat='$_GET[kode_alat]', nama_alat='$_GET[nama_alat]', tgl_pinjam='$_GET[tgl_pinjam]', tgl_kembali='$_GET[tgl_kembali]', status='$_GET[status]', jumlah='$_GET[jumlah]', penanggung_jawab='$_GET[penanggung_jawab]';");
		}
		else if ($_GET["labms"]=="del")
		{
		$result = $mysqli->query("DELETE FROM tb_pinjam where id_pinjam='$_GET[id_pinjam]';");				
		}
		else if ($_GET["labms"]=="upd")
		{
		$result = $mysqli->query("UPDATE tb_pinjam SET id_pinjam='$_GET[id_pinjam]',nama_peminjam='$_GET[nama_peminjam]', username='$_GET[username]', email='$_GET[email]', kode_alat='$_GET[kode_alat]', nama_alat='$_GET[nama_alat]', tgl_pinjam='$_GET[tgl_pinjam]', tgl_kembali='$_GET[tgl_kembali]', status='$_GET[status]', jumlah='$_GET[jumlah]', penanggung_jawab='$_GET[penanggung_jawab]' WHERE id_pinjam='$_GET[id_pinjam]';");			
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
