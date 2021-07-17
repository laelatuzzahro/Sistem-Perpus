<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Anggota </h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Anggota</button>
<br/>

<?php 
$per_hal=10;
$jumlah_record= mysqli_query($konek, "SELECT COUNT(*) AS jumlah from anggota");
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
<form action="anggota_cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari berdasar nama" aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">Foto</th>
		<th class="col-md-1">ID Anggota</th>
		<th class="col-md-2">Nama</th>
		<th class="col-md-2">NIP</th>
		<th class="col-md-1">Unit Kerja</th>
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($konek, $_GET['cari']);
		$anggota=mysqli_query($konek,"select * from anggota where nama like '%$cari%'");
	}else{
		$anggota=mysqli_query($konek,"select * from anggota limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($anggota)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><img src="foto/<?php echo $b['foto'] ?>" width = "90px" height = "120px"></td>
			<td><?php echo $b['id_anggota'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['nip'] ?></td>
			<td><?php echo $b['unit_kerja'] ?></td>
			<td>
				<a href="anggota_edit.php?id=<?php echo $b['id_anggota']; ?>" class="btn btn-warning">Edit</a>
				<a href="anggota_kartu.php?id=<?php echo $b['id_anggota']; ?>" class="btn btn-info">Cetak Kartu</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
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
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Anggota
				</div>
				<div class="modal-body">				
					<form action="anggota_tambah.php" method="post" enctype="multipart/form-data">
						
						<div class="form-group">
							<label>ID Anggota</label>
							<input name="id_anggota" type="text" class="form-control" autocomplete="off" value="IA0<?php echo $no++ ?>">
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input name="foto" type="file" id="foto" class="form-control" autocomplete="off">
							Ukuran foto max 2 MB
						</div>	
						<div class="form-group">
							<label>Nama</label>
							<input name="nama" type="text" class="form-control" autocomplete="off">
						</div>
						<div class="form-group">
							<label>NIP</label>
							<input name="nip" type="text" class="form-control" autocomplete="off">
						</div>			
						<div class="form-group">
							<label>Unit Kerja</label>
							<input name="unit_kerja" type="text" class="form-control" autocomplete="off">
						</div>																			
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


<?php 
include 'footer.php';

?>