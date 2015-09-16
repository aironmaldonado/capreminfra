<?session_start();
	require_once("opciones/conexion.php");
	
	include("opciones/seguridad.php");
		
	
					$usuid=$_SESSION["usuid"];
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

	 
	/*if(document.form1.tel1.value.length==0){
		alert("Defina Código de operadora de Teléfono Habitación ");
		document.form1.tel1.focus();
	}
	else if(document.form1.tel11.value.length==0){
		alert("Defina Telefono Habitación");
		document.form1.tel1.focus();
	}*/
	if(document.form1.tel2.value.length==0){
		alert("Defina Código de operadora de Teléfono Celular ");
		document.form1.tel2.focus();
	}
	else if(document.form1.tel22.value.length==0){
		alert("Defina Telefono Celular");
		document.form1.tel22.focus();
	}
	/*else if(validaEmail(document.form1.correo.value) == false){
		alert("E-mail Incorrecto, Verifíquelo")
	}
	*/
	
	else{
		document.form1.boton1.value="entrar";
		document.form1.submit();  
	}
}

function validaEmail(email){
				if(email[email.length-1] == "."){
					return false;
				}else if(/^((([a-z]|[A-Z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|[A-Z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|[A-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|[A-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[A-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[A-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|[A-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[A-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/.test(email)){
					return true;
				}else{
					return false;
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
			$tel1=$_POST["tel1"];
			$tel11=$_POST["tel11"];
			$tel2=$_POST["tel2"];
			$tel22=$_POST["tel22"];
			$tel3=$_POST["tel3"];
			$tel33=$_POST["tel33"];
			$tel4=$_POST["tel4"];
			$tel44=$_POST["tel44"];
			$cor=$_POST["correo"];
			$cedula_Soc=$_POST["cedula_Soc"];
	

$b=mysql_query ("SELECT * FROM telefono  where cedula='$cedula_Soc';  ",$conex);
						while($v=mysql_fetch_assoc($b))
								{	
									$i=$i+1;
									$n[$i]=$v['cod_telefono'];
								}
								$telf1=$n[1];
								$telf2=$n[2];
								$telf3=$n[3];
								$telf4=$n[4];
					
mysql_query ("UPDATE  telefono SET `cod_codigo_area` =  '$tel1', `numero1` =  '$tel11' WHERE cod_telefono='$telf1'   ;",$conex);
mysql_query ("UPDATE  telefono SET `cod_codigo_area` =  '$tel2', `numero1` =  '$tel22' WHERE cod_telefono='$telf2'   ;",$conex);
mysql_query ("UPDATE  telefono SET `cod_codigo_area` =  '$tel3', `numero1` =  '$tel33' WHERE cod_telefono='$telf3'   ;",$conex);
mysql_query ("UPDATE  telefono SET `cod_codigo_area` =  '$tel4', `numero1` =  '$tel44' WHERE cod_telefono='$telf4'   ;",$conex);
$b = mysql_query ("UPDATE  socios SET  correo =  '$cor'  where cedula='$cedula_Soc';  ",$conex);
					
require_once("opciones/conexion_administrador.php");



date_default_timezone_set("America/Caracas" ) ; 
$dd = date('d',time() - 3600*date('I')); 

date_default_timezone_set("America/Caracas" ) ; 
$mm = date('m',time() - 3600*date('I')); 

date_default_timezone_set("America/Caracas" ) ; 
$aaaa = date('Y',time() - 3600*date('I')); 

$as = mysql_query ("INSERT INTO  actualizacion (`cod_actualizacion` ,`cod_usuario` ,`Cedula_Socio` ,`fecha`, `dia`, `mes`, `aaaa`)VALUES (NULL ,  '$usuid',  '$cedula_Soc', NOW( ),'$dd','$mm','$aaaa');  ",$conexadmi);



if($b)
	{
echo "<script type='text/javascript'> alert('Datos Actualizado');  document.location.href = ('inicio.php'); </script>";
	
	}
else 
	{
	echo "<script type='text/javascript'> alert('Error Actualizacion. '); document.location.href = ('Registro_Socios.php'); </script>";
	}



















			
}


?>
<div class="panel"  >
<div  class="panel2"   > 
<div  class="panel3" style=" margin:70px 180px;"   >
<div>
       
	   
	   
	   
	   
 <? 
 $cedula= $_SESSION["cedulaS"];
 $personas =mysql_query("SELECT * FROM socios where cedula='$cedula' ",$conex);											
while($vector = mysql_fetch_assoc($personas))
{ $ced=$vector['cedula'];}

 

 
 
 ?>
 <?if($ced==""){?>
	   
	   	   <form id="form" name="form" method="post" action="Actualizar_Telefono1.php">
       
			<table align="center"   border="0" cellpadding="0" cellspacing="0">
				</br>
				<tr>
				  <td id="titulo1"  colspan="2" align="center" >Consulta y Actualizacion de Socios </td>
				</tr>
				 
				
				
				<tr>
						
						 
					<td>Cedula:</td>
						<td>
							<input name="cedula"  type="text" id="cedula" size="19" maxlength="10" onKeyPress="return permite(event,'num')">
						</td>
				</tr>
				
				
				
				
				<tr>   
					<td colspan=4 align="center" >
						 <input name="Regresas" type="submit" id="Regresas" value="Consultar"  />
					</td>                                
				</tr>
			</table>
        </form>
	   
	<? }?>   
	
	
	
	<?					
$b = mysql_query ("SELECT * FROM telefono as tel inner join codigo_area as ca on(tel.cod_codigo_area=ca.cod_codigo_area) where cedula='$ced' and n=1;  ",$conex);
while($ve=mysql_fetch_assoc($b)){$num1=$ve['numero1'];$are1=$ve['n_area'];$Cod1=$ve['cod_codigo_area'];}	

$b = mysql_query ("SELECT * FROM telefono as tel inner join codigo_area as ca on(tel.cod_codigo_area=ca.cod_codigo_area) where cedula='$ced' and n=2;  ",$conex);
while($ve=mysql_fetch_assoc($b)){$num2=$ve['numero1'];$are2=$ve['n_area'];$Cod2=$ve['cod_codigo_area'];}	
								
			
$b = mysql_query ("SELECT * FROM telefono as tel inner join codigo_area as ca on(tel.cod_codigo_area=ca.cod_codigo_area) where cedula='$ced' and n=3;  ",$conex);
while($ve=mysql_fetch_assoc($b)){$num3=$ve['numero1'];$are3=$ve['n_area'];$Cod3=$ve['cod_codigo_area'];}	
								
			
$b = mysql_query ("SELECT * FROM telefono as tel inner join codigo_area as ca on(tel.cod_codigo_area=ca.cod_codigo_area) where cedula='$ced' and n=4;  ",$conex);
while($ve=mysql_fetch_assoc($b)){$num4=$ve['numero1'];$are4=$ve['n_area'];$Cod4=$ve['cod_codigo_area'];}	

$b = mysql_query ("SELECT * FROM Socios where cedula='$ced'  ",$conex);
while($ve=mysql_fetch_assoc($b)){$cor=$ve['correo'];}					
	?>
	   
	<form id="form1" name="form1" method="post" action="Actualizar_Telefono1.php">
	<table  border="0" cellpadding="0" cellspacing="0">
				
				<tr>
				  <td id="titulo1" colspan="4" align="center" bgcolor="#FFFFFF"> Datos del Nuevo Socio</td>
				</tr>
				
				<tr>
								<td>Teléfono Hab:</td>
								<td> 
									  <select  name="tel1" id="tel1">
									
									  <option required value="<?echo$Cod1;?>"> <?echo $are1;?> </option>
									  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `codigo_area` WHERE `tipo`='l'  ; ",$conex);?>
									  <?php while($vec1=mysql_fetch_row($buscar)){?>
									  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
									  <?php } ?>
									  </select>
									  
									  <input name="tel11" value="<?echo $num1;?>"  type="text"  size="7" maxlength="7" onKeyPress="return permite(event,'num')" >
								</td>
								<td>Teléfono Cel:</td>
								<td> 
											  <select  name="tel2"  id="tel2">
										
											  <option required value="<?echo$Cod2;?>"><?echo $are2;?></option> 
											  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `codigo_area`   ; ",$conex);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
											  <?php } ?>
											  </select>
											 
											 <input name="tel22" value="<?echo $num2;?>" type="text"  size="7" maxlength="7" onKeyPress="return permite(event,'num')" >
								</td>
								
				</tr>
				<tr>
								<td>Teléfono Ofc:</td>
								<td> 
									  <select  name="tel3"   id="tel3">
									  <option required value="<?echo $Cod3;?>"><?echo $are3;?></option>
									  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `codigo_area` WHERE `tipo`='l'  ; ",$conex);?>
									  <?php while($vec1=mysql_fetch_row($buscar)){?>
									  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
									  <?php } ?>
									  </select>
									  
									  <input name="tel33" value="<?echo $num3;?>" type="text" id="tel33" size="7" maxlength="7" onKeyPress="return permite(event,'num')" >
								</td>
								<td>Teléfono Otros:</td>
								<td> 
										
										
											  <select  name="tel4"   id="tel4">
											  <option required value="<?echo $Cod4;?>"> <?echo $are4;?> </option>
											  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `codigo_area`; ",$conex);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
											  <?php } ?>
											  </select>
											 
											 <input name="tel44" value="<?echo $num4;?>"  type="text" id="tel44" size="7" maxlength="7" onKeyPress="return permite(event,'num')" >
								</td>
								
				</tr>
				
				<tr>
					<td>Email:</td>
					<td> 
						<input value="<? echo $cor;?>" name="correo"  type="text" id="correo" size="30" maxlength="50"  >
						<input value="<? echo $ced;?>" name="cedula_Soc"  type="hidden" id="cedula_Soc" size="30" maxlength="50"  >
					</td>	
					
						


					
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
