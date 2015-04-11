<?php 
require_once 'template/header.php'; 
?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                        <div class="widget-header"> <i class="icon-home"></i>
						  <h3>Halaman Mahasiswa</h3>
						</div>
                        <!-- /widget-header -->
                        <div class="widget-content">
							<?php 
							$query="select * from tb_matakuliah" ; 
							$result=$mysqli->query($query) 
							or die('<b>-- Query failed -- </b> ' . mysql_error()); 
							$data = $result->fetch_array(); 
							?>
							<h2 class="bigstats" align="center">Jadwal Praktikum Mahasiswa Teknik Elektro <br/>Semester <?php echo $data['semester']?> Tahun Akademik <?php echo $data['akademik'] ?> </h2><br/>
							<table class="table table-striped ">
								<thead>
								  <tr>
									<th class="alert-info"> Kode Matakuliah </th>
									<th  class="alert-info"> Nama Matakuliah </th>
									<th  class="alert-info"> Deskripsi </th>
									<th  class="alert-info"> Semester </th>
									<th  class="alert-info"> Akademik </th>
									<th  class="alert-info"> Lihat Jadwal</th>
								  </tr>
								</thead>
								<tbody>
								<!-- Menampilkan data Mahasiswa yang belum dikonfirmasi -->
								<?php 
									$data=mysql_query("select * from tb_matakuliah");
									//echo $data;
									while($row=mysql_fetch_array($data)){
									?>
								  <tr>	
									<td> <?php echo $row['kd_mk']; ?> </td>
									<td> <?php echo $row['nama_mk']; ?> </td>
									<td> <?php echo $row['deskripsi']; ?> </td>
									<td> <?php echo $row['semester']; ?></td>
									<td> <?php echo $row['akademik']; ?></td>
									<td class="td-actions"><a href="jadwal_matakuliah.html?modul=<?php echo $row['kd_mk'] ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-list-alt" title="Lihat Praktikum"> </i></a></td>
								  </tr>
								  <?php 
									$no++;
								} 
									?>
								</tbody>
							  </table>
                                    <!-- Pagination -->
                                    <div class="pagination pagination-small pagination-centered">
                                        <ul>
                                            <?php 
											if($pages>= 1 && $page<=$pages) { for($x=1; 
											$x<=$pages; $x++) { if($x==$page) echo ' <li class="active"><a href="/page'.$x. '">'.$x. '</a></li>'; else echo ' <li>
											<a href="?page='.$x. '">'.$x. '</a></li>'; } } ?>
                                        </ul>
                                    </div>
                                <!-- /widget-content -->
                            </div><br/>
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
require_once 'template/footer.php'; 
?>