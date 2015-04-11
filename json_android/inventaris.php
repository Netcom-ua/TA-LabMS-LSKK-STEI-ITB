<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/javascript");

mysql_connect("localhost","root","");
mysql_select_db("db_lms");

		$queryKategori=mysql_query("select * from tb_inventaris");
	    $json = $_GET["callback"].'([';
	    while ($dataKategori=mysql_fetch_array($queryKategori)){
			$dataJSON = '{ "kode_inv":'.json_encode($dataKategori['kode_alat']).',"nama_inv":'.json_encode($dataKategori['nama_alat']).',"stok":'.json_encode($dataKategori['jumlah']).',"satuan":'.json_encode($dataKategori['satuan']).',"spek":'.json_encode($dataKategori['spesifikasi']).',"j_prak":'.json_encode($dataKategori['jenis_praktikum']).',"foto":'.json_encode($dataKategori['foto']).'}, ';
			$json .=$dataJSON;
		}
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );


?>