<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data Anggota</h3>
<a class="btn" href="anggota.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id=mysqli_real_escape_string($konek, $_GET['id']);
$det=mysqli_query($konek, "select * from anggota where id_anggota='$id'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="anggota_update.php" method="post" enctype="multipart/form-data">
		<table class="table">
			
			<tr>
				<td>ID Anggota</td>
				<td><input type="text" class="form-control" name="id_anggota" value="<?php echo $d['id_anggota'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>NIP</td>
				<td><input type="text" class="form-control" name="nip" value="<?php echo $d['nip'] ?>"></td>
			</tr>
			<tr>
				<td>Unit Kerja</td>
				<td><input type="text" class="form-control" name="unit_kerja" value="<?php echo $d['unit_kerja'] ?>"></td>
			</tr>
			<tr>
				<td>Foto</td>
				<td><input type="file" class="form-control" name="foto" value="<?php echo $d['foto'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>