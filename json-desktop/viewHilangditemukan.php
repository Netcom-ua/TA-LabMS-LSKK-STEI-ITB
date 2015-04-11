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
	
	if($_GET["labms"]=="hilangditemukan")
	{ 
	if (isset($_GET["search"]))
		{
			$result = $mysqli->query("SELECT * FROM tb_hilangditemukan WHERE id_ht like '%$_GET[search]%' OR nama_barang like '%$_GET[search]%' OR keterangan like '%$_GET[search]%' OR foto like '%$_GET[search]%';");
		}
		else 
		{
		$result = $mysqli->query("SELECT * FROM tb_hilangditemukan;");		
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