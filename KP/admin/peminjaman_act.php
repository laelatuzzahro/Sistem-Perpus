<?php 
include 'config.php';
print_r($_POST);

$tglpinjam = $_POST['tglpinjam'];
$id_anggota = $_POST['id_anggota'];
$nama = $_POST['nama'];
$kode_buku = $_POST['kodebuku'];
$judul = $_POST['judul'];
$status = 'Tidak Tersedia';

$data = mysqli_query($konek, "SELECT * FROM buku WHERE kode = '$kode_buku'");
$dt = mysqli_fetch_array($data);
mysqli_query($konek, "update buku set status = '$status' where kode='$kode_buku'");
echo "update buku set status = '$status' where kode='$kode_buku'";
mysqli_query($konek, "insert into peminjaman values('','$tglpinjam','$id_anggota','$nama','$kode_buku','$judul')");
echo "insert into peminjaman values('$id_pinjam','$tglpinjam','$id_anggota','$nama','$kode_buku','$judul')";
header("location:peminjaman.php");

 ?>