<?php
	$conn = mysql_connect("localhost", "root", "");
    mysql_select_db("db_lms") or die(mysql_error());
    if(isset($_GET['Kode_Alat'])) {
        $sql = "select * from tb_atk where kode_alat = '{$_GET['Kode_Alat']}'";
		$result = mysql_query("$sql") or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());
		$row = mysql_fetch_array($result);
		header("Content-type: " . $row["imageType"]);
        echo $row["foto"];
	}
	mysql_close($conn);
?>