<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->Image('../logo/logo.png',1,1,2,2);
$pdf->MultiCell(13.5,0.5,'BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA',0,'C');  
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(13.5,0.5,'STASIUN KLIMATOLOGI MLATI YOGYAKARTA',0,'C');
$pdf->SetFont('Times','',9);
$pdf->MultiCell(13.5,0.5,'Jl. Kabupaten Km. 5,5 Duwet Sendangadi, Mlati, Sleman, D.I. Yogyakarta',0,'C');
$pdf->MultiCell(13.5,0.5,'Telp : (0274)2880152; Fax : (0274)2880152 ; E-mail : staklim.yogya@gmail.com',0,'C');
$pdf->Rect(0.5, 0.5, 15, 9, '', null, null);
$pdf->Line(1,3.2,15,3.2);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.3,15,3.3);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(12,0,"Kartu Anggota Perpustakaan ",0,2,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$id=mysqli_real_escape_string($konek,$_GET['id']);
$query=mysqli_query($konek, "select * from anggota where id_anggota = '$id' ");
while($lihat=mysqli_fetch_array($query)){
$pdf->SetX(2);
$pdf->Image('foto/'.$lihat['foto'],2,5,2,3);

$pdf->SetX(4.5);  
$pdf->Cell(4, 0.8, 'ID Anggota ', 0, 0);
$pdf->SetX(8);
$pdf->Cell(1, 0.8, ':', 0, 0);
$pdf->SetX(8.5);
$pdf->Cell(1, 0.8, $lihat['id_anggota'], 0, 1);
$pdf->SetX(4.5);  
$pdf->Cell(4, 0.8, 'NIP ', 0, 0);
$pdf->SetX(8);
$pdf->Cell(1, 0.8, ':', 0, 0);
$pdf->SetX(8.5);
$pdf->Cell(1, 0.8, $lihat['nip'], 0, 1);
$pdf->SetX(4.5);
$pdf->Cell(4, 0.8, 'Nama' , 0, 0);
$pdf->SetX(8);
$pdf->Cell(1, 0.8, ':', 0, 0);
$pdf->SetX(8.5);
$pdf->Cell(3, 0.8, $lihat['nama'], 0, 1 );
$pdf->SetX(4.5);
$pdf->Cell(4, 0.8, 'Unit Kerja' , 0, 0);
$pdf->SetX(8);
$pdf->Cell(1, 0.8, ':', 0, 0);
$pdf->SetX(8.5);
$pdf->Cell(3, 0.8, $lihat['unit_kerja'], 0, 1 );
}


$pdf->Output("kartu_anggota.pdf","I");

?>

