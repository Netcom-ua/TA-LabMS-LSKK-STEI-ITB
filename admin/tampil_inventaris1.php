<?php 
error_reporting(0);

?> 

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th colspan="13" align="left" valign="top"><a href="#myAdd" title="Edit" role="button" class="btn btn-warning" data-toggle="modal">Tambah Data Inventaris</a>
    </tr>
    <tr id='fn' >
	<td class="alert-info">No</td>
	<td class="alert-info">Kode Alat</td>
	<td class="alert-info">Nama Alat</td>
	<td class="alert-info">Nama Lab</td>
	<td class="alert-info">Jenis Praktikum</td>
	<td class="alert-info">Spesifikasi</td>
	<td class="alert-info">Stok</td>
	<td class="alert-info">Satuan</td>
	<td class="alert-info">Tanggal Masuk</td>
	<td class="alert-info">Foto</td>
	<td class="alert-info">Aksi</td>
  </tr>
</thead>
<tbody>


<?php
include"../include/koneksi.php";
$per_page = 5;
				$page_query = mysql_query("SELECT COUNT(*) FROM tb_inventaris");
				$pages = ceil(mysql_result($page_query, 0) / $per_page);

				$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
				$start = ($page - 1) * $per_page;
				
				$no=1;
				$query = mysql_query("SELECT * FROM tb_inventaris LIMIT $start, $per_page");
