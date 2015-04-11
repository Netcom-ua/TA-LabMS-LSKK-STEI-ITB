<?php 
mysql_connect("localhost","root","");
mysql_select_db("db_lms");

header("Content-Type: application/javascript");

if (!empty($_GET['callback'])){
	if (empty($_GET['kategori'])){
	    $queryKategori=mysql_query("select * from tb_mahasiswa");
	    $json = $_GET["callback"].'([';
	    while ($dataKategori=mysql_fetch_array($queryKategori)){
			$dataJSON = '{ "id":'.json_encode($dataKategori['id_mahasiswa']).' ,"nama":'.json_encode($dataKategori['nama']).'}, ';
			$json .=$dataJSON;
		}
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );
	} else {
		$queryBuku=mysql_query("select * from tb_pinjam where id_mahasiswa='$_GET[kategori]'");
	    $json = $_GET["callback"].'([';
	    while ($dataBuku=mysql_fetch_array($queryBuku)){
			$dataJSON = '{ "id":'.json_encode($dataBuku['id_pinjam']).' ,"judul":'.json_encode($dataBuku['nama']).',"penerbit":'.json_encode($dataBuku['email']).',"tahun_terbit":'.json_encode($dataBuku['nama_alat']).'}, ';
			$json .=$dataJSON;
		}
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );
	}
}
?>