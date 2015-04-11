<?php
session_start();	
include 'koneksi/session.php';
require '../include/koneksi.php';


//Pemanggilan PHPMailer
require_once('../PHPMailer/class.phpmailer.php');

$mail  = new PHPMailer();   
$mail->IsSMTP();

//GMAIL configerations
$mail->SMTPAuth   = true;                  
$mail->SMTPSecure = "ssl";                 
$mail->Host       = "smtp.gmail.com";      
$mail->Port       = 465;                   
$mail->Username   = "lms.stei.itb@gmail.com"; 
$mail->Password   = base64_decode("bG1zZHVsdWJybw==");         
//End Gmail


#baca variabel URL (if register global on)
$action = $_GET['action'];
$modul = $_GET['modul'];
$tanggal = $_POST['tanggal'];
//echo $tanggal;
$waktu = $_POST['waktu'];
//echo $waktu;
$kd_modul = $_POST['kd_modul'];
//echo $kd_modul;
$nim_mhs= $_POST['nim'];
//echo $nim;
$id = $_POST['id'];
//echo $idpenilaian; 	
		
//echo $modul;

//Mengambil Waktu Komputer
$tgl = gmdate("Y-m-d H:i:s", time()+60*60*7); # WIB 

//Untuk menghapus tugas yang telah ada 
switch($action) {
	
	//Memberikan penilaian praktikum Mahasiswa	
	case "add_penilaian" : 

		$nim = $_GET['$nim'];
		$nim= str_replace('/','',str_replace('\\','',$nim)); 
		//echo $_GET['nim'];		
		$idpenilaian= $_GET['$idpenilaian'];
		$idpenilaian = str_replace('/','',str_replace('\\','',$idpenilaian)); 
		//echo $_GET['idpenilaian'];	
		$id_asisten = $_GET['$id_pengenal'];	
		$asisten= str_replace('/','',str_replace('\\','',$id_pengenal)); 

		$sql4="SELECT * FROM  tb_datapenilaiapraktikum WHERE nim='{$_GET['nim']}' AND idpenilaian ='{$_GET['idpenilaian']}'";
		$aksi4=mysql_query($sql4);
		//echo $sql4;
		while ($data4=mysql_fetch_array($aksi4))
		{$status=1;}

		if($status==1)
		{}
		else
		{
			$dbidpenilaianpelaksananpraktikum=mysql_query("SELECT * FROM  tb_idpenilaianpelaksananpraktikum WHERE id = {$_GET['idpenilaian']}");
			//echo $dbidpenilaianpelaksananpraktikum;
			while ($show=mysql_fetch_array($dbidpenilaianpelaksananpraktikum))
			{
				$kd_mk=$show['kd_mk'];
				$kd_modul=$show['kd_modul'];
			}

			$sqlKlasifikasi=mysql_query("SELECT * from tb_klasifikasipenilaian");
			while ($data2=mysql_fetch_array($sqlKlasifikasi))
			{
				$perulangan=$data2['indexnilai'];
			}

			$a=1;
			if($status==1)
			{}
			else
			{
				while ($a<=$perulangan)
				{

					if(empty($_POST['indexnilai'.$a])) {
					}
					else
					{

						$index=$_POST['indexnilai'.$a];
						$string = $index;
						$pecah = explode("<br>", $string);
						$indexnilai= $pecah[0]."<br>"; // menghasilkan 'saya'
						$indikator= $pecah[1]; // menghasilkan 'ingin''

						$indexdarinilai=mysql_fetch_array(mysql_query("SELECT * FROM  tb_klasifikasipenilaian WHERE indexnilai = '$indexnilai'"));

						$media=$indexdarinilai['media'];
						if($media=="0")
						{
							if($indikator=="on")
							{
								$nilai=0;
							}
							else
							{
								$nilai=$indexdarinilai['nilai'];
							}
							$data = mysql_query
							(
								"INSERT INTO tb_datapenilaiapraktikum VALUES(
								'{$_GET['nim']}',
								'$kd_mk',
								'$kd_modul',
								'{$_GET['idpenilaian']}',
								'$indexnilai',
								'$nilai',
								'{$_GET['id_asisten']}',
								'$tgl')"
							);
						}
						else
						{
							if($indikator=="on")
							{
								$nilai=0;
							}
							else
							{
								$nilai=$_POST['nilai'.$a];
							}
							$data = mysql_query
							(
								"INSERT INTO tb_datapenilaiapraktikum VALUES(
								'{$_GET['nim']}',
								'$kd_mk',
								'$kd_modul',
								'{$_GET['idpenilaian']}',
								'$indexnilai',
								'$nilai',
								'{$_GET['id_asisten']}',
								'$tgl')"
							);
						}
					}
					$a++;
					
				}
				

			}		
		}
		
		
		$nim_mhs = $_GET['nim'];
		//echo $nim_mhs;
		//echo $modul;
		$kd_modul2 =$_GET['kd_modul'];
		//echo $kd_modul2;
		
		$status = 0;
		$query3=mysql_query("SELECT tb_matakuliah.kd_mk, tb_matakuliah.nama_mk, tb_mdl_praktikum.nm_modul, tb_mdl_praktikum.kd_modul from tb_matakuliah inner join tb_mdl_praktikum on tb_matakuliah.kd_mk = tb_mdl_praktikum.kd_mk   WHERE tb_mdl_praktikum.kd_modul ='$kd_modul2'");
		
		//var_dump($query3);
		
		$row9=mysql_fetch_array($query3);
	
		
		$datax=mysql_query("SELECT *
			FROM tb_idpenilaianpelaksananpraktikum
			WHERE kd_mk = '$modul'
			AND kd_modul = '$kd_modul2'");
		
		//var_dump($datax);
		
		while($rowx=mysql_fetch_array($datax)){
		$idnilai2 = $rowx['id'];
		$jumlahNilai = $rowx['nilaiawal'];
		//echo $idnilai2;
		
		$status=1;
		
		$sql="select tb_idpenilaianpelaksananpraktikum.id, tb_idpenilaianpelaksananpraktikum.kd_mk, tb_idpenilaianpelaksananpraktikum.kd_modul, tb_idpenilaianpelaksananpraktikum.judul, tb_idpenilaianpelaksananpraktikum.keterangan, tb_idpenilaianpelaksananpraktikum.nilaiawal, tb_idpenilaianpelaksananpraktikum.bobot, tb_penilaianpelaksananpraktikum.idpenilaian, tb_penilaianpelaksananpraktikum.indexnilai, tb_klasifikasipenilaian.indexnilai, tb_klasifikasipenilaian.noid, tb_klasifikasipenilaian.jenispenilaian, tb_klasifikasipenilaian.media, tb_klasifikasipenilaian.oprasi, tb_klasifikasipenilaian.nilai, tb_bankpenilaian.noid, tb_bankpenilaian.namapenilaian from tb_idpenilaianpelaksananpraktikum inner join tb_penilaianpelaksananpraktikum on tb_idpenilaianpelaksananpraktikum.id = tb_penilaianpelaksananpraktikum.idpenilaian inner join tb_klasifikasipenilaian ON tb_penilaianpelaksananpraktikum.indexnilai = tb_klasifikasipenilaian.indexnilai inner join tb_bankpenilaian ON tb_klasifikasipenilaian.noid = tb_bankpenilaian.noid where tb_idpenilaianpelaksananpraktikum.id='$idnilai2'
		group by tb_penilaianpelaksananpraktikum.idpenilaian, tb_penilaianpelaksananpraktikum.indexnilai";
		//echo $sql;
		$aksi1=mysql_query($sql);
		
			while ($data1=mysql_fetch_array($aksi1)){
			
			$nama_modul = $data1['judul'];

			$oprasi=$data1['oprasi'];
			
			$indexnilai = $data1['indexnilai'];
			
			$sql4="SELECT * FROM  tb_datapenilaiapraktikum WHERE nim='$nim_mhs' AND idpenilaian = '$idnilai2' AND indexnilai='$indexnilai' ";
			
			//echo $sql4;
			$aksi4=mysql_query($sql4);
			while ($data4=mysql_fetch_array($aksi4))
				{
					$pembebananNilai=$data4['nilai'];
					//echo $pembebananNilai;
					//echo $jumlahNilai;
					//echo $oprasi;
				
			if($oprasi=="+")
				{
				$jumlahNilai=$jumlahNilai+$pembebananNilai;
				}
			elseif ($oprasi=="-")
				{
				$jumlahNilai=$jumlahNilai-$pembebananNilai;
				}
			}
			
		}
		
		$nilaiawal= $rowx['nilaiawal'];
		//echo $nilaiawal;
		
		$bobot = $rowx['bobot'];
		//echo $bobot;
		
		$nilaiakhir = ($jumlahNilai/$nilaiawal)*$bobot;
		//echo $nilaiakhir;
		
		$tot_nilai[$nilaiakhir] = $nilaiakhir;	

		$total = array_sum($tot_nilai);	
		
		//echo $jumlahNilai;
		
		//echo $kd_mk;
		//echo $id_pengenal;
		//echo $nilaiakhir;
		//echo $total;
		//echo $kd_modul;
		
		$query =  "select * from tb_nilaiakhir where nim='$nim_mhs' and kd_modul='$kd_modul'";
		
		$result = $mysqli->query($query)
		or die('Query failed: ' . mysql_error());
		//var_dump($query);
		//echo $nim_mhs;
		
		/* date_default_timezone_set('Asia/Jakarta');
		error_reporting('E_NOTICE');
		$tgl = DATE('Y-m-d H:i:s');
				
				
		$jumlah = $result->num_rows;
		if($jumlah==0){
		$query1 ="INSERT INTO tb_nilaiakhir('nim','kd_mk','kd_modul','kriteria_nilai','nilai','id_asisten','tanggal') VALUES('$nim_mhs','$modul', '$kd_modul2','$nama_modul', '$jumlahNilai', '$_GET[id_asisten]','$tgl')";
		$result = $mysqli->query($query1);
		var_dump($query1);	 
		echo"Simpan Berhasil";
		}else{
		echo"Data Sudah Ada";
		} */
		
}
		//echo $indexdarinilai;
		//echo $data;
		header("location:penilaian.html?tanggal=$tanggal&waktu=$waktu&kd_modul=$kd_modul&nim=$nim_mhs&id=$id");
		break;
		
	case "edit_penilaian" : 
	
		$nim = $_GET['$nim'];
		$nim= str_replace('/','',str_replace('\\','',$nim)); 
		//echo $_GET['nim'];		
		$idpenilaian= $_GET['$idpenilaian'];
		$idpenilaian = str_replace('/','',str_replace('\\','',$idpenilaian)); 
		//echo $_GET['idpenilaian'];	
		$id_asisten = $_GET['$id_pengenal'];	
		$asisten= str_replace('/','',str_replace('\\','',$id_pengenal)); 
		
		$dbidpenilaianpelaksananpraktikum=mysql_query("SELECT * FROM  tb_idpenilaianpelaksananpraktikum WHERE id = {$_GET['idpenilaian']}");
			while ($show=mysql_fetch_array($dbidpenilaianpelaksananpraktikum))
			{
				$kd_mk=$show['kd_mk'];
				$kd_modul=$show['kd_modul'];
			}
		
		$sqlKlasifikasi=mysql_query("SELECT * from tb_klasifikasipenilaian");
		while ($data2=mysql_fetch_array($sqlKlasifikasi))
		{
			$perulangan=$data2['indexnilai'];
			//echo $perulangan;
		}
		$a=1;
		while ($a<=$perulangan)
		{

			if(empty($_POST['indexnilai'.$a])) {
			}
			else
			{
				$index=$_POST['indexnilai'.$a];
				$string = $index;
				$pecah = explode("<br>", $string);
				$indexnilai= $pecah[0]."<br>"; // menghasilkan 'saya'
				$indikator= $pecah[1]; // menghasilkan 'ingin''

				$indexdarinilai=mysql_fetch_array(mysql_query("SELECT * FROM  tb_klasifikasipenilaian WHERE indexnilai = '$indexnilai'"));

				$media=$indexdarinilai['media'];
				if($media=="0")
				{
					if($indikator=="on")
					{
						$nilai=0;
					}
					else
					{
						$nilai=$indexdarinilai['nilai'];
					}
					echo $_GET['nim'];
					$query  ="UPDATE tb_datapenilaiapraktikum SET nilai='$nilai'
				WHERE nim='{$_GET['nim']}' AND kd_mk='$kd_mk' AND kd_modul='$kd_modul' AND idpenilaian='{$_GET['idpenilaian']}' AND indexnilai='$indexnilai'";
				$result = mysql_query($query);
				}
				else
				{
					$nilai=$_POST['nilai'.$a];
					$query1  ="UPDATE tb_datapenilaiapraktikum SET nilai='$nilai'
				WHERE nim='{$_GET['nim']}' AND kd_mk='$kd_mk' AND kd_modul='$kd_modul' AND idpenilaian='{$_GET['idpenilaian']}' AND indexnilai='$indexnilai'";
				$result = mysql_query($query1);
				}
			}
			$a++;
		}
		
		//echo $query;
		header("location:penilaian.html?tanggal=$tanggal&waktu=$waktu&kd_modul=$kd_modul&nim=$nim_mhs&id=$id");
		break;
		
	case "update_jadwal":
		
		$id = $_GET['$id'];
		$id= str_replace('/','',str_replace('\\','',$id));
		
		$id_tukar = $_GET['$id_tukar'];
		$id_tukar= str_replace('/','',str_replace('\\','',$id_tukar));
		
		$nim = $_GET['$nim'];
		$nim= str_replace('/','',str_replace('\\','',$nim)); 
		//echo $_GET['nim'];		
		$nim_tujuan= $_GET['$nim_tujuan'];
		$nim_tujuan = str_replace('/','',str_replace('\\','',$nim_tujuan)); 
		//echo $_GET['nim_tujuan'];	
		$kd_modul = $_GET['$kd_modul'];
		$kd_modul= str_replace('/','',str_replace('\\','',$kd_modul));
		$tanggal_tujuan = $_GET['$tanggal_tujuan'];	
		$tanggal_tujuan= str_replace('/','',str_replace('\\','',$tanggal_tujuan)); 
		$waktu = $_GET['$waktu_tujuan'];	
		$waktu_tujuan= str_replace('/','',str_replace('\\','',$waktu_tujuan));
		
		$query="update tb_jadwal_praktikum a INNER JOIN tb_jadwal_praktikum b ON a.nim <> b.nim set a.nim = b.nim where a.nim in ({$_GET['nim']},{$_GET['nim_tujuan']}) and b.nim in ({$_GET['nim_tujuan']},{$_GET['nim']}) and a.id in({$_GET['id']},{$_GET['id_tukar']}) and b.id in ({$_GET['id_tukar']},{$_GET['id']})";
		$result = mysql_query($query);
		
		//var_dump($query);
		
		$query1="UPDATE `tb_tukar_jadwal` SET  `status` =  'END' WHERE kd_modul='{$_GET['kd_modul']}' and nim='{$_GET['nim']}'";
		
		$result = mysql_query($query1);
		
		//var_dump($query1);
		
		//Cek Mahasiswa NIM
		$query ="select * from tb_mahasiswa where nim='{$_GET['nim']}'";
		$result = $mysqli->query($query);
		$row = $result->fetch_array();
		$hp = $row['hp'];
		$email = $row['email'];
		$nama =	$row['nama_mhs'];
		
		//Cek Mahasiswa NIM Tukar
		$query ="select * from tb_mahasiswa where nim='{$_GET['nim_tujuan']}'";
		$result = $mysqli->query($query);
		$row = $result->fetch_array();
		$hp1 = $row['hp'];
		$email1 = $row['email'];
		$nama1 =	$row['nama_mhs'];
		
		//Pengiriman SMS konfirmasi pendaftaran kepada Mahasiswa
		$query2="INSERT INTO outbox (
				DestinationNumber, 
				TextDecoded
				) 
				VALUES ('$hp', 'Pertukaran jadwal Anda dengan $nama1, telah disetujui oleh Asisten. Terima kasih| Asisten LabMS STEI ITB | lms.stei.itb@gmail.com')";
		$result = mysql_query($query2);
		
		//Pengiriman email konfirmasi pertukaran jadwal kepada Mahasiswa
		$mail->From       = "lms.stei.itb@gmail.com";
		$mail->FromName   = "Admin LMS LSKK STEI ITB";
		$mail->AddAddress("$email","$nama");
		$mail->Subject = "Informasi Pertukaran Jadwal";
		$mail->MsgHTML("Pertukaran jadwal Anda dengan  {$_GET['nim_tujuan']}, telah disetujui oleh Asisten<br/><br/><br/>
		Terima Kasih </br>
		By : Asisten LabMS STEI ITB, lms.stei.itb@gmail.com");
		$mail->IsHTML(true);
		$mail->Send();
		

		//Pengiriman SMS konfirmasi pendaftaran kepada Mahasiswa
		$query3="INSERT INTO outbox (
				DestinationNumber, 
				TextDecoded
				) 
				VALUES ('$hp', 'Pertukaran jadwal Anda dengan $nama, telah disetujui oleh Asisten. Terima kasih| Asisten LabMS STEI ITB | lms.stei.itb@gmail.com')";
		$result = mysql_query($query3);
		
		//Pengiriman email konfirmasi pertukaran jadwal kepada Mahasiswa Tujuan
		$mail->From       = "lms.stei.itb@gmail.com";
		$mail->FromName   = "Admin LMS LSKK STEI ITB";
		$mail->AddAddress("$email1","$nama1");
		$mail->Subject = "Informasi Pertukaran Jadwal";
		$mail->MsgHTML("Pertukaran jadwal Anda dengan  {$_GET['nim_tujuan']}, telah disetujui oleh Asisten<br/><br/><br/>
		Terima Kasih </br>
		By : Asisten LabMS STEI ITB, lms.stei.itb@gmail.com");
		$mail->IsHTML(true);
		$mail->Send();
		
		echo"<script>
			alert('Pertukaran jadwal berhasil dilakukan');
			setTimeout(function(){
				document.location.href='index.html';
			}, 1000);
			</script>";
	
	break;
	
	case "change_password":
		$id = $_POST['id'];
		$change_password = $_POST['change_password'];
		$confirm_password = $_POST['confirm_password'];
		
		if($change_password != $confirm_password){
			echo"<script>
			alert('Password Anda tidak sama, $change_password = $confirm_password, silahkan ulang kembali');
			setTimeout(function(){
				document.location.href='index.html';
			}, 1000);
			</script>";
		}else{
			$password = md5($change_password);
			$query="UPDATE tb_user set password='$password' where id_pengenal ='$id'";
			$result=mysql_query($query);
			//var_dump($query);
			echo"<script>
			alert('Password Anda berhasil diganti');
			setTimeout(function(){
				document.location.href='index.html';
			}, 1000);
			</script>";
		}
	break;
	
}

?>