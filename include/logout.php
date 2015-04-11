<?php 
	session_start();
	unset($_SESSION['nim']);
	unset($_SESSION['nip']);
	unset($_SESSION['username']);
	unset($_SESSION['level']);
	unset($_SESSION['jabatan']);
	session_destroy();
	echo "<script>window.location = '../index.php'</script>";
?>