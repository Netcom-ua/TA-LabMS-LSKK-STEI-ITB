<?php
error_reporting(0);
include '../include/koneksi.php';
?>

<?php

	$videoid = $_GET['id'];
	
		$query = "SELECT path FROM tb_mdl_upload_video WHERE id = '$videoid'";
		$hasil = mysql_query($query) or die ("".mysql_error());;
		$data = mysql_fetch_array($hasil);

		$query2 = "DELETE FROM tb_mdl_upload_video WHERE id = '$videoid'";
		$hasil2 = mysql_query($query2) or die ("".mysql_error()) ;
		
		if($hasil && $hasil2) {
		unlink($data['path']);
		//reload page otomatis dengan javascript
		echo "<script language=javascript>
		alert('Data Berhasil Dihapus');</script>";
		echo '<script type=text/javascript>
		window.location = "video_upload.php";
		</script>';
		
		echo "<script> window.location = 'newsfeed_upload.php'</script>";
		

	}
?>
