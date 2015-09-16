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

	
	if(document.form1.plazo.value.length==0){
			alert("Defina plazo"); 
		   document.form1.plazo.focus(); 
		}
	if(document.form1.plazo1.value.length==0){
		alert("Defina plazo"); 
       document.form1.plazo1.focus(); 
	}
	
	
	else if(document.form1.mon_solic.value.length==0){
		alert("Defina monto solicitado");
		document.form1.mon_solic.focus();
	}
	else if(document.form1.mon_solic1.value.length==0){
		alert("Defina monto solicitado");
		document.form1.mon_solic1.focus();
	}
	else if(document.form1.marca.value.length==0){
		alert("Defina marca");
		document.form1.marca.focus();
	}
	else if(document.form1.modelo.value.length==0){
		alert("Defina modelo");
		document.form1.modelo.focus();
	}
	
	
	else{
		document.form1.boton1.value="entrar";
		document.form1.submit();  
	}
}

	
		function regresas(){
document.form1.boton2.value="Regresas";
document.location.href = ('inicio.php');
document.form1.href = ('inicio.php'); 
	
}	



	function guardar2(){

	
	if(document.form2.plazo.value.length==0){
			alert("Defina plazo"); 
		   document.form2.plazo.focus(); 
		}	
	else if(document.form2.mon_solic.value.length==0){
		alert("Defina monto solicitado");
		document.form2.mon_solic.focus();
	}	
	else if(document.form2.marca.value.length==0){
		alert("Defina marca");
		document.form2.marca.focus();
	}
	else if(document.form2.modelo.value.length==0){
		alert("Defina modelo");
		document.form2.modelo.focus();
	}
	else{
		document.form2.boton1.value="entrar";
		document.form2.submit();  
	}
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
		
					

				
				

			
			

 $man=$_SESSION["man"];

switch ($man) {
		case "mancomunado":
		


		
					 $credito=$_SESSION["tipo_prestamo"];
					$monto_solicitado=$_POST["mon_solic"];
					$plazo=$_POST["plazo"];
					$obs=$_POST["obs"];
					$modelo=$_POST["modelo"];
					$marca=$_POST["marca"];
					$cedulaS;
					$cod_prestamo=$_SESSION["tip_pre"];
					$credito=$_SESSION["tipo_prestamo"];
					$monto_solicitado2=$_POST["mon_solic1"];
					$plazo2=$_POST["plazo1"];
					$cedula2=$_SESSION["cedula2"];
					
					
	
			
						
					include("opciones/conexion_prestamo.php"); //conexPres
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
					VALUES ('null', '$cedulaS', '$cod_solicitudes', '$usunom $usuapel', 'Realizo la solicitud Antención al Socio Obs:$obs', '$nombre_pc' , '$id_usu','Atención Al Socio'), ('null', '$cedula2', '$cod_solicitudes2', '$usunom $usuapel', 'Realizo la solicitud crédito observaciones:$obs', '$nombre_pc' , '$id_usu','Atención Al Socio') ",$conexadmi);
								
			
			include("opciones/conexion_prestamo.php"); 
				$consulta1=mysql_query(" INSERT INTO  vehiculo (
`cod_vehiculo` ,
`id_vehiculo` ,
`cod_solicitudes` ,
`marca` ,
`modelo`
)
VALUES (NULL ,  '$cedulaS',  '$cod_solicitudes',  '$marca',  '$modelo'), (NULL ,  '$cedula2',  '$cod_solicitudes2',  '$marca',  '$modelo');
",$conexPres);
				
			
			
			
			break;
		
		 default:
					$credito=$_SESSION["tipo_prestamo"];
					$monto_solicitado=$_POST["mon_solic"];
					$plazo=$_POST["plazo"];
					$obs=$_POST["obs"];
					$modelo=$_POST["modelo"];
					$marca=$_POST["marca"];
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
					VALUES ('null', '$cedulaS', '$cod_solicitudes', '$usunom $usuapel', 'Realizo la solicitud Antención al Socio Obs:$obs', '$nombre_pc' , '$id_usu','Atención Al Socio') ",$conexadmi);
						
   				
				
				include("opciones/conexion_prestamo.php"); 
				$consulta1=mysql_query(" INSERT INTO  `prestamos`.`vehiculo` (`cod_vehiculo` ,`id_vehiculo` ,`cod_solicitudes` ,`marca` ,`modelo`) VALUES (NULL ,  '$cedulaS',  '$cod_solicitudes',  '$marca',  '$modelo'); ",$conexPres);
					
				
				
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
	 
	 if($edad_socio){ $edad1=$edad_socio;} else{$edad1=$edadac;}	


	 
?>
<table  border="0" cellpadding="0" cellspacing="0">
				</br>
				<tr>
				  <td id="titulo1" colspan="4" align="center"  >Datos del Socio</td>
				</tr>
				
				<tr>
					<td id="titulo3" >Socio A</td>				
					<td>Nombres y Apellido:<input name="nombre" value="<?echo $Nom_Ape;?>" type="text" id="cedula" size="40" maxlength="10" ></td>
					<td>
						Cedula:<input name="cedula" value="<?echo $nac,('-'),$cd;?>" type="text" id="cedula" size="10" maxlength="10" > 
						Edad:<input name="edad" value="<?echo $edad ;?>" type="text" id="cedula" size="1" maxlength="2" >
					</td>	
				</tr>
				<?if($_POST["ced"]){ ?>	
				<tr>
					<td  id="titulo3" >Socio B</td>
					<td>Nombres y Apellido:<input name="nombre" value="<?echo $Nom_Ape1;?>" type="text" id="cedula" size="40" maxlength="10" ></td>
					<td>
						Cedula:<input name="cedula" value="<?echo $nac1,('-'),$cd1;?>" type="text" id="cedula" size="10" maxlength="10" > 
						Edad:<input name="edad" value="<?echo $edad1 ;?>" type="text" id="cedula" size="1" maxlength="2" >
					</td>	
				</tr>
				<?}?>	
</table>
				

<table align="center"   border="0" cellpadding="0" cellspacing="0">
				
				
						
						
							
							<? 
							$tp=$_POST["tipo_prestamos"];	
							include("opciones/conexion_prestamo.php");  						  
							
							if($Nom_Ape1==('')){
							if($tp==('')){
							
							
							?>
			<form id="form" name="form" method="post" action="Solicitud_Credito_Vehiculo1.php">	
			
				</br>
				<tr>
				  <td colspan="2" align="center" id="titulo2" >Solicitud de Credito de Vehiculo</td>
				</tr>
			
				<tr>
							<td>
								Mancomunado <input type="checkbox" name="mancomunado" size="20" maxlength="9" value="mancomunado" onKeyPress="return permite(event,'num')" >
							</td>
							<td>
								Año del Vehiculo: 
								<? include("opciones/conexion_prestamo.php");  ?>
								<select  name="tipo_prestamos"  onchange="submit();"  id="tipo_prestamos" >
								  <option required value=""> </option>
								  <?$buscar = mysql_query ("SELECT * FROM `tipo_prestamos` WHERE  `prestamo`='VEHICULO' and `status_tipo_prestamos`=1 ",$conexPres);?>
								  <?php while($vec1=mysql_fetch_row($buscar)){?>
								  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>
								  <?php } ?>
								</select>
							</td> 	
				</tr>			
			</Form>					
								<?php }else{}} ?>
							  
							 
						<?$tp=$_POST["tipo_prestamos"];	
						include("opciones/conexion_prestamo.php"); //conexPres
						$buscar = mysql_query ("SELECT * FROM `tipo_prestamos` WHERE  cod_tipo_prestamo='$tp' and `status_tipo_prestamos`=1 ",$conexPres); while($vec1=mysql_fetch_row($buscar)){ $tip_pres=$vec1[1]; $n=$vec1[8]/12;}?>
							  
						
				
						
</table>
							 









<?
if($_POST["tipo_prestamos"]){ $n1=$n; $_SESSION["numero"]=$n; $_SESSION["man"]=$_POST["mancomunado"]; $_SESSION["tip_pre"]=$_POST["tipo_prestamos"];	$mancomunado=$_POST["mancomunado"];	 $tipo_prestamos=$_POST["tipo_prestamos"];	} else{ $n1=$_SESSION["numero"]; $mancomunado=$_SESSION["man"]; $tipo_prestamos=$_SESSION["tip_pre"];}


?>









<form id="form1" name="form1" method="post" action="Solicitud_Credito_Vehiculo1.php">


<table align="center"  >
				
				
			<?if($_POST["mancomunado"]){?>	
			<form  method="post" action="Solicitud_Credito_Vehiculo1.php">	
				<tr>
				  <td id="titulo2" colspan="2" align="center" bgcolor="#FFFFFF">Datos del Segundo socio mancomunado </td>
				</tr>				
				<tr>
					<td align="center" >
					Cedula:<input type="text" name="ced" size="20" maxlength="9" value="" onchange="submit()" onKeyPress="return permite(event,'num')">
					</td>
				</tr>
				</Form>	
			<?}?>	
			
			<?$_POST["ced"];?>	
</table>			
			

			
			
			
			
			
	
			
			
			
			
<!----------------------------------------------------------------------------------------------------------------------------------------->		
<?	if($_POST["ced"]){ ?>

</br>
<table  align="center" >
<form id="form1" name="form1" method="post" action="Solicitud_Credito_Vehiculo1.php">			
				<tr>
				  <td colspan="4" align="center" bgcolor="#oa8df2"  style="background-color: rgba(0, 162, 232, 0.6); border-radius: 10px 10px 10px 10px; " >Datos del Crédito</td>
				</tr>
				<tr>
				  <td colspan="2" align="center" id="titulo3">Socio A</td>
				   <td colspan="2" align="center" id="titulo3">Socio B</td>
				</tr>
				<tr>
					<td>Plazo:</td>
					<td> 
									<? include("opciones/conexion_administrador.php");  ?>
									
									<select  name="plazo"   id="plazo"  >
									  <option  > <? echo $vplazo;?></option>;
									  <?//$buscar = mysql_query ("SELECT * FROM plazo WHERE  plazo <= '$anos' ",$conexSC);?>
									  <?$buscar = mysql_query ("SELECT * FROM plazo where plazo<=$n1 ",$conexadmi);?>
									  <?php while($vec1=mysql_fetch_row($buscar)){  ?>
									  <option required value="<?php echo $vec1[1];?>"> <?php echo $vec1[1];  ?> </option>;
									  <?php } ?>
									  </select>
					</td>
	
				
					<td>Plazo:</td>
					<td> 
									<? include("opciones/conexion_administrador.php");  ?>
									
									<select  name="plazo1"   id="plazo1"  >
									  <option  > <? echo $vplazo;?></option>;
									  <?//$buscar = mysql_query ("SELECT * FROM plazo WHERE  plazo <= '$anos' ",$conexSC);?>
									  <?$buscar = mysql_query ("SELECT * FROM plazo where plazo<=$n1 ",$conexadmi);?>
									  <?php while($vec1=mysql_fetch_row($buscar)){  ?>
									  <option required value="<?php echo $vec1[1];?>"> <?php echo $vec1[1];  ?> </option>;
									  <?php } ?>
									  </select>
					</td>
	
				</tr>
				<tr>
					<td>Monto Solicitado:</td>
					<td>			
						<input type="text" name="mon_solic" size="8" maxlength="9" value="" onKeyPress="return permite(event,'num')" > 
					</td> 
					<td>Monto Solicitado:</td>					
					<td>			
						
						<input type="text" name="mon_solic1" size="8" maxlength="9" value="" onKeyPress="return permite(event,'num')" > 
					</td> 					
				</tr>
				<tr>
					<td>
						Marca
					</td>
					<td>
					<select  name="marca"   id="marca"  >
											  <option required value="">Seleccione</option>;
											  <?include("opciones/conexion_administrador.php"); 
											  $buscar = mysql_query ("SELECT * FROM marca_vehiculo  ",$conexadmi);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){  ?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
											  <?php } ?>
											</select>
					</td>
					<td>
						Modelo: 
					</td>
					<td>			
						<input type="text" name="modelo" size="8" maxlength="9" value="" onKeyPress="return permite(event,'car')" > 
					</td>
				</tr>				
				<tr>
					<td>
						Observaciones: 
					</td>
					<td colspan=4>
					<textarea name="obs" rows="2" cols="44"> </textarea>
						<!--<input type="text" name="obs" size="22" maxlength="100" value="" onKeyPress="return permite(event,'car')" > -->
					</td>
				</tr>
			
				<tr>   
					<td colspan=4 align="center" >
						 	</br>
						 <input name="boton1" type="HIDDEN" id="boton1" />
						 <input name="modificar" type="button" id="modificar" value="Guardar" onClick="guardar1()" />
						 <input name="boton2" type="HIDDEN" id="boton2" />
						 <input name="Regresas" type="button" id="Regresas" value="Regresas" onclick="regresas()" />
					</td>                                
				</tr>
				<?}?>
</table>
</form>




<?  $_POST["mancomunado"]; 	

if(($_POST["mancomunado"]==(''))&& $_POST["tipo_prestamos"] !=('') ){ ?>
<table align="center">
<form id="form2" name="form2" method="post" action="Solicitud_Credito_Vehiculo1.php">			
				<tr>
				  <td colspan="2" align="center" id="titulo2">Datos del crédito</td>
				</tr>
				
				<tr>
					<td>Plazo:</td>
					<td> 
									<? include("opciones/conexion_administrador.php");  ?>
									
									<select  name="plazo"   id="plazo"  >
									  <option  > <? echo $vplazo;?></option>;
									  <?//$buscar = mysql_query ("SELECT * FROM plazo WHERE  plazo <= '$anos' ",$conexSC);?>
									  <?$buscar = mysql_query ("SELECT * FROM plazo where plazo<=$n1 ",$conexadmi);?>
									  <?php while($vec1=mysql_fetch_row($buscar)){  ?>
									  <option required value="<?php echo $vec1[1];?>"> <?php echo $vec1[1];  ?> </option>;
									  <?php } ?>
									  </select>
					</td>
	
				
					
	
				</tr>
				<tr>
					<td>Monto Solicitado:</td>
					<td>			
						<input type="text" name="mon_solic" size="8" maxlength="9" value="" onKeyPress="return permite(event,'num')" > 
					</td> 
										
				</tr>
				<tr>
					<td>
						Marca
					</td>
					<td>
					<select  name="marca"   id="marca"  >
											  <option required value="">Seleccione</option>;
											  <?include("opciones/conexion_administrador.php"); 
											  $buscar = mysql_query ("SELECT * FROM marca_vehiculo  ",$conexadmi);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){  ?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
											  <?php } ?>
											</select>
					</td>
				</tr>
<tr>
					<td>
						Modelo
					</td>
					<td>
						<input type="text" name="modelo" size="8" maxlength="9" value="" onKeyPress="return permite(event,'car')" > 
					</td>
				</tr>				
				<tr>
					<td>
						Observaciones: 
					</td>
					<td>
					<textarea name="obs" rows="2" cols="44"> </textarea>
						<!--<input type="text" name="obs" size="11" maxlength="100" value="" onKeyPress="return permite(event,'car')" > -->
					</td>
				</tr>
			
				<tr>   
					<td colspan=4 align="center" >
						 	</br>
						 <input name="boton1" type="HIDDEN" id="boton1" />
						 <input name="modificar" type="button" id="modificar" value="Guardar" onClick="guardar2()" />
						 <input name="boton2" type="HIDDEN" id="boton2" />
						 <input name="Regresas" type="button" id="Regresas" value="Regresas" onclick="regresas()" />
					</td>                                
				</tr>
				<?}?>
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
