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
			
			
			<!--------------quitar el escrol ----------------->
			<style type="text/css">  body {overflow-y:hidden; overflow-x:hidden }</style>



</head>

<body>

<script type="text/javascript">

function guardar(){

	 if(document.form1.mes.value.length==0){
		alert("Defina Mes");
		document.form1.mes.focus();
	}
	
	else if(document.form1.anos.value.length==0){
		alert("Defina Años"); 
       document.form1.anos.focus(); 
	}
	else if(document.form1.desde.value.length==0){
		alert("Defina Desde"); 
       document.form1.desde.focus(); 
	}else if(document.form1.hasta.value.length==0){
		alert("Defina Hasta"); 
       document.form1.hasta.focus(); 
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

 $mod_aux=$_POST["mod_aux"];
 $mod_cue=$_POST["mod_cue"];



$N_tabla=$_POST["N_tabla"];
$d=$_POST["d"];
$h=$_POST["h"];
$auxi=$_POST["auxi"];
$m=$_POST["m"];

//estos son las cuentas actuales 
$c=$_POST["c"];
$a=$_POST["a"];


			$conexion = odbc_connect("FOX","","","");
			
			if($mod_aux && $mod_cue )
			{
			//echo "opcion aux  vs cue";
			
					if($c && $a ){
					$r1= odbc_exec($conexion,"UPDATE '$N_tabla' set   ctamayor='$mod_cue', ctaauxi='$mod_aux' where numero => '$d' and numero <= '$h' and ctamayor ='$c' and ctaauxi='$a'  " );
					}else if ($c){
					$r1= odbc_exec($conexion,"UPDATE '$N_tabla' set   ctamayor='$mod_cue'  where numero => '$d' and numero <= '$h' and ctamayor ='$c' " );
					}else if ($a){
					$r1= odbc_exec($conexion,"UPDATE '$N_tabla' set  ctaauxi='$mod_aux'  where numero => '$d' and numero <= '$h' and ctaauxi='$a' " );
					}
			
			}
			else if ($mod_aux){
			//echo "opcion aux ";
			if($c && $a ){
					$r1= odbc_exec($conexion,"UPDATE '$N_tabla' set   ctamayor='$mod_cue', ctaauxi='$mod_aux' where numero => '$d' and numero <= '$h' and ctamayor ='$c' and ctaauxi='$a'  " );
					}else if ($c){
					$r1= odbc_exec($conexion,"UPDATE '$N_tabla' set   ctamayor='$mod_cue'  where numero => '$d' and numero <= '$h' and ctamayor ='$c' " );
					}else if ($a){
					$r1= odbc_exec($conexion,"UPDATE '$N_tabla' set  ctaauxi='$mod_aux'  where numero => '$d' and numero <= '$h' and ctaauxi='$a' " );
					}
			}
			else if ($mod_cue){
			//echo "opcion cue";
			if($c && $a ){
					$r1= odbc_exec($conexion,"UPDATE '$N_tabla' set   ctamayor='$mod_cue', ctaauxi='$mod_aux' where numero => '$d' and numero <= '$h' and ctamayor ='$c' and ctaauxi='$a'  " );
					}else if ($c){
					$r1= odbc_exec($conexion,"UPDATE '$N_tabla' set   ctamayor='$mod_cue'  where numero => '$d' and numero <= '$h' and ctamayor ='$c' " );
					}else if ($a){
					$r1= odbc_exec($conexion,"UPDATE '$N_tabla' set  ctaauxi='$mod_aux'  where numero => '$d' and numero <= '$h' and ctaauxi='$a' " );
					}
			}
			
			
			if($r1){
			echo "<script type='text/javascript'> alert('Cuentas contables Fueron Modificada Exitosamente ');document.location.href = ('inicio.php'); </script>";
					}
						
			
?>

<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div>
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
<table>
<tr>
	<td id="titulo2" colspan="5" align="center" bgcolor="#FFFFFF"> Actualizar Cuentas Contables</td>
</tr>

<tr>
	<td id="titulo1" >Fecha</td>
	<td>Mes</td>
	<td>
		<select name="mes" size="1" id="mes">
			<option value="01">Enero</option>
			<option value="02">Febrero</option>
			<option value="03">Marzo</option>
			<option value="04">Abril</option>
			<option value="05">Mayo</option>
			<option value="06">Junio</option>
			<option value="07">Julio</option>
			<option value="08">Agosto</option>
			<option value="09">Septiembre</option>
			<option value="10">Octubre</option>
			<option value="11">Noviembre</option>
			<option value="12">Diciembre</option>
		</select>
	</td>
	<td>Año</td>
	<td>
		    <input name="anos" type="text"  size="2"  maxlength="4"  >
	</td>
</tr>


<tr>
	<td id="titulo1" >N° Comprobante </td>
	<td>Desde</td>
	<td>
		<input name="desde" type="text"  size="5"  maxlength="10"  >
	</td>
	<td>Hasta</td>
	<td>
		<input name="hasta" type="text"  size="5"  maxlength="10"  >
	</td>
</tr>

<tr>
	<td id="titulo1" >Cuenta </td>
	<td>Mayor</td>
	<td>
		<input name="mayor" type="checkbox"  size="5"  maxlength="10"  >
	</td>
	<td>Auxiliar</td>
	<td>
		<input name="auxiliar" type="checkbox"  size="5"  maxlength="10"  >
	</td>
</tr>

<tr>
	<td></td>
	<td>Cuenta Actual</td>
	<td>
		<input name="cue" type="text"  size="5"  maxlength="10"  >
	</td>
	<td>Auxiliar Actual</td>
	<td>
		<input name="aux" type="text"  size="5"  maxlength="10"  >
	</td>
</tr>


<!--
<tr>
	<td>Modificar</td>
	<td>Cuenta</td>
	<td>
		<input name="mod_cue" type="checkbox"  size="5"  maxlength="10"  >
	</td>
	<td>Auxiliar</td>
	<td>
		<input name="mod_aux" type="checkbox"  size="5"  maxlength="10"  >
	</td>
</tr>
-->

<tr>
		<td colspan=5 align="center" >
			 <input name="boton1" type="HIDDEN" id="boton1" />
			<input name="modificar" type="button" id="modificar" value="Buscar" onClick="guardar()" />
						 
			 <input name="boton2" type="HIDDEN" id="boton2" />
			 <input name="Regresas" type="button" id="Regresas" value="Regresas" onclick="regresas()" />
		</td>        
	
</tr>
</table>
       
</form>


<?
			$aux=$_POST["aux"];
			$cue=$_POST["cue"];
			$mayor=$_POST["mayor"];
			$auxiliar=$_POST["auxiliar"];
			
			$hasta=$_POST["hasta"];
			$desde=$_POST["desde"];
			
			$anos=$_POST["anos"];
			$mes=$_POST["mes"];
			
			

if($_POST["anos"]){ ?>
<div style="width: 840px; height: 200px; overflow-y: scroll;">
<table align="center" width="600" border="0" cellspacing="0" cellpadding="1">
 

<tr>
    <th  id="titulo1" scope="col" >N°</th>
    <th  id="titulo1" scope="col" >Cta. Mayor</th>
    <th  id="titulo1" scope="col" >Cta. Auxiliar</th>
	<th  id="titulo1" scope="col" >Descripción</th>
	<th  id="titulo1" scope="col" >Debe</th>
	<th  id="titulo1" scope="col" >Haber</th>
</tr>	
 
 	<?   
			$tabla="$mes$anos".'2';
			$conexion = odbc_connect("FOX","","","");
			
			if($mayor && $auxiliar ){
			$sql1="Select * from '$tabla' where numero => '$desde' and numero <= '$hasta' and ctamayor ='$cue' and ctaauxi='$aux'  ";
			}else if ($mayor){
			$sql1="Select * from '$tabla' where numero => '$desde' and numero <= '$hasta' and ctamayor ='$cue' ";
			}else if ($auxiliar){
			$sql1="Select * from '$tabla' where numero => '$desde' and numero <= '$hasta' and ctaauxi='$aux' ";
			}else {
			$sql1="Select * from '$tabla' where numero => '$desde' and numero <= '$hasta'  ";
			}
			
			
			$result=odbc_exec($conexion,$sql1)or die(exit("Error en odbc_exec"));
			while (odbc_fetch_row($result)) {
			?>
			<td align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"numero");?>" type="text" id="cedula" size="5" maxlength="10" ></td>
			<td align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"ctamayor"); ?>" type="text" id="cedula" size="10" maxlength="10" ></td>
			<td align="center" ><input name="edad" value="<?echo $observa=odbc_result($result,"ctaauxi"); ?>" type="text" id="cedula" size="10" maxlength="10" ></td>
			<td align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"descrip"); ?>" type="text" id="cedula" size="35" maxlength="30" ></td>
			<td align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"debe"); ?>" type="text" id="cedula" size="10" maxlength="10" ></td>
			<td align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"haber"); ?>" type="text" id="cedula" size="10" maxlength="10" ></td>
			</tr>
			<?}?>
			
 
