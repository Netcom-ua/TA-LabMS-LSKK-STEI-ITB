<?php
error_reporting(0);
include '../include/koneksi.php';
?>

<?php

		$videoid = $_GET['id'];

		// membaca informasi file dari tabel berdasarkan id nya
		$query  = "SELECT * FROM tb_mdl_upload_video WHERE id = '$videoid'";
		$hasil  = mysql_query($query);
		$data = mysql_fetch_array($hasil);
		$new_name = str_replace(" ", "", $data['video_name']);

		header('Content-Description: File Transfer');
		// header yang menunjukkan nama file yang akan didownload

		header("Content-Disposition: attachment; filename=".$new_name );

		// header yang menunjukkan ukuran file yang akan didownload

		header("Content-length: ". filesize($data['path']));

		// header yang menunjukkan jenis file yang akan didownload

		header("Content-type: ".$data['type']);

		header('Content-Transfer-Encoding: binary');
		ob_end_clean();

		readfile($data['path']);
		exit;


?>