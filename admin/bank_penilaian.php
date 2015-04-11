<?php
require_once'template/header.php';
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Administrator</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
				<div class="alert alert-danger" align="center">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><h2>Daftar Penilaian</h3></strong> 
					<strong><a href="#myModal" role="button" class="btn btn-success" data-toggle="modal" title="Tambah"><i class="icon-plus" title="Tambah Penilaian"></i> 	</a></strong> 
				</div>
				  <table class="table table-striped table-bordered">
					<thead>
					  <tr>
						<td class="alert alert-info"> No </td>
						<td class="alert alert-info"> Nama Penilaian </td>
						<td class="alert alert-info"> Keterangan </td>
						<td class="alert alert-info"> Sub Penilaian </td>
						<td class="alert alert-info"> Hapus </td>
					  </tr>
					</thead>
					<tbody>
					<!-- Menampilkan data Mahasiswa yang belum dikonfirmasi -->
					<?php
					$sql="SELECT * FROM  tb_bankpenilaian";
					$aksi=mysql_query($sql);
					$a=0;
					while ($data=mysql_fetch_array($aksi)){
					?>
					  <tr>
						<input type="hidden" value="<?php echo $data['noid']; ?>">
						<td> <?php echo $a=$a+1; ?> </td>
						<td> <?php echo $data['namapenilaian'];?> </td>
						<td> <?php echo $data['ketnamapenilaian'];?> </td>
						<td> <a href="#myModal<?php echo $data['noid']; ?>" role="button" class="btn btn-info" data-toggle="modal"><i class="icon-zoom-in" title="SubNilai"></i></a></td>
						<td  class="td-actions"><a href="action.php?action=del_bank_nilai&noid=<?php echo $data['noid'] ?>" onclick="return confirm('Apakah Anda yakin menghapus data Nilai : <?php echo $data['namapenilaian'];?> ?')"class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
					  </tr>
					  <?php 
						} 
						?>
					</tbody>
				  </table> 
				  
				  <?php
					$sql="SELECT * FROM  tb_bankpenilaian";
					$aksi=mysql_query($sql);
					$a=0;
					while ($data=mysql_fetch_array($aksi)){
					$id=$data['noid'];
					?>
					
				<!-- Modal SubNilai -->
				<div id="myModal<?php echo $data['noid']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h3 id="myModalLabel">Daftar Sub Penilaian</h3>
				  </div>
				  <div class="modal-body">
				  <?php
					$data=mysql_query("SELECT * FROM  tb_klasifikasipenilaian WHERE noid=$id");
					$a=1;
					$data1=mysql_query("SELECT * FROM  tb_bankpenilaian WHERE noid=$id");
					$penilaian=mysql_fetch_array($data1);
					?>
					<div class="alert alert-danger" align="center">
						<strong><h2><?php echo $penilaian['namapenilaian']; ?></h3></strong>
						<a href="#myModall<?php echo $id ?>" role="button" class="btn btn-success" data-toggle="modal" title="Tambah"><i class="icon-plus" title="Tambah Penilaian"></i> 	</a>
					</div>
					<form id="form" action="action.php?action=add_nilai" method="POST" >
						<table class="table table-striped">
						<tr>
							  <th class="alert alert-danger">No</th>
							  <th class="alert alert-danger">Nama Penilaian</th>
							  <th class="alert alert-danger">Keterangan</th>
							  <th class="alert alert-danger">Oprasi</th>
							  <th class="alert alert-danger">Sub Penilaian</th>
							  <th class="alert alert-danger">Hapus</th>
							</tr>
							<?php 
								while ($row=mysql_fetch_array($data)):
							?>
							<tr>
								
								<td> <?php echo $a++;?></td>
								<td> <?php echo $row['jenispenilaian'];?> </td>
								<td> <?php echo $row['ketjenispenilaian'];?> </td> 
								<td> <?php echo $row['oprasi'];?> </td> 
								<td> <?php echo $row['nilai'];?></td>
								<td align="center"><a href="action.php?action=del_klasifikasi_nilai&id=<?php echo $row['indexnilai']; ?>" onclick="return confirm('Apakah Anda yakin menghapus data Nilai : <?php echo $row['jenispenilaian'];?> ?')"class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove" title="Hapus"> </i></a></td>
							</tr>
							<?php 
									endwhile;
								?>
						</table>
				  </div>
				  <div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					
				  </div>
				  </form>
				</div>
			<!--END Modal SubNilai --> 
			
			<!-- Modal Add SubNilai -->
			<div id="myModall<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h3 id="myModalLabel">Penambahan Penilaian</h3>
				  </div>
				  <div class="modal-body">
				  <form id="form" action="action.php?action=add_sub_nilai" method="POST" >
					<input id="id" name="id" value="<?php echo $id; ?>" type="hidden">
						<table class="table table-badge-success">
							<tr>
								<td class="alert-info">Jenis Klasifikasi	</td>
								<td class="alert-info"> <input  id="nama" name="nama" type="text" value="" required=""/></td>
							</tr>
							<tr>
								<td class="alert-info"> Keterangan </td>
								<td class="alert-info"> 
								<textarea id="ket" rows="5" name="ket"/></textarea></td>
							</tr>
							<tr>
							<td class="alert-info">Metode Penilaian</td>
							<td class="alert-info"><br>
							<input type="radio" name="media" value="0" checked /> Menggunakan
							CekBox, set kalkulasi nilai <br />
							<input type="radio" name="media" value="1" /> Menggunakan TexBox,
							set nilai maksimal sebagai kalkulasi nilai<br />
							<br>
							<SELECT NAME="oprasi" SIZE="1">
								<OPTION>+</OPTION>
								<OPTION>-</OPTION>
							</SELECT> 
							<input type="text" name="nilai" required=""/>(Set Nilai)</td>
						</tr>
							
						</table>
				  </div>
				  <div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					<button class="btn btn-primary">Save changes</button>
				  </div>
				  </form>
				</div>
			<!--END Modal Add SubNilai --> 
			<?php 
			} 
			?>	  
				  
				 <!-- Add Modal -->
				<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h3 id="myModalLabel">Tambah Daftar Penilaian</h3>
				  </div>
				  <div class="modal-body">
					<form id="form" action="action.php?action=add_nilai" method="POST" >
						<table class="table table-badge-success">
							<tr>
								<td class="alert-info">Nama Penilaian  </td>
								<td class="alert-info"> <input  id="nama" name="nama" type="text" value="" required=""/></td>
							</tr>
							<tr>
								<td class="alert-info"> Keterangan </td>
								<td class="alert-info"> 
								<textarea id="ket" rows="5" name="ket"/></textarea></td>
							</tr>
							
						</table>
				  </div>
				  <div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					<button class="btn btn-primary">Save changes</button>
				  </div>
				  </form>
				</div>
				</div> <!-- /controls -->	
			</div> <!-- /control-group -->
			<!--END Modal -->    
			</div>
			<!-- /container --> 
		</div>

<?php
	require_once'template/footer.php';
?>