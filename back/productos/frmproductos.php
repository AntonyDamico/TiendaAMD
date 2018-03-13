		<?php
			$titulo 	= "Agregar Producto";
			$boton  	= "Guardar";
			$destino	= "guardar.php";
			
			$id 			= "";
			$idestatus 		= "";
			$idcategoria 	= "";
			$idmarca 		= "";
			$tipoproducto 	= "";
			$nombre 		= "";
			$cantidad 		= "";
			$precio			= "";
			$descripcion	= "";
			
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				
				$wsqli = "select * from productos where idproducto = '$id' ";
				$result = $linki->query($wsqli);
				if($linki->errno) die($linki->error);//Mostrar error si hay alguno
				
				if($row = $result->fetch_array()){
					$titulo		= "Modificar Prodcuto";
					$boton 		= "Actualizar";
					$destino 	= "actualizar.php";
					
					$idestatus 		= $row['idestatus'];
					$idcategoria 	= $row['idcategoria'];
					$idmarca 		= $row['idmarca'];
					$tipoproducto 	= $row['idtipoproducto'];
					$nombre 		= $row['nombre'];
					$cantidad 		= $row['cantidad'];
					$precio			= $row['precio'];
					$descripcion 	= $row['descripcion'];	
					
				}
			}
		
		?>
		<div class="col-md-6 col-md-offset-3"> <!--ingreso de datos-->
			<form method="post" action="back/productos/<?php echo $destino ?>" class="form-horizontal">
				<input type = "hidden" name="id" value="<?php echo $id ?>"/>
				<div class="panel panel-primary text-center">
					<div class="panel-heading">
						<h4><?php echo $titulo ?></h4>
					</div>
					<div class="panel-body"> <!--parte principal del panel-->
					
						<div class="form-group"><!--Primer form-->
							<label class="control-label col-md-2" for="estatus">Estatus</label> <!--Primer box-->
							<div class="col-md-7 col-md-offset-2"> <!--Selección de opciones-->
								<select class="form-control" id="estatus" name="estatus" required>
									<option value="">Seleccione una opción</option>
									<?php include("back/combos/comboestatus.php") ?> <!--Combo -->
								</select>
							</div>
						</div> <!--fin del primer form-->
						
						<div class="form-group"><!--Segundo form-->
							<label class="control-label col-md-2" for="categoria">Categoria</label> <!--Primer box-->
							<div class="col-md-7 col-md-offset-2"> <!--Selección de opciones-->
								<select class="form-control" id="categoria" name="categoria" required>
									<option value="">Seleccione una categoria</option>
									<?php include("back/combos/combocategoria.php") ?> <!--Combo -->
								</select>
							</div>
						</div> <!--fin del segundo form-->
						
						<div class="form-group"><!--Tercer form-->
							<label class="control-label col-md-2" for="marca">Marca</label> <!--Primer box-->
							<div class="col-md-7 col-md-offset-2"> <!--Selección de opciones-->
								<select class="form-control" id="marca" name="marca" required>
									<option value="">Seleccione una marca</option>
									<?php include("back/combos/combomarca.php") ?> <!--Combo -->
								</select>
							</div>
						</div> <!--fin del Tercer form-->
						
						<div class="form-group"><!--Tercer form-->
							<label class="control-label col-md-2" for="tipoproducto">Tipo</label> <!--Primer box-->
							<div class="col-md-7 col-md-offset-2"> <!--Selección de opciones-->
								<select class="form-control" id="tipoproducto" name="tipoproducto" required>
									<option value="">Seleccione un tipo</option>
									<?php include("back/combos/combotipoproducto.php"); ?> <!--Combo -->
								</select>
							</div>
						</div> <!--fin del Tercer form-->
						
						<div class="form-group"><!--Cuarto form-->
							<label class="control-label col-md-2" for="nombre">Nombre</label>
							<div class="col-md-7 col-md-offset-2">
								<input type="text" class="form-control" id="nombre" placeholder="Indique el nombre" name="nombre" value="<?php echo $nombre ?>" required>
							</div>
						</div><!--fin del cuarto form-->
						
						<div class="form-group"><!--Quinto form-->
							<label class="control-label col-md-2" for="cantidad">Cantidad</label>
							<div class="col-md-7 col-md-offset-2">
								<input type="number" class="form-control" id="cantidad" placeholder="Indique la cantidad" name="cantidad" value="<?php echo $cantidad ?>" required>
							</div>
						</div><!--fin del quinto form-->
						
						<div class="form-group"><!--Sexto form-->
							<label class="control-label col-md-2" for="precio">Precio</label>
							<div class="col-md-7 col-md-offset-2">
								<input type="number" class="form-control" id="precio" placeholder="Indique el precio por unidad" name="precio" value="<?php echo $precio ?>" required>
							</div>
						</div><!--fin del sexto form-->
						
						
						
						<div class="form-group"><!--Septimo form-->
							<label class="control-label col-md-2" for="descripcion">Descripción</label>
							<div class="col-md-7 col-md-offset-2">
								<textarea class="form-control" id="descripcion" placeholder="Indique la descripcion" name="descripcion" rows="8" value="<?php echo $descripcion ?>" required></textarea>
							</div>
						</div><!--fin del septimo form-->
						<?php require_once('back/mensaje.php');?>
					</div>
					<div class="panel-footer">
						<input type="submit" class="btn btn-primary" value="<?php echo $boton ?>"> <!--botón grabar-->
						
						<?php 
							if(isset($_GET['id'])){ 
								echo '<a href="sistema.php?pag=categorias" class="btn btn-default">Regresar</a>';	
						 	} else {
								echo '<input type="reset" class="btn btn-default" value="Cancelar"><!--botón cancelar-->';
						 	} 
						?>
				
					</div>
				</div>
				
				
			</form>
		</div> <!--fin de ingreso de datos-->
		
		<div class="col-md-10 col-md-offset-1"> <!--Ver datos-->
			<h3 class="text-center">Listado de Productos</h3>
			<table class="table table-bordered table-striped table-hover" id="datatableplugin">
				<thead>
					<tr class="text-center bg-primary">
						<td>Codigo</td>
						<td>Estatus</td>
						<td>Usuario</td>
						<td>Categoria</td>
						<td>Marca</td>
						<td>Nombre</td>
						<td>Cantidad</td>
						<td>Precio (BsF.)</td>
						<td>Tipo</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
				<?php
					$filtro = "";
					
					if($_SESSION['tipo'] == 3){
						 $filtro = "where productos.idusuario = '".$_SESSION['îdusuario']."'";
					}
					
					$wsqli="SELECT idproducto, estatus.nombre as estatus, usuarios.nombre as usuario, categorias.nombre as categoria, marcas.nombre as marca, productos.nombre as nombre, cantidad, precio, tipoproducto.nombre as tipoproducto from productos 
					inner join estatus on productos.idestatus = estatus.idestatus
					inner join usuarios on productos.idusuario = usuarios.idusuario
					inner join categorias on productos.idcategoria = categorias.idcategoria
					inner join marcas on productos.idmarca = marcas.idmarca
					inner join tipoproducto on productos.idtipoproducto = tipoproducto.idtipoproducto
					$filtro
					order by idproducto"; //la variable se llama cursor (WorkingSQLI)
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);//Mostrar error si hay alguno
					while($row = $result->fetch_array()){
						$id = $row['idproducto'];
						$n = $row['nombre'];
				?>
					<tr class="text-center">
						<td><?php echo $row['idproducto'] ?></td>
						<td><?php echo $row['estatus'] ?></td>
						<td><?php echo $row['usuario'] ?></td>
						<td><?php echo $row['categoria']?></td>
						<td><?php echo $row['marca']?></td>
						<td><?php echo $row['nombre'] ?></td>
						<td><?php echo $row['cantidad'] ?></td>
						<td><?php echo number_format($row['precio'],2,',','.')?></td>
						<td><?php echo $row['tipoproducto'] ?></td>
						<td>
							<a href="sistema.php?pag=productos&id=<?php echo $id ?>" class="btn btn-primary btn-xs btn-block"><span class="glyphicon glyphicon-edit"> Modificar</span></a>
							<a class="btn btn-danger btn-xs eliminar_dato"  title="<?php echo '<center>Seguro que desea eliminar este registro:<br><p><b>'.$n.'</b></p><center>' ?>" href="back/productos/eliminar.php?id=<?php echo $id ?>"><span class="glyphicon glyphicon-trash"> Eliminar</span></a> 
						</td>
					</tr>
				<?php 
					} 
				?>
				</tbody>
			</table>
		</div> <!--fin de ver datos-->