<?php
	session_start();
	
	if($_SESSION["clave"] != ""){
		unset($_SESSION["id"]);
		unset($_SESSION["nomb"]);
		unset($_SESSION["apel"]);
		unset($_SESSION["usuario"]);
		unset($_SESSION["clave"]);
		unset($_SESSION["status"]);
		unset($_SESSION["nombre_pc"]);
		
		session_destroy();
		echo "<script type='text/javascript'> alert('esta seguro que dese salir del sistema '); document.location.href='../index.php'; </script>";
	}else{
		echo "<script type='text/javascript'> document.location.href='../index.php'; </script>";
	}
?>