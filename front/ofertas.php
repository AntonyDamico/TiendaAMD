<div class="panel panel-primary text-center"> 
			<div class="panel-heading">
				<h4>Ofertas</h4>
			</div>
			<div class="panel-body">
			
			<?php
				$wsqli = "SELECT * FROM productos WHERE idtipoproducto=2 ORDER BY rand() limit 0,6";
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
			
				<div class="col-md-2 col-sm-4 col-xs-6">
					<div class="panel panel-primary text center"> <!--Primer panel-->
						<div class="panel-body"> <!--Categorias-->
							<img class="img-responsive" src="img/imgproductos/f<?php echo $idf;?>.jpg">
						</div>

						<div class="text-center"> <!--footer-->
							<a href="index.php?idp=<?php echo $id ?>" class="btn btn-primary btn-block">Detalles</a>
							<a href="#" class="btn btn-default btn-block">Comprar</a>
						</div>
					</div>
				</div>
			<?php
					}
			?>
				
			</div>
	</div>