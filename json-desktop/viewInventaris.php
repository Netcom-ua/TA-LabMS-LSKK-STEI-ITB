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
	
	if($_GET["labms"]=="inventaris")
	{ 
	if (isset($_GET["search"]))
		{
			$result = $mysqli->query("SELECT * FROM tb_inventaris WHERE kode_alat like '%$_GET[search]%' OR nama_alat like '%$_GET[search]%' OR kode_lab like '%$_GET[search]%' OR nama_lab like '%$_GET[search]%' OR spesifikasi like '%$_GET[search]%' OR jenis_praktikum like '%$_GET[search]%' OR thn_pembuatan like '%$_GET[search]%' OR jumlah like '%$_GET[search]%' OR satuan like '%$_GET[search]%' OR ket like '%$_GET[search]%' OR tgl_masuk like '%$_GET[search]%';");
		}
		else 
		{
		$result = $mysqli->query("SELECT * FROM tb_inventaris;");		
		}
	}
	//echo $mysqli->error;
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