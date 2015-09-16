<?session_start();

		
	//$conexproductos		
			
 $CI;
$codigo;	
$_SESSION["cedula2"];



if($CI){$_SESSION["cedula_socio"]=$CI; $_SESSION["cod_Producto"]=$codigo; $cedula_socio=$CI;  $cod_Producto=$codigo; } else { $cedula_socio=$_SESSION["cedula_socio"]; $cod_Producto=$_SESSION["cod_Producto"];  }
			
			
		include("opciones/conexion_producto.php");	
			
			//echo $cedula_socio;
			//echo $cod_Producto;

			
		$resultados = mysql_query("SELECT max(cod_solicitud) as soli FROM  `solicitud`  where cod_producto='$cod_Producto' and cedula='$cedula_socio' ",$conex);	
			 
				while ($pacientes = mysql_fetch_array($resultados)) {
				
				 $cod_solicitud=$pacientes["soli"]; 
				
				}	
			
$consulta=mysql_query("DELETE FROM solicitud where cod_solicitud='$cod_solicitud' and cedula='$cedula_socio' ",$conex);
			
	
	




					

				$resultados = mysql_query("SELECT * FROM  `productosn`  where cod_producto='$cod_Producto'  ",$conex);	
			 
				while ($pacientes = mysql_fetch_array($resultados)) {
				
				  $cantidad=$pacientes["cantidad_act"]; 
				
											}	
					// $cantidad ,("-"), $total_cantidad,("="),$totla;												
					 
					 
					 $totla1=$cantidad+1;
					 
			$resultados = mysql_query("UPDATE  productosn SET  cantidad_act='$totla1' WHERE  cod_producto='$cod_Producto'   ",$conex);	
			 											
				
				
				
						if($consulta){
								echo "<script type='text/javascript'> document.location.href = ('Solicitud_Productos_N.php'); </script>";
								}
						else	{
								//echo "<script type='text/javascript'> alert('Lo sentimos el registro  de sus datos no son  validos  '); document.location.href = ('inicio.php'); </script>";
								}
			
			
				
				
?>
</table>