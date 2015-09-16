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
 $_SESSION["idhijo"];
 $_SESSION["idpadre"];
 $_SESSION["nieto"];

 			
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
			<script type="text/javascript" src="JavaScript/jquery.js"></script>
			
			<!--------------quitar el escrol ----------------->
			<style type="text/css">  body {overflow-y:hidden; overflow-x:hidden }</style>



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

	 if(document.form1.nombre.value.length==0){
		alert("Defina los nombres");
		document.form1.nombre.focus();
	}
	else if(document.form1.apellido.value.length==0){
		alert("Defina los Apellidos"); 
       document.form1.apellido.focus(); 
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

<?
 if($_POST['boton1']=="entrar")
			{
			
			$servidor="127.0.0.1";
			$usuario="root";
			$clave="1234";
			$db_nombre="capreminfra";


			$conex=@mysql_connect($servidor,$usuario,$clave) or die(mysql_error());
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

			/*$estado=$nom=$_SESSION["estado"];
			$municipio=$_SESSION["municipio"];
			*/
			$estado=$_POST["estado"];
			$municipio=$_POST["municipio"];
			$parroquia=$_POST["parroquia"];
  
			

  
  
  
  
			$nom=$_POST["nombre"];
			$ape=$_POST["apellido"];
			$nac=$_POST["nacionalidad"];
			$cedula=$_POST["cedula"];
			$fec_n=$_POST["Fecha_Nac"];
			$sexo=$_POST["sexo"];
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
			
			
			
			
			
			
			$vivienda=$_POST["v"];
			$direccion=$_POST["direccion"];
			
			/*
			$estado=$_SESSION["idpadre"];
			$municipio=$_SESSION["idhijo"];
			$parroquia=$_SESSION["nieto"];
				*/
				
				
				$nombre = explode(" ",$nom);
				$nom1=ucwords($nombre[0]); // porción1
				$nom2=ucwords($nombre[1]); // porción2
				$nom3=ucwords($nombre[2]);
				$nom4=ucwords($nombre[3]);
				$apellido = explode(" ",$ape);
				$ape1=ucwords($apellido[0]); // porción1
				$ape2=ucwords($apellido[1]); // porción2
				$ape3=ucwords($apellido[2]);
				$ape4=ucwords($apellido[3]);
				$ape5=ucwords($apellido[4]);
			
			
$consulta=mysql_query("INSERT INTO `capreminfra`.`socios` (
`cod_socio` ,
`nom_ape` ,
`nombre1` ,
`nombre2` ,
`apellido1` ,
`apellido2` ,
`nacionalidad` ,
`cedula` ,
`RIF` ,
`sexo` ,
`N_cuenta` ,
`F_ingreso` ,
`F_nacimiento` ,
`cod_estatus` ,
`correo` ,
`cod_est_civil` 

)
VALUES (NULL , '$nom1 $nom2 $nom3 $nom4 $ape1 $ape2 $ape3 $ape4 $ape5', '$nom1 $nom2', '$nom3 $nom4', '$ape1 $ape2', '$ape3 $ape4 $ape5', '$nac', '$cedula', 'null', '$sexo', '$n_cue', NOW( ) , '$fec_n', '1', '$cor','$e_civ'); ",$conex);
	
	
	
	
						$b = mysql_query ("SELECT * FROM socios  where cedula='$cedula';  ",$conex);
						while($v=mysql_fetch_assoc($b))
								{
									$c_socio=$v['cod_socio'];
									$_SESSION["cod_socio"]=$v['cod_socio'];
									$_SESSION["cedulaS"]=$v['cedula'];
								
								}		
				
				
		$b = mysql_query ("SELECT * FROM socios  where cod_socio='$cedula';  ",$conex);while($v=mysql_fetch_assoc($b))	{$cedula=$v['cedula']; }	
			

$consulta1=mysql_query("INSERT INTO direccion ( `cod_direccion`,`direccion`,`cod_estado` ,`cod_municipio` ,`cod_parroquia` ,`cod_vivienda`,`cod_socio` ,`cedula_d`) 
VALUES ( NULL , '$direccion','$estado', '$municipio', '$parroquia', '$vivienda','$c_socio' , '$cedula') ",$conex);
	
			
		


		
if($consulta){
		
	$consulta1=mysql_query("INSERT INTO `capreminfra`.`telefono`  (`cod_telefono`,`cod_socio` ,`cod_codigo_area` ,`numero1`,`cedula` ,`N` ) VALUES ( NULL ,'$c_socio', '$tel1', '$tel11' ,'$cedula',1) , (NULL ,'$c_socio','$tel2', '$tel22','$cedula',2), (NULL ,'$c_socio','$tel3', '$tel33','$cedula',3), (NULL ,'$c_socio','$tel4', '$tel44','$cedula',4);",$conex);
	$consulta12=mysql_query("INSERT INTO `capreminfra`.`nomina` (`cod_nomina`,`cod_organismo`,`cod_tipo_nomina`,`cod_socio`) VALUES ( NULL , '$org', '$nomi', '$c_socio');",$conex);
				
			if($consulta1){
				
							?><script type="text/javascript">				
							window.open("reportes/r_socio.php","mywindow","location=1,status=1,scrollbars=1,width=100,height=100");
							</SCRIPT><?
						echo "<script type='text/javascript'> alert('Su Solicitud ha sido enviada satisfactoriamente, recuerde imprimir la planilla y enviar junto con los recaudos correspondientes');document.location.href = ('inicio.php'); </script>";
							
							}
						else
							{
								echo "<script type='text/javascript'> alert('Lo sentimos el registro  de sus datos no son  validos  '); document.location.href = ('inicio.php'); </script>";
							}
						}
							
else
		{
					echo "<script type='text/javascript'> alert('Lo sentimos el registro  de sus datos no son  validos'); document.location.href = ('inicio.php'); </script>";
		}
		
		
		
}

				
			
				
	?>




<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div>
<?php
function idpadre($nombre,$valor)
{
	include("config.inc.php");
	$query = "SELECT cod_estado as idpadre, estado as padre from estado order by cod_estado";
	mysql_select_db($dbname);
	$result = mysql_query($query);
	echo "<select name='$nombre' id='$nombre'>";
	echo "<option value='1'>Selecciona un Estado</option>";
	while($registro=mysql_fetch_array($result))
	{

	echo "<option value='".$registro["idpadre"]."'";
		if ($registro["idpadre"]==$valor) echo " selected";
		echo ">".$registro["padre"]."</option>\r\n";
	}
	echo "</select>";
}

function idhijo($nombre,$valor)
{
	include("config.inc.php");
	$query = "SELECT * FROM municipio order by municipio";
	mysql_select_db($dbname);
	$result = mysql_query($query);
	echo "<select name='$nombre' id='$nombre'>";
	echo "<option value=''>Selecciona Municipio</option>";
	while($registro=mysql_fetch_array($result))
	{
		echo "<option value='".$registro["idhijo"]."'";
		if ($registro["idhijo"]==$valor) echo " selected";
		echo ">".$registro["hijo"]."</option>\r\n";
	}
	echo "</select>";
}

function idnieto($nombre,$valor)
{
	include("config.inc.php");
	$query = "SELECT * FROM parroquia order by parroquia";
	mysql_select_db($dbname);
	$result = mysql_query($query);
	echo "<select name='$nombre' id='$nombre'>";
	echo "<option value=''>Selecciona una Parroquia</option>";
	while($registro=mysql_fetch_array($result))
	{
		echo "<option value='".$registro["idnieto"]."'";
		if ($registro["idnieto"]==$valor) echo " selected";
		echo ">".$registro["nieto"]."</option>\r\n";
	}
	echo "</select>";
}
?>
       

	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	


<!-- <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>"> -->
<form id="form1" name="form1" method="post" action="Registro_Socios.php">
	<table  border="0" cellpadding="0" cellspacing="0">
				
				<tr>
				  <td id="titulo1" colspan="4" align="center" bgcolor="#FFFFFF"> Datos del Nuevo Socio</td>
				</tr>
				
				<tr>
					  <td>Nombres:</td>
					  <td><input name="nombre"  type="text" id="nombre" size="30" maxlength="60" onKeyPress="return permite(event,'car')"></td>
					  <td>Apellidos:</td>
					  <td><input name="apellido"  type="text" id="apellido" size="34" maxlength="60" onKeyPress="return permite(event,'car')"></td>
				</tr>
				
				<tr>
						
						 
					  <td>Cedula:</td>
						<td>
							<select name="nacionalidad" size="1" id="nacionalidad">
								<option value="V">V</option>
								<option value="E">E</option>
							 </select>
							 <input name="cedula"  type="text" id="cedula" size="10" maxlength="10" onKeyPress="return permite(event,'num')">
						</td>
						<td>F. Nacimiento:</td>
						<td>
							<input name="Fecha_Nac" type="date" id="F_Nac" size="10" maxlength="10">
							Sexo:
							<select name="sexo" size="1" id="sexo">
								<option value="M">M</option>
								<option value="F">F</option>
							</select>
						</td>
            
				</tr>
				<tr>
								<td>Teléfono Hab:</td>
								<td> 
									  <select  name="tel1" id="tel1">
									  <option required value="">  </option>;
									  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `codigo_area` WHERE `tipo`='l'  ; ",$conex);?>
									  <?php while($vec1=mysql_fetch_row($buscar)){?>
									  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
									  <?php } ?>
									  </select>
									  
									  <input name="tel11"  type="text"  size="7" maxlength="7" onKeyPress="return permite(event,'num')" >
								</td>
								<td>Teléfono Cel:</td>
								<td> 
											  <select  name="tel2"  id="tel2">
											  <option required value="">  </option>;
											  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `codigo_area` WHERE `tipo`='c'  ; ",$conex);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
											  <?php } ?>
											  </select>
											 
											 <input name="tel22"  type="text"  size="7" maxlength="7" onKeyPress="return permite(event,'num')" >
								</td>
								
				</tr>
				<tr>
								<td>Teléfono Ofc:</td>
								<td> 
									  <select  name="tel3"   id="tel3">
									  <option required value=""></option>;
									  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `codigo_area` WHERE `tipo`='l'  ; ",$conex);?>
									  <?php while($vec1=mysql_fetch_row($buscar)){?>
									  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
									  <?php } ?>
									  </select>
									  
									  <input name="tel33" type="text" id="tel33" size="7" maxlength="7" onKeyPress="return permite(event,'num')" >
								</td>
								<td>Teléfono Otros:</td>
								<td> 
											  <select  name="tel4"  id="tel4">
											  <option required value="<?php echo $meses; ?>"> <?php echo $meses;  ?> </option>;
											  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `codigo_area`; ",$conex);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
											  <?php } ?>
											  </select>
											 
											 <input name="tel44" type="text" id="tel44" size="7" maxlength="7" onKeyPress="return permite(event,'num')" >
								</td>
								
				</tr>
				
				<tr>
					<td>Email:</td>
					<td> 
						<input name="correo"  type="text" id="correo" size="30" maxlength="50"  >
					</td>	
					
					<td>Número de Cuenta:</td>
					<td> 
						<input name="nro_cuenta" value="" type="text" id="nro_cuenta" size="34" maxlength="20" onKeyPress="return permite(event,'num')" >
					</td>	


					
				</tr>
				
				
				<tr>
					<td>Tipo Nomina:</td>
					<td> 
											  <select  name="nomina"  id="nomina">
											  <option required value="<?php echo $meses; ?>"> <?php echo $meses;  ?> </option>
											  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `tipo_nomina`;  ",$conex);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
											  <?php } ?>
											  </select>	
					</td>	
					<td>Organismo:</td>
					<td> 
											  <select  name="organismo"  id="organismo">
											 <!--   <option required value="<?php echo $meses; ?>"> <?php echo $meses;  ?> </option>;;-->
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
											  <option required value="<?php echo $meses; ?>"> <?php echo $meses;  ?> </option>;
											  <?include("opciones/conexion.php"); $buscar = mysql_query ("SELECT * FROM `est_civil`; ",$conex);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
											  <?php } ?>
											  </select>	
					</td>
				</tr>
				
				
				<tr>
				  <td id="titulo1" colspan="4" align="center" bgcolor="#FFFFFF"> Datos del Dirección</td>
				</tr>
				
				<script src="JavaScript/ajax.js"></script>

					<script>

					function myFunction(str)
					{
					loadDoc("q="+str,"opciones/proc.php",function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
						}
					  });
					}

					function myFunction2(str)
					{
					loadDoc("r="+str,"opciones/proc2.php",function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						document.getElementById("myDiv2").innerHTML=xmlhttp.responseText;
						}
					  });
					}

					</script>



				<tr>
					<td><label>Estado:</label></td> 
					<td>
						<p> 
						<?php
						include 'opciones/conexion1.php';
						$con=conexion();
						$res=mysql_query("select * from estado",$conex);

						?>

						<select id="cont" name="estado" onchange="myFunction(this.value)">

						<option value="">Seleccione</option>

						<?php

						while($fila=mysql_fetch_array($res)){

						?>

						 <option value="<?php echo $fila['cod_estado']; ?>"><?php echo $fila['estado']; ?></option>

						<?php } ?>

						</select>
						</p>
					</td>
					<td><label>Municipio:</label></td> 
					<td>	
					<div id="myDiv"></div><!--div donde aparecen los paises-->
					</td>
				</tr>
				
				
				<tr>
					<td><label>Parroquia:</label></td> 
					<td><div id="myDiv2"></div>	</td>
					<td>Vivienda:</td>
					<td>
											<select  name="v"   id="v" >
												<option required value="">Seleccione</option>;
											  <option required value="1">Casa</option>;
											  <option required value="2">Apartamento</option>;
											</select>
					</td>
				</tr>

			

				
				
				<!-- 
				<tr>
					<td><label>Estado:</label></td> 
					<td>	<p><label></label> <?php idpadre("idpadre","1"); ?></p></td>
					<td><label>Municipio:</label></td> 
					<td>	<p id="pidhijo"><label></label><?php idhijo("idhijo","2"); ?></p></td>
				</tr>				
				<tr>
					<td><label>Parroquia:</label></td> 
					<td>	<p id="pidnieto"><label></label><?php $idnieto=idnieto("idnieto","3"); ?></p></td>
					<td>Vivienda:</td>
					<td>
											<select  name="v"   id="v" >
												<option required value="">Seleccione</option>;
											  <option required value="1">Casa</option>;
											  <option required value="2">Apartamento</option>;
											</select>
					</td>
				</tr>


-->




















				
				
				<tr>					
								<td Colspan=1; >Direcciòn:</td>
								<td Colspan=3;><textarea name="direccion" rows="2" cols="70" size="17" maxlength="60" onKeyPress="return permite(event,'num_car')" > </textarea> </td>
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
	   
	   
	  
	   
	   
	   <?//<input name="direccion" type="text" value="" size="17" maxlength="60" onKeyPress="return permite(event,'car')" >?>
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
<!--
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-266167-20");
pageTracker._setDomainName(".martiniglesias.eu");
pageTracker._trackPageview();
} catch(err) {}
</script>
-->
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
