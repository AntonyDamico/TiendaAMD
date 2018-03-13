<?php

	$idProduc = $_GET['idp'];
	
	$wsqli = "SELECT *, productos.nombre as nombreProducto, categorias.nombre as nombreCategoria, marcas.nombre as nombreMarca, ubicacion.nombre as nombreUbicacion, tipoproducto.nombre as nombreTipoproducto, usuarios.nombre as nombreUsuario, usuarios.telefonos as telefono
			from productos 
			inner join categorias on productos.idcategoria = categorias.idcategoria
			inner join marcas on productos.idmarca = marcas.idmarca
			inner join usuarios on productos.idusuario = usuarios.idusuario
			inner join ubicacion on usuarios.idubicacion = ubicacion.idubicacion
			inner join tipoproducto on productos.idtipoproducto = tipoproducto.idtipoproducto
			where idproducto = '$idProduc'";
	$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);//Mostrar error si hay alguno
		if($row = $result->fetch_array()){
			$id = $row['idproducto'];
					$wsqli = "SELECT * FROM rproductofoto where idproducto = '$id' limit 0,1";
					$result2 = $linki->query($wsqli);
					if($linki->errno) die($linki->error);//Mostrar error si hay alguno
					$idf = 0; 
					if($row2 = $result2->fetch_array()){
						$idf = $row2['idproductofoto'];
				}		
			
?>
				

<div class="panel panel-primary">
	<div class="panel-heading text-center">
		<h3>Detalles</h3>
	</div>
	<div class="panel-body">
			<div class="col-md-6">
				<img src="img/imgproductos/f<?php echo $idf?>.jpg" class="img-responsive thumbnail">
			</div>
		<div class="col-md-6">
			<h3 class="titulo"><?php echo $row['nombreProducto']?></h3>
			<b>Categoria: <?php echo $row['nombreCategoria']?></b>
			<br>
			<b>Marca: <?php echo $row['nombreMarca']?></b>
			<br>
			<b>Ubicación: <?php echo $row['nombreUbicacion']?></b>
			<br>
			<b>Tipo de Producto: <?php echo $row['nombreTipoproducto']?></b>
			<br>
			<b>Cantidad: <?php echo $row['cantidad']?></b>
			<br>
			<b>Precio: Bsf <?php echo number_format($row['precio'],2,',','.')?></b>
			<br>
			<b>Vendedor: <?php echo $row['nombreUsuario']?></b>
			<br>
			<b>Telefono: <?php echo $row['telefono']?></b>
			<br>
			<br>
			<a href="#" class="btn btn-default">Comprar</a>
			<a href="index.php" class="btn btn-primary">Regresar</a>
		</div>
	</div>
	<div class="panel-footer">
		<h4>Descripción</h4>
		<p><?php echo $row['descripcion']?></p>
	</div>
</div>

<?php 
	} 
?>
