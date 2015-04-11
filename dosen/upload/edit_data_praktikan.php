<?php
error_reporting(0);
include '../../include/koneksi.php';
?>

<?php
$sql="SELECT * FROM  tb_upload_data_sementara_edit";
$aksi=mysql_query($sql);
$data=mysql_fetch_array($aksi);
$id=$data['id'];
$idcategori=$data['idcategori'];
$idcourse=$data['idcourse'];
$judulfile=$data['judulfile'];
$keteranganfile=$data['keteranganfile'];
$alamat=$data['alamat'];
$tglbuka=$data['tglbuka'];
$tgltutup=$data['tgltutup'];
?>

<html>
<head>
<!-- link calendar resources -->
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
</head>
<body>
<div style="background-color: #ffffff; width: 680px; margin: 0 auto; border-radius: 10px;">
	<form method="post" action="">
		<div align="center">
			<div style="width: 680px; text-align: left;">
				<script type="text/javascript" src="ckeditor/ckeditor.js">
		</script>
				<link href="ckeditor/content.css" rel="stylesheet" type="text/css" />
				<h2 style="text-align: center;">Menambahkan file ketopik</h2>

				<div class='post-body entry-content'
					id='post-body-1189136973779971313' itemprop='articleBody'>
					<fieldset id="tocfs">
						<legend id="tocfsl">General</legend>
						<input type="hidden" name="id" value='<?php echo $id;?>'><input
							type="hidden" name="idcours" value='<?php echo $idcours;?>'> <input
							type="hidden" name="idtopik" value='<?php echo $idtopik;?>'>
						<table>
							<tr>
								<td width=70>Judul</td>
								<td><input type='text' name='judulfile'
									value='<?php echo $judulfile;?>'></td>
							</tr>

							<tr>
								<td>isi</td>
								<td><textarea cols="60" rows="10" id="keteranganfile"
										name="keteranganfile">
										<?php echo $keteranganfile;?>
				</textarea> <script type="text/javascript">
					var editor = CKEDITOR.replace('keteranganfile');
				</script></td>
							</tr>
							<tr>
								<td></td>

							</tr>
						</table>
					</fieldset>
				</div>

				<div class='post-body entry-content'
					id='post-body-1189136973779971313' itemprop='articleBody'>
					<fieldset id="tocfs">
						<legend id="tocfsl">Content</legend>
						<table>
							<tr>
								<td width="68">Select files</td>
								<td width="812"><?php //include "dialog.php";?> <input
									type="button" value="Add"
									onClick="this.form.action='dosen/upload/data_file_sementara_edit2.php';this.form.submit()">
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="hidden" value="<?php echo $alamat;?>"
									name="alamat"> <?php echo $alamat;?></td>
							</tr>
						</table>
					</fieldset>
				</div>

				<div class='post-body entry-content'
					id='post-body-1189136973779971313' itemprop='articleBody' style="width: 680">
					<fieldset id="tocfs">
						<legend id="tocfsl">Tanggal</legend>
						<table align="center">
							<tr>
								<td width="650">
									<div class='post-body entry-content'
										id='post-body-1189136973779971313' itemprop='articleBody'>
										<fieldset id="tocfs">
											<legend id="tocfsl">mulai</legend>
											<table width="620" align="center">
												<tr>
													<td width="620" colspan="10">pilih tanggal : <input
														type="text" name="tglbuka" class="tcal"
														value="<?php echo $tglbuka;?>"></td>
												</tr>
											</table>
										</fieldset>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class='post-body entry-content'
										id='post-body-1189136973779971313' itemprop='articleBody'>
										<fieldset id="tocfs">
											<legend id="tocfsl">Penutupan</legend>
											<table width="620" align="center">
												<tr>
													<td colspan="10">pilih tanggal : <input type="text"
														name="tgltutup" class="tcal"
														value="<?php echo $tgltutup;?>"></td>
												</tr>
											</table>
										</fieldset>
									</div>
								</td>
							</tr>
						</table>
					</fieldset>
				</div>

				<div class='post-body entry-content'
					id='post-body-1189136973779971313' itemprop='articleBody'>
					<fieldset id="tocfs">
						<legend id="tocfsl">Save</legend>
						<table align="center">
							<tr>
								<td colspan="2"><input type="button" value="Submit"
									onClick="this.form.action='dosen/upload/data_file_sementara_edit4.php';this.form.submit()">
									<input type="button" value=Batal onClick="this.form.action='?page=course&idcategori=<?php echo $data['idcategori'];?>';this.form.submit()">
								</td>
							</tr>
						</table>
					</fieldset>
				</div>
			</div>
		</div>
	</form>
	</div>
</body>
</html>
