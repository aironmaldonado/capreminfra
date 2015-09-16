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
	//$usunom, $usuapel,$nombre_pc,$hora,$fecha;
	
	if($ID){
		
		 
		include("opciones/conexion_prestamo.php");
	
		$b1 = mysql_query ("UPDATE  dpf SET  status =  'I' WHERE  cod_dpf ='$ID'  ",$conexPres);

			if($b1)
				{
		echo "<script type='text/javascript'> alert('Registro Historico D.P.F.');  document.location.href = ('DPF.php'); </script>";
				
				}
			else 
				{
				echo "<script type='text/javascript'> alert('Error Actualizacion. '); document.location.href = ('DPF.php'); </script>";
				}

	
	}
	
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

	
		function regresas(){
document.form1.boton2.value="Regresas";
	

	document.location.href = ('inicio.php');
document.form1.href = ('inicio.php'); 
	
}	

</script>



<?

include("opciones/conexion_prestamo.php");
$buscar = mysql_query ("SELECT * FROM dpf where status='a' ",$conexPres);
	
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						$banco=$vec1["banco"];
						$fvalor=$vec1["fvalor"];
						$nuevo_capital=$vec1["nuevo_capital"];
						$plazo=$vec1["plazo"];
						$tasa=$vec1["tasa"];
						$fvencimiento=$vec1["fvencimiento"];
						$tipo=$vec1["tipo"];
						$interes=$vec1["interes"];
						
							
							}
							
							



 if($_POST['boton1']=="entrar")
			{

		$tipo=$_POST["tipo"];
		$tasa=$_POST["tasa"];
		$plazo=$_POST["plazo"];
		$F_Vencimiento=$_POST["F_Vencimiento"];
		$femision=$_POST["F_Valor"];
		$Capital=$_POST["Capital"];
		$banco=$_POST["banco"];
		$ndpf=$_POST["NDPF"];
$interes=($Capital*($tasa/100)*$plazo)/360;


	include("opciones/conexion.php");
	
		/*	disabled="disabled"*/

		
		
		
		$fe = explode("-",$femision);
                    $fea=$fe[0]; // porción1
                    $fem=$fe[1]; // porción2
                    $fed=$fe[2];
					
					
					
						
		$fv = explode("-",$F_Vencimiento);
                    $fva=$fv[0]; // porción1
                    $fvm=$fv[1]; // porción2
                    $fvd=$fv[2];
		
$b1 = mysql_query ("INSERT INTO  `prestamos`.`dpf` (
`cod_dpf` ,
`banco` ,
`femision` ,
`nuevo_capital` ,
`plazo` ,
`tasa` ,
`fvencimiento` ,
`tipo` ,
`interes` ,
`ndpf` ,
`status`,
`fvaaaa` ,
`fvmm` ,
`fvdd` ,
`feaaaa` ,
`femm`,
`fedd`
)
VALUES (NULL ,  '$banco',  '$femision',  '$Capital',  '$plazo',  '$tasa',  '$F_Vencimiento',  '$tipo',  '$interes','$ndpf',   'A'
,  '$fva',  '$fvm',  '$fvd',  '$fea',  '$fem','$fed'
); ",$conex);


			}


							
?>


<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div>



<script type="text/javascript">
function guardar(){

	if(document.form1.NDPF.value.length==0){
		alert("Defina Numero de banco");
		document.form1.NDPF.focus();
	}
	
	else if(document.form1.banco.value.length==0){
		alert("Defina Numero de banco");
		document.form1.banco.focus();
	}
	
	
	else if(document.form1.Capital.value.length==0){
		alert("Defina Capital");
		document.form1.Capital.focus();
	}
	else if(document.form1.F_Valor.value.length==0){
		alert("Defina F_Valor");
		document.form1.F_Valor.focus();
	}
	else if(document.form1.F_Vencimiento.value.length==0){
		alert("Defina F_Vencimiento");
		document.form1.F_Vencimiento.focus();
	}
	else if(document.form1.plazo.value.length==0){
		alert("Defina plazo");
		document.form1.plazo.focus();
	}
	
	else if(document.form1.tasa.value.length==0){
		alert("Defina tasa");
		document.form1.tasa.focus();
	}
	
	else if(document.form1.tipo.value.length==0){
		alert("Defina tipo");
		document.form1.tipo.focus();
	}
	
	
	
			
	else{
		document.form1.boton1.value="entrar";
		document.form1.submit();  
	}
}



</script>  


<form id="form1" name="form1" method="post" action="DPF1.php">
       
			<table border="0" cellpadding="0" cellspacing="0">
		
				<tr>
				  <td colspan="2" align="center" id="titulo1">Deposito  Plazo Fijo </td>
				</tr>
				<tr>						 
					<td>N-DPF :</td>
						<td>
							<input name="NDPF"  type="text" id="NDPF" size="19" maxlength="10" onKeyPress="return permite(event,'num')" >
						</td>
				</tr>
				<tr>						 
					<td>Banco:</td>
						<td>
									  <select  name="banco" id="banco">
									  <option required value="">Selecciones</option>;
									  <?include("opciones/conexion_administrador.php"); 
									  $buscar = mysql_query ("SELECT * FROM `banco` where estatus='a' ; ",$conexadmi);
									  ?>
									  <?php while($vec1=mysql_fetch_row($buscar)){?>
									  <option required value="<?php echo $vec1[1];?>"> <?php echo $vec1[1];  ?> </option>;
									  <?php } ?>
									  </select>
						</td>
				</tr>
				
				<tr>						 
					<td>Capital :</td>
						<td>
							<input name="Capital"  type="text" id="Capital" size="19" maxlength="10" onKeyPress="return permite(event,'num')" >
						</td>
				</tr>
				
				<tr>						 
					<td>F Emision:</td>
						<td>
							<input name="F_Valor"  type="date" id="F_Valor" size="19" maxlength="10" onKeyPress="return permite(event,'num')" >
						</td>
				</tr>
				
				<tr>						 
					<td>F. Vencimiento:</td>
						<td>
							<input name="F_Vencimiento"  type="date" id="F_Vencimiento" size="19" maxlength="10" onKeyPress="return permite(event,'num')" >
						</td>
				</tr>
				<tr>						 
					<td>Plazo :</td>
						<td>
							<input name="plazo"  type="text" id="plazo" size="19" maxlength="3" onKeyPress="return permite(event,'num')" >
						</td>
				</tr>
				<tr>						 
					<td>Tasa :</td>
						<td>
							<input name="tasa"  type="text" id="tasa" size="19" maxlength="5" onKeyPress="return permite(event,'num')" >
						</td>
				</tr>
				
				<tr>						 
					<td>Tipo :</td>
						<td>
						
							<select  name="tipo" id="tipo">
									  <option required value="">Selecciones</option>
									  <option required value="CERTIF">CERTIF</option>
									  <option required value="DPF">DPF</option>
									  <option required value="Bono BCV">Bono BCV</option>
									   <option required value="TIF">TIF</option>
									   <option required value="Tasa Estimada">Tasa Estimada</option>
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
