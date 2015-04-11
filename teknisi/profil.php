<?php
	require_once'template/header.php';
	$kode=md5($data['username']);
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
			 <div class="span3">
				 <div class="widget-header"> <i class="icon-pencil"> <a href="edit_profil.html?edit=<?php echo $kode ?>">Edit Profil</a></i>
				 </div>
				 <div class="widget-content">
					 <img src="../staf/foto_staf/<?php echo $data['foto']?>" width=230 height=200 title="<?php echo $data['nama_staf']?>" class="img-thumbnail">
				 </div>
				</div>
			 <div class="span8">
				 <div class="widget-header"> <i class="icon-user"></i>
				  <h3> Detail : <?php echo $data['nama_staf']?></h3>
				 </div>
				 <div class="widget-content">
					 <table class="table">
					<tbody>
			          <tr>
			          	<td>NIP : </td> 
			          	<td><?php echo $data['nip_staf']?></td>
			          </tr>
			          <tr>
			          	<td>No Hp :</td> 
			          	<td><?php echo $data['hp']?></td>
			          </tr>
					  <tr>
			          	<td>Jabatan :</td> 
			          	<td><?php echo $data['jabatan']?></td>
			          </tr>
					  <tr>
			          	<td>Username :</td> 
			          	<td><?php echo $data['username']?></td>
			          </tr>
					  <tr>
			          	<td>Email :</td> 
			          	<td><?php echo $data['email']?></td>
			          </tr>
					  <tr>
			          	<td>Tanggal Daftar :</td> 
			          	<td><?php echo $data['tgl_daftar']?></td>
			          </tr>
					</tbody>
				  </table>
				</div>
			 
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
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