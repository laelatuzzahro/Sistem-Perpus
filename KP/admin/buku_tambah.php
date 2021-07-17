<?php 
include 'config.php';

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



$namaFile = $_FILES['cover']['name'];
$ukuranFile = $_FILES['cover']['size'];
$error = $_FILES['cover']['error'];
$tmpName = $_FILES['cover']['tmp_name'];
$tipe = $_FILES['cover']['type'];

$path = "cover/".$namaFile;
 

if($tipe == "image/jpeg" && $tipe == "image/png" && $ukuranFile <= 2000000){
		move_uploaded_file($tmpName, $path);
			$sql = mysqli_query($konek, "insert into buku values('$tglmasuk','$kode','$kategori','$nama','$univ','$judul','$namaFile','$tglpernyataan','$tglsanggup','$tglpenyerahan','$rak','$status','$abstrak','$penerima')");
			header("location:surat_terima.php?id=$kode");
	}





 ?>