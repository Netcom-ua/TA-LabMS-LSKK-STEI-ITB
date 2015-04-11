<?php
	require'template/header.php';
	
	#baca variabel URL (if register global on)
	$modul = $_GET['modul'];
	$tgl_praktikum = $_GET['tanggal'].' '.$_GET['waktu'];
	$tanggal = $_GET['tanggal'];
	//echo $tanggal;
	$waktu = $_GET['waktu'];
?>
<?php

//Buat konfigurasi upload
//Folder tujuan upload file
$eror		= false;
$folder		= '../asisten/upload/'.$nim."/";

if (!is_dir($folder)) {
        mkdir($folder);
    } 
	
//type file yang bisa diupload
$file_type	= array('pdf','doc','docx');
//tukuran maximum file yang dapat diupload
$max_size	= 5000000; // 5MB
if(isset($_POST['btnUpload'])){
	//Mulai memorises data
	$file_name	= $_FILES['data_upload']['name'];
	$file_size	= $_FILES['data_upload']['size'];
	$file_type1	= $_FILES['data_upload']['type'];
	//cari extensi file dengan menggunakan fungsi explode
	$explode	= explode('.',$file_name);
	$extensi	= $explode[count($explode)-1];

	//check apakah type file sudah sesuai
	if(!in_array($extensi,$file_type)){
		$eror   = true;
		$pesan .= '- Type file yang anda upload tidak sesuai<br />';
	}
	if($file_size > $max_size){
		$eror   = true;
		$pesan .= '- Ukuran file melebihi batas maximum<br />';
	}
	//check ukuran file apakah sudah sesuai

	if($eror == true){
		echo '<div id="eror">'.$pesan.'</div>';
	}
	else{
		//mulai memproses upload file
		if(move_uploaded_file($_FILES['data_upload']['tmp_name'], $folder.$file_name)){
			//catat nama file ke database
			$catat = mysql_query('insert into tb_mdl_upload_laporan(nim,kd_modul ,file_name,size,type,path,date) values ("'.$nim.'","'.$modul.'","'.$file_name.'","'.$file_size.'","'.$file_type1.'","'.$folder.'","'.date('Y-m-d H:i:s').'")');

			echo '<div id="msg">Berhasil mengupload file '.$file_name.'</div>';
		} else{
			echo "Proses upload eror";
		}
	}
}
?>

    <div class="container">
      <div class="row">
        <div class="span12">
		<!-- Mengakibatkan table tidak responsive -->
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Halaman Mahasiswa</h3>
            </div>
			<!-- /widget-header -->
			<?php 
				$data=mysql_query("select * from tb_mdl_praktikum where kd_modul='$modul'");
				$row=mysql_fetch_array($data);
				$mk = $row['kd_mk'];
				
				$datak=mysql_query("select * from tb_matakuliah where kd_mk='$mk'");
				$rowk=mysql_fetch_array($datak);
			?>
            <div class="widget-content">
			<h3 class="bigstats" align="center">Matakuliah: <?php echo $row['kd_mk']; ?> <?php echo $rowk['nama_mk']; ?> </h3>
			<h3 class="bigstats" align="center">Praktikum: <?php echo $row['kd_modul']; ?> <?php echo $row['nm_modul']; ?> </h3>			
			<?php 
				$data=mysql_query("select * from tb_mdl_praktikum where kd_modul='$modul'");
				//echo $data;
				$no=1;
				while($row=mysql_fetch_array($data)){
			?>
				<table align="center">
						<td width="780">
							<table class="table  table-bordered">
								<tr>
								<hr/>
									<td class="alert-danger">Modul Ke-<?php echo $no?></td>
									<td class="alert-danger"><h4><?php echo $row['nm_modul']?>
									(Bobot Modul: <?php echo $row['bobot'];?>)</h4></span> </td>
								</tr>
								<tr>
									<td>Deskripsi</td>
									<td><?php echo $row['deskripsi'];?></td>
								</tr>
					</table>
					</table>
					<h3 align="center">Daftar Modul</h3>
					<table align="center">
					<td width="780">
					<table class="table  table-bordered">
					<thead>
						<td class="alert-info" width="20"> No </td>
						<td class="alert-info"> Judul </td>
						<td class="alert-info"> Nama File </td>
						<td class="alert-info"> Download Modul</th>
					  </tr>
					</thead>
					<tbody>
					<!-- Menampilkan data Mahasiswa yang belum dikonfirmasi -->
					<?php 
						$data=mysql_query("select * from tb_mdl_data where kd_modul='$modul' ");
						$no=1;
						//echo $data;
						while($row=mysql_fetch_array($data)){
						?>
					  <tr>	
						<td> <?php echo $no ?> </td>
						<td><?php echo $row['judul_modul'];?>  </td>
						<td><?php echo $row['nama_file'];?>  </td>
						<td> <a href="../tatausaha/upload/modul/<?php echo $row['nama_file']; ?>" class="btn btn-small btn-success"><?php  $nama_file = explode('/',$row['nama_file']); echo Download; ?></a></td>
					  </tr>
					  <?php 
						} 
						?>
					</tbody>
					</table>
					</table>
					
					<h3 align="center">Daftar Penilaian</h3>
					<table align="center">
					<td width="780">
					<table class="table  table-bordered">
					<thead>
						<tr>
							<td class="alert alert-success"width="20"> No </td>
							<td class="alert alert-success"> Judul </td>
							<td class="alert alert-success"> Nilai Awal </td>
							<td class="alert alert-success"> Bobot </td>
						</tr>
					  </tr>
					</thead>
					<tbody>
					<!-- Menampilkan data Mahasiswa yang belum dikonfirmasi -->
					<?php 
						$data=mysql_query("SELECT * from tb_idpenilaianpelaksananpraktikum WHERE kd_modul = '$modul'");
						$n=0;
						//echo $data;
						while($row=mysql_fetch_array($data)){
						?>
					  <tr>	
						<td> <?php echo $n=$n+1;?> 
							
							<td><?php echo $row['judul']?></td>
							
							<td> <?php echo $row['nilaiawal']?></td>
							
							<td> <?php echo $row['bobot']?></td>
					  </tr>
					  <?php 
						} 
						?>
					</tbody>
					</table>
					</table>
					
					<h3 align="center">Daftar Tugas</h3>
					<table align="center">
					<td width="780">
					<table class="table  table-bordered">
					<thead>
					  <tr>
						<td class="alert-success"width="20"> No </td>
						<td class="alert-success"> Judul </td>
						<td class="alert-success"> Tanggal Buka</td>
						<td class="alert-success"> Tanggal Tutup </td>
						<td class="alert-success"> File Tugas</td>
						<td class="alert-success"> Tgl Upload</td>
						<td class="alert-success">Kirim Tugas</td>
					  </tr>
					</thead>
					<tbody>
					<!-- Menampilkan daftar tugas Mahasiswa  -->
					<?php 
						$data=mysql_query("select * from tb_list_upload_tugas
						where kd_modul='$modul' and tgl_praktikum ='$tgl_praktikum'");

						$data1=mysql_query("SELECT *
							FROM tb_mdl_upload_laporan
							WHERE kd_modul = '$modul'
							AND nim = '$nim'");

						$row1=mysql_fetch_array($data1);
						
						$no=1;
						while($row=mysql_fetch_array($data)){
						?>
						
					  <tr>	
						<td> <?php echo $no ?></td>
						<td> <?php echo $row['judul_tugas'];?></td>
						<td> <?php echo $row['tgl_buka'].' '.$row['w_buka']?> </td>
						<td> <?php echo $row['tgl_tutup'].' '.$row['w_tutup']?></td>
						<?php 
						
						?>
						<?php
						//Mengambil Waktu Komputer
						$tgl = gmdate("Y-m-d H:i:s", time()+60*60*7); # WIB 
						$tglnowtimestamp = strtotime($tgl);
						$tgluploadtimestamp = $row['date'];
						//echo $tgluploadtimestamp;
						$tglbukatimestamp = strtotime($row['tgl_buka']);
						$tgltutuptimestamp = strtotime($row['tgl_tutup']);
						$uploadtugas = $row1['file_name'];
						
						//$tgl = $row['tgl_buka'].''.$row['tgl_tutup'];
						//echo $tanggal;
						
						if (empty($row1['file_name'])){
						?>
						<td class="td-actions"> <b class="btn btn-small btn-warning">Tugas belum diupload</td>
						<td></td>
						<?php
						}
						else if($tglnowtimestamp <= $tgltutuptimestamp) {
						?>
						<td> <?php echo $row1['file_name'];?>
						<a href="action_upload.php?action=deltugas&nim=<?php echo $nim ?>&modul=<?php echo $modul?>&tanggal=<?php echo $tanggal?>&waktu=<?php echo  $waktu?>" onclick="return confirm('Apakah Anda yakin menghapus data tugas : <?php echo $row1['file_name'];?>')"class="btn btn-danger btn-small">Hapus</a>
						<td> <?php echo $row1['date'];?></td>
						</td>
						<?php
						}
						else{
						?>
						<td> <?php echo $row1['file_name'];?> </td>
						<td> <?php echo $row1['date'];?> </td>
						<?php
						}
						?>
						<?php
						//Jika tanggal sekarang belum sama dengan tgl buka
						if ($tglnowtimestamp < $tglbukatimestamp){
						?>
						<!-- maka akan ditampilkan pesan -->
						<td class="td-actions"><a href="#"class="btn btn-small btn-success">Upload Tugas Belum dibuka</i></a></td>
						</tr>
						<?php
						}
						//Jika tanggal sekarang kecil sama dengan tgl tutup
						else if ($tglnowtimestamp <= $tgltutuptimestamp){
						?>
						<!-- maka aksi kirim tugas sudah dibuka -->
						<td class="td-actions">
						<form method="post" enctype="multipart/form-data" action="action_upload.html?modul=<?php echo $modul; ?>&tanggal=<?php echo $tanggal?>&waktu=<?php echo  $waktu?>">
							<input type="file" name="data_upload" />
							<input type="submit" name="btnUpload" class="btn btn-small btn-success" value="Upload" />
						</form>
						</td>
						</tr>
						<?php
						}
						else {
						?>
						<!-- Jika waktu tgl tutup telah lewat, maka upload tugas ditutup -->
						<td class="td-actions"><a href="#" class="btn btn-small btn-success">Upload Tugas Telah Ditutup</a></td>
						<?php
						}
						?>

					  <?php 
						} 
						?>
					</tbody>
					</table>
					</table>
			<?php
			}
			?>
			 <div class="alert alert-danger" align="center">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Catatan :  Penulisan tugas harus sesuai dengan format : NIM_Kode Praktikum_Judul Tugas <br/> Contoh : 03213039_EL2101-1_Tugas Modul 1</strong> 
			</div>
			</div>
          	<!-- /widget-header -->
          </div>  
          <!-- /widget --> 
        </div>  
       </div>
   </div>
<?php
	require'template/footer.php';
?>