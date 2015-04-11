<?php
	require_once'template/header.php';
	$kode=md5($data['username']);
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
			 <div class="span3">
				 <div class="widget-header"> <i class="icon-pencil"> <a href="edit_profil.html?edit=<?php echo $kode?>">Edit Profil</a></i>
				 </div>
				 <div class="widget-content">
					 <img src="../tatausaha/user/foto_user/<?php echo $data['foto']?>" width=230 height=220 title="<?php echo $data['nama_user']?>" class="img-thumbnail"></a>
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
			          	<td class="alert alert-warning">Nama Lengkap: </td> 
			          	<td class="alert alert-warning"><?php echo $data['nama_user']?></td>
			          </tr>
			          <tr>
			          	<td class="alert alert-success">No Handphone :</td> 
			          	<td class="alert alert-success"><?php echo $data['hp']?></td>
					  </tr>
			          	<td class="alert alert-warning">Username :</td> 
			          	<td class="alert alert-warning"><?php echo $data['username']?></td>
			          </tr>
			          </tr>
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
			 </div>
			 
            <!-- /widget-content --> 
          </div>
      
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<?php
	require_once'template/footer.php';
?>