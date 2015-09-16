<?php
	session_start();
		

	if($_SESSION["usuclave"] == ""){
	session_destroy();
		echo "<script type='text/javascript'> alert('Forma Indebida de entra al sistema '); document.location.href='index.php'; </script>";
	}
?>