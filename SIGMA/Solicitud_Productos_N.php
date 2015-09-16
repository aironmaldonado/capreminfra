<?session_start();
	require_once("opciones/conexion.php");
	include("opciones/seguridad.php");
	
					
					$usunom=$_SESSION["usunom"]; 
					$usuapel=$_SESSION["usuapel"]; 
					$usuusu=$_SESSION["usuusu"]; 
					$nombre_pc=$_SESSION["nombre_pc"];
					$hora=$_SESSION["hora"];
					$fecha=$_SESSION["fecha"];	
					$cedula_socio=$_SESSION["cedula_socio"];	
					$cod_socio=$_SESSION["cod_socio"];
					$id_usu=$_SESSION["usuid"];
	
	
	//Registro_Socios_Direccion.php
	?>
<html>


<head>
			
			 <meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
			<!-- librerias y estilos plantilla Fondo -->
				<link href="Imagen/fondo/SIGMA.ico" type="image/x-icon" rel="shortcut icon" />
              	<link rel="stylesheet" href="CSS/index.css" type="text/css" />
            <!-------------------------------->
            		
			<!-- librerias y estilos de menu-->
			<link rel="stylesheet" href="css/menu_css/menu_izq.css" type="text/css" charset="utf-8"/>
			
			
			<script type="text/javascript" src="JavaScript/evento_permitidos.js"></script>
			<!--------------quitar el escrol ----------------->
			<style type="text/css">  body {overflow-y:hidden; overflow-x:hidden }</style>



</head>

<body>




<script type="text/javascript">
function guardar1(){

		window.open('Reportes/R_Productos_N.php','nuevaVentana','width=300, height=400')

}

	function regresas(){
document.form2.boton2.value="Regresas";
document.location.href = ('inicio.php');
document.form2.href = ('inicio.php'); 
	
}	

