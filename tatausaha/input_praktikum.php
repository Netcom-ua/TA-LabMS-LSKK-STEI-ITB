<?php 
//Connection
include "../include/connect.php";

htmlentities($kd_mk = $_POST['kd_mk']);
htmlentities($nama_mk = $_POST['nama_mk']);
htmlentities($deskripsi = $_POST['deskripsi']);
htmlentities($semester = $_POST['semester']);
htmlentities($akademik = $_POST['akademik']);
htmlentities($nip_dosen=$_POST['nip_dosen']);

$query="select * from tb_matakuliah where kd_mk='$kd_mk'";
	//echo $query;
	$result = $mysqli->query($query);
	$row = $result->fetch_array();					
	if($row['kd_mk'])
	{
		echo "<script>
			alert('Maaf Kode Praktikum: $kd_mk, sudah terdaftar');
		setTimeout(function() {
				document.location.href='praktikum.html';
		}, 1000);
		</script>";
	return;	
	}
	else {
		if (empty($_POST[kd_mk]) || empty($_POST[nama_mk]) || empty($_POST[deskripsi]) || empty($_POST[semester]) || empty($_POST[akademik]) || empty($_POST[nip_dosen])){
			echo "<script>
					alert('Data yang anda isikan tidak lengkap');
				setTimeout(function() {
						document.location.href='praktikum.html';
				}, 1000);
				</script>";
			return;
		} 
		else{
			$query="INSERT INTO tb_matakuliah (
				id, 
				kd_mk, 
				nama_mk,
				deskripsi,
				semester,
				akademik,
				nip_dosen,
				tgl_daftar
				) 
				VALUES ( NULL, '$kd_mk', '$nama_mk', '$deskripsi', '$semester', '$akademik', '$nip_dosen', NOW())";
			$result = $mysqli->query($query);
			/* echo $query; */
		
			if($result == 1)
				{
					echo "<script>
						alert('Daftar Praktikum $kd_mk $nama_mk Berhasil ditambahkan');
					setTimeout(function() {
							document.location.href='praktikum.html';
					}, 1000);
					</script>";
				}
				else {
					echo "<script>
						alert('Input Praktikum Gagal');
					setTimeout(function() {
							document.location.href='praktikum.html';
					}, 1000);
					</script>";
				}
		}
	}
?>