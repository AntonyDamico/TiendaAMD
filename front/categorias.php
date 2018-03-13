<div class="panel panel-primary "> <!--Primer panel-->
	<div class="panel-heading text-center">
		<p>Categorias</p>
	</div>
				
	<div> <!--Categorias-->
	
		<?php 
			$limiteC = "limit 0,8";
			if(isset($_GET['vtc'])) $limiteC="";
			$wsqli="SELECT categorias.idcategoria, categorias.nombre, count(*) as Total
					from productos
					inner join categorias
					on productos.idcategoria = categorias.idcategoria
					group by productos.idcategoria
					ORDER BY categorias.nombre
					$limiteC"; //la variable se llama cursor (WorkingSQLI)
			$result = $linki->query($wsqli);
			if($linki->errno) die($linki->error);//Mostrar error si hay alguno
			while($row = $result->fetch_array()){
				$idCat = $row['idcategoria'];
		?>
	
		<a href="index.php?idCat=<?php echo $idCat ?>" class="list-group-item"><span class="badge"><?php echo $row['Total'] ?> </span><?php echo $row['nombre']; ?></a>
		
		<?php 
			}
		?>
			
	</div>
				
	<div class="panel-footer text-center"> <!--footer-->
		<a href="index.php?vtc=1" class="btn btn-xs btn-primary">Ver Todos</a> <!--El ? es para agregar un parametro-->
		<a href="index.php" class="btn btn-xs btn-default">Ver menos</a>
	</div>
</div>