<?php
error_reporting(0);
include 'include/koneksi.php';
?>


<table class="table table-striped table-bordered">
  <thead>
    
    <tr>
    <th>No</th>
    <th>Kode Alat</th>
    <th>Nama Alat</th>
	<th>Jenis Praktikum</th>
	<th>Spesifikasi</th>
	<th>Stok</th>
	<th>Satuan</th>
	<th>Foto</th>
	<th>Aksi</th>
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
				$tampil = mysql_query("SELECT * FROM tb_inventaris LIMIT $start, $per_page");
while($data=mysql_fetch_array($tampil)){
echo"<tr class='odd gradeU'>
	<td valign='top'>$no</td>
	<td valign='top'>$data[kode_alat]</td>
	<td valign='top'>$data[nama_alat]</td>
	<td valign='top'>$data[jenis_praktikum]</td>
	<td valign='top'>$data[spesifikasi]</td>
	<td valign='top'>$data[jumlah]</td>
	<td valign='top'>$data[satuan]</td>
	<td valign='top'><img src=\"teknisi/img/foto_alat/$data[foto]\" width=\"150px\"></img></td>
	<td valign='top'><div class=\"btn-group \"><a href=\"detail_inventaris.php?Kode_Alat=$data[kode_alat]\" target=\"_blank\" title=\"Detail\" class=\"btn btn-warning\"><i class=\"icon-info-sign\"></i>
	<a HREF=\"demo.php?Kode_Alat=$data[kode_alat]\"
			onClick=\"popup = window.open('demoinv.php?Kode_Alat=$data[kode_alat]', 'PopupPage', 'height=450,width=300,scrollbars=yes,resizable=yes'); return false\" 
			target=\"_blank\" title=\"QRCode\" class=\"btn btn-warning\"><i class=\"icon-qrcode\"></i>
			</a> 

</tr>";
$no++;
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