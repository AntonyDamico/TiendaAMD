<div class="panel panel-primary "> <!--Primer panel-->
	<div class="panel-heading text-center">
		<p>Ubicación</p>
	</div>
				
	<div> <!--Categorias-->
		
		<?php 
			$limiteU = "limit 0,8";
			if(isset($_GET['vtu'])) $limiteU="";
			$wsqli="SELECT ubicacion.idubicacion, ubicacion.nombre, COUNT(*) as Total
					from productos
					INNER JOIN usuarios
					on productos.idusuario = usuarios.idusuario
					INNER JOIN ubicacion
					ON usuarios.idubicacion = ubicacion.idubicacion
					GROUP BY  ubicacion.idubicacion
					ORDER BY ubicacion.nombre
					$limiteU"; //la variable se llama cursor (WorkingSQLI)
			$result = $linki->query($wsqli);
			if($linki->errno) die($linki->error);//Mostrar error si hay alguno
			while($row = $result->fetch_array()){
				$idUb = $row['idubicacion'];
		?>

		<a href="index.php?idUb=<?php echo $idUb ?>" class="list-group-item"><span class="badge"><?php echo $row['Total'] ?></span><?php echo $row['nombre'] ?></a>
		
		<?php 
			}
		?>

	</div>
				
	<div class="panel-footer text-center"> <!--footer-->
		<a href="index.php?vtu=1" class="btn btn-xs btn-primary">Ver Todos</a> 
		<a href="index.php" class="btn btn-xs btn-default">Ver menos</a>
	</div>
</div>