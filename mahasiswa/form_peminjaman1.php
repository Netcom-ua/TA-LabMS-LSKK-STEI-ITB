<?php
include '../include/koneksi.php';
//session_start(); 
error_reporting(0);

/* <ambil data user where data session> */
$user=mysql_query("select*from tb_mahasiswa where username='".$data['username']."'");
$datauser=mysql_fetch_assoc($user);

/* <cek tanggungan peminjaman> */
$cek=mysql_query("select status from tb_pinjam_atk where username='".$data['username']."' order by id_pinjam desc, tgl_pinjam desc");
$tampil=mysql_fetch_assoc($cek);

/* <ambil data alat yang dipilih> */
$_GET['Kode_Alat'];
$cek_alat=mysql_query("select stok from tb_atk where kode_alat='{$_GET['Kode_Alat']}'");
$tampil2=mysql_fetch_assoc($cek_alat);

if($tampil['status']=='Disetujui'){
	print '<script>alert ("Maaf Anda Masih memiliki tanggungan pinjaman alat"); window.location.href = "tampil_atk.php";</script>';
}
elseif($tampil['status'] == 'Belum Disetujui'){
	print '<script>alert ("Maaf Anda Masih memiliki tanggungan pinjaman alat"); window.location.href = "tampil_atk.php";</script>';
}
elseif($tampil2['stok'] != 'Tersedia'){
	print '<script>alert ("Maaf Alat yang anda pinjam tidak tersedia"); window.location.href = "tampil_atk.php";</script>';
	}
else{
?>


	  <?php 
		$Kode_Alat=$_GET['Kode_Alat'];
		$data1= mysql_query("select * from tb_atk where kode_alat='$Kode_Alat'");
		$hasil1 = mysql_fetch_array($data1);
		?>

		
			<form id="form" enctype="multipart/form-data"  action="act_pinjam.php" method="post" align="center">
					<div class="field">
						<input name="username"  type="hidden"  value="<?php echo $datauser['username']?>" size="20" readonly="readonly"/>
					</div>
					<label>Nama</label>
					<div class="field">
						<input name="nama_peminjam"  type="text"  value="<?php echo $datauser['nama_mhs']?>" size="20" readonly="readonly"/>
					</div>
					
					<div class="field">
						<input type="hidden" name="email"  value="<?php echo $datauser['email']?>" readonly="readonly"/>
					</div>

					<label>Kode Alat</label>
					<div class="field">
						<input type="text" name="kode_alat"  value="<?php echo $hasil1['kode_alat']?>" readonly="readonly"/>
					</div>

					<label>Nama Alat</label>
					<div class="field">
						<input type="text" name="nama_alat"  value="<?php echo $hasil1['nama_alat']?>" readonly="readonly"/>
					</div>
					

					<label>Tanggal Pinjam</label>
					<div class="field">
						<input type="text" name="tgl_pinjam"  value="<?php echo date("Y-m-d");?>" id="tgl_pinjam"/>
					</div>

					<label>Tanggal Kembali </label>
					<div class="field">
						<input  type="text"  name="tgl_kembali" placeholder="Tanggal"  id="tgl_kembali" />
					</div>

					<label>Dosen Penanggung Jawab </label>
					<div class="field">
						<select name="penanggung_jawab" size="1">
						  <option value="0″ selected="selected">Pilih Nama</option>
							<?php
								$query_limit=mysql_query("select * from tb_dosen where status='aktif'");
								while($row=mysql_fetch_array($query_limit))
								{
							?>
								<option value="<?php  echo $row['nama_dosen']; ?>"><?php  echo $row['nama_dosen']; ?></option>
							<?php
								}
							?>
						</select>
					</div>

						<button class="btn btn-primary">Pinjam Alat</button>
						<a href="tampil_atk.html" title="Edit" role="button" class="btn">Kembali</a>
					
			</form>
	

<?php } ?>