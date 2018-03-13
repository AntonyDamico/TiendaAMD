<?php
require('fpdf.php');

class PDF extends FPDF
{
//Cabecera de página
function Header()
{
	//Logo
	//$this->Image('../img/Logo-CM.png',10,8,33); //El logo no puede ser transparente
	//Arial bold 15
	$this->SetFont('Arial','B',10);
	//Movernos a la derecha
	
	//Título
	$fecha=date('d/m/Y');
	
	$this->Ln(5); //Crea lineas en blanco
	$this->Cell(120);//Crea espacios en blanco
	$this->Cell(70,10,'Fecha : '.$fecha,0,0,'C');//Imprime, los numeros dicen si se quiere que aparezca en un cuadro(0 o 1), avance de linea (0 o 1) y centrado(c), left(l), right(r)
	$this->SetFont('Arial','B',15);
	$this->Ln(15);
	$this->Cell(60);
	$this->Cell(70,10,'Listado de Marcas',0,0,'C');
	//Salto de línea
	$this->Ln(20);
	// enca
	$this->Cell(15);
	$this->SetFont('Arial','B',8); //la pagina tiene 190 de ancho
		$this->SetFont('Arial','B',8); //la pagina tiene 190 de ancho
	$this->Cell(10,5,'Código',1,0,'C');
  	$this->Cell(20,5,'Estatus',1,0,'C');
	$this->Cell(20,5,'Categoria',1,0,'C');
	$this->Cell(20,5,'Marca',1,0,'C');
	$this->Cell(20,5,'Tipo',1,0,'C');
   	$this->Cell(40,5,'Nombre',1,0,'C');
	$this->Cell(10,5,'Cantidad',1,0,'C');
	$this->Cell(20,5,'Precio',1,1,'C');
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


include('../config/conexi.php');
			  
			  	$filtro = "";
					
					//if($_SESSION['tipo'] == 3){
						// $filtro = "where productos.idusuario = '".$_SESSION['îdusuario']."'";
					//}
					
					$wsqli="SELECT idproducto, estatus.nombre as estatus, usuarios.nombre as usuario, categorias.nombre as categoria, marcas.nombre as marca, productos.nombre as nombre, cantidad, precio, tipoproducto.nombre as tipoproducto from productos 
					inner join estatus on productos.idestatus = estatus.idestatus
					inner join usuarios on productos.idusuario = usuarios.idusuario
					inner join categorias on productos.idcategoria = categorias.idcategoria
					inner join marcas on productos.idmarca = marcas.idmarca
					inner join tipoproducto on productos.idtipoproducto = tipoproducto.idtipoproducto
					$filtro
					order by idproducto"; 
				$result = $linki->query($wsqli);
				$i=0;
				if($linki->errno) die($linki->error);
			  	while($row = $result->fetch_array()){
					$pdf->Cell(15);
					$i++;  
					$pdf->Cell(10,5,$row['idproducto'],1,0,'C');
					$pdf->Cell(20,5,$row['estatus'],1,0,'C');
					$pdf->Cell(20,5,$row['categoria'],1,0,'C');
					$pdf->Cell(20,5,$row['marca'],1,0,'C');
					$pdf->Cell(20,5,$row['tipoproducto'],1,0,'C');
					$pdf->Cell(40,5,$row['nombre'],1,0,'C');
					$pdf->Cell(20,5,$row['cantidad'],1,0,'C');
					$pdf->Cell(20,5,$row['precio'],1,1,'C');
					//$pdf->Cell(60,5,utf8_decode($row['direccion']),1,1,'C');
			  }
			  $pdf->Cell(15);
			  $pdf->Cell(160,5,'Total Marcas : '.$i,1,1,'C');
$pdf->Output();

?>
