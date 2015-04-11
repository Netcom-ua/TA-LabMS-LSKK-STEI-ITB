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
							<h2 class="bigstats" align="center">Daftar Nilai Praktikum Mahasiswa : <?php echo $data['nama_mhs']?></h2><br/>
							<table class="table table-striped ">
								<thead>
								  <tr>
									<th class="alert-info"> Kode Matakuliah </th>
									<th  class="alert-info"> Nama Matakuliah </th>
									<th  class="alert-info"> Deskripsi </th>
									<th  class="alert-info"> Semester </th>
									<th  class="alert-info"> Akademik </th>
									<th  class="alert-info"> Lihat Nilai</th>
								  </tr>
								</thead>
								<tbody>
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
									<td class="td-actions"><a href="#myModal<?php echo $row['kd_mk'] ?>" class="btn btn-small btn-success"data-toggle="modal"><i class="btn-icon-only icon-list-alt" title="Lihat Praktikum"> </i></a></td>
								  </tr>
								  <?php
									} 
									?>
								</tbody>
							  </table>
							  
							  <?php 
								$data1=mysql_query("select * from tb_matakuliah");
								//echo $data;
								while($row1=mysql_fetch_array($data1)){
								$id = $row1['kd_mk'];
								?>
							  <!-- Kode Modul Praktikum -->
								  <div class="control-group">
									<div class="controls">
									<!-- Modal -->
										<div id="myModal<?php echo $row1['kd_mk'] ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
											<h3 id="myModalLabel">Daftar Modul Praktikum</h3>
										  </div>
										  <div class="modal-body">
											<table class="table table-striped ">
											<thead>
											  <tr>
												<th  class="alert-info"> Kode Modul </th>
												<th  class="alert-info"> Nama Modul </th>
												<th  class="alert-info"> Bobot </th>
												<th  class="alert-info"> Lihat Nilai</th>
											  </tr>
											</thead>
											<tbody>
												<?php 
												$data2=mysql_query("select * from tb_jadwal_praktikum inner join tb_mdl_praktikum on tb_jadwal_praktikum.kd_modul = tb_mdl_praktikum.kd_modul where tb_mdl_praktikum.kd_mk='$id' group by tb_jadwal_praktikum.kd_modul");
												//echo $data;
												while($row2=mysql_fetch_array($data2)){
												?>
												<tr>	
													<td> <?php echo $row2['kd_modul']; ?> </td>
													<td> <?php echo $row2['nm_modul']; ?> </td>
													<td> <?php echo $row2['bobot']; ?></td>
													<td class="td-actions"><a href="nilai.html?kd_modul=<?php echo $row2['kd_modul']?>&tanggal=<?php echo $row2['tanggal'] ?>&waktu=<?php echo $row2['waktu'] ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-list-alt" title="Lihat Nilai"> </i></a></td>
												</tr>
												
												<?php 
												} 
												?>
											</tbody>
											</table>
										  </div>
										  <div class="modal-footer">
											<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
										  </div>
										</div>
									</div> <!-- /controls -->	
								</div> <!-- /control-group -->
								  <?php } ?>
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