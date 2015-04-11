<?php
$connected =mysql_connect('localhost','root','');
if (!$connected){
die ("koneksi ke my sql server gagal");
}
else {
}
$retval=mysql_select_db("db_lms",$connected);
IF(! $retval){
die ("database tidak dapat di akses");
}
?>