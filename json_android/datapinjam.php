<?php
	header('Access-Control-Allow-Origin: *');
	header("Content-Type: application/javascript");

	mysql_connect("localhost","root","");
	mysql_select_db("db_lms");
	
 
 if(isset($_GET['pinjam'])) {
  $queryKategori=mysql_query("select * from tb_pinjam where username='{$_GET['pinjam']}' AND status!='Sudah Dikembalikan' order by tgl_pinjam desc limit 1");
  $cek=mysql_num_rows($queryKategori);
  if($cek==1){
	    $json = $_GET["callback"].'([';
	    while ($dataKategori=mysql_fetch_array($queryKategori)){
			$dataJSON = '{ "nama":'.json_encode($dataKategori['nama_peminjam']).' ,"nama_alat":'.json_encode($dataKategori['nama_alat']).', "jumlah":'.json_encode($dataKategori['jumlah']).',"tgl_p":'.json_encode($dataKategori['tgl_pinjam']).',"tgl_k":'.json_encode($dataKategori['tgl_kembali']).', "status":'.json_encode($dataKategori['status']).' },';
			$json .=$dataJSON;
			}
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );
		}
	else{
			
			$json = $_GET["callback"].'([';
			$dataJSON = '{ "nama":'.json_encode('Anda tidak memiliki tanggungan peminjaman').' ,"nama_alat":'.json_encode('-').', "jumlah":'.json_encode('-').',"tgl_p":'.json_encode('-').',"tgl_k":'.json_encode('-').', "status":'.json_encode('-').' },';
			$json .=$dataJSON;
			
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );
		}
	}
 ?>