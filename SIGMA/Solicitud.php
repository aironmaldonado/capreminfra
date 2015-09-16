<?session_start();
	require_once("opciones/conexion.php");
	
	include("opciones/seguridad.php");
		
	
					$_SESSION["usuid"];
					$_SESSION["usuced"];
					$usunom=$_SESSION["usunom"]; 
					$usuapel=$_SESSION["usuapel"]; 
					$usuusu=$_SESSION["usuusu"]; 
					$_SESSION["usuclave"]; 
					$_SESSION["usustatus"];
					$nombre_pc=$_SESSION["nombre_pc"];
					$hora=$_SESSION["hora"];
					$fecha=$_SESSION["fecha"];					
	//$usunom, $usuapel,$nombre_pc,$hora,$fecha;
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
			<script type="text/javascript" src="js/menu_izq_js/jquery-1.3.2.js"></script>
			<script type="text/javascript" src="js/menu_izq_js/menu_izq.js"></script>
			<script type="text/javascript" src="JavaScript/evento_permitidos.js"></script>
			
			<!--------------quitar el escrol ----------------->
			<style type="text/css">  body {overflow-y:hidden; overflow-x:hidden }</style>



</head>

<body>




<script type="text/javascript">
function guardar(){

	 
	if(document.form1.cedula.value.length==0){
		alert("Defina Numero de Cedula");
		document.form1.cedula.focus();
	}
	else if(document.form1.credito.value.length==0){
		alert("Defina Tipo Credito");
		document.form1.credito.focus();
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

</script>
<?
 if($_POST['boton1']=="entrar")
			{
			echo $cedula=$_POST["cedula"];
			$credito=$_POST["credito"];
	$_SESSION["tipo_prestamo"]=$_POST["credito"];

	
require_once("opciones/conexion.php"); $b = mysql_query ("SELECT * FROM socios  where cedula='$cedula'; ",$conex); while($v=mysql_fetch_assoc($b))	{  $_SESSION["cod_socio"]=$v['cod_socio']; $_SESSION["cedulaS"]=$v['cedula']; $cod_cedula=$v['cedula'];	}	

//require_once("opciones/conexion_estado_cuenta.php"); $b = mysql_query ("SELECT * FROM tipo_prestamos WHERE tipo_prestamo = '$credito'  ",$conexSC);while($v=mysql_fetch_assoc($b))	{  $_SESSION["tipo_prestamo"]=$v['tipo_prestamo'];  $_SESSION["cod_tipo_prestamo"]=$v['cod_tipo_prestamo']; 	}	








 $cedula=$_POST["cedula"];
			$credito=$_POST["credito"];
	$_SESSION["tipo_prestamo"]=$_POST["credito"];


$b = mysql_query ("SELECT * FROM telefono as tel inner join codigo_area as ca on(tel.cod_codigo_area=ca.cod_codigo_area) where cedula='$cedula';  ",$conex);
						while($v=mysql_fetch_assoc($b))
								{
									
									$i=$i+1;
									
									echo $n[$i]=$v['numero1'];
									$a[$i]=$v['n_area'];
									$c[$i]=$v['n_area'];
									
								}	
								 $n1=$n["1"];
								 $n2=$n["2"];
								 $n3=$n["3"];
								 $n4=$n["4"];
								 
								 $t1=$a["1"];
								 $t2=$a["2"];
								 $t3=$a["3"];
								 $t4=$a["4"];
								 
								 $c1=$c["1"];
								 $c2=$c["2"];
								 $c3=$c["3"];
								 $c4=$c["4"];


								 
$cedulaS=$_POST["cedula"];	

					
					
$b = mysql_query ("SELECT * FROM telefono as tel inner join codigo_area as ca on(tel.cod_codigo_area=ca.cod_codigo_area) where cedula='$cedulaS' and n=1;  ",$conex);
while($ve=mysql_fetch_assoc($b)){$num1=$ve['numero1'];$are1=$ve['n_area'];$Cod1=$ve['cod_codigo_area'];}	

$b = mysql_query ("SELECT * FROM telefono as tel inner join codigo_area as ca on(tel.cod_codigo_area=ca.cod_codigo_area) where cedula='$cedulaS' and n=2;  ",$conex);
while($ve=mysql_fetch_assoc($b)){$num2=$ve['numero1'];$are2=$ve['n_area'];$Cod2=$ve['cod_codigo_area'];}	
								
			
$b = mysql_query ("SELECT * FROM telefono as tel inner join codigo_area as ca on(tel.cod_codigo_area=ca.cod_codigo_area) where cedula='$cedulaS' and n=3;  ",$conex);
while($ve=mysql_fetch_assoc($b)){$num3=$ve['numero1'];$are3=$ve['n_area'];$Cod3=$ve['cod_codigo_area'];}	
								
			
$b = mysql_query ("SELECT * FROM telefono as tel inner join codigo_area as ca on(tel.cod_codigo_area=ca.cod_codigo_area) where cedula='$cedulaS' and n=4;  ",$conex);
while($ve=mysql_fetch_assoc($b)){$num4=$ve['numero1'];$are4=$ve['n_area'];$Cod4=$ve['cod_codigo_area'];}	
								



require_once("opciones/conexion.php");

$b1 = mysql_query ("Select * from socios where cedula='$cedulaS' ",$conex);
while($v1=mysql_fetch_assoc($b1))
{
//$num4=$v1['numero1'];
$cs=$v1['cod_socio'];
$na=$v1['nom_ape'];
$nom1=$v1['nombre1'];
$nom2=$v1['nombre2'];
$ape1=$v1['apellido1'];
$ape2=$v1['apellido2'];
$n=$v1['nacionalidad'];
$cd=$v1['cedula'];
$sexo=$v1['sexo'];
$nro=$v1['N_cuenta'];
$F_ingreso=$v1['F_ingreso'];
$f_ing = substr($F_ingreso, 0, -9); 
$fec=$v1['F_nacimiento'];
$cod_estatus=$v1['Cod_estatus'];
$cor=$v1['correo'];
$cod_est_civil=$v1['cod_est_civil'];
$Actualizacion=$v1['Actualizacion'];
}	
				



$b2 = mysql_query ("Select * from nomina where N_cedula='$cedulaS' ",$conex);
while($v2=mysql_fetch_assoc($b2))
{
$cod_organismo=$v2['cod_organismo'];
$cod_tipo_nomina=$v2['cod_tipo_nomina'];
}

$b3 = mysql_query ("Select * from organismo where cod_organismo='$cod_organismo' ",$conex);
while($v3=mysql_fetch_assoc($b3))
{
$id_org=$v3['cod_organismo'];
$org=$v3['nom_organismo'];
$cdp=$v3['capacidad_descuento_porcentaje'];
}


$b4 = mysql_query ("Select * from tipo_nomina where cod_tipo_nomina='$cod_tipo_nomina' ",$conex);
while($v4=mysql_fetch_assoc($b4))
{
$nomina=$v4['tipo_nomina'];
$id_tipo_nomina=$v4['cod_tipo_nomina'];
}


$b5 = mysql_query ("Select * from est_civil where cod_est_civil='$cod_est_civil' ",$conex);
while($v5=mysql_fetch_assoc($b5))
{
$id_est_civil=$v5['cod_est_civil'];
$EstCivil=$v5['est_civil'];
}




$b6 = mysql_query ("Select * from direccion where cedula_d='$cedulaS' ",$conex);
while($v6=mysql_fetch_assoc($b6))
{
$direccion=$v6['direccion'];
$cod_vivienda=$v6['cod_vivienda'];
}


$b7 = mysql_query ("Select * from vivienda where cod_vivienda='$cod_vivienda' ",$conex);
while($v7=mysql_fetch_assoc($b7))
{
$id_vivienda=$v7['cod_vivienda'];
$tipo_vivienda=$v7['tipo_vivienda'];
}								 
								 
								 
								 

/*

 $personas =mysql_query("SELECT *
FROM  `socios` AS soc
INNER JOIN estatus AS est ON ( soc.cod_estatus = est.cod_estatus ) 
INNER JOIN nomina AS nom ON ( nom.cod_socio = soc.cod_socio ) 
INNER JOIN tipo_nomina AS tip_nom ON ( nom.cod_tipo_nomina = tip_nom.cod_tipo_nomina ) 
INNER JOIN organismo AS org ON ( nom.cod_organismo = org.cod_organismo ) 
INNER JOIN est_civil AS es_ci ON ( soc.cod_est_civil = es_ci.cod_est_civil ) 
INNER JOIN direccion AS dir ON ( soc.cod_socio = dir.cod_socio ) 


 where cedula='$cedula' ",$conex);	

// $personas =mysql_query("SELECT * FROM  socios where cedula='$cedula' ",$conex);

 
while($vector = mysql_fetch_assoc($personas))
{

$na=$vector['nom_ape'];
$ape1=$vector['nombre1'];
$ape2=$vector['nombre2'];
$nom1=$vector['apellido1'];
$nom2=$vector['apellido2'];
$n=$vector['nacionalidad'];
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
$F_ingreso=$vector['F_ingreso'];

$f_ing = substr($F_ingreso, 0, -9); 


$calle=$vector['calle'];
$avenida=$vector['avenida'];
$cp=$vector['cod_codigo_postal'];
$num_vivienda=$vector['num_vivienda'];

$estado=$vector['estado'];
$municipio=$vector['municipio'];
$parroquia=$vector['parroquia'];
$tipo_vivienda=$vector['tipo_vivienda'];
$direccion=$vector['direccion'];
$cdp=$vector['capacidad_descuento_porcentaje'];
 

}
*/


if($cd)
	{

	if($nom1!="" && $ape1 !="" )
		{
		//echo ("si cumple nombre:$nom1 y apellido:$ape1 ");
		
		if($n!="")
			{
			//echo ("si cumple con cedula $cd y nacionalidad $n ");
			if($fec!="" && $sexo !="" )
				{
				//echo ("si cumple con F. nacimiento $fec y sexo $sexo ");
				if($nomina!="" && $cor !=""  )
					{
					//echo ("si cumple nomina y correo");
						
					if($nro!="")
						{
						//echo ("si cumple nro cuenta");
						if($EstCivil!="" && $org !="" )
							{
							//echo ("si cumple ");
								
							if( $direccion !="" )
								{
								//echo ("si cumple  campos de direccion ");$estado!="" && $municipio !="" && $parroquia !="" && $tipo_vivienda !="" &&
								if($n1!="" && $t1 !="" && $n2!="" && $t2 !="")
									{
									//echo ("si cumple telefono ");
									
											switch ($credito) {
														case "HIPOTECARIO":
															echo "<script type='text/javascript'>document.location.href = ('Solicitud_Credito_Hipotecario1.php'); </script>";
															//echo "HIPOTECARIO";
															break;
														case "VEHICULO":
															echo "<script type='text/javascript'>document.location.href = ('Solicitud_Credito_Vehiculo1.php'); </script>";
															//echo "VEHICULO";
															break;
														case "PRODUCTOS":
															echo "<script type='text/javascript'>document.location.href = ('Solicitud_Productos_N.php'); </script>";
															//echo "VEHICULO";
															break;	
															
															
															
														default:
																echo "<script type='text/javascript'>document.location.href = ('Solicitud_Prestamos2.php'); </script>";
														
																}
									}
								else 
									{echo "<script type='text/javascript'> alert('Lo sentimos el socio no poseer actualizado los campos telefonos Hab. y Cel.'); document.location.href = ('actualizar_socios.php'); </script>";}

								}
							else 
								{echo "<script type='text/javascript'> alert('Lo sentimos el socio no poseer actualizado los campos Dirección. '); document.location.href = ('actualizar_socios.php'); </script>";}
							}
						else 
							{echo "<script type='text/javascript'> alert('Lo sentimos el socio no poseer actualizado los campos Estado civil, Organismo. '); document.location.href = ('actualizar_socios.php'); </script>";}
						}
					else 
						{echo "<script type='text/javascript'> alert('Lo sentimos el socio no poseer actualizado los campos Número de cuenta.'); document.location.href = ('actualizar_socios.php'); </script>";}
					}
				else 
					{echo "<script type='text/javascript'> alert('Lo sentimos el socio no poseer actualizado los campos Tipo de Nomina o Correo.'); document.location.href = ('actualizar_socios.php'); </script>";}
				}
			else 
				{echo "<script type='text/javascript'> alert('Lo sentimos el socio no poseer actualizado los campos Fecha Nacimiento o Sexo'); document.location.href = ('actualizar_socios.php'); </script>";}
			}
		else 
			{echo "<script type='text/javascript'> alert('Lo sentimos el socio no poseer actualizado los campos Nacionalidad.'); document.location.href = ('actualizar_socios.php'); </script>";}
			
		}
	else 
		{echo "<script type='text/javascript'> alert('Lo sentimos el socio no poseer actualizado los campos Nombres Completo.'); document.location.href = ('actualizar_socios.php'); </script>";}
		
		}
else 
	{
	echo "<script type='text/javascript'> alert('Lo sentimos el socio no esta afiliado a la CAPREMINFRA. a continuación lo afiliaremos. '); document.location.href = ('Registro_Socios.php'); </script>";
	}






























/*
	
if($cod_cedula==$cedula){
	switch ($credito) {
		case "HIPOTECARIO":
			echo "<script type='text/javascript'>document.location.href = ('Solicitud_Credito_Hipotecario1.php'); </script>";
			//echo "HIPOTECARIO";
			break;
		case "VEHICULO":
			echo "<script type='text/javascript'>document.location.href = ('Solicitud_Credito_Vehiculo1.php'); </script>";
			//echo "VEHICULO";
			break;
		case "PRODUCTOS":
			echo "<script type='text/javascript'>document.location.href = ('Solicitud_Productos_N.php'); </script>";
			//echo "VEHICULO";
			break;	
			
			
			
		default:
				echo "<script type='text/javascript'>document.location.href = ('Solicitud_Prestamos2.php'); </script>";
		
   				}
			
}else{ echo "<script type='text/javascript'> alert('Lo sentimos el socio no esta afiliado a la CAPREMINFRA. a continuación lo afiliaremos. '); document.location.href = ('Registro_Socios.php'); </script>";}
*/






			/*if($consulta1){
				
							echo "<script type='text/javascript'> alert('Su Solicitud ha sido enviada satisfactoriamente, recuerde imprimir la planilla y enviar junto con los recaudos correspondientes');document.location.href = ('Registro_Socios_Direccion.php'); </script>";
							
							}
					else
							{
								echo "<script type='text/javascript'> alert('Lo sentimos el registro  de sus datos no son  validos  '); document.location.href = ('inicio.php'); </script>";
							}*/
			
}


?>
<div class="panel"  >
<div  class="panel2"   > 
<div  class="panel3" style=" margin:70px 380px;"   >
<div>
       
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   <form id="form1" name="form1" method="post" action="Solicitud.php">
       
			<table  border="0" cellpadding="0" cellspacing="0">
				</br>
				<tr>
				  <td colspan="2" align="center" bgcolor="#FFFFFF">Solicitud de Préstamo o Crédito </td>
				</tr>
				 
				
				
				<tr>
						
						 
					<td>Cedula:</td>
						<td>
							<input name="cedula"  type="text" id="cedula" size="19" maxlength="10" onKeyPress="return permite(event,'num')">
						</td>
				</tr>
				<tr>
					<td>Solicitud:</td>
							<td>
							<select name="credito" size="1" id="credito">
								<option value=""></option>
								<option value="PERSONAL">PERSONAL</option>
								<option value="SUMINISTRO">SUMINISTRO</option>
								<option value="UTILES ESCOLARES">UTILES ESCOLARES</option>
								<option value="PROVEEDURIA">PROVEEDURIA</option>
								<option value="HIPOTECARIO">HIPOTECARIO</option>
								<option value="VEHICULO">VEHICULO</option>
								<option value="PRODUCTOS">PRODUCTOS NAVIDEÑOS</option>
							 </select>
							 </td>
            
				</tr>
				
				
				
				<tr>   
					<td colspan=4 align="center" >
						 <input name="boton1" type="HIDDEN" id="boton1" />
						 <input name="modificar" type="button" id="modificar" value="Siguiente" onClick="guardar()" />
						 
						 <input name="boton2" type="HIDDEN" id="boton2" />
						 <input name="Regresas" type="button" id="Regresas" value="Regresas" onclick="regresas()" />
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
