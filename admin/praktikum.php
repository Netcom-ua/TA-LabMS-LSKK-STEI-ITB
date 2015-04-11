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
              <h3>Halaman Administrator</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
											
			<h6 class="bigstats" align="center">
			 <div class="alert alert-info">
			  <h4>Daftar Matakuliah Praktikum</h4> <a href="#myModal" role="button" class="btn" data-toggle="modal"><i class="icon icon-plus"></i></a>
			</div></h6>
				  <table class="table table-striped">
					<thead>
					  <tr>
						<th class="alert-danger"> Kode Matakuliah </th>
						<th class="alert-danger"> Nama Matakulaih </th>
						<th class="alert-danger"> Deskripsi </th>
						<th class="alert-danger"> Semester </th>
						<th class="alert-danger"> Akademik </th>
						<th class="alert-danger"> Dosen </th>
						<th class="alert-danger"> </th>
					  </tr>
					</thead>
					<tbody>
					<!-- Menampilkan data Mahasiswa yang belum dikonfirmasi -->
					<?php 
						$data=mysql_query("select * from tb_matakuliah inner join tb_dosen on tb_matakuliah.nip_dosen = tb_dosen.nid");
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
						<td class="td-actions" width="120"><a href="modul_praktikum.html?modul=<?php echo $row['kd_mk'] ?>" class="btn btn-small btn-info"><i class="btn-icon-only icon-list" title="Lihat Modul Praktikum"> </i></a><a href="#myModaledit<?php echo $row['kd_mk'] ?>" class="btn btn-small btn-success" role="button" data-toggle="modal"><i class="btn-icon-only icon-pencil" title="Edit Praktikum"> </i></a><a href="action.php?action=del_praktikum&kd_mk=<?php echo $row['kd_mk'] ?>" onclick="return confirm('Apakah Anda yakin menghapus data Matakuliah : <?php echo $row['nama_mk'];?> ?')"class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
					  </tr>
					  <div class="control-group">
						<div class="controls">
							 <!-- Button to trigger modal -->
							<!-- Modal -->
							<div id="myModaledit<?php echo $row['kd_mk'] ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
								<h3 id="myModalLabel">Edit Daftar Matakuliah Praktikum</h3>
							  </div>
							  <div class="modal-body">
								<form action="input_praktikum.php" method="post">
									<div class="field">
										<label> Kode Matakuliah</label>
										<input class="input-xlarge" type="text" id="Kode Matakuliah" name="kd_mk" value="<?php echo $row['kd_mk']; ?>" title="Kode Matakulaih" placeholder="Kode Matakulaih" class="login" required="required"/>
									</div> <!-- /field -->
									
									<div class="field">
										<label> Nama Matakuliah</label>
										<input class="input-xlarge" type="text" id="" name="nama_mk" value="<?php echo $row['nama_mk']; ?>" title="Nama Matakuliah" placeholder="Nama Matakuliah" class="login" required="required"/>
									</div> <!-- /field -->
									
									<div class="field">
										<label> Deskripsi</label>
										<textarea class="input-xlarge" rows="4" id="Deskripsi" name="deskripsi" value=""  title="Deskripsi" placeholder="Deskripsi" class="login" required="required"><?php echo $row['deskripsi'];?></textarea>
									</div> <!-- /field -->
									
									<div class="field">
										<label> Semester</label>
											<select class="input-xlarge" id="semester" name="semester" title="Semester" class="login" type="text" required="required">
												<option value="<?php $row['semester']; ?>"><?php echo $row['semester']; ?></option>
												<option value="I">I</option>
												<option value="II">II</option>
											</select>
									</div> <!-- /field -->
									
									<div class="field">
											<label> Tahun Akademik</label>
											<select class="input-xlarge" id="Tahun Akademik" name="akademik" title="Tahun Akademik" class="login" type="text" required="required">
												<option value="<?php $row['akademik']; ?>"><?php echo $row['akademik']; ?></option>
												<option value="2013/2014">2013/2014</option>
												<option value="2014/2015">2014/2015</option>
												<option value="2015/2016">2015/2016</option>
												<option value="2016/2017">2016/2017</option>
											</select>
									</div> <!-- /field -->
									<div class="field">
											<label> Dosen</label>
											<select class="input-xlarge" id="" name="nip_dosen" title="NIP Dosen" class="login" type="text" required="required">
												<?php 
											$data1=mysql_query("select * from tb_dosen");
											//var_dump($query);
											while($row1=mysql_fetch_array($data1)){
											?>
											<option value="<?php echo $row1['nid'];?>"><?php echo $row1['nid'];?> | <?php echo $row1['nama_dosen']?></option>
											<?php
												}
											?>
											</select>
									</div> <!-- /field -->
							  </div>
							  <div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true">Keluar</button>
								<button class="btn btn-primary">Daftar</button>
							  </div>
							  </form>
							</div>
						</div> <!-- /controls -->	
					</div> <!-- /control-group -->
					  <?php
						} 
						?>
					</tbody>
				  </table>
			  
          	<!-- /widget-header -->
			
			<div class="control-group">
				<div class="controls">
					 <!-- Button to trigger modal -->
					
					<!-- Modal -->
					<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
						<h3 id="myModalLabel">Tambah Daftar Matakuliah Praktikum</h3>
					  </div>
					  <div class="modal-body">
						<form action="input_praktikum.php" method="post">
							<div class="field">
								<label> Kode Matakuliah</label>
								<input class="input-xlarge" type="text" id="Kode Matakulaih" name="kd_mk" value="" title="Kode Matakulaih" placeholder="Kode Matakulaih" class="login" required="required"/>
							</div> <!-- /field -->
							
							<div class="field">
								<label> Nama Matakuliah</label>
								<input class="input-xlarge" type="text" id="" name="nama_mk" value="" title="Nama Matakulaih" placeholder="Nama Matakulaih" class="login" required="required"/>
							</div> <!-- /field -->
							
							<div class="field">
								<label> Deskripsi</label>
								<textarea class="input-xlarge" rows="4" id="Deskripsi" name="deskripsi" value=""  title="Deskripsi" placeholder="Deskripsi" class="login" required="required"></textarea>
							</div> <!-- /field -->
							
							<div class="field">
								<label> Semester</label>
									<select class="input-xlarge" id="semester" name="semester" title="Semester" class="login" type="text" required="required">
										<option value="I">Semester</option>
										<option value="I">I</option>
										<option value="II">II</option>
									</select>
							</div> <!-- /field -->
							
							<div class="field">
									<label> Tahun Akademik</label>
									<select class="input-xlarge" id="Tahun Akademik" name="akademik" title="Tahun Akademik" class="login" type="text" required="required">
										<option value="2014/2015">Tahun Akademik</option>
										<option value="2013/2014">2013/2014</option>
										<option value="2014/2015">2014/2015</option>
										<option value="2015/2016">2015/2016</option>
										<option value="2016/2017">2016/2017</option>
									</select>
							</div> <!-- /field -->
							<div class="field">
									<label> Dosen</label>
									<select class="input-xlarge" id="" name="nip_dosen" title="NIP Dosen" class="login" type="text" required="required">
										<option value="<?php echo $row['nid'];?>">Dosen</option>
										<?php 
											$data=mysql_query("select * from tb_dosen");
											//var_dump($query);
											while($row=mysql_fetch_array($data)){
										?>
										<option value="<?php echo $row['nid'];?>"><?php echo $row['nid'];?> | <?php echo $row['nama_dosen']?></option>
										<?php
											}
										?>
									</select>

							</div> <!-- /field -->
							
					  </div>
					  <div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Keluar</button>
						<button class="btn btn-primary">Daftar</button>
					  </div>
					  </form>
					</div>
				</div> <!-- /controls -->	
			</div> <!-- /control-group -->
			
           
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