<?php
include '../include/koneksi.php';

error_reporting(0);
/* <ambil data user where data session> */
$user=mysql_query("select*from tb_mahasiswa where username='".$data['username']."' ");
$datauser=mysql_fetch_assoc($user);

/* <cek tanggungan peminjaman> */
$cek=mysql_query("select status from tb_pinjam where username='".$data['username']."' order by id_pinjam desc, tgl_pinjam desc");
$tampil=mysql_fetch_assoc($cek);

/* <ambil data alat yang dipilih> */
$_GET['Kode_Alat'];
$cek_alat=mysql_query("select jumlah from tb_inventaris where kode_alat='{$_GET['Kode_Alat']}'");
$tampil2=mysql_fetch_assoc($cek_alat);

if($tampil['status']=='Disetujui'){
	print '<script>alert ("Maaf Anda Masih memiliki tanggungan pinjaman alat"); window.location.href = "tampil_inventaris.php";</script>';
}
elseif($tampil['status'] == 'Belum Disetujui'){
	print '<script>alert ("Maaf Anda Masih memiliki tanggungan pinjaman alat"); window.location.href = "tampil_inventaris.php";</script>';
}
elseif($tampil2['jumlah'] <= 0){
	print '<script>alert ("Maaf Alat yang anda pinjam tidak tersedia"); window.location.href = "tampil_inventaris.php";</script>';
}
else{
?>


	  <?php 
		$Kode_Alat=$_GET['Kode_Alat'];
		$data1= mysql_query("select * from tb_inventaris where kode_alat='$Kode_Alat'");
		$hasil1 = mysql_fetch_array($data1);
		?>

			<div class="content" align="center" width="400">
			<form id="form" enctype="multipart/form-data"  action="act_pinjam_inv.php" method="post">
			
				<table class="table table-badge-success">
					<tr>
						<td class="alert-info" width="300"></td>
						<td class="alert-info"> Nama Mahasiswa</td>
						<td class="alert-info">
						<input name="username"  type="hidden"  value="<?php echo $datauser['username']?>" size="20" readonly="readonly"/>						
						<input name="nama_peminjam"  type="text"  value="<?php echo $datauser['nama_mhs']?>" size="20" readonly="readonly"/></td>
					</tr>
					
					<tr>
						<td class="alert-info"></td>
						<td class="alert-info">Kode Alat</td>
						<td class="alert-info"> 
						<input type="hidden" name="email"  value="<?php echo $datauser['email']?>" readonly="readonly"/>
						<input type="text" name="kode_alat"  value="<?php echo $hasil1['kode_alat']?>" readonly="readonly"/></td>
					</tr>
					
					<tr>
						<td class="alert-info"></td>
						<td class="alert-info">Nama Alat</td>
						<td class="alert-info"> 
						<input type="text" name="nama_alat"  value="<?php echo $hasil1['nama_alat']?>" readonly="readonly"/></td>
					</tr>
					
						<tr>
						<td class="alert-info"></td>
						
						<script>
							var j= <?php echo $hasil1['jumlah']?>;
							
						  function handleChange(input) {
							if (input.value < 0) input.value = 0;
							if (input.value > j) input.value = j;
						  }
						</script>
						<td class="alert-info">Jumlah Pinjam<?php echo $hasil1['jumlah']?> <?php echo $hasil1['satuan']?></td>
						<td class="alert-info"> 
						<input type="text" name="jumlah" placeholder="Jumlah"  onchange="handleChange(this);" /></td>
					</tr>
					
					<tr>
						<td class="alert-info"></td>
						<td class="alert-info"> Tanggal Pinjam</td>
						<td class="alert-info"> 
						<input type="text" name="tgl_pinjam"  value="<?php echo date("Y-m-d");?>" id="tgl_pinjam"/></td>
					</tr>
					
					<tr>
						<td class="alert-info"></td>
						<td class="alert-info"> Tanggal Kembali</td>
						<td class="alert-info"> 
						<input  type="text"  name="tgl_kembali" placeholder="Tanggal"  id="tgl_kembali" /></td>
					</tr>
					
					<tr>
						<td class="alert-info"></td>
						<td class="alert-info"> Dosen Penanggung Jawab</td>
						<td class="alert-info"> 
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
						</select></td>
					</tr>
					
				</table>
				
						<button class="btn btn-primary">Pinjam Alat</button>
						<a href="tampil_inventaris.html" title="Edit" role="button" class="btn">Kembali</a>
					
			</form>
			</div>
	

<?php } ?>