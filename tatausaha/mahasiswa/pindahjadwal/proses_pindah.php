<?php
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
include '../../config.php';

#Link pindah == pindah
#=============================================================
if(isset($_GET['action'])){

	#Link Tukar == tukar
	#=============================================================
	if($_GET['action']=="batal"){
		$query=mysql_query("DELETE FROM mdl_message WHERE useridfrom='".$_SESSION['user_id']."' AND message='pindahrequest'");
		echo "<script>alert('Perpindahan jadwal dibatalkan, silahkan pilih pertukaran jadwal pada daftar.');";
		echo "document.location.replace('index.php?page=listJadwal');";
		echo "</script>";
	}
}


?>