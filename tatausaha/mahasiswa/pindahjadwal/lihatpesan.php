<?php
#isi dalam header pesan
#======================================================
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
include '../../config.php';
$iduser=$_SESSION['user_id'];
//$pesan = mysql_query("SELECT a.*, b.username FROM mdl_message a INNER JOIN mdl_user b ON a.useridto=b.id  WHERE useridto='$iduser' AND status='N'");
$pesan = mysql_query("SELECT a.*, b.username FROM mdl_message a INNER JOIN mdl_user b ON (a.useridfrom=b.id AND a.message='request') OR (a.useridto=b.id AND a.message='decline')  OR (useridto=b.id AND message='accept') OR (a.useridto=b.id AND a.message='pindahdecline')  OR (useridto=b.id AND message='pindahaccept') WHERE a.status='N' AND ((useridto='$iduser' AND message='request') OR (useridfrom='$iduser' AND message='decline')  OR (useridfrom='$iduser' AND message='accept') OR (useridfrom='$iduser' AND message='pindahdecline')  OR (useridfrom='$iduser' AND message='pindahaccept')) ORDER BY a.date desc, a.time desc");
$j = mysql_num_rows($pesan);
if($j>0){
	echo "<table border=0 width=100% style=\"font-size:10pt\">";
}else{
	die("<font color=red size=1>Tidak ada pesan baru yang belum dibaca</font>");
}
while($p = mysql_fetch_array($pesan)){
	echo "<tr><td onmouseover=\"this.style.backgroundColor='#F0F0F0'\"
     onmouseout=\"this.style.backgroundColor='#F8F8F8'\">
     <a href=index.php?page=pesan&no=".$p['id'].">Pesan dari : ".$p['username']."</a><br>
     Waktu : ".tglSQL($p['date'])." ". $p['time']."</td></tr>";

}
echo "</table>";
?>
