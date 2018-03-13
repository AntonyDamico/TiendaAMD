<?php 
session_start();

	if(isset($_POST['correo']) and isset($_POST['clave']) and
		!empty($_POST['correo']) and !empty($_POST['clave'])){

			include("../config/conexi.php");
		
			$correo=mysqli_real_escape_string($linki, $_POST['correo']);
			$clave=mysqli_real_escape_string($linki, $_POST['clave']);
			$wsqli="select * from usuarios where correo='$correo' and clave='$clave'";
			$result = $linki->query($wsqli);
		
			if($linki->errno) die($linki->error);
			if($row = $result->fetch_array()){
			
				
			
				$_SESSION['Bienvenida']="<b>Bienvenido</b><br/>".$row['nombre'];
				$_SESSION['îdusuario']=$row['idusuario'];
				$_SESSION['tipo']=$row['idtipousuario'];
				$url="location:../sistema.php";
			

			}else{

			
				$_SESSION['noexiste']="Usuario o Contraseña invalido";
				unset($_SESSION['Bienvenida']);
				unset($_SESSION['îdusuario']);
				unset($_SESSION['tipo']);
				$url="location:../index.php";

			}			

	}else{

	$url=("location:../index.php");

}

header($url);

?>