<?php 
	if(isset($_SESSION['mensaje'])){
		$color = 'text-success';
		if($_SESSION['tm']==0) $color = 'text-danger';
		echo "<h4 class='text-center $color'>".$_SESSION['mensaje']."</h4>";
		unset($_SESSION['mensaje']);
	}
?>