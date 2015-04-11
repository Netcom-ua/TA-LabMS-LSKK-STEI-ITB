<?php
	require'template/header.php';
	#baca variabel URL (if register global on)
	$add_modul = $_GET['add_modul'];
	
	if(isset($_POST['tambah_modul'])){
	$kd_mk = $_POST['kd_mk'];
	$kd_modul = $_POST['kd_modul'];
	$nm_modul = $_POST['nm_modul'];
	$singkatan = $_POST['singkatan'];
	$deskripsi = $_POST['deskripsi'];
	$nm_kordas = $_POST['nm_kordas'];
	$toleransi = $_POST['toleransi'];
	$bobot = $_POST['bobot'];
	$kapasitas = $_POST['kapasitas'];
	
	$query = "INSERT INTO tb_mdl_praktikum VALUES (NULL,'$kd_mk','$kd_modul','$nm_modul','$singkatan','$deskripsi','$nm_kordas','$toleransi','$bobot','$kapasitas',NOW())";
	$sql = mysql_query($query);
	if($sql == 1)
	{
		echo "<script>
			alert('Berhasil ditambahkan');
		setTimeout(function() {
				document.location.href='modul_praktikum.html?modul=$add_modul';
		}, 1000);
		</script>";
	}
	else
	{
		echo "<script>
			alert('Pendaftaran Gagal');
		setTimeout(function() {
				document.location.href='add_modul.html';
		}, 1000);
		</script>";
	}
}

	$data=mysql_query("select * from tb_matakuliah where kd_mk='$add_modul'");
	//echo $data;
	$row=mysql_fetch_array($data)

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
              <h3>Halaman Tata Usaha</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
			<h3 class="bigstats" align="center">Daftar Modul Baru Matakuliah :  <?php echo $row['kd_mk'];?> <?php echo $row['nama_mk'];?></h3>
			<div class="account-container register">
			<div class="content clearfix">
					<div class="login-fields">
						<form action="#" method="post">
							<div class="field">
							<p>Kode Matakuliah</p>
								<input type="text" id="Kode Matakuliah" name="kd_mk" value="<?php echo $row['kd_mk'] ;?>" title="Kode Matakuliah" placeholder="Kode Matakulaih" class="login" required="required"/>
							</div> <!-- /field -->
							
							<div class="field">
							<p>Kode Modul</p>
								<input type="text" id="Kode Modul" name="kd_modul" value="" title="Kode Modul" placeholder="Kode Modul" class="login" required="required"/>
							</div> <!-- /field -->
							
							<div class="field">
							<p>Nama Modul</p>
								<input type="text" id="Nama Modul" name="nm_modul" value="" title="Nama Modul" placeholder="Nama Modul" class="login" required="required"/>
							</div> <!-- /field -->
							
							<div class="field">
							<p>Singkatan</p>
								<input type="text" id="Singkatan" name="singkatan" value="" title="Singkatan" placeholder="Singkatan" class="login" required="required"/>
							</div> <!-- /field -->
							
							<div class="field">
							<p>Deskripsi</p>
							<textarea class="input-xlarge" rows="4" id="Deskripsi" name="deskripsi" value=""  title="Deskripsi" placeholder="Deskripsi" class="login" required="required"></textarea>
							</div> <!-- /field -->
							
							<?php 
									$data=mysql_query("select * from tb_user where level='kordas'");
									//var_dump($query);
									while($row=mysql_fetch_array($data)){
									?>
							<div class="field">
							<p>Koordinator Asisten</p>
									<select class="input-xlarge" id="" name="nm_kordas" title="Koordinator Asisten" class="login" type="text" required="required">
										<option value="<?php echo $row['nama_user'];?>">Pilih Koordinator Asisten</option>
										<option value="<?php echo $row['nama_user'];?>"><?php echo $row['id_pengenal'];?> | <?php echo $row['nama_user']?></option>
									</select>
							</div> <!-- /field -->
							<?php
								}
							?>
							
							<div class="field">
							<p>Toleransi Tukar Jadwal (hari)</p>
								<input type="text" id="Toleransi" name="toleransi" value="" title="Toleransi Tukar Jadwal (hari)" placeholder="Toleransi Tukar Jadwal (hari)" class="login" required="required"/>
							</div> <!-- /field -->
							
							<div class="field">
							<p>Bobot Modul (%)</p>
								<input type="text" id="bobot" name="bobot" value="" title="Bobot Modul (%)" placeholder="Bobot Modul (%)" class="login" required="required"/>
							</div> <!-- /field -->
							
							<div class="field">
							<p>Kapasitas Orang</p>
								<input type="text" id="Kapasitas Orang" name="kapasitas" value="" title="Kapasitas Kelas (orang) " placeholder="Kapasitas Kelas (orang) " class="login" required="required"/>
							</div> <!-- /field -->
							
							</div> <!-- /login-fields -->
							
							<div class="login-actions">
								
							<button class="button btn btn-primary btn-large" name="tambah_modul">Tambah Modul</button>
						
						</div> <!-- .actions -->
							
						</form>
						
					</div> <!-- /widget -->
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
	require'template/footer.php';
?>