<?php
	require_once'template/header.php';
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
			 <div class="span3">
				 <div class="widget-header"> <i class="icon-pencil"> <a href="edit_profil.html?edit=<?php echo $data['username']?>">Edit Profil</a></i>
				 </div>
				 <div class="widget-content">
					 <img src="user/foto_user/<?php echo $data['foto']?>" width=250 height=200 title="<?php echo $data['nama_staf']?>"class="img-thumbnail">
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
			          	<td class="alert alert-success">NIP : </td> 
			          	<td class="alert alert-success"><?php echo $data['nip_staf']?></td>
			          </tr>
					  <tr>
			          	<td class="alert alert-warning">Nama Lengkapt : </td> 
			          	<td class="alert alert-warning"><?php echo $data['nama_staf']?></td>
			          </tr>
					  <tr>
			          	<td class="alert alert-success">No Handphone :</td> 
			          	<td class="alert alert-success"><?php echo $data['hp']?></td>
			          </tr>
					  <tr>
			          	<td class="alert alert-warning">Username :</td> 
			          	<td class="alert alert-warning"><?php echo $data['username']?></td>
			          </tr>
					  <tr>
			          	<td class="alert alert-success">Email :</td> 
			          	<td class="alert alert-success"><?php echo $data['email']?></td>
			          </tr>
					  <tr>
			          	<td class="alert alert-warning">Tanggal Daftar :</td> 
			          	<td class="alert alert-warning"><?php echo $data['tgl_daftar']?></td>
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