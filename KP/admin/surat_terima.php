<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("p","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->Image('../logo/logo.png',3,1,2,2);
           
$pdf->MultiCell(19.5,0.5,'BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA',0,'C');  
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(19.5,0.5,'STASIUN KLIMATOLOGI MLATI YOGYAKARTA',0,'C');
$pdf->SetFont('Times','',9);
$pdf->MultiCell(19.5,0.5,'Jl. Kabupaten Km. 5,5 Duwet Sendangadi, Mlati, Sleman, D.I. Yogyakarta',0,'C');
$pdf->MultiCell(19.5,0.5,'Telp : (0274)2880152; Fax : (0274)2880152 ; E-mail : staklim.yogya@gmail.com',0,'C');
$pdf->Line(2,3.5,19,3.5);
$pdf->SetLineWidth(0.1);      
$pdf->Line(2,3.6,19,3.6);   
$pdf->SetLineWidth(0);
$pdf->ln(2);
$id=mysqli_real_escape_string($konek,$_GET['id']);
$query=mysqli_query($konek, "select * from buku where kode = '$id' ");
while($lihat=mysqli_fetch_array($query)){
$pdf->SetFont('Times','B',14);
$pdf->Cell(17,0,"TANDA TERIMA",0,2,'C');
$pdf->ln(1);
$pdf->SetFont('Times','',12);
$pdf->SetX(3);
$pdf->Cell(5,0.5,"Telah diterima dari : ",0,2,'L');
$pdf->SetX(3);  
$pdf->Cell(3, 0.5, 'Nama ', 0, 0);
$pdf->SetX(7);
$pdf->Cell(1, 0.5, ':', 0, 0);
$pdf->SetX(7.5);
$pdf->Cell(1, 0.5, $lihat['nama'], 0, 1);
$pdf->SetX(3);  
$pdf->Cell(3, 0.5, 'Instansi/Universitas ', 0, 0);
$pdf->SetX(7);
$pdf->Cell(1, 0.5, ':', 0, 0);
$pdf->SetX(7.5);
$pdf->MultiCell(10, 0.5, $lihat['universitas'] ,0 , 'J' , false);
$pdf->SetX(3);
$pdf->Cell(3, 0.5, 'Berupa ', 0, 0);
$pdf->SetX(7);
$pdf->Cell(1, 0.5, ':', 0, 0);
$pdf->SetX(7.5);
$pdf->MultiCell(10, 0.5, $lihat['kategori'] ,0 , 'J' , false);
$pdf->SetX(3);
$pdf->Cell(3, 0.5, 'Judul  ', 0, 0);
$pdf->SetX(7);
$pdf->Cell(1, 0.5, ':', 0, 0);
$pdf->SetX(7.5);
$pdf->MultiCell(10, 0.5, $lihat['judul'] ,0 , 'J' , false);
$pdf->SetX(3);
$pdf->Cell(3, 0.5, 'Untuk keperluan ', 0, 0);
$pdf->SetX(7);
$pdf->Cell(1, 0.5, ':', 0, 0);
$pdf->SetX(7.5);
$pdf->MultiCell(10, 0.5, 'Pengumpulan laporan sebagai arsip' ,0 , 'J' , false);
$pdf->ln(1);
$pdf->Cell(30,0.5,"Sleman, ".date("d M Y"),0,1,'C');
$pdf->Cell(5, 0.5, 'Penerima', 0, 0,'C');
$pdf->Cell(20, 0.5, 'Yang menyerahkan ', 0, 0,'C');
$pdf->ln(2);
$pdf->Cell(5, 0.5, "(".$lihat['penerima'].")", 0, 0,'C');
$pdf->Cell(20, 0.5, "(".$lihat['nama'].")", 0, 0,'C');

}
$pdf->Output("surat_terima.pdf","I");

?>

