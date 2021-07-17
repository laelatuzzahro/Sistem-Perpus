  <table class="table table striped" id="mytable">
    <tr style="text-align: center; padding: 5px;">
           
         <th>Kode</th>
         <th>Kategori</th>
         <th>Cover</th>
         <th>Judul</th>
         <th>Penulis</th>
         <th>Universitas</th>
         <th>Status</th>
         <th colspan="2" align="text-center" >Aksi</th>
    </tr>
    
    <?php
        $keyword=$_GET['keyword'];
        var_dump($keyword);
        $conn = new mysqli('localhost','root','','perpustakaan_klimat');
        $sql = mysqli_query($conn, "select * from buku where judul like '%$keyword%'") or die (mysqli_error($conn));
        
        while ($query=mysqli_fetch_array($sql)) 
        {
            ?>
                <tr>
                  
                    <td><?php echo $query['kode']; ?></td>
                    <td><?php echo $query['kategori']; ?></td>
                    <td><img src="../KP/admin/cover/<?php echo $query['cover'];?>" width = "90px" height = "120px"></td>
                    <td><?php echo $query['judul'];?></td>
                    <td><?php echo $query['nama'];?></td>
                    <td><?php echo $query['universitas'];?></td>
                    <td><?php echo $query['status'];?></td>
                    <td><a href="./details_user.php?kode=<?php echo $query['kode']; ?>"><button class="btn btn-secondary" type="button" >Details</button></a></td>
                </tr>
        <?php } ?>
    </table>