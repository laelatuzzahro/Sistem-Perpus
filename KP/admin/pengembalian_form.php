<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>   Form Pengembalian </h3>
<a class="btn" href="barang_laku.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$kode=mysqli_real_escape_string($konek,$_GET['kode']);

$det=mysqli_query($konek, "select * from peminjaman where id_pinjam='$kode'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<form action="pengembalian_act.php" method="post">
		<table class="table">
			<tr>
				<td>ID Peminjaman</td>
				<td><input type="text" class="form-control" name="id_pinjam" value="<?php echo $d['id_pinjam'] ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Peminjaman</td>
				<td><input name="tglpinjam" type="text" class="form-control" autocomplete="off" value="<?php echo $d['tglpinjam']?>"></td>
			</tr>
			<tr>
				<td>ID Anggota</td>
				<td><input type="text" class="form-control" name="id_anggota" value="<?php echo $d['id_anggota']?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama']?>"></td>
			</tr>
			<tr>
				<td>Kode Buku</td>
				<td><input type="text" class="form-control" name="kodebuku" value="<?php echo $d['kode'] ?>"></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td><textarea name="judul" class="form-control"><?php echo $d['judul'] ?></textarea></td>
			</tr>
			<tr>
				<td>Tanggal Pengembalian</td>
				<td><input name="tglkembali" type="text" id="tgl" class="form-control" autocomplete="off"></td>
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
 <script type="text/javascript">
		$(document).ready(function(){
			$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
	
<?php 
include 'footer.php';

?>