</table>
</div>
 

<table align="center" width="600" border="0" cellspacing="0" cellpadding="1"> 
	<form id="k" name="k" method="post" action="Actualizar_Cuenta_Contable.php">
	
	
	
	<tr>
	<input name="N_tabla" type="hidden" value="<?echo $tabla;?>" size="5"  maxlength="10"  >
	<input name="d" type="hidden" value="<?echo $_POST["desde"];?>" size="5"  maxlength="10"  >
	<input name="h" type="hidden" value="<?echo $_POST["hasta"];?>" size="5"  maxlength="10"  >
	<input name="auxi" type="hidden" value="<?echo $_POST["auxiliar"]; ?>" size="5"  maxlength="10"  >
	<input name="m" type="hidden" value="<?echo $_POST["mayor"];?>" size="5"  maxlength="10"  >
	<input name="c" type="hidden" value="<?echo $_POST["cue"];?>" size="5"  maxlength="10"  >
	<input name="a" type="hidden" value="<?echo $_POST["aux"];?>" size="5"  maxlength="10"  >
	</tr>
	
	<tr>
		<td>Actualizar</td>
		<td>Cuenta</td>
		<td>
			<input name="mod_cue" type="text"  size="5"  maxlength="10"  >
		</td>
		<td>Auxiliar</td>
		<td>
			<input name="mod_aux" type="text"  size="5"  maxlength="10"  >
		</td>
	</tr>
	  
	<tr>
		<td colspan=5 align="center" >
			
			<input  type="Submit"  value="Actualizar"  />
						 
			
		</td>        
	
	</tr>
	</form>
</table>
       

  
<?}?>  
	   
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
