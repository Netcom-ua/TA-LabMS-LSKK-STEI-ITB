<?php
session_start();	
include 'koneksi/session.php';
require '../include/koneksi.php';

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

#baca variabel URL (if register global on)
$action = $_GET['action'];
//echo $nama;

//Tukar Jadwal Praktikum
switch($action) {
	case "change_jadwal" :
		$kd_mdl = $_GET['kd_modul'];
		$id = $_POST['id'];
		$id_tukar = $_POST['id_tukar'];
		$asisten = $_POST['asisten'];
		$nim = $_POST['nim'];
		$namafrom = $_POST['namafrom'];
		$emailfrom = $_POST['emailfrom'];
		$nim_mhs = $_POST['nim_mhs'];
		$nama = $_POST['nama'];	
		$email = $_POST['email'];	
		$hp = $_POST['hp'];	
		$tgl = $_POST['tgl'];
		$waktu = $_POST['waktu'];
		$tgl_tujuan = $_POST['tgl_tujuan'];
		$waktu_tujuan = $_POST['waktu_tujuan'];
		$alasan = $_POST['alasan'];
		$kd_modul = $_GET['$kd_modul'];
		$kd_modul= str_replace('/','',str_replace('\\','',$kd_modul));
		
		$data1=mysql_query("select * from  tb_tukar_jadwal where kd_modul='$kd_mdl' and nim='$nim'");
		$row1=mysql_fetch_array($data1);
		
		$cek = $row1['kd_modul'].''.$row1['nim'];

		if(!empty($cek)){
			echo "<script>
			alert('Anda pernah mengirimkan tukar jadwal praktikum yang sama sebelumnya');
			setTimeout(function() {
			document.location.href='jadwal_praktikum_mhs.html';
			}, 500);
			</script>"; 
		} else
		{
			$query  = "INSERT INTO `tb_tukar_jadwal` (
				`id` ,
				`kd_modul` ,
				`id_jadwal` ,
				`nim` ,
				`tanggal` ,
				`waktu` ,
				`id_jadwal_tukar` ,
				`nim_tujuan` ,
				`tanggal_tujuan` ,
				`waktu_tujuan` ,
				`alasan` ,
				`id_asisten` ,
				`status` ,
				`tanggal_tukar`
				)
				VALUES (
				NULL ,  '{$_GET['kd_modul']}', '$id', '$nim',  '$tgl',  '$waktu', '$id_tukar',  '$nim_mhs',  '$tgl_tujuan',  '$waktu_tujuan',  '$alasan', '$asisten','N',NOW()
				)";
			
			$result = mysql_query($query);
			//var_dump($query);
			
			//Pengiriman SMS konfirmasi pertukaran jadwal kepada Mahasiswa
			$query1="INSERT INTO outbox (
					DestinationNumber, 
					TextDecoded
					) 
					VALUES ('$hp', '$namafrom ingin tukar jadwal {$_GET['kd_modul']} dg Anda $tgl_tujuan $waktu, alasan $alasan | LabMS STEI ITB | labms.lskk.ee.itb.ac.id')";
			$result = mysql_query($query1);
			//var_dump($query1);
			
			//Pengiriman email konfirmasi pendaftaran kepada Mahasiswa
			$mail->From       = "lms.stei.itb@gmail.com";
			$mail->FromName   = "$namafrom";
			$mail->AddAddress("$email","$nama");
			$mail->Subject = "Pertukaran Jadwal Praktikum Laboratorium Dasar Teknik Elektro ITB";
			$mail->MsgHTML("$namafrom ingin tukar jadwal praktikum {$_GET['kd_modul']} dg Anda pd tgl $tgl_tujuan $waktu,<br/>
			Alasan: $alasan <br/>
			Silahkan login ke sistem untuk menyetujui<br/>
			Link login LabMS : http://labms.lskk.ee.itb.ac.id/login/labms<br/><br/><br/>
			Pesan ini dikirim secara otomatis oleh sistem LabMS<br/>
			Terima Kasih <br/>
			By : Admin LabMS STEI ITB,<br/>
			Email : lms.stei.itb@gmail.com <br/>
			Website : http://labms.lskk.ee.itb.ac.id");
			$mail->IsHTML(true);
			$mail->Send();
			
			
			echo "<script>
				alert('Pertukaran jadwal praktikum Anda berhasil, silahkan tunggu konfirmasi dari Mahasiswa yang bersangkutan dan Asisten');
			setTimeout(function() { document.location.href='jadwal_praktikum_mhs.html';
			}, 1000);
			</script>";
		}
		break;
		
	case "update_jadwal":
		$kd_mdl = $_GET['kd_modul'];
		$nim = $_GET['nim'];
		$namafrom = $_GET['namafrom'];
		//echo $namafrom;
		$email = $_GET['email'];
		//echo $email;
		$nama = $_GET['nama'];
		$hp = $_GET['hp'];
		//echo $hp;
		$tgl = $_GET['tgl'];
		//echo $tgl;
		
		$query  = "UPDATE `tb_tukar_jadwal` SET  `status` =  'Y' WHERE kd_modul='$kd_mdl' and nim='$nim'";
		
		$result = mysql_query($query);
		//var_dump($query);
		
		//Pengiriman SMS bahwa Anda telah menyetujui pertukaran jadwal Praktikum kepada Mahasiswa
		$query1="INSERT INTO outbox (
				DestinationNumber, 
				TextDecoded
				) 
				VALUES ('$hp', '$namafrom telah menyetujui permintaan jadwal pertukaran praktikum $kd_mdl Anda, tunggu konfirmasi dari Asisten | LabMS STEI ITB | labms.lskk.ee.itb.ac.id')";
		$result = mysql_query($query1);
		//var_dump($query1); 
		
		//Pengiriman Email bahwa Anda telah menyetujui pertukaran jadwal Praktikum kepada Mahasiswa
		$mail->From       = "lms.stei.itb@gmail.com";
		$mail->FromName   = "$namafrom";
		$mail->AddAddress("$email","$nama");
		$mail->Subject = "Konfirmasi Pertukaran Jadwal Praktikum Laboratorium Dasar Teknik Elektro ITB";
		$mail->MsgHTML("$namafrom telah menyetujui pertukaran jadwal Praktikum  $kd_mdl dg Anda pada tanggal $tgl,<br/>
		Silahkan tunggu konfirmasi dari Asisten<br/>
		Link login LabMS : http://labms.lskk.ee.itb.ac.id/login/labms<br/><br/><br/>
		Pesan ini dikirim secara otomatis oleh sistem LabMS<br/>
		Terima Kasih <br/>
		By : Admin LabMS STEI ITB,<br/>
		Email : lms.stei.itb@gmail.com <br/>
		Website : http://labms.lskk.ee.itb.ac.id");
		$mail->IsHTML(true);
		$mail->Send();
			
		echo "<script>
			alert('Anda telah menyetujui pertukaran jadwal dengan : $nim, Silahkan tunggu konfirmasi Asisten');
		setTimeout(function() { 
			document.location.href='index.html';
		}, 1000);
		</script>";
	break;
	
	case "change_password":
		$nim = $_POST['nim'];
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
			$query="UPDATE tb_mahasiswa set password='$password' where nim='$nim'";
			$result=mysql_query($query);
			echo"<script>
			alert('Password Anda berhasil diganti');
			setTimeout(function(){
				document.location.href='index.html';
			}, 1000);
			</script>";
		}
	break;
		
	case "code_login":
		$nim = $_POST['nim'];
		$nonaktif = $_POST['nonaktif'];
		$aktif = $_POST['aktif'];
		
		if($nonaktif == nonaktif){
			$query="UPDATE tb_mahasiswa set verifikasi='$nonaktif' where nim='$nim'";
			$result=mysql_query($query);
			echo"<script>
			alert('Kode verifikasi login Anda berhasil di nonaktifkan');
			setTimeout(function(){
				document.location.href='index.html';
			}, 1000);
			</script>";
		}else{
			$query="UPDATE tb_mahasiswa set verifikasi='$aktif' where nim='$nim'";
			$result=mysql_query($query);
			echo"<script>
			alert('Kode verifkasi login Anda sekarang sudah aktif, setiap Anda login sistem, sistem akan mengirimkan kode login melalui SMS dan email');
			setTimeout(function(){
				document.location.href='index.html';
			}, 1000);
			</script>";
		}
	break;
}
?>