<?php 
/* session_start();
if($_SESSION['Level'] != Admin){
	print '<script>alert ("Maaf! Akses dilarang. Silakan login dulu sebagai Admin"); window.location.href = "index.php";</script>';
} */
?>
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
	$data8= mysql_query("select * from tb_inventaris where kode_alat='$Kode_Alat'");
	$hasil = mysql_fetch_array($data8);
	?>

<form action="act_simpan_edit_inventaris.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="547" border="0" cellpadding="5" cellspacing="0">
    <table width="606" border="0" cellpadding="5" cellspacing="0" align="center">
    <!--DWLayoutTable-->
    <tr>
      <td height="44" colspan="3" valign="top"><span class="style3">Form Input Inventaris </span></td>
    </tr>
    <tr>
      <td width="183" align="left" valign="top" bgcolor="#CCCCCC">Kode Alat </td>
      <td width="3" align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td width="390" align="left" valign="top" bgcolor="#CCCCCC">
        <input name="kode_barang" type="text" readonly="readonly" value="<?php echo $hasil['kode_alat']; ?>"  />
        </td>
    </tr>
    <tr>
      <td align="left" valign="top">Nama Alat </td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><span class="style1 ">
        <input name="nama_barang" type="text" value="<?php echo $hasil['nama_alat']; ?>" />
      </span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Kode Laboratorium </td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><span class="style1">
        <label>
        <select name="kode_lab" value="<?php echo $hasil['kode_lab']; ?>">
		<option><?php echo $hasil['kode_lab']; ?></option>
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
        <label>
        <select name="nama_lab">
			<option><?php echo $hasil['nama_lab']; ?></option>
          <option>Laboratorium Dasar Teknik Elektro</option>
        </select>
        </label>
      </span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Tanggal Pengajuan </td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">
	  <input type="text"  name="tgl_pengajuan" id="tanggal" value="<?php echo $hasil['tgl_pengajuan']; ?>"/>
	  </td>
    </tr>
    <tr>
      <td align="left" valign="top">Tanggal Masuk </td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top">
	  <input type="text"  name="tgl_masuk" id="tanggal2" value="<?php echo $hasil['tgl_masuk']; ?>"/>
	  </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Tanggal Penghapusan </td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">
	  <input type="text"  name="tgl_penghapusan" id="tanggal3"  value="<?php echo $hasil['tgl_penghapusan']; ?>"/>
	  </td>
    </tr>
    <tr>
      <td align="left" valign="top">Spesifikasi</td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><span class="style1">
        <textarea name="spesifikasi" cols="25" id="spek"><?php echo $hasil['spesifikasi']; ?>
		</textarea>
      </span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Jenis praktikum</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">
	  <input type="text"  name="jenis_prak" id="tanggal3" value="<?php echo $hasil['jenis_praktikum']; ?>"/>
	  </td>
    </tr>
    <tr>
      <td align="left" valign="top">Tahun Pembuatan </td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top">
	  <span class="style1">
        <label>
        <select name="tahun_pem">
          <option><?php echo $hasil['thn_pembuatan']; ?></option>
		  <option>2000</option>
		  <option>2001</option>
		  <option>2002</option>
		  <option>2003</option>
		  <option>2004</option>
		  <option>2005</option>
		  <option>2006</option>
		  <option>2007</option>
		  <option>2008</option>
		  <option>2009</option>
		  <option>2010</option>
		  <option>2011</option>
		  <option>2012</option>
		  <option>2013</option>
		  <option>2014</option>
		  <option>2015</option>
        </select>
        </label>
      </span>
	  </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Stok</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><span class="style1">
        <input name="stok" type="text" value="<?php echo $hasil['jumlah']; ?>" /></span>
		</td>
    </tr>
	<tr>
      <td align="left" valign="top">Satuan</td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><span class="style1">
        <label>
        <select name="satuan">
		<option><?php echo $hasil['satuan']; ?></option>
          <option>set</option>
		  <option>unit</option>
		  <option>buah</option>
		  <option>lainnya</option>
		 
        </select>
        </label>
      </span></td>
    </tr>
    <tr>
      <td align="left" valign="top">Keterangan</td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><span class="style1">
        <input name="ket" type="text" value="<?php echo $hasil['ket']; ?>" />
      </span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Foto Alat</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>

      <td align="left" valign="top" bgcolor="#CCCCCC">
        <input type="file" name="foto" value="<?php echo $hasil['foto']; ?>" />
      </td>
    </tr>
    <tr>
      <td height="43" align="right" valign="bottom"><label>
        <input type="submit" name="Submit" value="Submit" />
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
