<?php
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
include '../../config.php';


#Link Tukar == tukar
#=============================================================
if(isset($_GET['action'])){

	/*	if($_GET['action']=="tukar"){
		#Masukan alasan
		#=========================================================
		//$insert=mysql_query("INSERT INTO mdl_message VALUES(NULL, '".$_SESSION['user_id']."', '".$_SESSION['iduser2']."', '".$_SESSION['idjadwalmhs1']."', '".$_SESSION['idjadwalmhs2']."', 'request', 'N','".$_SESSION['datenow']."', '".$_SESSION['$timenow']."', '".$_POST['alasan']."','request')");
		//echo "<script>alert('Permintaan tukar jadwal terkirim.');";
		//echo "document.location.replace('index.php?page=listJadwal');";
		//echo "</script>";
		echo "test";
		}*/

	#Link Tukar == tukar
	#=============================================================
	if($_GET['action']=="batal"){
		$query=mysql_query("DELETE FROM mdl_message WHERE useridfrom='".$_SESSION['user_id']."' AND message='request'");
		echo "<script>alert('Pertukaran jadwal dibatalkan, silahkan pilih pertukaran jadwal pada daftar.');";
		echo "document.location.replace('index.php?page=listJadwal');";
		echo "</script>";
	}

	#MHS Yang ditukar
	#Link Accept
	#======================================
	elseif ($_GET['action']=="accept"){

		$update_message=mysql_query("UPDATE mdl_message SET message='accept', status='N',date='".$_SESSION['datenow']."', time='".$_SESSION['$timenow']."' WHERE id='".$_SESSION['idmessage']."'");
		$update_message2=mysql_query("UPDATE mdl_message SET message='decline', status='N',date='".$_SESSION['datenow']."', time='".$_SESSION['$timenow']."' WHERE idjadwalto='".$_SESSION['jadwalto']."' and useridto='".$_SESSION['user_id']."' AND message='request'");
		//$update_jadwalmhsfrom=mysql_query("UPDATE mdl_jadwal SET userid='".$_SESSION['peminta']."' WHERE id='".$_SESSION['jadwalto']."' AND courseid='".$_SESSION['makulfrom']."'");
		//$update_jadwalmhsto=mysql_query("UPDATE mdl_jadwal SET userid='".$_SESSION['user_id']."' WHERE id='".$_SESSION['jadwalfrom']."' AND courseid='".$_SESSION['makulfrom']."'");

		echo "<script>alert('Pertukaran berhasil.');";
		echo "document.location.replace('index.php?page=listJadwal');";
		echo "</script>";

	}
	elseif ($_GET['action']=="decline"){

		$update_message=mysql_query("UPDATE mdl_message SET message='decline', status='N',date='".$_SESSION['datenow']."', time='".$_SESSION['$timenow']."' WHERE id='".$_SESSION['idmessage']."'");
		echo "<script>alert('Pertukaran dibatalkan.');";
		echo "document.location.replace('index.php?page=listJadwal');";
		echo "</script>";
	}

}


?>