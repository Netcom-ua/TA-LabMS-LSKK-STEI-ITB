<?php
error_reporting(0);
include '../../include/koneksi.php';
?>

<?php 
$sql="SELECT * FROM  tb_upload_data_sementara";
$aksi=mysql_query($sql);
$data=mysql_fetch_array($aksi);
$idcategori=$data['idcategori'];

$sql1="SELECT * FROM  tb_mdl_coursecategories WHERE id='$idcategori'";
$aksi1=mysql_query($sql1);
$data1=mysql_fetch_array($aksi1);

$folderCategori=$data1['name'];
?>
<html>
<head><title>DRZ File Manager 1.0</title>
<style>
table{font-family:arial;font-size:10pt}
</style>
<script>
//membuat fungsi konfirmasi sebelum didelete
function tanya(nama,folderCategori){
    x = confirm("Apakah anda akan mendelete\n"+nama);
    if(x == 1){
        //jika user mengklik tombol OK
        document.location = "upload/del.php?f="+nama+"&folderCategori="+folderCategori;
    }
}
</script>
</head>
<body>
<div style="margin: 0 auto; width: 672px; background-color: #ffffff; border-radius: 15px; padding-top: 3px; padding-bottom: 7px; margin-bottom: 13px; margin-top: 13px;">
<h2 style="text-align: center;">DRZ File Manager V1.0</h2>
<div style="text-align: center;">
Path :
<?php
error_reporting(0);
$dir = $_GET['dir'];
if(!$dir){
    echo ".";
}else{
    echo $dir;
}
//kode di atas hanya untuk menampilkan path yang lagi dibuka
?>
</div>
<table cellpadding=3 cellspacing=2 align="center">
<tr bgcolor="#999999"><td>File</td><td>Action</td></tr>
<?php
////////////////////////
//create by desrizal  //
//blog.codingwear.com //
////////////////////////

if(preg_match("/\/\.\./",$dir)){//untuk mencegah jika ada yang mengetik /../..
    die("tidak boleh");
}
if ($handle = opendir("upload/data/".$folderCategori.$dir)) {
//file browser.php ini kita letakkan di dalam folder filemanager
//sedangkan folder yang ingin diakses adalah folder parentnya
//maka kita selalu gunakan ".."
    while (false !== ($file = readdir($handle))) {
        if($file == ".."){
            if($dir!=""){
                $dirx = explode("/",$dir);
                $diry = "";
                for($i=0;$i<(count($dirx)-1);$i++){
                    $diry = $diry.$dirx[$i]."/";
                }
                $diry = substr($diry,0,-1);//untuk mendapatkan parent direktori
                if($diry == ""){
                    echo "<tr><td colspan=2><a href='?page=viewUploadData'>UP</a></td></tr>";
                }else{
                    echo "<tr><td colspan=2><a href='?page=viewUploadData&dir=$diry'>UP</a></td></tr>";
                }
            }
        }else if ($file != ".") {
            if(is_dir("upload/data/".$folderCategori.$dir."/".$file)){//untuk mengetahui apakah file berupa direktori
                $folder[] = "<tr><td><img src='upload/folder.png'><a href='?page=viewUploadData&dir=$dir/$file'>$file</a></td>
                    <td><a href=\"javascript:tanya('$dir/$file','$folderCategori')\">Del</a> |
                    <a href=\"?page=chmod&f=$dir/$file&folderCategori=$folderCategori\">CHMOD</a></td></tr>\n";
            }else{
                $filenya[] = "<tr><td><img src='upload/document.png'><a href='upload/data/$folderCategori$dir/$file'>$file</a></td>
                <td><a href=\"javascript:tanya('$dir/$file','$folderCategori')\">Del</a> |
                <a href=\"?page=chmod&f=$dir/$file&folderCategori=$folderCategori\">CHMOD</a></td>
                <td>
                    <a href='kordas/upload/dataFileSementara3.php?alamat=$dir/$file'>Use</a>
              	</td></tr>
              	\n";
            }
        }
    }
    //kita tampilkan yang berupa folder-folder
    for($i=0;$i<count($folder);$i++){
        echo $folder[$i];
    }
    //sesudah menampilkan folder, kita tampilkan file-file
    for($i=0;$i<count($filenya);$i++){
        echo $filenya[$i];
    }
    closedir($handle);
}

?>
</table>
<div style="text-align: center; margin-top: 10px; margin-bottom: 10px" >
<font size=2 color="#ababab"">
Catatan :<br>
Untuk delete folder, isi folder harus di kosongkan terdahulu<br>
CHMOD hanya untuk UNIX/Linux
</font>
</div>
<h3 style="text-align: center;">Upload File</h3>
<form method="post" action="upload/upload.php" enctype="multipart/form-data" style="text-align: center;">
<input type="hidden" name="folderCategori" value="<?php echo $folderCategori;?>">
<input type="file" name="f[]"><br>
<input type="file" name="f[]"><br>
<input type="file" name="f[]"><br>
<input type="file" name="f[]"><br>
<input type="file" name="f[]"><br><br>
<input type=hidden name=dir value="<?php echo $dir; ?>">
<input type=submit value="upload">
<input type=reset></form>
<h3 style="text-align: center; margin-top: 15px;">Buat Folder</h3>
<form action="upload/buatfolder.php" method="post" style="text-align: center;">
<input type="hidden" name="folderCategori" value="<?php echo $folderCategori;?>">
Nama Folder : <input type="text" name="folder">
<input type=hidden name=dir value="<?php echo $dir; ?>">
<input type=submit value="Buat">
</form>
</div>
</body>
</html>
