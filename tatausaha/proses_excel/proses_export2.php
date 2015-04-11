<?php
error_reporting(0);
include '../include/koneksi.php';
?>

<?php
$datetime = date('Ymd-His');

include "tatausaha/library/phpexcel/PHPExcel.php";
include "tatausaha/library/phpexcel/PHPExcel/Writer/Excel2007.php";

$excel = new PHPExcel;

$excel->getProperties()->setCreator("LABTEK");
$excel->getProperties()->setLastModifiedBy("LABTEK");
$excel->getProperties()->setTitle("Data Jadwal Mahasiswa");
$excel->removeSheetByIndex(0);


$sheet = $excel->createSheet();
$sheet->setTitle('sheet_1');
$sheet->setCellValue("A1", "JADWAL LABTEK");
$sheet->setCellValue("A2", "DATE");
$sheet->setCellValue("B2", "GROUP");
$sheet->setCellValue("C2", "MODUL");
$sheet->setCellValue("D2", "NIM");
$sheet->setCellValue("E2", "NAMA");
$sheet->setCellValue("F2", "NIM ASISTEN");

$sql = "SELECT * FROM `tb_mdl_user` where uploadnumber='".$_SESSION["urutan"]."' and date(uploaddate)='".$_SESSION["tanggalupload"]."' and role=6";
$q = mysql_query( $sql );
$i = 3; //Dimulai dengan baris ke tiga, baris pertama digunakan oleh titel kolom
while( $r = mysql_fetch_array( $q ) ){
	for($j = 0; $j < $_SESSION["jumlah"]; $j++){
		//$sheet->setCellValue( "A" . $i, "" );
		//$sheet->setCellValue( "B" . $i, "" );
		//$sheet->setCellValue( "C" . $i, "");
		$sheet->setCellValue( "D" . $i, $r['nim'] );
		$sheet->setCellValue( "E" . $i, $r['username'] );
		//$sheet->setCellValue( "F" . $i, "");
		$i++;
	}

}

$writer = new PHPExcel_Writer_Excel2007($excel);
$writer->save("JLAB$datetime.xlsx");
header("location:JLAB$datetime.xlsx");


//$writer->save(str_replace(__FILE__,'/path/to/save/."$datetime".xlsx',__FILE__));

?>
<!--  Your File in :
<a href="<?php echo $datetime;?>.xlsx">Here</a>-->
