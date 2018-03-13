		<div class="col-md-6 col-md-offset-3"> <!--ingreso de datos-->
			<form class="form-horizontal">
				<div class="panel panel-primary text-center">
					<div class="panel-heading">
						<h4>Operadores</h4>
					</div>
					<div class="panel-body"> <!--parte principal del panel-->
						<div class="form-group"><!--Primer form-->
							<label class="control-label col-md-2" for="estatus">Estatus</label>
							<div class="col-md-7 col-md-offset-2">
								<select class="form-control" id="estatus" name="estatus">
									<option value="">Seleccione una opción</option>
									<?php include("back/combos/comboestatus.php") ?> <!--Combo -->
								</select>
							</div>
						</div> <!--fin del primer form-->
						<div class="form-group"><!--Segundo form-->
							<label class="control-label col-md-2" for="nombre">Nombre</label>
							<div class="col-md-7 col-md-offset-2">
								<input type="text" class="form-control" id="nombre" placeholder="Indique el nombre" name="nombre"></input>
							</div>
						</div><!--fin del segundo form-->
					</div>
					<div class="panel-footer">
						<input type="submit" class="btn btn-primary" value="Grabar">
						<input type="reset" class="btn btn-default" value="Cancelar">
					</div>
				</div>
				
				
			</form>
		</div> <!--fin de ingreso de datos-->
		
		<div class="col-md-10 col-md-offset-1"> <!--Ver datos-->
			<h3 class="text-center">Listado de Operadores</h3>
			<table class="table table-bordered table-striped table-hover"  id="datatableplugin">
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
					$wsqli="SELECT idmarca, estatus.nombre as estatus, marcas.nombre as nombre from marcas
					inner join estatus on marcas.idestatus = estatus.idestatus
					order by marcas.nombre"; //la variable se llama cursor (WorkingSQLI)
					$result = $linki->query($wsqli);
					if($linki->errno) die($linki->error);//Mostrar error si hay alguno
					while($row = $result->fetch_array()){
				?>
					<tr class="text-center">
						<td><?php echo $row['idmarca'] ?></td>
						<td><?php echo $row['estatus'] ?></td>
						<td><?php echo $row['nombre'] ?></td>
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