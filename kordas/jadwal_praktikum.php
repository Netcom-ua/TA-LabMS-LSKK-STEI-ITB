<?php
	require_once'template/header.php';
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Asisten</h3>
            </div>
            <!-- /widget-header -->
              <div class="widget big-stats-container">
				<div class="alert alert-warning" align="center">
					<?php
					$query="select semester, akademik from tb_matakuliah";
					$result = $mysqli->query($query)
					or die('<b>-- Query failed -- </b> ' . mysql_error());
					$data = $result->fetch_array();
					?>
					<h3 class="bigstats" align="center">Jadwal Praktikum Asisten Teknik Elektro <br/>Semester <?php echo $data['semester']?> Tahun Akademik <?php echo $data['akademik'] ?> <br/> Kordas :  <?php echo $nama?> </h3><br/>
								
					<table class="table table-bordered">
						<thead>
						  <tr>
							<td class="alert-danger"> Matakuliah </td>
							<td class="alert-danger"> Kode Praktikum  </td>
							<td class="alert-danger"> Nama Modul </td>
							<td class="alert-danger"> Kordas </td>
							<td class="alert-danger"> Dosen </td>
							<td class="alert-danger"> Ruangan </td>
							<td class="alert-danger"> Tanggal </td>
							<!--<td class="alert-danger"> Tukar Jadwal</td>-->
						  </tr>
						</thead>
					<tbody>
						<!-- Menampilkan Jadwal Praktikum -->
						<?php 
						
						$query = mysql_query("SELECT 
						tb_jadwal_praktikum.id,
						tb_jadwal_praktikum.nim, 	tb_jadwal_praktikum.id_kordas, tb_jadwal_praktikum.group, 
						tb_jadwal_praktikum.ruangan,
						tb_jadwal_praktikum.id_dosen,
						tb_jadwal_praktikum.id_kordas,
						tb_jadwal_praktikum.tanggal, tb_jadwal_praktikum.waktu, tb_matakuliah.nama_mk, 
						tb_matakuliah.semester,
						tb_matakuliah.akademik,
						tb_matakuliah.nip_dosen, tb_mdl_praktikum.kd_mk, tb_mdl_praktikum.kd_modul, tb_mdl_praktikum.nm_modul, tb_mdl_praktikum.singkatan, tb_mdl_praktikum.nama_kordas, tb_user.id_pengenal, tb_user.nama_user, tb_dosen.nama_dosen
					FROM tb_jadwal_praktikum
					INNER JOIN tb_matakuliah ON tb_jadwal_praktikum.kd_mk = tb_matakuliah.kd_mk
					INNER JOIN tb_mdl_praktikum ON tb_jadwal_praktikum.kd_modul = tb_mdl_praktikum.kd_modul
					INNER JOIN tb_user ON tb_jadwal_praktikum.id_kordas = tb_user.id_pengenal
					INNER JOIN tb_dosen ON tb_dosen.nid = tb_matakuliah.nip_dosen
					where tb_jadwal_praktikum.id_kordas='$id_pengenal'");
						while ($data = mysql_fetch_assoc($query)) {
						$id = $data ['id_kordas'];
						$nid = $data ['id_dosen'];
						
						$query1="select * from tb_user where id_pengenal='$id'";
						$result = $mysqli->query($query1);
						$data1 = $result->fetch_array();
						$nm_kordas = $data1['nama_user'];
						
						$query2="select * from tb_dosen where nid='$nid'";
						$result = $mysqli->query($query2);
						$data2 = $result->fetch_array();
						$nm_dosen = $data2['nama_dosen'];
						
					?>
					  <tr>
						<td class="alert-info"><?php echo $data['nama_mk']; ?>  </td>
						<td class="alert-info"> <?php echo $data['kd_modul']; ?> </td>
						<td class="alert-info"> <?php echo $data['nm_modul']; ?> </td>
						<td class="alert-info"> <?php echo $nm_kordas ?> </td>
						<td class="alert-info"> <?php echo $nm_dosen ?> </td>
						<td class="alert-info"> <?php echo $data['ruangan']; ?> </td>
						<td class="alert-info"> <?php echo $data['tanggal'].' '.$data['waktu'] ?> </td>
						<!--<td class="alert-info"> <a href="tukar_jadwal.html?id=<?php echo $data['id']?>&kd_modul=<?php echo $data['kd_modul']?>&tanggal=<?php echo $data['tanggal']?>&waktu=<?php echo $data['waktu'] ?>" class="btn btn-small btn-success" type="submit"><i class="btn-icon-only icon-user" title="Tukar Jadwal"> </i></a>
						</td>-->
					  </tr>
					  <?php 
					} 
						?>
					</tbody>
				  </table>
				 </form>
				</div>
				</div>
                <!-- /widget-content --> 
              </div>
            </div>
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<?php
	require_once'template/footer.php';
?>