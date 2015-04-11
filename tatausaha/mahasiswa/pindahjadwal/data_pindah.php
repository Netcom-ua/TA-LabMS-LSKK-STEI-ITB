<?php
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
include '../../config.php';

if(isset($_SESSION['user_id'])){
$userid=$_SESSION['user_id'];
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

	#fungsi
	#===============================================
	function cekmaksimal($jumlahpaktikan,$maksimum){
		if ($jumlahpaktikan<$maksimum){
			return true;
		}
		else {
			return false;
		}

	}

	function datakosong(){
		#cek status message
		#=========================================
		$status=mysql_query("SELECT a.*, b.username FROM mdl_message a INNER JOIN mdl_user b ON a.useridfrom=b.id WHERE a.useridfrom='".$_SESSION['user_id']."' AND a.message='pindahrequest'");
		if (mysql_num_rows($status)!==0){
			echo "<center>jika ingin membatalkan perpindahan silahkan klik "?>
<a
	href="javascript:if(confirm('Anda yakin membatalkan pertukaran jadwal anda?')){document.location='index.php?page=prosesPindah&action=batal';}">
	batal</a>
</center>
<br>
			<?php
		}else {
			$sql2= mysql_query("SELECT a.id as idjadwal,b.id as idcourse,a . * , b . * ,
		(SELECT COUNT( c.id ) FROM mdl_jadwal c
INNER JOIN mdl_course d ON c.courseid = d.id
WHERE c.courseid = a.courseid
AND c.date = a.date 
) AS jumlahpraktikan
FROM mdl_jadwal a
INNER JOIN mdl_course b ON a.courseid = b.id
WHERE a.courseid = '".$_SESSION['idcourse']."'
AND DATE( a.date ) > DATE( NOW( ) ) AND a.userid != '".$_SESSION['user_id']."'
GROUP BY b.waktu ORDER BY a.date ASC ");

			echo "<table id=hor-minimalist-b align=center>
		<th scope=col>Praktikum</th>
		<th scope=col>Tanggal</th>
		<th scope=col>Waktu</th>
		<th scope=col>Praktikan</th>
		<th scope=col>Pindah</th>";

			while ($row=mysql_fetch_array($sql2)){

				if (cekmaksimal($row["jumlahpraktikan"], $row["praktikan_max"])){
					/*$sql2= mysql_query("SELECT a.*,b.*,(SELECT COUNT(c.id) FROM mdl_jadwal c
					 INNER JOIN mdl_course d ON c.courseid = d.id
					 WHERE c.courseid = '".$_SESSION['idcourse']."'
					 AND c.date=a.date)as jumlahpraktikan FROM mdl_jadwal a INNER JOIN mdl_course b ON a.courseid = b.id WHERE a.courseid='".$_SESSION['idcourse']."' AND DATE(a.date)>=DATE(NOW()) HAVING count(jumlahpraktikan)<b.praktikan_max ORDER BY a.date asc");
					 */

					echo "<tr>
			<td>".$row["fullname"]."</td>
			<td>".tglSQL($row["date"])."</td>
			<td>".$row["waktu"]."</td>
			<td>".$row["jumlahpraktikan"]."</td>
			<td align=center>";?>
<a
	href="javascript:if(confirm('Anda yakin akan pindah jadwal pada <?php echo tglSQL($row["date"]);?> ?')){document.location='index.php?page=Pindah&id=<?php echo $row["idjadwal"];?>';}">
	<img src='mahasiswa/pindahjadwal/images/submit.gif' alt='submit'> </a>
					<?php
					echo "</td></tr>";
				}
			}
			echo "</table><br>";

		}
	}
	?>

<html>
<head>
<title>Data Tukar</title>
<!-- link rel="stylesheet" href="mahasiswa/pindahjadwal/gaya.css"
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


	<!--  div id="kepala">
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
			<h1>Pindah Jadwal</h1>
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
			<tr>
				<td colspan="2"></td>
				<td><input name="Cek" type="submit" value="Cek" id="ceks"> <input
					name="kosong" type="submit" value="Jadwal Kosong" id="kosong">
				</td>
			</tr>
		</table>

	</form>
	<br>


	<?php
	#cek date button
	#===============================================================
	if(isset($_POST['kosong'])){
		datakosong();
	}
	if(isset($_POST['Cek'])){
		$tanggaltujuanpost=tglSQL2($_POST['tanggal']);
		$tanggaltujuan = new DateTime($_POST['tanggal']);
		$tanggalsekarang = new DateTime();

		#cek tanggal pindah
		#========================================
		if($tanggaltujuan >= $tanggalsekarang){

			#cek status message
			#=========================================
			$status=mysql_query("SELECT a.*, b.username FROM mdl_message a INNER JOIN mdl_user b ON a.useridfrom=b.id WHERE a.useridfrom='".$_SESSION['user_id']."' AND a.message='pindahrequest'");
			if (mysql_num_rows($status)!==0){
				echo "<center>jika ingin membatalkan perpindahan silahkan klik "?>
	<a
		href="javascript:if(confirm('Anda yakin membatalkan pertukaran jadwal anda?')){document.location='index.php?page=prosesPindah&action=batal';}">
		batal</a>
	</center>
	<br>
	<?php
			}else {
				#sql data pencarian
				#===========================================
				$sql= mysql_query("SELECT a.id as idjadwal,b.id as idcourse, a. * , b.* ,
		(SELECT COUNT( c.id ) FROM mdl_jadwal c
INNER JOIN mdl_course d ON c.courseid = d.id
WHERE c.courseid = a.courseid
AND c.date = a.date AND c.userid=a.userid
) AS jumlahpraktikan
FROM mdl_jadwal a
INNER JOIN mdl_course b ON a.courseid = b.id
WHERE a.courseid = '".$_SESSION['idcourse']."'
AND a.date='$tanggaltujuanpost' AND a.userid !='$userid'
GROUP BY a.date,b.waktu  ORDER BY a.date ASC");	

				#Jika Data 0
				#=============================================
				if(mysql_num_rows($sql)==0){echo "<center><font color=red>Jadwal Tidak Ada Yang Kosong, Silahkan Cari Lagi</font></center><br>";}
				else{

					echo "<table id=hor-minimalist-b align=center>
		<th scope=col>Praktikum</th>
		<th scope=col>Tanggal</th>
		<th scope=col>Waktu</th>
		<th scope=col>Praktikan</th>
		<th scope=col>Pindah</th>";

					while ($row=mysql_fetch_array($sql)){
						if (cekmaksimal($row["jumlahpraktikan"], $row["praktikan_max"])){
							echo "<tr>
			<td>".$row["fullname"]."</td>
			<td>".tglSQL($row["date"])."</td>
			<td>".$row["waktu"]."</td>
			<td>".$row["jumlahpraktikan"]."</td>
			<td align=center>";?>
	<a
		href="javascript:if(confirm('Anda yakin akan pindah jadwal pada <?php echo tglSQL($row["date"]);?> ?')){document.location='index.php?page=Pindah&id=<?php echo $row["idjadwal"];?>';}">
		<img src='mahasiswa/pindahjadwal/images/submit.gif' alt='submit'> </a>
		<?php
		echo "</td></tr>";
						}
					}
					echo "</table><br>";
				}
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


