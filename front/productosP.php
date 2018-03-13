<div class="panel panel-primary">
				<div class="panel-heading text-center">
					<h3>Productos</h3>
				</div>
				<div class="panel-body"> <!--Productos-->
				
				<?php
					$filtro = "";
					$regresar= "";
					if(isset($_GET['idCat'])){
						$idCat = $_GET['idCat'];
						$filtro = "where idcategoria = '$idCat'";
						$regresar = '<a href="index.php" class="btn">Regresar</a>';
					}
					
					if(isset($_GET['idMar'])){
						$idMar = $_GET['idMar'];
						$filtro = "where idmarca = '$idMar'";
						$regresar = '<a href="index.php" class="btn">Regresar</a>';
					}
					
					if(isset($_GET['idUb'])){
						$idUb = $_GET['idUb'];
						$filtro = "where usuarios.idubicacion = '$idUb'";
					}
					
					$wsqli = "SELECT *, productos.nombre FROM productos
								INNER JOIN usuarios
								on productos.idusuario = usuarios.idusuario
							  $filtro
							  order by rand() limit 0,9";
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
				
					<div class="col-md-4 col-sm-6">
						<div class="panel panel-primary text-center">
							<div class="panel-heading">
								<h5><?php echo substr($row['nombre'],0,20);?></h5>
							</div>
							<div class="panel-body">
								<a href="index.php?idp=<?php echo $id ?>"><img src="img/imgproductos/f<?php echo $idf;?>.jpg" class="img-responsive"></a>
							</div>
							<div class="panel-footer">
								<h5>Bsf.<?php echo number_format($row['precio'],2,',','.');?>
								<!--El number fromat muestra 2 decimales coma y punto para el formato-->
								</h5>
								<a href="index.php?idp=<?php echo $id ?>" class="btn btn-primary">Detalles</a>
								<a href="#" class="btn btn-default">Comprar</a>
							</div>
						</div>
					</div>
					
				<?php
					}
				?>
					
					
				</div>
				<div class="panel-footer text-center">
					<a href="index.php">Paginador</a>
					<?php echo $regresar ?>
				</div>
			</div>