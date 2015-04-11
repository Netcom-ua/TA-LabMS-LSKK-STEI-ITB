<?php 
	include 'template/header.php'; 
	
	$id = $_GET['id'];
	$kd_modul = $_GET['kd_modul'];
	$tanggal = $_GET['tanggal'];
	$waktu = $_GET['waktu'];
	
	$queryx =  "select nama_mk, kd_modul from tb_matakuliah INNER JOIN tb_jadwal_praktikum ON tb_matakuliah.kd_mk = tb_jadwal_praktikum.kd_mk where kd_modul='$kd_modul'";
	$result = $mysqli->query($queryx)
	or die('<b>-- Query failed -- </b> ' . mysql_error());
	$datax = $result->fetch_array();
	//var_dump($queryx);
?>
	<div class="container ">
      <div class="row">
        <div class="span12">
			<!-- Menampilkan Jumlah data Mahasiswa  -->	
				<?php
					$sql="select * from tb_mahasiswa";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount1=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
					// Menampilkan Jumlah data Mahasiswa
					$sql="select * from tb_mahasiswa where status='nonaktif'";
					if ($result=mysqli_query($mysqli,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount2=mysqli_num_rows($result);
					  // Free result set
					  mysqli_free_result($result);
				  }
				?>
				<div class="widget-header">
				<i class="icon-user"></i>
				<h3> Jumlah Mahasiswa&nbsp;<span class="badge badge-success pull-right" style="line-height:18px;"> <?php printf("%d",$rowcount2);?></span><span class="badge badge-warning pull-right" style="line-height:18px;" title="Belum dikonfirmasi"> <?php printf("%d",$rowcount1);?></span></h3> 
			
				<!-- textbox untuk pencarian data Mahasiswa -->
				<div class="input-prepend pull-right">
				  
				</div>
			</div>
			<div class="widget-content">
			<h3 class="bigstats" align="center">Pilih Mahasiswa Untuk Pertukaran Jadwal Praktikum <br/> <?php echo $datax['kd_modul'].' '.$datax['nama_mk'] ?>  </h3><br/>
			<table id="tabel1" class="table table-badge-success">
				<thead>
				  <tr>	
					<th class="alert alert-warning"> NIM </th>
					<th class="alert alert-warning"> Mahasiswa</th>
					<th class="alert alert-warning"> Matakuliah</th>
					<th class="alert alert-warning"> Kode Praktikum </th>
					<th class="alert alert-warning"> Nama Modul </th>
					<th class="alert alert-warning"> Asisten</th>
					<th class="alert alert-warning"> Dosen</th>
					<th class="alert alert-warning"> Kelompok </th>
					<th class="alert alert-warning"> Ruangan </th>
					<th class="alert alert-warning"> Tanggal </th>
					<th class="alert alert-warning"> Pukul </th>
					<th class="alert alert-warning"> Tukar Jadwal</th>
				  </tr>
				</thead>
			<tbody>
				<!-- Menampilkan Jadwal Praktikum -->
				<?php 
				$per_page = 20;
				$page_query = mysql_query("SELECT COUNT(*) FROM tb_jadwal_praktikum");
				$pages = ceil(mysql_result($page_query, 0) / $per_page);

				$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
				$start = ($page - 1) * $per_page;
				
				$query = mysql_query("SELECT 
				tb_jadwal_praktikum.id, 
				tb_jadwal_praktikum.nim, 	tb_jadwal_praktikum.id_asisten, tb_jadwal_praktikum.group, 
						tb_jadwal_praktikum.ruangan,
						tb_jadwal_praktikum.tanggal, tb_jadwal_praktikum.waktu, tb_matakuliah.nama_mk, 
						tb_matakuliah.semester,
						tb_matakuliah.akademik,
						tb_matakuliah.nip_dosen, tb_mdl_praktikum.kd_mk, tb_mdl_praktikum.kd_modul, tb_mdl_praktikum.nm_modul, tb_mdl_praktikum.singkatan,  tb_user.id_pengenal, tb_user.nama_user, tb_dosen.nama_dosen
					FROM tb_jadwal_praktikum
					INNER JOIN tb_matakuliah ON tb_jadwal_praktikum.kd_mk = tb_matakuliah.kd_mk
					INNER JOIN tb_mdl_praktikum ON tb_jadwal_praktikum.kd_modul = tb_mdl_praktikum.kd_modul
					INNER JOIN tb_user ON tb_jadwal_praktikum.id_asisten = tb_user.id_pengenal
					INNER JOIN tb_dosen ON tb_dosen.nid = tb_matakuliah.nip_dosen 
					where tb_jadwal_praktikum.kd_modul='$kd_modul' and tb_jadwal_praktikum.id_asisten!='$id_pengenal'
					order by tb_jadwal_praktikum.tanggal, tb_jadwal_praktikum.waktu asc LIMIT $start, $per_page");
				while ($data = mysql_fetch_assoc($query)) {
				$nim_mhs = $data['nim'];

				?>
			  <tr>
				<td class="alert alert-info"> <?php echo $data['nim']; ?> </td>
				<td class="alert alert-info"> <?php echo $data['nama_mhs']; ?> </td>
				<td class="alert alert-info"> <?php echo $data['nama_mk']; ?> </td>
				<td class="alert alert-info"> <?php echo $data['kd_modul']; ?> </td>
				<td class="alert alert-info"> <?php echo $data['nm_modul']; ?> </td>
				<td class="alert alert-info"> <?php echo $data['nama_user']; ?> </td>
				<td class="alert alert-info"> <?php echo $data['nama_dosen']; ?> </td>
				<td class="alert alert-info"> <?php echo $data['group']; ?> </td>
				<td class="alert alert-info"> <?php echo $data['ruangan']; ?> </td>
				<td class="alert alert-info"> <?php echo $data['tanggal']; ?> </td>
				<td class="alert alert-info"> <?php echo $data['waktu']; ?></td>
				<td class="alert alert-info"> <a href="#myModal<?php echo $nim_mhs?>" role="button" class="btn btn-small btn-success" data-toggle="modal"><i class="btn-icon-only icon-ok" title="Tukar Jadwal"> </i></a></td>
			  </tr>
			  
			</tbody>
			 <?php 
			} 
			?>
		  </table>
		  <?php
		  $query1 = mysql_query("SELECT 
				tb_jadwal_praktikum.id, 
				tb_jadwal_praktikum.nim, 	tb_jadwal_praktikum.id_asisten, tb_jadwal_praktikum.group, 
						tb_jadwal_praktikum.ruangan,
						tb_jadwal_praktikum.tanggal, tb_jadwal_praktikum.waktu, tb_matakuliah.nama_mk, 
						tb_matakuliah.semester,
						tb_matakuliah.akademik,
						tb_matakuliah.nip_dosen, tb_mdl_praktikum.kd_mk, tb_mdl_praktikum.kd_modul, tb_mdl_praktikum.nm_modul, tb_mdl_praktikum.singkatan, tb_user.id_pengenal, tb_user.nama_user, tb_dosen.nama_dosen
					FROM tb_jadwal_praktikum
					INNER JOIN tb_matakuliah ON tb_jadwal_praktikum.kd_mk = tb_matakuliah.kd_mk
					INNER JOIN tb_mdl_praktikum ON tb_jadwal_praktikum.kd_modul = tb_mdl_praktikum.kd_modul
					INNER JOIN tb_user ON tb_jadwal_praktikum.id_asisten = tb_user.id_pengenal
					INNER JOIN tb_dosen ON tb_dosen.nid = tb_matakuliah.nip_dosen 
					where tb_jadwal_praktikum.kd_modul='$kd_modul' and tb_jadwal_praktikum.id_asisten!='$id_pengenal'
					order by tb_jadwal_praktikum.tanggal, tb_jadwal_praktikum.waktu");
		  while ($data = mysql_fetch_assoc($query1)) {
				$nim_mhs = $data['nim'];
			?>
					<!-- Modal -->
					<div id="myModal<?php echo $nim_mhs ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
						<h3 id="myModalLabel">Pertukaran Jadwal Praktikum</h3>
					  </div>
					  <div class="modal-body">
					  
						<form id="form" action="action_tukar.php?action=change_jadwal&kd_modul=<?php echo $kd_modul ?>" method="POST" >
						<table id="tabel2" class="table table-badge-success">
							<tr>
								<input  id="id" name="id" type="hidden" value="<?php echo $id?>" />
								<input  id="id_tukar" name="id_tukar" type="hidden" value="<?php echo $data['id'] ?>"/>
								<input  id="asisten" name="asisten" type="hidden" value="<?php echo $data['id_asisten'] ?>" />
								<td class="alert-info">NIM Anda  </td>
								<td class="alert-info"> <input  id="" name="" type="text" value="<?php echo $nim?>"  disabled/>
								<input  id="nim" name="nim" type="hidden" value="<?php echo $nim?>" /></td>
							</tr>
							<tr>
								<td class="alert-info"> NIM Tujuan </td>
								<td class="alert-info"> <input type="text" name="" id="" value="<? echo $data['nim']?>" disabled/>
								<input  id="nim_mhs" name="nim_mhs" type="hidden" value="<?php echo $nim_mhs?>" /></td>
							</tr>
							<tr>
								<td class="alert-info">Mahasiswa </td>
								<td class="alert-info"><input  id="nama" name="nama" type="text" value="<?php echo $data['nama_mhs']?>" disabled="disabled">
								</td>
							</tr>
							<tr>
								<td class="alert-info">Tanggal Jadwal Anda</td>
								<td class="alert-info"> <input  id="tanggal" name="tanggal" type="text" value="<?php echo $tanggal.' '.$waktu?>" disabled="disabled">
								<input type="hidden" name="tgl" id="tgl" value="<? echo $tanggal?>"	/>
								<input type="hidden" name="waktu" id="waktu" value="<? echo $waktu?>" />
							</tr>
							<tr>
							<tr>
								<td class="alert-info">Tanggal Jadwal Tukar</td>
								<td class="alert-info"> <input  id="" name="" type="text" value="<?php echo $data['tanggal'].' '.$data['waktu']?>" disabled="disabled">
								<input  id="tgl" name="tgl_tujuan" type="hidden" value="<?php echo $data['tanggal']?>" />
								<input  id="waktu" name="waktu_tujuan" type="hidden" value="<?php echo $data['waktu']?>" /></td>
							</tr> 
							<tr>
							<tr>
								<td class="alert-info"> Alasan Tukar </td>
								<td class="alert-info"> 
								<textarea id="alasan" rows="5" name="alasan" required="required"/></textarea></td>
							</tr>
							
							</table>
					  </div>
					  <div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						<button class="btn btn-primary" onclick="return confirm('Anda yakin ingin menukar jadwal dengan : <?php echo $data['nama_mhs'];?> ?')">Save changes</button>
					  </div>
					</div>
					</form>
					<!-- End Modal -->
				  <?php 
					} 
					?>
				  <!-- Pagination -->
				  <div class="pagination pagination-small pagination-centered">
					<ul>
					  <?php
						if($pages >= 1 && $page <= $pages)
						{
						  for($x=1; $x<=$pages; $x++)
						  {
							if($x == $page)
								echo ' <li class="active"><a href="#page'.$x.'">	'.$x.'</a></li>';
							else
								echo ' <li><a href="?page='.$x.'">'.$x.'</a></li>';
						  }
						}
						?>
					</ul>
				</div>
		</div>
		</div>
		</div>
		</div>
													
		<br/>
<?php
	require_once'template/footer.php';
?>