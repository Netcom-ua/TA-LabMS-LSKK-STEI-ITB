<?php
error_reporting(0);
include 'include/connect.php';
?>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php"><img src="img/logo-itb.png" alt=""></a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="index.php?page=login">Login</a></li>
              <li><a href="index.php?page=daftar">Pendaftaran</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> Mhd. Syarif <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Profile</a></li>
              <li><a href="javascript:;">Logout</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="kordas/"><i class="icon-home"></i><span>Home</span> </a> </li>
        <li><a href="informasi_lab.php"><i class="icon-tasks"></i><span>Informasi Lab</span> </a> </li>
        <li><a href="upload_mahasiswa.php"><i class="icon-list"></i><span>Unggah Data Mahasiswa</span> </a> </li>
        <li><a href="upload_jadwal.php"><i class="icon-tags"></i><span>Unggah Jadwal</span> </a> </li>
        <li><a href="charts.html"><i class="icon-bar-chart"></i><span>Unggah Video</span> </a> </li>
        <li><a href="reports.html"><i class="icon-list-alt"></i><span>Unggah Software</span> </a> </li>
        <li><a href="shortcodes.html"><i class="icon-code"></i><span>Generate Laporan</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
          <!-- /widget -->
          <!-- /widget -->
          <!-- /widget -->
</div>
        <!-- /span6 -->
        <div class="span12">
            <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Daftar Praktikum</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Nama Praktikum </th>
                    <th> Tanggal Praktikum</th>
                    <!--<th class="td-actions"> </th> -->
                  </tr>
                </thead>
                <tbody>
				<?php
				$query =  "select * from tb_mdl_coursecategories";
              	$result = $mysqli->query($query)
              	or die('<b>-- Query failed -- </b> ' . mysql_error());
              	while ($data = $result->fetch_array()){ 
              	$total += $data['total_belanja'];
				?>	
                  <tr>
                    <td> <a href="view_topik.php?view=<?php echo $data['id'];?>"><?php echo $data['name']; ?></a></td>
					<td> <?php echo $data['date']; ?></td>
                    <!--<td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>-->
                  </tr>
                  <?php 
				$no++;
				} 
				?>
                
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          <!-- /widget -->
          <!-- /widget -->
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<div class="extra">
  <div class="extra-inner">
    <div class="container">
      
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /extra-inner --> 
</div>
<!-- /extra -->
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2014 <a href="#">Laboratorium Management System </a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="../js/jquery-1.7.2.min.js"></script> 
<script src="../js/excanvas.min.js"></script> 
<script src="../js/chart.min.js" type="text/javascript"></script> 
<script src="../js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="../js/full-calendar/fullcalendar.min.js"></script>
 
<script src="../js/base.js"></script> 

</body>
</html>
