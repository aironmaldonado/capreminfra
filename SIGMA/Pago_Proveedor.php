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

	
		function regresas(){
document.form1.boton2.value="Regresas";
	

	document.location.href = ('inicio.php');
document.form1.href = ('inicio.php'); 
	
}	


	function Actualizar(){
document.form2.boton3.value="actualizar";

document.form2.submit(); 
	
}	

</script>


<script type="text/javascript">
function guardar(){

	 
	if(document.form1.fecha.value.length==0){
		alert("Defina Fecha");
		document.form1.fecha.focus();
	}
	else if(document.form1.proveedor.value.length==0){
		alert("Defina Tipo proveedor");
		document.form1.proveedor.focus();
	}
	else if(document.form1.desde.value.length==0){
		alert("Defina Numero Desde");
		document.form1.desde.focus();
	}
	else if(document.form1.hasta.value.length==0){
		alert("Defina numero hasta");
		document.form1.hasta.focus();
	}
	
	
	
			
	else{
		document.form1.boton1.value="entrar";
		document.form1.submit();  
	}
}





	

</script>

<?if($_POST["boton3"]=="actualizar")
{
/*
	 echo $p=$_POST['p'];?></br><?
	 echo $_POST['f'];?></br><?
	 echo $_POST['Genera'];?></br><?
	 echo $_POST['d'];?></br><?
	 echo $_POST['h'];?></br><?
	*/
	$_SESSION["a1"]=$_POST['p'];
	$_SESSION["a2"]=$_POST['f'];
	$_SESSION["a3"]=$_POST['d'];
	$_SESSION["a4"]=$_POST['h'];
	
		
		$f = explode("-",$_POST['f']);
			$a=$f[0]; // porción1
			$m=$f[1]; // porción2
			$d=$f[2];

			if($_POST['Genera']=="txt")			
				{	
				$p=$_POST['p'];
				include("opciones/conexion_prestamo.php");
				$buscar = mysql_query ("SELECT * FROM `proveedor`  where nombre_proveedor  LIKE '%$p%' ",$conexPres);
				while($vec1=mysql_fetch_assoc($buscar)){  $rif=$vec1['rif']; $n_cuenta=$vec1['num_cuenta']; $proveedor=$vec1['nombre_proveedor'];
				}
				
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
															
															
			
			$ar=fopen("Pago Proveedor/$p$d$m$a.txt","a") or
			die("Problemas en la creacion");
			
			$d=$_POST['d']-1;
			$h=$_POST['h']+1;
			include("opciones/conexion_prestamo.php");
				$buscar = mysql_query ("SELECT * FROM cheques  where solicitud>'$d' and solicitud<'$h'  ",$conexPres);
				while($vec1=mysql_fetch_assoc($buscar)){ 
				$solicitud=$vec1['solicitud'];	
				
				
				
				
			$conexion = odbc_connect("FOX","","","");
						$sql1="Select * from cheques where solicitud='$solicitud' ";
			$rs1=odbc_exec($conexion,$sql1)or die(exit("Error en odbc_exec"));
			while (odbc_fetch_row($rs1)) 
			{
			$monto = odbc_result($rs1,"cheque");
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
			
				
			  
			  fputs($ar,$rif);
			  fputs($ar,$n_cuenta);
			  fputs($ar,$proveedor1);
			  fputs($ar,$soli);
			  fputs($ar,"\r\n");
			  
			  
			}}
			  fclose($ar);
			 // echo "Los datos se cargaron correctamente.";
			
						
			
					
					}
					
					
					
		
		
		
		
			
			$f = explode("-",$_POST['f']);
				$a=$f[0]; // porción1
				$m=$f[1]; // porción2
				$d=$f[2];
			
			
			$d=$_POST['d']-1;
			$h=$_POST['h']+1;
			
			include("opciones/conexion_prestamo.php");
				$buscar = mysql_query ("SELECT * FROM cheques  where solicitud>'$d' and solicitud<'$h'  ",$conexPres);
				while($vec1=mysql_fetch_assoc($buscar)){ 
				$solicitud=$vec1['solicitud'];				
				
				$conexion = odbc_connect("FOX","","","");
				$rs= odbc_exec($conexion,"UPDATE cheques set concepto2='tranferencia SIGMA' , emitido='X' , nro='$solicitud' where  solicitud='$solicitud'  " );
			
				 
				
				}
				
			
			
			
			//$_SESSION["f"]="$d$m$a";
			
			/*
			$conexion = odbc_connect("FOX","","","");
			
			$sql1="Select * from cheques where bene LIKE  '%$p%' and fecha = CTOD('$m/$d/$a')";
			$rs1=odbc_exec($conexion,$sql1)or die(exit("Error en odbc_exec"));
			while (odbc_fetch_row($rs1)) 
			{
			$solicitud = odbc_result($rs1,"solicitud");
						
			$rs= odbc_exec($conexion,"UPDATE cheques set concepto2='tranferencia SIGMA' , emitido='X' , nro='$solicitud' where  solicitud='$solicitud'  " );
			
			
			}*/

			odbc_close_all();

			
						if($rs){
											
										if($_POST['Genera']){
											echo "<script type='text/javascript'> alert('Actualización satisfactorio guarde el reporte ');document.location.href = ('pago_proveedor2.php'); </script>";
												}
										else{
										echo "<script type='text/javascript'> alert('Actualización satisfactorio'); document.location.href = ('inicio.php'); </script>";
											}
								
								}
						else	{
								echo "<script type='text/javascript'> alert('Actualización fallido'); document.location.href = ('inicio.php'); </script>";
								}
			
			
			
	
			

}


