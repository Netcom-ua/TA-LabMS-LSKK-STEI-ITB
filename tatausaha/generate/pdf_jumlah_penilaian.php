<?php
require_once("fpdf16/fpdf.php");

class FPDF_AutoWrapTable extends FPDF {
	private $data = array();
	private $data2 = array();
	private $options = array(
  		'filename' => '',
  		'destinationfile' => '',
  		'paper_size'=>'F4',
  		'orientation'=>'P'
  		);

  		function __construct($data = array(), $data2 = array(), $options = array()) {
    	parent::__construct();
    	$this->data = $data;
    	$this->data2 = $data2;
    	$this->options = $options;
  		}

  		public function rptDetailData () {
  			//
  			$idcategori=$_GET['idcategori'];
  			$categoriCourse=mysql_query("SELECT * FROM  tb_mdl_coursecategories WHERE id ='$idcategori'");
  			$showDate=mysql_fetch_array($categoriCourse);

  			$sqlBanyakModul=mysql_query("SELECT * FROM tb_mdl_course WHERE category=$idcategori");
  			$sqlBanyakModul1=mysql_query("SELECT * FROM tb_mdl_course WHERE category=$idcategori");

  			//
  			$border = 0;
  			$this->AddPage();
  			$this->SetAutoPageBreak(true,60);
  			$this->AliasNbPages();
  			$left = 25;

  			//header
  			$this->Ln(10);
  			$this->SetFont("", "B", 14);
  			$this->SetX($left); $this->Cell(0, 10, 'DAFTAR NILAI PRAKTIKUM', 0, 1,'C');
  			$this->Ln(10);
  			$this->SetFont("", "B", 12);
  			$this->SetX($left); $this->Cell(0, 10, $showDate['name'], 0, 1,'C');
  			$this->Ln(10);
  			$this->SetFont("", "B", 12);
  			$this->SetX($left); $this->Cell(0, 10, 'Laboratorium Dasar Teknik Elektro, STEI - ITB', 0, 1,'C');
  			$this->Ln(20);

  			//keterangan
  			
  			///////////////////////////////////////////////////
  			$this->Ln(20);

  			$h = 13;
  			$left = 40;
  			$top = 80;
  			#tableheader
  			$this->SetFillColor(200,200,200);
  			$left = $this->GetX();
  			$this->Cell(20,$h,'NO',1,0,'L',true);
  			$this->SetX($left += 20); $this->Cell(200, $h, 'NAMA', 1, 0, 'C',true);
  			$this->SetX($left += 200); $this->Cell(100, $h, 'NIM', 1, 0, 'C',true);
  			$this->SetX($left += 100); $this->Cell(80, $h, 'Nilai', 1, 0, 'C',true);
  			$this->Ln(14);
			


  			$Jumlahtabel=0;
  			$this->SetFont('Arial','',9);
  			$this->SetWidths(array(20,200,100));
  			$this->SetAligns(array('C','L','L'));
  			$no = 1; $this->SetFillColor(255);
  			foreach ($this->data as $baris) {
  				$this->Row(
  				array($no++,
  				$baris['username'],
  				$baris['nim']
  				));
  				$Jumlahtabel=$Jumlahtabel+10;
  			}

  			$left = $this->GetX();
  			$right = $this->GetY();
  			$this->SetY($right -= $Jumlahtabel);
  			$this->SetWidths(array(80));
  			$this->SetAligns(array('R'));
  			foreach ($this->data2 as $baris) {
  				$this->SetX($left = 348);
  				$this->Row2(
  				array(
  				$baris['nilai']
  				));
  			}
  		}

  		public function printPDF () {

  			if ($this->options['paper_size'] == "F4") {
  				$a = 8.3 * 72; //1 inch = 72 pt
  				$b = 13.0 * 72;
  				$this->FPDF($this->options['orientation'], "pt", array($a,$b));
  			} else {
  				$this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
  			}

  			$this->SetAutoPageBreak(false);
  			$this->AliasNbPages();
  			$this->SetFont("helvetica", "B", 10);
  			//$this->AddPage();

  			$this->rptDetailData();

  			$this->Output($this->options['filename'],$this->options['destinationfile']);
  		}

  		private $widths;
  		private $aligns;

  		function SetWidths($w)
  		{
  			//Set the array of column widths
  			$this->widths=$w;
  		}

  		function SetAligns($a)
  		{
  			//Set the array of column alignments
  			$this->aligns=$a;
  		}

