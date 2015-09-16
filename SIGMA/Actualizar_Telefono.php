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
			$cedula1=$_POST["cedula"];
			$credito=$_POST["credito"];
			
			
			
			include("opciones/conexion.php"); 

$b = mysql_query ("SELECT * FROM socios where cedula= '$cedula1' ",$conex); while ($v=mysql_fetch_assoc($b))	
{
 $cod_socio=$v['cod_socio'];  
  $cedula=$v['cedula'];  
}

			
			
			
			
			
			
			
			
			
if($cedula1=""){


				$b = mysql_query ("SELECT * FROM telefono  where cedula='$cedula' and n=1;  ",$conex);
				while($ve=mysql_fetch_assoc($b)){ $num1=$ve['numero1'];$Cod1=$ve['cod_codigo_area'];}	

				$b = mysql_query ("SELECT * FROM telefono  where cedula='$cedula' and n=2;  ",$conex);
				while($ve=mysql_fetch_assoc($b)){$num2=$ve['numero1'];$Cod2=$ve['cod_codigo_area'];}	
												
							
				$b = mysql_query ("SELECT * FROM telefono  where cedula='$cedula' and n=3;  ",$conex);
				while($ve=mysql_fetch_assoc($b)){$num3=$ve['numero1'];$Cod3=$ve['cod_codigo_area'];}	
												
							
				$b = mysql_query ("SELECT * FROM telefono  where cedula='$cedula' and n=4;  ",$conex);
				while($ve=mysql_fetch_assoc($b)){$num4=$ve['numero1'];$Cod4=$ve['cod_codigo_area'];}	
												

				if($num1=="" &&  $Cod1=="")
					{
					include("opciones/conexion.php"); 
					$consulta1=mysql_query("INSERT INTO telefono 
					(`cod_telefono`,`cod_socio` ,`cod_codigo_area` ,`numero1`,`cedula` ,`N` )
					 VALUES ( NULL ,'$cod_socio', '0', '0' ,'$cedula',1) ; ",$conex);
					}
				else
					{
					//echo "estoy actualizado 1";
					
					}
					
				if($num2==""&&  $Cod2=="")
					{
					include("opciones/conexion.php"); 
					$consulta1=mysql_query("INSERT INTO telefono 
					(`cod_telefono`,`cod_socio` ,`cod_codigo_area` ,`numero1`,`cedula` ,`N` )
					 VALUES ( NULL ,'$cod_socio', '0', '0' ,'$cedula',2) ; ",$conex);
					}
				else
					{
					//echo "estoy actualizado 2";
					
					}

					
				if($num3==""&&  $Cod3=="")
					{
					include("opciones/conexion.php"); 
					 $consulta1=mysql_query("INSERT INTO telefono 
					(`cod_telefono`,`cod_socio` ,`cod_codigo_area` ,`numero1`,`cedula` ,`N` )
					 VALUES ( NULL ,'$cod_socio', 'Null', 'Null' ,'$cedula',3) ; ",$conex);
				 
					}
				else
					{
					//echo "estoy actualizado3";
					
					}

					
					
					
					
				if($num4=="" && $Cod4=="")
					{
					include("opciones/conexion.php"); 
					 $consulta1=mysql_query("INSERT INTO telefono 
					(`cod_telefono`,`cod_socio` ,`cod_codigo_area` ,`numero1`,`cedula` ,`N` )
					 VALUES ( NULL ,'$cod_socio', 'Null', 'Null' ,'$cedula',4) ; ",$conex);
					}
				else
					{
					//echo "estoy actualizado 4";
					
					}

	
} else { echo "entro";

			$cedula1=$_POST["cedula"];
			date_default_timezone_set("America/Caracas" ) ;
			$hora = date('h:i:s',time() - 3600*date('I'));


	
													if(trim($cedula1))
															{

																switch(strlen($cedula1)){
																case "1" : $ced1 = "000000000" . $cedula1; break;
																case "2" : $ced1 = "00000000" . $cedula1; break;
																case "3" : $ced1 = "0000000" . $cedula1; break; 
																case "4" : $ced1 = "000000" . $cedula1; break; 
																case "5" : $ced1 = "00000" . $cedula1; break; 
																case "6" : $ced1 = "0000" . $cedula1; break; 
																case "7" : $ced1 = "000" . $cedula1; break; 
																case "8" : $ced1 = "00" . $cedula1; break; 
																case "9" : $ced1 = "0" . $cedula1; break; 
																}
															}
			
			
			
			
			$conexion = odbc_connect("FOX","","","");
			$sql1="Select * from socios where cedula='$ced1' ";
			$rs1=odbc_exec($conexion,$sql1)or die(exit("Error en odbc_exec"));
			while (odbc_fetch_row($rs1)) 
			{
			$nom = odbc_result($rs1,"nombre");
			$F_ingreso = odbc_result($rs1,"fingreso");
			$cod_organismo = odbc_result($rs1,"organismo");
			$N_cuenta = odbc_result($rs1,"ctaban");
			$status = odbc_result($rs1,"status");
			
			}
			
			switch ($status) {
							case "A":
								$s=1;
								break;
							case "I":
								$s=2;
								break;
							
						}
			
			
			
				$nombre = explode(" ",$nom);
				$nom1=ucwords($nombre[0]); // porción1
				$nom2=ucwords($nombre[1]); // porción2
				$nom3=ucwords($nombre[2]);
				$nom4=ucwords($nombre[3]);
			
			$F="$F_ingreso $hora";
			include("opciones/conexion.php");
			
			
			
			$consulta=mysql_query("INSERT INTO  socios (
			`nom_ape` ,
			`nombre1` ,
			`apellido1` ,
			`nacionalidad` ,
			`cedula` ,
			`N_cuenta`,
			`F_ingreso`,
			`cod_estatus` 			
			 
			)
			VALUES ('$nom1 $nom2 $nom3 $nom4',  '$nom1 $nom2','$nom3 $nom4','V','$cedula1','$N_cuenta','$F','$s' );",$conex);
					
			
			
			
			
				
					
				require_once("opciones/conexion.php"); 
				$b = mysql_query ("SELECT max(cod_socio) as cod FROM socios  where cedula='$cedula1'; ",$conex);
				while($v=mysql_fetch_assoc($b))	
				{ 
				$cod=$v['cod'];
				$cod_socio=$cod+1;
				 
				 }	
				 
			
 
				$consulta12=mysql_query("INSERT INTO nomina (`cod_nomina`,`cod_organismo`,`cod_tipo_nomina`,`cod_socio`,`N_cedula`) VALUES ( NULL , '$cod_organismo', '3','$cod_socio','$cedula1');",$conex);
	
				
				
				$consulta1=mysql_query("INSERT INTO direccion ( `cod_direccion`,`direccion`,`cod_estado` ,`cod_municipio` ,`cod_parroquia` ,`cod_vivienda`,`cod_socio` ,`cedula_d`) 
				VALUES (NULL , '','', '', '', '','$cod_socio' , '$cedula1') ",$conex);
	
			
			
			
						$b = mysql_query ("SELECT * FROM telefono  where cedula='$cedula1' and n=1;  ",$conex);
				while($ve=mysql_fetch_assoc($b)){ $num1=$ve['numero1'];$Cod1=$ve['cod_codigo_area'];}	

				$b = mysql_query ("SELECT * FROM telefono  where cedula='$cedula1' and n=2;  ",$conex);
				while($ve=mysql_fetch_assoc($b)){$num2=$ve['numero1'];$Cod2=$ve['cod_codigo_area'];}	
												
							
				$b = mysql_query ("SELECT * FROM telefono  where cedula='$cedula1' and n=3;  ",$conex);
				while($ve=mysql_fetch_assoc($b)){$num3=$ve['numero1'];$Cod3=$ve['cod_codigo_area'];}	
												
							
				$b = mysql_query ("SELECT * FROM telefono  where cedula='$cedula1' and n=4;  ",$conex);
				while($ve=mysql_fetch_assoc($b)){$num4=$ve['numero1'];$Cod4=$ve['cod_codigo_area'];}	
												

				if($num1=="" &&  $Cod1=="")
					{
					include("opciones/conexion.php"); 
					$consulta1=mysql_query("INSERT INTO telefono 
					(`cod_telefono`,`cod_socio` ,`cod_codigo_area` ,`numero1`,`cedula` ,`N` )
					 VALUES ( NULL ,'$cod_socio', '0', '0' ,'$cedula1',1) ; ",$conex);
					}
				else
					{
					//echo "estoy actualizado 1";
					
					}
					
				if($num2==""&&  $Cod2=="")
					{
					include("opciones/conexion.php"); 
					$consulta1=mysql_query("INSERT INTO telefono 
					(`cod_telefono`,`cod_socio` ,`cod_codigo_area` ,`numero1`,`cedula` ,`N` )
					 VALUES ( NULL ,'$cod_socio', '0', '0' ,'$cedula1',2) ; ",$conex);
					}
				else
					{
					//echo "estoy actualizado 2";
					
					}

					
				if($num3==""&&  $Cod3=="")
					{
					include("opciones/conexion.php"); 
					 $consulta1=mysql_query("INSERT INTO telefono 
					(`cod_telefono`,`cod_socio` ,`cod_codigo_area` ,`numero1`,`cedula` ,`N` )
					 VALUES ( NULL ,'$cod_socio', 'Null', 'Null' ,'$cedula1',3) ; ",$conex);
				 
					}
				else
					{
					//echo "estoy actualizado3";
					
					}

					
					
					
					
				if($num4=="" && $Cod4=="")
					{
					include("opciones/conexion.php"); 
					 $consulta1=mysql_query("INSERT INTO telefono 
					(`cod_telefono`,`cod_socio` ,`cod_codigo_area` ,`numero1`,`cedula` ,`N` )
					 VALUES ( NULL ,'$cod_socio', 'Null', 'Null' ,'$cedula1',4) ; ",$conex);
					}
				else
					{
					//echo "estoy actualizado 4";
					
					}
	
			



			
			
}	
	
	
	
	
	
	
	
	
require_once("opciones/conexion.php"); $b = mysql_query ("SELECT * FROM socios  where cedula='$cedula1'; ",$conex); while($v=mysql_fetch_assoc($b))	
{ 
 $_SESSION["cod_socio"]=$v['cod_socio'];
 $_SESSION["cedulaS"]=$v['cedula']; 
$cod_cedula=$v['cedula'];	
 }	







if($cod_cedula)
	{
echo "<script type='text/javascript'> document.location.href = ('Actualizar_Telefono1.php'); </script>";
	
	}
else 
	{
	echo "<script type='text/javascript'> alert('Lo sentimos el socio no esta afiliado a la CAPREMINFRA. a continuación lo afiliaremos. '); document.location.href = ('Registro_Socios.php'); </script>";
	}






















			
}


?>
<div class="panel"  >
<div  class="panel2"   > 
<div  class="panel3" style=" margin:70px 380px;"   >
<div>
       
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   <form id="form1" name="form1" method="post" action="Actualizar_Telefono.php">
       
			<table  border="0" cellpadding="0" cellspacing="0">
				</br>
				<tr>
				  <td colspan="2" align="center" bgcolor="#FFFFFF">Consulta y Actualizacion de Socios </td>
				</tr>
				 
				
				
				<tr>
						
						 
					<td>Cedula:</td>
						<td>
							<input name="cedula"  type="text" id="cedula" size="19" maxlength="10" onKeyPress="return permite(event,'num')" onchange="guardar()">
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
       
      
	  
	  
	  
	  
	  
	  <?
	  /*  $conexion = odbc_connect("FOX","","","");
                        $sql="Select * from analedo where solicitud ='$s' and fecha = CTOD('$m/$d/$a') ";
                        $result=odbc_exec($conexion,$sql)or die(exit("Error en odbc_exec"));
                                
                                while (odbc_fetch_row($result)) {
                                
                                $solicitud=odbc_result($result,"solicitud"); 
                                $concepto1=odbc_result($result,"concepto1");  
                                $cheque=odbc_result($result,"cheque"); 
                                $concepto2=odbc_result($result,"concepto2"); 
                                $bene=odbc_result($result,"bene"); 		
                                
                                include("opciones/conexion_prestamo.php"); 
                            $consulta1=mysql_query("INSERT INTO cheques (`solicitud` ,`cedula` ,`beneficiario` ,`concepto1` ,`cheque`,`cod_proveedor`,`Proveedor`,`Fechat`,`concepto2`)	VALUES 
                            ('$solicitud','$cedula','$bene','$concepto1','$cheque','$p','$nom_prov','$fec','$concepto2') ",$conexPres);
        
                                }*/
	  ?>
    
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
