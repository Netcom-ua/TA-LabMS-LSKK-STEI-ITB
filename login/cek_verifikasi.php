 <?php
 session_start();
 include'session.php';
 include'../include/koneksi.php';
 
$username = $_SESSION['username'];
$query="select * from tb_kode_verifikasi where username='$username'";
$result = $mysqli->query($query)
or die('<b>-- Query failed -- </b> ' .mysql_error());
$data = $result->fetch_array();
echo $query;
	
$data = $data['kode'];
//echo $data;

$kode=$_POST['kodever'];
if($kode==$data) //Mengambil data pada database

{
header("location:../mahasiswa");
}
else{
header("location:../salah");
}
?>