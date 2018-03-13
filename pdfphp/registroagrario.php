<?php
session_start();
require('fpdf.php');

class PDF extends FPDF
{
//Cabecera de página
function Header()
{
	//Logo
	$this->Image('../ima/toppdf.jpg',10,8,280);
	//Arial bold 15
	$this->SetFont('Arial','B',10);
	//Movernos a la derecha
	
	//Título
	$fecha=date('d/m/Y');
	
	$this->Ln(10);
	$this->Cell(225);
	$this->Cell(70,10,'Fecha : '.$fecha,0,0,'C');
	$this->SetFont('Arial','B',12);
	$this->Ln(10);
	//$this->Cell(50);
	$nestatus=$_SESSION['nestatus'];
	$this->Cell(275,10,'SOLICITUD DE REGISTRO AGRARIO',0,1,'C');
	$this->Cell(275,5,$nestatus,0,0,'C');
	//Salto de línea
	$this->Ln(10);
	// enca
	$this->SetFont('Arial','B',8);
	$this->Cell(10,10,'NUM.',1,0,'C');
  	$this->Cell(45,10,'MUNICIPIO',1,0,'C');
   	$this->Cell(45,10,'PARROQUIA',1,0,'C');
    $this->Cell(73,10,'PRODUCTORES',1,0,'C');
	$this->MultiCell(20,5,'CEDULA O R.I.F.',1,'C');
	$this->SetY(50);
	$this->SetX(203);
	$this->MultiCell(33,5,' TIPO DE PRODUCTOR ',1,'C');
	$this->SetY(50);
	$this->SetX(236);
	$this->MultiCell(25,5,'HAS REGISTRADAS',1,'C');
	$this->SetY(50);
	$this->SetX(261);
	$this->MultiCell(25,5,'SUPERFICIE ADJUDICADA',1,'C');
	

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
$pdf=new PDF('l');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',8);

include('../conex.php');
			  
			  	// para el paginador
				

			 // $wsql="select * from scartaproductor inner join productor on productor.idproductor=scartaproductor.idproductor";
				$wsql= $_SESSION['wsql'];
			  $result=mysql_query($wsql,$link);
			  $i=0;
			  while($row=mysql_fetch_array($result)){
				   $i++;
				   $id =$row['idproductor'];
				   $idr=$row['idrazonsocial'];
				  	
					$wsql="select * from stenenciatierra where idproductor='$id'";
					$result2=mysql_query($wsql,$link);
					echo mysql_error($link);
					$row2=mysql_fetch_array($result2);
					$idm=$row2['idmunicipio'];
					$idp=$row2['idparroquia'];
					
				   	// buscar municipio
					$wsql="select * from municipio where idmunicipio='$idm'";
					$result3=mysql_query($wsql,$link);
					echo mysql_error($link);
					$row3=mysql_fetch_array($result3);
					// buscar municipio
					$wsql="select * from parroquia where idparroquia='$idp'";
					$result4=mysql_query($wsql,$link);
					echo mysql_error($link);
					$row4=mysql_fetch_array($result4);
					// buscar razon social
					$wsql="select * from razonsocial where idrazonsocial='$idr'";
					$result5=mysql_query($wsql,$link);
					echo mysql_error($link);
					$row5=mysql_fetch_array($result5);
					
					// buscar registro agrario
					$wsql="select * from sregistroagrario where idproductor='$id'";
					$result6=mysql_query($wsql,$link);
					echo mysql_error($link);
					$row6=mysql_fetch_array($result6);
				  





			$pdf->Cell(10,5,$i,1,0,'C');
			$pdf->Cell(45,5,utf8_encode($row3['nombre']),1,0,'L');
			$pdf->Cell(45,5,utf8_encode($row4['nombre']),1,0,'L');
			$pdf->Cell(73,5,utf8_encode(strtoupper($row['nombre'])."  ".strtoupper($row['apellido'])),1,0,'L');
			$pdf->Cell(20,5,$row['cedula'],1,0,'C');
			$pdf->Cell(33,5,utf8_encode(strtoupper($row5['nombre'])),1,0,'L');
			$pdf->Cell(25,5,number_format($row6['superficieexplotadasd'],0,',','.'),1,0,'R');
			$pdf->Cell(25,5,number_format($row6['superficieexplotadasi'],0,',','.'),1,1,'R');
	
	
			  }
			  $pdf->Cell(276,5,'Total Productores : '.$i,1,1,'C');
$pdf->Output();

?>
