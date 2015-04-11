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
	
	if($_GET["labms"]=="mahasiswa")
	{ 
	if (isset($_GET["search"]))
	{
		$result = $mysqli->query("SELECT * FROM tb_mahasiswa WHERE nim like '%$_GET[search]%' OR nama_mhs like '%$_GET[search]%' OR prodi like '%$_GET[search]%' OR semester like '%$_GET[search]%' OR hp like '%$_GET[search]%' OR username like '%$_GET[search]%' OR email like '%$_GET[search]%' OR password like '%$_GET[search]%' OR foto like '%$_GET[search]%' OR status like '%$_GET[search]%' OR tgl_daftar like '%$_GET[search]%';");
	}
		else 
		{
		$result = $mysqli->query("SELECT * FROM tb_mahasiswa;");		
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