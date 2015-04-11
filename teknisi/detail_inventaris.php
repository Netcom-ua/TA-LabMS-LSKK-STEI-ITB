<?php 
// Setingan
include"../include/koneksi.php";
$_GET['Kode_Alat'];

if(isset($_GET['Kode_Alat'])) {
        $sql = "select * from tb_inventaris where kode_alat = '{$_GET['Kode_Alat']}'";
		$result = mysql_query($sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysql_error());
		$data = mysql_fetch_array($result);
	}
	mysql_close($connected);
?>

<html>
<body>
  <div class="container">
    <div class="row-fluid">
		<div class="span12">
		
		<table width="50%" height="95%" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top"><table width="569" border="0" align="center" cellpadding="5" cellspacing="0">
              <tr>
                <td height="33" colspan="3" align="center" valign="top">
				<table width="97%" border="0">
                  <tr>
                
                    <td ><td><img src="../img/logo-labms.png" width="390px" height="71px"></td></td>
                  </tr>
                </table>
                  <hr>
                  <br>
                  <div align="left"><strong><span class="style4"> Rincian Data Inventaris </span><br>
                  <br>
                  </strong></div></td>
              </tr>
              <tr>
            <td width="205" align="left" valign="top"><span class="style2">Kode Alat </span></td>
            <td width="3" align="left" valign="top"><span class="style2">:</span></td>
            <td width="240" align="left" valign="top"><span class="style2"><strong>
            <?php echo "$data[kode_alat]" ?>
            </strong></span></td>
          </tr>
          <tr>
            <td align="left" valign="top"><span class="style2">Nama Barang  </span></td>
            <td align="left" valign="top"><span class="style2">:</span></td>
            <td align="left" valign="top"><span class="style2"><strong>
            <?php echo "$data[nama_alat]" ?>
            </strong></span></td>
          </tr>
          <tr>
            <td align="left" valign="top"><span class="style2">Kode Lab</span></td>
            <td align="left" valign="top"><span class="style2">:</span></td>
            <td align="left" valign="top"><span class="style2"><strong>
            <?php echo "$data[kode_lab]" ?>
            </strong></span></td>
          </tr>
          <tr>
            <td align="left" valign="top"><span class="style2">Nama Lab</span></td>
            <td align="left" valign="top"><span class="style2">:</span></td>
            <td align="left" valign="top"><span class="style2"><strong>
            <?php echo "$data[nama_lab]" ?>
            </strong></span></td>
          </tr>
          <tr>
            <td align="left" valign="top"><span class="style2">Tanggal Masuk</span></td>
            <td align="left" valign="top"><span class="style2">:</span></td>
            <td align="left" valign="top"><span class="style2"><strong>
            <?php echo "$data[tgl_masuk]" ?>
            </strong></span></td>
          </tr>
          <tr>
            <td align="left" valign="top"><span class="style2">Tanggal pengajuan 	</span></td>
            <td align="left" valign="top"><span class="style2">:</span></td>
            <td align="left" valign="top"><span class="style2"><strong>
            <?php echo "$data[tgl_pengajuan]" ?>
            </strong></span></td>
          </tr>
          <tr>
            <td align="left" valign="top"><span class="style2">Tanggal Penghapusan 	</span></td>
            <td align="left" valign="top"><span class="style2">:</span></td>
            <td align="left" valign="top"><span class="style2"><strong>
            <?php echo "$data[tgl_penghapusan]" ?>
            </strong></span></td>
          </tr>
          <tr>
            <td align="left" valign="top"><span class="style2">Jenis Praktikum</span></td>
            <td align="left" valign="top"><span class="style2">:</span></td>
            <td align="left" valign="top"><span class="style2"><strong>
            <?php echo "$data[jenis_praktikum]" ?>
            </strong></span></td>
          </tr>
		  <tr>
            <td align="left" valign="top"><span class="style2">Tahun Pembuatan</span></td>
            <td align="left" valign="top"><span class="style2">:</span></td>
            <td align="left" valign="top"><span class="style2"><strong>
            <?php echo "$data[thn_pembuatan]" ?>
            </strong></span></td>
          </tr>
          <tr>
            <td align="left" valign="top"><span class="style2">Spesifikasi</span></td>
            <td align="left" valign="top"><span class="style2">:</span></td>
            <td align="left" valign="top"><span class="style2"><strong>
            <?php echo "$data[spesifikasi]" ?>
            </strong></span></td>
          </tr>
          <tr>
            <td align="left" valign="top"><span class="style2">Stok</span></td>
            <td align="left" valign="top"><span class="style2">:</span></td>
            <td align="left" valign="top"><span class="style2"><strong>
            <?php echo "$data[jumlah]" ?>
            </strong></span></td>
          </tr>
		  <tr>
            <td align="left" valign="top"><span class="style2">Satuan</span></td>
            <td align="left" valign="top"><span class="style2">:</span></td>
            <td align="left" valign="top"><span class="style2"><strong>
            <?php echo "$data[satuan]" ?>
            </strong></span></td>
          </tr>
		  <tr>
            <td align="left" valign="top"><span class="style2">Keterangan</span></td>
            <td align="left" valign="top"><span class="style2">:</span></td>
            <td align="left" valign="top"><span class="style2"><strong>
            <?php echo "$data[ket]" ?>
            </strong></span></td>
          </tr>
          <tr>
            <td height="77" align="left" valign="top"><span class="style2">Foto Alat </span></td>
            <td align="left" valign="top"><span class="style2">:</span></td>
            <td align="left" valign="top"><img src="img/foto_alat/<?php echo $data['foto']; ?>" width=\"150" height="150" ></td>
          </tr>
          <tr>
                <td colspan="3" align="left" valign="top"><script language="javascript">
				<!--
				function tutup()
				{
					top.window.close()
				}
				//-->
				</script>
                    <script language="JavaScript" type="text/javascript">
				<!--
				@media print {
				input.noPrint { display: none; }
				}
				//-->
				</script>
                    <br>
                    <br>
                    <br>
                    <input name="button" type="button" onClick="tutup()" value="Keluar">
                    <input name="button2" type="button" class="noPrint" onClick="window.print()" value="Cetak Halaman ini">
                </td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td>
          </tr>
        </table>
		
		</div>
	</div>
  </div>
</body>
</html>		  
		