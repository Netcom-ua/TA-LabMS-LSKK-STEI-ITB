<?php
	$host = '127.0.0.1';
	$user = 'root';
	$pass = '';
	$dbname = 'db_lms'; 
	//mengubung ke host
	$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
	 
	//memilih database yang akan digunakan
	$dbselect = mysql_select_db($dbname);

	// Create connection
	$mysqli = new mysqli($host,$user,$pass,$dbname);
	
	// Check connection
	if (mysqli_connect_errno()) {
  	echo "<b>Koneksi Database Gagal</b>: " . mysqli_connect_error();
	}
	
	// Create connection
	$connected =mysql_connect ($host,$user,$pass,$dbname);
	
	// Check connection
	if (!$connected){
		die ("koneksi ke my sql server gagal");
	} 
	else {
	}
		$retval=mysql_select_db($dbname,$connected);
		IF(! $retval){
		die ("Database tidak dapat di akses");
	}
?>