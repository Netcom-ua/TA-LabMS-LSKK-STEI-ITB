<?php
	header('Access-Control-Allow-Origin: *');
	header("Content-Type: application/javascript");

	mysql_connect("localhost","root","");
	mysql_select_db("db_lms");
	
 
 if(isset($_GET['kategori'])) {
  $queryKategori_user=mysql_query("select * from tb_dosen where username='{$_GET['kategori']}'");
	$dapatuser=mysql_fetch_array($queryKategori_user);
	$nid=$dapatuser['nid'];
	 $queryKategori=mysql_query("select * from tb_matakuliah inner join tb_dosen on tb_matakuliah.nip_dosen = tb_dosen.nid where nip_dosen='$nid'");
	    $json = $_GET["callback"].'([';
	    while ($dataKategori=mysql_fetch_array($queryKategori)){
			$dataJSON = '{ "kode_mk":'.json_encode($dataKategori['kd_mk']).' ,"nama_mk":'.json_encode($dataKategori['nama_mk']).',"deskripsi":'.json_encode($dataKategori['deskripsi']).',"smester":'.json_encode($dataKategori['semester']).',"akademik":'.json_encode($dataKategori['akademik']).',"nama_dosen":'.json_encode($dataKategori['nama_dosen']).' },';
			$json .=$dataJSON;
		}
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );
		
 
	}
 ?>