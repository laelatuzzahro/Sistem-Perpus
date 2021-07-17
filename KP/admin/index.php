<?php include 'header.php'; 
        include 'config.php';
?>
       
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="thumbnail">
                            <h3 class="box-title">Total Anggota</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div><img src="foto/gmbprofil.png"></div>
                                </li>
                                <?php 
									$jumlah_record= mysqli_query($konek, "SELECT COUNT(*) AS jumlah from anggota");
									$anggota=mysqli_fetch_array($jumlah_record);
								?>
                                <li><span class="text-info" style="font-size: 36px"><?php echo $anggota['jumlah']?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="thumbnail">
                            <h3 class="box-title">Total Buku</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div><img src="foto/gmbbuku.png" ></div>
                                </li>
                                  <?php 
									$jumlah_record= mysqli_query($konek, "SELECT COUNT(*) AS jumlah from buku");
									$buku=mysqli_fetch_array($jumlah_record);
								?>
                                <li><span class="text-info" style="font-size: 36px"><?php echo $buku['jumlah']?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="thumbnail">
                            <h3 class="box-title">Total Peminjaman</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div><img src="foto/list.png"></div>
                                </li>
                                  <?php 
									$jumlah_record= mysqli_query($konek, "SELECT COUNT(*) AS jumlah from riwayat_peminjaman");
									$pinjam=mysqli_fetch_array($jumlah_record);
								?>
                                <li><span class="text-info" style="font-size: 36px"><?php echo $pinjam['jumlah']?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                 
<!-- Grafik -->
     <div class="row">
         <div class="col-md-2 col-lg-10 col-sm-4 col-xs-6">
               <h2 align="center"> Data Peminjaman per Bulan</h2>
               <?php include 'grafik_pinjam.php'; ?>
          </div>
           <div class="col-md-2 col-lg-10 col-sm-4 col-xs-6">
               <h2 align="center"> Data Buku per Kategori</h2>
               <?php include 'grafik_buku.php'; ?>
          </div>
     </div>




<?php include 'footer.php'; ?>