  		function Row($data)
  		{
  			//Calculate the height of the row
  			$nb=0;
  			for($i=0;$i<count($data);$i++)
  			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
  			$h=10*$nb;
  			//Issue a page break first if needed
  			$this->CheckPageBreak($h);
  			//Draw the cells of the row
  			for($i=0;$i<count($data);$i++)
  			{
  				$w=$this->widths[$i];

  				$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
  				//Save the current position
  				$x=$this->GetX();
  				$y=$this->GetY();
  				//Draw the border
  				$this->Rect($x,$y,$w,$h);
  				//Print the text
  				$this->MultiCell($w,10,$data[$i],0,$a);
  				//Put the position to the right of the cell
  				$this->SetXY($x+$w,$y);
  			}
  			//Go to the next line
  			$this->Ln($h);
  		}

  		function Row2($data2)
  		{
  			//Calculate the height of the row
  			$nb=0;
  			for($i=0;$i<count($data2);$i++)
  			$nb=max($nb,$this->NbLines($this->widths[$i],$data2[$i]));
  			$h=10*$nb;
  			//Issue a page break first if needed
  			$this->CheckPageBreak($h);
  			//Draw the cells of the row
  			for($i=0;$i<count($data2);$i++)
  			{
  				$w=$this->widths[$i];
  				$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
  				//Save the current position
  				$x=$this->GetX();
  				$y=$this->GetY();
  				//Draw the border
  				$this->Rect($x,$y,$w,$h);
  				//Print the text
  				$this->MultiCell($w,10,$data2[$i],0,$a);
  				//Put the position to the right of the cell
  				$this->SetXY($x+$w,$y);
  			}
  			//Go to the next line
  			$this->Ln($h);
  		}

  		function CheckPageBreak($h)
  		{
  			//If the height h would cause an overflow, add a new page immediately
  			if($this->GetY()+$h>$this->PageBreakTrigger)
  			$this->AddPage($this->CurOrientation);
  		}

  		function NbLines($w,$txt)
  		{
  			//Computes the number of lines a MultiCell of width w will take
  			$cw=&$this->CurrentFont['cw'];
  			if($w==0)
  			$w=$this->w-$this->rMargin-$this->x;
  			$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
  			$s=str_replace("\r",'',$txt);
  			$nb=strlen($s);
  			if($nb>0 and $s[$nb-1]=="\n")
  			$nb--;
  			$sep=-1;
  			$i=0;
  			$j=0;
  			$l=0;
  			$nl=1;
  			while($i<$nb)
  			{
  				$c=$s[$i];
  				if($c=="\n")
  				{
  					$i++;
  					$sep=-1;
  					$j=$i;
  					$l=0;
  					$nl++;
  					continue;
  				}
  				if($c==' ')
  				$sep=$i;
  				$l+=$cw[$c];
  				if($l>$wmax)
  				{
  					if($sep==-1)
  					{
  						if($i==$j)
  						$i++;
  					}
  					else
  					$i=$sep+1;
  					$sep=-1;
  					$j=$i;
  					$l=0;
  					$nl++;
  				}
  				else
  				$i++;
  			}
  			return $nl;
  		}
} //end of class

//contoh penggunaan
include '../../include/koneksi.php';
include '../login/functions.php';
sec_session_start(); // Our custom secure way of starting a php session.

$idcategori=$_GET['idcategori'];
$categoriCourse=mysql_query("SELECT * FROM  tb_mdl_coursecategories WHERE id ='$idcategori'");
$showDate=mysql_fetch_array($categoriCourse);

$sqlBanyakModul=mysql_query("SELECT * FROM tb_mdl_course WHERE category=$idcategori");
$sqlBanyakModul1=mysql_query("SELECT * FROM tb_mdl_course WHERE category=$idcategori");

$data = array();
$dateCategori1=$showDate['date'];
$sqlMahasiswa1=mysql_query("SELECT DISTINCT userid FROM  tb_mdl_jadwal WHERE date>='$dateCategori1'");
while ($mahasiswa1=mysql_fetch_array($sqlMahasiswa1))
{
	$idMahasiswa1=$mahasiswa1['userid'];
	$sqlketMahasiswa1=mysql_query("SELECT * FROM  tb_mdl_user WHERE id ='$idMahasiswa1'");
	while ($row = mysql_fetch_assoc($sqlketMahasiswa1))
	{
		array_push($data, $row);
	}
}

