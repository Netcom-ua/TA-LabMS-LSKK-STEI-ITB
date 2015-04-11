
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
.style3 {
	font-size: 16px;
	font-weight: bold;
}
.style5 {color: #FF0000; font-size: 10px; }
.style6 {font-size: 10px; font-color:red;}
-->
</style>
<link type="text/css" href="include/datepicker/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="include/datepicker/jquery-1.3.2.js"></script>
<script type="text/javascript" src="include/datepicker/ui.core.js"></script>
<script type="text/javascript" src="include/datepicker/ui.datepicker.js"></script>

	<script type="text/javascript"> 
      		$(document).ready(function(){
        	$("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          	changeMonth : true,
          	changeYear  : true
		  
        		});
      		});
	  
    	</script>
		<script type="text/javascript"> 
      		$(document).ready(function(){
        	$("#tanggal2").datepicker({
		dateFormat  : "yy-mm-dd", 
          	changeMonth : true,
          	changeYear  : true
		  
        		});
      		});
	  
    	</script>
    	<script type="text/javascript"> 
      		$(document).ready(function(){
        	$("#tanggal3").datepicker({
		dateFormat  : "yy-mm-dd", 
          	changeMonth : true,
          	changeYear  : true
		  
        		});
      		});
	  
    	</script>
</head>

<body>

<?php 
include"../include/koneksi.php";
	$Kode_Alat=$_GET['Kode_Alat'];
	$data= mysql_query("select * from tb_atk where kode_alat='$Kode_Alat'");
	$hasil = mysql_fetch_array($data);
	?>

<form action="act_simpan_edit_atk.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="534" border="0" cellpadding="5" cellspacing="0" align="center">
    <!--DWLayoutTable-->
    <tr>
      <td height="44" colspan="3" valign="top"><span class="style3">Form Edit Alat </span></td>
    </tr>
    <tr>
      <td width="170" align="left" valign="top" bgcolor="#CCCCCC">Kode Alat </td>
      <td width="3" align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td width="331" align="left" valign="top" bgcolor="#CCCCCC"><label>
        <input name="kode_alat" readonly="readonly" type="text"  value="<? echo $hasil['kode_alat']?>" size="15"  />
        </label>
      <span class="style5">* </span></td>
    </tr>
    <tr>
      <td align="left" valign="top">Nama Alat </td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><span class="style1 ">
        <input name="nama_alat" type="text" size="25"  value="<? echo $hasil['nama_alat']?>"/>
        <label> </label>
        <span class="style5">* </span></span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Kode Ruangan </td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><span class="style1">
        <label> </label>
        <label>
        <select name="kode_lab" value=<? echo $hasil['kode_lab']?>>
          <option>Ruang TU</option>
          <option>Ruang 1</option>
          <option>Ruang 2</option>
        </select>
        </label>
      </span></td>
    </tr>
    <tr>
      <td align="left" valign="top">Nama Labor </td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><span class="style1">
        <label> </label>
        <label>
        <select name="nama_lab" value="<? echo $hasil['nama_lab']?>">
          <option>Laboratorium Dasar Teknik Elektro</option>
        </select>
        </label>
      </span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Tanggal Masuk </td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">
	  <input type="text"  name="tgl_masuk" id="tanggal" value="<? echo $hasil['tgl_masuk']?>"/>
	  </td>
    </tr>
    <tr>
      <td align="left" valign="top">Tanggal Pengajuan </td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top">
	  <input type="text"  name="tgl_pengajuan" id="tanggal2" value="<? echo $hasil['tgl_pengajuan']?>"/>
	  </td>
    </tr>
    <tr>
      <td align="left" valign="top">Tanggal Penghapusan </td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top">
	  <input type="text"  name="tgl_penghapusan" id="tanggal3" value="<? echo $hasil['tgl_pengapusan']?>"/>
	  </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Type</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><span class="style1">
        <input name="tipe" type="text" size="25"  value="<? echo $hasil['tipe']?>"/>
        <label> </label>
      <span class="style5">* </span></span></td>
    </tr>
    <tr>
      <td align="left" valign="top">Spesifikasi</td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><span class="style1">
        <textarea name="spesifikasi" cols="25"><? echo $hasil['spesifikasi']?></textarea>
        <label> </label>
        <span class="style5">* </span></span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Stok</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><span class="style1">
        <label>
        <select name="stok">
          <option><?php echo $hasil['stok']?></option>
		  <option>Tersedia</option>
		  <option>Tidak Tersedia</option>
        </select>
        </label>
        <label> </label>
      <span class="style5">* </span></span></td>
    </tr>
	
    <tr>
      <td align="left" valign="top">Keterangan</td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><span class="style1">
        <input name="ket" type="text" size="25"  value="<? echo $hasil['ket']?>"/>
        <label> </label>
        <span class="style5">*</span> </span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Foto Alat</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><label>
        <input type="file" name="foto" /> 
      </label></td>
    </tr>
    <tr>
      <td height="43" align="right" valign="bottom"><label>
        <input type="submit" name="update" value="Simpan" />
        </label>      </td>
      <td valign="bottom">&nbsp;</td>
      <td valign="bottom"><input type="reset" name="Submit2" value="Reset" /></td>
    </tr>
    <tr>
      <td height="1"></td>
      <td></td>
      <td></td>
    </tr>
  </table>
</form>
</body>
</html>
