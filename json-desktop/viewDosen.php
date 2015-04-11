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
	
	if($_GET["labms"]=="dosen")
	{ 
	if (isset($_GET["search"]))
	{
		$result = $mysqli->query("SELECT * FROM tb_dosen WHERE id like '%$_GET[search]%' OR nid like '%$_GET[search]%' OR nama_dosen like '%$_GET[search]%' OR hp like '%$_GET[search]%' OR username like '%$_GET[search]%' OR email like '%$_GET[search]%' OR password like '%$_GET[search]%' OR foto like '%$_GET[search]%' OR status like '%$_GET[search]%' OR tgl_daftar like '%$_GET[search]%';");
	}
		else 
		{
		$result = $mysqli->query("SELECT * FROM tb_dosen;");		
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