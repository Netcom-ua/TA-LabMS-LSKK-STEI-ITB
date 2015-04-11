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
	if($_GET["labms"]=="atk")
	{ 
	if (isset($_GET["search"]))
	{
		$result = $mysqli->query("SELECT * FROM tb_atk WHERE kode_alat like '%$_GET[search]%' OR nama_alat like '%$_GET[search]%' OR kode_lab like '%$_GET[search]%' OR nama_lab like '%$_GET[search]%' OR tgl_masuk like '%$_GET[search]%' OR tgl_pengajuan like '%$_GET[search]%' OR tgl_pengapusan like '%$_GET[search]%' OR tipe like '%$_GET[search]%' OR spesifikasi like '%$_GET[search]%' OR ket like '%$_GET[search]%';");
	}
		else 
		{
		$result = $mysqli->query("SELECT * FROM tb_atk;");		
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