<?php
if (isset($_GET['id'])){
	$idjadwal=$_GET['id'];
	$sql= mysql_query("SELECT a.id as iduser2, b.id as idcourse, c.id as idjadwal, a.nim, a.username, b.id, b.fullname, b.shortname,c.date
				FROM mdl_user a INNER JOIN mdl_jadwal c ON a.id = c.userid INNER JOIN mdl_course b ON b.id = c.courseid
WHERE a.role=6 AND a.id!='".$_SESSION['user_id']."' AND b.id='".$_SESSION['idcourse']."' AND c.id='$idjadwal'");
	$row=mysql_fetch_array($sql);
	$_SESSION['idjadwalmhs2']=$row["idjadwal"];
	$_SESSION['iduser2']=$row["iduser2"];

}

if(isset($_POST['simpan']) && !empty($_POST['alasan'])){
	$insert=mysql_query("INSERT INTO mdl_message VALUES(NULL, '".$_SESSION['user_id']."', 'K/A', '".$_SESSION['idjadwalmhs1']."', '".$_SESSION['idjadwalmhs2']."', 'pindahrequest', 'N','".$_SESSION['datenow']."', '".$_SESSION['$timenow']."', '".$_POST['alasan']."','pindahrequest')");
	echo "<script>alert('Permintaan pindah jadwal terkirim.');";
	echo "document.location.replace('index.php?page=listJadwal');";
	echo "</script>";
}elseif (isset($_POST['simpan']) && empty($_POST['alasan'])){
	echo "<script>alert('data tidak boleh kosong');</script>";
}
?>
<html>
<head>
<title></title>
</head>
<body>
	<form action="" method="post">
		<table align="center">
			<tr>
				<td>Alasan Pindah :</td>
			</tr>
			<tr>
				<td><textarea rows='5' cols='30' name='alasan'></textarea>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="simpan" id="simpan" value="Kirim"></td>
			</tr>
		</table>
	</form>
</body>
</html>
