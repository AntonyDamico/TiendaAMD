<?php
	$wsqli="select * from estatus"; //la variable se llama cursor (WorkingSQLI)
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);//Mostrar error si hay alguno
	while($row = $result->fetch_array()){
		$idestatuscombo = $row['idestatus'];
	?>
		
		<option value="<?php echo $idestatuscombo ?>" <?php if($idestatus == $idestatuscombo) echo "selected" ?>><?php echo $row['nombre']?></option>
		
<?php
		}
?>




