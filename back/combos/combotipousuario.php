<?php
	$wsqli="select * from tipousuarios"; //la variable se llama cursor (WorkingSQLI)
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);//Mostrar error si hay alguno
		while($row = $result->fetch_array()){
			$idtipousuario = $row['idtipousuario'];
		?>
		
		<option value="<?php echo $idtipousuario?>"><?php echo $row['nombre']?></option>
		
<?php
		}
?>