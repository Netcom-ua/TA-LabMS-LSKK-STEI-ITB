<?php
require_once'template/header.php';
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
		<!-- Mengakibatkan table tidak responsive
          <div class="widget widget-nopad">
		  -->
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Koordinator Asisten</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
			<div class="alert alert-danger" align="center">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><h2>Daftar Praktikum</h3></strong> 
				</div>
				  <table class="table table-striped table-bordered">
					<thead>
					  <tr>
						<td class="alert alert-info"> Kode Matakuliah </td>
						<td class="alert alert-info"> Nama Matakuliah </td>
						<td class="alert alert-info"> Semester </td>
						<td class="alert alert-info"> Akademik </td>
						<td class="alert alert-info"> Dosen </td>
						<td class="alert alert-info"> </td>
					  </tr>
					</thead>
					<tbody>
					<!-- Menampilkan data Mahasiswa yang belum dikonfirmasi -->
					<?php 
						$data=mysql_query("SELECT tb_jadwal_praktikum.nim, tb_jadwal_praktikum.group, 
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
								where tb_jadwal_praktikum.id_kordas='$id_pengenal'
								GROUP BY tb_matakuliah.nama_mk");
						//echo $data;
						while($row=mysql_fetch_array($data)){
						?>
					  <tr>	
						<td> <?php echo $row['kd_mk']; ?> </td>
						<td> <?php echo $row['nama_mk']; ?> </td>
						<td> <?php echo $row['semester']; ?></td>
						<td> <?php echo $row['akademik']; ?></td>
						<td> <?php echo $row['nama_dosen']; ?></td>
						<td class="td-actions"><a href="modul_praktikum.html?modul=<?php echo $row['kd_mk'] ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-list" title="Modul Praktikum"> </i></a></td>
					  </tr>
					  <?php 
						$no++;
					} 
						?>
					</tbody>
				  </table>
          </div>
          	<!-- /widget-header -->
			
        
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>


<?php
	require_once'template/footer.php';
?>