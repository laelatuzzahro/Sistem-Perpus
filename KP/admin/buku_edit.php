<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Buku</h3>
<a class="btn" href="buku.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$kode_buku=mysqli_real_escape_string($konek,$_GET['kode']);

$det=mysqli_query($konek, "select * from buku where kode='$kode_buku'")or die(mysqli_error());
while($d=mysqli_fetch_array($det)){
	?>					
	<form action="buku_update.php" method="post" enctype="multipart/form-data">
		<table class="table">
			
			<tr>
				<td>Tanggal</td>
				<td><input name="tglmasuk" type="text" class="form-control" id="tgl" autocomplete="off" value="<?php echo $d['tanggal_masuk'] ?>"></td>
			</tr>
			<tr>
				<td>Kode</td>
				<td><input type="text" class="form-control" name="kode" value="<?php echo $d['kode'] ?>"></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>
					<select class="form-control" name="kategori">
						<?php

						if ($d['kategori'] == "Thesis") echo "<option value='Thesis' selected>Thesis</option>";
							else echo "<option value='Thesis'>Thesis</option>";

						if ($d['kategori'] == "Skripsi") echo "<option value='Skripsi' selected>Skripsi</option>";
							else echo "<option value='Skripsi'>Skripsi</option>";

						if ($d['kategori'] == "Laporan Kerja Praktek") echo "<option value='Laporan Kerja Praktek' selected>Laporan Kerja Praktek</option>";
							else echo "<option value='Laporan Kerja Praktek'>Laporan Kerja Praktek</option>";

						if ($d['kategori'] == "Penelitian") echo "<option value='Penelitian' selected>Penelitian</option>";
							else echo "<option value='Penelitian'>Penelitian</option>";

						if ($d['kategori'] == "Lain - lain") echo "<option value='Lain - lain' selected>Lain - lain</option>";
							else echo "<option value='Lain - lain'>Lain - lain</option>";

						?>
					</select>
				</td>
			</tr>	
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Universitas</td>
				<td><input type="text" class="form-control" name="univ" value="<?php echo $d['universitas'] ?>"></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td><input type="text" class="form-control" name="judul" value="<?php echo $d['judul'] ?>"></td>
			</tr>
			<tr>
				<td>Cover</td>
				<td><input type="file" class="form-control" id ="gambar" name="cover" value="<?php echo $d['cover'] ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Surat Pernyataan</td>
				<td><input name="tglpernyataan" type="text" class="form-control" id="tglpernyataan" autocomplete="off" value="<?php echo $d['tglsuratpernyataan'] ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Kesanggupan</td>
				<td><input name="tglsanggup" type="text" class="form-control" id="tglkesanggupan" autocomplete="off" value="<?php echo $d['tanggal_kesanggupan'] ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Penyerahan</td>
				<td><input name="tglpenyerahan" type="text" class="form-control" id="tglpenyerahan" autocomplete="off" value="<?php echo $d['tanggal_penyerahan'] ?>"></td>
			</tr>
			<tr>
				<td>Rak</td>
				<td>
					<select class="form-control" name="rak">
						<?php 
						if ($d['rak'] == "1A") echo "<option value='1A' selected>1A</option>";
							else echo "<option value='1A'>1A</option>";
						if ($d['rak'] == "1B") echo "<option value='1B' selected>1B</option>";
							else echo "<option value='1B'>1B</option>";
						if ($d['rak'] == "2A") echo "<option value='2A' selected>2A</option>";
							else echo "<option value='2A'>2A</option>";
						if ($d['rak'] == "2B") echo "<option value='2B' selected>2B</option>";
							else echo "<option value='2B'>2B</option>";
						?>
					</select>
				</td>
			</tr>	
			<tr>
				<td>Abstrak</td>
				<td><textarea class="form-control" name="abstrak" autocomplete="off"><?php echo $d['abstrak'] ?></textarea></td>
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
			$("#tglpenyerahan").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tglsanggup").datepicker({dateFormat : 'yy/mm/dd'});							
		});
	</script>
<?php 
include 'footer.php';

?>