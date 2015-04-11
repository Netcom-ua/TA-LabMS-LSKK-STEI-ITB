<?php
include '../include/koneksi.php';
//include '../tatausaha/login/functions.php';
//sec_session_start(); // Our custom secure way of starting a php session.

$id_matakuliah=$_POST['id'];
$tgl_daftar=$_POST['tgl_daftar'];

$update=mysql_query("UPDATE tb_matakuliah SET tgl_daftar ='{$tgl_daftar}' WHERE id='{$id_matakuliah}'");
	if ($update)
		{
		echo "<script>alert ('Update Berhasil');
		window.location.href = 'course_categories.php';</script>";
		}
		else
		{
		echo "<script>alert ('Info Panduan gagal di edit')</script>";
		}	
?>

