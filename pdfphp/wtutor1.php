<?php
require('fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',30);
$pdf->Cell(100,10,'¡Hola, Mundo!',1,1,'C');
$pdf->Output();
?>
