<?php
session_start();
error_reporting(0);
include '../include/koneksi.php';
require_once'template/header.php';

if (isset($_POST["upload"])){
	if(!empty($_FILES["userfile"]) && ($_FILES["userfile"]["error"]==0)){
		$filename= basename($_FILES['userfile']['name']);

		//read extension
		$ekstensi=substr($filename, strrpos($filename,'.')+1);

		if($ekstensi=="xlsx" || $ekstensi=="XLSX"){
			include "proses_excel/proses_xlsx_.php";
		}
		else{
			echo "<script>alert('File ekstensi anda salah, ekstensi anda ".$ekstensi."');</script>";
		}

	}else{
		echo "<script>alert('No file uploaded');</script>";
	}
}
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <!--<div class="widget widget-nopad">-->
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Tata Usaha</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <h6 class="bigstats" align="center">Upload Jadwal Praktikum</h6>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
					<form method="post" enctype="multipart/form-data">
						<table align="center">
							<tr>
								<td>Silakan Pilih File Excel Ekstensi <b>.xlsx</b></td>
							</tr>
							<tr>
								<td><input name="userfile" type="file"></td>
							</tr>
							<tr>
								<td><input name="upload" type="submit" value="Import"></td>
							</tr>
						</table>
						
					</form>
					</div>
					<div id="big_stats" class="cf">
					<?php
					$query="select semester, akademik from tb_matakuliah";
					$result = $mysqli->query($query)
					or die('<b>-- Query failed -- </b> ' . mysql_error());
					$data = $result->fetch_array();
					?>
					<h3 class="bigstats" align="center">Jadwal Praktikum Mahasiswa Teknik Elektro <br/>Semester <?php echo $data['semester']?> Tahun Akademik <?php echo $data['akademik'] ?> </h3>
					<div id="big_stats" class="cf">
					<table class="table table-striped table-bordered">
						<thead>
						  <tr>
							<th> NIM </th>
							<th> Mahasiswa</th>
							<th> Matakuliah</th>
							<th> Kode Praktikum </th>
							<th> Nama Modul </th>
							<th> Asisten</th>
							<th> Koordinator Asisten</th>
							<th> Dosen</th>
							<th> Kelompok </th>
							<th> Ruangan </th>
							<th> Tanggal </th>
							<th> Pukul </th>
							<th class="td-actions"> </th>
						  </tr>
						</thead>
					<tbody>
						<!-- Menampilkan Jadwal Praktikum -->
						<?php 
						$query ="SELECT tb_jadwal_praktikum.nim, 	tb_jadwal_praktikum.id_asisten, tb_jadwal_praktikum.group, 
						tb_jadwal_praktikum.ruangan,
						tb_jadwal_praktikum.tanggal, tb_jadwal_praktikum.waktu, tb_matakuliah.nama_mk, 
						tb_matakuliah.semester,
						tb_matakuliah.akademik,
						tb_matakuliah.nip_dosen, tb_mdl_praktikum.kd_mk, tb_mdl_praktikum.kd_modul, tb_mdl_praktikum.nm_modul, tb_mdl_praktikum.singkatan, tb_mdl_praktikum.nama_kordas, tb_mahasiswa.nim, tb_mahasiswa.nama_mhs, tb_user.id_pengenal, tb_user.nama_user, tb_dosen.nama_dosen
					FROM tb_jadwal_praktikum
					INNER JOIN tb_matakuliah ON tb_jadwal_praktikum.kd_mk = tb_matakuliah.kd_mk
					INNER JOIN tb_mdl_praktikum ON tb_jadwal_praktikum.kd_modul = tb_mdl_praktikum.kd_modul
					INNER JOIN tb_mahasiswa ON tb_jadwal_praktikum.nim = tb_mahasiswa.nim
					INNER JOIN tb_user ON tb_jadwal_praktikum.id_asisten = tb_user.id_pengenal
					INNER JOIN tb_dosen ON tb_dosen.nid = tb_matakuliah.nip_dosen
					order by tb_jadwal_praktikum.tanggal, tb_jadwal_praktikum.waktu asc
					";
					//var_dump($query);
					$result = $mysqli->query($query)
						or die('<b>-- Query failed -- </b> ' . mysql_error());
						while ($data = $result->fetch_array()){
				?>
					  <tr>
						<td> <?php echo $data['nim']; ?> </td>
						<td> <?php echo $data['nama_mhs']; ?> </td>
						<td> <?php echo $data['nama_mk']; ?> </td>
						<td> <?php echo $data['kd_modul']; ?> </td>
						<td> <?php echo $data['nm_modul']; ?> </td>
						<td> <?php echo $data['nama_user']; ?> </td>
						<td> <?php echo $data['nama_kordas']; ?> </td>
						<td> <?php echo $data['nama_dosen']; ?> </td>
						<td> <?php echo $data['group']; ?> </td>
						<td> <?php echo $data['ruangan']; ?> </td>
						<td> <?php echo $data['tanggal']; ?> </td>
						<td> <?php echo $data['waktu']; ?></td>
						<td class="td-actions"><a href="#"onclick="return confirm('Edit Jadwal Mahasiswa : <?php echo $data['nama_mhs'];?> ?')"><i class="btn-icon-only icon-list" title="Konfirmasi"> </i></a><a href="konfirmasi.php?action=delmhs&nim=<?php echo $data['nim'] ?>" onclick="return confirm('Apakah Anda yakin menghapus data Mahasiswa : <?php echo $data['nama_mhs'];?> ?')"><i class="btn-icon-only icon-trash" title="Hapus"> </i></a></td>
					  </tr>
					  <?php 
						$no++;
					} 
						?>
					</tbody>
				  </table>
					
				</div>
                <!-- /widget-content --> 
              </div>
            </div>
          </div>
          	<!-- /widget-header -->
			
            <div class="widget-content">
			<div class="account-container register">
			<div class="content clearfix" align="center">
			<h6 class="bigstats" align="center">Upload Jadwal Praktikum</h6>
					<div class="login-fields">
					<p>Isi data dengan akurat dan benar</p>
						<form action="#" method="post">
							<div class="field">
								<input class="input-xlarge" type="text" id="Kode Matakulaih" name="kd_matakuliah" value="" title="Kode Matakulaih" placeholder="Kode Matakuliah" class="login" required="required"/>
							</div> <!-- /field -->
							
							<div class="field">
								<input class="input-xlarge" type="text" id="" name="nama" value="" title="Nama Matakulaih" placeholder="Nama Matakulaih" class="login" required="required"/>
							</div> <!-- /field -->
							
							<div class="field">
							<textarea class="input-xlarge" rows="4" id="Deskripsi" name="deskripsi" value=""  title="Deskripsi" placeholder="Deskripsi" class="login" required="required"></textarea>
							</div> <!-- /field -->
							
							<div class="field">
									<select class="input-xlarge" id="semester" name="semester" title="Semester" class="login" type="text" required="required">
										<option value="I">Semester</option>
										<option value="I">I</option>
										<option value="III">II</option>
									</select>
							</div> <!-- /field -->
							
							<div class="field">
									<select class="input-xlarge" id="Tahun Akademik" name="akademik" title="Tahun Akademik" class="login" type="text" required="required">
										<option value="2014/2015">Tahun Akademik</option>
										<option value="2014/2015">2013/2014</option>
										<option value="2014/2015">2014/2015</option>
										<option value="2015/2016">2014/2016</option>
									</select>
							</div> <!-- /field -->
							<?php 
									// $data=mysql_query("select * from tb_dosen");
									//var_dump($query);
									// while($row=mysql_fetch_array($data)){
									?>
							<div class="field">
									<select class="input-xlarge" id="" name="nip_dosen" title="NIP Dosen" class="login" type="text" required="required">
										<option value="<?php echo $row['nip'];?>">NIP Dosen</option>
										<option value="<?php echo $row['nip'];?>"><?php echo $row['nip'];?> | <?php echo $row['nama']?></option>
									</select>
							</div> <!-- /field -->
							<?php
								//}
							?>
						
					</div> <!-- /widget -->
				</div> <!-- /span8 -->
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<?php
	require_once'template/footer.php';
?>