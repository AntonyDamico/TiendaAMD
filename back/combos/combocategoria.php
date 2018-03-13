<?php
	$wsqli="select * from categorias order by nombre"; //la variable se llama cursor (WorkingSQLI)
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);//Mostrar error si hay alguno
	while($row = $result->fetch_array()){
		$idcategoriacombo = $row['idcategoria'];
	?>
		
		<option value="<?php echo $idcategoriacombo ?>" <?php if($idcategoria == $idcategoriacombo) echo "selected" ?> ><?php echo $row['nombre'] ?></option>
		
<?php
		}
?>