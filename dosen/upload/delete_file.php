<?php
include '../../include/koneksi.php';
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
?>

<?php
// membaca ID dari data yang akan dihapus
$id = $_GET['id'];
$sql=mysql_query("select * from tb_mdl_data_file WHERE id='$id'");
$row=mysql_fetch_array($sql);
$idcategori=$row['idcategori'];

// query hapus data berdasarkan ID
$query = "DELETE FROM tb_mdl_data_file WHERE id = $id";
$hasil = mysql_query($query);

// konfirmasi penghapusan
if ($hasil) echo "Data sudah terhapus";

// query untuk membaca semua data dengan sorting berdasarkan ID secara descending
// sorting descending ini untuk mengantisipasi record yang urutan ID nya tidak urut dalam setiap barisnya
// misal 1, 4, 2, 5, 3
$query = "SELECT * FROM tb_mdl_data_file ORDER BY id";
$hasil = mysql_query($query);

// nilai awal increment
$no = 1;

while ($data  = mysql_fetch_array($hasil))
{
	// membaca id dari record yang tersisa dalam tabel
	$id = $data['id'];

	// proses updating id dengan nilai $no
	$query2 = "UPDATE tb_mdl_data_file SET id = $no WHERE id = $id";
	mysql_query($query2);

	// increment $no
	$no++;
}

// mengubah nilai auto increment menjadi $no terakhir ditambah 1
$query = "ALTER TABLE tb_mdl_data_file  AUTO_INCREMENT = $no";
mysql_query($query);//index.php?page=course&idcategori=1

header("location:../course?idcategori=$idcategori");
?>