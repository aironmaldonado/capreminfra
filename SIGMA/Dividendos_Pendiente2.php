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
	date_default_timezone_set('UTC'); 
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






<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div align="center">
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
	   
	   
	   
	 
	  ?>
	  </div>
	  </br></br>
	<script type="text/javascript">
function guardar(){

	 
	if(document.form1.txt.value.length==0){
		alert("Seleccione Generar Archivo txt");
		document.form1.txt.focus();
	}
	
			
	else{
		document.form1.boton1.value="entrar";
		document.form1.submit();  
	}
}


</script>
	<?
	if($_POST['boton1']=="entrar")
			{
				date_default_timezone_set("America/Caracas" ) ; 
				$fecha = date('d-m-Y'); 
				$f = explode("-",$fecha);
                    $a=$f[0]; // porción1
                    $m=$f[1]; // porción2
                    $d=$f[2];
			
			$ar=fopen("Pago Dividendo/Dividendo$d$m$a.txt","a") or
			die("Problemas en la creacion");
				
				
				
				
				  $banco=$_POST['banco'];	
				
				
				include("opciones/conexion_administrador.php"); 
				$b = mysql_query ("SELECT * FROM dividendos_pendiente where estatus='a' and banco='$banco' ",$conexadmi); while ($v=mysql_fetch_assoc($b))	
				{ 
					echo $cedula_socio=$v['cedula']; 
					$cedula_socio=$v['cedula']; 
					$proveedors=$v['nombre']; 
					$v['organismo']; 
					$n_cuenta=$v['N_cuenta'];
					$monto=$v['monto'];
					
					$n=$v['nacionalidad'];
					
					
					
					
										if(trim($cedula_socio))
															{

																switch(strlen($cedula_socio)){
																case "1" : $ced1 = $n."00000000" . $cedula_socio; break;
																case "2" : $ced1 = $n."0000000" . $cedula_socio; break;
																case "3" : $ced1 = $n."000000" . $cedula_socio; break; 
																case "4" : $ced1 = $n."00000" . $cedula_socio; break; 
																case "5" : $ced1 = $n."0000" . $cedula_socio; break; 
																case "6" : $ced1 = $n."000" . $cedula_socio; break; 
																case "7" : $ced1 = $n."00" . $cedula_socio; break; 
																case "8" : $ced1 = $n."0" . $cedula_socio; break; 
																case "9" : $ced1 = $n."" . $cedula_socio; break; 
																}
															}
															

															
					
					$proveedor=substr($proveedors, 0, 35); 
				
										if(trim($proveedor))
															{

																switch(strlen($proveedor)){
																case "1" : $proveedor1 = $proveedor . "                                  "; break;
																case "2" : $proveedor1 = $proveedor . "                                 "; break;
																case "3" : $proveedor1 = $proveedor . "                                "; break;
																case "4" : $proveedor1 = $proveedor . "                               "; break;
																case "5" : $proveedor1 = $proveedor . "                              "; break;
																case "6" : $proveedor1 = $proveedor . "                             "; break;
																case "7" : $proveedor1 = $proveedor . "                            "; break;
																case "8" : $proveedor1 = $proveedor . "                           "; break;
																case "9" : $proveedor1 = $proveedor . "                          "; break;
																case "10" : $proveedor1 = $proveedor . "                         "; break;
																case "11" : $proveedor1 = $proveedor . "                        "; break;
																case "12" : $proveedor1 = $proveedor . "                       "; break;
																case "13" : $proveedor1 = $proveedor . "                      "; break;
																case "14" : $proveedor1 = $proveedor . "                     "; break;
																case "15" : $proveedor1 = $proveedor . "                    "; break;
																case "16" : $proveedor1 = $proveedor . "                   "; break;
																case "17" : $proveedor1 = $proveedor . "                  "; break;
																case "18" : $proveedor1 = $proveedor . "                 "; break;
																case "19" : $proveedor1 = $proveedor . "                "; break;
																case "20" : $proveedor1 = $proveedor . "               "; break;
																case "21" : $proveedor1 = $proveedor . "              "; break;
																case "22" : $proveedor1 = $proveedor . "             "; break;
																case "23" : $proveedor1 = $proveedor . "            "; break;
																case "24" : $proveedor1 = $proveedor . "           "; break;
																case "25" : $proveedor1 = $proveedor . "          "; break;
																case "26" : $proveedor1 = $proveedor . "         "; break;
																case "27" : $proveedor1 = $proveedor . "        "; break;
																case "28" : $proveedor1 = $proveedor . "       "; break;
																case "29" : $proveedor1 = $proveedor . "      "; break;
																case "30" : $proveedor1 = $proveedor . "     "; break;
																case "31" : $proveedor1 = $proveedor . "    "; break;
																case "32" : $proveedor1 = $proveedor . "   "; break;
																case "33" : $proveedor1 = $proveedor . "  "; break;
																case "34" : $proveedor1 = $proveedor . " "; break;
																case "35" : $proveedor1 = $proveedor . ""; break;
																
																
																
																
																}
															}
															
															
															$solicitud=number_format($monto, 2, "", "");
															
															if(trim($solicitud))
															{

																switch(strlen($solicitud)){
																
																 case "1" : $soli = "00000000000000" . $solicitud; break;
																 case "2" : $soli = "0000000000000" . $solicitud; break;
																 case "3" : $soli = "000000000000" . $solicitud; break;
																 case "4" : $soli = "00000000000" . $solicitud; break;
																 case "5" : $soli = "0000000000" . $solicitud; break;
																 case "6" : $soli = "000000000" . $solicitud; break;
																 case "7" : $soli = "00000000" . $solicitud; break;
																 case "8" : $soli = "0000000" . $solicitud; break;
																 case "9" : $soli = "000000" . $solicitud; break; 
																case "10" : $soli = "00000" . $solicitud; break; 
																case "11" : $soli = "0000" . $solicitud; break; 
																case "12" : $soli = "000" . $solicitud; break; 
																case "13" : $soli = "00" . $solicitud; break; 
																case "14" : $soli = "0" . $solicitud; break; 
																
																}
															}
															
															  fputs($ar,$ced1);
															  fputs($ar,$n_cuenta);
															  fputs($ar,$proveedor1);
															  fputs($ar,$soli);
															  fputs($ar,"\r\n");
				
				}
				fclose($ar);
				
				
				
				
				
				
				
				
				
				
				$name12="Pago Dividendo/Dividendo$d$m$a.txt"; 
				$name13="Dividendo$d$m$a.txt"; 
				
				
					
				
				$sta="1";
				include("opciones/conexion_administrador.php"); 										
				mysql_query ("UPDATE  dividendos_pendiente SET estatus ='i'  where estatus='a' and banco='$banco'   ",$conexadmi); 	
				
				
			}
	?>	
	  
