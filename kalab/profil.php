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
			          	<td>Id Pengenal: </td> 
			          	<td><?php echo $data['id_pengenal']?></td>
			          </tr>
			          <tr>
			          	<td>No Handphone :</td> 
			          	<td><?php echo $data['hp']?></td>
					  </tr>
			          	<td>Username :</td> 
			          	<td><?php echo $data['username']?></td>
			          </tr>
			          </tr>
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
			 </div>
			 
            <!-- /widget-content --> 	
          </div>
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