<?php
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
	$this->SetFont('Arial','B',15);
	$this->Ln(15);
	$this->Cell(110);
	$this->Cell(70,10,'SOLICITUD DE APOYO TECNICO',0,0,'C');
	//Salto de línea
	$this->Ln(15);
	// enca
	$this->SetFont('Arial','B',6);
	$this->Cell(10,5,'NUM.',1,0,'C');
  	$this->Cell(35,5,'MUNICIPIO',1,0,'C');
   	$this->Cell(35,5,'PARROQUIA',1,0,'C');
    $this->Cell(63,5,'PRODUCTORES',1,0,'C');
	$this->Cell(30,5,'ESTATUS DEL TRAMITE',1,0,'C');
	$this->Cell(70,5,' DEBILIDADES PARA LA PRODUCCION ',1,0,'C');
	$this->Cell(33,5,'SPERSONAS QUE ASISTIRAN',1,1,'C');

	

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
$pdf->SetFont('Times','',6);

include('../conex.php');
			  
			  	// para el paginador
				

			  $wsql="SELECT * FROM apoyotecnico inner join productor on apoyotecnico.idproductor=productor.idproductor inner join scartaproductor on scartaproductor.idproductor=productor.idproductor";
			  $result=mysql_query($wsql,$link);
			  $i=0;
			  while($row=mysql_fetch_array($result)){
				   $i++;
				   $id =$row['idproductor'];
				   $idr=$row['idrazonsocial'];
				   $ide=$row['idestatus'];
				   $superficiasembrar=$row['cantidad'];							
						
	
				  	
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
					$perdida=$row6['superficieexplotadasi']-$superficiasembrar;
					
					// buscar estatus
					$wsql="select * from estatus where idestatus='$ide'";
					$result7=mysql_query($wsql,$link);
					echo mysql_error($link);
					$row7=mysql_fetch_array($result7);
					
					
				  





			$pdf->Cell(10,5,$i,1,0,'C');
			$pdf->Cell(35,5,utf8_encode($row3['nombre']),1,0,'L');
			$pdf->Cell(35,5,utf8_encode($row4['nombre']),1,0,'L');
			$pdf->Cell(63,5,utf8_encode(strtoupper($row['nombre'])."  ".strtoupper($row['apellido'])),1,0,'L');
			$pdf->Cell(30,5,utf8_encode(strtoupper($row7['ncorto'])),1,0,'L');
			$pdf->Cell(70,5,utf8_encode($row['debilidades']),1,0,'L');
			$pdf->Cell(33,5,$row['personas'],1,1,'C');
	
	
	
			  }
			  $pdf->Cell(276,5,'Total Productores : '.$i,1,1,'C');
$pdf->Output();

?>
