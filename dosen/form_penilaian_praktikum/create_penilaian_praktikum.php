<?php
error_reporting(0);
include '../../include/koneksi.php';
?>

<?php
$idcategori=$_GET['idcategori'];
$idcourse=$_GET['idcourse'];

$sql="SELECT * FROM  tb_bankpenilaian";
$aksi=mysql_query($sql);
?>
<html>
<body>
	<div
		style="margin: 0 auto; width: 672px; background-color: #ffffff; border-radius: 15px; padding-top: 5px; padding-bottom: 5px; margin-bottom: 13px; margin-top: 13px;">
		<form action="kordas/formPenilaianPraktikum/dbformpenilaian.php"
			method="post">
			<div style="width: 650px; text-align: left;">
				<script type="text/javascript" src="ckeditor/ckeditor.js">
	</script>
				<link href="ckeditor/content.css" rel="stylesheet" type="text/css" />
				<h2 style="text-align: center;">Membuat Penilaian</h2>
				<table align="center" style="margin-bottom: 10px;">
					<tr>
						<td width=70>Judul</td>
						<td><input name='judulPelaksanaanPraktikum' type='text' style="width: 350px" ></td>
					</tr>
					<tr>
						<td width=70>Bobot</td>
						<td><input name='bobot' type='text' style="width: 350px"></td>
					</tr>
					<tr>
						<td>Ket</td>
						<td><textarea cols="60" rows="10" id="ketPelaksanaanPraktikum"
								name="ketPelaksanaanPraktikum">
					
				</textarea> <script type="text/javascript">
					var editor = CKEDITOR.replace('ketPelaksanaanPraktikum');
				</script></td>
					</tr>
				</table>
				<table style="margin-bottom: 10px">
					<tr>
						<td>Penilain Modul ke</td>
						<td colspan="2"><input type="text" name="modul"></td>
					</tr>
					<tr>
						<td>Set Awal Penilaian</td>
						<td colspan="2"><input type="text" name="nilaiAwal"></td>
					</tr>
					<tr>
						<td>Show data upload</td>
						<td colspan="2"><input type="checkbox" name="showLaporan"
							value="1"></td>
					</tr>
				</table>
			</div>



			<script>
	function ShowHideContent(elem,contentId)
	{
		var con = document.getElementById(contentId);
		var isHidden = ( con.style.display == "none" );
		this.innerHTML = (isHidden)?"Hide Content":"Show Content";
		con.style.display = (isHidden)?"block":"none";
		con=null;
	}
</script>
<?php
$a=1;
while ($data=mysql_fetch_array($aksi)):
?>
			<div>
				<table width="650" border="1">
					<tr>
						<td width="50" align="center"><span
							onClick="ShowHideContent(this,'content<?php echo $a;?>');">+</span>
						</td>
						<td width="450"><?php echo $data['namapenilaian'];?></td>
						<td width="50">font</td>
						<td width="50"><a HREF="keteranganpenilaian.php"
						onClick="popup = window.open('keteranganpenilaian.php?a=<?php echo $data['noid'];?>&b=<?php echo $data['namapenilaian'];?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false"
							target="_blank"> <img src="gambar/kacapembesar.png" width="20"
								height="20" /> </a></td>
					</tr>
				</table>
			</div>
			<div id="content<?php echo $a;?>" style="display: none">
			<?php
			$index=$data['noid'];
			$data1=mysql_query("SELECT * FROM  klasifikasipenilaian WHERE noid=$index");

			while ($jenispenilaian=mysql_fetch_array($data1)):

			?>
				<table width="650" border="1">
					<tr>
						<td width="50"></td>
						<td width="350"><?php echo $jenispenilaian['jenispenilaian'];?></td>
						<td width="50"><?php 
						if($jenispenilaian['media']==0)
						{echo "CekBox";}
						else
						{echo "TextBox";}
						?>
						</td>
						<td width="50"><?php echo $jenispenilaian['oprasi'];?></td>
						<td width="50"><?php echo $jenispenilaian['nilai'];?></td>
						<td width="50"><a HREF="keterangjenisanpenilaian.php"
							onClick="popup = window.open('keteranganjenispenilaian.php?a=<?php echo $jenispenilaian['noid'];?>&b=<?php echo $jenispenilaian['jenispenilaian'];?>', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false"
							target="_blank"> <img src="gambar/kacapembesar.png" width="20"
								height="20" /> </a></td>
						<td width="50"><input type="checkbox"
							name="indexnilai<?php echo $jenispenilaian['indexnilai'];?>"
							value="<?php echo $jenispenilaian['indexnilai'];?>"></td>
					</tr>
				</table>
				<?php
				endwhile;
				?>
			</div>
			<?php
			$a++;
			endwhile;
			?>
			<input type="hidden" name="idcategori"
				value='<?php echo $idcategori;?>'> <input type="hidden"
				name="idcourse" value='<?php echo $idcourse;?>'>
			<table>
				<tr>
					<td>Tanggal Buka</td>
					<td><input type="text" name="tglbuka" class="tcal"></td>
				</tr>
				<tr>
					<td>Tanggal Tutup</td>
					<td><input type="text" name="tgltutup" class="tcal"></td>
				</tr>
			</table>
			<input type="submit">&nbsp;&nbsp; <input type="button" value=Batal
				onClick="self.history.back()">
		</form>
	</div>
</body>
</html>
