<?php 
	session_start(); //inicia una sesión
	require_once("../../config/conexi.php"); //llama a la base de datos, el .. es para ir atras en una carpeta
//variables locales
	$estatus 		= $_POST['estatus'];
	$categoria 		= $_POST['categoria'];
	$marca 			= $_POST['marca'];
	$tipoproducto 	= $_POST['tipoproducto'];
	$nombre 		= mysqli_real_escape_string($linki, $_POST['nombre']); //la instruccion verde es para evitar la inyeccion de datos
	$cantidad 		= mysqli_real_escape_string($linki, $_POST['cantidad']);
	$precio 		= mysqli_real_escape_string($linki, $_POST['precio']);
	$descripcion 	= mysqli_real_escape_string($linki, $_POST['descripcion']); 
	$idusuario	 	= $_SESSION['îdusuario'];
	$fecha 			= date('Y/m/d');


	$wsqli = "select * from productos where nombre = '$nombre' "; 

	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);//Mostrar error si hay alguno
	$row = $result->fetch_array();
	if($row > 0){
		$_SESSION['tm']=0; //Variable de sesion
		$_SESSION['mensaje']="El producto <b>".$nombre."</b> ya existe.";
	} else {

		$wsqli = "insert into productos (idestatus, idcategoria, idmarca, idtipoproducto, nombre, cantidad, precio, descripcion, idusuario, fecharegistro) values('$estatus', '$categoria', '$marca', '$tipoproducto', '$nombre', '$cantidad', '$precio', '$descripcion', '$idusuario', '$fecha' )";
		
		$linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['tm']=1; //Variable de sesion
		$_SESSION['mensaje']="El producto<b>".$nombre."</b> se registró con exito.";
	}
	
	$url = "location:../../sistema.php?pag=productos";
	header($url);
?>