<?php
error_reporting(0);
include '../include/koneksi.php';
?>

<?php
// menggunakan library phpExcelReader
include "library/excel_reader/excel_reader.php";


// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;
$query;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
	//Dimulai dari 1 bukan 0
	// membaca data alamat (kolom ke-2 didatabase tb_jadwal_praktikum)
	$kd_mk = $data->val($i, 2);

	// membaca data alamat (kolom ke-3 didatabase tb_jadwal_praktikum)
	$kd_modul = $data->val($i, 3);

	$q5=mysql_query("SELECT kd_modul FROM tb_mdl_praktikum WHERE kd_modul='$kd_modul'");
	$h5=mysql_fetch_array($q5);
	$getkd_modul=$h5['kd_modul'];
	
	
	// membaca data nama (kolom ke-4 didatabase tb_jadwal_praktikum))
	$nim = $data->val($i, 4);

	$q1=mysql_query("SELECT nim FROM tb_mahasiswa WHERE nim='$nim'");
	$h1=mysql_fetch_array($q1);
	$getnim=$h1['nim'];

	// membaca data alamat (kolom ke-5 didatabase tb_jadwal_praktikum))
	$id_asisten = $data->val($i, 5);

	$q2=mysql_query("SELECT id_pengenal FROM tb_user WHERE id_pengenal='$id_asisten'");
	$h2=mysql_fetch_array($q2);
	$getid_asisten=$h2['id_pengenal'];
	
	// membaca data alamat (kolom ke-6 didatabase tb_jadwal_praktikum)
	$group = $data->val($i, 6);
	// membaca data alamat (kolom ke-7 didatabase tb_jadwal_praktikum)
	$tanggal = $data->val($i, 7);
	// membaca data alamat (kolom ke-8 didatabase tb_jadwal_praktikum)
	$waktu = $data->val($i, 8);
	// membaca data alamat (kolom ke-9 didatabase tb_jadwal_praktikum)
	$ruangan = $data->val($i, 9);

	// setelah data dibaca, sisipkan ke dalam tabel tb_jadwal_praktikum
	$query = "INSERT INTO tb_jadwal_praktikum VALUES (NULL, '$kd_mk','$getkd_modul', '$getnim', '$getid_asisten', '$group','$tanggal','$waktu','$ruangan')";
	$hasil = mysql_query($query);
	
	echo $query;
	
	// setelah data dibaca, sisipkan ke dalam tabel tb_list_upload_tugas
	$query2 = "INSERT INTO tb_list_upload_tugas VALUES (NULL, NULL,NULL, '$kd_mk', '$getkd_modul',NULL,'NULL','NULL')";
	$hasil = mysql_query($query2);
	
	//echo $query;

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