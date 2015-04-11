<?php
	require_once'template/header.php';
	$kode=md5($data['username']);
	//echo $kode;
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
			 <div class="span3">
				 <div class="widget-header"> <i class="icon-pencil"> <a href="edit_profil.html?edit=<?php echo $kode ?>">Edit Profil</a></i>
				 </div>
				 <div class="widget-content ">
					 <img src="foto_mahasiswa/<?php echo $data['foto']?>" width=230 height=200 title="<?php echo $data['nama_mhs']?>" class="img-thumbnail">
				 </div>
				</div>
			 <div class="span8">
				 <div class="widget-header"> <i class="icon-user"></i>
				  <h3> Detail : <?php echo $data['nama_mhs']?></h3>
				 </div>
				 <div class="widget-content">
					 <table class="table">
					<tbody>
			          <tr>
			          	<td class="alert alert-success">NIM : </td> 
			          	<td class="alert alert-success"><?php echo $data['nim']?></td>
			          </tr>
					  <tr>
			          	<td class="alert alert-warning">Nama Lengkap : </td> 
			          	<td class="alert alert-warning"><b><?php echo $data['nama_mhs']?></b></td>
			          </tr>
			          <tr>
			          	<td class="alert alert-success">Program Studi :</td> 
			          	<td class="alert alert-success"><?php echo $data['prodi']?></td>
			          </tr>
					  <tr>
			          	<td class="alert alert-warning">Semester :</td> 
			          	<td class="alert alert-warning"><?php echo $data['semester']?></td>
			          </tr>
					  <tr>
			          	<td class="alert alert-success">No Handphone :</td> 
			          	<td class="alert alert-success"><?php echo $data['hp']?></td>
			          </tr>
					  <tr>
			          	<td class="alert alert-warning">Email :</td> 
			          	<td class="alert alert-warning"><?php echo $data['email']?></td>
			          </tr>
					  <tr>
			          	<td class="alert alert-success">Tanggal Daftar :</td> 
			          	<td class="alert alert-success"><?php echo $data['tgl_daftar']?></td>
			          </tr>
					</tbody>
				  </table>
				</div>
			 </div>
			 
            <!-- /widget-content --> 
          </div><br/>
          <!-- /widget --> 
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