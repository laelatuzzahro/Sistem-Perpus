<?php 
include 'config.php';
$tahun = date('Y');
?>
            <div style=" width: 50%;
                margin: 15px auto;">
            <canvas id="myChart" width="200px" height="100px"></canvas>
            </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober","November","Desember"],
                    label: 'Peminjaman',
                    datasets: [{
                            
                            data: [             
                               <?php 
                                $jumlah_januari = mysqli_query($konek,"select * from riwayat_peminjaman where DATE_FORMAT(tgl_pinjam, '%Y')='$tahun' AND DATE_FORMAT(tgl_pinjam, '%m')='01'");
                                 echo mysqli_num_rows($jumlah_januari);
                              ?> , 
                               <?php 
                                $jumlah_februari = mysqli_query($konek,"select * from riwayat_peminjaman where DATE_FORMAT(tgl_pinjam, '%Y')='$tahun' AND DATE_FORMAT(tgl_pinjam, '%m')='02'");
                                 echo mysqli_num_rows($jumlah_februari);
                              ?>, 
                               <?php 
                                $jumlah_maret = mysqli_query($konek,"select * from riwayat_peminjaman where DATE_FORMAT(tgl_pinjam, '%Y')='$tahun' AND DATE_FORMAT(tgl_pinjam, '%m')='03'");
                                 echo mysqli_num_rows($jumlah_maret);
                              ?>, 
                               <?php 
                                $jumlah_april = mysqli_query($konek,"select * from riwayat_peminjaman where DATE_FORMAT(tgl_pinjam, '%Y')='$tahun' AND DATE_FORMAT(tgl_pinjam, '%m')='04'");
                                 echo mysqli_num_rows($jumlah_april);
                              ?>, 
                               <?php 
                                $jumlah_mei = mysqli_query($konek,"select * from riwayat_peminjaman where DATE_FORMAT(tgl_pinjam, '%Y')='$tahun' AND DATE_FORMAT(tgl_pinjam, '%m')='05'");
                                 echo mysqli_num_rows($jumlah_mei);
                              ?>, 
                               <?php 
                                $jumlah_juni = mysqli_query($konek,"select * from riwayat_peminjaman where DATE_FORMAT(tgl_pinjam, '%Y')='$tahun' AND DATE_FORMAT(tgl_pinjam, '%m')='06'");
                                 echo mysqli_num_rows($jumlah_juni);
                              ?>,
                               <?php 
                                $jumlah_juli = mysqli_query($konek,"select * from riwayat_peminjaman where DATE_FORMAT(tgl_pinjam, '%Y')='$tahun' AND DATE_FORMAT(tgl_pinjam, '%m')='07'");
                                 echo mysqli_num_rows($jumlah_juli);
                              ?>,
                               <?php 
                                $jumlah_agustus = mysqli_query($konek,"select * from riwayat_peminjaman where DATE_FORMAT(tgl_pinjam, '%Y')='$tahun' AND DATE_FORMAT(tgl_pinjam, '%m')='08'");
                                 echo mysqli_num_rows($jumlah_agustus);
                              ?>,
                               <?php 
                                $jumlah_september = mysqli_query($konek,"select * from riwayat_peminjaman where DATE_FORMAT(tgl_pinjam, '%Y')='$tahun' AND DATE_FORMAT(tgl_pinjam, '%m')='09'");
                                 echo mysqli_num_rows($jumlah_september);
                              ?>,
                               <?php 
                                $jumlah_oktober = mysqli_query($konek,"select * from riwayat_peminjaman where DATE_FORMAT(tgl_pinjam, '%Y')='$tahun' AND DATE_FORMAT(tgl_pinjam, '%m')='10'");
                                 echo mysqli_num_rows($jumlah_oktober);
                              ?>,
                               <?php 
                                $jumlah_november = mysqli_query($konek,"select * from riwayat_peminjaman where DATE_FORMAT(tgl_pinjam, '%Y')='$tahun' AND DATE_FORMAT(tgl_pinjam, '%m')='11'");
                                 echo mysqli_num_rows($jumlah_november);
                              ?>,
                               <?php 
                                $jumlah_desember = mysqli_query($konek,"select * from riwayat_peminjaman where DATE_FORMAT(tgl_pinjam, '%Y')='$tahun' AND DATE_FORMAT(tgl_pinjam, '%m')='12'");
                                 echo mysqli_num_rows($jumlah_desember);
                              ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgb(255, 153, 153, 0.2)',
                                'rgb(204, 153, 255,0.2)',
                                'rgb(255, 255, 102, 0.2)',
                                'rgb(255, 80, 80,0.2)',
                                'rgb(153, 51, 102,0.2)',
                                'rgb(102, 102, 255,0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgb(255, 153, 153, 1)',
                                'rgb(204, 153, 255,1)',
                                'rgb(255, 255, 102, 1)',
                                'rgb(255, 80, 80, 1)',
                                'rgb(153, 51, 102, 1)',
                                'rgb(102, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>

