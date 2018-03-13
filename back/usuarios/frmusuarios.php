		<?php 
			$idestatus = "";
				
		?>
		
		
		
		<div class="col-md-6 col-md-offset-3"> <!--ingreso de datos-->
			<form method="post" action="back/categorias/guardar.php" class="form-horizontal">
				<div class="panel panel-primary text-center">
					<div class="panel-heading">
						<h4>Usuarios</h4>
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
						<div class="form-group"><!--Primer form-->
							<label class="control-label col-md-2" for="estatus">Tipo</label>
							<div class="col-md-7 col-md-offset-2"> <!--Selección de opciones-->
								<select class="form-control" id="tipousuario" name="tipousuario" required>
									<option value="">Seleccione una opción</option>
									<?php include("back/combos/combotipousuario.php") ?> <!--Combo -->
								</select>
							</div>
						</div> <!--fin del primer form-->
						<div class="form-group"><!--Primer form-->
							<label class="control-label col-md-2" for="estatus">Ubicacion</label>
							<div class="col-md-7 col-md-offset-2"> <!--Selección de opciones-->
								<select class="form-control" id="ubicacion" name="ubicacion" required>
									<option value="">Seleccione una opción</option>
									<?php include("back/combos/comboubicacion.php") ?> <!--Combo -->
								</select>
							</div>
						</div> <!--fin del primer form-->
						<div class="form-group"><!--Segundo form-->
							<label class="control-label col-md-2" for="nombre">Nombre</label>
							<div class="col-md-7 col-md-offset-2">
								<input type="text" class="form-control" id="nombre" placeholder="Indique el nombre" name="nombre" required></input>
							</div>
						</div><!--fin del segundo form-->
						<div class="form-group"><!--Segundo form-->
							<label class="control-label col-md-2" for="apellido">Apellido</label>
							<div class="col-md-7 col-md-offset-2">
								<input type="text" class="form-control" id="apellido" placeholder="Indique el apellido" name="apellido" required></input>
							</div>
						</div><!--fin del segundo form-->
						<div class="form-group"><!--Segundo form-->
							<label class="control-label col-md-2" for="correo">Correo</label>
							<div class="col-md-7 col-md-offset-2">
								<input type="text" class="form-control" id="correo" placeholder="Indique el correo" name="correo" required></input>
							</div>
						</div><!--fin del segundo form-->
						<div class="form-group"><!--Segundo form-->
							<label class="control-label col-md-2" for="telefono">Telefono</label>
							<div class="col-md-7 col-md-offset-2">
								<input type="number" class="form-control" id="telefono" placeholder="Indique el telefono" name="telefono" required></input>
							</div>
						</div><!--fin del segundo form-->
					</div>
					<div class="panel-footer">
						<input type="submit" class="btn btn-primary" value="Grabar"> <!--botón grabar-->
						<input type="reset" class="btn btn-default" value="Cancelar"><!--botón cancelar-->
					</div>
				</div>
				
				
			</form>
		</div> <!--fin de ingreso de datos-->
		
		<div class="col-md-10 col-md-offset-1"> <!--Ver datos-->
			<h3 class="text-center">Listado de Usuarios</h3>
			<table class="table table-bordered table-striped table-hover" id="datatableplugin">
				<thead>
					<tr class="text-center bg-primary">
						<td>Codigo</td>
						<td>Estatus</td>
						<td>Tipo</td>
						<td>Ubicación</td>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Correo</td>
						<td>Teléfono</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
				<?php				
									
					$wsqli="SELECT idusuario, estatus.nombre as estatus, tipousuarios.nombre as tipo, ubicacion.nombre as ubicacion, usuarios.nombre, apellido, correo, telefonos from usuarios 
					inner join estatus on usuarios.idestatus = estatus.idestatus
					inner join tipousuarios on usuarios.idtipousuario = tipousuarios.idtipousuario
					inner join ubicacion on ubicacion.idubicacion = usuarios.idubicacion"; //la variable se llama cursor (WorkingSQLI)
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);//Mostrar error si hay alguno
					while($row = $result->fetch_array()){
				?>
					<tr class="text-center">
						<td><?php echo $row['idusuario'] ?></td>
						<td><?php echo $row['estatus'] ?></td>
						<td><?php echo $row['tipo'] ?></td>
						<td><?php echo $row['ubicacion'] ?></td>
						<td><?php echo $row['nombre'] ?></td>
						<td><?php echo $row['apellido'] ?></td>
						<td><?php echo $row['correo'] ?></td>
						<td><?php echo $row['telefonos'] ?></td>
						<td>
							<a href="#" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"> Modificar</span></a>
							<a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"> Eliminar</span></a>
						</td>
					</tr>
				<?php 
					} 
				?>
				</tbody>
			</table>
		</div> <!--fin de ver datos-->