<?php 
include 'config.php';
$id_anggota = $_POST['id_anggota'];
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$unit_kerja = $_POST['unit_kerja'];

$namaFile = $_FILES['foto']['name'];
$ukuranFile = $_FILES['foto']['size'];
$error = $_FILES['foto']['error'];
$tmpName = $_FILES['foto']['tmp_name'];
$tipe = $_FILES['foto']['type'];

$path = "foto/".$namaFile;

if($tipe == "image/jpeg" || $tipe == "image/png"){
	if($ukuranFile <= 2000000){
		move_uploaded_file($tmpName, $path);
			mysqli_query($konek, "insert into anggota values('$id_anggota','$nama','$nip','$unit_kerja','$namaFile')");
			header("location:anggota.php");
		}
	}




 ?>