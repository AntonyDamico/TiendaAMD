<?php
	$wsqli="select * from ubicacion order by nombre"; //la variable se llama cursor (WorkingSQLI)
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);//Mostrar error si hay alguno
		while($row = $result->fetch_array()){
			$idubicacion = $row['idubicacion'];
		?>
		
		<option value="<?php echo $idubicacion?>"><?php echo $row['nombre']?></option>
		
<?php
		}
?>