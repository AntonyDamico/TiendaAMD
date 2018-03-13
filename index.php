<?php session_start() ?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<!--titulo-->
<title>Tienda realizada por Antony D'Amico</title>
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<!--CSS-->
<link rel="stylesheet" href="css/estilos.css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php include("config/conexi.php");?> <!--incluir php -->



<div class="container-fluid">
	
	<header class="row"> <!--Encabezado-->
		<?php include("front/encabezado.php"); ?>
	</header> <!--Fin del encabezado-->

	<nav class="row"> <!--menú-->
		<?php include("front/menu.php"); ?>
	</nav> <!--Fin del menú-->


	<div class="row"> <!--Parte principal-->
		
		<div class="col-md-3 hidden-xs "> <!--Parte izquierda-->
			<?php 
				include("front/categorias.php"); 
				include("front/marcas.php");
				include("front/ubicacion.php");
				include("front/liquidacion.php");
			?>
		</div> <!--fin de la parte izquierda-->
		
		<div class="col-md-9"> <!--Parte derecha-->
			<div> <!--Carrousel-->
				<?php
				if(!isset($_GET['idCat']) and !isset($_GET['idMar']) and !isset($_GET['idUb']) and !isset($_GET['idp'])){
					include("front/carousel1.php");
				}
				?>
			</div>
			
			<div> <!--Productos-->
				<?php 
				if(isset($_GET['idp'])){
					include("front/detalle.php");	
				}	
				else{
					include("front/productosP.php");	
				}

				?>
			</div>
			
		</div> <!--Fin de la parte derecha-->
		
	</div> <!--fin de la parte principal-->

	<div > <!--Ofertas-->
		<?php include("front/ofertas.php"); ?>	
	</div>

</div> <!--Fin de la parte principal-->

<div class="well"> <!--Footer de la pagina-->
	
</div>







<div class="modal fade" id="entrar"> 
	<form class="form-horizontal" action="front/validar.php" method="post"> 
		<div class="modal-dialog"> 
			<div class="modal-content"> 
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
					<h4 class="modal-title">Iniciar Sesión </h4> 
				</div>
			<div class="modal-body"> 

				<div class="form-group"> 
					<label for="inputEmail" class="col-sm-2 control-label">Correo</label> 
					<div class="col-sm-10">
						<input type="email" class="form-control" id="inputEmail" placeholder="Email" name="correo" required> 
					</div>
				</div>
				<div class="form-group"> 
					<label for="inputPassword" class="col-sm-2 control-label">Clave</label>   
					<div class="col-sm-10">           
						<input type="password"  class="form-control" id="inputPassword" placeholder="Password" name="clave" required>  
					</div>              
				</div> 

			 </div> 
			 <div class="modal-footer"> 
					<button type="submit" class=" btn btn-primary">Entrar</button> 
				  <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button> 
			 </div> 
			</div> 
		</div>
	</form>   
</div>  






















<!--fin de la pagina-->




<!-- jQuery--> 
<script src="js/jquery-1.11.2.min.js"></script>

<!-- Bootstrap javascript--> 
<script src="js/bootstrap.js"></script>
<?php include("config/cerrarconexi.php");?> <!--Cerrar con php-->
</body>
</html>