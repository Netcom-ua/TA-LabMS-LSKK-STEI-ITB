<?
include '../include/koneksi.php';
//koneksi database
$id = $_GET['id'];

if (!empty($id) && $id != "") {
	$hapus = "DELETE FROM tb_mdl_newsfeed WHERE id ='$id'";
	$hasil = mysql_query($hapus) or die ("".mysql_error());
	if(! $hasil )
	{
		echo "<script>alert ('Maaf data gagal dihapus !')</script>";
	}
	echo "<script> window.location = 'newsfeed_view.php'</script>";
}
 
?>



