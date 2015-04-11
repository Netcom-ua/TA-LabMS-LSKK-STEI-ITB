<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/javascript");

mysql_connect("localhost","root","");
mysql_select_db("db_lms");

		$queryKategori=mysql_query("select * from tb_atk");
	    $json = $_GET["callback"].'([';
	    while ($dataKategori=mysql_fetch_array($queryKategori)){
			$dataJSON = '{ "kode_atk":'.json_encode($dataKategori['kode_alat']).',"nama_atk":'.json_encode($dataKategori['nama_alat']).',"spek_atk":'.json_encode($dataKategori['spesifikasi']).',"tipe_atk":'.json_encode($dataKategori['tipe']).',"foto":'.json_encode($dataKategori['foto']).',"stok_atk":'.json_encode($dataKategori['stok']).'}, ';
			$json .=$dataJSON;
		}
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );


?>