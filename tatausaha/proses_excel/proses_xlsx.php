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
		$kd_mk = $r[0];
		
		
		//column number 1
		$kd_modul = $r[1];
		$q1=mysql_query("SELECT kd_modul FROM tb_mdl_praktikum WHERE kd_modul='$kd_modul'");
		$h1=mysql_fetch_array($q1);
		//Membaca field kd_modul di tb_mdl_praktikum
		$getkd_modul=$h1['kd_modul'];
		
		
		//membaca column 2 Ruangan diexcel
		$tanggal_buka = $r[2];

		//column number 3
		$waktu = $r[3];
		
		$tgl = $tanggal_buka.' '.$waktu;

		// setelah data dibaca, sisipkan ke dalam tabel mdl_upload_laporan mahasiswa
		$query3 = "INSERT INTO  `tb_list_upload_tugas` (
				`id` ,
				`tgl_praktikum` ,
				`judul_tugas` ,
				`modul` ,
				`kd_mk` ,
				`kd_modul` ,
				`tgl_buka` ,
				`w_buka` ,
				`tgl_tutup` ,
				`w_tutup`
				)
				VALUES (
				NULL ,  '$tgl',  'NULL',  'NULL', '$kd_mk',  '$getkd_modul',  '0',  '0',  '0',  '0'
				)";
				
		$hasil = mysql_query($query3);
		
		echo $h5; 

		if ($query){
		$jumlahrowimport++;
		}
		else {$gagal++;
		}
		
	}
	echo "<script>
			alert('Jadwal Upload Praktikum Berhasil di Upload');
		setTimeout(function() { document.location.href='upload_jadwal_laporan.html';
		}, 1000);
		</script>";
	
	
}

?>
