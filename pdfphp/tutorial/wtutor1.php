<?php
require('../fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',30);
$pdf->Cell(40,10,'�Hola, Mundo!');
$pdf->Output();
?>
