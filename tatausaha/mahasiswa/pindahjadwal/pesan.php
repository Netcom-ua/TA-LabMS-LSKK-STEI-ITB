<?php
#ISI PESAN
#=========================================================================
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
include '../../config.php';
$iduser=$_SESSION['user_id'];
$no = $_GET['no'];

$pesan = mysql_query("SELECT a.*, b.username FROM mdl_message a INNER JOIN mdl_user b ON (a.useridfrom=b.id AND a.message='request') OR (a.useridto=b.id AND a.message='decline')  OR (useridto=b.id AND message='accept') OR (a.useridto=b.id AND a.message='pindahdecline')  OR (useridto=b.id AND message='pindahaccept') WHERE a.id='$no'");
$rowpesan=mysql_fetch_array($pesan);
?>
<html>
<head>
<title>Notifikasi</title>
</head>

<body topmargin="0" leftmargin="0">

	<div id="content">
	<h3 style="text-align: center;">Pesan Dari <?php echo $rowpesan['username'];?> <?php echo $rowpesan['time']?></h3>
<br>		
<?php
		//$no = $_GET['no'];

		$cek=mysql_query("SELECT a.id as idpeminta,b.id as idcourse, d.useridfrom, d.useridto,d.message,d.kordasmessage, d.id as idmessage, d.idjadwalfrom, d.idjadwalto,a.nim, a.username, b.fullname, c.date , d.date as datereq, d.time as timereq FROM mdl_user a INNER JOIN mdl_jadwal c ON a.id=c.userid INNER JOIN mdl_course b ON b.id=c.courseid INNER JOIN mdl_message d ON c.id=d.idjadwalfrom WHERE d.id=$no and ((d.useridto='$iduser' ) OR (d.useridfrom='$iduser' ))");
		$q=mysql_fetch_array($cek);

		if ($q["message"]=="request" && $q["useridto"]==$iduser){
			$tampil=mysql_query("SELECT b.id as idcourse, d.message, d.id as idmessage, d.kordasmessage,d.idjadwalfrom, d.idjadwalto, d.useridfrom, d.useridto,a.nim, a.username,(SELECT b1.nim FROM mdl_message a1 INNER JOIN mdl_user b1 ON a1.useridto = b1.id WHERE a1.id=d.id)as nim2,(SELECT b2.username FROM mdl_message a2 INNER JOIN mdl_user b2 ON a2.useridto = b2.id WHERE a2.id=d.id)as nama2,
(SELECT i.date FROM mdl_jadwal i INNER JOIN mdl_message j ON i.id = j.idjadwalto WHERE j.id=d.id)as datemhs2, b.fullname, c.date, d.date as datereq, d.time as timereq 
FROM 
mdl_user a INNER JOIN mdl_jadwal c 
ON 
a.id=c.userid 
INNER JOIN mdl_course b 
ON 
b.id=c.courseid 
INNER JOIN mdl_message d 
ON 
c.id=d.idjadwalfrom 
WHERE d.useridto='$iduser' AND d.message='request' AND d.id='$no'");
			?>
			
			
		<table id="hor-minimalist-b" align="center">
			<tr>
				<th scope="col">Nim</th>
				<th scope="col">Nama Peminta</th>
				<th scope="col">Mata Kuliah</th>
				<th scope="col">Tanggal</th>
				<th scope="col">Tanggal Anda</th>
				<th scope="col" colspan="2">Action</th>
			</tr>
			<tr>
			<?php
			while ($row=mysql_fetch_array($tampil)){
				echo "
		<td>".$row["nim"]."</td>
		<td>".$row["username"]."</td>
		<td>".$row["fullname"]."</td>
		<td>".tglSQL($row["date"])."</td>
		<td>".tglSQL($row["datemhs2"])."</td>
		";?>
				<td><a
					href="javascript:if(confirm('Anda yakin akan menukar jadwal dengan	 <?php echo $row["username"];?> ?')){document.location='index.php?page=prosesTukar&action=accept';}"><img
						src='mahasiswa/pindahjadwal/images/accept.png' alt='accept'> </a>
				</td>
				<td><a
					href="javascript:if(confirm('Anda yakin mengabaikan pertukaran jadwal dari	 <?php echo $row["username"];?> ?')){document.location='index.php?page=prosesTukar&action=decline';}"><img
						src='mahasiswa/pindahjadwal/images/decline.png' alt='decline'> </a>
				</td>
			</tr>
			<?php
			$_SESSION['makulfrom']=$row['idcourse'];
			$_SESSION['idmessage']=$row['idmessage'];
			$_SESSION['peminta']=$row["useridfrom"];
			$_SESSION['jadwalto']=$row["idjadwalto"];
			$_SESSION['jadwalfrom']=$row["idjadwalfrom"];
			}
		}else if ($q["message"]=="accept" && $q["kordasmessage"]=="accept"){
			echo "<center><h3>Pertukaran SUKSES dan disetujui oleh kordas, silahkan cek jadwal anda.<h3></center>";
			$update_message=mysql_query("UPDATE mdl_message SET status='Y' WHERE id='".$q["idmessage"]."'");

		}else if ($q["message"]=="decline"){
			echo "<center><h3>Pertukaran jadwal ditolak oleh praktikan yang dituju.<h3></center>";
			$update_message=mysql_query("UPDATE mdl_message SET status='Y' WHERE id='".$q["idmessage"]."'");

		}else if ($q["message"]=="accept" && $q["kordasmessage"]=="request"){
			echo "<center><h3>Pertukaran jadwal diterima oleh praktikan yang dituju, namun belum di konfirmasi oleh kordas.<h3></center>";
			$update_message=mysql_query("UPDATE mdl_message SET status='Y' WHERE id='".$q["idmessage"]."'");

		}else if ($q["message"]=="accept" && $q["kordasmessage"]=="decline"){
			echo "<center><h3>Pertukaran jadwal GAGAL karena tidak disetujui oleh kordas.<h3></center>";
			$update_message=mysql_query("UPDATE mdl_message SET status='Y' WHERE id='".$q["idmessage"]."'");
		
		}else if ($q["message"]=="pindahaccept" && $q["kordasmessage"]=="pindahaccept"){
			echo "<center><h3>Pindah jadwal SUKSES, silahkan cek jadwal anda.<h3></center>";
			$update_message=mysql_query("UPDATE mdl_message SET status='Y' WHERE id='".$q["idmessage"]."'");
		
		}else if ($q["message"]=="pindahdecline" && $q["kordasmessage"]=="pindahdecline"){
			echo "<center><h3>Pindah jadwal GAGAL karena tidak detujui";
			$update_message=mysql_query("UPDATE mdl_message SET status='Y' WHERE id='".$q["idmessage"]."'");
		}
			
			
		?>

		</table>
		<?php
		//set sudah dibaca = Y kalau sudah dibaca $update =
		//mysql_query("UPDATE mdl_message SET status='Y' WHERE id=$no AND	useridto='$iduser'"); ?>

	</div>
</body>

</html>
</style>
