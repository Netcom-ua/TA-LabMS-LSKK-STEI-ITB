<?php
#Cek Pesan Baru atau belum di klik 
#=============================================
include '../../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.
include '../../config.php';
$iduser=$_SESSION['user_id'];

$pesan = mysql_query("SELECT id FROM mdl_message WHERE (useridto='$iduser' AND message='request' AND status='N') OR (useridfrom='$iduser' AND message='decline' AND status='N') OR (useridfrom='$iduser' AND message='accept' AND status='N') OR (useridfrom='$iduser' AND message='pindahdecline' AND status='N') OR (useridfrom='$iduser' AND message='pindahaccept' AND status='N')");
$j = mysql_num_rows($pesan);
if($j>0){
    echo $j;
}
?>
