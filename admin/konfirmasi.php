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
	case "konfmhs" :
		// Update status Mahasiswa
		$nim = $_GET['nim'];
		$nim = str_replace('/','',str_replace('\\','',$nim)); 
		$hp = $_GET['hp'];
		$email = $_GET['email'];
		$nama_mhs = $_GET['nama_mhs'];
		$query  = "update tb_mahasiswa set status='aktif' WHERE nim='{$_GET['nim']}'";
		$result = mysql_query($query);
		
		//Pengiriman SMS konfirmasi pendaftaran kepada Mahasiswa
		$query1="INSERT INTO outbox (
				DestinationNumber, 
				TextDecoded
				) 
				VALUES ('$hp', 'Pendaftaran Anda sebagai Mahasiswa sudah dikonfirmasi, silahkan login menggunakan Username dan Password Anda | Admin LMS STEI ITB | lms.stei.itb@gmail.com')";
		$result = mysql_query($query1);
		
		//Pengiriman email konfirmasi pendaftaran kepada Mahasiswa
		$mail->From       = "lms.stei.itb@gmail.com";
		$mail->FromName   = "Admin LMS LSKK STEI ITB";
		$mail->AddAddress("$email","$nama");
		$mail->Subject = "Pendaftaran Laboratorium Dasar Teknik Elektro ITB";
		$mail->MsgHTML("Pendaftaran Anda sebagai Mahasiswa sudah dikonfirmasi, <br/>
		silahkan login menggunakan Username dan Password Anda <br/>
		Link login LMS : http://labms.lskk.ee.itb.ac.id/login/labms<br/><br/><br/>
		Terima Kasih </br>
		By : Admin LMS STEI ITB, lms.stei.itb@gmail.com");
		$mail->IsHTML(true);
		$mail->Send();
		
		// redirect ke halaman inbox
		header("location:index.html");
	break;
	case "aktifmhs":
	$nim = $_GET['nim'];
		$nim = str_replace('/','',str_replace('\\','',$nim)); 
		$hp = $_GET['hp'];
		$email = $_GET['email'];
		$nama_mhs = $_GET['nama_mhs'];
		$query  = "update tb_mahasiswa set status='aktif' WHERE nim='{$_GET['nim']}'";
		$result = mysql_query($query);
	// redirect ke halaman inbox
	header("location:mahasiswa.html");
	break;
	case "nonaktifmhs":
	$nim = $_GET['nim'];
		$nim = str_replace('/','',str_replace('\\','',$nim)); 
		$hp = $_GET['hp'];
		$email = $_GET['email'];
		$nama_mhs = $_GET['nama_mhs'];
		$query  = "update tb_mahasiswa set status='nonaktif' WHERE nim='{$_GET['nim']}'";
		$result = mysql_query($query);
	// redirect ke halaman inbox
	header("location:mahasiswa.html");
	break;
	case "delmhs" :
		$nim = $_GET['nim'];
		$nim = str_replace('/','',str_replace('\\','',$nim)); 
		// Hapus data Mahasiswa
		$query  = "DELETE FROM tb_mahasiswa WHERE nim='{$_GET['nim']}'";
		$result = mysql_query($query);
		// redirect ke halaman inbox
		header("location:index.php");
	break;
	case "konfdsn" :
		$nid = $_GET['nid'];
		$nid = str_replace('/','',str_replace('\\','',$nid)); 
		$email = $_GET['email'];
		$nama_dosen = $_GET['nama_dosen'];
		$hp = $_GET['hp'];
		
		// Update status Dosen
		$query  = "update tb_dosen set status='aktif' WHERE nid='{$_GET['nid']}'";
		$result = mysql_query($query);
		
		//Pengiriman SMS konfirmasi pendaftaran kepada Dosen
		$query1="INSERT INTO outbox (
				DestinationNumber, 
				TextDecoded
				) 
				VALUES ('$hp', 'Pendaftaran Anda sebagai Dosen sudah dikonfirmasi, silahkan login menggunakan Username dan Password Anda | Admin LMS STEI ITB | lms.stei.itb@gmail.com')";
		$result = mysql_query($query1);
		
		//Pengiriman email konfirmasi pendaftaran kepada Dosen
		$mail->From       = "lms.stei.itb@gmail.com";
		$mail->FromName   = "Admin LMS LSKK STEI ITB";
		$mail->AddAddress("$email","$nama");
		// $mail->AddCC("lms.stei.itb@gmail.com");
		$mail->Subject = "Pendaftaran Laboratorium Dasar Teknik Elektro ITB";
		$mail->MsgHTML("Pendaftaran Anda sebagai Dosen sudah dikonfirmasi, <br/>
		silahkan login menggunakan Username dan Password Anda <br/>
		Link login LMS : http://labms.lskk.ee.itb.ac.id/login/labms<br/><br/><br/>
		Terima Kasih </br>
		By : Admin LMS STEI ITB, lms.stei.itb@gmail.com");
		$mail->IsHTML(true);
		$mail->Send();
		
		// redirect ke halaman sentitems
		header("location:index.php");
	break;
	case "deldsn" :
		$nip = $_GET['nip'];
		$nip = str_replace('/','',str_replace('\\','',$nip));
		// Hapus data Dosen
		$query  = "DELETE FROM tb_dosen WHERE nip='{$_GET['nip']}'";
		$result = mysql_query($query);
		// redirect ke halaman inbox
		header("location:index.php");
	break;
	case "konfuser" :
		$id_pengenal = $_GET['id_pengenal'];
		$id_pengenal= str_replace('/','',str_replace('\\','',$id_pengenal));
		$hp = $_GET['hp'];
		$level = $_GET['level'];
		$nama_user = $_GET['nama_user'];
		$email = $_GET['email'];
		// Update status User
		$query  = "update tb_user set status='aktif' WHERE id_pengenal='{$_GET['id_pengenal']}'";
		$result = mysql_query($query);
		$query2="INSERT INTO outbox (
				DestinationNumber, 
				TextDecoded
				) 
				VALUES ('$hp', 'Pendaftaran Anda sebagai $level sudah dikonfirmasi, silahkan login menggukanan Username dan Password Anda | Admin LMS STEI ITB | sisfolab.lskk.ee.itb.ac.id | email : lms.stei.itb@gmail.com')";
		$result = mysql_query($query1);
		
		//Kirim Ke email Dosen
		$mail->From       = "lms.stei.itb@gmail.com";
		$mail->FromName   = "Admin LMS LSKK STEI ITB";
		$mail->AddAddress("$email","$nama_user");
		// $mail->AddCC("lms.stei.itb@gmail.com");
		$mail->Subject = "Pendaftaran Laboratorium Dasar Teknik Elektro ITB";
		$mail->MsgHTML("Pendaftaran Anda sebagai Dosen sudah dikonfirmasi, <br/>
		silahkan login menggunakan Username dan Password Anda <br/>
		Link login LMS : http://labms.lskk.ee.itb.ac.id/login/labms<br/><br/><br/>
		Terima Kasih </br>
		By : Admin LMS STEI ITB, lms.stei.itb@gmail.com");
		$mail->IsHTML(true);
		$mail->Send();
		
		// redirect ke halaman sentitems
		header("location:index.php");
	break;
	case "deluser" :
		$id_pengenal = $_GET['id_pengenal'];
		$id_pengenal= str_replace('/','',str_replace('\\','',$id_pengenal));
		// Hapus data Dosen
		$query  = "DELETE FROM tb_user WHERE id_pengenal='{$_GET['id_pengenal']}'";
		$result = mysql_query($query);
		// redirect ke halaman inbox
		header("location:index.php");
	break;
	case "konfstaf" :
		$nip_staf = $_GET['nip_staf'];
		$nip_staf= str_replace('/','',str_replace('\\','',$nip_staf));
		$hp = $_GET['hp'];
		$jabatan = $_GET['jabatan'];
		$nama_staf = $_GET['nama_staf'];
		$email = $_GET['email'];
		// Update status User
		$query  = "update tb_staf set status='aktif' WHERE nip_staf='{$_GET['nip_staf']}'";
		$result = mysql_query($query);
		$query2="INSERT INTO outbox (
				DestinationNumber, 
				TextDecoded
				) 
				VALUES ('$hp', 'Pendaftaran Anda sebagai $jabatan sudah dikonfirmasi, silahkan login menggukanan Username dan Password Anda | Admin LMS STEI ITB | sisfolab.lskk.ee.itb.ac.id | email : lms.stei.itb@gmail.com')";
		$result = mysql_query($query1);
		
		//Kirim Ke email Dosen
		$mail->From       = "lms.stei.itb@gmail.com";
		$mail->FromName   = "Admin LMS LSKK STEI ITB";
		$mail->AddAddress("$email","$nama_staf");
		// $mail->AddCC("lms.stei.itb@gmail.com");
		$mail->Subject = "Pendaftaran Laboratorium Dasar Teknik Elektro ITB";
		$mail->MsgHTML("Pendaftaran Anda sebagai Staf sudah dikonfirmasi, <br/>
		silahkan login menggunakan Username dan Password Anda <br/>
		Link login LMS : http://labms.lskk.ee.itb.ac.id/login/labms<br/><br/><br/>
		Terima Kasih </br>
		By : Admin LMS STEI ITB, lms.stei.itb@gmail.com");
		$mail->IsHTML(true);
		$mail->Send();
		
		// redirect ke halaman sentitems
		header("location:index.php");
	break;
	case "delstaf" :
		$nip_staf = $_GET['nip_staf'];
		$nip_staf= str_replace('/','',str_replace('\\','',$nip_staf));
		// Hapus data Dosen
		$query  = "DELETE FROM tb_staf WHERE nip_staf='{$_GET['nip_staf']}'";
		$result = mysql_query($query);
		// redirect ke halaman inbox
		header("location:index.php");
	break;
	
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