<?php
// panggil berkas koneksi.php
require '../include/koneksi.php';

?>
<div class="widget-content">
<table class="table table-striped table-bordered">
<thead>
	<tr>
		<th width="11%"></th>
		<th> NIM </th>
		<th> Nama </th>
		<th> Prodi </th>
		<th> Semester </th>
		<th> No Handphone</th>
		<th> Username </th>
		<th> Email </th>
		<th> Status </th>
		<th> Tanggal Daftar </th>
		<th class="td-actions"> </th>
	</tr>
</thead>
<tbody>
	<?php 
		$i = 1;
		$jml_per_halaman = 6; // jumlah data yg ditampilkan perhalaman
		$jml_data = mysql_num_rows(mysql_query("SELECT * FROM tb_mahasiswa"));
		$jml_halaman = ceil($jml_data / $jml_per_halaman);
		// query pada saat mode pencarian
		if(isset($_POST['cari'])) {
			$kunci = $_POST['cari'];
			echo "<strong>Hasil pencarian untuk kata kunci : $kunci</strong>";
			$query = mysql_query("
				SELECT * FROM tb_mahasiswa 
				WHERE nim LIKE '%$kunci%' 
				OR nama_mhs LIKE '%$kunci%'
				OR hp LIKE '%$kunci%'
				OR email LIKE '%$kunci%'
				OR status LIKE '%$kunci%'
			");
		// query jika nomor halaman sudah ditentukan
		} elseif(isset($_POST['halaman'])) {
			$halaman = $_POST['halaman'];
			$i = ($halaman - 1) * $jml_per_halaman  + 1;
			$query = mysql_query("SELECT * FROM tb_mahasiswa LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman");
		// query ketika tidak ada parameter halaman maupun pencarian
		} else {
			$query = mysql_query("SELECT * FROM tb_mahasiswa LIMIT 0, $jml_per_halaman");
		}
		
		// tampilkan data mahasiswa selama masih ada
		while($data = mysql_fetch_array($query)) {
			if($data['status']==1) {
				$status = "Aktif";
			} else {
				$status = "Tidak Aktif";
			}
		$status = $data['status'];
	?>
	<tr>
		<td class="alert alert-success"><img src="../mahasiswa/foto_mahasiswa/<?php echo $data['foto']?>" width=100 height=100 title="<?php echo $data['nama']?>" class="img-thumbnail"></td>
		<td class="alert alert-success"> <?php echo $data['nim']; ?> </td>
		<td class="alert alert-success"> <?php echo $data['nama_mhs']; ?> </td>
		<td class="alert alert-success"> <?php echo $data['prodi']; ?> </td>
		<td class="alert alert-success"> <?php echo $data['semester']; ?> </td>
		<td class="alert alert-success"> <?php echo $data['hp']; ?> </td>
		<td class="alert alert-success"> <?php echo $data['username']; ?> </td>
		<td class="alert alert-success"> <?php echo $data['email']; ?> </td>
		<td class="alert alert-success"> <?php echo $data['status']; ?></td>
		<td class="alert alert-success"> <?php echo $data['tgl_daftar']; ?> </td>
		<td class="alert alert-success td-actions">
		<?php 
			if($status == 'aktif' ){
		?>
		<a href="konfirmasi.php?action=nonaktifmhs&nim=<?php echo $data['nim'] ?>" onclick="return confirm('Apakah Anda yakin merubah status menjadi Nonaktif atas nama : <?php echo $data['nama_mhs'];?> ?')"class="btn btn-pencil btn-small"><i class="btn-icon-only icon-pencil"> </i></a>
		<?php
		}else{
		?>
		<a href="konfirmasi.php?action=aktifmhs&nim=<?php echo $data['nim'] ?>" onclick="return confirm('Apakah Anda yakin merubah status menjadi aktif atas nama : <?php echo $data['nama_mhs'];?> ?')"class="btn btn-pencil btn-small"><i class="btn-icon-only icon-pencil"> </i></a>
		<?php
		}
		?>
		<a href="konfirmasi.php?action=delmhs&nim=<?php echo $data['nim'] ?>" onclick="return confirm('Apakah Anda yakin menghapus data Mahasiswa : <?php echo $data['nama_mhs'];?> ?')"class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
	</tr>
	<?php
		$i++;
		}
	?>
</tbody>
</table>
<?php if(!isset($_POST['cari'])) { ?>
<!-- untuk menampilkan menu halaman -->
<div class="pagination pagination-right">
  <ul>
    <?php for($i = 1; $i <= $jml_halaman; $i++) { ?>
    <li class="halaman" id="<?php echo $i ?>"><a href="#"><?php echo $i ?></a></li>
    <?php } ?>
  </ul>
</div>
</div>
<?php } ?>
<br>