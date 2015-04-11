<?php
	//Connection
	include "../../include/connect.php";
	require_once('../../PHPMailer/class.phpmailer.php');

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

	$nama_user = $_POST['nama_user'];
	$id_pengenal = $_POST['id_pengenal'];
	$hp = $_POST['hp'];
	$email=$_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password1 = $_POST['password'];
	$konfirmasi_password= $_POST['konfirmasi_password'];
	$level = $_POST['level'];
	
	//Lokasi folder produk
	$target = "../../tatausaha/user/foto_user/"; 
	$target = $target . basename( $_FILES['foto']['name']); 

	// membaca nama file
	$foto = $_FILES['foto']['name'];
	
	// memindahkan foto ke folder foto_mahasiswa   
	move_uploaded_file($_FILES['foto']['tmp_name'], $target);

	// membaca nama file temporary
	$tmpName  = $_FILES['foto']['tmp_name'];
	 
	// membaca size file
	$fileSize = $_FILES['foto']['size'];
	 
	// membaca tipe file
	$fileType = $_FILES['foto']['type'];

	$valid_mail = "^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$";
	if(!empty($id_pengenal) && !empty($nama_user) && !empty($hp) && !empty($username) && !empty($email) && !empty($password) && !empty($konfirmasi_password))

		if (empty($_POST[id_pengenal]) || empty($_POST[nama_user]) || empty($_POST[hp]) || empty($_POST[email]))
		{
		 	echo "<script>
					alert('Data yang anda isikan tidak lengkap');
				setTimeout(function() {
						document.location.href='index.html';
				}, 1000);
				</script>";
		 	return;
		}
		else
		{
			if($password != $konfirmasi_password)
			{
				echo "<script>
					alert('Password yang Anda masukkan tidak sama');
				setTimeout(function() {
						document.location.href='index.html';
				}, 1000);
				</script>";
				return;
			}else 
			{
				if (!eregi($valid_mail, $email))
				{
					echo "<script>
							alert('Penulisan email anda salah : $email');
						setTimeout(function() {
								document.location.href='index.html';
						}, 1000);
						</script>";
				}else
				{
					$query="select * from tb_user where id_pengenal='$id_pengenal'";
						//echo $query;
						$result = $mysqli->query($query);
						$row = $result->fetch_array();
						if($row['id_pengenal'])
						{
							echo "<script>
								alert('Maaf Id Pengenal : $id_pengenal, sudah terdaftar');
							setTimeout(function() {
									document.location.href='index.html';
							}, 1000);
							</script>";
							return;	
						}else
						{
							$query="select * from tb_mahasiswa where email='$email'";
								//echo $query;
								$result = $mysqli->query($query);
								$row = $result->fetch_array();
								if($row['email'])
								{
									echo "<script>
										alert('Maaf email : $email, sudah terdaftar');
									setTimeout(function() {
											document.location.href='index.html';
									}, 1000);
									</script>";
								}else
								{
									$query="select * from tb_mahasiswa where username='$username'";
									//echo $query;
									$result = $mysqli->query($query);
									$row = $result->fetch_array();
									if($row['username'])
									{
										echo "<script>
											alert('Maaf username : $username, sudah terdaftar');
										setTimeout(function() {
												document.location.href='index.html';
										}, 1000);
										</script>";
									}else
									{
									$query="select * from tb_dosen where username='$username'";
									//echo $query;
									$result = $mysqli->query($query);
									$row = $result->fetch_array();
									if($row['username'])
									{
										echo "<script>
											alert('Maaf username : $username, sudah terdaftar');
										setTimeout(function() {
												document.location.href='index.html';
										}, 1000);
										</script>";
									}else
									{
									$query="select * from tb_dosen where email='$email'";
									//echo $query;
									$result = $mysqli->query($query);
									$row = $result->fetch_array();
									if($row['email'])
									{
										echo "<script>
											alert('Maaf email : $email, sudah terdaftar');
										setTimeout(function() {
												document.location.href='index.html';
										}, 1000);
										</script>";
									}else
									{
									$query="select * from tb_user where username='$username'";
									//echo $query;
									$result = $mysqli->query($query);
									$row = $result->fetch_array();
									if($row['username'])
									{
										echo "<script>
											alert('Maaf username : $username, sudah terdaftar');
										setTimeout(function() {
												document.location.href='index.html';
										}, 1000);
										</script>";
									}else
									{
									$query="select * from tb_user where email='$email'";
									//echo $query;
									$result = $mysqli->query($query);
									$row = $result->fetch_array();
									if($row['email'])
									{
										echo "<script>
											alert('Maaf email : $email, sudah terdaftar');
										setTimeout(function() {
												document.location.href='index.html';
										}, 1000);
										</script>";
									}else
										{
										$password = md5($password);
										//Simpan data Dosen ke dalam database 
										$query="INSERT INTO tb_user (
											id, 
											id_pengenal, 
											nama_user, 
											hp, 
											username,
											email,
											password, 
											foto,
											level,
											status,
											tgl_daftar
											) 
											VALUES ( NULL, '$id_pengenal', '$nama_user', '$hp', '$username', '$email', '$password', '$foto','$level', 'nonaktif', NOW())";
										$result = $mysqli->query($query);
										//var_dump($query);
										include "../../include/koneksi.php";
										//Pengiriman SMS Pemberitahuan Pendaftaran
										$query1="INSERT INTO outbox (
											DestinationNumber, 
											TextDecoded
											) 
											VALUES ('$hp','Pendaftaran Anda berhasil, Username: $username, Password: $password1, Email: $email, tunggu konfirmasi dari Admin | lms.stei.itb@gmail.com')";
										$result = $mysqli->query($query1);

										//Kirim Ke email Dosen dan Admin
										$mail->From       = "lms.stei.itb@gmail.com";
										$mail->FromName   = "Admin LMS LSKK STEI ITB";
										$mail->AddAddress("$email","$nama_dosen");
										$mail->AddCC("lms.stei.itb@gmail.com");
										$mail->Subject = "Pendaftaran Laboratorium Dasar Teknik Elektro ITB";
										$mail->MsgHTML("Terima kasih telah mendaftar sebagai Dosen <br/><br/>
										
										Berikut ini data akun Anda <br/>
										NIM : $nim <br/>
										Nama : $nama_dosen  <br/>
										Username : $username <br/>
										Password : $password1 <br/>
										Email : $email <br/>
										No Hp : $hp <br/><br/>
										
										Silahkan tunggu konfirmasi 1x24 jam dari Admin melalui SMS dan Email Anda<br/>
										Email ini dikirim oleh sistem. Tidak perlu di-reply. ");
										$mail->IsHTML(true);
										$mail->Send();

										if($result == 1)
										{
											echo "<script>
												alert('Selamat Anda berhasil mendaftar sebagai Dosen atas nama : $nama_dosen | Silakan tunggu konfirmasi dari admin melalui Email dan SMS Anda | Terima Kasih');
											setTimeout(function() {
													document.location.href='../index.php';
											}, 1000);
											</script>";
										}
										else
										{
											echo "<script>
												alert('Pendaftaran Gagal');
											setTimeout(function() {
													document.location.href='index.html';
											}, 1000);
											</script>";
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}
?>