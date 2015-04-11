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
              <h3>Halaman Kordas</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
			<div class="alert alert-danger" align="center">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><h2>Daftar Nilai Praktikum</h3></strong> 
			</div>
				  <table class="table table-striped table-bordered">
					<thead>
					  <tr>
						<th> Kode Matakulaih </th>
						<th> Nama Matakulaih </th>
						<th> Deskripsi </th>
						<th> Semester </th>
						<th> Akademik </th>
						<th> Dosen </th>
						<th class="td-actions"> </th>
					  </tr>
					</thead>
					<tbody>
					<!-- Menampilkan data Mahasiswa yang belum dikonfirmasi -->
					<?php 
						$data=mysql_query("select * from tb_matakuliah inner join tb_dosen on tb_matakuliah.nip_dosen = tb_dosen.nid where tb_dosen.nid='$nid'");
						//echo $data;
						while($row=mysql_fetch_array($data)){
						?>
					  <tr>	
						<td> <?php echo $row['kd_mk']; ?> </td>
						<td> <?php echo $row['nama_mk']; ?> </td>
						<td> <?php echo $row['deskripsi']; ?> </td>
						<td> <?php echo $row['semester']; ?></td>
						<td> <?php echo $row['akademik']; ?></td>
						<td> <?php echo $row['nama_dosen']; ?></td>
						<td class="td-actions"><a href="nilai_praktikum.html?modul=<?php echo $row['kd_mk'] ?>" class="btn btn-small btn-success" title="Lihat Nilai Praktikum"><i class="btn-icon-only icon-book" > </i></a></td>
					  </tr>
					  <?php 
						$no++;
					} 
						?>
					</tbody>
				  </table>
			  
          </div>
          	<!-- /widget-header -->
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<br/>
<?php
	require_once'template/footer.php';
?>