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
	
	if($_GET["labms"]=="pinjam")
	{ 
	if (isset($_GET["search"]))
	{
		$result = $mysqli->query("SELECT * FROM tb_pinjam WHERE id_pinjam like '%$_GET[search]%' OR nama_peminjam like '%$_GET[search]%' OR username like '%$_GET[search]%' OR email like '%$_GET[search]%' OR kode_alat like '%$_GET[search]%' OR nama_alat like '%$_GET[search]%' OR tgl_pinjam like '%$_GET[search]%' OR tgl_kembali like '%$_GET[search]%' OR status like '%$_GET[search]%' OR jumlah like '%$_GET[search]%' OR penanggung_jawab like '%$_GET[search]%';");
	}
		else 
		{
		$result = $mysqli->query("SELECT * FROM tb_pinjam;");		
		}
	}
	while($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}
	
	$result->close();

	// Close the database connection
	$mysqli->close();
	
	// Returns the JSON representation of fetched data
	print(json_encode($rows));
?>