?>

<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div align="center" >







       <form id="form1" name="form1" method="post" action="pago_proveedor.php">
       
			<table  border="0" cellpadding="0" cellspacing="0">
				</br>
				<tr>
				  <td id="titulo1" colspan="2" align="center" bgcolor="#FFFFFF">Solicitud Pago de Proveedor</td>
				</tr>
				 
				
				
				<tr>
					<td width="120px" >Fecha:</td>
					<td>
							<input name="fecha"  type="date" id="fecha" size="19" maxlength="10" >
					</td>
				</tr>
				<tr>
					<td>Casa Comercial:</td>
					<td>
						<select  name="proveedor"  id="proveedor" >
						  <option required value=""> </option>
						  <?include("opciones/conexion_prestamo.php");
						  $buscar = mysql_query ("SELECT * FROM `proveedor` where status='1' ",$conexPres);?>
						  <?php while($vec1=mysql_fetch_row($buscar)){ ?>
						  <option required value="<?php echo $vec1[1];?>"> <?php echo $vec1[2];  ?> </option>
						  <?php } ?>
						</select>
					</td>
            
				</tr>
				<tr>
						
						 
					<td>Desde:<input name="desde"  type="text" id="desde" size="5" maxlength="5" ></td>
					<td>Hasta:<input name="hasta"  type="text" id="hasta" size="5" maxlength="5" ></td>
				</tr>
				<tr>
					<td>Generar Archivo:</td>
					<td align="center" > <input name="g" type="checkbox" onClick="output()" value="txt" /></td>
				</tr>
				
				<tr>   
					<td colspan=4 align="center" >
						 <input name="boton1" type="HIDDEN" id="boton1" />
						 <input name="modificar" type="button" id="modificar" value="Siguiente" onClick="guardar()" />
						 
						 <input name="boton2" type="HIDDEN" id="boton2" />
						 <input name="Regresas" type="button" id="Regresas" value="Regresas" onclick="regresas()" />
									
		    </form> 
			
			
			
		</table>
			<? 
			
			$p=$_POST['proveedor'];
								include("opciones/conexion_prestamo.php");
								$buscar = mysql_query ("SELECT * FROM `proveedor` where nombre_proveedor like '%$p%' ",$conexPres);
								 while($vec1=mysql_fetch_row($buscar)){
								   $r=$vec1[3];
								   } 
			
			
			
			
			
			
			
				$fec=$_POST['fecha'];
			$f = explode("-",$_POST['fecha']);
			$a=$f[0]; // porción1
			$m=$f[1]; // porción2
			$d=$f[2];
			
				$conexion = odbc_connect("FOX","","","");
				$sql="Select * from cheques where bene LIKE  '%$p%' and fecha = CTOD('$m/$d/$a')";
				$result=odbc_exec($conexion,$sql)or die(exit("Error en odbc_exec"));
						
						while (odbc_fetch_row($result)) {
						
						$solicitud=odbc_result($result,"solicitud"); 
						$cedula=odbc_result($result,"cedula"); 
						$concepto1=odbc_result($result,"concepto1");  
						$cheque=odbc_result($result,"cheque"); 		
						
						include("opciones/conexion_prestamo.php"); 
					$consulta1=mysql_query("INSERT INTO cheques (`solicitud` ,`cedula` ,`concepto1` ,`cheque`,`Proveedor`,`Fechat`)	VALUES 
					('$solicitud','$cedula','$concepto1','$cheque','$p','$fec') ",$conexPres);

						}
			?>
		
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		<div align="center" style=" border:0px solid blue; width:500px; height:200px; overflow-x:hidden; overflow-y:scroll;">
<?		
		
		
		if($_POST['fecha']) {
		
		?>
			<table >
					</br>
						<tr>
						  <td id="titulo2" colspan="5" align="center">Solicitud Pago de Proveedor</td>
						</tr>
						
						
						<tr>
						  <td id="titulo1" colspan="5" align="center">Fechar:<?echo $fec; ?> Proveedor: <?echo $p; ?> RIF:<?echo $r;?></td>
						  
						</tr>
						
						
						<tr>
						<td  id="titulo3"  colspan="1" align="center">N°</td>
						<td  id="titulo3"   colspan="1" align="center">solicitud</td>
						<td  id="titulo3"  colspan="1" align="center">Cedula</td>
						<td  id="titulo3"  colspan="1" align="center">Tipo</td>
						<td  id="titulo3" colspan="1" align="center">Monto</td>
						</tr>
		
		
		
		<?  $d=$_POST['desde']-1; $h=$_POST['hasta']+1;
			include("opciones/conexion_prestamo.php");
			$personas =mysql_query("SELECT * FROM cheques  where solicitud>'$d' and solicitud<'$h' ",$conexPres);
			while($vector = mysql_fetch_assoc($personas))
				{

						?><tr><?
						?><td align="center" ><? ECHO $q=$q+1;?></td><?
						?><td align="center" ><?echo $vector['solicitud'];?></td><?
						?><td align="center" ><?echo $vector['cedula'];?></td><?
						?><td align="center" ><?echo $vector['concepto1'];?></td><?
						?><td align="right" ><?echo  $monto=$vector['cheque'];?></td><?
						?></tr><?
						$total=$monto+$total;
					
					}?>
					
					<tr>
						<td align="center" ></td>
						<td align="center" ></td>
						<td align="center" ></td>
						<td id="titulo2"  align="center" >Total</td>
						<td id="titulo3"  align="right" ><?echo $total; ?></td>
						</tr>
					

	</table>
		<?}?>		
				
</div>			
<div align="center" style=" border:0px solid blue; width:500px;  ">
		
		<? if($_POST['fecha']) { ?>
				<table >	
				<form id="form2" name="form2" method="post" action="pago_proveedor.php">
					<tr>
							
							
							<input name="d"  type="hidden" id="fecha"  value="<? echo $_POST['desde'];?>" >
								<input name="h"  type="hidden" id="fecha"  value="<?echo $_POST['hasta'];?>" >
								
								
								<input name="f"  type="hidden" id="fecha"  value="<? echo $_POST['fecha'];?>" >
								<input name="p"  type="hidden" id="fecha"  value="<?echo $_POST['proveedor'];?>" >
								<input name="Genera"  type="hidden" id="fecha"  value="<?echo $_POST['g'];?>" >
								
								<td align="center" >
									
										<input name="boton3" type="HIDDEN" id="boton3" />
										<input  name="actualizar" type="button" id="actualizar" value="Actualizar" onclick="Actualizar()" />
									 
								
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
