<div class="col-md-3 col-sm-12 well well-sm"> <!--logo-->
	<img class="img-responsive" src="img/Logo-CM.png">
</div>
		
<div class="col-md-4 col-md-offset-5 well text-center margenArriba"> <!--Botones-->


	<a data-toggle="modal" href="#entrar" class="btn btn-primary">Entrar</a>
	<a href="#" class="btn btn-default">Registrarse</a>
	<br>
	<br>
	<b>
	<?php
		if(isset($_SESSION['noexiste'])){
			echo $_SESSION['noexiste'];
			unset($_SESSION['noexiste']);
		}
		
	?>
	</b>
	
</div>