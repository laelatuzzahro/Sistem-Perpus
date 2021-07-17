<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from anggota where id='$id'");
header("location:anggota.php");

?>