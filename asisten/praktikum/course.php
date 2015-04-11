<?php
error_reporting(0);
//include 'koneksi/session.php';
include '../../include/koneksi.php';

$idcategori=$_GET['idcategori'];
$categori=mysql_fetch_array(mysql_query("SELECT * FROM tb_mdl_coursecategories WHERE id=$idcategori"));
$cekDb=mysql_query("SELECT * FROM tb_mdl_course WHERE category=$idcategori");
$i=1;
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/menu3.css">
</head>
<body>
	<div id="area_course">
		<div id="area_course2">
			<table width="691" border='0' align="center"\>
				<tr>
					<td align="center"><span style="font-weight: bold;"><?php 
					echo $categori['name'];
					?> </span>
					</td>
				</tr>
			</table>
			<br>
			<?php
			while ($course=mysql_fetch_array($cekDb))
			{
				?>
			<div>
				<table width="690" border="1px" align="center">
					<tr>
						<td width="680">
							<table width="684" align="left" border="0">
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td width="20" valign="top"><span style="font-weight: bold;"><?php echo $i;?>
									</span></td>
									<td width="624"><span style="font-weight: bold;"><?php echo $course['fullname'];?>
									</span></td>
									<td width="22">&nbsp;</td>
								</tr>
								<tr>
									<td></td>
									<td width="624"><?php echo $course['description'];?></td>
									<td width="22">&nbsp;</td>
								</tr>

								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td width="20" valign="top">&nbsp;</td>
									<td width="624" align="center"><span
										style="text-decoration: underline; font-weight: 600; font-size: 15;">Data
											Course</span></td>
									<td width="22">&nbsp;</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php include "../download/view_data_praktikan_asisstenid.php";?>
									</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td width="20" valign="top">&nbsp;</td>
									<td width="624" align="center"><span
										style="text-decoration: underline; font-weight: 600; font-size: 15;">Data
											Penilaian</span></td>
									<td width="22">&nbsp;</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php include "../form_penilaian_praktikum/view_list_penilaian_praktikum_asisstenid.php";?>
									</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td width="20" valign="top">&nbsp;</td>
									<td width="624" align="center"><span
										style="text-decoration: underline; font-weight: 600; font-size: 15">Data
											Log Book</span></td>
									<td width="22">&nbsp;</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php include "../logbook/view_list_logbook_assistenid.php";?>
									</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
							</table>
							<span style="font-size: 14px;"><a href="../praktikum/course_categories.php">Back</a></span>
						</td>
					</tr>
				</table>
				<br>
			</div>
			<?php
			$i++;
			}
			?>
		</div>
	</div>
</body>
</html>
