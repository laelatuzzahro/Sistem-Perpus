<?php 
      include 'header.php';
      include 'config.php';
?>

   <!-- table -->
   <br><br><br>
   <div class="container">
  <div class="row">
        <div class="col-md-12">
        <h4>Data Buku </h4>
        <a href="tambah_buku.php"><button type="button" class="btn btn-primary"> Tambah Buku</button></a><br><br>
        <div class="input-group">
                <input type="text" class="form-control" name="cari" id="keyword" placeholder="Masukkan kata kunci ">
              </div>
              <br>
        <div class="table-responsive">
              
              <table id="mytable" class="table table-bordred table-striped">
                    
                   <thead>
                   
                   <th>Kode</th>
                   <th>Kategori</th>
                   <th>Cover</th>
                   <th>Judul</th>
                   <th>Penulis</th>
                   <th>Universitas</th>
                   <th>Status</th>
                   <th colspan="2" align="text-center" >Aksi</th>
                       
                   </thead>
    <tbody>
     
           <tr> <?php 
                     $query = mysqli_query($konek,"SELECT * FROM buku ");
                     while ($data=mysqli_fetch_array($query)) 
                      {
                       
                         ?>
  
    
               <td><?php echo $data['kode']; ?></td>
               <td><?php echo $data['kategori']; ?></td>
               <td><img src="../KP/admin/cover/<?php echo $data['cover'];?>" width = "90px" height = "120px"></td>
               <td><?php echo $data['judul'];?></td>
               <td><?php echo $data['nama'];?></td>
               <td><?php echo $data['universitas'];?></td>
               <td><?php echo $data['status'];?></td>
               <td><a href="details_user.php?kode=<?php echo $data['kode']; ?>"><button class="btn btn-secondary" type="button" >Details</button></a></td>
  
    </tr>
     <?php } ?>
    </tbody>

   </table>
     </div>
            
        </div>
  </div>
</div>
<?php include 'footer.php'; ?>