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

$sql = mysqli_query($konek, "SELECT * FROM anggota WHERE id_anggota = '$id_anggota' ");
$up = mysqli_fetch_array($sql);

$file = $up['foto'];

if($namaFile == null){
	mysqli_query($konek, "update anggota set id_anggota = '$id_anggota', nama = '$nama', nip = '$nip', unit_kerja = '$unit_kerja', foto = '$file' where id_anggota='$id_anggota'");
	header("location:anggota.php");
} else if($tipe == "image/jpeg" || $tipe == "image/png"){
	if($ukuranFile <= 2000000){
			move_uploaded_file($tmpName, $path);
			mysqli_query($konek, "update anggota set id_anggota = '$id_anggota', nama = '$nama', nip = '$nip', unit_kerja = '$unit_kerja', foto = '$namaFile' where id_anggota='$id_anggota'");
			header("location:anggota.php");
		} 
	} 



?>