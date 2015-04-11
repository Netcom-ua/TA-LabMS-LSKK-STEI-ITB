<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';


$connect = mysql_connect("$dbhost","$dbuser","$dbpass");
$dbconnect = mysql_select_db('db_sisfolab');

function tglSQL($tgl){
	$t=explode("-",$tgl);
	$t=$t[2].'-'.$t[1].'-'.$t[0];
	return $t;
}
function tglSQL2($tgl){
	$t=explode("/",$tgl);
	$t=$t[2].'-'.$t[0].'-'.$t[1];
	return $t;
}
function jam($jam){
	$t=explode(":",$jam);
	$t=$t[0].':'.$t[1];
	return $t;
}
$_SESSION['datenow']=date("Y-m-d");
$ontime= mktime(date('H')+5,date('i'),date('s'),0,0,0);
$_SESSION['$timenow']=date("H:i:s",$ontime);

if(!$connect)
{
	die('koneksi ke database gagal');
}if (!$dbconnect)
{
	die('database tidak ditemukan');
}

?>