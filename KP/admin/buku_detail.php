<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Buku</h3>
<a class="btn" href="buku.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$kode_buku=mysqli_real_escape_string($konek, $_GET['kode']);


$det=mysqli_query($konek, "select * from buku where kode='$kode_buku'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td><img src="cover/<?php echo $d['cover'] ?>" width = "90px" height = "120px" ></td>
		</tr>
		<tr>
			<td>Tanggal Masuk</td>
			<td>:</td>
			<td><?php echo $d['tanggal_masuk'] ?></td>
		</tr>
		<tr>
			<td>Kode</td>
			<td>:</td>
			<td><?php echo $d['kode'] ?></td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>:</td>
			<td><?php echo $d['kategori'] ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Universitas</td>
			<td>:</td>
			<td><?php echo $d['universitas'] ?></td>
		</tr>
		<tr>
			<td>Judul</td>
			<td>:</td>
			<td><?php echo $d['judul'] ?></td>
		</tr>
		<tr>
			<td>Abstrak</td>
			<td>:</td>
			<td><?php echo $d['abstrak'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Surat Pernyataan</td>
			<td>:</td>
			<td><?php echo $d['tglsuratpernyataan'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Kesanggupan</td>
			<td>:</td>
			<td><?php echo $d['tanggal_kesanggupan'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Penyerahan</td>
			<td>:</td>
			<td><?php echo $d['tanggal_penyerahan'] ?></td>
		</tr>
		<tr>
			<td>Rak</td>
			<td>:</td>
			<td><?php echo $d['rak'] ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>