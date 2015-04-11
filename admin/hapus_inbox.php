<?php
/* proses SMS */
include ("../include/koneksi.php");
$action = $_GET['action'];

switch($action) {
	case "delinbox" :
		$ID = $_GET['id'];
		// hapus SMS dari kotak masuk
		$query  = "DELETE FROM inbox WHERE ID='$ID'";
		$result = mysql_query($query);
		// redirect ke halaman inbox
		header("location:index.php");
	break;
	case "delsentitems" :
		$ID = $_GET['id'];
		// hapus pesan terkirim
		$query  = "DELETE FROM sentitems WHERE ID='$ID'";
		$result = mysql_query($query);
		// redirect ke halaman sentitems
		header("location:index.php");
	break;
}
?>