<?php

require_once'template/header.php';

$videoid = $_GET['id'];

// membaca informasi file dari tabel berdasarkan id nya
$query  = "SELECT * FROM tb_mdl_upload_video WHERE id = '$videoid'";
$hasil  = mysql_query($query);
$data = mysql_fetch_array($hasil);

?>

<!-- Chang URLs to wherever Video.js files will be hosted -->
<link href="../tatausaha/videoplayer/video-js.css" rel="stylesheet" type="text/css">
<!-- video.js must be in the <head> for older IEs to work. -->
<script src="../tatausaha/videoplayer/video.js"></script>

<!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
<script>
    _V_.options.flash.swf = "../tatausaha/videoplayer/video-js.swf";
  </script>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Play Video </h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
			<div class="alert alert-info" align="center">
			<h3><?php echo basename($data['path'],".FLV");?></h3><br/>
				<video id="example_video_1" class="video-js vjs-default-skin"
				controls preload="metadata" width="600" height="400"
				autoplay="autoplay" poster="" data-setup="{}"> <source
				src='../tatausaha/<?php echo ($data['path']);?>' type='video/x-flv' /> </video></br>
			</div>
					
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
<br/>
<?php
	require_once'template/footer.php';
?>