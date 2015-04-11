<?php
	require_once'template/header.php';
	$mhs = $data['nama_mhs'];
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Mahasiswa</h3>
            </div>
            <!-- /widget-header -->
				<div class="alert alert-success" align="center">
					
					<h3 class="bigstats" align="center">Informasi Peminjaman Barang Inventaris </h3><br/>
								
					<table class="table table-bordered">
						<thead>
						  <tr>
							<td class="alert-danger"> Kode Alat </td>
							<td class="alert-danger"> Nama Alat </td>
							<td class="alert-danger"> Tanggal Peminjaman </td>
							<td class="alert-danger">Tanggal Pengembalian  </td>
							<td class="alert-danger"> Jumlah </td>
							<td class="alert-danger"> Penanggung Jawab</td> 
							<td class="alert-danger"> Status </td>
						  </tr>
						</thead>
					<tbody>
						<!-- Menampilkan Jadwal Praktikum -->
						<?php 
						
						$query = mysql_query("select * from tb_pinjam where username='$user' order by status='Belum Disetujui' asc");
						while ($data = mysql_fetch_assoc($query)) {
						
						?>
					  <tr>
						<td class="alert-info"><?php echo $data['kode_alat']; ?>  </td>
						<td class="alert-info"> <?php echo $data['nama_alat']; ?> </td>
						<td class="alert-info"> <?php echo $data['tgl_pinjam']; ?> </td>
						<td class="alert-info"> <?php echo $data['tgl_kembali']; ?> </td>
						<td class="alert-info"> <?php echo $data['jumlah']; ?> </td>
						<td class="alert-info"> <?php echo $data['penanggung_jawab']; ?> </td>
						<td class="alert-info"> <?php echo $data['status']; ?> </td>
						</td>
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