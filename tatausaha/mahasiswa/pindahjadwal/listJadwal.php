<?php
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
include '../../config.php';
error_reporting(0);

if (isset($_SESSION['user_id'])){

	#fungsi jika mendekati jadwal kurang dari 7  hari maka tidak bisa tukar
	#======================================================================
	function checkdatediffers($date,$duration){
		$today = new DateTime();
		$ref = new DateTime($date);

		#cek jika hari ini ke belakang tidak ada jadwal
		#=============================================================
		if($today > $ref){
			return false;
		}else{
			$diff = $today->diff($ref);
			if($diff->days >= $duration){
				return true;
			}else{
				return false;
			}
		}
	}

	#tampilkan semua jadwal mata kuliah yang diampu
	#=======================================================

	?>
<html>
<head>
<title>Pertukaran Jadwal</title>
<!--  link rel="stylesheet" href="mahasiswa/pindahjadwal/gaya.css"
	type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/menu3.css">
<script type="text/javascript"
	src="mahasiswa/pindahjadwal/jquery-1.4.3.min.js"></script>
<script type="text/javascript"
	src="mahasiswa/pindahjadwal/notifikasi.js"--></script>
</head>
<body topmargin="0" leftmargin="0">
	<div>
		<ul id="UTnavdocbwh">
			<li class="back" title="Kembali ke Halaman Course"><a
				href="?page=mahasiswa"></a>
			</li>
		</ul>
	</div>

	<!-- div id="kepala">
		<span id="pesan"> <img src="mahasiswa/pindahjadwal/images/notif.png">
			<div id="notifikasi"></div> 
			</span>
	</div>

	<div id="info">
		<div id="loading">
			<br>Loading...<img src="mahasiswa/pindahjadwal/images/loading.gif">
		</div>
		<div id="konten-info"></div>
	</div-->

	<!-- 	START 	-->
	<center>
		<h2>
			<font color="#039">Jadwal Praktikum</font>
		</h2>
	</center>
	<br>

	<table id="hor-minimalist-b" align="center">
		<thead>
			<th scope="col">Nim</th>
			<th scope="col">Nama</th>
			<th scope="col">Modul Prakikum</th>
			<th scope="col">Tanggal</th>
			<th scope="col">Tukar</th>
			<th scope="col">Pindah</th>
		</thead>
		<tbody>
		<?php
		$jadwalmakul=mysql_query("SELECT a.id as iduser, b.id as idcourse, b.toleransi, c.id as idjadwal, a.nim, a.username, b.fullname, b.shortname,c.date
FROM mdl_user a INNER JOIN mdl_jadwal c ON a.id = c.userid INNER JOIN mdl_course b ON b.id = c.courseid
WHERE a.role=6 AND a.id='".$_SESSION['user_id']."' AND DATE(c.date)>=DATE(NOW()) ORDER BY c.date asc");

		while ($row=mysql_fetch_array($jadwalmakul)){

			echo "
			<tr>
			<td>".$row["nim"]."</td>
			<td>".$row["username"]."</td>
			<td>".$row["fullname"]."</td>
			<td>".tglSQL($row["date"])."</td>
			<td  align=center>";

			if(checkdatediffers($row["date"],$row["toleransi"])){
				echo 	"<a	href='index.php?page=dataTukar&id=".$row["idjadwal"]."'> <img src='mahasiswa/pindahjadwal/images/tukar.png' alt='submit'></a>";

			} echo "</td>
			<td align=center><a	href='index.php?page=dataPindah&id=".$row["idjadwal"]."'> <img src='mahasiswa/pindahjadwal/images/pindah.png' alt='submit'></a></td></tr>
			";
		}
		echo "
		</tbody></table>";
}
else {
	echo "<script>alert('Login dulu.');";
	echo "document.location.replace('index.php');";
	echo "</script>";
}

?>

</body>
</html>
</style>
