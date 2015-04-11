<?php
session_start();	
include 'koneksi/session.php';
require '../include/koneksi.php';

$action = $_GET['action'];

#baca variabel URL (if register global on)
$modul = $_GET['modul'];

//Untuk menghapus tugas yang telah ada 
switch($action) {
	case "editpraktikum":
	$kd_modul = $_GET['kd_modul'];
	$kd_modul = str_replace('/','',str_replace('\\','',$kd_modul)); 
	$nm_modul = $_POST['nm_modul'];
	$kd_modul = str_replace('/','',str_replace('\\','',$kd_modul)); 
	$singkatan = $_POST['singkatan'];
	$singkatan = str_replace('/','',str_replace('\\','',$singkatan));
	$deskripsi = $_POST['deskripsi'];
	$deskripsi = str_replace('/','',str_replace('\\','',$deskripsi));
	$nama_kordas = $_POST['nama_kordas'];
	$nama_kordas = str_replace('/','',str_replace('\\','',$nama_kordas));

	$query  = "UPDATE `tb_mdl_praktikum` SET `kd_modul` = '{$_POST['kd_modul']}',
	`nm_modul` = '{$_POST['nm_modul']}',
	`singkatan` = '{$_POST['singkatan']}',
	`deskripsi` = '{$_POST['deskripsi']}',
	`nama_kordas` = '{$_POST['nama_kordas']}'";
	
	$result = mysql_query($query);
	
	//echo $query;
	header("location:modul_praktikum.html?modul=$modul");
	
	break;
	
	case "delpraktikum":
	$kd_modul = $_GET['kd_modul'];
		// query hapus data berdasarkan kd_mk
		$query = "DELETE FROM  tb_mdl_praktikum WHERE kd_modul ='$kd_modul'";
		$hasil = mysql_query($query);
		
	header("location:modul_praktikum.html?modul=$modul");
	break;
		
	case "uptugas" :
		$tgl_praktikum = $_GET['tgl_praktikum'];
		$tgl_praktikum = str_replace('/','',str_replace('\\','',$tgl_praktikum)); 
		$judul_tugas = $_POST['judul_tugas'];
		$judul_tugas = str_replace('/','',str_replace('\\','',$judul_tugas)); 
		$tgl_buka = $_POST['$tgl_buka'];
		$tgl_buka= str_replace('/','',str_replace('\\','',$tgl_buka)); 
		$w_buka = $_POST['$w_buka'];
		$w_buka= str_replace('/','',str_replace('\\','',$w_buka)); 
		$tgl_tutup = $_POST['$tgl_tutup'];
		$tgl_tutup= str_replace('/','',str_replace('\\','',$tgl_tutup)); 
		$w_tutup = $_POST['$w_tutup'];
		$w_tutup= str_replace('/','',str_replace('\\','',$w_tutup));

		$query  = "UPDATE `tb_list_upload_tugas` SET `judul_tugas` = '{$_POST['judul_tugas']}',
		`tgl_buka` = '{$_POST['tgl_buka']}',
		`w_buka` = '{$_POST['w_buka']}',
		`tgl_tutup` = '{$_POST['tgl_tutup']}',
		`w_tutup` = '{$_POST['w_tutup']}' WHERE `tgl_praktikum`='{$_GET['tgl_praktikum']}'";
		
		$result = mysql_query($query);
		
		//echo $query;
		header("location:modul_praktikum.html?modul=$modul");
	break;
		
	//Menambahkan Add Modul Praktikum
	case "add_modul":
		$kd_mk = $_POST['kd_mk'];
		//echo $kd_mk;
		$kd_modul = $_POST['kd_modul'];
		//echo $kd_modul;
		//$nm_modul = $kd_mk.'-'.$kd_modul;
		$judul = $_POST['judul'];
		//echo $judul;
		$keterangan = $_POST['keterangan'];
		//echo $keterangan;
		
		
		$file_name = $_FILES["file"]["name"];
		$size = $_FILES["file"]["size"];
		$type = $_FILES["file"]["type"];
		$path = "upload/modul/". $_FILES["file"]["name"];
		
		$allowedExts = array("doc","docx", "zip","pdf");
		$extension = end(explode(".", $_FILES["file"]["name"]));
		if ((($_FILES["file"]["type"] == "application/zip")
		|| ($_FILES["file"]["type"] == "application/pdf")
		|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"))
		&& ($_FILES["file"]["size"] < 5000000) //5mb
		&& in_array($extension, $allowedExts))
		{
			if ($_FILES["file"]["error"] > 0)
			{
				//echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}
				else
				{
					$query = "INSERT INTO tb_mdl_data VALUES ('null','$kd_mk','$kd_modul','$judul','$keterangan','$path','$file_name','$type',NOW())";
					$hasil = mysql_query($query);
					if ($hasil){
						move_uploaded_file($_FILES["file"]["tmp_name"],"upload/modul/" . $_FILES["file"]["name"]);

						echo"<script>
							alert('Modul berhasil di upload');
							setTimeout(function(){
								document.location.href='modul_praktikum.html?modul=$kd_mk';
							}, 1000);
							</script>";
						
						}else {
							echo"<script>
							alert('Modul gagal di upload');
							setTimeout(function(){
								document.location.href='modul_praktikum.html?modul=$kd_mk';
							}, 1000);
							</script>";	
						}
				}
		}
		else
		{
			echo"<script>
			alert('Tipe modul yang diupload tidak sesuai');
			setTimeout(function(){
				document.location.href='modul_praktikum.html?modul=$kd_mk';
			}, 1000);
			</script>";
		}
		
		
	break;
	
	case "editmodul" :
		$kd_mk = $_POST['kd_mk'];
		$kd_modul = $_POST['kd_modul'];
		$jd_modul = $_POST['jd_modul'];
		//echo $jd_modul;
		$ket_file = $_POST['ket_file'];
		//Tempat penyimpanan file
		//$folder		= 'upload/modul/';
		$lokasi_file=$_FILES['file']['tmp_name'];
	
	if(!empty($jd_modul)){
		$query="UPDATE tb_mdl_data SET
			judul_modul = '$jd_modul', 
			ket_file = '$ket_file'
			WHERE kd_modul = '$kd_modul'";
			$result = $mysqli->query($query);
			//var_dump($query);
			if($result == 1)
			{
			echo "<script>
				alert('Data berhasil diganti');
			setTimeout(function() {
					document.location.href='modul_praktikum.html?modul=$kd_mk';
			}, 1000);
			</script>";
			} 
	}
		
	if(!empty($lokasi_file) && !empty($jd_modul)){
		$lokasi_file=$_FILES['file']['tmp_name'];
		$nama_file=$_FILES['file']['name'];
		move_uploaded_file($lokasi_file,"upload/modul/$nama_file");
		
		$query="UPDATE tb_mdl_data SET
		judul_modul = '$jd_modul', 
		ket_file = '$ket_file',
		namafolder = 'upload/modul/$nama_file',
		nama_file = '$nama_file'
		WHERE kd_modul = '$kd_modul'";
		$result = $mysqli->query($query);
		var_dump($query);
	}

	break;
	
	case "delmodul":
		$kd_modul = $_GET['kd_modul'];
		// query hapus data berdasarkan kd_mk
		$query = "DELETE FROM  tb_mdl_data WHERE kd_modul ='$kd_modul'";
		$hasil = mysql_query($query);
		//var_dump($query);
		
		echo "<script>
				alert('Data berhasil dihapus');
			setTimeout(function() {
			document.location.href='modul_praktikum.html?modul=$modul';
			}, 1000);
			</script>";
	break;
	
	//Menambahkan penilaian	
	case "add_penilaian" :  
		$kd_modul = $_GET['$kd_modul'];
		$kd_modul= str_replace('/','',str_replace('\\','',$kd_modul)); 
		$judul = $_POST['$judul'];
		$judul= str_replace('/','',str_replace('\\','',$judul)); 
		$keterangan = $_POST['$keterangan'];
		$keterangan= str_replace('/','',str_replace('\\','',$keterangan)); 
		$nilai = $_POST['$nilai'];
		$nilai= str_replace('/','',str_replace('\\','',$nilai));
		
		$query ="INSERT INTO `tb_idpenilaianpelaksananpraktikum` (
			`id` ,
			`kd_mk` ,
			`kd_modul` ,
			`judul` ,
			`keterangan` ,
			`nilaiawal` ,
			`bobot`
			)
			VALUES (
			NULL ,  '$modul',  '{$_GET['kd_modul']}',  '{$_POST['judul']}',  '{$_POST['keterangan']}', '{$_POST['nilai']}', '{$_POST['bobot']}'
			)";
		
		$result = mysql_query($query);

		$sqlidpenilaianpraktikum=mysql_query("SELECT id from tb_idpenilaianpelaksananpraktikum");
			while ($akhirId=mysql_fetch_array($sqlidpenilaianpraktikum))
			{
				$idpenilaian=$akhirId['id'];
			}

			$sqlKlasifikasi=mysql_query("SELECT * from tb_klasifikasipenilaian");
			while ($data2=mysql_fetch_array($sqlKlasifikasi))
			{
				$perulangan=$data2['indexnilai'];
			}
			$a=1;
			while ($a<=$perulangan)
			{
				
				if(empty($_POST['indexnilai'.$a])) {
				}
				else 
				{
					echo $_POST['indexnilai'.$a];
					$indexnilai=$_POST['indexnilai'.$a];
					$data = mysql_query
					(
					"INSERT INTO tb_penilaianpelaksananpraktikum VALUES(
					'$idpenilaian',
					'$indexnilai')"
					);
				}
				$a++;
		
		//echo $query;
		//echo $sqlKlasifikasi;
		//echo $data;
		}
		header("location:modul_praktikum.html?modul=$modul");
	break;
	
	case "editdatanilai" : 
		$id = $_POST['id'];
		$kd_mk = $_POST['kd_mk'];
		$kd_modul = $_POST['kd_modul'];
		$judul = $_POST['judul'];
		$keterangan = $_POST['keterangan'];
		$nilaiawal= $_POST['nilaiawal'];
		$bobot= $_POST['bobot'];
		
		$query  = "UPDATE `tb_idpenilaianpelaksananpraktikum` SET `judul` = '$judul',
		`keterangan` = '$keterangan',
		`nilaiawal` = '$nilaiawal',
		`bobot` = '$bobot' WHERE `id`='$id'";
		
		$result = mysql_query($query);
		//var_dump($query);
		echo "<script>
				alert('Data berhasil diganti');
			setTimeout(function() {
			document.location.href='modul_praktikum.html?modul=$modul';
			}, 1000);
			</script>";
	break;
	
	//Hapus data penilaian
	case "deldatanilai":
		$kd_modul = $_GET['kd_modul'];
		$id = $_GET['id'];
		// query hapus data berdasarkan kd_mk
		$query = "DELETE FROM  tb_idpenilaianpelaksananpraktikum WHERE id='$id'";
		$hasil = mysql_query($query);
		
		$query1 = "DELETE FROM tb_datapenilaiapraktikum WHERE idpenilaian = $id";
		$hasil1 = mysql_query($query1);
		
		$query2 = "DELETE FROM tb_penilaianpelaksananpraktikum WHERE idpenilaian = $id";
		$hasil2 = mysql_query($query2);
		//var_dump($query);
		
		echo "<script>
				alert('Data berhasil dihapus');
			setTimeout(function() {
			document.location.href='modul_praktikum.html?modul=$modul';
			}, 1000);
			</script>";
	break;
	
	case "add_sub_nilai" : 
	
		$id = $_POST['id'];
		$nama=$_POST['nama']; 
		$ket=$_POST['ket'];
		$media=$_POST['media'];
		$oprasi=$_POST['oprasi'];
		$nilai=$_POST['nilai'];

		
		$query="select * from tb_klasifikasipenilaian where noid='$id'";
			
		$aksi=mysql_query($query);
		$data=mysql_fetch_array($aksi);
		
		$cek = $data['jenispenilaian'];
		
		if($nama == $cek){
			echo "<script>
				alert('Daftar nilai sudah ada');
			setTimeout(function() { document.location.href='bank_penilaian.html';
			}, 1000);
			</script>";
		}else {
		
			$query="INSERT INTO tb_klasifikasipenilaian VALUES(null,
			'$id',
			'$nama',
			'$ket',
			'$media',
			'$oprasi',
			'$nilai')";
			
			$result = mysql_query($query);
			//var_dump('$query');
			echo "<script>
				alert('Daftar nilai berhasil ditambahkan');
			setTimeout(function() { document.location.href='bank_penilaian.html';
			}, 1000);
			</script>";
		}
	break;
	
	case "del_bank_nilai" :
	
		$id = $_GET['id'];
		
		// query hapus data berdasarkan ID
		$query = "DELETE FROM tb_bankpenilaian WHERE noid = $id";
		$hasil = mysql_query($query);

		$query2 = "DELETE FROM ktb_lasifikasipenilaian WHERE noid = $id";
		$hasil2 = mysql_query($query2);
		
		echo "<script>
			alert('Daftar nilai berhasil dihapus');
		setTimeout(function() { document.location.href='bank_penilaian.html#myModal$id';
		}, 1000);
		</script>";
	break;
	
	case "del_klasifikasi_nilai" :
	$id = $_GET['id'];
	
	$query = "SELECT noid FROM tb_klasifikasipenilaian WHERE indexnilai = '$id'";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);

	$query2 = "DELETE FROM tb_klasifikasipenilaian WHERE indexnilai = '$id'";
	$hasil2 = mysql_query($query2);
	
	//var_dump($query);
	
	echo "<script>
			alert('Daftar nilai berhasil dihapus');
		setTimeout(function() { document.location.href='bank_penilaian.html';
		}, 1000);
		</script>";
	break;
		
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
	
	case "del_praktikum":
		$kd_mk = $_GET['kd_mk'];
		//echo $kd_mk;
		// query hapus data berdasarkan kd_mk
		$query = "DELETE FROM tb_matakuliah WHERE kd_mk ='$kd_mk'";
		$hasil = mysql_query($query);
		
		echo "<script>
			alert('Daftar Matakuliah berhasil dihapus');
		setTimeout(function() { document.location.href='praktikum.html';
		}, 1000);
		</script>";
	break;
}

?>