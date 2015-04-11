<?php
error_reporting(0);
include '../include/koneksi.php';
?>

<?php

if (isset($_FILES['userfile'])) {

	require_once "library/xlsx_reader/simplexlsx.class.php";

	$xlsx = new SimpleXLSX( $_FILES['userfile']['tmp_name'] );

	//initial
	//----------------------------------------
	$jumlahrowimport=0;
	$gagal=0;

	list($cols,) = $xlsx->dimension();

	foreach( $xlsx->rows() as $k => $r) {
		if ($k <= 1) continue; // skip row by row array
		
		//Membaca kolom 0 di excel
		$tanggal = $r[0];
		
		//column number 1
		$waktu = $r[1];
		
		//membaca column 2 Ruangan diexcel
		$ruangan = $r[2];

		//column number 3
		$group = $r[3];
		
		//column number 4
		$kd_mk = $r[4];

		//column number 5
		$kd_modul = $r[5];

		$q5=mysql_query("SELECT kd_modul FROM tb_mdl_praktikum WHERE kd_modul='$kd_modul'");
		$h5=mysql_fetch_array($q5);
		//Membaca field kd_modul di tb_mdl_praktikum
		$getkd_modul=$h5['kd_modul'];

		//column number 6 excel
		$nim= $r[6];

		$q1=mysql_query("SELECT nim FROM tb_mahasiswa WHERE nim='$nim'");
		$h1=mysql_fetch_array($q1);
		//Membaca field nim di tb_mahasiswa
		$getnim=$h1['nim'];

		//column number 8 excel
		$id_asisten = $r[8];

		$q2=mysql_query("SELECT id_pengenal FROM tb_user WHERE id_pengenal='$id_asisten'");
		$h2=mysql_fetch_array($q2);
		//Membaca field id_pengenal di tb_user
		$getid_asisten=$h2['id_pengenal'];
		
		
		//column number 10
		$id_kordas = $r[10];
		
		$q3=mysql_query("SELECT id_pengenal FROM tb_user WHERE id_pengenal='$id_kordas'");
		$h3=mysql_fetch_array($q3);
		//Membaca field id_pengenal di tb_user
		$getid_kordas=$h3['id_pengenal'];
		
		//column number 12
		$id_dosen = $r[12];
		
		
		$q4=mysql_query("SELECT nid FROM tb_dosen WHERE nid='$id_dosen'");
		$h4=mysql_fetch_array($q4);
		//Membaca field id_pengenal di tb_user
		$getid_dosen=$h4['nid'];
	
		// setelah data dibaca, sisipkan ke dalam tabel tb_jadwal_praktikum
		$query = "INSERT INTO tb_jadwal_praktikum VALUES (NULL, '$kd_mk','$getkd_modul', '$getnim', '$getid_asisten', '$getid_kordas', '$getid_dosen', '$group','$tanggal','$waktu','$ruangan')";
		$hasil = mysql_query($query);

		// setelah data dibaca, sisipkan ke dalam tabel mdl_upload_laporan mahasiswa
		$query3 = "INSERT INTO `tb_mdl_upload_laporan` (
		`id` ,
		`nim` ,
		`kd_modul` ,
		`file_name` ,
		`size` ,
		`type` ,
		`path` ,
		`date`
		)
		VALUES (
		NULL ,  '$getnim',  '$getkd_modul',  '',  '',  '',  '',  ''
		)";
		$hasil = mysql_query($query3); 
		
		
		if ($query){
		$jumlahrowimport++;
		}
		else {$gagal++;
		}
		
	}
	
	echo "<script>
			alert('Jadwal Praktikum Berhasil di Upload');
		setTimeout(function() { document.location.href='upload_jadwal.html';
		}, 1000);
		</script>";

	
	
}

?>