</script>
<?


 if($_POST['boton1']=="entrar")
			{
		
					$tipo_prestamos=$_POST["credito"];
					$peso=$_POST["peso"];
					$estatura=$_POST["estatura"];
					$montaval=$_POST["montaval"];
					$vivi=$_POST["vivi"];
					$cedula=$_POST["cedula"];
					$credito=$_SESSION["tipo_prestamo"];
					$cedulaS=$_SESSION["cedulaS"];
					$mancom=$_SESSION["man"];	

					

				

				
			



switch ($mancom) {
		case "mancomunado":
					
					 $credito=$_SESSION["tipo_prestamo"];
					$monto_solicitado=$_POST["mon_solic"];
					$plazo=$_POST["plazo"];
					$obs=$_POST["obs"];
					$dir=$_POST["direccion"];
					$cedulaS;
					$cod_prestamo=$_SESSION["tip_pre"];
					$credito=$_SESSION["tipo_prestamo"];
					$monto_solicitado2=$_POST["mon_solic1"];
					$plazo2=$_POST["plazo1"];
					$cedula2=$_SESSION["cedula2"];
							
				
					include("opciones/conexion_prestamo.php"); 
					$consulta1=mysql_query("INSERT INTO solicitudes (`cod_solicitudes` ,`id_solicitudes` ,`cod_tipo_prestamo` ,`monto_solicitado` ,`monto_avaluo`,`plazo`,`mancomunado`,`observaciones`)
					VALUES (NULL ,'$cedulaS','$cod_prestamo','$monto_solicitado','$montaval','$plazo','$cedula2','$obs'),(NULL ,'$cedula2','$cod_prestamo','$monto_solicitado2','$montaval','$plazo2','$cedulaS','$obs') ",$conexPres);

					$b = mysql_query ("SELECT max(cod_solicitudes) as solicitudes FROM solicitudes WHERE id_solicitudes = '$cedulaS'  ",$conexPres );
					while($v=mysql_fetch_assoc($b))	{ $cod_solicitudes=$v['solicitudes']; 	}	
					
					$b = mysql_query ("SELECT max(cod_solicitudes) as solicitudes FROM solicitudes WHERE id_solicitudes = '$cedula2'  ",$conexPres );
					while($v=mysql_fetch_assoc($b))	{ $cod_solicitudes2=$v['solicitudes']; 	}	
			
											
					include("opciones/conexion_administrador.php"); 	
						
					$consulta1=mysql_query("INSERT INTO status_solicitud (
					`cod_status_solicitud` ,
					`id_status_solicitud` ,
					`cod_solicitudes` ,
					`analista` ,
					`observaciones` ,
					`pc` ,
					`cod_usuarios`,
					`departamento`
					)
					VALUES ('null', '$cedulaS', '$cod_solicitudes', '$usunom $usuapel', 'Realizo la solicitud crédito observaciones:$obs', '$nombre_pc' , '$id_usu','Atención Al Socio'), ('null', '$cedula2', '$cod_solicitudes2', '$usunom $usuapel', 'Realizo la solicitud crédito observaciones:$obs', '$nombre_pc', '$id_usu','Atención Al Socio' ) ",$conexadmi);
								
			
			include("opciones/conexion_prestamo.php"); 
				$consulta1=mysql_query(" INSERT INTO  `prestamos`.`vivienda` (`cod_vivienda` ,`id_vivienda` ,`cod_solicitudes` ,`direccion`) VALUES (NULL ,  '$cedulaS',  '$cod_solicitudes',  '$dir'), (NULL ,  '$cedula2',  '$cod_solicitudes2',  '$dir'); ",$conexPres);
				
			
			
			
			break;
		
		default:
					$credito=$_SESSION["tipo_prestamo"];
					$monto_solicitado=$_POST["mon_solic"];
					$plazo=$_POST["plazo"];
					$obs=$_POST["obs"];
					$dir=$_POST["direccion"];
					$cedulaS;
					$cod_prestamo=$_SESSION["tip_pre"];
					
					
						
			
					include("opciones/conexion_prestamo.php"); 
					$consulta1=mysql_query("INSERT INTO solicitudes (`cod_solicitudes` ,`id_solicitudes` ,`cod_tipo_prestamo` ,`monto_solicitado` ,`monto_avaluo`,`plazo`,`observaciones`)
					VALUES (NULL ,'$cedulaS','$cod_prestamo','$monto_solicitado','$montaval','$plazo','$obs')",$conexPres);

					$b = mysql_query ("SELECT max(cod_solicitudes) as solicitudes FROM solicitudes WHERE id_solicitudes = '$cedulaS'  ",$conexPres );
					while($v=mysql_fetch_assoc($b))	{ $cod_solicitudes=$v['solicitudes']; 	}	
					
					
					include("opciones/conexion_administrador.php"); 
					$consulta1=mysql_query("INSERT INTO status_solicitud (
					`cod_status_solicitud` ,
					`id_status_solicitud` ,
					`cod_solicitudes` ,
					`analista` ,
					`observaciones` ,
					`pc` ,
					
					`cod_usuarios`,
					`departamento`
					)
					VALUES ('null', '$cedulaS', '$cod_solicitudes', '$usunom $usuapel', 'Realizo la solicitud crédito observaciones:$obs', '$nombre_pc' , '$id_usu','Atención Al Socio') ",$conexadmi);
						
   				
				
				include("opciones/conexion_prestamo.php"); 
				$consulta1=mysql_query(" INSERT INTO  `prestamos`.`vivienda` (`cod_vivienda` ,`id_vivienda` ,`cod_solicitudes` ,`direccion`) VALUES (NULL ,  '$cedulaS',  '$cod_solicitudes',  '$dir'); ",$conexPres);
						
				
				
				}











			
				if($consulta1){
								echo "<script type='text/javascript'> alert('Su Solicitud ha sido enviada satisfactoriamente, recuerde imprimir la planilla y enviar junto con los recaudos correspondientes');document.location.href = ('inicio.php'); </script>";
								}
						else	{
								echo "<script type='text/javascript'> alert('Lo sentimos el registro  de sus datos no son  validos  '); document.location.href = ('inicio.php'); </script>";
								}
			
			
			
			
			
			
			
			
			
			}



			

	
	
	
	
	
	
	
	
	


?>


<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div>

      
       


<?
 $_SESSION["cod_socio"]; 
 $cedulaS=$_SESSION["cedulaS"];
 $credito=$_SESSION["tipo_prestamo"];

include("opciones/conexion.php");
$personas =mysql_query("SELECT * FROM socios where cedula='$cedulaS' ",$conex);
 /*$personas =mysql_query("SELECT   
Nom_Ape,nombre1,nombre2, apellido1, apellido2 , nacionalidad, cedula ,sexo ,N_cuenta, F_nacimiento, correo ,nom_estatus,tipo_nomina,nom_organismo,est_civil,direccion,calle,avenida,cod_codigo_postal,num_vivienda,estado,municipio,parroquia,tipo_vivienda,imagen
 FROM `socios` as soc
Inner join  estatus  as est on (soc. cod_estatus=est. cod_estatus)
Inner join  nomina  as nom  on (nom.cod_socio =soc.cod_socio)
Inner join  tipo_nomina as tip_nom  on (nom. cod_tipo_nomina = tip_nom . cod_tipo_nomina)
Inner join  organismo as org  on (nom.cod_organismo= org.cod_organismo)
Inner join  est_civil as es_ci  on (soc.cod_est_civil= es_ci.cod_est_civil)
Inner join  direccion as dir  on (soc. cod_socio= dir. cod_socio)
Inner join  estado as esta  on (esta. cod_estado= dir. cod_estado)
Inner join  municipio as mun  on (mun. cod_municipio= dir. cod_municipio)
Inner join  parroquia as parr  on (parr. cod_parroquia= dir. cod_parroquia)
Inner join  vivienda as vivi  on (vivi. cod_vivienda= dir. cod_vivienda)
Inner join  imagenes as img  on (img.cod_socio=soc.cod_socio)
 where cedula='$cedulaS' ",$conex);*/											
while($vector = mysql_fetch_assoc($personas))
{

$Nom_Ape=$vector['nom_ape'];

$ape1=$vector['nombre1'];
$ape2=$vector['nombre2'];
$nom1=$vector['apellido1'];
$nom2=$vector['apellido2'];
$nac=$vector['nacionalidad'];
$cd=$vector['cedula'];
$fec=$vector['F_nacimiento'];
$sexo=$vector['sexo'];
$estatu=$vector['nom_estatus'];
$nomina=$vector['tipo_nomina'];
$cor=$vector['correo'];
$nro=$vector['N_cuenta'];
$EstCivil=$vector['est_civil'];
$img=$vector['imagen'];
$org=$vector['nom_organismo'];



$dir=$vector['direccion'];
$calle=$vector['calle'];
$avenida=$vector['avenida'];
$cp=$vector['cod_codigo_postal'];
$num_vivienda=$vector['num_vivienda'];

$estado=$vector['estado'];
$municipio=$vector['municipio'];
$parroquia=$vector['parroquia'];
$tipo_vivienda=$vector['tipo_vivienda'];


}
			
		
		
		
		
		
	/*calculo de la edad  */	
			$f_nacimiento = explode("-",$fec);
				$aaaaN=$f_nacimiento[0]; // porción1
				$mmN=$f_nacimiento[1]; // porción2
				$ddN=$f_nacimiento[2];
				
$da= explode('-', $fec);   

   $dia = $da[2];  
   $mes = $da[1]; 
   $anio = $da[0];  

       $diac =date("d"); 
       $mesc =date("m"); 
       $anioc =date("Y"); 
       $edadac =  $anioc-$anio; 

   if($mesc < $mes && $diac < $dia || $mesc < $mes || $diac < $dia){ 
	  $edad_aux = $edadac - 1; 
      $edad_socio = $edad_aux; 
     } 
	 
	 if($edad_socio){ $edad=$edad_socio;} else{$edad=$edadac;}
				
/*----------------fin-------------*/	
$ced1=$_POST["ced"];
if($_POST["ced"]){ $_SESSION["cedula2"]=$_POST["ced"]; $cedula2=$_POST["ced"]; } else{$cedula2=$_SESSION["cedula2"];}


$personas =mysql_query("SELECT * FROM  `socios` where cedula='$ced1' ",$conex);											
while($vector = mysql_fetch_assoc($personas)) {

$Nom_Ape1=$vector['nom_ape'];
$nac1=$vector['nacionalidad'];
$cd1=$vector['cedula'];
$fec12=$vector['F_nacimiento'];

}	


				
$da= explode('-', $fec12);   

   $dia = $da[2];  
   $mes = $da[1]; 
   $anio = $da[0];  

       $diac =date("d"); 
       $mesc =date("m"); 
       $anioc =date("Y"); 
       $edadac =  $anioc-$anio; 

   if($mesc < $mes && $diac < $dia || $mesc < $mes || $diac < $dia){ 
	  $edad_aux = $edadac - 1; 
      $edad_socio = $edad_aux; 
     } 
	 
	 if($edad_socio){ $edad1=$edad_socio; } else{$edad1=$edadac;}	


	 
?>
<table  align="center" border="0" cellpadding="0" cellspacing="0">
				</br>
				<tr>
				  <td id="titulo1" colspan="4" align="center"  >Datos del Socio</td>
				</tr>
				
				<tr>
					<td>Nombres y Apellido:<input name="nombre" value="<?echo $Nom_Ape;?>" type="text" id="cedula" size="40" maxlength="60" ></td>
					<td>
						Cedula:<input name="cedula" value="<?echo $nac,('-'),$cd;?>" type="text" id="cedula" size="10" maxlength="10" > 
						Edad:<input name="edad" value="<?echo $edad ;?>" type="text" id="cedula" size="1" maxlength="2" >
					</td>	
				</tr>
				
				
</table>
				
</br>
							  
							 
						<?	
						include("opciones/conexion_administrador.php"); //conexadmi 
						include("opciones/conexion_prestamo.php"); //conexPres
						$tp=$_POST["tipo_prestamos"];	
						$buscar = mysql_query ("SELECT * FROM `tipo_prestamos` WHERE  cod_tipo_prestamo='$tp' and `status_tipo_prestamos`=1 ",$conexPres); while($vec1=mysql_fetch_row($buscar)){ $tip_pres=$vec1[1]; $n=$vec1[8]/12;}?>
							  
						
				
						

							 









			
			
			
			
			
	
			
			
			
			
<!----------------------------------------------------------------------------------------------------------------------------------------->		

<? 
 $cod_delegado=$_POST["cod_delegado"];

	$servidor="127.0.0.1";
			$usuario="root";
			$clave="1234";
			$db_nombre="productos";


			$conexPres=@mysql_connect($servidor,$usuario,$clave) or die(mysql_error());
			@mysql_select_db($db_nombre,$conex) or die(mysql_error()); 
			
			
			$buscar = mysql_query ("SELECT * FROM delegados WHERE cod_delegados='$cod_delegado' ",$conexPres);
								   while($vec1=mysql_fetch_row($buscar)){
								  $cod_deleg=$vec1[0];
								  $nom_del=$vec1[2];
								  $_SESSION["cod_deleg"]=$vec1[0];
								  
								  } 

							$buscar = mysql_query ("SELECT * FROM delegados WHERE cod_delegados='$cod_deleg' ",$conexPres);
								   while($vec1=mysql_fetch_row($buscar)){
								 
								  $nom=$vec1[2];
								
								  
								  }	  
								  
								  ?>



<table align="center">
		
				<tr>
				  <td colspan="2" align="center" id="titulo1"><?echo $nom; ?></td>
				  <td colspan="1" align="center" ></td>
				  <td colspan="1" align="center" ><??></td>
				  <td colspan="1" align="center" id="titulo2">Delegado:</td>
				  <form id="form" name="form" method="post" action="Solicitud_Productos_N.php">	
				  <td colspan="2" align="center" >
				  
								<select  name="cod_delegado"  onchange="submit();"  id="cod_delegado" >
								  <option required value=""> </option>
								  <?$buscar = mysql_query ("SELECT * FROM `delegados` ",$conexPres);?>
								  <?php while($vec1=mysql_fetch_row($buscar)){?>
								  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[2];  ?> </option>
								  <?php } ?>
								</select>
					 
				  </td>
				  </form>	
				</tr>
				
				<tr>
				  <td colspan="7" align="center" id="titulo2">PRODUCTOS DISPONIBLES</td>
				</tr>
				
				<tr id="titulo3" >
					<td style=" width:15px; ">Nº</td>
					<td style=" width:350px; ">Producto</td>
					<td style="width:60px;" >Cantidad</td>
					<td style="width:110px;">Precio x Unidad</td>
					<td style="width:120px;">Peso Apróximado</td>
					<td style="width:100px;" ></td>
					<td style="width:50px;" >Solicitud</td>
				<tr>
</table>



<div style="overflow: auto;  width: 850px; height: 200px; ">				
<table style=" float:left; margin-left:3px; "   >			
			
			<?
			
			$servidor="127.0.0.1";
			$usuario="root";
			$clave="1234";
			$db_nombre="productos";


			$conexPres=@mysql_connect($servidor,$usuario,$clave) or die(mysql_error());
			@mysql_select_db($db_nombre,$conex) or die(mysql_error()); 

			if (!$conex){
			echo 'error al conectar';
			die;
			}
			$bd = mysql_select_db($db_nombre,$conex);
			if (!$bd){
			echo 'error al seleccionar la base d datos';
			die;
			}
			mysql_query ("SET NAMES 'utf8'");




				
				$resultados = mysql_query("SELECT * FROM  `ProductosN`",$conexPres);	
			 
				while ($pacientes = mysql_fetch_array($resultados)) {
							
		
				?>		
					
				<tr  onClick="ver_detalles('<? echo $pacientes["cod_producto"]; ?>')" style="cursor:pointer" onMouseMove="this.style.backgroundColor='#0a8df2'" onMouseOut="this.style.backgroundColor='#BFDFFF'" >
					  <td  style=" width:15px; color:red;"><div align="center"><? echo $cod_p=$pacientes["cod_producto"]; ?></div></td>
					  <td style=" width:380px; " ><div align="center"><? echo $pacientes["nombre"]; ?></div></td>
					  <td style="width:65px;" ><div align="center"><? echo $pacientes["cantidad_act"]; ?></div></td>
					  <td style="width:125px;"><div align="center"><? echo $pacientes["precio"]; ?></div></td>
					  <td style="width:125px;"><div align="center"><? echo $pacientes["peso"]; ?></div></td>
					  <td style="width:50px;" align="center">	<a href= "Solicitud_Productos_N1.php? CI=<?echo $cedulaS;?>&codigo=<?echo $pacientes["cod_producto"];?> "><img src="Imagen\iconos_tablas\agregar.png"></a> </td>
					  <td style="width:50px;" align="center"><a href= "Solicitud_Productos_N2.php? CI=<?echo $cedulaS;?>&codigo=<?echo $pacientes["cod_producto"];?> "><img src="Imagen\iconos_tablas\quitar.png"></a></td>
					<td style="width:50px;" ><div align="center"><?include("opciones/conexion_producto.php");  $b1 = mysql_query ("SELECT sum(cantidad) as cantidad FROM  `solicitud` where cedula='$cedulaS' and cod_producto='$cod_p' LIMIT 0,1  ",$conex); while($v1=mysql_fetch_assoc($b1))	{  echo $v1['cantidad']; }    ?></div></td>
					 
				</tr>	
				
					<?php  }
					//right?>
				
				</table>
			</div>	
			<?$resultados = mysql_query("SELECT sum(precio) as total_p    FROM  solicitud as sol inner join productosn as pro on(sol.cod_producto=pro.cod_producto) where cedula='$cedulaS' ",$conexPres);	while ($pacientes = mysql_fetch_array($resultados)) {  $total_precio=$pacientes["total_p"];  }?>
			
			<? $resultados = mysql_query("SELECT sum(cantidad) as cant FROM  solicitud  where cedula='$cedulaS' ",$conexPres);	while ($pacientes = mysql_fetch_array($resultados)) { $cantidad=$pacientes["cant"];  }?>






<table colspan="4" align="center"  style="float:right; border-color: red;   " >
		
				
				
				<tr>
					<td>Total de articulos:</td>
					<td style="color:red;"><?echo $cantidad;?></td>
					<td>Montos Total:</td>
					<td style="color:red;" ><?echo $total_precio;?></td>
					
				<tr>


</table>

<form id="form2" name="form2" method="post" action="Solicitud_Productos_N.php">		
	<table colspan="4" align="center"  style="float:left; border-color: red;   " >
				<tr>   
					<td align="center" >
						 
						 <input name="boton2" type="HIDDEN" id="boton2" />
						 <input name="Regresas" type="button" id="Regresas" value="Regresar" onclick="regresas()"  />
						 
						
						 <input name="boton1" type="HIDDEN" id="boton1" />
						  <input name="modificar" type="image" id="modificar" value="Reporte" src="Imagen/iconos_tablas/impre.png" width="35" height="35" onClick="guardar1()" />
					</td>                                
				</tr>
	</table>			

</form>


</div>
</div>
</div>
<?include ("menu.php");?>
</div>


<div style="margin-left:-8px; ">
<marquee  style="position: absolute; text-align: center; width: 100%; bottom: 0px; width: 100%;color:#FFFFFF; " behavior="scroll" direction="left" bgcolor="#000000"  onmouseover="this.stop()" onmouseout="this.start()" scrollamount="4"> <?echo 	("Bienvenido: "), $usunom,(" "), $usuapel,(" al Sistema de Información Gerencial para el Manejo de Ahorros (S.I.G.M.A.). Usted ingreso con el usuario: "),$usuusu ,(" desde el Equipo: "),$nombre_pc, (" con fecha y hora: "), $fecha,(" "),$hora; ?>  </marquee>
</div>



</body>
</html>
