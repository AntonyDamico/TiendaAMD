		<?php 
			$titulo 	= "Agregar Categorias";
			$boton  	= "Guardar";
			$destino	= "guardar.php";
			
			$id 		= "";
			$idestatus 	= "";
			$nombre 	= "";
			
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				
				$wsqli = "select * from categorias where idcategoria = '$id' ";
				$result = $linki->query($wsqli);
				if($linki->errno) die($linki->error);//Mostrar error si hay alguno
				
				if($row = $result->fetch_array()){
					$titulo		= "Modificar Categoria";
					$boton 		= "Actualizar";
					$destino 	= "actualizar.php";
					$nombre 	= $row['nombre'];
					$idestatus 	= $row['idestatus'];
				}
			}
		?>
		<div class="col-md-6 col-md-offset-3"> <!--ingreso de datos-->
			<form method="post" action="back/categorias/<?php echo $destino ?>" class="form-horizontal">
				<input type = "hidden" name="id" value="<?php echo $id ?>"/>
				<div class="panel panel-primary text-center">
					<div class="panel-heading">
						<h4><?php echo $titulo ?></h4>
					</div>
					<div class="panel-body"> <!--parte principal del panel-->
						<div class="form-group"><!--Primer form-->
							<label class="control-label col-md-2" for="estatus">Estatus</label>
							<div class="col-md-7 col-md-offset-2"> <!--Selección de opciones-->
								<select class="form-control" id="estatus" name="estatus" required>
									<option value="">Seleccione una opción</option>
									<?php include("back/combos/comboestatus.php") ?> <!--Combo -->
								</select>
							</div>
						</div> <!--fin del primer form-->
						<div class="form-group"><!--Segundo form-->
							<label class="control-label col-md-2" for="nombre">Nombre</label>
							<div class="col-md-7 col-md-offset-2">
								<input type="text" class="form-control" id="nombre" placeholder="Indique el nombre" name="nombre" value="<?php echo $nombre ?>" required></input>
							</div>
						</div><!--fin del segundo form-->
						<?php require_once('back/mensaje.php'); ?>
					</div>
					<div class="panel-footer">
						<input type="submit" class="btn btn-primary" value="<?php echo $boton ?>"> <!--botón grabar o modificar-->
						
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
			<h3 class="text-center">Listado de Categorias</h3>
			<table class="table table-bordered table-striped table-hover" id="datatableplugin">
				<thead>
					<tr class="text-center bg-primary">
						<td>Codigo</td>
						<td>Estatus</td>
						<td>Nombre</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
				<?php
					$wsqli="SELECT idcategoria, estatus.nombre as estatus, categorias.nombre as nombre from categorias
					inner join estatus on categorias.idestatus = estatus.idestatus
					order by categorias.nombre"; //la variable se llama cursor (WorkingSQLI)
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);//Mostrar error si hay alguno
					while($row = $result->fetch_array()){
						$id = $row['idcategoria'];
						$n = $row['nombre'];
				?>
					<tr class="text-center">
						<td><?php echo $row['idcategoria'] ?></td>
						<td><?php echo $row['estatus'] ?></td>
						<td><?php echo $row['nombre'] ?></td>
						<td>
							<a href="sistema.php?pag=categorias&id=<?php echo $id?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"> Modificar</span></a>
							<!--<a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"> Eliminar</span></a>-->
							<a class="btn btn-danger btn-xs eliminar_dato"  title="<?php echo '<center>Seguro que desea eliminar este registro:<br><p><b>'.$n.'</b></p><center>' ?>" href="back/categorias/eliminar.php?id=<?php echo $id ?>"><span class="glyphicon glyphicon-trash"> Eliminar</span></a> 
						</td>
					</tr>
				<?php 
					} 
				?>
				</tbody>
				
				
				
			</table>
			
			<div class="col-md-offset-5">
				<a class="btn btn-primary btn-sm text-center" href="pdfphp/pdfcategorias.php">IMPRIMIR</a>
			</div>
			<br>
		<p>..</p>
		</div> <!--fin de ver datos-->
		