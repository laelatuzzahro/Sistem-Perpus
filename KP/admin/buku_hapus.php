<?php 
include 'config.php';
$kode=$_GET['kode'];

mysqli_query($konek, "delete from buku where kode = '$kode'");
header("location:buku.php");

 ?>