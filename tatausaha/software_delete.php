<?php
error_reporting(0);
include '../include/koneksi.php';
?>

<?php

		$softwareid = $_GET['id'];

		$query = "SELECT * FROM tb_mdl_upload_software WHERE id = '$softwareid'";
		$hasil = mysql_query($query);
		$data = mysql_fetch_array($hasil);

		$query2 = "DELETE FROM tb_mdl_upload_software WHERE id = '$softwareid'";
		$hasil2 = mysql_query($query2);

		if($hasil && $hasil2) {
		unlink($data['path']);
		//reload page otomatis dengan javascript
		echo "<script language=javascript>
		alert('Data Berhasil Dihapus');</script>";
		echo '<script type=text/javascript>
		window.location = "software_upload.php";
		</script>';
		
		echo "<script> window.location = 'software_upload.php'</script>";
		

	}

?>
