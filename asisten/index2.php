<?php
	require'template/header.php';
?>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="praktikum.html"><i class="icon-home"></i><span>Home</span> </a> </li>
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
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-home"></i>
              <h3>Halaman Asisten</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts">
			  <a href="../index.php?page_kordas_praktikum=course_categories" class="shortcut">
			  <i class="shortcut-icon icon-list-alt"></i>
			  <span class="shortcut-label">Praktikum</span></a>
			  <a href="#" class="shortcut">
			  <i class="shortcut-icon icon-calendar"></i> <span class="shortcut-label">Jadwal Praktikum</span> </a>
			  <a href="javascript:;" class="shortcut">
			  <i class="shortcut-icon icon-group"></i><span class="shortcut-label">Tukar Jadwal</span> </a>
			  <a href="javascript:;" class="shortcut"><i class="shortcut-icon  icon-facetime-video"></i>
			  <span class="shortcut-label">Video</span> </a>
			  <a href="javascript:;" class="shortcut">
			  <i class="shortcut-icon icon-list-alt"></i><span class="shortcut-label">Software</span> </a></div>
              <!-- /shortcuts --> 
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
<?php
	require'template/footer.php';
?>