<?php
//session_start(); 
error_reporting(0);
if(isset($_GET['Id'])) {
        $sql = "select * from tb_pinjam where id_pinjam = '{$_GET['Id']}'";
		$result = mysql_query($sql) or die("" . mysql_error());
		$data = mysql_fetch_array($result);
	}
	mysql_close($connected);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

</head>
<body>

<form  name="form1" id="form1" method="post" action="act_pengembalian.php">
	
	<label>Username</label>
	<div class="field">
		<input name="username"  type="text"  value="<?php echo $data['username']?>" size="20" readonly="readonly"/>
	</div>

	<label>Nama Peminjam</label>
	<div class="field">
		<input type="text" name="nama"  value="<?php echo $data['nama_peminjam']?>" readonly="readonly"/>
	</div>

	<label>Email</label>
	<div class="field">
		<input type="text" name="email"  value="<?php echo $data['email']?>" readonly="readonly"/>
	</div>

	<label>Kode Alat</label>
	<div class="field">
		<input type="text" name="kode_alat"  value="<?php echo $data['kode_alat']?>" readonly="readonly"/>
	</div>

	<label>Nama Alat</label>
	<div class="field">
		<input type="text" name="nama_alat"  value="<?php echo $data['nama_alat']?>" readonly="readonly"/>
	</div>

	<label>Tanggal Pinjam</label>
	<div class="field">
		<input type="text" name="tgl_pinjam"  value="<?php echo $data['tgl_pinjam']?>" readonly="readonly"/>
	</div>

	<label>Tanggal Kembali </label>
	<div class="field">
		<input  type="text"  name="tgl_kembali" value="<?php echo $data['tgl_kembali']?>" placeholder="Tanggal"  id="tgl_pinjam" />
	</div>
	
	<label>Status</label>
	<div class="field">
		<input type="text" name="status"  value="Sudah Dikembalikan" readonly="readonly"/>
	</div>
	
	<label>Jumlah </label>
	<div class="field">
		<input  type="text"  name="jumlah" value="<?php echo $data['jumlah']?>" placeholder="Tanggal"  id="tgl_pinjam" />
	</div>

	<label>Dosen Penaanggung Jawab </label>
	<div class="field">
		<input type="text" name="penanggung_jawab"  value="<?php echo $data['penanggung_jawab']?>" readonly="readonly"/>
	</div>



	<table width="561" border="0" cellpadding="5" cellspacing="0">
		<tr>
			<td>&nbsp;</td>
			<td>
			<input type="submit" name="submit" value="Simpan" ></input>
			<input type="reset" name="Submit2" value="Reset" ></input>
			</td>
			<td>
			
			</td>
		</tr>
	</table> 
</form>
</body>
</html>