$data2 = array();
$idcategori=$_GET['idcategori'];
$categoriCourse=mysql_query("SELECT * FROM  tb_mdl_coursecategories WHERE id ='$idcategori'");
$showDate=mysql_fetch_array($categoriCourse);


$dateCategori=$showDate['date'];
$sqlMahasiswa=mysql_query("SELECT DISTINCT userid FROM  tb_mdl_jadwal WHERE date>='$dateCategori'");
while ($mahasiswa=mysql_fetch_array($sqlMahasiswa))
{
	$idMahasiswa=$mahasiswa['userid'];
	$sqlketMahasiswa=mysql_query("SELECT * FROM  tb_mdl_user WHERE id ='$idMahasiswa'");
	$ketMahasiswa=mysql_fetch_array($sqlketMahasiswa);
	
	$sqlModul=mysql_query("SELECT * FROM tb_mdl_course WHERE category=$idcategori");
	
	
	$nilaiPraktikum=0;
	while ($modul=mysql_fetch_array($sqlModul))
	{
		$idcourse=$modul['id'];
		$sqlNilaiAwal=mysql_query("SELECT * FROM tb_idpenilaianpelaksananpraktikum WHERE idcategori='$idcategori' AND idcourse='$idcourse'");
		$total=0;
		$nilaimodul=0;
		while ($nilaiAwal=mysql_fetch_array($sqlNilaiAwal))
		{
			$nilaiMahasiswa=$nilaiAwal['nilaiawal'];
			$nilaiMax=$nilaiAwal['nilaiawal'];
			$idpenilaian=$nilaiAwal['idpenilaian'];
			$sqlpelaksanaan=mysql_query("SELECT * FROM tb_penilaianpelaksananpraktikum WHERE idpenilaian=$idpenilaian");
			while ($pelaksanaan=mysql_fetch_array($sqlpelaksanaan))
			{
				$indexnilai=$pelaksanaan['indexnilai'];
				$sqlklasifikasipenilaian=mysql_query("SELECT * FROM tb_klasifikasipenilaian WHERE indexnilai='$indexnilai'");
				while ($klasifikasipenilaian=mysql_fetch_array($sqlklasifikasipenilaian))
				{
					$oprasi=$klasifikasipenilaian['oprasi'];
					if($oprasi=='+')
					{
						$nilaiMax=$nilaiMax+$klasifikasipenilaian['nilai'];
					}
				}
			}
				
			$idnilaiMahasiswa=0;
			$sqldatapenilaian=mysql_query("SELECT * FROM tb_datapenilaiapraktikum WHERE idmahasiswa='$idMahasiswa' AND idpenilaian='$idpenilaian' AND idcourse='$idcourse'");
			while ( $datapenilaian=mysql_fetch_array($sqldatapenilaian))
			{
				$indexnilai=$datapenilaian['indexnilai'];
				$sqlklasifikasipenilaian=mysql_query("SELECT * FROM tb_klasifikasipenilaian WHERE indexnilai='$indexnilai'");
				while ($klasifikasipenilaian=mysql_fetch_array($sqlklasifikasipenilaian))
				{
					$oprasi=$klasifikasipenilaian['oprasi'];
					if($oprasi=='+')
					{
						$nilaiMahasiswa=$nilaiMahasiswa+$datapenilaian['nilai'];
					}
					else if($oprasi=='-')
					{
						$nilaiMahasiswa=$nilaiMahasiswa-$datapenilaian['nilai'];
					}//echo $nilaiMahasiswa;
				}
				$idnilaiMahasiswa=1;
			}
			if($idnilaiMahasiswa==0)
			{
				$nilaiMahasiswa=0;
			}
			$nilaiperpenilaian=($nilaiMahasiswa/$nilaiMax)*$nilaiAwal['bobot'];
			$nilaimodul=$nilaimodul+$nilaiperpenilaian;
		}
		$nilaiPraktikum=$nilaiPraktikum+(($nilaimodul)*$modul['bobot']/100);
	} 
	//echo round($nilaiPraktikum,2);
	$row2['nilai']=round($nilaiPraktikum,2);
	array_push($data2, $row2);
}


//pilihan
$options = array(
	'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
	'destinationfile' => '', //I=inline browser (default), F=local file, D=download
	'paper_size'=>'A4',	//paper size: F4, A3, A4, A5, Letter, Legal
	'orientation'=>'P' //orientation: P=portrait, L=landscape
);

$tabel = new FPDF_AutoWrapTable($data, $data2, $options);

$tabel->printPDF();
?>