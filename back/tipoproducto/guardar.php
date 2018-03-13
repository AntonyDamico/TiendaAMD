<?php 
	session_start(); //inicia una sesión
	require_once("../../config/conexi.php"); //llama a la base de datos, el .. es para ir atras en una carpeta
//variables locales
	$estatus = $_POST['estatus'];
	$nombre = mysqli_real_escape_string($linki, $_POST['nombre']); //la instruccion verde es para evitar la inyeccion de datos
	
	$wsqli="select * from tipoproducto where nombre = '$nombre' "; //la variable se llama cursor (WorkingSQLI)
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);//Mostrar error si hay alguno
	$row = $result->fetch_array();
	if($row > 0){
		$_SESSION['tm']=0; //Variable de sesion
		$_SESSION['mensaje']="El tipo de producto <b>".$nombre."</b> ya existe.";
	} else {
		
		$wsqli = "insert into tipoproducto (idestatus, nombre) values('$estatus', '$nombre')";
		$linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['tm']=1; //Variable de sesion
		$_SESSION['mensaje']="El tipo de producto <b>".$nombre."</b> se registró con exito.";
	}
	
	$url = "location:../../sistema.php?pag=tipoproducto";
	header($url);
?>