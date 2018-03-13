<div class="panel panel-primary "> <!--Primer panel-->
	
	<?php	
		$wsqli = "SELECT * FROM productos 
				WHERE idtipoproducto=3 
				order by rand() limit 0,1";
			$result = $linki->query($wsqli);
			if($linki->errno) die($linki->error);//Mostrar error si hay alguno
			while($row = $result->fetch_array()){
				$id = $row['idproducto'];
				$wsqli = "SELECT * FROM rproductofoto where idproducto = '$id' limit 0,1";
				$result2 = $linki->query($wsqli);
				if($linki->errno) die($linki->error);//Mostrar error si hay alguno
				$idf = 0;
				if($row2 = $result2->fetch_array()){
					$idf = $row2['idproductofoto'];
				}
				
	?>		
	
	<div class="panel-heading text-center">
		<p>Liquidación: <?php echo $row['nombre']; ?></p>
	</div>											
	<div class="panel-body"> <!--Categorias-->
		<img class="img-responsive" src="img/imgproductos/f<?php echo $idf;?>.jpg">
	</div>
				
	<?php
			}
	?>
	
	<div class="text-center"> <!--footer-->
		<a href="index.php?idp=<?php echo $id ?>" class="btn btn-danger btn-block esquinasCuadradas">Ver Detalles</a>
	</div>
</div>