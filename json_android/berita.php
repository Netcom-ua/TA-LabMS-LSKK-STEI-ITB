<?php
	header('Access-Control-Allow-Origin: *');
	header("Content-Type: application/javascript");

	mysql_connect("localhost","root","");
	mysql_select_db("db_lms");
	
 
	 $queryKategori=mysql_query("SELECT * FROM tb_mdl_newsfeed ORDER BY tanggal DESC");
	    $json = $_GET["callback"].'([';
	    while ($dataKategori=mysql_fetch_array($queryKategori)){
			$dataJSON = '{ "Judul":'.json_encode($dataKategori['topik'] ).' ,"Berita":'.json_encode($dataKategori['deskripsi']).',"tanggal_berita":'.json_encode($dataKategori['tanggal']).' },';
			$json .=$dataJSON;
		}
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );
 ?>