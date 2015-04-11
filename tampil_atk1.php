<?php
error_reporting(0);
include 'include/koneksi.php';
?>


<table class="table table-striped table-bordered">
  <thead>
    
    <tr>
    <th>N0</th>
    <th>Kode Alat</th>
    <th>Nama Alat</th>
	<th>Kode Lab</th>
	<th>Nama Lab</th>
	<th>Type</th>
	<th>Spesifikasi</th>
	<th>Stok</th>
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
				$tampil = mysql_query("SELECT * FROM tb_atk LIMIT $start, $per_page");
while($data7=mysql_fetch_array($tampil)){
echo"<tr class='odd gradeU'>
	<td valign='top'>$no</td>
	<td valign='top'>$data7[kode_alat]</td>
	<td valign='top'>$data7[nama_alat]</td>
	<td valign='top'>$data7[kode_lab]</td>
	<td valign='top'>$data7[nama_lab]</td>
	<td valign='top' align='center'>$data7[tipe]</td>
	<td valign='top' >$data7[spesifikasi]</td>
	<td valign='top' '>$data7[stok]</td>
	<td valign='top' ><img src=\"teknisi/img/foto_alat_atk/$data7[foto]\" width=\"150px\"></img></td>
	<td><div class=\"btn-group \"><a href=\"detail_atk.php?Kode_Alat=$data7[kode_alat]\" target=\"_blank\" title=\"Detail\" role=\"button\" class=\"btn btn-warning\" ><i class=\"icon-info-sign\" ></i> </a>
	<a HREF=\"demo.php?Kode_Alat=$data7[kode_alat]\"
			onClick=\"popup = window.open('demo.php?Kode_Alat=$data7[kode_alat]', 'PopupPage', 'height=450,width=400,scrollbars=yes,resizable=yes'); return false\" 
			target=\"_blank\" role=\"button\" class=\"btn btn-warning\" title=\"Show QR Code\"><i class=\"icon-qrcode\" ></i>
			</a>
	</td>

</tr>";
$no++;
?>

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
