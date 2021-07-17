<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Riwayat Peminjaman Buku </h3>

<br/>
<?php 
$per_hal=10;
$jumlah_record= mysqli_query($konek, "SELECT COUNT(*) AS jumlah from riwayat_peminjaman");
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

<br/>
<table class="table table-hover">
	<tr><center>
		<th class="col-md-1">No</th>
		<th class="col-md-1">ID Peminjaman</th>
		<th class="col-md-1">Tanggal Pinjam</th>
		<th class="col-md-1">ID Anggota</th>
		<th class="col-md-2">Nama</th>
		<th class="col-md-1">Kode Buku</th>
		<th class="col-md-3">Judul</th>
		<th class="col-md-1">Tanggal Kembali</th>
		<th class="col-md-1">Lama Pinjam</th>
		</center>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($_GET['cari']);
		$buku=mysqli_query($konek,"select * from riwayat_peminjaman where nama like '$cari' or jenis like '$cari'");
	}else{
		$buku=mysqli_query($konek,"select * from riwayat_peminjaman limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($buku)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['id_pinjam'] ?></td>
			<td><?php echo $b['tgl_pinjam'] ?></td>
			<td><?php echo $b['id_anggota'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['kodebuku'] ?></td>
			<td><?php echo $b['judul']?></td>
			<td><?php echo $b['tgl_kembali']?></td>
			<td>
				<?php
					$tgl_buku_dipinjam =  new DateTime ($b['tgl_pinjam']);
					$tgl_buku_kembali = new DateTime ($b['tgl_kembali']);
					$lama_buku_dipinjam = $tgl_buku_kembali->diff($tgl_buku_dipinjam)->format("%a");
					echo $lama_buku_dipinjam;
				?>
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