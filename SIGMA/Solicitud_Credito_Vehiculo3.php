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

	
	if(document.form1.s1.value.length==0){
		alert("Defina el Sueldo Mensual"); 
       document.form1.s1.focus(); 
	}
	else if(document.form1.s2.value.length==0){
		alert("Defina Sueldo Neto Mensual");
		document.form1.s2.focus();
	}
	else if(document.form1.s4.value.length==0){
		alert("Defina Credito Hipotecario Bs:"); 
       document.form1.s4.focus(); 
	}
	else if(document.form1.s6.value.length==0){
		alert("Defina Prestamo personal"); 
       document.form1.s6.focus(); 
	}
	else if(document.form1.s8.value.length==0){
		alert("Defina Capresovit "); 
       document.form1.s8.focus(); 
	}
	
	
	else if(document.form1.s10.value.length==0){
		alert("Defina Suministro"); 
       document.form1.s10.focus(); 
	}
	
	else if(document.form1.s12.value.length==0){
		alert("Defina Proveeduria "); 
       document.form1.s12.focus(); 
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
			
				 $s1=$_POST["s1"];
			 $s2=$_POST["s2"];
			 $s3=$_POST["s3"];
			 $s4=$_POST["s4"];
			 $s5=$_POST["s5"];
			 $s6=$_POST["s6"];
			 $s7=$_POST["s7"];
			 $s8=$_POST["s8"];
			 $s9=$_POST["s9"];
			 $s10=$_POST["s10"];
			 $s11=$_POST["s11"];
			 $s12=$_POST["s12"];
			 $s13=$_POST["s13"];
			
			 
			
			
				 
				 $cod_socio=$_SESSION["cod_socio"]; 
				 $cedulaS=$_SESSION["cedulaS"];
				 $credito=$_SESSION["tipo_prestamo"];
				 
		
				

	$consulta1=mysql_query("
INSERT INTO `capreminfra`.`sueldo` (
`cod_sueldo` ,
`id_sueldo` ,
`cod_socio` ,
`sueldo_mensual` ,
`sueldo_neto_mensual` ,
`bono_antiguedad` ,
`credito_hipotecario` ,
`prima_jerarquia` ,
`prestamo_personal` ,
`prima_riesgo` ,
`capresovit` ,
`prima_hijo` ,
`suministro` ,
`prima_hogar` ,
`proveeduria` ,
`prima_profesional` ,
`credinomina` ,
`fecha_int5`
)
VALUES (
NULL , '$cedulaS', '$cod_socio', '$s1', '$s2', '$s3', '$s4', '$s5', '$s6', '$s7', '$s8', '$s9', '$s10', '$s11', '$s12', '$s13','0', NOW( ) );

",$conex);
	
	
		

	include("opciones/conexion_prestamo.php");
$b = mysql_query ("SELECT max(cod_solicitudes) as solicitudes FROM solicitudes WHERE id_solicitudes = '$cedulaS'  ",$conexPres);
while($v=mysql_fetch_assoc($b))	{ $cod_solicitudes=$v['solicitudes']; 	}
	
	/*

$consulta1=mysql_query("
UPDATE solicitud_hipotecario SET 
`sueldo_mensual` = '$s1',
`sueldo_neto_mensual` = '$s2',
`bono_antiguedad` = '$s3',
`credito_hipotecario` = '$s4',
`prima_jerarquia` = '$s5',
`prestamo_personal` = '$s6',
`prima_riesgo` = '$s7',
`capresovit` = '$s8',
`prima_hijo` = '$s9',
`suministro` = '$s10',
`prima_hogar` = '$s11',
`proveeduria` = '$s12',
`prima_profesional` = '$s13'
 WHERE cod_solicitud_hipotecario='$cod' ;

",$conex);
	
	
*/









					if($consulta1){
				
							echo "<script type='text/javascript'> document.location.href = ('Solicitud_Credito_Vehiculo4.php'); </script>";
							
							}
					else
							{
								echo "<script type='text/javascript'> alert('Lo sentimos el registro  de sus datos no son  validos  '); document.location.href = ('inicio.php'); </script>";
							}
							
				

			

			
			}



			

	
	
	
	
	
	
	
	
	


?>
<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 200px;" >
<div>
<?
 $_SESSION["cod_socio"]; 
 $cedulaS=$_SESSION["cedulaS"];
 $credito=$_SESSION["tipo_prestamo"];
?>

 <form id="form1" name="form1" method="post" action="Solicitud_Credito_Vehiculo3.php">
       
			
			
<!------------------------------------------------------------------------------------------------------------------------------------>			
			<table  colspan="4">	
				
				<tr>
				  <td id="titulo2" colspan="4" align="center" bgcolor="#FFFFFF">Datos del Sueldo</td>
				</tr>
				
				<tr>
					<td colspan="2" >Salario total (segun constancia)</td>
					<td colspan="2" >Sueldo total (menos los descuentos) </td>
				</tr>
				
				<tr>
					<td colspan=1>Sueldo Mensual Bs:</td>
					<td colspan=1><input type="text" name="s1" value="" size="8"></td>
					<td colspan=1>Sueldo Neto Mensual Bs:</td>
					<td colspan=1><input type="text" name="s2" value="" size="8"></td>
				</tr>
				
				<tr>
					<td colspan=1>Bono de Antiguedad Bs:</td>
					<td colspan=1><input type="text" name="s3" value="" size="8"></td>
					<td colspan=1>Credito Hipotecario Bs:</td> 
					<td colspan=1><input type="text" name="s4" value="" size="8"></td>
				</tr>
				
				<tr>
					<td colspan=1>Prima Por Jeraquia Bs:</td>
					<td colspan=1><input type="text" name="s5" value="" size="8"></td>
					<td colspan=1>Prestamo personal Bs:</td>
					<td colspan=1><input type="text" name="s6" value="" size="8"></td>
				</tr>
				
				<tr>
					<td colspan=1>Prima Por Riesgo Bs:</td>
					<td colspan=1><input type="text" name="s7" value="" size="8"></td>
					<td colspan=1>Capresovit Bs:</td>
					<td colspan=1><input type="text" name="s8" value="" size="8"></td>
				</tr>
				
				<tr>
					<td colspan=1>Prima Por Hijo Bs:</td>
					<td colspan=1><input type="text" name="s9" value="" size="8"></td>
					<td colspan=1>Suministro Bs:</td>
					<td colspan=1><input type="text" name="s10" value="" size="8"></td>
				</tr>
				
				<tr>
					<td colspan=1>Prima Hogar Bs:</td>
					<td colspan=1><input type="text" name="s11" value="" size="8"></td>
					<td colspan=1>Proveeduria Bs:</td>
					<td colspan=1><input type="text" name="s12" value="" size="8"></td>
				</tr>
				
				<tr>
					<td colspan=1>Prima Profesional Bs:</td>
					<td colspan=1><input type="text" name="s13" value="" size="8"></td>
				</tr>
				
				
	
					
				<tr>   
					<td colspan=4 align="center" >
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
