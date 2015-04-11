<br/>
<div class="extra">
  <div class="extra-inner">
    <div class="container">
      <div class="row">
                    <div class="span3">
						<h3>Link</h3>
                        <ul>
                            <li><a href="http://itb.ac.id">Institut Teknologi Bandung</a></li>
                            <li><a href="http://stei.itb.ac.id">STEI ITB</a></li>
                            <li><a href="http://lskk.ee.itb.ac.id">LSKK ITB</a></li>
                            <li><a href="http://seab.com">D4 STEI ITB Batch VIII</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                   <div class="span3">
				   <h3>LabMS</h3>
                        <ul>
                            <li><a href="javascript:;">Tentang Aplikasi</a></li>
                            <li><a href="javascript:;">Team</a></li>
                            <li><a href="javascript:;">Aplikasi Android</a></li>
							<li><a href="javascript:;">Aplikasi Desktop</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
					<button class="btn btn-facebook-alt"><i class="icon-facebook-sign"></i> Facebook</button>
					<button class="btn btn-twitter-alt"><i class="icon-twitter-sign"></i> Twitter</button>
					<button class="btn btn-youtube-alt"><i class="icon-youtube-sign"></i> Youtube</button>
					<button class="btn btn-google-alt"><i class="icon-google-plus-sign"></i> Google+</button>								<button class="btn btn-linkedin-alt"><i class="icon-linkedin-sign"></i> Linked In</button>
					<button class="btn btn-github-alt"><i class="icon-github-sign"></i> Github</button>
                </div>
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
        <div class="span12"> &copy; 2014 <a href="#">Laboratory Management System</a> | <a href=" http://labms.lskk.ee.itb.ac.id">http://labms.lskk.ee.itb.ac.id</a> </div>
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
<script src="../js/base.js"></script> 
<script src="../js/qrcode.js"></script> 
<script src="../js/bootstrap-datepicker.js"></script>
<script src="../js/wysihtml5-0.3.0.js"></script>
<script src="../js/bootstrap-wysihtml5.js"></script>
<script src="../ckeditor/ckeditor.js"></script>
<script src="../ckeditor/adapters/jquery.js"></script>
<script>
$(function() {
	// Bootstrap
	$('#bootstrap-editor').wysihtml5();
	
	// Ckeditor standard
	$( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
		{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
		[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
	]});
	$( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
});
</script>
<!-- ini untuk datepicker inventori --> 
<?php 
include"../include/koneksi.php";
$query1 = mysql_query("SELECT * FROM tb_inventaris ");
				
while($data71=mysql_fetch_array($query1)){
 
 ?>
 

 <script type="text/javascript">

    // When the document is ready
    $(document).ready(function () {
        
        $('#tanggal<?php echo $data71['kode_alat'];?>').datepicker({
            format: "yyyy/mm/dd"
        });  
    
    });
	
	$(document).ready(function () {
        
        $('#tanggal2<?php echo $data71['kode_alat'];?>').datepicker({
            format: "yyyy/mm/dd"
        });  
    
    });
	
	$(document).ready(function () {
        
        $('#tanggal3<?php echo $data71['kode_alat'];?>').datepicker({
            format: "yyyy/mm/dd"
        });  
    
    });
 </script>
 <?php 
	}
 ?>
 
 <!-- ini untuk datepicker atk --> 
<?php 
include"../include/koneksi.php";
$query2 = mysql_query("SELECT * FROM tb_atk ");
				
while($data72=mysql_fetch_array($query2)){
 
 ?>
 

 <script type="text/javascript">

    // When the document is ready
    $(document).ready(function () {
        
        $('#tanggal<?php echo $data72['kode_alat'];?>').datepicker({
            format: "yyyy/mm/dd"
        });  
    
    });
	
	$(document).ready(function () {
        
        $('#tanggal2<?php echo $data72['kode_alat'];?>').datepicker({
            format: "yyyy/mm/dd"
        });  
    
    });
	
	$(document).ready(function () {
        
        $('#tanggal3<?php echo $data72['kode_alat'];?>').datepicker({
            format: "yyyy/mm/dd"
        });  
    
    });
 </script>
 <?php 
	}
 ?>
 
 

 <script type="text/javascript">

    // When the document is ready
    $(document).ready(function () {
        
        $('#tanggal').datepicker({
            format: "yyyy/mm/dd"
        });  
    
    });
	
	$(document).ready(function () {
        
        $('#tanggal2').datepicker({
            format: "yyyy/mm/dd"
        });  
    
    });
	
	$(document).ready(function () {
        
        $('#tanggal3').datepicker({
            format: "yyyy/mm/dd"
        });  
    
    });
 </script>
 
</body>
</html>