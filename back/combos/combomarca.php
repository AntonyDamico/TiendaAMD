<?php
	$wsqli="select * from marcas order by nombre"; //la variable se llama cursor (WorkingSQLI)
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);//Mostrar error si hay alguno
		while($row = $result->fetch_array()){
			$idmarcacombo = $row['idmarca'];
		?>
		
		<option value="<?php echo $idmarcacombo?>" <?php if($idmarcacombo == $idmarca) echo "selected" ?> ><?php echo $row['nombre']?></option>
		
<?php
		}
?>