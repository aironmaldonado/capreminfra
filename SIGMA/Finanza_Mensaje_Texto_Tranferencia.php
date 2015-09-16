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
		date_default_timezone_set("America/Caracas" ) ;
		$hora1 = date('Y-m-d H:i:s',time() - 3600*date('I'));
	
	date_default_timezone_set("America/Caracas" ) ; 
	$fecha_actual = date('d-m-Y',time() - 3600*date('I')); 
					


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
 
 
 <?
 
 if($_POST['boton1']=="entrar")
			{
		
		
			date_default_timezone_set("America/Caracas" );
			$hora1= date('{m/d/Y H:i:s}',time() - 3600*date('I'));
			date_default_timezone_set("America/Caracas" ) ; 
			$hora = date('d-m-Y',time() - 3600*date('I'));

		
					 $fec=$_POST["fec"];
					 $tran=$_POST["tran"];
					$txt=$_POST["txt"];
					$t=$_POST["texto"];
				
				
				
				switch ($tran) {
					case "CARGADO EN INTERNET":
						
						$obs="$tran$fec";
						$sta=1;
						break;
					case "ACREDITADO CUENTA":
						$obs="$tran$fec";
						$sta=0;
						$tasa=("ACREDITADO CUENTA");
						break;
						
					}

					
		
			
			
			
			$conexion = odbc_connect("FOX","","","");
			$r1= odbc_exec($conexion,"UPDATE TRANSFERENCIA set   observa='$obs', fechat=$hora1  ,status=$sta   where  lote='$txt' " );
			
			$r2= odbc_exec($conexion,"UPDATE cheques set observa='$obs', fechat=$hora1 where  lote  ='$txt' " );
			
			
			
			
			
			
			
			If($tasa)
			{
				
				$sql1="Select * from cheques where lote  ='$txt'  ";
				$result=odbc_exec($conexion,$sql1)or die(exit("Error en odbc_exec"));
				while (odbc_fetch_row($result)) 
				{
					$ced=odbc_result($result,"cedula");
					$cedula_S=odbc_result($result,"cedula");
					$monto=odbc_result($result,"cheque");
					
					include("opciones/conexion.php");
						$buscar = mysql_query ("SELECT * FROM `TELEFONO` AS TEL INNER JOIN codigo_area AS CA ON(TEL.cod_codigo_area=CA.cod_codigo_area)  where CEDULA  = '$ced' and tipo ='c' ",$conex);
						//LIKE '%$ced%'
						while($vec1=mysql_fetch_assoc($buscar))
							{  
							$n_area=$vec1['n_area'];
							$numero=$vec1['numero1'];
							$ced=$vec1['ced'];
							
									try {
												$url = "http://www.interconectados.net/api2/?phonenumber=";
												//$Telf = "04125651141";
												$Telf = "$n_area$numero";
												$text = urlencode('CAPREMINFRA informa  que su solicitud fue procesada y en las proximas  horas le sera abonado un monto de Bs.'."$monto");
												$user = "c-capreminfra";
												$password = "micandidato";


												// Se crea un manejador CURL para realizar la petición
												$ch = curl_init();
												// Se establece la URL y algunas opciones
												curl_setopt($ch, CURLOPT_URL, "".$url."".$Telf."&text=".$text."&user=".$user."&password=".$password."");
												curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
												// Se obtiene la URL del SMS Gateway
												$res = curl_exec($ch);
												// Obtener la respuesta del mensaje recibido por el gateway
												throw new Exception($res);
												}
												catch (Exception $e){
												//Manejos de Excepciones
												echo ("Codigo: ".$e->getMessage()."<br>");
												if($e->getMessage()==401){
												echo ("Autenticacion Invalida");
												}
												if($e->getMessage()==402){
												echo ("Creditos Insuficientes");
												}
												if($e->getMessage()==403){
												echo ("Cuenta Inactiva");
												}
												if($e->getMessage()==501){
												echo ("Tipo de Cuenta Invalida");
												}
												if($e->getMessage()==502){
												echo ("Peticion Sobrecargada");
												}
												if($e->getMessage()==200){
												
												require_once("opciones/conexion_administrador.php");



												date_default_timezone_set("America/Caracas" ) ; 
												$dd = date('d',time() - 3600*date('I')); 

												date_default_timezone_set("America/Caracas" ) ; 
												$mm = date('m',time() - 3600*date('I')); 

												date_default_timezone_set("America/Caracas" ) ; 
												$aaaa = date('Y',time() - 3600*date('I')); 

												$as = mysql_query ("INSERT INTO  msg_transferencia (`cod_msg_transferencia` ,`cod_usuario` ,`Cedula_Socio` ,`fecha`, `dia`, `mes`, `aaaa`)VALUES (NULL ,  '$usuid',  '$cedula_S', NOW( ),'$dd','$mm','$aaaa');  ",$conexadmi);


												/*echo ("Mensaje Enviado");*/
												
												
												}
												}


												curl_close($ch);
							
							
							
							}
			
				
				}	
			}
			
			
		}			
	?>				
					
					
					

