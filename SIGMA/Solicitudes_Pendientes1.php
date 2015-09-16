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
	
	
					
					$_SESSION["usuced"];
					$_SESSION["usuclave"]; 
					$_SESSION["usustatus"];
				
					
										
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
			
			
			<!--------------quitar el escrol ----------------->
			<style type="text/css">  body {overflow-y:hidden; overflow-x:hidden }</style>



</head>

<body>

<script type="text/javascript">

	
		function regresas(){
document.form1.boton2.value="Regresas";
	

	document.location.href = ('inicio.php');
document.form1.href = ('inicio.php'); 
	
}	

</script>


<script type="text/javascript">
function guardar1(){

	
	if(document.form1.motivos_estatus.value.length==0){
			alert("Defina motivos_estatus"); 
		   document.form1.motivos_estatus.focus(); 
		}
	if(document.form1.obs.value.length==0){
		alert("Defina obs"); 
       document.form1.obs.focus(); 
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
if($codigo){$_SESSION["id_solicitudes"]=$CI; $cedulaS=$CI; $_SESSION["cod_solicitudes"]=$codigo; $cod_solicitudes=$codigo;} else {$cedulaS=$_SESSION["id_solicitudes"]; $cod_solicitudes=$_SESSION["cod_solicitudes"];}

 if($_POST['boton1']=="entrar")
			{

					include("opciones/conexion.php"); $b = mysql_query ("SELECT * FROM socios  where cedula='$cedulaS'; ",$conex); while($v=mysql_fetch_assoc($b))	{  $cod_socio=$v['cod_socio'];  	}	

			$cedulaS;		
			
			$cod_solicitudes;
			$motivos_estatus=$_POST["motivos_estatus"];
			$obs=$_POST["obs"];
			
			
			
			

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
					VALUES ('null', '$cedulaS', '$cod_solicitudes', '$usunom $usuapel', '$motivos_estatus $obs', '$nombre_pc' , '$id_usu','Credito') ",$conexadmi);
						
include("opciones/conexion_prestamo.php");

//$consulta=mysql_query(" UPDATE solicitudes SET `status_solicitud` = 'Devuelto'     WHERE `solicitudes`.`cod_solicitudes` ='$codigo' ;",$conexPres);			

$consulta=mysql_query(" UPDATE  solicitudes SET  status_solicitud = 'Procesando' WHERE  cod_solicitudes ='$cod_solicitudes'  ;",$conexPres);			








					if($consulta){
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





<?/*
<h1><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Buscador - By RogerTM</a></h1>
<form name="buscar" action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
    Buscar: <input type="text" size="50" value="<?php echo $_GET['frase']; ?>" name="frase" />
    <input type="submit" name="buscar" value="Buscar" />
</form>
*/?>









<form id="form1" name="form1" method="post" action="Solicitudes_Pendientes1.php" >

		<table  border="0" cellpadding="0" cellspacing="0">
				<tr>
				  <td id="titulo1" colspan="4" align="center"  >Estatus de Solicitud</td>
				</tr>
				
				<tr>
					<td>Motivos Estatus</td>
					<td>
						<select  name="motivos_estatus"   id="motivos_estatus" >
						<option required value=""> </option>
						<?include("opciones/conexion_administrador.php"); //conexadmi 
						$buscar = mysql_query ("SELECT * FROM `motivos_estatus` ",$conexadmi);?>
						<?php while($vec1=mysql_fetch_row($buscar)){?>
						<option required value="<?php echo $vec1[1];?>"> <?php echo $vec1[1];  ?> </option>
						<?php } ?>
						</select>
					</td> 					
				</tr>
				<tr>
					<td>
						Observaciones: 
					</td>
					<td colspan=4>
					<textarea name="obs" rows="2" cols="44" > </textarea>
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
			
		</table>
		
	
</form>







<?$CI; $codigo;?>


































































	
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		   

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
