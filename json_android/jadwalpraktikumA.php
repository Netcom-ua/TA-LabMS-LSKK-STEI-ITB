<?php
	header('Access-Control-Allow-Origin: *');
	header("Content-Type: application/javascript");

	mysql_connect("localhost","root","");
	mysql_select_db("db_lms");
	
 
 if(isset($_GET['kategori'])) {
  $queryKategori_user=mysql_query("select * from tb_user where username='{$_GET['kategori']}'");
	$dapatuser=mysql_fetch_array($queryKategori_user);
	$id_pengenal=$dapatuser['id_pengenal'];
	 $queryKategori=mysql_query("SELECT tb_jadwal_praktikum.nim, tb_jadwal_praktikum.group, 
									tb_jadwal_praktikum.ruangan,
									tb_jadwal_praktikum.tanggal, tb_jadwal_praktikum.waktu, tb_matakuliah.nama_mk, 
									tb_matakuliah.semester,
									tb_matakuliah.akademik,
									tb_matakuliah.nip_dosen, tb_mdl_praktikum.kd_mk, tb_mdl_praktikum.kd_modul, tb_mdl_praktikum.nm_modul, tb_mdl_praktikum.singkatan, tb_mdl_praktikum.nama_kordas, tb_mahasiswa.nim, tb_mahasiswa.nama_mhs, tb_user.id_pengenal, tb_user.nama_user, tb_dosen.nama_dosen
								FROM tb_jadwal_praktikum
								INNER JOIN tb_matakuliah ON tb_jadwal_praktikum.kd_mk = tb_matakuliah.kd_mk
								INNER JOIN tb_mdl_praktikum ON tb_jadwal_praktikum.kd_modul = tb_mdl_praktikum.kd_modul
								INNER JOIN tb_mahasiswa ON tb_jadwal_praktikum.nim = tb_mahasiswa.nim
								INNER JOIN tb_user ON tb_jadwal_praktikum.id_asisten = tb_user.id_pengenal
								INNER JOIN tb_dosen ON tb_dosen.nid = tb_matakuliah.nip_dosen
								where tb_jadwal_praktikum.id_asisten='$id_pengenal'
								");
	    $json = $_GET["callback"].'([';
	    while ($dataKategori=mysql_fetch_array($queryKategori)){
			$dataJSON = '{ "Tanggal_Praktikum":'.json_encode($dataKategori['tanggal']).' ,"Waktu":'.json_encode($dataKategori['waktu']).' ,"Matakuliah":'.json_encode($dataKategori['nama_mk']).',"Nama_Modul":'.json_encode($dataKategori['kd_modul']).',"Asisten":'.json_encode($dataKategori['nama_user']).',"Kordas":'.json_encode($dataKategori['nama_kordas']).',"Dosen":'.json_encode($dataKategori['nama_dosen']).',"Ruangan":'.json_encode($dataKategori['ruangan']).' },';
			$json .=$dataJSON;
		}
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );
		
	}
 ?>