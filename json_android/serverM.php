<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
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
	$username3 = $_GET['username3'];
	$password3 = MD5($_GET['password3']);
	$s="aktif";
	$s1="nonaktif";

	
if(!empty($username3) && !empty($password3))
	{	
$sql="SELECT * FROM  tb_mahasiswa WHERE username='$username3' and password='$password3'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
while ($data = mysql_fetch_assoc($result))
  {
	if($data['status']==$s){
		echo '{"response":{"error": "aktifM"}}';
	}
	if($data['status']==$s1){
		echo '{"response":{"error": "nonaktifM"}}';
	}
  }
  
}
else {
	echo '{"response":{"error": "0"}}';
} 

}


?>