<?php 
	include '../include/koneksi.php';
	
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
	
	$Username			= $_POST ['username'];
	$Nama				= $_POST ['nama_peminjam'];
	$Email 				= $_POST ['email'];
	$Kode_Alat 			= $_POST ['kode_alat'];
	$Nama_Alat 			= $_POST ['nama_alat'];
	$Tgl_Pinjam 		= $_POST ['tgl_pinjam'];
	$Tgl_Kembali		= $_POST ['tgl_kembali'];
	$Status				= 'Belum Disetujui';
	$Stok				= 'Tersedia';
	$Penanggung_Jawab 	= $_POST ['penanggung_jawab'];
	
	mysql_query("insert into tb_pinjam_atk values('','$Nama','$Username','$Email','$Kode_Alat','$Nama_Alat','$Tgl_Pinjam','$Tgl_Kembali','$Status','$Stok','$Penanggung_Jawab')");
	
	mysql_query("update tb_atk set stok='Tidak Tersedia' where kode_alat='".$Kode_Alat."' ");
	
	//Cek Teknisi
	$query=mysql_query("select * from tb_staf");
	while($row=mysql_fetch_array($query)){
	$hp = $row['hp'];
	$email_teknisi = $row['email'];
	$nama = $row['nama_staf'];
	$jabatan = $row['jabatan'];
	$cek ='teknisi';
	
		if($jabatan==$cek){
	
			//Pengiriman SMS konfirmasi peminjaman barang ATK teknisi
			$query1="INSERT INTO outbox (
				DestinationNumber, 
				TextDecoded
				) 
				VALUES ('$hp', 'Halo $nama, $Username melakukan peminjaman barang ATK: $Nama_Alat pada $Tgl_Pinjam | Admin LabMS STEI ITB | lms.stei.itb@gmail.com')";
				$result = mysql_query($query1);

			//Pengiriman email konfirmasi peminjaman barang kepada teknisi
			$mail->From       = "lms.stei.itb@gmail.com";
			$mail->FromName   = "Admin LMS LSKK STEI ITB";
			$mail->AddAddress("$email_teknisi","$nama");
			$mail->Subject = "Konfirmasi Peminjaman Barang ATK";
			$mail->MsgHTML("Halo $nama, $Username melakukan peminjaman barang ATK: $Nama_Alat pada $Tgl_Pinjam, silahkan lakukan konfirmasi<br/><br/><br/>
			Terima Kasih </br>
			By : Admin LabMS STEI ITB, lms.stei.itb@gmail.com");
			$mail->IsHTML(true);
			$mail->Send();
		}
	}

	print '<script>alert ("Anda Telah Berhasil Meminjam Barang"); window.location.href = "tampil_atk.php";</script>';
	
	?>