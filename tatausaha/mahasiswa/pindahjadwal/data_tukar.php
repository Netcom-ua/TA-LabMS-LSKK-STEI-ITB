<?php
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
include '../../config.php';
if(isset($_SESSION['user_id'])){

	#get id jadwal
	#===============================================================
	if(isset($_GET['id'])){
		$idjadwal=$_GET['id'];
		$jadwalmakul=mysql_query("SELECT a.id as iduser, b.id as idcourse, b.toleransi, c.id as idjadwal, a.nim, a.username, b.fullname, b.shortname,c.date
FROM mdl_user a INNER JOIN mdl_jadwal c ON a.id = c.userid INNER JOIN mdl_course b ON b.id = c.courseid
WHERE a.role=6 AND a.id='".$_SESSION['user_id']."' AND c.id='$idjadwal'");

		$row=mysql_fetch_array($jadwalmakul);

		$_SESSION['tanggal'] = $row["date"];
		$_SESSION['namamakul'] = $row["fullname"];
		$_SESSION['idjadwalmhs1'] = $row["idjadwal"];
		$_SESSION['idcourse'] = $row["idcourse"];
		$_SESSION['toleransi']=$row["toleransi"];

	}
	?>

<html>
<head>
<title>Data Tukar</title>
<!--  link rel="stylesheet" href="mahasiswa/pindahjadwal/gaya.css"
	type="text/css">
<link rel="stylesheet" type="text/css" href="css/menu3.css">
<script type="text/javascript"
	src="mahasiswa/pindahjadwal/jquery-1.4.3.min.js"></script>
<script type="text/javascript"
	src="mahasiswa/pindahjadwal/notifikasi.js"></script-->
<script type="text/javascript"
	src="mahasiswa/pindahjadwal/date/ui.core.js"></script>
<script type="text/javascript"
	src="mahasiswa/pindahjadwal/date/ui.datepicker.js"></script>
<link type="text/css" href="mahasiswa/pindahjadwal/date/base/ui.all.css"
	rel="stylesheet" />







</head>
<body topmargin="0" leftmargin="0">
	<div>
		<ul id="UTnavdocbwh">
			<li class="back" title="Kembali ke Halaman Course"><a
				href="?page=listJadwal"></a>
			</li>
		</ul>
	</div>


	<!--div id="kepala">
		<span id="pesan"> <img src="mahasiswa/pindahjadwal/images/notif.png">
			<div id="notifikasi"></div> </span>
	</div>


	<div id="info">
		<div id="loading">
			<br>Loading...<img src="mahasiswa/pindahjadwal/images/loading.gif">
		</div>
		<div id="konten-info"></div>
	</div-->


	<form action="" method="post">
		<center>
			<h1>Tukar Jadwal</h1>
		</center>
		<table align="center" border=1>
			<tr>
				<td colspan="3">Jadwal</td>

			</tr>
			<tr>
				<td>Tanggal yang dipilih</td>
				<td>:</td>
				<td><b> <?php echo tglSQL($_SESSION['tanggal']);?> </b>
				</td>
			</tr>
			<tr>
				<td>Praktikum</td>
				<td>:</td>
				<td><b> <?php echo $_SESSION['namamakul'];?> </b>
				</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp</td>
			</tr>
			<tr>
				<td colspan="3">Cari Jadwal</td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<!--td><input name="tanggal" type="Date"
					value="<?php echo date("d/m/Y");?>"></td-->
				<td><input type="text" size="10" id="datepicker" name="tanggal" /> <input
					type="text" size="30" id="alternate" name="tanggal1" readonly />
				</td>
			</tr>
			<!--tr>
				<td><select name="berdasarkan">
						<option value="nim">Nim</option>
						<option value="username">Nama</option>
				</select></td>
				<td>:</td>
				<td><input type="text" name="isi">
			
			</tr-->
			<tr>
				<td colspan="2"></td>
				<td><input name="Cek" type="submit" value="Cek" id="ceks">
				</td>
			</tr>
		</table>

	</form>
	<br>


	<?php

	#cek date button
	#===============================================================

	if(isset($_POST['Cek'])){
		$tanggaltujuanpost=tglSQL2($_POST['tanggal']);
		$tanggaltujuan = new DateTime($_POST['tanggal']);
		$tanggalsekarang = new DateTime();

		#cek tanggal tukar
		#========================================
		if($tanggaltujuan >= $tanggalsekarang){
			$diff = $tanggaltujuan->diff($tanggalsekarang);

			#cek tanggal tukar lebih dari toleransi hari dari hari ini
			#==================================================
			if($diff->days >= $_SESSION['toleransi']){

				#cek status message
				#=========================================
				$status=mysql_query("SELECT a.*, b.username FROM mdl_message a INNER JOIN mdl_user b ON a.useridfrom=b.id WHERE a.useridfrom='".$_SESSION['user_id']."' AND a.message='request'");
				if (mysql_num_rows($status)!==0){

					echo "<center>jika ingin membatalkan pertukaran silahkan klik "?>
	<a
		href="javascript:if(confirm('Anda yakin membatalkan pertukaran jadwal anda?')){document.location='index.php?page=prosesTukar&action=batal';}">
		batal</a>
	</center>
	<?php
				}else {
					#sql data pencarian
					#===========================================
					$sql= mysql_query("SELECT a.id as iduser2, b.id as idcourse, c.id as idjadwal, a.nim, a.username, b.id, b.fullname, b.shortname,c.date
				FROM mdl_user a INNER JOIN mdl_jadwal c ON a.id = c.userid INNER JOIN mdl_course b ON b.id = c.courseid
WHERE a.role=6 AND a.id!='".$_SESSION['user_id']."' AND b.id='".$_SESSION['idcourse']."' AND c.date='$tanggaltujuanpost' ORDER BY c.date");


					#Jika Data 0
					#=============================================
					if(mysql_num_rows($sql)==0){echo "<center><font color=red>Jadwal Tidak Ditemukan, Silahkan Cari Lagi</font></center><br>";}

					#Jika Data !0
					#=============================================
					else{
						echo "<table id=hor-minimalist-b align=center>
		<th scope=col>Nim</th>
		<th scope=col>Nama</th>
		<th scope=col>Mata Kuliah</th>
		<th scope=col>Tanggal</th>
		<th scope=col>Tukar</th>";

						while ($row=mysql_fetch_array($sql)){
							echo "<tr>
			<td>".$row["nim"]."</td>
			<td>".$row["username"]."</td>
			<td>".$row["fullname"]."</td>
			<td>".tglSQL($row["date"])."</td>
			<td align=center>";?>
	<a
		href="javascript:if(confirm('Anda yakin akan menukar data dengan <?php echo $row["username"];?> ?')){document.location='index.php?page=Tukar&id=<?php echo $row["idjadwal"];?>';}">
		<img src='mahasiswa/pindahjadwal/images/submit.gif' alt='submit'> </a>
		<?php
		echo "</td></tr>";
						}
						echo "</table>";
					}
				}
			}else{
				$hari= mktime(0,0,0,date('m'),date('d')+($_SESSION['toleransi']+1),date('Y'));
				print("<script>alert('Anda bisa memilih mulai tanggal ".date("d-M-Y",$hari)." keatas');</script>");
			}
		}else{
			print("<script>alert('Tanggal yang anda pilih telah lewat');</script>");
		}
	}

}
else {
	echo "<script>alert('Login dulu.');";
	echo "document.location.replace('index.php');";
	echo "</script>";
}
?>

</body>
<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({altField: '#alternate', altFormat: 'DD, d MM, yy'});
	});
	</script>
</html>


