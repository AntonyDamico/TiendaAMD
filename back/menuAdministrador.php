<div class="navbar navbar-default navbar-fixed-top"> <!--Barra de navegación-->
		<div class="navbar-header"> <!--Imágenes para telefonos-->
			<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
               	<span class="icon-bar"></span>
               	<span class="icon-bar"></span>
			</button>
		
			<a href="sistema.php" class="navbar-brand">Tienda online</a> <!--Nombre-->
		</div>
			
		<div id="navbarCollapse" class="collapse navbar-collapse"> <!--Oculta los botones-->
			<ul class="nav navbar-nav"> <!--Elementos de la barra de navegación-->
				<li><a href="back/cerrar.php">Salida</a></li>
       			<li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Tablas <b class="caret"></b>
        			</a>
        			<ul class="dropdown-menu">
          				<li><a href="sistema.php?pag=categorias">Categorias</a></li>
          				<li><a href="sistema.php?pag=marcas">Marcas</a></li>
						<li><a href="sistema.php?pag=ubicacion">Ubicacion</a></li>
      			   		<li><a href="sistema.php?pag=tipoproducto">Tipo de producto</a></li>
       			   </ul>
      			</li>

				<li><a href="sistema.php?pag=productos">Productos</a></li>
				<li><a href="#">Operadores</a></li>
				<li><a href="sistema.php?pag=usuarios">Usuarios</a></li>
				<li><a href="#">Herramientas</a></li>
			</ul>
				
		</div> 
	</div><!--Fin de la barra de navegaciòn-->