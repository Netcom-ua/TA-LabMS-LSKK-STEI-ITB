<?php

include('../include/koneksi.php');

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

//tangkap data dari form registrasi
$No			= $_POST['id_pinj'];
$Status 	= $_POST['status'];
$Kode_Alat 	= $_POST['kode_alat'];
$Stok='Tersedia';
$tolak = 'Belum Disetujui';

//Cek user
$query=mysql_query("select * from tb_mahasiswa where username='$username'");
	$row=mysql_fetch_array($query);
	$hp = $row['hp'];
	$email = $row['email'];
	$nm_mhs = $row['nama_mhs']

$update=mysql_query("UPDATE tb_pinjam_atk SET status='{$Status}',stok='{$Stok}' where id_pinjam_atk='{$No}'");

if($Status == $tolak){
//Pengiriman SMS konfirmasi belum disetujui peminjam kepada user
$query1="INSERT INTO outbox (
		DestinationNumber, 
		TextDecoded
		) 
		VALUES ('$hp', 'Halo $nm_mhs, mohon maaf barang ATK yang Anda pinjam $Status, silahkan pinjam di waktu yang lain | Teknisi LabMS STEI ITB | lms.stei.itb@gmail.com')";
		$result = mysql_query($query1);

		//Pengiriman email konfirmasi peminjam kepada user
		$mail->From       = "lms.stei.itb@gmail.com";
		$mail->FromName   = "Admin LMS LSKK STEI ITB";
		$mail->AddAddress("$email","$username");
		$mail->Subject = "Konfirmasi Peminjaman Barang ATK";
		$mail->MsgHTML("Halo $nm_mhs, mohon maaf barang yang Anda pinjam $Status, silahkan pinjam di waktu yang lain <br/><br/><br/>
		Terima Kasih </br>
		By : Teknisi LabMS STEI ITB, lms.stei.itb@gmail.com");
		$mail->IsHTML(true);
		$mail->Send();
}else{
//Pengiriman SMS konfirmasi barang yang telah disetujui kepada user
$query1="INSERT INTO outbox (
		DestinationNumber, 
		TextDecoded
		) 
		VALUES ('$hp', 'Barang ATK yang telah Anda pinjam telah $Status, silahkan mengambil barang di Laboratorium | Teknisi LabMS STEI ITB | lms.stei.itb@gmail.com')";
		$result = mysql_query($query1);

		//Pengiriman email konfirmasi barang yang telah disetujui kepada user
		$mail->From       = "lms.stei.itb@gmail.com";
		$mail->FromName   = "Admin LMS LSKK STEI ITB";
		$mail->AddAddress("$email","$username");
		$mail->Subject = "Konfirmasi Peminjaman Barang ATK";
		$mail->MsgHTML("Halo $nm_mhs,barang yang telah Anda pinjam telah $Status, silahkan mengambil barang di Laboratorium<br/><br/><br/>
		Terima Kasih </br>
		By : Teknisi LabMS STEI ITB, lms.stei.itb@gmail.com");
		$mail->IsHTML(true);
		$mail->Send();
	
}
print '<script>alert ("Ubah status peminjam berhasil.."); window.location.href = "tampil_peminjam.php";</script>';

?>