$no=$posisi+1;				
while($data7=mysql_fetch_array($query)){
echo"<tr class='odd gradeU'>
	<td valign='top'>$no</td>
	<td valign='top'>$data7[kode_alat]</td>
	<td valign='top'>$data7[nama_alat]</td>
	<td valign='top'>$data7[nama_lab]</td>
	<td valign='top'>$data7[jenis_praktikum]</td>
	<td valign='top'>$data7[spesifikasi]</td>
	<td valign='top'>$data7[jumlah]</td>
	<td valign='top'>$data7[satuan]</td>
	<td valign='top'>$data7[tgl_masuk]</td>
	<td valign='top'><img src=\"../teknisi/img/foto_alat/$data7[foto]\" width=\"150px\"></img></td>
	<td><div class=\"btn-group \"><a href=\"#myModalid$data7[kode_alat]\" title=\"Edit\" role=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\"><i class=\"icon-edit\"></i></a><a href=\"detail_inventaris.php?Kode_Alat=$data7[kode_alat]\" target=\"_blank\" title=\"Detail\" role=\"button\" class=\"btn btn-warning\"><i class=\"icon-info-sign\"></i></a>
	<a href=\"fungsi_del.php?action=hapus_iventaris&kd_alat=$data7[kode_alat]\" title=\"Hapus\" role=\"button\" class=\"btn btn-warning\"><i class=\"icon-remove-sign\"  onClick=\"return confirm('Apakah anda akan menghapus $data->nama_alat?')\"></i></a>
	<a HREF=\"demo.php?Kode_Alat=$data7[kode_alat]\"
			onClick=\"popup = window.open('demoinv.php?Kode_Alat=$data7[kode_alat]', 'PopupPage', 'height=450,width=300,scrollbars=yes,resizable=yes'); return false\" 
			target=\"_blank\" role=\"button\" class=\"btn btn-warning\" title=\"QR Code\"> 
			<i class=\"icon-qrcode\"></i>
			</a></div>
	</td>



</tr>";
$no++;
$a=$data7['kode_alat']; 
?>


<div id="myModalid<?php echo $a?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Edit Data Alat </h3>
  </div>
  <div class="modal-body">
  <form action="act_simpan_edit_inventaris.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<label>Kode Alat</label>
	<div class="field">
		<input name="kode_barang" type="text" readonly="readonly" value="<?php echo $data7['kode_alat']; ?>"  />
	</div>
	<label>Nama Alat</label>
	<div class="field">
		<input name="nama_barang" type="text" value="<?php echo $data7['nama_alat']; ?>" />
	</div>		
	<label>Kode Lab</label>
	<div class="field">
		<label>
        <select name="kode_lab" value="<?php echo $data7['kode_lab']; ?>">
		<option><?php echo $data7['kode_lab']; ?></option>
          <option>Ruang TU</option>
          <option>Ruang 1</option>
          <option>Ruang 2</option>
        </select>
        </label>
	</div>		
	<label>Nama Lab</label>
	<div class="field">
		<label>
        <select name="nama_lab">
			<option><?php echo $data7['nama_lab']; ?></option>
          <option>Laboratorium Dasar Teknik Elektro</option>
        </select>
        </label>
	</div>		
	<!--<label>Tanggal Pengajuan</label>
	<div class="field">
		<input type="text"  name="tgl_pengajuan" id="tanggal<?php echo $data7['kode_alat']; ?>" value="<?php echo $data7['tgl_pengajuan']; ?>"/>
	</div>		
	<label>Tanggal Masuk</label>
	<div class="field">
		<input type="text"  name="tgl_masuk" id="tanggal2<?php echo $data7['kode_alat']; ?>" value="<?php echo$data7['tgl_masuk']; ?>"/>
	</div>		
	<label>Tanggal Penghapusan</label>
	<div class="field">
		<input type="text"  name="tgl_penghapusan" id="tanggal3<?php echo $data7['kode_alat']; ?>"  value="<?php echo$data7['tgl_penghapusan']; ?>"/>
	</div>-->
	<label>Spesifikasi</label>
	<div class="field">
		<textarea name="spesifikasi" cols="25" id="spek"><?php echo$data7['spesifikasi']; ?>
		</textarea>
	</div>		
	<label>Jenis Praktikum</label>
	<div class="field">
		<input type="text"  name="jenis_prak"  value="<?php echo$data7['jenis_praktikum']; ?>"/>
	</div>		
	<label>Tahun Pembuatan</label>
	<div class="field">
		<label>
        <select name="tahun_pem">
          <option><?php echo$data7['thn_pembuatan']; ?></option>
		  <option>2000</option>
		  <option>2001</option>
		  <option>2002</option>
		  <option>2003</option>
		  <option>2004</option>
		  <option>2005</option>
		  <option>2006</option>
		  <option>2007</option>
		  <option>2008</option>
		  <option>2009</option>
		  <option>2010</option>
		  <option>2011</option>
		  <option>2012</option>
		  <option>2013</option>
		  <option>2014</option>
		  <option>2015</option>
        </select>
        </label>
	</div>		
	<label>Stok</label>
	<div class="field">
		<input name="stok" type="text" value="<?php echo$data7['jumlah']; ?>" /></span>
	</div>		
	<label>Satuan</label>
	<div class="field">
		<label>
        <select name="satuan">
		<option><?php echo$data7['satuan']; ?></option>
          <option>set</option>
		  <option>unit</option>
		  <option>buah</option>
		  <option>lainnya</option>
        </select>
        </label>
	</div>		
	<label>Keterangan</label>
	<div class="field">
		<input name="ket" type="text" value="<?php echo$data7['ket']; ?>" />
	</div>
		<label>Foto</label>
	<div class="field">
		<input type="file" name="foto" value="<?php echo$data7['foto']; ?>" />
	</div>	
				
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
  	</form>
</div>

<div id="myAdd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Tambah Data </h3>
  </div>
  <div class="modal-body">
 <!--< <div class="alert">
  <form action="admin_import_excel.php" method="post" enctype="multipart/form-data">
	<p><strong class="style3">&nbsp;Import Data Alat Menggunakan Excel </strong></p>
	  <p>&nbsp;Untuk mengimport file excel format file harus sama pada link download dibawah ini:<br />
	&nbsp;dan format file harus bertipe .xls <br />
	&nbsp;<a href="master_excel_alat.xls">MasterFile Disini</a><br /></p>
	<div class="field">
		<input type="file" name="import" />
		<button class="btn btn-primary">Import</button>
	</div>	
  </form>
	</div>-->
  <form action="act_insert_inventaris.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
		<label>Kode Alat</label>
	<div class="field">
		<input name="kode_barang" type="text" required="" />
	</div>
	<label>Nama Alat</label>
	<div class="field">
		<input name="nama_barang" type="text" required="" />
	</div>		
	<label>Kode Lab</label>
	<div class="field" required="">
		<label>
        <select name="kode_lab" >
          <option>Ruang TU</option>
          <option>Ruang 1</option>
          <option>Ruang 2</option>
        </select>
        </label>
	</div>		
	<label>Nama Lab</label>
	<div class="field">
		<label>
        <select name="nama_lab" required="">
          <option>Laboratorium Dasar Teknik Elektro</option>
        </select>
        </label>
	</div>			
	<label>Spesifikasi</label>
	<div class="field" required="">
		<textarea name="spesifikasi" cols="25" id="spek">
		</textarea>
	</div>		
	<label>Jenis Praktikum</label>
	<div class="field" required="">
		<input type="text"  name="jenis_prak"/>
	</div>		
	<label>Tahun Pembuatan</label>
	<div class="field" required="">
		<label>
        <select name="tahun_pem">
          
		  <option>2000</option>
		  <option>2001</option>
		  <option>2002</option>
		  <option>2003</option>
		  <option>2004</option>
		  <option>2005</option>
		  <option>2006</option>
		  <option>2007</option>
		  <option>2008</option>
		  <option>2009</option>
		  <option>2010</option>
		  <option>2011</option>
		  <option>2012</option>
		  <option>2013</option>
		  <option>2014</option>
		  <option>2015</option>
        </select>
        </label>
	</div>		
	<label>Stok</label>
	<div class="field">
		<input name="stok" type="text" required="" >
	</div>		
	<label>Satuan</label>
	<div class="field" required="">
		<label>
        <select name="satuan">
		
          <option>set</option>
		  <option>unit</option>
		  <option>buah</option>
		  <option>lainnya</option>
        </select>
        </label>
	</div>		
	<label>Keterangan</label>
	<div class="field">
		<input name="ket" type="text" required="" />
	</div>
		<label>Foto</label>
	<div class="field">
		<input type="file" name="foto" required="" />
	</div>		
				
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
  	</form>
</div>


<?php
}
?>

</tbody>
</table>

<div class="pagination pagination-small pagination-centered">
				<ul>
				  <?php
					if($pages >= 1 && $page <= $pages)
					{
					  for($x=1; $x<=$pages; $x++)
					  {
						if($x == $page)
							echo ' <li class="active"><a href="/page'.$x.'">'.$x.'</a></li>';
						else
							echo ' <li><a href="?page='.$x.'">'.$x.'</a></li>';
					  }
					}
					?>
				</ul>
			</div>

