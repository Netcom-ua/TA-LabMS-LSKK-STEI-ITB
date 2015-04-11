<?php
	header('Access-Control-Allow-Origin: *');
	header("Content-Type: application/javascript");

	mysql_connect("localhost","root","");
	mysql_select_db("db_lms");
	
 
 if(isset($_GET['kategori'])) {
  $queryKategori=mysql_query("select * from tb_user where username='{$_GET['kategori']}'");
	    $json = $_GET["callback"].'([';
	    while ($dataKategori=mysql_fetch_array($queryKategori)){
			$dataJSON = '{ "email":'.json_encode($dataKategori['email']).' ,"nama":'.json_encode($dataKategori['nama_user']).',"id_pengenal":'.json_encode($dataKategori['id_pengenal']).',"hp":'.json_encode($dataKategori['hp']).',"username":'.json_encode($dataKategori['username']).',"status":'.json_encode($dataKategori['status']).', "gambar":'.json_encode($dataKategori['foto']).' },';
			$json .=$dataJSON;
		}
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );
	}
 ?>