<?php 

error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<link type="text/css" href="include/datepicker/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="include/datepicker/jquery-1.3.2.js"></script>
<script type="text/javascript" src="include/datepicker/ui.core.js"></script>
<script type="text/javascript" src="include/datepicker/ui.datepicker.js"></script>

	
</head>

<body>
<form action="admin_import_excel.php" method="post" enctype="multipart/form-data">
  <p><strong class="style3">&nbsp;Import Data Alat Menggunakan Excel </strong></p>
  <p>&nbsp;Untuk mengimport file excel format file harus sama pada link download dibawah ini:<br />
&nbsp;dan format file harus bertipe .xls <br />
&nbsp;<a href="master_excel_alat.xls">MasterFile Disini</a><br />
    <br />
		&nbsp; &nbsp;
		<input type="file" name="upfile"/>
		<br />
		&nbsp; &nbsp;
		<input type="submit" value="IMPOR" name="submit_import"/>
    	</p>
	</form>
<form action="act_insert_inventaris.php" method="post" enctype="multipart/form-data" name="form1" id="form1" align="center">
		
  <table width="606" border="0" cellpadding="5" cellspacing="0" align="center">
    <!--DWLayoutTable-->
    <tr>
      <td height="44" colspan="3" valign="top"><span class="style3">Form Input Inventaris </span></td>
    </tr>
    <tr>
      <td width="183" align="left" valign="top" bgcolor="#CCCCCC">Kode Alat </td>
      <td width="3" align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td width="390" align="left" valign="top" bgcolor="#CCCCCC">
        <input name="kode_barang" type="text"   />
        </td>
    </tr>
    <tr>
      <td align="left" valign="top">Nama Alat </td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><span class="style1 ">
        <input name="nama_barang" type="text" size="25" />
      </span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Kode Laboratorium </td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC"><span class="style1">
        <label>
        <select name="kode_lab">
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
          <option>Laboratorium Dasar Teknik Elektro</option>
        </select>
        </label>
      </span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Tanggal Pengajuan </td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">
	  <input type="text"  name="tgl_pengajuan" id="tanggal"/>
	  </td>
    </tr>
    <tr>
      <td align="left" valign="top">Tanggal Masuk </td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top">
	  <input type="text"  name="tgl_masuk" id="tanggal2" />
	  </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Tanggal Penghapusan </td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">
	  <input type="text"  name="tgl_penghapusan" id="tanggal3"/>
	  </td>
    </tr>
    <tr>
      <td align="left" valign="top">Spesifikasi</td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><span class="style1">
        <textarea name="spesifikasi" cols="25"></textarea>
      </span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Jenis praktikum</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">
	  <input type="text"  name="jenis_prak" id="tanggal3"/>
	  </td>
    </tr>
    <tr>
      <td align="left" valign="top">Tahun Pembuatan </td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top">
	  <span class="style1">
        <label>
        <select name="tahun_pem">
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
        <input name="stok" type="text" size="25" /></span>
		</td>
    </tr>
	<tr>
      <td align="left" valign="top">Satuan</td>
      <td align="left" valign="top">:</td>
      <td align="left" valign="top"><span class="style1">
        <label>
        <select name="satuan">
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
        <input name="ket" type="text" size="25" />
      </span></td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#CCCCCC">Foto Alat</td>
      <td align="left" valign="top" bgcolor="#CCCCCC">:</td>

      <td align="left" valign="top" bgcolor="#CCCCCC">
        <input type="file" name="foto" />
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
