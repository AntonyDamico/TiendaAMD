<?php
	$wsqli="select * from tipoproducto "; //la variable se llama cursor (WorkingSQLI)
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);//Mostrar error si hay alguno
		while($row = $result->fetch_array()){
			$tipoproductocombo = $row['idtipoproducto'];
		?>
		
		<option value="<?php echo $tipoproductocombo?>" <?php if($tipoproductocombo == $tipoproducto) echo "selected" ?> </option><?php echo $row['nombre']?></option>
		
<?php
		}
?>