<?php
session_start();
include ("../include/koneksi.php");
include 'koneksi/session.php';

//Pemanggilan PHPMailer
require_once('../PHPMailer/class.phpmailer.php');

$mail  = new PHPMailer();   
$mail->IsSMTP();

//GMAIL configerations
$mail->SMTPAuth   = true;                  
$mail->SMTPSecure = "ssl";                 
$mail->Host       = "smtp.gmail.com";      
$mail->Port       = 465;                   
$mail->Username   = "lms.stei.itb@gmail.com"; 
$mail->Password   = base64_decode("bG1zZHVsdWJybw==");         
//End Gmail

$action = $_GET['action'];
$action = str_replace('/','',str_replace('\\','',$action)); 

switch($action) {
	
	case "change_password":
		$id = $_POST['id'];
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
			$query="UPDATE tb_user set password='$password' where id_pengenal='$id'";
			$result=mysql_query($query);
			echo"<script>
			alert('Password Anda berhasil diganti');
			setTimeout(function(){
				document.location.href='index.html';
			}, 1000);
			</script>";
		}
	break;
	
	case "add_topik":
		$username = $_POST['username'];
		$topik = $_POST['topik'];
		$isi =  $_POST['isi'];
		
		$query ="select * from tb_topik";
		$result = $mysqli->query($query);
		$row = $result->fetch_array();
		$cek = $row['topik'];
		
		if($topik == $cek){
			echo "<script>
					alert('Topik $topik yang Anda masukkan sudah ada');
				setTimeout(function() {
						document.location.href='forum.html';
				}, 1000);
				</script>";
			return;
		}
		
		if(!empty($topik) && !empty($isi))
	
		if(empty($_POST[topik]) || empty($_POST[isi])){
		 	echo "<script>
					alert('Data yang anda isikan tidak lengkap');
				setTimeout(function() {
						document.location.href='forum.html';
				}, 1000);
				</script>";
			return;
		}
		else
			{
				$query="INSERT INTO tb_topik (
					id, 
					username, 
					topik, 
					isi, 
					tanggal
					) 
					VALUES ( NULL, '$username', '$topik', '$isi', NOW())";
				$result = $mysqli->query($query);
				if($result == 1)					
					{
						echo "<script>
							alert('Topik : $topik berhasil dibuat');
						setTimeout(function() {
								document.location.href='forum.html';
						}, 1000);
						</script>";
					}
					else
					{
						echo "<script>
							alert('Topik Gagal dibuat');
						setTimeout(function() {
								document.location.href='forum.html';
						}, 1000);
						</script>";
					}
			}
	break;
			
	case "add_comment":
	
		$id_topik = $_POST['id'];
		$username = $_POST['username'];
		$isi = $_POST['isi'];
		
		if(!empty($isi))
		if(empty($_POST[isi])){
		echo "<script>
				alert('Data yang anda isikan tidak lengkap');
			setTimeout(function() {
					document.location.href='forum.html';
			}, 1000);
			</script>";
		return;
		}
		else{
			$query="INSERT INTO tb_reply (
				id,
				id_topik,  
				username, 
				isi,
				tanggal
				) 
				VALUES ( NULL, '$id_topik', '$username', '$isi', NOW())";
			//var_dump($query);
			$result = $mysqli->query($query);
			if($result == 1)					
			{
				echo "<script>
				alert('Komentar telah ditambahkan');
				setTimeout(function() {
						document.location.href='forum.html';
				}, 1000);
				</script>";
			}
			else
			{
				echo "<script>
					alert('Komentar gagal disimpan');
				setTimeout(function() {
						document.location.href='forum.html';
				}, 1000);
				</script>";
			}
			
			//Update data total balasan ketika komentar baru ditambahkan
			$query_balasan = mysql_query("SELECT id_topik FROM tb_reply WHERE id_topik='$id_topik'");
			$total_balas = mysql_num_rows($query_balasan);
			$total_balasan = $total_balas;
			//var_dump($query_balasan);
			
			$query2 = "UPDATE tb_topik SET total_balasan='$total_balasan' WHERE id='$id_topik'";
			$result = $mysqli->query($query2);
			//var_dump($query2);			
		}
	break;
}	
?>