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
					 <img src="../tatausaha/user/foto_user/<?php echo $data['foto']?>" width=250 height=200 title="<?php echo $data['nama_user']?>" class="img-thumbnail"></a>
				 </div>
				</div>
			 <div class="span8">
				 <div class="widget-header"> <i class="icon-user"></i>
				  <h3> Detail : <?php echo $data['nama_user']?></h3>
				 </div>
				 <div class="widget-content">
					 <table class="table">
					<tbody>
			          <tr>
			          	<td class="alert alert-success">Id Pengenal: </td> 
			          	<td class="alert alert-success"><?php echo $data['id_pengenal']?></td>
			          </tr>
			          <tr>
			          	<td class="alert alert-info">No Handphone :</td> 
			          	<td class="alert alert-info"><?php echo $data['hp']?></td>
					  </tr>
			          	<td class="alert alert-success">Username :</td> 
			          	<td class="alert alert-success"><?php echo $data['username']?></td>
			          </tr>
			          </tr>
			          	<td class="alert alert-info">Email :</td> 
			          	<td class="alert alert-info"><?php echo $data['email']?></td>
			          </tr>
					  <tr>
			          	<td class="alert alert-success">Tanggal Daftar :</td> 
			          	<td class="alert alert-success"><?php echo $data['tgl_daftar']?></td>
			          </tr>
					</tbody>
				  </table>
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