<?php
	class funciones_consultas{
		function escapaSQL($cadena){
			$cadena = str_replace("DROP","",$cadena);
			$cadena = str_replace("ALTER","",$cadena);
			$cadena = htmlspecialchars($cadena);
			//$cadena = mysql_real_escape_string($cadena);
			return $cadena;
		}
	}
	
	$obj = new funciones_consultas();
?>