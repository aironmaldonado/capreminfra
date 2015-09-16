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
function guardar(){

	if(document.form1.peso.value.length==0){
		alert("Defina Peso"); 
       document.form1.peso.focus(); 
	}
	
	else if(document.form1.estatura.value.length==0){
		alert("Defina Estatura"); 
       document.form1.estatura.focus(); 
	}
	
		
	else if(document.form1.vivi.value.length==0){
		alert("Defina Vivienda");
		document.form1.vivi.focus();
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
		
					$tipo_prestamos=$_POST["tipo_prestamos"];
					$peso=$_POST["peso"];
					$estatura=$_POST["estatura"];
					$montaval=$_POST["montaval"];
					$vivi=$_POST["vivi"];
					$cedula=$_POST["cedula"];
					$monto_solicitado=$_POST["mon_solic"];
					$edad=$_POST["edad"];
					
					$_SESSION["cod_socio"]; 
					$credito=$_SESSION["tipo_prestamo"];
					$cedulaS=$_SESSION["cedulaS"];
					$cod_solicitudes=$_SESSION["cod_solicitudes"];
				
				$obs=$_POST["obs"];
	//$consulta1=mysql_query("",$conex);
	
			
include("opciones/conexion_administrador.php"); 
$b = mysql_query ("SELECT * FROM tipo_prestamos WHERE tipo_prestamo = '$tipo_prestamos'  ",$conexadmi);
while($v=mysql_fetch_assoc($b))	{  $cod_prestamo=$v['cod_tipo_prestamo']; 	}	

include("opciones/conexion_prestamo.php");
$consulta1=mysql_query("INSERT INTO seguro (`cod_seguro` ,`id_seguro` ,`cod_solicitudes` ,`peso` ,`estatura` ,`edad`,`descripcion`)VALUES (NULL , '$cedulaS', '$cod_solicitudes','$peso', '$estatura', '$edad', '$vivi'); ",$conexPres);
			

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
VALUES ('null', '$cedulaS', '$cod_solicitudes', '$usunom $usuapel', 'Realizo la solicitud crédito observaciones:$obs', '$nombre_pc' , '$id_usu', 'Crédito') ",$conexadmi);
			
				
				

$imc=$peso/pow(($estatura/100),2);	
if((17.6<$imc) && (33.6>$imc))	{	} else {	$ob=("Fuera del rango de peso estipulado por Mercantil Seguros ");	 }
	



include("opciones/conexion_prestamo.php");
$b = mysql_query ("SELECT max(cod_solicitudes) as solicitudes FROM solicitudes WHERE id_solicitudes = '$cedulaS'  ",$conexPres);
while($v=mysql_fetch_assoc($b))	{ $cod_solicitudes=$v['solicitudes']; 	}			

$consulta1=mysql_query(" UPDATE solicitudes SET `monto_avaluo` = '$montaval' , `observaciones` = '$ob'     WHERE `solicitudes`.`cod_solicitudes` ='$cod_solicitudes' ;",$conexPres);			












			
				if($consulta1){
								echo "<script type='text/javascript'> document.location.href = ('Solicitud_Credito_Vehiculo3.php'); </script>";
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
 
 /*$b = mysql_query ("SELECT * from solicitudes  WHERE id_solicitudes = '$cedulaS'  and status_solicitud='Activa' ",$conexSC);
while($v=mysql_fetch_assoc($b))	{ $monto_solicitado=$v['monto_solicitado ']; 	}	
*/
include("opciones/conexion.php");

 $personas =mysql_query("SELECT   
Nom_Ape,nombre1,nombre2, apellido1, apellido2 , nacionalidad, cedula ,sexo ,N_cuenta, F_nacimiento, correo ,nom_estatus,tipo_nomina,nom_organismo,est_civil,direccion,num_vivienda,estado,municipio,parroquia,tipo_vivienda
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

 where cedula='$cedulaS' ",$conex);											
while($vector = mysql_fetch_assoc($personas))
{

$Nom_Ape=$vector['Nom_Ape'];

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
				
?>

 <form id="form1" name="form1" method="post" action="Solicitud_Credito_Vehiculo2.php">
       
			<table  border="0" cellpadding="0" cellspacing="0">
				
				<tr>
				  <td  id="titulo2" colspan="3" align="center" >Datos del socio </td>
				</tr>
				
				<tr>	
					
					<td>Nombres y Apellido:<input name="nombre" value="<?echo $Nom_Ape;?>" type="text" id="cedula" size="40" maxlength="10" ></td>
					<td>Cedula:<input name="cedula" value="<?echo $nac,('-'),$cd;?>" type="text" id="cedula" size="20" maxlength="10" ></td>	
					<td>Edad: <input type="text" name="edad" size="5" maxlength="3" value="<?echo $edad;?> Años." onKeyPress="return permite(event,'num')" ></td>
					
				</tr>
			</table>
			</br>
			<table align="center" border="0" cellpadding="0" cellspacing="0">
				<tr>
				  <td  id="titulo2" colspan="3" align="center" >Datos para la  Póliza de Seguro  Vehiculo </td>
				</tr>
				<tr>
					<td>Peso:</td>
					<td><input type="text" name="peso" size="3" maxlength="3" value="" onKeyPress="return permite(event,'num')" > </td>
				</tr>	
				<tr>	
					<td>Estatura:</td> 
					<td><input type="text" size="3" maxlength="3" name="estatura" value="" onKeyPress="return permite(event,'num')" > </td>
				</tr>
				<tr>
					<td>Tipo de Vehiculo:</td>
					<td>
											<select  name="vivi"   id="v"  >
											  <option required value="">Seleccione</option>;
											  <option required value="Carro">Carro</option>;
											  <option required value="Camioneta">Camioneta</option>;
											</select>
					</td>
				</tr>
				
				<tr>
					<td>
						Observaciones: 
					</td>
					<td colspan=4>
					<textarea name="obs"  size="20" maxlength="100" value="" onKeyPress="return permite(event,'car')" rows="2" cols="44"> </textarea>
						
					</td>
				</tr>
				<tr>   
					<td colspan=4 align="center" >
						 	</br>
						 <input name="boton1" type="HIDDEN" id="boton1" />
						 <input name="modificar" type="button" id="modificar" value="Guardar" onClick="guardar()" />
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
