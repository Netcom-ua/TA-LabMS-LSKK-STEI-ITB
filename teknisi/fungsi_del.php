<?php 
include"../include/koneksi.php";

$action = $_GET['action'];

switch ($action){
	case "hapus_iventaris":
	$kd_alat = $_GET['kd_alat'];
	$query = "DELETE FROM tb_inventaris WHERE kode_alat = '$kd_alat'";
	$hasil = mysql_query($query);
	
	echo "<script>
			alert('Barang berhasil dihapus');
		setTimeout(function() { document.location.href='tampil_inventaris.html';
		}, 1000);
		</script>";

	break;

}

?>