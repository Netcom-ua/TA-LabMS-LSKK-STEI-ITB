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
	$username1 = $_GET['username1'];
	$password1 = MD5($_GET['password1']);
	$s="aktif";
	$s1="nonaktif";

	
if(!empty($username1) && !empty($password1))
	{	
$sql="SELECT * FROM  tb_dosen WHERE username='$username1' and password='$password1'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
while ($data = mysql_fetch_assoc($result))
  {
	if($data['status']==$s){
		echo '{"response":{"error": "aktifD"}}';
	}
	if($data['status']==$s1){
		echo '{"response":{"error": "nonaktifD"}}';
	}
  }
  
}
else {
	echo '{"response":{"error": "0"}}';
} 

}


?>