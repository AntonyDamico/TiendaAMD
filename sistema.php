<?php 
	session_start();
		
	if(!isset($_SESSION['îdusuario'])){
		header("location:index.php");
	}
;?>
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
<!--datatables-->
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
<!--Plugin de alertas-->
<link rel="stylesheet" type="text/css" href="css/jquery.alerts.css"/>
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
		<?php include("back/encabezado.php"); ?>
	</header> <!--Fin del encabezado-->

	<nav class="row"> <!--menú-->
		<?php 
			if($_SESSION['tipo']==1)include ('back/menuAdministrador.php');
            if($_SESSION['tipo']==2)include ('back/menuOperador.php');
            if($_SESSION['tipo']==3)include ('back/menuVendedor.php'); 
		?>
	</nav> <!--Fin del menú-->

	<div class="row"> <!--Parte principal-->
		
		<?php 
			if(isset($_GET['pag'])){
				$pag = $_GET['pag'];
				if($pag == "marcas"){
					include("back/marcas/frmmarcas.php");
				} elseif($pag == "categorias") {
					include("back/categorias/frmcategorias.php");
				} elseif($pag == "ubicacion"){
					include("back/ubicacion/frmubicacion.php");
				} elseif($pag == "tipoproducto"){
					include("back/tipoproducto/frmtipoproducto.php");
				} elseif($pag == "productos"){
					include("back/productos/frmproductos.php");
				} elseif($pag == "usuarios"){
					include("back/usuarios/frmusuarios.php");
				}
			}
		?>
		
	</div> <!--fin de la parte principal-->

	

</div> <!--Fin del body-->
	




<!--fin de la pagina-->


<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>

<script type="text/javascript" src="js/jquery.alerts.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $("a.eliminar_dato").click( function(e) {
            e.preventDefault();
            var url = this.href;
            var titulo = this.title;
            jConfirm(titulo,'Accion !!', function(r) {
                if (r) 
                    location.href = url;
                });
            });
    
    
    });
    </script>








<!-- jQuery--> 
<script src="js/jquery-1.11.2.min.js"></script>


<!-- Bootstrap javascript--> 
<script src="js/bootstrap.js"></script>


<!--llamados y script de datatables plugin-->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>


<script>
$(document).ready(function(){
    $('#datatableplugin').DataTable();
});
</script>






<?php include("config/cerrarconexi.php");?> <!--Cerrar con php-->
</body>
</html>