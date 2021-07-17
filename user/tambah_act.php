<?php 
include 'config.php';

if(isset($_POST["submit"])){

$tglmasuk=$_POST['tglmasuk'];
$kode=$_POST['kode'];
$kategori=$_POST['kategori'];
$nama=$_POST['nama'];
$univ=$_POST['univ'];
$judul=$_POST['judul'];
$tglpernyataan=$_POST['tglpernyataan'];
$tglsanggup=$_POST['tglsanggup'];
$tglpenyerahan=$_POST['tglpenyerahan'];
$rak=$_POST['rak'];
$status=$_POST['status'];
$abstrak=$_POST['abstrak'];
$penerima =$_POST['penerima'];

 //Convert Tanggal
// $datemasuk  = date('Y/m/d', strtotime($tglmasuk));
$datepernyataan  = date('Y/m/d', strtotime($tglpernyataan));
$datesanggup = date('Y/m/d', strtotime($tglsanggup));
// $datepenyerahan  = date('Y/m/d', strtotime($tglpenyerahan));

 //File 
//$namaFile = $_FILES['softfile']['name'];
//$ukuranFile = $_FILES['softfile']['size'];
//$error = $_FILES['softfile']['error'];
//$tmpFile = $_FILES['softfile']['tmp_name'];
//$tipeFile = $_FILES['softfile']['type'];

//Gambar 
$namaGmb = $_FILES['cover']['name'];
$ukuranGmb = $_FILES['cover']['size'];
$error = $_FILES['cover']['error'];
$tmpGmb = $_FILES['cover']['tmp_name'];
$tipeGmb = $_FILES['cover']['type'];
$path = "cover/".$namaGmb;

if(empty($tglmasuk && $kode && $kategori && $nama &&  $univ && $judul && $namaGmb && $datepernyataan && $datesanggup && $tglpenyerahan && $rak && $status && $abstrak && $penerima)){
		header("location:tambah_buku.php?failed");
	}else{
		if($tipeGmb == "image/jpeg" || $tipeGmb == "image/png"){
			if($ukuranGmb <= 2000000){
				move_uploaded_file($tmpGmb, $path);
					$sql = mysqli_query($konek, "insert into buku values('$tglmasuk','$kode','$kategori','$nama','$univ','$judul','$namaGmb','$datepernyataan','$datesanggup','$tglpenyerahan','$rak','$status','$abstrak','$penerima')");
				header("location:surat_terima.php?id=$kode");
		} 
	}
	}
}



 ?>