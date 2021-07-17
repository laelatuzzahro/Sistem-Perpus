<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Buku</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Buku</button>
<br/>
<?php 
$tanggal_sekarang = date('Y/m/d');
$per_hal=10;
$jumlah_record= mysqli_query($konek, "SELECT COUNT(*) AS jumlah from buku");
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
<form action="cari_buku_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Masukkan kata kunci" aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-0">No</th>
		<th class="col-md-0">Cover</th>
		<th class="col-md-0">Kode</th>
		<th class="col-md-0">Kategori</th>
		<th class="col-md-0">Rak</th>
		<th class="col-md-3">Judul</th>
		<th class="col-md-0">Status</th>
		<th class="col-md-0">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($konek, $_GET['cari']);
		$buku=mysqli_query($konek,"select * from buku where judul like '%$cari%' or kode like '%$cari%' or kategori like '%$cari%'");
	}else{
		$buku=mysqli_query($konek,"select * from buku limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($buku)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><img src="cover/<?php echo $b['cover'] ?>" width = "90px" height = "120px" ></td>
			<td><?php echo $b['kode'] ?></td>
			<td><?php echo $b['kategori'] ?></td>
			<td><?php echo $b['rak'] ?></td>
			<td><?php echo $b['judul'] ?></td>
			<td><?php echo $b['status']?></td>
			<td>
				<a href="buku_detail.php?kode=<?php echo $b['kode']; ?>" class="btn btn-info">Detail</a>
				<a href="buku_edit.php?kode=<?php echo $b['kode']; ?>" class="btn btn-warning">Edit</a>
				<a href="peminjaman_form.php?kode=<?php echo $b['kode']; ?>" class="btn btn-success">Pinjam</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='buku_hapus.php?kode=<?php echo $b['kode']; ?>' }" class="btn btn-danger">Hapus</a>
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
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Tambah Buku
				</div>
				<div class="modal-body">				
					<form action="buku_tambah.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Tanggal Masuk</label>
							<input name="tglmasuk" type="text" class="form-control" id="tglmasuk" autocomplete="off" value="<?php echo $tanggal_sekarang ?>" readonly>
						</div>	
						<div class="form-group">
							<label>Kode</label>		
							<?php
								$tahun_sekarang = date('Y');
								$query = mysqli_query($konek, "SELECT kode FROM `buku` WHERE YEAR(tanggal_masuk) = $tahun_sekarang ORDER BY kode DESC LIMIT 1;");
								$sql = mysqli_fetch_array($query);
								$tahundata = $sql['kode'];
								
								$kode = explode('-', $tahundata);
								$output = preg_replace( '/[^0-9]/', '', $kode[0] );	
								$output = (int)$output+1;							
								
							?>						
									<input type="text" name="kode" class="form-control" autocomplete="off" value="<?php echo sprintf('PD%03d-'.$tahun_sekarang, $output) ?>">	
						</div>									
						<div class="form-group">
							<label>Kategori</label>								
							<select class="form-control" name="kategori">
									<option value="">-- Pilihan Kategori --</option>
									<option value="Skripsi">Skripsi</option>
									<option value="Thesis">Thesis</option>
									<option value="Laporan Kerja Praktek">Laporan Kerja Praktek</option>
									<option value="Penelitian">Penelitian</option>
									<option value="Lain - lain">Lain - lain</option>
							</select>
						</div>
						<div class="form-group">
							<label>Penulis</label>
							<input name="nama" type="text" class="form-control" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Instansi/Universitas</label>
							<input name="univ" type="text" class="form-control" autocomplete="off">
						</div>
						<div class="form-group">
							<label>Judul</label>
							<textarea name="judul" class="form-control" autocomplete="off"></textarea>
						</div>	
						<div class="form-group">
							<label>Cover Buku</label>
							<input name="cover" type="file" id="gambar" class="form-control" autocomplete="off">
							Ukuran foto max 2 MB
						</div>
						<div class="form-group">
							<label>Tanggal Surat Pernyataan</label>
							<input name="tglpernyataan" type="text" class="form-control" id="tglpernyataan" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Tanggal Kesanggupan</label>
							<input name="tglsanggup" type="text" class="form-control" id="tglsanggup" autocomplete="off">
						</div>	
						<div class="form-group">
							<label>Tanggal Penyerahan</label>
							<input name="tglpenyerahan" type="text" class="form-control" id="tglpenyerahan" autocomplete="off" value="<?php echo $tanggal_sekarang ?>">
						</div>
						<div class="form-group">
							<label>Rak</label>								
							<select class="form-control" name="rak">
									<option value="">-- Pilihan Rak --</option>
									<option value="1A">1A</option>
									<option value="1B">1B</option>
									<option value="2A">2A</option>
									<option value="2B">2B</option>
							</select></div>
						<div class="form-group">
							<label>Status</label>								
							<input name="status" type="text" class="form-control" autocomplete="off" value="Tersedia">
						</div>					
						<div class="form-group">
							<label>Abstrak</label>
							<textarea class="form-control" name="abstrak" autocomplete="off"></textarea>
						</div>	
						<div class="form-group">
							<label>Penerima</label>
							<input name="penerima" type="text" class="form-control" autocomplete="off">
						</div>																			
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<input type="reset" class="btn btn-danger" value="Reset">								
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tglmasuk").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tglpernyataan").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tglsanggup").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tglpenyerahan").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
<?php include 'footer.php'; ?>