<script type="text/javascript">




	function guardar1(){

	
	if(document.form2.fec.value.length==0){
			alert("Defina fecha y hora "); 
		   document.form2.fec.focus(); 
		}	
	else if(document.form2.tran.value.length==0){
		alert("Defina Transferencia");
		document.form2.tran.focus();
	}	
	else if(document.form2.txt.value.length==0){
		alert("Defina txt");
		document.form2.txt.focus();
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



<script type="text/javascript">

	
		function regresas(){
document.form1.boton2.value="Regresas";
	

	document.location.href = ('inicio.php');
document.form1.href = ('inicio.php'); 
	
}	

</script>






<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" border:0px solid red;  margin:0px 100px;" >
<div style="border:0px solid red;" >
	
   


 <table> 
		<tr>
			 <td id="titulo2" colspan="7" align="center" bgcolor="#FFFFFF">Mensajes Tranferencias</td>
		</tr>
		<tr>
			<td align="center" >Lote:</td>
			<td align="center" >Fecha:</td>
			<td align="center" >Banco:</td>
			<td align="center" >Observación:</td>
			<td align="center" >Fecha Obs:</td>
			<td align="center" >Usuario:</td>
			<td align="center" >Status:</td>
			
		</tr>
<tr>		
	<td align="center" ></br>
		<form action="Finanza_Mensaje_Texto_Tranferencia.php" method="post">
			<select  name="selec1" onchange="submit()" >
				<option required value=""> </option>
				<?$conexion = odbc_connect("FOX","","","");
				$sql="Select * from TRANSFERENCIA where status=1;  ";
				$result1=odbc_exec($conexion,$sql)or die(exit("Error en odbc_exec"));
				 while (odbc_fetch_row($result1)) {?>
				<option required value="<?php echo odbc_result($result1,"lote");?>"> <?php echo odbc_result($result1,"lote"); ?> </option>
				<?php } ?>
			</select>	
		</form>
	</td>

 
 
 <? $value1=$_POST['selec1'];?>
 




			<!--LIKE '%$value1%'-->
			<?
			if($value1){
			$conexion = odbc_connect("FOX","","","");
			$sql1="Select * from TRANSFERENCIA where lote  ='$value1'  ";
			$result=odbc_exec($conexion,$sql1)or die(exit("Error en odbc_exec"));
			while (odbc_fetch_row($result)) {
			?>
			<td align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"fecha");?>" type="text" id="cedula" size="9" maxlength="40" ></td>
			<td align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"banco"); ?>" type="text" id="cedula" size="2" maxlength="40" ></td>
			<td align="center" ><input name="edad" value="<?echo $observa=odbc_result($result,"observa"); ?>" type="text" id="cedula" size="30" maxlength="40" ></td>
			<td align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"fechat"); ?>" type="text" id="cedula" size="16" maxlength="40" ></td>
			<td align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"usuario"); ?>" type="text" id="cedula" size="10" maxlength="40" ></td>
			<td align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"status"); ?>" type="text" id="cedula" size="2" maxlength="40" ></td>
			</tr>
			<?}}?>		
	</table>
 



