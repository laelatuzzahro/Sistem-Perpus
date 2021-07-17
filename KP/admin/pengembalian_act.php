<?php 
include 'config.php';
$id_pinjam = $_POST['id_pinjam'];
$tglpinjam = $_POST['tglpinjam'];
$id_anggota = $_POST['id_anggota'];
$nama = $_POST['nama'];
$kode_buku = $_POST['kodebuku'];
$judul = $_POST['judul'];
$tglkembali = $_POST['tglkembali'];
$status = 'Tersedia';


$buku = mysqli_query($konek,"select * from buku where kode = '$kode_buku'");
$bk = mysqli_fetch_array($buku);
$masuk = mysqli_query($konek, "insert into riwayat_peminjaman values ('$id_pinjam','$tglpinjam','$id_anggota','$nama','$kode_buku','$judul','$tglkembali')");
mysqli_query($konek, "update buku set status = '$status' where kode = '$kode_buku' ");
mysqli_query($konek, "delete from peminjaman where id_pinjam = '$id_pinjam' ");


header("location:peminjaman_riwayat.php");

 ?>