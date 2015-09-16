<?php 
include("opciones/conexion.php");
					
$monto=("340000");
						
					include("opciones/conexion_estado_cuenta.php");
					$b = mysql_query ("SELECT * FROM `cotizador` WHERE `edad_tarifa` ='23' AND `duracion_seguro` ='8'  ",$conexSC);
					while($v=mysql_fetch_assoc($b))	
					{
					  echo $tasa_hipo2=$v['tasa/1000']; 
					 
					}

						
						//echo ('-'),$anioc; 
						//echo ('-'),$aaaaN; 
						//echo ('-'),$edad; 
						//echo ('-'),$tasa_hipo2;
						
						
						
						
					/*----------------------- cotizador --------------------------------------------*/
					$tasa_hipo1=("0.00174"); /*esta tasa esta administrate por menrcantil seguros */
					
					
					
					 $t=(($monto*$tasa_hipo2)/100)*100;
					
					
					
					$p1=($monto*$tasa_hipo1);
					$p2=($monto*$tasa_hipo2);
					$cuota_seguro=$p1+$p2;
?>