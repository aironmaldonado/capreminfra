<?
	session_start();
	require_once("opciones/conexion.php");
	include("opciones/seguridad.php");
	
					
					$usunom=$_SESSION["usunom"]; 
					$usuapel=$_SESSION["usuapel"]; 
					$usuusu=$_SESSION["usuusu"]; 
					$nombre_pc=$_SESSION["nombre_pc"];
					$hora=$_SESSION["hora"];
					$fecha=$_SESSION["fecha"];	
					$cedula_socio=$_SESSION["cedula_socio"];	
					$cod_socio=$_SESSION["cod_socio"];
						
														
					/*variables pasado por el metodos post */	
						//echo ('-'),$monto=$_POST["ms"];
						//echo ('-'),$vplazo=$_POST["plazo"];
						//echo ('-'),$cedulaS=('6198945');
						$monto=$_POST["ms"];
						$vplazo=$_POST["plazo"];
						$cedulaS=$_SESSION["cedulaS"];
					/*----fin----*/
				?>	
					<script type="text/javascript">
					function calcular(){

						
						if(document.form1.ms.value.length==0){
							alert("Defina monto solicitar"); 
						   document.form1.ms.focus(); 
						}
						else if(document.form1.plazo.value.length==0){
							alert("Defina plazo");
							document.form1.plazo.focus();
						}
						else{
							document.form1.boton1.value="Calcular";
							document.form1.submit();  
						}
					}


					function guardar(){

						
						if(document.form1.d1.value.length==0){
							alert("Defina monto solicitar"); 
						   document.form1.d1.focus(); 
						}
						else if(document.form1.d2.value.length==0){
							alert("Defina plazo");
							document.form1.d2.focus();
						}
						else if(document.form1.d3.value.length==0){
							alert("Defina plazo");
							document.form1.d3.focus();
						}
						
						else if(document.form1.d4.value.length==0){
							alert("Defina plazo");
							document.form1.d4.focus();
						}
						
						else if(document.form1.d5.value.length==0){
							alert("Defina plazo");
							document.form1.d5.focus();
						}
						
						else if(document.form1.d6.value.length==0){
							alert("Defina plazo");
							document.form1.d6.focus();
						}
						
						else if(document.form1.d7.value.length==0){
							alert("Defina plazo");
							document.form1.d7.focus();
						}
						else{
							document.form1.boton2.value="Guardar";
							document.form1.submit();  
						}
					}			

							function regresas(){
					document.form1.boton3.value="Regresas";
					document.location.href = ('inicio.php');
					document.form1.href = ('inicio.php'); 
						
					}	
					
					
					
					function reporte(){
					//document.form1.boton3.value="Regresas";
					window.open("reportes/R_Hipotecario.php","mywindow","location=1,status=1,scrollbars=1,width=100,height=100");
					//document.location.href = ('inicio.php');
					//document.form1.href = ('inicio.php'); 
						
					}	

					</script>
										
				<?	
					
					
					
					
					
					
					
					
					
					
					
					
					
	if($_POST['boton2']=="Guardar")
			{	
			$dir=$_SESSION["direccion"];
			
			
$d1=$_POST["d1"];
$d2=$_POST["d2"];
$d3=$_POST["d3"];
$d4=$_POST["d4"];
$d5=$_POST["d5"];
$d6=$_POST["d6"];
$d7=$_POST["d7"];

include("opciones/conexion_prestamo.php"); 
					$b = mysql_query ("SELECT COUNT(*) as registros FROM Analisis_hipotecario WHERE id_analisis_hipotecario='$cedulaS' and status_Analisis_hipotecario='Activa'  ",$conexPres);
					while($v=mysql_fetch_assoc($b))	
					{
					  $n_registro=1+$v['registros']; 
					 
					}

				if($n_registro<=3)
			{	
					
				$consulta=mysql_query(" INSERT INTO Analisis_hipotecario (
				`cod_analisis_hipotecario` ,
				`id_analisis_hipotecario` ,
				`monto` ,
				`cut_mensual` ,
				`seg_incendio` ,
				`seg_vida` ,
				`total_inc_vid` ,
				`total_cuo_mens` ,
				`total_sobre_neto` ,
				`plazo` ,
				`opcion`,
				`status_Analisis_hipotecario`
			
				)
				VALUES (
				NULL , '$cedulaS', '$d1', '$d2', '$d3', '$d4', '$d5', '$d6', '$d7', '$vplazo', '$n_registro','Activa'
				);
				",$conexPres);
	
			}	
			
			else 
			{
				echo "<script type='text/javascript'> alert('Lo sentimos máximo 3 solicitudes.'); </script>";
			}				
					
	}				
					
					
					
					
					
 else if($_POST['boton1']=="Calcular")
			{
					//echo ("calculo");			
	
						
					include("opciones/conexion.php");
					$b = mysql_query ("SELECT * FROM socios WHERE cedula = '$cedulaS'  ",$conex);
					while($v=mysql_fetch_assoc($b))	
					{ 
					$fec=$v['F_nacimiento']; 
					$f_nacimiento = explode("-",$fec);
					$anioc =date("Y");
					$aaaaN=$f_nacimiento[0]; 
					 $edad=$anioc-$aaaaN;
						}	

						
					include("opciones/conexion_prestamo.php"); 
					$b = mysql_query ("SELECT * FROM `cotizador` WHERE `edad_tarifa` ='$edad' AND `duracion_seguro` ='$vplazo'  ",$conexPres);
					while($v=mysql_fetch_assoc($b))	
					{
					  $tasa_hipo2=$v['tasa/1000']; 
					 
					}

						
						//echo ('-'),$anioc; 
						//echo ('-'),$aaaaN; 
						//echo ('-'),$edad; 
						//echo ('-'),$tasa_hipo2;
						
						
						
						
					/*----------------------- cotizador --------------------------------------------*/
					$tasa_hipo1=("0.00174"); /*esta tasa esta administrate por menrcantil seguros */
					$p1=($monto*$tasa_hipo1);
					$p2=($monto*$tasa_hipo2);
					$cuota_seguro=$p1+$p2;

					/*------------------------fin-----------------------------------*/
						//echo ('-'),$cuota_seguro; 

						
						
						
						
					/*--------------------------claculo del factor -------------------------------------*/

					include("opciones/conexion_prestamo.php"); 
					$b = mysql_query ("SELECT max(cod_solicitudes) as solicitudes FROM solicitudes WHERE id_solicitudes = '$cedulaS'  ",$conexPres);
					while($v=mysql_fetch_assoc($b))	
					{ 
					  $cod_solicitudes=$v['solicitudes']; 
					}	
						

						
					$b = mysql_query ("SELECT * FROM solicitudes as sol inner join tipo_prestamos as tp on (sol.cod_tipo_prestamo=tp.cod_tipo_prestamo) WHERE cod_solicitudes = '$cod_solicitudes'  ",$conexPres);
					while($v=mysql_fetch_assoc($b))	
					{
					 $cod_prestamo=$v['cod_tipo_prestamo']; 	
					 $tipo_prestamo=$v['tipo_prestamo']; 
					 $numeros_cuotas=$v['numeros_cuotas']; 
					 $porc_prest=$v['porc_prest'];
					 $anos=$numeros_cuotas/12;
					  $monto_avaluo=$v['monto_avaluo'];
					 }		
					$Mont_avaluo1=$monto_avaluo/100*75;
					 
						
						$monto=$_POST["ms"];
						$cuota1=$_POST["plazo"];
						$vpor=$porc_prest;
						$monto;
						$vplazo=$cuota1*12;
						

								
					//$monto=100.000;
					//$vplazo=12;
					//$vpor=12;
					$vcuota=$monto/$vplazo;
					$vfactor=$vpor/12/100;
					$fac=1+$vfactor;
					$ac=1;
					$co=0;
					for($co=0;$co<$vplazo;$co++)
					{
					$ac=$ac*$fac;
					}
					$vfactor2=($vfactor*$ac)/($ac-1);
					//echo $vfactor2;
					$cuota2=$monto*$vfactor2;
					$co=0;
					for($co=0;$co<$vplazo;$co++)
					{
					$vinteres=$monto*$vfactor;
					$vcapital=$cuota2-$vinteres;
					$monto=$monto-$vcapital;

					$vacum=$vacum+$vinteres;

					}
						


					/*-------------------------------------fin------------------------------- */
						
					
			
					
					
					
					/*------------------------------------- Monto_incendio ------------------------------- */
						
						
						include("opciones/conexion_prestamo.php"); //conexPres
								$b = mysql_query (" SELECT * FROM `seguro` where cod_solicitudes= '$cod_solicitudes' ",$conexPres);
					while($v=mysql_fetch_assoc($b))
					{
					$peso=$v['peso']; 	
					 $estatura=$v['estatura']; 
						 //$monto_avaluo=$v['monto_avaluo']; 					 
					}	
					
					
					/*$b = mysql_query ("SELECT max(cod_solicitud_hipotecario) as solicitud_hipotecario FROM solicitud_hipotecario WHERE id_solicitud_hipotecario = '$cedulaS'  ",$conexSC);
					while($v=mysql_fetch_assoc($b))	{  $cod_s_h=$v['solicitud_hipotecario']; 	}			
										
					$b = mysql_query ("SELECT * FROM solicitud_hipotecario WHERE cod_solicitud_hipotecario = '$cod_s_h'  ",$conexSC);
					while($v=mysql_fetch_assoc($b))	
					{
					 $cod_prestamo=$v['cod_tipo_prestamo']; 
					 $peso=$v['peso']; 	
					 $estatura=$v['estatura']; 	
					$monto_avaluo=$v['monto_avaluo']; 
					}*/	

					$monto_incendio=$monto_avaluo*0.22/100;
					//$Mont_avaluo=$monto_avaluo/100*75;
					/*-------------------------------------fin------------------------------- */
						

					/*--------------- Calculo de las deduciones  60% sueldo ------------------------------*/	

					include("opciones/conexion.php");
					$b = mysql_query (" SELECT Max(cod_sueldo) as cod_sueldo FROM `sueldo` where id_sueldo= '$cedulaS' ",$conex); while($v=mysql_fetch_assoc($b))	{	$cod_sueldo=$v['cod_sueldo']; 	}	
					
					
					$b = mysql_query ("SELECT * FROM sueldo WHERE cod_sueldo = '$cod_sueldo'  ",$conex);
					while($v=mysql_fetch_assoc($b))	
					{  

					$d1=$v['sueldo_mensual']; 
					$d2=$v['bono_antiguedad'];
					$d3=$v['prima_jerarquia'];
					$d4=$v['prima_riesgo'];
					$d5=$v['prima_hijo'];
					$d6=$v['prima_hogar'];
					$d7=$v['prima_profesional'];

					$total_debe=$d1+$d2+$d3+$d4+$d5+$d6+$d7;
					

					$d8=$v['sueldo_neto_mensual'];

					$h1=$v['credito_hipotecario'];
					$h2=$v['prestamo_personal'];
					$h3=$v['capresovit'];
					$h4=$v['suministro'];
					$h5=$v['proveeduria'];
					$h6=$v['credinomina'];
					
					$total_haber=$d8-$h1-$h2-$h3-$h4-$h5-$h6;
					
					
					}
					
					
					
					
					/*$b = mysql_query ("SELECT * FROM solicitud_hipotecario WHERE id_solicitud_hipotecario = '$cedulaS'  ",$conexSC);
					while($v=mysql_fetch_assoc($b))	
					{  

					$d1=$v['sueldo_mensual']; 
					$d2=$v['bono_antiguedad'];
					$d3=$v['prima_jerarquia'];
					$d4=$v['prima_riesgo'];
					$d5=$v['prima_hijo'];
					$d6=$v['prima_hogar'];
					$d7=$v['prima_profesional'];

					$total_debe=$d1+$d2+$d3+$d4+$d5+$d6+$d7;
					

					$d8=$v['sueldo_neto_mensual'];

					$h1=$v['credito_hipotecario'];
					$h2=$v['prestamo_personal'];
					$h3=$v['capresovit'];
					$h4=$v['suministro'];
					$h5=$v['proveeduria'];
					$h6=$v['credinomina'];
					
					$total_haber=$d8-$h1-$h2-$h3-$h4-$h5-$h6;
					
					
					}		*/

					/*--------------fin--------------------------------*/	


							
					
					
					/*-------------- porcentaje de descuento de nomina---------------------*/
					
					
					include("opciones/conexion.php");
					$b = mysql_query ("SELECT * FROM socios as soc  inner join nomina as nom on (soc.cod_socio=nom.cod_socio) inner join organismo as org on(nom.cod_organismo=org.cod_organismo)  WHERE cedula = '$cedulaS'  ",$conex);
					while($v=mysql_fetch_assoc($b))	
					{ 
					$porcentaje_descuento=$v['capacidad_descuento_porcentaje']; 
					
						}
					
					/*-------------------------------------------------------------------*/
					
					/*-------------- variables --------------------------------*/	
					$monto_avaluo; 
					$cuota_seguro;
					$vfactor2;
					$monto_incendio;
					$total_debe;
					$total_haber;
					$monto=$_POST["ms"];
					$vplazo=$_POST["plazo"];
					$vplazo;
					$Mont_avaluo;
					$cuota2;
					$porcentaje_descuento;
					/*--------------fin--------------------------------*/
					
					/*----------------calculo de analisis------------- */
							$monto;
							$cuota2; 
							 $monto_incendio;
							 $cuota_seguro;
							 $total_cuota_seguro=($monto_incendio+$cuota_seguro)/12;
							$total_cuota_mensual=$cuota2+$total_cuota_seguro;
							$t=$total_cuota_mensual/$total_haber*100;
						/*	<td colspan=1>SOLICITADO</td>
							<td colspan=1>Bs<?echo $monto;?></td>
							<td colspan=1>Bs<?echo $cuota2;?></td>
							<td colspan=1>Bs<?echo $monto_incendio;?></td>
							<td colspan=1>Bs<?echo $cuota_seguro;?></td>
							<td colspan=1>Bs<?echo $total_cuota_seguro=($monto_incendio+$cuota_seguro)/12;?></td>
							<td colspan=1>Bs <?echo $total_cuota_mensual=$cuota2+$total_cuota_seguro;?></td>
							<td colspan=1>Bs <?echo $t=$total_cuota_mensual/$total_haber*100; ?></td>*/
					
					/*----------fin------------------------------------*/
					
					
					
					
					 $Mont_avaluo1;
						
	if($monto>$Mont_avaluo1)
			{
				echo "<script type='text/javascript'> alert('pasa el limite 75% avaluo'); </script>";
			}	
			
			
			
	
		//<script type="text/javascript"> var opciones = "width=350,height=250,scrollbars=yes";	window.open("calculadora.php","nombreventa na", opciones);</script> 	
			
			
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
			
			
			<script type="text/javascript" src="JavaScript/evento_permitidos.js"></script>
			<!--------------quitar el escrol ----------------->
			<style type="text/css">  body {overflow-y:hidden; overflow-x:hidden }</style>



</head>

<body>









<div class="panel"  >

<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 150px;" >
<div >
 <form id="form1" name="form1" method="post" action="Solicitud_Credito_Hipotecario4.php">
       
		
		
<!------------------------------------------------------------------------------------------------------------------------------------>			
			<table  colspan="4" align="center">	
				
				<tr>
				  <td colspan="4" id="titulo2" align="center" >Calculo de Póliza de Seguro</td>
				</tr>
				<tr>
					<td colspan=1>Monto de Solicitud</td>
					<td colspan=1><input type="text" name="ms" value=" " Placeholder="<? echo $max_solicitar; ?>" size="8"></td>
				</tr>
				<tr>
					<td>
							<?include("opciones/conexion_administrador.php"); ?>
								Plazo  : 
								<select  name="plazo"   id="plazo" >
								  <option  > <? echo $vplazo;?></option>;
								  <?//$buscar = mysql_query ("SELECT * FROM plazo WHERE  plazo <= '$anos' ",$conexSC);?>
								  <?$buscar = mysql_query ("SELECT * FROM plazo  ",$conexadmi);?>
								  <?php while($vec1=mysql_fetch_row($buscar)){?>
								  <option required value="<?php echo $vec1[1];?>"> <?php echo $vec1[1];  ?> </option>;
								  <?php } ?>
								  </select>
					</td>
				</tr>
				
				<tr>   
					<td colspan=4 align="center" >
						
						 
						<input name="boton1" type="HIDDEN" id="boton1" />
						<input name="Calcular" type="button" id="Calcular" value="Calcular" onClick="calcular()" />
						<input name="boton3" type="HIDDEN" id="boton3" />
						<input name="Regresas" type="button" id="Regresas" value="Regresas" onclick="regresas()" />
						<input type="hidden" name="d1" value="<?echo $monto;?>" >
						<input type="hidden" name="d2" value="<?echo $cuota2;?>" >
						<input type="hidden" name="d3" value="<? echo $monto_incendio;?>" >
						<input type="hidden" name="d4" value="<? echo $cuota_seguro;?>" >
						<input type="hidden" name="d5" value="<? echo $total_cuota_seguro; ?>" >
						<input type="hidden" name="d6" value="<? echo $total_cuota_mensual; ?>" >
						<input type="hidden" name="d7" value="<? echo $t; ?>" >
						<input name="boton2" type="HIDDEN" id="boton2" />
						<input name="Guardar" type="button" id="Guardar" value="Guardar" onClick="guardar()" />
						
						<input name="boton4" type="HIDDEN" id="boton4" />
						<input name="Reporte" type="button" id="Reporte" value="Reporte" onClick="reporte()" />
					</form>
					</td>                                
				</tr>
			</table>
</br>

















<div id="fondo"  align="center" class="panel1" style="  margin-left:1px;   font: bold 90% monospace; " >	

<table  BORDER=1 colspan="9">	
				<tr>
				  <td colspan="9" id="titulo3" align="center" >Calculo Para El Prestamo</td>
				</tr>
				<tr>
		<td rowspan=2> </td>
		<td align="center" colspan=2>CRÉDITO</td>
		<td align="center" colspan=3>SEGURO</td>
		<td align="center" colspan=2>TOTALES</td>
	</tr>
	<tr>
	
		<td align="center"colspan=1>MONTO Bs.</td>
		<td align="center"colspan=1>CUT MENSUAL</td>
		<td align="center"colspan=1>INCENDIO</td>
		<td align="center"colspan=1>VIDA </td>
		<td align="center"colspan=1>TOTAL</td>
		<td align="center"colspan=1>TOTAL CUOTA MENSUAL</td>
		<td align="center"colspan=1>(%) SOBRE EL NETO</td>
	</tr>
	
	<tr>
		<td colspan=1></td>
		<td colspan=1>Bs<?echo number_format($monto, 2, ",", "."); //round($monto,2) //$monto;?></td>
		<td colspan=1>Bs<?echo number_format($cuota2, 2, ",", "."); //round($cuota2,2) //$cuota2;?></td>
		<td colspan=1>Bs<?echo number_format($monto_incendio, 2, ",", "."); //round($monto_incendio,2) //$monto_incendio;?></td>
		<td colspan=1>Bs<?echo number_format($cuota_seguro, 2, ",", "."); //round($cuota_seguro,2) //$cuota_seguro;?></td>
		<td colspan=1>Bs<?echo number_format($total_cuota_seguro, 2, ",", "."); //round($total_cuota_seguro,2) //$total_cuota_seguro;?></td>
		<td colspan=1>Bs<?echo number_format($total_cuota_mensual, 2, ",", "."); //round($total_cuota_mensual,2) //$total_cuota_mensual;?></td>
		<td colspan=1><?echo number_format($t, 2, ",", "."); //round($t,2) //$t;?>%</td>
		
	</tr>
	<?
	include("opciones/conexion_prestamo.php"); //conexPres
	$b = mysql_query ("SELECT COUNT(*) as registros FROM Analisis_hipotecario WHERE id_analisis_hipotecario='$cedulaS' and status_Analisis_hipotecario='Activa'  ",$conexPres);
					while($v=mysql_fetch_assoc($b))	
					{
					 $n_registro=1+$v['registros']; 
					 
					}
		
		
		$b = mysql_query ("SELECT * FROM Analisis_hipotecario WHERE id_analisis_hipotecario='$cedulaS' and status_Analisis_hipotecario='Activa' and opcion='1'  ",$conexPres);
					while($v=mysql_fetch_assoc($b))	
					{
					 $monto=$v['monto']; 
					  $cut_mensual=$v['cut_mensual']; 
					   $seg_incendio=$v['seg_incendio']; 
					    $seg_vida=$v['seg_vida']; 
						 $total_inc_vid=$v['total_inc_vid']; 
						  $total_cuo_mens=$v['total_cuo_mens']; 
						   $total_sobre_neto=$v['total_sobre_neto']; 
						   
					}			
					
	if($n_registro>1){ ?>
					
	<tr>
		<td colspan=1>SOLICITADO</td>
		<td colspan=1>Bs.:<?echo number_format($monto, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($cut_mensual, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($seg_incendio, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($seg_vida, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($total_inc_vid, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($total_cuo_mens, 2, ",", ".");?></td>
		<td colspan=1><?echo number_format($total_sobre_neto, 2, ",", ".");?>%</td>
		
	</tr>
	<?} if($n_registro>2){ 
		include("opciones/conexion_prestamo.php"); //conexPres
		$b = mysql_query ("SELECT * FROM Analisis_hipotecario WHERE id_analisis_hipotecario='$cedulaS' and status_Analisis_hipotecario='Activa' and opcion='2'  ",$conexPres);
					while($v=mysql_fetch_assoc($b))	
					{
					 $monto=$v['monto']; 
					  $cut_mensual=$v['cut_mensual']; 
					   $seg_incendio=$v['seg_incendio']; 
					    $seg_vida=$v['seg_vida']; 
						 $total_inc_vid=$v['total_inc_vid']; 
						  $total_cuo_mens=$v['total_cuo_mens']; 
						   $total_sobre_neto=$v['total_sobre_neto']; 
						   }
	?>
	<tr>
		<td colspan=1>OPCIÓN A</td>
		<td colspan=1>Bs.:<?echo number_format($monto, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($cut_mensual, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($seg_incendio, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($seg_vida, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($total_inc_vid, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($total_cuo_mens, 2, ",", ".");?></td>
		<td colspan=1><?echo number_format($total_sobre_neto, 2, ",", ".");?>%</td>
		
	</tr>
	<?} if($n_registro>3){ 
	
	include("opciones/conexion_prestamo.php"); //conexPres
		$b = mysql_query ("SELECT * FROM Analisis_hipotecario WHERE id_analisis_hipotecario='$cedulaS' and status_Analisis_hipotecario='Activa' and opcion='3'  ",$conexPres);
					while($v=mysql_fetch_assoc($b))	
					{
					 $monto=$v['monto']; 
					  $cut_mensual=$v['cut_mensual']; 
					   $seg_incendio=$v['seg_incendio']; 
					    $seg_vida=$v['seg_vida']; 
						 $total_inc_vid=$v['total_inc_vid']; 
						  $total_cuo_mens=$v['total_cuo_mens']; 
						   $total_sobre_neto=$v['total_sobre_neto']; 
	}?>
	<tr>
		<td colspan=1>OPCIÓN B</td>
		<td colspan=1>Bs.:<?echo number_format($monto, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($cut_mensual, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($seg_incendio, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($seg_vida, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($total_inc_vid, 2, ",", ".");?></td>
		<td colspan=1>Bs.:<?echo number_format($total_cuo_mens, 2, ",", ".");?></td>
		<td colspan=1><?echo number_format($total_sobre_neto, 2, ",", ".");?>%</td>
	</tr>
	<?}?>
</table>

</div>




























</div>
</div>
</div>
<?include ("menu.php");?>
</div>

<div style="margin-left:-8px; ">
<marquee  style="position: absolute; text-align: center; width: 100%; bottom: 0px; width: 100%;color:#FFFFFF; " behavior="scroll" direction="left" bgcolor="#000000"  onmouseover="this.stop()" onmouseout="this.start()" scrollamount="4"> <?echo 	("Bienvenido: "), $usunom,(" "), $usuapel,(" al Sistema de Información Gerencial para el Manejo de Ahorros (S.I.G.M.A.). Usted ingreso con el usuario: "),$usuusu ,(" desde el Equipo: "),$nombre_pc, (" con fecha y hora: "), $fecha,(" "),$hora; ?>  </marquee>
</div>

<? //include("calculadora.php");?>

</body>
</html>
