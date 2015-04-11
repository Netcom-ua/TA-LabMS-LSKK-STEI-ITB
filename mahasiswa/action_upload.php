<?php
session_start();	
include 'koneksi/session.php';
require '../include/koneksi.php';

$nim = $_SESSION['nim'];

//Mengambil Waktu Komputer
$tgl = gmdate("Y-m-d H:i:s", time()+60*60*7); # WIB 
$tanggal = $_GET['tanggal'];
$waktu = $_GET['waktu'];
$action = $_GET['action'];


#baca variabel URL (if register global on)
$modul = $_GET['modul'];

//echo $nim;
$data=mysql_query("select * from tb_mdl_praktikum where kd_modul='$modul'");
$row=mysql_fetch_array($data);

$data1=mysql_query("select * from  tb_mdl_upload_laporan where kd_modul='$modul' and nim='$nim'");
$row1=mysql_fetch_array($data1);

$file = $row1['file_name'];
//echo $file;


//Untuk menghapus tugas yang telah ada 
switch($action) {
case "deltugas" :	
		$nim = $_GET['nim'];
		$modul = $_GET['modul'];
		//$nim = str_replace('/','',str_replace('\\','',$nim)); 
		// Hapus data tugas
		//$query  = "DELETE FROM tb_mdl_upload_laporan WHERE nim='$nim' and kd_modul='$modul'";
		//$result = mysql_query($query);
		//$query  = "update tb_mahasiswa set status='aktif' WHERE nim='{$_GET['nim']}'";

		$query1= "UPDATE `tb_mdl_upload_laporan` SET `file_name` = '', `size` = '0', `type` = '', `path` = '', `date` = '' WHERE nim ='$nim' and kd_modul='$modul'";
		$result = $mysqli->query($query1);
		echo $query1;
		// redirect ke halaman inbox
		header("location:modul_praktikum.html?modul=$modul&tanggal=$tanggal&waktu=$waktu");
		break;
}


//Tempat penyimpanan file
$folder		= '../asisten/upload/'.$nim."/";


if (!is_dir($folder)) {
        mkdir($folder);
    } 

//Cek jika tugas yang lama masih ada maka akan muncul pesan
if ( !empty($file) ){
	echo "<script>
	alert('Harap hapus terlebih dahulu laporan Anda yang lama! ');
	setTimeout(function() {
			document.location.href='modul_praktikum.html?modul=$modul&tanggal=$tanggal&waktu=$waktu';
	}, 500);
	</script>"; 
} else
	{
	
	//type file yang bisa diupload
	$file_type	= array('pdf','doc','docx');
	//tukuran maximum file yang dapat diupload
	$max_size	= 5000000; // 5MB
	if(isset($_POST['btnUpload'])){
		//Mulai memorises data
		$file_name	= $_FILES['data_upload']['name'];
		$file_size	= $_FILES['data_upload']['size'];
		$file_type1	= $_FILES['data_upload']['type'];
		//cari extensi file dengan menggunakan fungsi explode
		$explode	= explode('.',$file_name);
		$extensi	= $explode[count($explode)-1];

		//check apakah type file sudah sesuai
		if(!in_array($extensi,$file_type)){
			$eror   = true;
			$pesan .= 'Type file yang Anda upload tidak sesuai dengan pdf/doc/docx';
		}
		if($file_size > $max_size){
			$eror   = true;
			$pesan .= 'File yang Anda upload tidak boleh besar dari 5 MB';
		}
		//check ukuran file apakah sudah sesuai

		if($eror == true){
			echo "<script>
			alert('$pesan');
		setTimeout(function() {
				document.location.href='modul_praktikum.html?modul=$modul&tanggal=$tanggal&waktu=$waktu';
		}, 500);
		</script>";
		}
		else{
			$path = 'asisten/upload/'.$nim."/$file_name";
			//mulai memproses upload file
			if(move_uploaded_file($_FILES['data_upload']['tmp_name'], $folder.$file_name)){
				//catat nama file ke database
				$catat= "UPDATE  `tb_mdl_upload_laporan` SET  `file_name` =  '$file_name',
				`size` =  '$file_size',
				`type` =  '$file_type1',
				`path` =  '$path',
				`date` =  '$tgl' WHERE  nim ='$nim' and kd_modul='$modul' LIMIT 1";
				
				$result = $mysqli->query($catat);
				//echo $catat;
				//$catat = mysql_query('insert into tb_mdl_upload_laporan(nim,kd_modul ,file_name,size,type,path,date) values ("'.$nim.'","'.$modul.'","'.$file_name.'","'.$file_size.'","'.$file_type1.'","'.$path.'",NOW())');
				
				echo "<script>
					alert('Berhasil mengupload file .$file_name.');
				setTimeout(function() {
						document.location.href='modul_praktikum.html?modul=$modul&tanggal=$tanggal&waktu=$waktu';
				}, 500);
				</script>";
			} else{
				echo "<script>
					alert('Gagal Upload Tugas');
				setTimeout(function() {
						document.location.href='modul_praktikum.html?modul=$modul&tanggal=$tanggal&waktu=$waktu';
				}, 500);
				</script>";
			}
		}
	}
}
?>
