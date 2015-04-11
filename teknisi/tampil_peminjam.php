<?php
	require_once'template/header.php';
	error_reporting(0);
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Halaman Teknisi</h3>
            </div>
            <!-- /widget-header -->
              <div class="widget big-stats-container">
                <div class="widget-content">
					<div class="alert alert-info">
						<h3 align="center">Informasi Peminjaman</h3>
					</div>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#inventaris" data-toggle="tab">Inventaris</a></li>
					  <li><a href="#atk" data-toggle="tab">ATK</a></li>
					  
					</ul>
					<div class="tab-content">
					  <div class="tab-pane active" id="inventaris">
												  
											  
					<table class="table table-striped table-bordered">
					  <thead>
						<tr>
						  <th colspan="13" align="left" valign="top"></th>
						</tr>
						<tr id='fn' >
						<th>N0</th>
						<th>Username</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Nama Alat</th>
						<th>Tgl Pinjam</th>
						<th>Tgl Kembali</th>
						<th>Jumlah</th>
						<th>Penanggung Jawab</th>
						<th>Status</th>
						<th>Pengembalian</th>
					  </tr>
					</thead>
					<tbody>
					  
					</div>

					<?php
					include"../include/koneksi.php";
					$tampil=mysql_query("select*from tb_pinjam  order by tgl_pinjam desc");
					$no=$posisi+1;
					while($data=mysql_fetch_array($tampil)){
					echo"<tr class='odd gradeU'>
						<td valign='top'>$no</td>
						<td valign='top'>$data[username]</td>
						<td valign='top'>$data[nama_peminjam]</td>
						<td valign='top'>$data[email]</td>
						<td valign='top'>$data[nama_alat]</td>
						<td valign='top'>$data[tgl_pinjam]</td>
						<td valign='top'>$data[tgl_kembali]</td>
						<td valign='top'>$data[jumlah]</td>
						<td valign='top'>$data[penanggung_jawab]</td>
						<td valign='top'><div class=\"alert alert-info\"><strong>$data[status]</strong></div><a href=\"#myModalid$data[id_pinjam]\" role=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\">Ubah Status</a></td>
						<td align='center'>
						<a href=\"#myKembali$data[id_pinjam]\" role=\"button\" class=\"btn btn-primary btn-large\" data-toggle=\"modal\">Pengembalian</a>
						</td>
					</tr>";
					$no++;
					$a=$data['id_pinjam']; 

					?>
					<!-- Modal -->
					<div id="myModalid<?php echo $a?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 id="myModalLabel">Ubah Status </h3>
					  </div>
					  <div class="modal-body">
					  <form action="act_konfirm.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
								<div class="field">
									<input type="hidden" name="id_pinj" value="<?php echo $data['id_pinjam']?>" readonly="readonly"/>
								</div>
								<div class="field">
									<input type="hidden" name="username" value="<?php echo $data['username']?>" readonly="readonly"/>
								</div>
								<div class="field">
									<input type="text" name="nama_peminjam" value="<?php echo $data['nama_peminjam']?>" readonly="readonly"/>
								</div>
								<div class="field">
									<input type="hidden" name="kode_alat" value="<?php echo $data['kode_alat']?>" readonly="readonly"/>
									<input type="hidden" name="nama_alat" value="<?php echo $data['nama_alat']?>" readonly="readonly"/>
								</div>
								
								<label>Tanggal Pinjam</label>
								<div class="field">
									<input type="text" value="<?php echo $data['tgl_pinjam']?>" readonly="readonly"/>
								</div>

								<label>Tanggal Kembali </label>
								<div class="field">
									<input  type="text"   value="<?php echo $data['tgl_kembali']?>"  readonly="readonly"/>
								</div>			
										
								<label>Konfirm </label>
								<select name="status">
								  <option><?php echo $data['status'] ?></option>
								  <option value="Disetujui">Disetujui</option>
								  <option value="Belum Disetujui">Belum Disetujui</option>
								</select>
				
			  </div>
			  <div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<button class="btn btn-primary">Save changes</button>
			  </div>
				</form>
			</div>

			<div id="myKembali<?php echo $a?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Pengembalian <?php echo $data['nama_peminjam']?> </h3>
			  </div>
			  <div class="modal-body">
			  <form action="act_pengembalian.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
							
				<div class="field">
					<input name="username"  type="hidden"  value="<?php echo $data['username']?>" size="20" readonly="readonly"/>
				</div>

				
				<div class="field">
					<input type="hidden" name="nama"  value="<?php echo $data['nama_peminjam']?>" readonly="readonly"/>
				</div>

				
				<div class="field">
					<input type="hidden" name="email"  value="<?php echo $data['email']?>" readonly="readonly"/>
				</div>

				
				<div class="field">
					<input type="hidden" name="kode_alat"  value="<?php echo $data['kode_alat']?>" readonly="readonly"/>
				</div>

				<label>Nama Alat</label>
				<div class="field">
					<input type="text" name="nama_alat"  value="<?php echo $data['nama_alat']?>" readonly="readonly"/>
				</div>

				<label>Tanggal Pinjam</label>
				<div class="field">
					<input type="text" name="tgl_pinjam"  value="<?php echo $data['tgl_pinjam']?>" readonly="readonly"/>
				</div>

				<label>Tanggal Kembali </label>
				<div class="field">
					<input  type="text"  name="tgl_kembali" value="<?php echo $data['tgl_kembali']?>" id="tgl_pinjam" readonly="readonly" />
				</div>
				
				
				<div class="field">
					<input type="hidden" name="status"  value="Sudah Dikembalikan" readonly="readonly"/>
				</div>
				
				<label>Jumlah </label>
				<div class="field">
					<input  type="text"  name="jumlah" value="<?php echo $data['jumlah']?>" placeholder="Jumlah"  id="tgl_pinjam" readonly="readonly" />
				</div>

				<label>Dosen Penaanggung Jawab </label>
				<div class="field">
					<input type="text" name="penanggung_jawab"  value="<?php echo $data['penanggung_jawab']?>" readonly="readonly"/>
				</div>	
							
			  </div>
			  <div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<button class="btn btn-primary">Sudah Dikembalikan</button>
			  </div>
				</form>
			</div>
			<?php 
			}
			?>


			</tbody>
			</table>



			  </div> <!-- /akhir tab Inv--> 
							
			  
			  <div class="tab-pane" id="atk">
				<div class="tab-pane" id="atk">
				<table class="table table-striped table-bordered">
			  <thead>
				<tr>
				  <th colspan="13" align="left" valign="top"></th>
				</tr>
				<tr id='fn' >
				<th>N0</th>
				<th>Username</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Nama Alat</th>
				<th>Tgl Pinjam</th>
				<th>Tgl Kembali</th>
				<th>Penanggung Jawab</th>
				<th>Status</th>
				<th>Pengembalian</th>
			  </tr>
			</thead>
			<tbody>


			<?php
			include"../include/koneksi.php";

			$tampil=mysql_query("select*from tb_pinjam_atk order by tgl_pinjam desc");
			$no=$posisi+1;
			while($data13=mysql_fetch_array($tampil)){
			echo"<tr class='odd gradeU'>
				<td valign='top'>$no</td>
				<td valign='top'>$data13[username]</td>
				<td valign='top'>$data13[nama_peminjam]</td>
				<td valign='top'>$data13[email]</td>
				<td valign='top'>$data13[nama_alat]</td>
				<td valign='top'>$data13[tgl_pinjam]</td>
				<td valign='top'>$data13[tgl_kembali]</td>
				<td valign='top'>$data13[penanggung_jawab]</td>
				<td valign='top'><div class=\"alert alert-info\"><strong>$data13[status]</strong></div><a href=\"#atk1$data13[id_pinjam_atk]\" role=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\">Ubah Status</a></td>
				<td valign='top'><a href=\"#atk2$data13[id_pinjam_atk]\" role=\"button\" class=\"btn btn-primary btn-large\" data-toggle=\"modal\">Pengembalian</a></td>
				
			</tr>";
			$no++;
			$a1=$data13['id_pinjam_atk'];
			?>

			<div id="atk1<?php echo $a1?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Ubah Status </h3>
			  </div>
			  <div class="modal-body">
			  <form action="act_konfirm_atk.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
						<div class="field">
							<input type="hidden" name="id_pinj" value="<?php echo $data13['id_pinjam_atk']?>" readonly="readonly"/>
						</div>
						<div class="field">
							<input type="hidden" name="kode_alat" value="<?php echo $data13['kode_alat']?>" readonly="readonly"/>
						</div>
						<label>Tanggal Pinjam</label>
						<div class="field">
							<input type="text" value="<?php echo $data13['tgl_pinjam']?>" readonly="readonly"/>
						</div>

						<label>Tanggal Kembali </label>
						<div class="field">
							<input  type="text"   value="<?php echo $data13['tgl_kembali']?>"  readonly="readonly"/>
						</div>			
								
									<label>Konfirm </label>
									<select name="status">
									  <option><?php echo $data13['status'] ?></option>
									  <option value="Disetujui">Disetujui</option>
									  <option value="Belum Disetujui">Belum Disetujui</option>
									</select>
							
			  </div>
			  <div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<button class="btn btn-primary">Save changes</button>
			  </div>
				</form>
			</div>


			<div id="atk2<?php echo $a1?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Pengembalian <?php echo $data13['nama_peminjam']?> </h3>
			  </div>
			  <div class="modal-body">
			  <form action="act_pengembalian_atk.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
							
				<div class="field">
					<input name="username"  type="hidden"  value="<?php echo $data13['username']?>" size="20" readonly="readonly"/>
				</div>

				
				<div class="field">
					<input type="hidden" name="nama"  value="<?php echo $data13['nama_peminjam']?>" readonly="readonly"/>
				</div>

				
				<div class="field">
					<input type="hidden" name="email"  value="<?php echo $data13['email']?>" readonly="readonly"/>
				</div>

				
				<div class="field">
					<input type="hidden" name="kode_alat"  value="<?php echo $data13['kode_alat']?>" readonly="readonly"/>
				</div>

				<label>Nama Alat</label>
				<div class="field">
					<input type="text" name="nama_alat"  value="<?php echo $data13['nama_alat']?>" readonly="readonly"/>
				</div>

				<label>Tanggal Pinjam</label>
				<div class="field">
					<input type="text" name="tgl_pinjam"  value="<?php echo $data13['tgl_pinjam']?>" readonly="readonly"/>
				</div>

				<label>Tanggal Kembali </label>
				<div class="field">
					<input  type="text"  name="tgl_kembali" value="<?php echo $data13['tgl_kembali']?>" id="tgl_pinjam" readonly="readonly" />
				</div>
				
				

				<label>Dosen Penaanggung Jawab </label>
				<div class="field">
					<input type="text" name="penanggung_jawab"  value="<?php echo $data13['penanggung_jawab']?>" readonly="readonly"/>
				</div>	
							
			  </div>
			  <div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<button class="btn btn-primary">Sudah Dikembalikan</button>
			  </div>
				</form>
			</div>
					

			<?php
			}
			?>
			<!-- Tambah Data -->

			</tbody>
			</table>	
			  </div> <!-- /akhir tab ATK -->
			</div> 
                
            </div>
          </div>
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
<?php
	require_once'template/footer.php';
?>