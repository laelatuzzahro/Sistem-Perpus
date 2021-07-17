<?php include 'header.php'; 
	  include 'config.php';

    $tanggal_sekarang = date('Y/m/d');
?>

<br><br>
   <div class="container">
  	<div class="row">
      <div class="col-md-12">
      <h4>Tambah Buku </h4><br>

      <?php if(isset($_GET["success"])) {?>
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		  Proses simpan <strong>berhasil</strong>!
		</div>
	<?php } ?>
	<?php if(isset($_GET["failed"])) {?>
		<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		  Proses simpan <strong>gagal</strong>! Terdapat field kosong.
		</div>
	<?php } ?>

         <form action="tambah_act.php" method="post" enctype="multipart/form-data">
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
              *Ukuran foto max 2 MB
            </div>
            <div class="form-group">
              <label>Tanggal Surat Pernyataan</label>
              <input name="tglpernyataan" type="date" class="form-control" id="tglpernyataan" autocomplete="off">
            </div>  
            <div class="form-group">
              <label>Tanggal Kesanggupan</label>
              <input name="tglsanggup" type="date" class="form-control" id="tglsanggup" autocomplete="off">
            </div>  
            <div class="form-group">
              <label>Tanggal Penyerahan</label>
             <input name="tglpenyerahan" type="text" class="form-control" id="tglmasuk" autocomplete="off" value="<?php echo $tanggal_sekarang ?>" readonly>
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
             <input name="status" type="text" class="form-control" id="tglmasuk" autocomplete="off" value="Tersedia" readonly>
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
           <a href="user.php"><button type="button" class="btn btn-default">Batal</button></a>
            <input type="reset" class="btn btn-danger" value="Reset">               
            <a href="tambah_act.php" ><input type="submit" class="btn btn-primary" value="Simpan" name="submit" ></a>
          </div>
        </form>
      </div>
    </div>
  </div>
     
      </div>
    </div>
  </div>




<?php include 'footer.php'; ?>