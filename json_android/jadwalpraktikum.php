<?php
	header('Access-Control-Allow-Origin: *');
	header("Content-Type: application/javascript");

	mysql_connect("localhost","root","");
	mysql_select_db("db_lms");
	
 
 if(isset($_GET['kategori'])) {
  $queryKategori_user=mysql_query("select * from tb_mahasiswa where username='{$_GET['kategori']}'");
	$dapatuser=mysql_fetch_array($queryKategori_user);
	$nim=$dapatuser['nim'];
	 $queryKategori=mysql_query("SELECT tb_jadwal_praktikum.nim, 	tb_jadwal_praktikum.id_asisten, tb_jadwal_praktikum.group, 
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
					where tb_jadwal_praktikum.nim='$nim'");
	    $json = $_GET["callback"].'([';
	    while ($dataKategori=mysql_fetch_array($queryKategori)){
			$dataJSON = '{ "nama_mk":'.json_encode($dataKategori['nama_mk']).' ,"kd_modul":'.json_encode($dataKategori['kd_modul']).',"nama_user":'.json_encode($dataKategori['nama_user']).',"nama_kordas":'.json_encode($dataKategori['nama_kordas']).',"nama_dosen":'.json_encode($dataKategori['nama_dosen']).',"ruangan":'.json_encode($dataKategori['ruangan']).', "tanggal":'.json_encode($dataKategori['tanggal']).',"waktu":'.json_encode($dataKategori['waktu']).' },';
			$json .=$dataJSON;
		}
		$json .= '])';                   
		echo str_replace('}, ])', '} ])', $json );
		
 
	}
 ?>