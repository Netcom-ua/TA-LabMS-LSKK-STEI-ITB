<?php
include '../../include/koneksi.php';
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
?>

<?php
$sql="SELECT * FROM  tb_upload_data_sementara";
$aksi=mysql_query($sql);
$data=mysql_fetch_array($aksi);
$idcategori=$data['idcategori'];
$idcourse=$data['idcourse'];
$judulfile=$data['judulfile'];
$keteranganfile=$data['keteranganfile'];
$alamat=$data['alamat'];
include 'alamatFile.php';
//periksa apakah user telah menekan submit, dengan menggunakan parameter setingan keterangan
if (isset($_POST['judulfile']))
{
	$tanggal=date("Y-m-d");
	$tglbuka=$_POST['tglbuka'];
	$tgltutup=$_POST['tgltutup'];
	
	//periksa jika data yang dimasukan belum lengkap
	if ($judulfile=="" || $keteranganfile==""||$alamat==""||$tglbuka==""||$tgltutup=="")
	{
		//jika ada inputan yang kosong
		?><script>alert('Data Anda belum lengkap');</script><?
		?><script>document.location.href='upload_data_praktikan.php';</script><?
		
	}else{
		
		//definisikan variabel file dan alamat file
		$uploaddir='./files';
		$alamatfile=$uploaddir.$alamat;

		//catat data file yang berhasil di upload
		$data = mysql_query
		(
		"INSERT INTO tb_mdl_data_file VALUES(null,
		'$idcategori',
		'$idcourse',
		'$judulfile',
		'$keteranganfile',
		'$tanggal',
		'$tglbuka',
		'$tgltutup',
		'$namaFolder',
		'$namaFile',
		'$namaTypeFile',
		'1')"
		);
		header("location:../course.php?idcategori=$idcategori");
	}
}
else
{
	unset($_POST['judulfile']);
}

?>
