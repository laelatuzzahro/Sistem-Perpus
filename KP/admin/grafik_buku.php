<?php 
include 'config.php';
?>
<div style=" width: 50%;
                margin: 15px auto;">
            <canvas id="PieChart" width="200px" height="100px"></canvas>
            </div>
<script>
  var ctx = document.getElementById("PieChart").getContext('2d');
  var PieChart = new Chart(ctx, {
    type: 'pie',
    
    data: {
      labels: ["Skripsi", "Thesis","Penelitian","Laporan Kerja Praktek", "Lain - lain"],
      datasets: [{
        label: '',
        data: [ <?php 
                  $jumlah_skripsi = mysqli_query($konek,"select * from buku where kategori = 'Skripsi'");
                   echo mysqli_num_rows($jumlah_skripsi);
                ?> , 
                <?php 
                  $jumlah_thesis = mysqli_query($konek,"select * from buku where kategori = 'Thesis'");
                   echo mysqli_num_rows($jumlah_thesis);
                ?>, 
                <?php 
                  $jumlah_penelitian = mysqli_query($konek,"select * from buku where kategori = 'Penelitian'");
                   echo mysqli_num_rows($jumlah_penelitian);
                ?>,
                <?php 
                  $jumlah_kp = mysqli_query($konek,"select * from buku where kategori = 'Laporan Kerja Praktek'");
                   echo mysqli_num_rows($jumlah_kp);
                ?>,
                <?php 
                  $jumlah_lain = mysqli_query($konek,"select * from buku where kategori = 'Lain - lain'");
                   echo mysqli_num_rows($jumlah_lain);
                ?>],
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(51, 204, 51, 0.2)'
                                
        ],
        borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(51, 204, 51, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scale: {
   ticks: {
      maxTicksLimit: 3
   }
}
    }
  });
</script>