<?php
	session_start();
	include 'include/koneksi.php';
	require_once('PHPMailer/class.phpmailer.php');

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
	
	
	//NoHp yang diinputkan
	$nohp=$_POST['nohp'];
	$username=$_POST['username'];
	
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
	
	//Mengambil Waktu Komputer
	$tanggal = gmdate("Y-m-d H:i:s", time()+60*60*7);; 
	//echo $tanggal;

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//Removes any  special characters from the input
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	
	if (empty($_POST[username]) || empty($_POST[password])){
		 	echo "<script>
					alert('Username dan Password Tidak Boleh Kosong');
				setTimeout(function() {
						document.location.href='../login/labms';
				}, 1000);
				</script>";
		 	return;
		}
	
	if(!empty($username) && !empty($password))
	{
		$password = md5($password);
		//Kueri untuk mahasiswa
		$query = "Select * from tb_mahasiswa where username = '$username' and password= '$password'";
		$result = $mysqli->query($query);
		$row = $result->fetch_array();
	
		//Kueri untuk dosen
		$query1 = "Select * from tb_dosen where username = '$username' and password= '$password'";
		$result = $mysqli->query($query1);
		$row1 = $result->fetch_array();
		
		//Kueri untuk staf
		$query2 = "Select * from tb_staf where username = '$username' and password= '$password'";
		$result = $mysqli->query($query2);
		$row2 = $result->fetch_array();
		
		//Kueri untuk user
		$query3 = "Select * from tb_user where username = '$username' and password= '$password'";
		$result = $mysqli->query($query3);
		$row3 = $result->fetch_array();
		
		//Cek status mahasiswa
		if(($row['status']==aktif) && ($row['verifikasi']==nonaktif))
		{
			
			$_SESSION['nim'] = $row['nim'];
			header("location:../mahasiswa");
		}
		else if(($row['status']==aktif) && ($row['verifikasi']==aktif))
		{
			//Update tb_kode_verifikasi verifikasi
			$query="UPDATE `tb_kode_verifikasi` SET `kode` = '$kode',`update` = '$tanggal' WHERE username ='$username'";
			$result = $mysqli->query($query);
			//echo $query;
			
			$query3 ="select * from tb_mahasiswa where username='$username'";
			$result = $mysqli->query($query3);
			$data = $result->fetch_array();
			$nohp = $data['hp'];
			$email = $data['email'];
			$nama = $data['nama_mhs'];
			//echo $nohp;
			
			//Kirim SMS ke No HP
			$query1="INSERT INTO outbox (
						DestinationNumber, 
						TextDecoded
						) 
						VALUES ('$nohp','Silahkan masukkan kode : $kode pada kolom verifikasi untuk login kedalam LabMS. Terima kasih | lms.stei.itb@gmail.com')";
					$result = $mysqli->query($query1);
					
			//Kirim Ke email Mahasiswa dan Admin
			$mail->From       = "lms.stei.itb@gmail.com";
			$mail->FromName   = "Admin LMS LSKK STEI ITB";
			$mail->AddAddress("$email","$nama");
			$mail->AddCC("lms.stei.itb@gmail.com");
			$mail->Subject = "Kode Verifikasi login";
			$mail->MsgHTML("Halo : $nama <br/><br/>
			
			Berikut ini kode login untuk masuk ke LabMS <br/>
			Kode : $kode <br/><br/>
			
			Kode login ini hanya digunakan untuk sekali<br/>
			Email ini dikirim oleh sistem. Tidak perlu di-reply. ");
			$mail->IsHTML(true);
			$mail->Send();

			
			$_SESSION['nim'] = $row['nim'];
			$_SESSION['username'] = $row['username'];
			header("location:../verifikasi");
			//header("location:../mahasiswa");
		}
		
		else if($row['status']==aktif)
		{
			
			$_SESSION['nim'] = $row['nim'];
			header("location:../mahasiswa");
		}
		
		else if ($row['status']==nonaktif)
		{
			echo "<script>
				alert('Maaf anda belum dikonfirmasi oleh admin');
			setTimeout(function() {
					document.location.href='../login/labms';
			}, 1000);
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
						// VALUES ('$nohp','Silahkan ../login/labmskan kode $kode pada kolom verifikasi untuk ../login/labms kedalam LMS. Terima kasih | lms.stei.itb@gmail.com')";
			// $result = $mysqli->query($query1);
					
			$_SESSION['nid'] = $row1['nid'];
			header("location:../dosen");
		}
		
		else if ($row1['status']==nonaktif)
		{
			echo "<script>
				alert('Maaf anda belum dikonfirmasi oleh admin');
			setTimeout(function() {
					document.location.href='../login/labms';
			}, 1000);
			</script>";
		}
		
		//Cek status staf jabatan Tata Usaha
		else if(($row2['status']==aktif) && ($row2['jabatan']==tu))
		{
			$_SESSION['jabatan'] = $row2['jabatan'];
			header("location:../tatausaha");
		}
		//Cek status staf jabatan Teknisi
		else if(($row2['status']==aktif) && ($row2['jabatan']==teknisi))
		{
			$_SESSION['nip_staf'] = $row2['nip_staf'];
			header("location:../teknisi");
		}
		else if ($row2['status']==nonaktif)
		{
			echo "<script>
				alert('Maaf anda belum dikonfirmasi oleh admin');
			setTimeout(function() {
					document.location.href='../login/labms';
			}, 1000);
			</script>";
		}
		
		//Cek status user
		else if(($row3['status']==aktif) && ($row3['level']==kordas))
		{
			//$_SESSION['nama_user'] = $row3['nama_user'];
			$_SESSION['username'] = $row3['username'];
			header("location:../kordas");
		}
		
		else if(($row3['status']==aktif) && ($row3['level']==asisten))
		{
			$_SESSION['id_pengenal'] = $row3['id_pengenal'];
			header("location:../asisten");
		}
		
		else if(($row3['status']==aktif) && ($row3['level']==kalab))
		{
			$_SESSION['email'] = $row3['email'];
			header("location:../kalab");
		}
		
		else if(($row3['status']==aktif) && ($row3['level']==admin))
		{
			
			$_SESSION['level'] = $row3['level'];
			header("location:../admin");
		}
		
		else if ($row3['status']==nonaktif)
		{
			echo "<script>
				alert('Maaf Anda belum dikonfirmasi oleh Admin');
			setTimeout(function() {
					document.location.href='../login/labms';
			}, 1000);
			</script>";
		}
		
		//Login salah
		else 	
		{ 
			echo "<script>
				alert('Maaf Username dan Password Anda salah');
			setTimeout(function() {
					document.location.href='../login/labms';
			}, 1000);
			</script>";
		}
		
	}
	