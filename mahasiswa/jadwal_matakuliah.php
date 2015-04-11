<?php 
require_once 'template/header.php'; 
$modul = $_GET['modul'];
?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
							<div class="widget-header"> <i class="icon-home"></i>
								<h3>Halaman Mahasiswa</h3>
							</div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                                    <?php 
									$query="select * from tb_matakuliah where kd_mk='$modul'" ; 
									$result=$mysqli->query($query) 
									or die('<b>-- Query failed -- </b> ' . mysql_error()); 
									$data = $result->fetch_array(); 
									?>
                                    <h2 class="bigstats" align="center">Jadwal Praktikum Mahasiswa Teknik Elektro <br/>Semester <?php echo $data['semester']?> Tahun Akademik <?php echo $data['akademik'] ?><br/>Matakuliah : <?php echo $data['kd_mk'].' '.$data['nama_mk'] ?></h2><br/>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="alert-success">NIM</th>
                                                <th class="alert-success">Mahasiswa</th>
                                                <th class="alert-success">Matakuliah</th>
                                                <th class="alert-success">Kode Praktikum</th>
                                                <th class="alert-success">Nama Modul</th>
                                                <th class="alert-success">Asisten</th>
                                                <th class="alert-success">Dosen</th>
                                                <th class="alert-success">Kelompok</th>
                                                <th class="alert-success">Ruangan</th>
                                                <th class="alert-success">Tanggal</th>
                                                <th class="alert-success">Pukul</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Menampilkan Jadwal Praktikum -->
                                            <?php $per_page=10; 
											$page_query=mysql_query( "SELECT COUNT(*) FROM tb_jadwal_praktikum"); 
											$pages=ceil(mysql_result($page_query, 0) / $per_page); $page=( isset($_GET[ 'page'])) ? (int)$_GET['page'] : 1; $start=($page - 1) * $per_page; $no=1; 
											$query=mysql_query("SELECT tb_jadwal_praktikum.nim, 	tb_jadwal_praktikum.id_asisten, 
											tb_jadwal_praktikum.id_dosen,
											tb_jadwal_praktikum.group, 
								tb_jadwal_praktikum.ruangan,
								tb_jadwal_praktikum.tanggal, tb_jadwal_praktikum.waktu, tb_matakuliah.nama_mk, 
								tb_matakuliah.semester,
								tb_matakuliah.akademik,
								tb_matakuliah.nip_dosen, tb_mdl_praktikum.kd_mk, tb_mdl_praktikum.kd_modul, tb_mdl_praktikum.nm_modul, tb_mdl_praktikum.singkatan, tb_mahasiswa.nim, tb_mahasiswa.nama_mhs, tb_user.id_pengenal, tb_user.nama_user, tb_dosen.nama_dosen
							FROM tb_jadwal_praktikum
							INNER JOIN tb_matakuliah ON tb_jadwal_praktikum.kd_mk = tb_matakuliah.kd_mk
							INNER JOIN tb_mdl_praktikum ON tb_jadwal_praktikum.kd_modul = tb_mdl_praktikum.kd_modul
							INNER JOIN tb_mahasiswa ON tb_jadwal_praktikum.nim = tb_mahasiswa.nim
							INNER JOIN tb_user ON tb_jadwal_praktikum.id_asisten = tb_user.id_pengenal
							INNER JOIN tb_dosen ON tb_dosen.nid = tb_jadwal_praktikum.id_dosen
							where tb_jadwal_praktikum.kd_mk ='$modul'
							order by tb_jadwal_praktikum.tanggal, tb_jadwal_praktikum.waktu asc LIMIT $start, $per_page"); 
							while ($data=mysql_fetch_assoc($query)) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $data[ 'nim']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data[ 'nama_mhs']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data[ 'nama_mk']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data[ 'kd_modul']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data[ 'nm_modul']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data[ 'nama_user']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data[ 'nama_dosen']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data[ 'group']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data[ 'ruangan']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data[ 'tanggal']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data[ 'waktu']; ?>
                                                </td>
                                            </tr>
                                            <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                    <!-- Pagination -->
                                    <div class="pagination pagination-small pagination-centered">
                                        <ul>
                                            <?php 
											if($pages>= 1 && $page<=$pages) { for($x=1; 
											$x<=$pages; $x++) { if($x==$page) echo ' <li class="active"><a href="/page'.$x. '">'.$x. '</a></li>'; else echo ' <li>
											<a href="?page='.$x. '">'.$x. '</a></li>'; } } ?>
                                        </ul>
                                    </div>
                                <!-- /widget-content -->
                            </div><br/>
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
<!-- /main -->
<?php 
require_once 'template/footer.php'; 
?>