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
$abstrak=$_POST['abstrak'];

$namaFile = $_FILES['cover']['name'];
$ukuranFile = $_FILES['cover']['size'];
$error = $_FILES['cover']['error'];
$tmpName = $_FILES['cover']['tmp_name'];
$tipe = $_FILES['cover']['type'];

$path = "cover/".$namaFile;

$sql = mysqli_query($konek, "SELECT * FROM buku WHERE kode = '$kode' ");
$up = mysqli_fetch_array($sql);

$file = $up['cover'];
if($namaFile == null){
	mysqli_query($konek, "update buku set tanggal_masuk='$tglmasuk', kode='$kode', kategori='$kategori', nama='$nama', universitas='$univ', judul='$judul', cover='$file', tglsuratpernyataan='$tglpernyataan', tanggal_kesanggupan ='$tglsanggup', tanggal_penyerahan ='$tglpenyerahan', rak = '$rak', abstrak='$abstrak' where kode='$kode'");
			header("location:buku.php");
} else if($tipe == "image/jpeg" || $tipe == "image/png"){
	if($ukuranFile <= 2000000){
		move_uploaded_file($tmpName, $path);
			mysqli_query($konek, "update buku set tanggal_masuk='$tglmasuk', kode='$kode', kategori='$kategori', nama='$nama', universitas='$univ', judul='$judul', cover='$namaFile', tglsuratpernyataan='$tglpernyataan', tanggal_kesanggupan ='$tglsanggup', tanggal_penyerahan ='$tglpenyerahan', rak = '$rak', abstrak='$abstrak' where kode='$kode'");
			header("location:buku.php");
		}
	}









?>