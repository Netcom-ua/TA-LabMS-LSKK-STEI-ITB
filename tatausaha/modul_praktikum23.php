<?php

	require_once'template/header.php';
	#baca variabel URL (if register global on)
	$modul = $_GET['modul'];

// if (isset($_POST["upload"])){
	// if(!empty($_FILES["userfile"]) && ($_FILES["userfile"]["error"]==0)){
		// $filename= basename($_FILES['userfile']['name']);

		//read extension
		// $ekstensi=substr($filename, strrpos($filename,'.')+1);

		// if($ekstensi=="xls" || $ekstensi=="XLS"){
			// include "proses_excel/proses_xls.php";
		// }
		// elseif ($ekstensi=="xlsx" || $ekstensi=="XLSX"){
			// include "proses_excel/proses_xlsx.php";
		// }
		// else{
			// echo "<script>alert('File ekstensi anda salah, ekstensi anda ".$ekstensi."');</script>";
		// }

	// }else{
		// echo "<script>alert('No file uploaded');</script>";
	// }
// }
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
		<!-- Mengakibatkan table tidak responsive-->
          <div class="widget widget-nopad">
		  
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Tata Usaha</h3>
            </div>
            <!-- /widget-header -->
			<?php 
				$data=mysql_query("select * from tb_matakuliah where kd_mk='$modul'");
				//echo $data;
				$row=mysql_fetch_array($data)
			?>
            <div class="widget-content">
			<h3 class="bigstats" align="center"><?php echo $row['kd_mk']; ?> <?php echo $row['nama_mk']; ?> </h3>
			<a href="add_modul.html" <i class="icon-list-alt"> Tambah Modul</i></a>
			<br/><br/><br/><br/>
			<?php 
				$data=mysql_query("select * from tb_mdl_praktikum where kd_mk='$modul'");
				//echo $data;
				$no=1;
				while($row=mysql_fetch_array($data)){
			?>
				<table width="690" align="center">
					<tr>
						<td width="680">
							<table width="684" align="left" border="0">
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td width="20" valign="top"><span style="font-weight: bold; font-size: 15px;"><?php echo $no?>
									</span></td>
									<td width="624"><span style="font-weight: bold; font-size: 15px;"><?php echo $row['nm_modul']?>
									</span>&nbsp;<span style="font-size: 15px">(Bobot Modul: <?php echo $row['bobot'];?>)</span> </td>
									<td width="22">&nbsp;</td>
								</tr>
								<tr>
									<td></td>
									<td width="624" style="font-size: 14px;"><?php echo $row['deskripsi'];?></td>
									<td width="22">&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td align="center"><a
										href="index.php?page=courseEdit&idcategori=<?php echo $idcategori;?>&idcourse=<?php echo $course['id'];?>"><img
											src="gambar/menu/edit3.png" width="20" height="20" /></a>&nbsp;&nbsp;<a
										href="javascript:if(confirm('Anda yakin akan menghapus Course ini ?')){document.location='index.php?page=courseDelete&idcourse=<?echo $course['id'];?>&idcategory=<?php echo $idcategori; ?>';}"><img
											src="gambar/menu/delete.png" width="18" height="18" /> </a>
									</td>	
									<tr>
									<td>&nbsp;</td>
									<td align="center"><h3>Data Modul</h3>
									</td>
					<table class="table table-striped table-bordered">
					<thead>
					  <tr>
						<th> No </th>
						<th> Judul </th>
						<th> Tanggal Buka</th>
						<th> Tanggal Tutup </th>
						<th> Download </th>
						<th class="td-actions"> </th>
					  </tr>
					</thead>
					<tbody>
					<!-- Menampilkan data Mahasiswa yang belum dikonfirmasi -->
					<?php 
						//$data=mysql_query("select * from tb_matakuliah inner join tb_dosen on tb_matakuliah.nip_dosen = tb_dosen.nid");
						//echo $data;
						//while($row=mysql_fetch_array($data)){
						?>
					  <tr>	
						<td> 1 </td>
						<td> Modul 1  </td>
						<td> 2014-8-28  </td>
						<td> 2014-8-30 </td>
						<td> <?php echo $row['akademik']; ?></td>
						<td class="td-actions"><a href="modul_praktikum.html=<?php echo $row['kd_mk'] ?>"class="btn btn-small btn-success"><i class="btn-icon-only icon-ok" title="Edit"> </i></a><a href="konfirmasi.php?action=delmhs&nim=<?php echo $row['nim'] ?>" onclick="return confirm('Apakah Anda yakin menghapus data Mahasiswa : <?php echo $row['nama'];?> ?')"class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
					  </tr>
					  <?php 
						$no++;
					//} 
						?>
					</tbody>
					</table>
					
					<h3>Data Penilaian</h3>
					<table class="table table-striped table-bordered">
					<thead>
					  <tr>
						<th> No </th>
						<th> Judul </th>
						<th> Tanggal Buka</th>
						<th> Tanggal Tutup </th>
						<th> Download </th>
						<th class="td-actions"> </th>
					  </tr>
					</thead>
					<tbody>
					<!-- Menampilkan data Mahasiswa yang belum dikonfirmasi -->
					<?php 
						//$data=mysql_query("select * from tb_matakuliah inner join tb_dosen on tb_matakuliah.nip_dosen = tb_dosen.nid");
						//echo $data;
						//while($row=mysql_fetch_array($data)){
						?>
					  <tr>	
						<td> 1</td>
						<td> Form Penilaian Buku Catatan Laboratorium</td>
						<td> 2014-8-28 </td>
						<td> 2014-8-30</td>
						<td> <?php echo $row['akademik']; ?></td>
						<td class="td-actions"><a href="modul_praktikum.html=<?php echo $row['kd_mk'] ?>"class="btn btn-small btn-success"><i class="btn-icon-only icon-ok" title="Edit"> </i></a><a href="konfirmasi.php?action=delmhs&nim=<?php echo $row['nim'] ?>" onclick="return confirm('Apakah Anda yakin menghapus data Mahasiswa : <?php echo $row['nama'];?> ?')"class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
					  </tr>
					  <?php 
						//$no++;
						//} 
						?>
					</tbody>
					</table>
					
					<h3>Datftar Unggah Tugas</h3>
					<table class="table table-striped table-bordered">
					<thead>
					  <tr>
						<th> No </th>
						<th> Judul </th>
						<th> Tanggal Buka</th>
						<th> Tanggal Tutup </th>
						<th> Download </th>
						<th class="td-actions"> </th>
					  </tr>
					</thead>
					<tbody>
					<!-- Menampilkan data Mahasiswa yang belum dikonfirmasi -->
					<?php 
						// $data=mysql_query("select * from tb_matakuliah inner join tb_dosen on tb_matakuliah.nip_dosen = tb_dosen.nid");
						//echo $data;
						// while($row=mysql_fetch_array($data)){
						?>
					  <tr>	
						<td> 1</td>
						<td> Tugas Modul 1</td>
						<td> 2014-8-28  </td>
						<td> 2014-8-30 </td>
						<td> <?php echo $row['akademik']; ?></td>
						<td class="td-actions"><a href="modul_praktikum.html=<?php echo $row['kd_mk'] ?>"class="btn btn-small btn-success"><i class="btn-icon-only icon-ok" title="Edit"> </i></a><a href="konfirmasi.php?action=delmhs&nim=<?php echo $row['nim'] ?>" onclick="return confirm('Apakah Anda yakin menghapus data Mahasiswa : <?php echo $row['nama'];?> ?')"class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
					  </tr>
					  <?php 
						//$no++;
					} 
						?>
					</tbody>
					</table>
				</table>
			<?php
			//}?>
				
			  
          </div>
          	<!-- /widget-header -->
			
            
				</div> <!-- /span8 -->
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          
          <!-- /widget --> 
        </div>
        <!-- /span6 -->
        
        <!-- /span6 --> 
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