<?php 
	session_start(); //inicia una sesión
	require_once("../../config/conexi.php"); //llama a la base de datos, el .. es para ir atras en una carpeta
//variables locales
	$id 			= $_POST['id'];
	$estatus 		= $_POST['estatus'];
	$categoria 		= $_POST['categoria'];
	$marca 			= $_POST['marca'];
	$tipoproducto 	= $_POST['tipoproducto'];
	$nombre 		= mysqli_real_escape_string($linki, $_POST['nombre']); //la instruccion verde es para evitar la inyeccion de datos
	$cantidad 		= mysqli_real_escape_string($linki, $_POST['cantidad']);
	$precio 		= mysqli_real_escape_string($linki, $_POST['precio']);
	$descripcion	= mysqli_real_escape_string($linki, $_POST['descripcion']); 
	$idusuario 		= $_SESSION['îdusuario'];
	$fecha 			= date('Y/m/d');
	
	$wsqli = "update productos set idestatus = '$estatus', idcategoria = '$categoria', idmarca = '$marca', idtipoproducto = '$tipoproducto', nombre = '$nombre', cantidad = '$cantidad', precio = '$precio', descripcion = '$descripcion' where idproducto = '$id' ";

	$linki->query($wsqli);
	if($linki->errno) die($linki->error);
	$_SESSION['tm']=1; //Variable de sesion
	$_SESSION['mensaje']="El producto <b>".$nombre."</b> se actualizó con exito.";

	$url = "location:../../sistema.php?pag=productos";
	header($url);
?>




	