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
	$username2 = $_GET['username2'];
	$password2 = MD5($_GET['password2']);
	$s="aktif";
	$s1="nonaktif";

	
if(!empty($username2) && !empty($password2))
	{	
$sql="SELECT * FROM  tb_user WHERE username='$username2' and password='$password2'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
while ($data = mysql_fetch_assoc($result))
  {
	if($data['status']==$s){
		echo '{"response":{"error": "aktifA"}}';
	}
	if($data['status']==$s1){
		echo '{"response":{"error": "nonaktifA"}}';
	}
  }
  
}
else {
	echo '{"response":{"error": "0"}}';
} 

}


?>