<div>   
	  <h3 align="center" >listado de socios a trasferir dividendos </h3>
<div style="border:0px solid red; width:auto; height:240px;  overflow-y: scroll; " >
<table width="600" border="1"  style="border: #35a3de 1px solid;   border-collapse: separate;  border-spacing:  5px 15px; border-radius: 30px 30px 30px 30px;-moz-border-radius: 30px 30px 30px 30px; -webkit-border-radius: 30px 30px 30px 30px;">
			  
			  <tr>
				<th scope="col"id="titulo1" >&nbsp;Cedula</th>
				<th scope="col" id="titulo1">&nbsp;Nombre y Apellido</th>
				<th scope="col" id="titulo1">&nbsp;Organismo</th>
				<th scope="col" id="titulo1">&nbsp;N° De Cuenta</th>
				<th scope="col" id="titulo1">&nbsp;Monto</th>
				<th scope="col" id="titulo1">&nbsp;Opción</th>
				
			   
			  </tr>
													<? 
													include("opciones/conexion_administrador.php"); 
													 $b = mysql_query ("SELECT * FROM dividendos_pendiente where estatus='a' ",$conexadmi); while ($v=mysql_fetch_assoc($b))	
														{ 
													$cod=$v['cod_dividendos_pendiente'];  
													?>
			 <tr>
				<th scope="row"><? echo $v['cedula'];  ?></th>
				<td>&nbsp;<? echo $v['nombre'];  ?></td>
				<td>&nbsp;<? echo $v['organismo'];  ?></td>
				<td>&nbsp;<? echo $v['N_cuenta'];  $ctaban; ?></td>
				<td>&nbsp;<? echo $v['monto']; ?></td>
				<td align="center" ><a href="Dividendos_Pendiente3.php?cod=<?echo $cod;?> "> <img  src="Imagen/iconos_tablas/eliminar.gif"  /></a></td>
			  </tr>
														<?}?>

  
</table>
	  </div>

	
	
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
       
	   	       
			<table align="center" border="0" style="" cellpadding="0" cellspacing="0">
				
				
				
				<tr>
						
						 
					<td>Banco</td>
						<td>
									  <select  name="banco" id="banco">
									  <option required value="">Selecciones</option>
									  <?include("opciones/conexion_administrador.php"); 
									  $buscar = mysql_query ("SELECT * FROM `banco` where estatus='a' ; ",$conexadmi);
									  ?>
									  <?php while($vec1=mysql_fetch_row($buscar)){?>
									  <option required value="<?php echo $vec1[2];?>"> <?php echo $vec1[1];  ?> </option>;
									  <?php } ?>
									  </select>
						
						</td>
				</tr>
				
				
				
				<tr>
						
						 
					<td>Generar Archivo txt:</td>
						<td>
						<input type="checkbox" name="txt" value="txt" checked>
						
						</td>
				</tr>
				
				
				
				
				<tr>   
					<td colspan=4 align="center" >
<?if($sta!="1"){?>							
						<input name="boton1" type="HIDDEN" id="boton1" />
						 <input name="modificar" type="button" id="modificar" value="Siguiente" onClick="guardar()" />
						 
						 <input name="boton2" type="HIDDEN" id="boton2" />
						 <input name="Regresas" type="button" id="Regresas" value="Regresas" onclick="regresas()" />
<?}else {?>						
						<a href="<?echo $name12;?>" download="<?echo $name13; ?>"> <input type="button" value="Reporte.TXT" />  </a>
<?}?>
					</td>                                
				</tr>
			</table>
        </form>
		
		
<?
	
				
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