<div style="width: 840px; height: 200px; overflow-y: scroll;" >
 <table style="overflow-y:scroll" border=1  > 
		<tr>
			 <td id="titulo1" colspan="7" align="center" bgcolor="#FFFFFF">Mensajes Tranferencias</td>
		</tr>
		<tr>
			<td id="titulo2" align="center" >Solicitud:</td>
			<td id="titulo2" align="center" >Cedula:</td>
			<td id="titulo2" align="center" >Bene:</td>
			<td id="titulo2" align="center" >Cheque:</td>
			<td id="titulo2" align="center" >Concepto1:</td>
			<td id="titulo2" align="center" >Observa:</td>
			<td id="titulo2" align="center" >Fechat:</td>
			
		</tr>


	<?
			if($value1){
			$conexion = odbc_connect("FOX","","","");
			$sql1="Select * from cheques where lote  ='$value1'  ";
			$result=odbc_exec($conexion,$sql1)or die(exit("Error en odbc_exec"));
			while (odbc_fetch_row($result)) {
			?>
			<td border=1 cellspacing=0 cellpadding=2  align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"Solicitud");?>" type="text" id="cedula" size="4" maxlength="40" ></td>
			<td border=1 cellspacing=0 cellpadding=2  align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"Cedula"); ?>" type="text" id="cedula" size="8" maxlength="40" ></td>
			<td border=1 cellspacing=0 cellpadding=2  align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"Bene"); ?>" type="text" id="cedula" size="35" maxlength="40" ></td>
			<td border=1 cellspacing=0 cellpadding=2  align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"Cheque"); ?>" type="text" id="cedula" size="6" maxlength="40" ></td>
			<td border=1 cellspacing=0 cellpadding=2  align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"Concepto1"); ?>" type="text" id="cedula" size="15" maxlength="40" ></td>
			<td border=1 cellspacing=0 cellpadding=2  align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"Observa"); ?>" type="text" id="cedula" size="15" maxlength="40" ></td>
			<td border=1 cellspacing=0 cellpadding=2  align="center" ><input name="edad" value="<?echo $fiador=odbc_result($result,"Fechat"); ?>" type="text" id="cedula" size="8" maxlength="40" ></td>
			</tr>
			<?}}?>		
	</table>
</div>

<form id="form2" name="form2" method="post" action="Finanza_Mensaje_Texto_Tranferencia.php">	
<table> 

		<tr>
			<td id="titulo2" align="center" >Fecha Observación:</td>
			<td id="titulo2" align="center" >Nuevo Status:</td>
			
		</tr>
		<!-- disabled readonly="readonly" -->
		<tr>
			<td Rowspan="2" align="center" ><input name="fec"  type="date"></td>
			<td  align="left" ><input name="tran" value="CARGADO EN INTERNET" type="radio">Transferencia por Realizar:</td>
			
		</tr>
		<tr>
			<?	$conexion = odbc_connect("FOX","","","");
			$sql1="Select * from TRANSFERENCIA where lote  ='$value1'  ";
			$result=odbc_exec($conexion,$sql1)or die(exit("Error en odbc_exec"));
			while (odbc_fetch_row($result)) {
			$observa1=odbc_result($result,"observa"); 
			}
			
			
					
				switch ($observa1) {
					case "En Proceso                    ":
								
						$obs="";
						break;
					default:
						$obs=1;
				  
					}
			

			if($obs){?>
			<td align="left" ><input name="tran" value="ACREDITADO CUENTA" type="radio">Transferencia Realizada: </td>
		
			<?}?>
			<td align="left" >
			
			<input name="txt" value="<?echo $value1;?>" type="hidden">
			<input name="boton1" type="HIDDEN" id="boton1" />
			<input name="modificar" type="button" id="modificar" value="Guardar" onClick="guardar1()" />
			<input name="boton2" type="HIDDEN" id="boton2" />
			<input name="Regresas" type="button" id="Regresas" value="Regresas" onclick="regresas()" />
			
			</td>
		</tr>
</table>
</Form>					

</div>
</div>
</div>
<?include ("menu.php");?>
</div>


<div style="margin-left:-8px; ">
<marquee  style="position: absolute; text-align: center; width: 100%; bottom: 0px; width: 100%;color:#FFFFFF; " behavior="scroll" direction="left" bgcolor="#000000"  onmouseover="this.stop()" onmouseout="this.start()" scrollamount="4"> <?echo 	("Bienvenido: "), $usunom,(" "), $usuapel,(" al Sistema de Información Gerencial para el Manejo de Ahorros (S.I.G.M.A.). Usted ingreso con el usuario: "),$usuusu ,(" desde el Equipo: "),$nombre_pc, (" con fecha y hora: "),$fecha,(" "),$hora; ?>  </marquee>
</div>



</body>
</html>
