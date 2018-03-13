<?php 
	session_start(); //inicia una sesión
	require_once("../../config/conexi.php"); //llama a la base de datos, el .. es para ir atras en una carpeta
//variables locales
	$id 		= $_POST['id'];
	$estatus 	= $_POST['estatus'];
	$nombre 	= mysqli_real_escape_string($linki, $_POST['nombre']); //la instruccion verde es para evitar la inyeccion de datos
		
	$wsqli = "update ubicacion set idestatus = '$estatus', nombre = '$nombre' where idubicacion = '$id' ";
	$linki->query($wsqli);
	if($linki->errno) die($linki->error);
	$_SESSION['tm']=1; //Variable de sesion
	$_SESSION['mensaje']="La ubicacion <b>".$nombre."</b> se actualizó con exito.";
	
	
	$url = "location:../../sistema.php?pag=ubicacion";
	header($url);
?>