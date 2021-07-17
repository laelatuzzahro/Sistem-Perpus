<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Peminjaman Buku </h3>

<?php 
$per_hal=10;
$jumlah_record= mysqli_query($konek, "SELECT COUNT(*) AS jumlah from peminjaman");
$jum=mysqli_fetch_array($jumlah_record);
$halaman=ceil($jum['jumlah'] / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum['jumlah']; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	
</div>
<form action="peminjaman_cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari berdasarkan ID Peminjaman" aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-2">ID Peminjaman</th>
		<th class="col-md-2">Tanggal Pinjam</th>
		<th class="col-md-2">ID Anggota</th>
		<th class="col-md-1">Nama</th>
		<th class="col-md-2">Kode Buku</th>
		<th class="col-md-3">Judul</th>
		<th class="col-md-1">Opsi</th>
	</tr>
	<?php 
	$jumlah= mysqli_query($konek, "SELECT COUNT(*) AS total from riwayat_peminjaman");
	$tmp=mysqli_fetch_array($jumlah);
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($_GET['cari']);
		$buku=mysqli_query($konek,"select * from peminjaman where id_pinjam like '$cari' or jenis like '$cari'");
	}else{
		$buku=mysqli_query($konek,"select * from peminjaman limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($buku)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $tmp['total']+1 ?></td>
			<td><?php echo $b['tglpinjam'] ?></td>
			<td><?php echo $b['id_anggota'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['kode'] ?></td>
			<td><?php echo $b['judul']?></td>
			<td>
				<a href="pengembalian_form.php?kode=<?php echo $b['id_pinjam']; ?>" class="btn btn-info">Pengembalian</a>
			</td>
		</tr>		
		<?php 
	}
	?>
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
<?php include 'footer.php'; ?>