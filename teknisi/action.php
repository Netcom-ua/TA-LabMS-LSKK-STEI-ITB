<?php
session_start();	
include 'koneksi/session.php';
require '../include/koneksi.php';

$action = $_GET['action'];

#baca variabel URL (if register global on)
$modul = $_GET['modul'];

echo $modul;

//Untuk menghapus tugas yang telah ada 
switch($action) {
	case "change_password":
		$nip = $_POST['nip'];
		$change_password = $_POST['change_password'];
		$confirm_password = $_POST['confirm_password'];
		
		if($change_password != $confirm_password){
			echo"<script>
			alert('Password Anda tidak sama, $change_password = $confirm_password, silahkan ulang kembali');
			setTimeout(function(){
				document.location.href='index.html';
			}, 1000);
			</script>";
		}else{
			$password = md5($change_password);
			$query="UPDATE tb_staf set password='$password' where nip_staf ='$nip'";
			$result=mysql_query($query);
			//var_dump($query);
			echo"<script>
			alert('Password Anda berhasil diganti');
			setTimeout(function(){
				document.location.href='index.html';
			}, 1000);
			</script>";
		}
	break;
	
}

?>