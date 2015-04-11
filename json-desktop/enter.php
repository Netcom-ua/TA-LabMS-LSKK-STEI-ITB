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
	
	if(isset($_GET["sql"]))
	{
		$result = $mysqli->query($_GET["sql"]."");
		
		if($result)
		{
			$r = mysqli_fetch_array($result);
			echo $r[0];			
		}
		else
		{
			echo "Error : <br />";
			echo $_GET["sql"];
		}
	}

?>