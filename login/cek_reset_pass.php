<?php
	session_start();
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
	
	//Acak kode verifikasi
	function acak($panjang)
	{
	    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $string = '';
	    for ($i = 0; $i < $panjang; $i++) {
	        $pos = rand(0, strlen($karakter)-1);
	        $string .= $karakter{$pos};
	    }
	    return $string;
	}
	$kd = acak(6);
	$kd_send= $kd; 
	$kode = $kd_send;
	//echo $kode; 
	//Mengambil Waktu Komputer
	//$tanggal = gmdate("Y-m-d H:i:s", time()+60*60*7);; 
	//echo $tanggal;
	
	$valid_mail = "^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$";

	$email = $_POST['email'];
	
	if (empty($_POST[email])){
		 	echo "<script>
					alert('Email tidak boleh kosong');
				setTimeout(function() {	document.location.href='../lupa_password/labms';
				}, 3000);
				</script>";
		 	return;
		}
	if (!eregi($valid_mail, $email))
				{
					echo "<script>
							alert('Penulisan email: $email, Anda salah');
						setTimeout(function() {	document.location.href='../lupa_password/labms';
						}, 3000);
						</script>";
				}else
	
	if(!empty($email))
	{
		//Kueri untuk mahasiswa
		$query = "Select * from tb_mahasiswa where email= '$email' or username='$email'";
		$result = $mysqli->query($query);
		$row = $result->fetch_array();
	
		//Kueri untuk dosen
		$query1 = "Select * from tb_dosen where email= '$email'";
		$result = $mysqli->query($query1);
		$row1 = $result->fetch_array();
		
		//Kueri untuk staf
		$query2 = "Select * from tb_staf where email= '$email'";
		$result = $mysqli->query($query2);
		$row2 = $result->fetch_array();
		
		//Kueri untuk user
		$query3 = "Select * from tb_user where email= '$email'";
		$result = $mysqli->query($query3);
		$row3 = $result->fetch_array();
		
		//Cek status mahasiswa
		if($row['status']==aktif)
		{
			$_SESSION['email'] = $row['email'];
			//$kode = md5($kode);
			$query="UPDATE `tb_mahasiswa` SET `password` =  MD5('$kode') WHERE email='$email'";
			$result = $mysqli->query($query);
			//echo $query;
			//header("location:verifikasi");
			echo "<script>
				alert('Password telah dirubah silahkan cek pesan SMS dan email Anda');
			setTimeout(function() {
					document.location.href='../login/labms';
			}, 3000);
			</script>";
			//Pengiriman email kode verifikasi login kepada Mahasiswa
			$mail->From       = "lms.stei.itb@gmail.com";
			$mail->FromName   = "Admin LMS LSKK STEI ITB";
			$mail->AddAddress("$email","$username");
			$mail->Subject = "Reset Password Laboratorium Dasar Teknik Elektro ITB";
			$mail->MsgHTML("Password Anda telah dirubah, <br/>
			Password baru : <b>$kode</b> <br/>
			<br/><br/>
			Terima Kasih </br>
			By : Admin LMS STEI ITB, lms.stei.itb@gmail.com<br/>
			Pesan ini kirim oleh sistem secara otomatis, tidak perlu di-<i>replay</i>");
			$mail->IsHTML(true);
			$mail->Send();
		}
		else if ($row['status']==nonaktif)
		{
			echo "<script>
				alert('Maaf anda belum dikonfirmasi oleh admin');
			setTimeout(function() {
					document.location.href='../login/labms';
			}, 3000);
			</script>";
		}
		
		//Cek status dosen
		else if($row1['status']==aktif)
		{
			//Update kode verifikasi
			// $query="UPDATE `db_lms`.`kode` SET `kode` = '$kode' WHERE `kode`.`id` =1 LIMIT 1 ;";
			// $result = $mysqli->query($query);
			//Kirim SMS ke No HP
			// $query1="INSERT INTO outbox (
						// DestinationNumber, 
						// TextDecoded
						// ) 
						// VALUES ('$nohp','Silahkan masukkan kode $kode pada kolom verifikasi untuk masuk kedalam LMS. Terima kasih | lms.stei.itb@gmail.com')";
			// $result = $mysqli->query($query1);
					
			$_SESSION['nid'] = $row1['nid'];
			header("location:dosen");
		}
		
		else if ($row1['status']==nonaktif)
		{
			echo "<script>
				alert('Maaf anda belum dikonfirmasi oleh admin');
			setTimeout(function() {
					document.location.href='masuk';
			}, 3000);
			</script>";
		}
		
		//Cek status staf jabatan Tata Usaha
		else if(($row2['status']==aktif) && ($row2['jabatan']==tu))
		{
			$_SESSION['jabatan'] = $row2['jabatan'];
			header("location:tatausaha");
		}
		//Cek status staf jabatan Teknisi
		else if(($row2['status']==aktif) && ($row2['jabatan']==teknisi))
		{
			$_SESSION['nip_staf'] = $row2['nip_staf'];
			header("location:teknisi");
		}
		else if ($row2['status']==nonaktif)
		{
			echo "<script>
				alert('Maaf anda belum dikonfirmasi oleh admin');
			setTimeout(function() {
					document.location.href='masuk';
			}, 3000);
			</script>";
		}
		
		//Cek status user
		else if(($row3['status']==aktif) && ($row3['level']==kordas))
		{
			$_SESSION['tgl_daftar'] = $row3['tgl_daftar'];
			header("location:kordas");
		}
		
		else if(($row3['status']==aktif) && ($row3['level']==asisten))
		{
			$_SESSION['id_pengenal'] = $row3['id_pengenal'];
			header("location:asisten");
		}
		
		else if(($row3['status']==aktif) && ($row3['level']==kalab))
		{
			$_SESSION['email'] = $row3['email'];
			header("location:kalab");
		}
		
		else if(($row3['status']==aktif) && ($row3['level']==admin))
		{
			
			$_SESSION['level'] = $row3['level'];
			header("location:admin");
		}
		
		else if ($row3['status']==nonaktif)
		{
			echo "<script>
				alert('Maaf Anda belum dikonfirmasi oleh Admin');
			setTimeout(function() {
					document.location.href='../login/labms';
			}, 3000);
			</script>";
		}
		
		//Login salah
		else 	
		{ 
			echo "<script>
				alert('Maaf email belum terdaftar');
			setTimeout(function() {	document.location.href='../lupa_password/labms';
			}, 3000);
			</script>";
		}
		
	}
	