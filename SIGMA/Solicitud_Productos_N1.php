<?session_start();

		
	//$conexproductos		
			
 $CI;
$codigo;	
$_SESSION["cedula2"];
$cod_delegados=$_SESSION["cod_deleg"];


if($CI){$_SESSION["cedula_socio"]=$CI; $_SESSION["cod_Producto"]=$codigo; $cedula_socio=$CI;  $cod_Producto=$codigo; } else { $cedula_socio=$_SESSION["cedula_socio"]; $cod_Producto=$_SESSION["cod_Producto"];  }
			
			
		include("opciones/conexion_producto.php");	
			
			//echo $cedula_socio;
			//echo $cod_Producto;

	
			
				
$consulta=mysql_query("INSERT INTO  solicitud (`cod_producto` ,`cedula`,`cantidad`,`cod_delegados`)VALUES ('$cod_Producto', '$cedula_socio', '1', '$cod_delegados' )",$conex);
				
			




















for ($i=0;$i<17;$i++){
				include("opciones/conexion_producto.php");	
				$resultados = mysql_query("SELECT sum(cantidad) as total_cantidad FROM  `solicitud`  where cod_producto='$i'  ",$conex);	
			 
				while ($pacientes = mysql_fetch_array($resultados)) {
				
				 $total_cantidad=$pacientes["total_cantidad"]; 
				
																	}	

				$resultados = mysql_query("SELECT * FROM  `productosn`  where cod_producto='$i'  ",$conex);	
			 
				while ($pacientes = mysql_fetch_array($resultados)) {
				
				  $cantidad=$pacientes["cantidad"]; 
				
											}	
					// $cantidad ,("-"), $total_cantidad,("="),$totla;												
					 
					 
					 $totla1=$cantidad-$total_cantidad;
					 
					 
				
			
			$resultados = mysql_query("UPDATE  productosn SET  cantidad_act='$totla1' WHERE  cod_producto='$i'   ",$conex);	
			 											
				}






























				
		if($consulta){
								echo "<script type='text/javascript'> document.location.href = ('Solicitud_Productos_N.php'); </script>";
								}
						else	{
								echo "<script type='text/javascript'> alert('Lo sentimos el registro  de sus datos no son  validos  '); document.location.href = ('inicio.php'); </script>";
								}
			
						
				
				
?>