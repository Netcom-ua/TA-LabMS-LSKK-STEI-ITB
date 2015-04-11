<?php
	header('Access-Control-Allow-Origin: *');
	header("Content-Type: application/javascript");

	mysql_connect("localhost","root","");
	mysql_select_db("db_lms");
	
 
 if(isset($_GET['kategori'])) {
  $queryKategori=mysql_query("select * from tb_mahasiswa where username='{$_GET['kategori']}'");
	    $json = $_GET["callback"].'([';
	    while ($dataKategori=mysql_fetch_array($queryKategori)){
			$dataJSON = '{ "nim":'.json_encode($dataKategori['nim']).' ,"nama":'.json_encode($dataKategori['nama_mhs']).',"prodi":'.json_encode($dataKategori['prodi']).',"smester":'.json_encode($dataKategori['semester']).',"hp":'.json_encode($dataKategori['hp']).',"username":'.json_encode($dataKategori['username']).',"email":'.json_encode($dataKategori['email']).',"gambar":'.json_encode($dataKategori['foto']).',  "status":'.json_encode($dataKategori['status']).' },';
			$json .=$dataJSON;
		}
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );
	}
 ?>