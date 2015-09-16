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
<? /*Pago_Persona_Natural.php*/ ?>

<script type="text/javascript">
function guardar(){

	 
	if(document.form1.fecha.value.length==0){
		alert("Defina Fecha");
		document.form1.fecha.focus();
	}
	else if(document.form1.ced.value.length==0){
		alert("Defina cedula");
		document.form1.ced.focus();
	}
	else if(document.form1.sol.value.length==0){
		alert("Defina Numero solicitud");
		document.form1.sol.focus();
	}
	
	
	
			
	else{
		document.form1.boton1.value="entrar";
		document.form1.submit();  
	}
}
</script>





<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div>



<div align="center" style="  ">  

       <form id="form1" name="form1" method="post" action="Pago_Persona_Natural.php">
       
			<table  border="0" cellpadding="0" cellspacing="0">
				</br>
				<tr>
				  <td id="titulo1" colspan="2" align="center" bgcolor="#FFFFFF">Solicitud Pago de Proveedor</td>
				</tr>
				 
				
				
				<tr>
					<td width="120px" >Fecha:</td> 
					<td><input name="fecha"  type="date" id="fecha" size="19" maxlength="10" ></td>
				</tr>
				
				<tr>
					<td>Cedula:</td>
					<td><input name="ced"  type="text" id="desde" size="10" maxlength="10" onKeyPress="return permite(event,'num')"></td>
					
				</tr>
				<tr>
					<td>Generar Archivo:</td>
					<td align="center" > <input name="g" type="checkbox" onClick="output()" value="txt" /></td>
				</tr>
				<tr>
					<td>N° Solicitud:</td>
					<td><input name="sol"  type="text" id="desde" size="5" maxlength="5" onKeyPress="return permite(event,'num')"></td>
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

	
	
	
	
	 <?  $s=$_POST["sol"];
         $fec=$_POST['fecha'];
         echo $ced=$_POST['ced'];
         if($_POST["sol"]){
                    $f = explode("-",$_POST['fecha']);
                    $a=$f[0]; // porción1
                    $m=$f[1]; // porción2
                    $d=$f[2];
					
			include("opciones/conexion.php"); 

			$b = mysql_query ("SELECT * FROM socios where cedula= '$ced' ",$conex); while ($v=mysql_fetch_assoc($b))	
			{   $cedula=$v['cedula'];  	}

         
         
            $conexion = odbc_connect("FOX","","","");
                        $sql="Select * from cheques where solicitud ='$s' and fecha = CTOD('$m/$d/$a') ";
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
        
                                }
		 }
         ?>
	
	
	
	
	
	
	
 </div>
 
 
 <div align="center" style=" border:0px solid blue; width:700px; height:200px; overflow-x:hidden; overflow-y:scroll;">
	
	<?
	
	
		if($_POST['fecha']) {
		
		?>
			<table >
					</br>
						<tr>
						  <td id="titulo2" colspan="5" scope="col" align="center">Solicitud Pago de Proveedor</td>
						</tr>
						
						
						
						
						
						<tr>
						<td  id="titulo3"  colspan="1" align="center">N°</td>
						<td  id="titulo3"   colspan="1" align="center">solicitud</td>
						<td  id="titulo3"  colspan="1" align="center">Proveedor</td>
						<td  id="titulo3"  colspan="1" align="center">Tipo</td>
						<td  id="titulo3" colspan="1" align="center">Monto</td>
						</tr>
		
		
		
		<?  
			include("opciones/conexion_prestamo.php");
			$personas =mysql_query("SELECT * FROM cheques  where solicitud = '$s' ",$conexPres);
			while($vector = mysql_fetch_assoc($personas))
				{

						?><tr><?
						?><td align="center" ><? ECHO $q=$q+1;?></td><?
						?><td align="center" ><?echo $vector['solicitud'];?></td><?
						?><td align="center" ><?echo $vector['beneficiario'];?></td><?
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
				<form id="form2" name="form2" method="post" action="Pago_Persona_Natural.php">
					<tr>
							
							
						
								
								<input name="solicitud"  type="hidden" id="fecha"  value="<? echo $_POST['sol'];?>" >
								<input name="f"  type="hidden" id="fecha"  value="<? echo $_POST['fecha'];?>" >
								<input name="c"  type="hidden" id="fecha"  value="<? echo $_POST['ced'];?>" >
								<input name="Genera"  type="hidden" id="fecha"  value="<? echo $_POST['g'];?>" >
								
								<td align="center" >
									
										Número de Cuenta:
					
											  <select  name="cuenta"  id="cuenta">
											  <option required value="">  </option>
											  <?	echo $ced=$_POST['ced']; 
			include("opciones/conexion.php"); $b = mysql_query ("SELECT * FROM socios where cedula= '$ced' ",$conex); while ($v=mysql_fetch_assoc($b))	{   $cedula=$v['cedula'];  	?>
											 
											  <option required value="<?php echo $v['N_cuenta'];?>"> <?php echo $v['N_cuenta'];  ?> </option>
											  <option required value="<?php echo $v['N_cuenta2'];?>"> <?php echo $v['N_cuenta2'];  ?> </option>;
											  <option required value="<?php echo $v['N_cuenta3'];?>"> <?php echo $v['N_cuenta3'];  ?> </option>;
											  <?php } ?>
											  </select>	
					
								
								</td>
					</tr>
					<tr>
								<td align="center" >
									
										<input name="boton3" type="HIDDEN" id="boton3" />
										<input  name="actualizar" type="button" id="actualizar" value="Actualizar" onclick="Actualizar()" />
									 
								
								</td>
														
								
																
					</tr>
				</form> 
				</table>
		
		
		<?}?>	
		
		

</div>		
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    
    
    
    
<?if($_POST["boton3"]=="actualizar")
{
/*
	 echo $p=$_POST['p'];?></br><?
	 echo $_POST['f'];?></br><?
	 echo $_POST['Genera'];?></br><?
	 echo $_POST['solicitud'];?></br><?
	
	*/
	
	$_SESSION["a1"]=$_POST['c'];
	$_SESSION["a2"]=$_POST['f'];
	$_SESSION["a3"]=$_POST['solicitud'];
	$_SESSION["a4"]=$_POST['cuenta'];
	$n_cuenta=$_POST['cuenta'];
		
		$f = explode("-",$_POST['f']);
			$a=$f[0]; // porción1
			$m=$f[1]; // porción2
			$d=$f[2];

			if($_POST['Genera']=="txt")			
				{	
				$ced=$_POST['c'];
				
				
				
				include("opciones/conexion.php"); 

			$b = mysql_query ("SELECT * FROM socios where cedula= '$ced' ",$conex); while ($v=mysql_fetch_assoc($b))	
			{   
				$ced=$v['cedula']; 
				$proveedor=$v['nom_ape']; 
				$n=$v['nacionalidad']; 
				/*$n_cuenta=$v['N_cuenta']; */
				

			}
		
		
		
				
			
														
															if(trim($ced))
															{

																switch(strlen($ced)){
																
																										 
																
																 case "1" : $c = $n."000000000" . $ced; break;
																 case "1" : $c = $n."00000000" . $ced; break;
																 case "2" : $c = $n."0000000" . $ced; break;
																 case "3" : $c = $n."000000" . $ced; break; 
																case "4" : $c =  $n."00000" . $ced; break; 
																case "5" : $c =  $n."0000" . $ced; break; 
																case "6" : $c =  $n."000" . $ced; break; 
																case "7" : $c =  $n."00" . $ced; break; 
																case "8" : $c = $n."0" . $ced; break; 
																
																}
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
															
															
			
			$ar=fopen("Pago Proveedor/$proveedor$d$m$a.txt","a") or
			die("Problemas en la creacion");
			
			$s=$_POST['solicitud'];
			
			include("opciones/conexion_prestamo.php");
				$buscar = mysql_query ("SELECT * FROM cheques  where solicitud='$s'  ",$conexPres);
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
			
				
			  
			  fputs($ar,$c);
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
			
			
			$s=$_POST['solicitud'];
			include("opciones/conexion_prestamo.php");
				$buscar = mysql_query ("SELECT * FROM cheques  where solicitud='$s'  ",$conexPres);
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
											echo "<script type='text/javascript'> alert('Actualización satisfactorio guarde el reporte ');document.location.href = ('Pago_Persona_Natural2.php'); </script>";
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
