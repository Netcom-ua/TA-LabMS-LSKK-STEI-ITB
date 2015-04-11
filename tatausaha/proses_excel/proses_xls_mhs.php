<?php
error_reporting(0);
include '../include/koneksi.php';
?>

<?php
// menggunakan library phpExcelReader
include "library/excel_reader/excel_reader.php";

// koneksi ke mysql
//include "config.php";

// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=2);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;
$query;

// import data excel mulai baris ke-3 (karena baris pertama adalah nama kolom)
for ($i=3; $i<=$baris; $i++)
{
	//Dimulai dari 1 bukan 0
	// membaca data alamat (kolom ke-2 didatabase tb_mahasiswa)
	$nim = $data->val($i, 2);

	// membaca data alamat (kolom ke-3 didatabase tb_mahasiswa)
	$nama_mhs = $data->val($i, 3);

	
	// membaca data nama (kolom ke-4 didatabase tb_mahasiswa)
	$hp = $data->val($i, 4);
	
	// membaca data nama (kolom ke-9 didatabase tb_mahasiswa)
	
	$username = $nim;
	$data= md5($nim);
	$password = $data;
	//$password = $data->($i, 9);
	
	// membaca data nama (kolom ke-10 didatabase tb_mahasiswa)
	$foto = 'avatar.png';


	// setelah data dibaca, sisipkan ke dalam tabel tb_mahasiswa)
	$query ="INSERT INTO `tb_mahasiswa` (`id`, `nim`, `nama_mhs`, `prodi`, `semester`, `hp`, `username`, `email`, `password`, `foto`, `status`, `tgl_daftar`) VALUES (NULL, '$nim', '$nama_mhs', '', '', '$hp', '$username', '', '$password', '$foto', 'aktif', '$tanggal')";
		$hasil = mysql_query($query);
	
	echo $query;

	// jika proses insert data sukses, maka counter $sukses bertambah
	// jika gagal, maka counter $gagal yang bertambah
	if ($hasil) $sukses++;
	else $gagal++;
}
// tampilan status sukses dan gagal
echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
echo "Data yang diupload : ".$query."</p>";
?>