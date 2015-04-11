<?php
	require_once'template/header.php';
	error_reporting(0);
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Data Peminjaman</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <h6 class="bigstats" align="center">Informasi Peminjaman</h6>
                  <div id="big_stats" class="cf">
                   <!--  ----isi------ -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#inventaris" data-toggle="tab">Inventaris</a></li>
  <li><a href="#atk" data-toggle="tab">ATK</a></li>
  
</ul>
<div class="tab-content">
<div class="tab-pane active" id="inventaris">

				            
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th colspan="13" align="left" valign="top"></th>
    </tr>
    <tr id='fn' >
    <th>N0</th>
    <th>Username</th>
    <th>Nama</th>
	<th>Email</th>
	<th>Nama Alat</th>
	<th>Tgl Pinjam</th>
	<th>Tgl Kembali</th>
	<th>Jumlah</th>
	<th>Penanggung Jawab</th>
	<th>Status</th>
	
  </tr>
</thead>
<tbody>


<?php
include"../include/koneksi.php";
$data23=mysql_query("select * from tb_mahasiswa where nim='$nim'");
$cek=mysql_fetch_array($data23);

$tampil=mysql_query("select*from tb_pinjam  where username='".$cek['username']."' ");
$no=$posisi+1;
while($data13=mysql_fetch_array($tampil)){
echo"<tr class='odd gradeU'>
	<td valign='top'>$no</td>
	<td valign='top'>$data13[username]</td>
	<td valign='top'>$data13[nama_peminjam]</td>
	<td valign='top'>$data13[email]</td>
	<td valign='top'>$data13[nama_alat]</td>
	<td valign='top'>$data13[tgl_pinjam]</td>
	<td valign='top'>$data13[tgl_kembali]</td>
	<td valign='top'>$data13[jumlah]</td>
	<td valign='top'>$data13[penanggung_jawab]</td>
	<td valign='top'><strong>$data13[status]</strong></td>
	
</tr>";
$no++;
}
?>

</tbody>
</table>

	</div> <!-- /akhir tab Inv--> 
          
	

		  
  <div class="tab-pane" id="atk">
	<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th colspan="13" align="left" valign="top"></th>
    </tr>
    <tr id='fn' >
    <th>N0</th>
    <th>Username</th>
    <th>Nama</th>
	<th>Email</th>
	<th>Nama Alat</th>
	<th>Tgl Pinjam</th>
	<th>Tgl Kembali</th>
	<th>Penanggung Jawab</th>
	<th>Status</th>
	
  </tr>
</thead>
<tbody>


<?php
include"../include/koneksi.php";
$data231=mysql_query("select * from tb_mahasiswa where nim='$nim'");
$cek1=mysql_fetch_array($data231);

$tampil=mysql_query("select*from tb_pinjam_atk  where username='".$cek1['username']."' ");
$no=$posisi+1;
while($data13=mysql_fetch_array($tampil)){
echo"<tr class='odd gradeU'>
	<td valign='top'>$no</td>
	<td valign='top'>$data13[username]</td>
	<td valign='top'>$data13[nama_peminjam]</td>
	<td valign='top'>$data13[email]</td>
	<td valign='top'>$data13[nama_alat]</td>
	<td valign='top'>$data13[tgl_pinjam]</td>
	<td valign='top'>$data13[tgl_kembali]</td>
	<td valign='top'>$data13[penanggung_jawab]</td>
	<td valign='top'><strong>$data13[status]</strong></td>
	
</tr>";
$no++;
}
?>

</tbody>
</table>
  </div> <!-- /akhir tab ATK -->
</div> 
				   
                </div>
                <!-- /widget-content --> 
                
              </div>
            </div>
          </div>
          <!-- /widget -->
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> </h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div id='calendar'>
              </div>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          
          <!-- /widget --> 
        </div>
        <!-- /span6 -->
        
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>

<?php
	require_once'template/footer.php';
?>