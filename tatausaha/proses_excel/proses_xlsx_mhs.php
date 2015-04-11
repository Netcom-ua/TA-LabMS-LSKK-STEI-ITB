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

	foreach( $xlsx->rows() as $b => $r) {
		if ($b <= 1) continue; // skip row by row array;
		
		//membaca column 1 NIM di excel
		$nim = $r[1];
		
		//column Nama 2
		$nama_mhs = $r[2];

		//column number 3 hp di excel
		$jurusan = $r[3];
		
		$username = $nim;
		$data= md5($nim);
		$password = $data;
		
		$foto = 'avatar.png';
		
		$tanggal = gmdate("Y-m-d H:i:s", time()+60*60*7);

		#Insert into Sql
		#--------------------------------------------
		// setelah data dibaca, sisipkan ke dalam tabel tb mahasiswa
		$query ="INSERT INTO `tb_mahasiswa` (`id`, `nim`, `nama_mhs`, `prodi`, `semester`, `hp`, `username`, `email`, `password`, `foto`, `status`, `tgl_daftar`) VALUES (NULL, '$nim', '$nama_mhs', '$jurusan', '', '', '$username', '', '$password', '$foto', 'aktif', '$tanggal')";
		$hasil = mysql_query($query);
		

		//echo $query;
		
		//var_dump($query);

		if ($query){$jumlahrowimport++;}
		else {$gagal++;}

		
	}
	//echo '</table>';
	echo "<b><font color=red>Data yang di import ".$jumlahrowimport." row<br>Gagal diimport ".$gagal."</font></b>";
}

?>
