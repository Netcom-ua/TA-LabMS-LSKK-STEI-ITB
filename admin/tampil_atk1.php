<?php 
error_reporting(0);
include("../include/fungsi_del.php");
if ($_GET['act']=="del") hapus_alat();
?> 

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th colspan="13"  valign="top"><a href="#myMadd" title="Edit" role="button" class="btn btn-warning" data-toggle="modal">Tambah Data ATK</a></th>
    </tr>
    <tr id='fn' >
    <th>N0</th>
    <th>Kode Alat</th>
    <th>Nama Alat</th>
	<th>Nama Ruangan</th>
	<th>Type</th>
	<th>Spesifikasi</th>
	<th>Stok</th>
	<th>Keterangan</th>
	<th>Foto</th>
	<th>Aksi</th>
  </tr>
</thead>
<tbody>


<?php
include"../include/koneksi.php";
	$per_page = 5;
				$page_query = mysql_query("SELECT COUNT(*) FROM tb_atk");
				$pages = ceil(mysql_result($page_query, 0) / $per_page);

				$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
				$start = ($page - 1) * $per_page;
				
				$no=1;
				$query = mysql_query("SELECT * FROM tb_atk LIMIT $start, $per_page");
$no=$posisi+1;
while($data7=mysql_fetch_array($query)){
echo"<tr class='odd gradeU'>
	<td valign='top'>$no</td>
	<td valign='top'>$data7[kode_alat]</td>
	<td valign='top'>$data7[nama_alat]</td>
	<td valign='top'>$data7[nama_lab]</td>
	<td valign='top' align='center'>$data7[tipe]</td>
	<td valign='top'>$data7[spesifikasi]</td>
	<td valign='top'>$data7[stok]</td>
	<td valign='top'>$data7[ket]</td>
	<td><img src=\"../teknisi/img/foto_alat_atk/$data7[foto]\" width=\"150px\"></img></td>
	<td><div class=\"btn-group\"><a href=\"#myModalid$data7[kode_alat]\" title=\"Edit\" role=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\"><i class=\"icon-edit\"></i></a><a href=\"detail_atk.php?Kode_Alat=$data7[kode_alat]\" target=\"_blank\" role=\"button\" class=\"btn btn-warning\" title=\"Detail\"><i class=\"icon-info-sign\"></i></a>
	<a href=\"tampil_atk.php?act=del&Kode_Alat=$data7[kode_alat]\" title=\"Hapus\" role=\"button\" class=\"btn btn-warning\"><i class=\"icon-remove-sign\"  onClick=\"return confirm('Apakah anda akan menghapus $data7->nama_alat?')\" ></i></a>
	
	<a HREF=\"demo.php?Kode_Alat=$data7[kode_alat]\"
			onClick=\"popup = window.open('demo.php?Kode_Alat=$data7[kode_alat]', 'PopupPage', 'height=450,width=300,scrollbars=yes,resizable=yes'); return false\" 
			target=\"_blank\" role=\"button\" class=\"btn btn-warning\" title=\"Show QR Code\">
			<i class=\"icon-qrcode\"></i></a></div>
	</td>
</tr>";
$no++;
$b=$data7[kode_alat];
?>

<div id="myModalid<?php echo $b;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Edit Data Alat </h3>
  </div>
  <div class="modal-body">
  <form action="act_simpan_edit_atk.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<label>Kode_Alat</label>
	<div class="field">
		<input name="kode_alat" readonly="readonly" type="text"  value="<? echo $data7['kode_alat']?>" />
	</div>
	<label>Nama Alat</label>
	<div class="field">
		<input name="nama_alat" type="text" size="25"  value="<? echo $data7['nama_alat']?>"/>
	</div>
	<label>Kode Lab</label>
	<div class="field">
		<label> </label>
        <label>
        <select name="kode_lab" value=<? echo $data7['kode_lab']?>>
          <option>Ruang TU</option>
          <option>Ruang 1</option>
          <option>Ruang 2</option>
        </select>
        </label>
	</div>
	<label>Nama Lab</label>
	<div class="field">
		<label> </label>
        <label>
        <select name="nama_lab" value="<? echo $data7['nama_lab']?>">
          <option>Laboratorium Dasar Teknik Elektro</option>
        </select>
        </label>
	</div>
	<label>Tanggal Masuk</label>
	<div class="field">
		<input type="text"  name="tgl_masuk" id="tanggal<?php echo $b;?>" value="<? echo $data7['tgl_masuk']?>"/>
	</div>
	<label>Tanggal Pengajuan</label>
	<div class="field">
		<input type="text"  name="tgl_pengajuan" id="tanggal2<?php echo $b;?>" value="<? echo $data7['tgl_pengajuan']?>"/>
	</div>
	<label>Tanggal Penghapusan</label>
	<div class="field">
		<input type="text"  name="tgl_penghapusan" id="tanggal3<?php echo $b;?>" value="<? echo $data7['tgl_pengapusan']?>"/>
	</div>
	<label>Type</label>
	<div class="field">
		<input name="tipe" type="text" size="25"  value="<? echo $data7['tipe']?>"/>
	</div>
	<label>Spesifikasi</label>
	<div class="field">
		<textarea name="spesifikasi" cols="25"><? echo $data7['spesifikasi']?></textarea>
	</div>
	<label>Stok</label>
	<div class="field">
		<label>
        <select name="stok">
          <option><?php echo $data7['stok']?></option>
		  <option>Tersedia</option>
		  <option>Tidak Tersedia</option>
        </select>
        </label>
        <label> </label>
	</div>
	<label>Keterangan</label>
	<div class="field">
		<input name="ket" type="text" size="25"  value="<? echo $data7['ket']?>"/>
	</div>
	<label>Foto</label>
	<div class="field">
		<input type="file" name="foto" /> 
	</div>
	
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
  	</form>
</div>


<div id="myMadd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Tambah Data Alat </h3>
  </div>
  <div class="modal-body">
  <div class="alert">
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
	</div>
  <form action="act_insert_atk.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<label>Kode_Alat</label>
	<div class="field">
		<input name="kode_alat"  type="text"  />
	</div>
	<label>Nama Alat</label>
	<div class="field">
		<input name="nama_alat" type="text" size="25" />
	</div>
	<label>Kode Lab</label>
	<div class="field">
		<label> </label>
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
		<label> </label>
        <label>
        <select name="nama_lab" >
          <option>Laboratorium Dasar Teknik Elektro</option>
        </select>
        </label>
	</div>
	<label>Tanggal Masuk</label>
	<div class="field">
		<input type="text"  name="tgl_masuk" id="tanggal" value="<? echo $data7['tgl_masuk']?>"/>
	</div>
	<label>Tanggal Pengajuan</label>
	<div class="field">
		<input type="text"  name="tgl_pengajuan" id="tanggal2" value="<? echo $data7['tgl_pengajuan']?>"/>
	</div>
	<label>Tanggal Penghapusan</label>
	<div class="field">
		<input type="text"  name="tgl_penghapusan" id="tanggal3" value="<? echo $data7['tgl_pengapusan']?>"/>
	</div>
	<label>Type</label>
	<div class="field">
		<input name="tipe" type="text" size="25"  />
	</div>
	<label>Spesifikasi</label>
	<div class="field">
		<textarea name="spesifikasi" cols="25"></textarea>
	</div>
	<label>Stok</label>
	<div class="field">
		<label>
        <select name="stok">
		  <option>Tersedia</option>
		  <option>Tidak Tersedia</option>
        </select>
        </label>
        <label> </label>
	</div>
	<label>Keterangan</label>
	<div class="field">
		<input name="ket" type="text" size="25"/>
	</div>
	<label>Foto</label>
	<div class="field">
		<input type="file" name="foto" /> 
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
