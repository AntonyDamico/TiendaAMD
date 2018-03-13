<div class="panel panel-primary "> <!--Primer panel-->
	<div class="panel-heading text-center">
		<p>Marcas</p>
	</div>
				
	<div> <!--Categorias-->
		
		<?php
			$limiteM = "limit 0,8";
			if(isset($_GET['vtm'])) $limiteM="";
			$wsqli="SELECT marcas.idmarca, marcas.nombre, count(*) as Total
					from productos
					inner join marcas
					on productos.idmarca = marcas.idmarca
					group by productos.idmarca
					ORDER BY marcas.nombre
					$limiteM"; //la variable se llama cursor (WorkingSQLI)
							  // el limit hace que solo aparezcan 10 
			$result = $linki->query($wsqli);
			if($linki->errno) die($linki->error);//Mostrar error si hay alguno
			while($row = $result->fetch_array()){
				$idMar = $row['idmarca'];
		?>

		<a href="index.php?idMar=<?php echo $idMar ?>" class="list-group-item"><span class="badge"><?php echo $row['Total'] ?></span><?php echo $row['nombre'] ?></a>
		
		<?php 
			}
		?>


	</div>
				
	<div class="panel-footer text-center"> <!--footer-->
		<a href="index.php?vtm=1" class="btn btn-xs btn-primary">Ver Todos</a> <!--vtm: ver todas las marcas-->
		<a href="index.php" class="btn btn-xs btn-default">Ver menos</a>
	</div>
</div>