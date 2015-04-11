<?php
	require_once'template/header.php';
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
		<?php 
					$query2 ="SELECT * FROM tb_mdl_upload_video";
					$hasil2 =  mysql_query($query2);
					$data2 = mysql_fetch_array($hasil2);

					if (!empty($data2)){
				?>
			<?php 
			do{ 
			$no++;
			?>
	      	<div class="span5">
	      		
	      		<div class="widget">
	      			
	      			<div class="widget-content">
						<a href="video_play.html?id=<?php echo $data2['id'];?>">
						<h3><?php echo basename($data2['path'],".FLV");?></a></h3>
		      		</div>
	      		</div> <!-- /widget -->
	      		
      		</div> <!-- /span6 -->
      		 	<?php 
					}
					while ($data2=mysql_fetch_array($hasil2))
					?>
				<?php 
				}else {
					}
				?>
      	
  <!-- /main-inner --> 
	</div>
</div><br/>
<?php
	require_once'template/footer.php';
?>