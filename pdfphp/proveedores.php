<?php
require('fpdf.php');

class PDF extends FPDF
{
//Cabecera de página
function Header()
{
	//Logo
	$this->Image('../images/logopdf.jpg',10,8,33);
	//Arial bold 15
	$this->SetFont('Arial','B',10);
	//Movernos a la derecha
	
	//Título
	$fecha=date('d/m/Y');
	
	$this->Ln(5);
	$this->Cell(120);
	$this->Cell(70,10,'Fecha : '.$fecha,0,0,'C');
	$this->SetFont('Arial','B',15);
	$this->Ln(15);
	$this->Cell(60);
	$this->Cell(70,10,'Listado de Proveedores',0,0,'C');
	//Salto de línea
	$this->Ln(10);
	// enca
	$this->SetFont('Arial','B',8);
	$this->Cell(10,5,'ID',1,0,'C');
  	$this->Cell(60,5,'Nombre',1,0,'C');
   	$this->Cell(60,5,'Telefonos',1,0,'C');
    $this->Cell(60,5,'Correo',1,1,'C');
	//$this->Cell(60,5,'Dirección',1,1,'C');
	

	//Salto de línea
	//$this->Ln(20);
}

//Pie de página
function Footer()
{
	//Posición: a 1,5 cm del final
	$this->SetY(-15);
	//Arial italic 8
	$this->SetFont('Arial','I',8);
	//Número de página
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',8);

include('../conex.php');
			  
			  	// para el paginador
				$wsql="select * from proveedor order by nombre";
				$result=mysql_query($wsql,$link);
				$i=0;
			  	while($row=mysql_fetch_array($result)){
					$i++;  
					$pdf->Cell(10,5,$row['idproveedor'],1,0,'C');
					$pdf->Cell(60,5,utf8_encode($row['nombre']),1,0,'L');
					$pdf->Cell(60,5,($row['telefonos']),1,0,'L');
					$pdf->Cell(60,5,($row['correo']),1,1,'L');
					//$pdf->Cell(60,5,utf8_decode($row['direccion']),1,1,'C');
			  }
			  $pdf->Cell(190,5,'Total Proveedores : '.$i,1,1,'C');
$pdf->Output();

?>
