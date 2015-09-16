<?
session_start();
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
			<script type="text/javascript" src="JavaScript/jquery.js"></script>
			
			<!--------------quitar el escrol ----------------->
			<style type="text/css">  body {overflow-y:hidden; overflow-x:hidden }</style>

						<script language="javascript">
						window.onload = function() {
                        myFunction(str);
						}						
						</script>

</head>

<body>

<script type="text/javascript">
	$(document).ready(function() {
		/* COMBOBOX */
		$("#idpadre").change(function(event)
		{
			var idpadre = $(this).find(':selected').val();
			$("#pidhijo").html("<img src='loading.gif' />");
			$("#pidhijo").load('combobox.php?buscar=hijos&idpadre='+idpadre);
			var idhijo = $("#idhijo").find(':selected').val();
			$("#pidnieto").html("<img src='loading.gif' />");
			$("#pidnieto").load('combobox.php?buscar=nietos&idhijo='+idhijo);
		});
		$("#idhijo").live("change",function(event)
		{
			var id = $(this).find(':selected').val();
			$("#pidnieto").html("<img src='loading.gif' />");
			$("#pidnieto").load('combobox.php?buscar=nietos&idhijo='+id);
		});
	});
	
	
	function guardar(){

	 if(document.form1.nombre_usu.value.length==0){
		alert("Defina los nombres");
		document.form1.nombre_usu.focus();
	}
	else if(document.form1.apellido_usu.value.length==0){
		alert("Defina los Apellidos"); 
       document.form1.apellido_usu.focus(); 
	}
	else if(document.form1.nacionalidad.value.length==0){
		alert("Defina Nacionalidad");
		document.form1.nacionalidad.focus();
	}
	else if(document.form1.cedula.value.length==0){
		alert("Defina Numero de Cedula");
		document.form1.cedula.focus();
	}
	else if(document.form1.F_Nac.value.length==0){
		alert("Defina Fecha de Nacimiento");
		document.form1.F_Nac.focus();
	}
	else if(document.form1.sexo.value.length==0){
		alert("Defina Tipo de Sexo");
		document.form1.sexo.focus();
	}
	else if(document.form1.tel1.value.length==0){
		alert("Defina Código de operadora de Teléfono Habitación ");
		document.form1.tel1.focus();
	}
	else if(document.form1.tel11.value.length==0){
		alert("Defina Telefono Habitación");
		document.form1.tel1.focus();
	}
	else if(document.form1.tel2.value.length==0){
		alert("Defina Código de operadora de Teléfono Celular ");
		document.form1.tel2.focus();
	}
	else if(document.form1.tel22.value.length==0){
		alert("Defina Telefono Celular");
		document.form1.tel22.focus();
	}
	else if(validaEmail(document.form1.correo.value) == false){
		alert("E-mail Incorrecto, Verifíquelo")
	}
	
	else if(valida(document.form1.nro_cuenta.value) == false){
		alert("Ingrese Nro. Cuenta");
	}
	else if(document.form1.nomina.value.length==0){
		alert("Defina Tipo de Nomina");
		document.form1.nomina.focus();
	}

	else if(document.form1.organismo.value.length==0){
		alert("Defina Tipo de Organismo");
		document.form1.organismo.focus();
	}
	else if(document.form1.est_civil.value.length==0){
		alert("Defina Estado Civil");
		document.form1.est_civil.focus();
	}
	
	else if(document.form1.v.value.length==0){
		alert("Defina vivienda ");
		document.form1.v.focus();
	}
	else if(document.form1.direccion.value.length==0){
		alert("Defina direccion ");
		document.form1.direccion.focus();
	}
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
			
function valida(){
		if(document.getElementById("nro_cuenta").value.length <= 19){
			return false;
		}else if(document.getElementById("nro_cuenta").value.length ==0){
			return false;
		}
		else{
			return true;	
		}
	}
	
	function regresas(){
document.form1.boton2.value="Regresas";
	

	document.location.href = ('inicio.php');
document.form1.href = ('inicio.php'); 
	
}	
	</script>

	
<script>

function guardar1(){
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=408, height=500, top=85, left=140, Text-align=left";
window.open('Carga_Cedula.php','SIGMA',opciones);	
	//window.open('BASSugerencias.php','Capreminfra','width=300, height=400')

}
</script>
	
	
	
	
	
	
	
<?
 if($_POST['boton1']=="entrar")
			{
		
			$cedula_s=$_SESSION["cedulaS"];	
			$cod_socio=$_SESSION["cod_socio"];


			
			
			
			
			$nom=$_POST["nombre_usu"];
			$ape=$_POST["apellido_usu"];
			$nac=$_POST["nacionalidad"];
			$cedula=$_POST["cedula"];
			$fec_n=$_POST["Fecha_Nac"];
			$sex=$_POST["sexo"];
			$tel1=$_POST["tel1"];
			$tel11=$_POST["tel11"];
			$tel2=$_POST["tel2"];
			$tel22=$_POST["tel22"];
			$tel3=$_POST["tel3"];
			$tel33=$_POST["tel33"];
			$tel4=$_POST["tel4"];
			$tel44=$_POST["tel44"];
			$cor=$_POST["correo"];
			$n_cue=$_POST["nro_cuenta"];
			$nomi=$_POST["nomina"];
			$org=$_POST["organismo"];
			$e_civ=$_POST["est_civil"];
			
			
			 $n_cue2=$_POST["nro_cuenta2"];
			 $n_cue3=$_POST["nro_cuenta3"];
			
			$vivienda=$_POST["v"];
			$direccion=$_POST["direccion"];
			$estado=$_POST["pais"];
			$municipio=$_POST["estado"];
			$parroquia=$_POST["ciudad"];
			
			
		
				
				
				$nombre = explode(" ",$nom);
				$nom1=ucwords($nombre[0]); // porción1
				$nom2=ucwords($nombre[1]); // porción2
				$nom3=ucwords($nombre[2]);
				$nom4=ucwords($nombre[3]);
				
				
				$apellido = explode(" ",$ape);
				 $ape1=ucwords($apellido[0]); // porción1
				$ape2=ucwords($apellido[1]); // porción2
				
				
				$apel = explode(" ",$ape);
				$ap3=ucwords($apel[2]);
				$ap4=ucwords($apel[3]);
	
		include("opciones/conexion.php");
	
		/*	disabled="disabled"*/

		
$b1 = mysql_query ("UPDATE  `capreminfra`.`socios` SET  
`nacionalidad` =  '$nac',
`sexo` =  '$sex',
`N_cuenta` =  '$n_cue',
`F_nacimiento` =  '$fec_n',
`correo` =  '$cor',
`cod_est_civil` =  '$e_civ'  where cedula='$cedula_s';  ",$conex);


include("opciones/conexion.php");


$b1 =mysql_query ("UPDATE  `capreminfra`.`socios` SET 
 `nom_ape` =  '$nom $ape',
`nombre1` =  '$nom1 $nom2',
`nombre2` =  '$nom3 $nom4',
`apellido1` =  '$ape1 $ape2',
`apellido2` =  '$ap3 $ap4' WHERE  cod_socio = '$cod_socio'  and cedula='$cedula_s';  ",$conex);




mysql_query ("UPDATE  `capreminfra`.`socios` SET  `N_cuenta` =  '$n_cue',`N_cuenta2` =  '$n_cue2',`N_cuenta3` =  '$n_cue3' WHERE  `socios`.`cod_socio` = '$cod_socio'  and cedula='$cedula_s';  ",$conex);


					
 mysql_query ("UPDATE  nomina SET  `cod_organismo` =  '$org',`cod_tipo_nomina` =  '$nomi' where cod_socio='$cod_socio';  ",$conex);
					



 $b=mysql_query ("SELECT * FROM telefono  where cedula='$cedula_s';  ",$conex);
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


mysql_query ("UPDATE  direccion SET `direccion` =  '$direccion', `cod_vivienda` =  '$vivienda' , `cod_estado`='$estado', `cod_municipio`='municipio', `cod_parroquia`='parroquia' WHERE cedula_d='$cedula_s'   ;",$conex);


if($b1)
	{
echo "<script type='text/javascript'>  alert('actualizado');</script>";
	
	}
else 
	{
	echo "<script type='text/javascript'> alert('Lo sentimos no actualizado '); document.location.href = ('Actualizar_socios1.php'); </script>";
	}




}?>




<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div>

<?

//$cedulaS="19064849";
$cedulaS=$_SESSION["cedulaS"];	
$cod_socio=$_SESSION["cod_socio"];
					
				
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
$sexo1=$v1['sexo'];
$nro=$v1['N_cuenta'];
$nro2=$v1['N_cuenta2'];
$nro3=$v1['N_cuenta3'];
$F_ingreso=$v1['F_ingreso'];
$f_ing = substr($F_ingreso, 0, -9); 
$fec=$v1['F_nacimiento'];
$cod_estatus=$v1['Cod_estatus'];
$cor=$v1['correo'];
$cod_est_civil=$v1['cod_est_civil'];
$Actualizacion=$v1['Actualizacion'];

$nombres=("$nom1 $nom2");
$apellidos=("$ape1 $ape2");

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


//estado(direccion)
$b7 = mysql_query ("SELECT estado.estado,municipio.municipio,direccion.cod_estado  FROM socios INNER JOIN direccion ON (direccion.cod_socio = socios.cod_socio) 

INNER JOIN estado ON (estado.cod_estado = direccion.cod_estado)
INNER JOIN municipio ON municipio.cod_municipio = direccion.cod_municipio

where cedula_d='$cedulaS'

",$conex);
while ($v7=mysql_fetch_assoc($b7)){

$est=$v7['estado'];
$cod_est=$v7['cod_estado'];
$_SESSION["cod_municipio"]=$mun=$v7['cod_municipio'];
$_SESSION["cod_municipio"]=$mun=$v7['parroquia'];
}


//direccion larga
$b6 = mysql_query ("SELECT direccion.direccion,vivienda.tipo_vivienda FROM direccion INNER JOIN vivienda ON (direccion.cod_vivienda = vivienda.cod_vivienda) where cedula_d='$cedulaS'",$conex);
while($v6=mysql_fetch_assoc($b6)) { $dir=$v6['direccion']; $cod_vivienda=$v6['cod_vivienda'];  $tipo_vivienda=$v6['tipo_vivienda']; }




?>


	   	   
<form id="form1" name="form1" method="post" action="Actualizar_Socios1.php">
	<table  border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate; border-spacing:5px 5px;" >
				
				<tr>
				  <td id="titulo1" colspan="4" align="center" bgcolor="#FFFFFF"> Actualización de <? echo $nombres." ".$apellidos?></td>
				</tr>
				
				<tr>
					  <td>Nombres:</td>
					  <td><input value="<? echo $nombres;?>" name="nombre_usu"  type="text" id="nombre_usu" size="30" maxlength="60" onKeyPress="return permite(event,'car')"></td>
					  <td>Apellidos:</td>
					  <td><input value="<? echo $apellidos;?> " name="apellido_usu"  type="text" id="apellido_usu" size="34" maxlength="60" onKeyPress="return permite(event,'car')"></td>
				</tr>
				
				<tr>
						
						<!-- readonly="readonly"-->
					  <td>Cédula:</td>
						<td>
							<select name="nacionalidad" size="1" id="nacionalidad">
								<option value="<? echo $n;?>"><? echo $n;?></option>
								<option value="V">V</option>
								<option value="E">E</option>
							 </select>
							 <input readonly   value="<? echo $cd;?>" name="cedula"  type="text" id="cedula" size="10" maxlength="10" onKeyPress="return permite(event,'num')">
						</td>
						<td>F. Nacimiento:</td>
						<td>
						<input  value="<? echo $fec;?>" name="Fecha_Nac" type="date" id="F_Nac" size="10" maxlength="10">
							
							Sexo:
							<select name="sexo" size="1" id="sexo">
								<option value="<? echo $sexo1;?>"><? echo $sexo1;?></option>
								<option value="M">M</option>
								<option value="F">F</option>
							</select>
						</td>
            
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
											  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `codigo_area` WHERE `tipo`='c'  ; ",$conex);?>
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
					</td>	
					
					<td>Número de Cuenta 1:</td>
					<td> 
						<input value="<? echo $nro;?>" name="nro_cuenta" value="" type="text" id="nro_cuenta" size="34" maxlength="20" onKeyPress="return permite(event,'num')" >
					</td>	


					
				</tr>
				
					<td>Número de Cuenta 2:</td>
					<td> 
						<input value="<? echo $nro2;?>" name="nro_cuenta2" value="" type="text" id="nro_cuenta2" size="34" maxlength="20" onKeyPress="return permite(event,'num')" >
					</td>		
					
					<td>Número de Cuenta 3:</td>
					<td> 
						<input value="<? echo $nro3;?>" name="nro_cuenta3" value="" type="text" id="nro_cuenta3" size="34" maxlength="20" onKeyPress="return permite(event,'num')" >
					</td>	


					
				</tr>
				
				
				
				<tr>
					<td>Tipo Nomina:</td>
					<td> 
											  <select  name="nomina"  id="nomina">
											  <option required value="<?php echo $id_tipo_nomina; ?>"> <?php echo $nomina;  ?> </option>
											  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `tipo_nomina`;  ",$conex);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
											  <?php } ?>
											  </select>	
					</td>	
					<td>Organismo:</td>
					<td> 
											  <select  name="organismo"  id="organismo">
											 <option required value="<?php echo $id_org; ?>"> <?php echo $org;  ?> </option>
											  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `organismo`  ",$conex);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
											  <?php } ?>
											  </select>
					</td>	
				</tr>
				
				<tr>
					<td>Estado Civil (actual):</td>
					<td> 
											  <select  name="est_civil"  id="est_civil">
											  <option required value="<?php echo $id_est_civil; ?>"> <?php echo $EstCivil;  ?> </option>;
											  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `est_civil`; ",$conex);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
											  <?php } ?>
											  </select>	
					</td>
				</tr>
				
				
				<tr>
				  <td id="titulo1" colspan="4" align="center" bgcolor="#FFFFFF" style="border-collapse:separate; border-spacing:5px 5px;"  >Dirección</td>
				</tr>

			

				<? include('combo.php') ?>
						
					

					
					<td>Vivienda:</td>
					<td>
											<select  name="v"   id="v" >
											  <option required value="<? echo $row3[0] ?>"><? echo $row3[1] ?></option>;
											  <option required value="1">Casa</option>;
											  <option required value="2">Apartamento</option>;
											</select>
					</td>
				</tr>

			<tr>					
								<td Colspan=1>Dirección:</td>
								<td Colspan=3><textarea   name="direccion" rows="2" cols="70" size="17" maxlength="60" onKeyPress="return permite(event,'num_car')" ><?echo $dir;?> </textarea> </td>
				</tr>
				
		
				
				<tr>   
					<td colspan=4 align="center" >
						 <input name="boton1" type="HIDDEN" id="boton1" />
						 <input name="modificar" type="button" id="modificar" value="Guardar" onClick="guardar()" />
						 
						 <input name="boton2" type="HIDDEN" id="boton2" />
						 <input name="Regresas" type="button" id="Regresas" value="Regresas" onclick="regresas()" />
					</td>                                
				</tr>
	</form>   
	   
	   
	   
	   
					<tr>   
						<td colspan=4 >
						
							<form id="form2" name="form2" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">		
							
							<input name="boton1" type="HIDDEN" id="boton1" />
							 <input name="modificar" type="button" id="modificar"  value="Cargar Cedula" Title="Ver listado"  onClick="guardar1()" />
							
							</form>
							
						</td>    
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
