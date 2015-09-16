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
							
							
							
?>


<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >





























































<script type="text/javascript">
function guardar(){

	 
	if(document.form1.bamco.value.length==0){
		alert("Defina  bamco");
		document.form1.bamco.focus();
	}else if(document.form1.FEmision.value.length==0){
		alert("Defina  F. Emision");
		document.form1.FEmision.focus();
	}
	else if(document.form1.FVencimiento.value.length==0){
		alert("Defina  F. Vencimiento");
		document.form1.FVencimiento.focus();
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






<div align="center">




  
	   <form id="form1" name="form1" method="post" action="Contabilidad_DPF.php">
       
			<table  border="1" cellpadding="0" cellspacing="0">
				</br>
				<tr>
				  <td colspan="3" align="center" id="titulo2"  >Consulta y Actualizacion de Socios </td>
				</tr>
				 
				
				<tr>
						
						 
					<td>Bamco:</td>
						<td>
						 <select  name="bamco" id="bamco">
									  <option required value=""> Seleccione</option>
									  <option required value="Todos">Todos</option>
									  <?include("opciones/conexion_administrador.php");  $buscar = mysql_query ("SELECT * FROM `banco` WHERE estatus='a'   ; ",$conexadmi);?>
									  <?php while($vec1=mysql_fetch_row($buscar)){?>
									  <option required value="<?php echo $vec1[1];?>"> <?php echo $vec1[1];  ?> </option>;
									  <?php } ?>
						 </select>
						</td>
						
				</tr>
				
				<tr>
						
						 
					<td align="center" >Periodo:</td>
						<td align="center">
							Desde
						</td>
						<td align="center" >
							Hata
						</td>
				</tr>
				
				
				
				<tr>
						
						 
					<td></td>
						<td>
							<input name="FEmision"  type="date" id="FEmision" size="19" maxlength="10" onKeyPress="return permite(event,'num')" >
						</td>
						<td>
							<input name="FVencimiento"  type="date" id="FVencimiento" size="19" maxlength="10" onKeyPress="return permite(event,'num')" >
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

if($_POST['boton1']=="entrar")
			{
				
							/*---------------------------------- saca el periodo del banco -----------------------------------------*/					
				
		$fe = explode("-",$F_emi_usu);
					$fea=$fe[0]; // porción1
					$fem=$fe[1]; // porción2
					$fed=$fe[2];
					
			$fv = explode("-",$F_ven_usu);
					$fva=$fv[0]; // porción1
					$fvm=$fv[1]; // porción2
					$fvd=$fv[2];
			$PeriodoVen=gregoriantojd($fvm,$fvd,$fva);		
			$PeriodoEmi=gregoriantojd($fem,$fed,$fea);		
			$dias=$PeriodoVen-$PeriodoEmi;
				
				
$buscar = mysql_query ("SELECT * FROM dpf where  emitido1='x' and emitido2='x'  and banco like '%$bamco%' ",$conexPres);
	
				    while($vec1=mysql_fetch_assoc($buscar))
							{
								include("opciones/conexion_prestamo.php");
								$cod_dpf=$vec1["cod_dpf"]; 
								$F_emi_dpf =$vec1["femision"]; 
								$F_ven_dpf =$vec1["fvencimiento"];

								$FEmision1 = explode("-",$F_emi_dpf);
								$feaaaa=$FEmision1[0]; 	$femm=$FEmision1[1]; $fedd=$FEmision1[2];
								$fvencimiento1 = explode("-",$F_ven_dpf);
								$fvaaaa=$fvencimiento1[0]; $fvmm=$fvencimiento1[1]; $fvdd=$fvencimiento1[2];
					
								 $Emi=gregoriantojd($femm,$fedd,$feaaaa);					
								 $Ven=gregoriantojd($fvmm,$fvdd,$fvaaaa);	
								
								
								/*
								echo ('Fecha usu__'),$F_emi_usu, ('>=');	echo ('__fecha Dpf:___'),$F_emi_dpf; ?></br><?
								echo ('Fecha usu__'),$F_ven_usu, ('>=');	echo ('__fecha Dpf:___'),$F_ven_dpf;?></br><?
								*/
								
								
								
								if($F_emi_dpf >= $F_emi_usu && $F_ven_dpf  <= $F_ven_usu)
								{	
									
									//echo ("opcA"); 
									 //$intPeriodo=($Emi-$Ven)*-1;
									$int_diferido=$Ven-$Emi; 
									$intGenerado=0;
									$porpagar=0;
																	
								}
								
								
								else if($F_emi_dpf  <= $F_emi_usu && $F_ven_dpf  > $F_ven_usu )
								{
									/*echo ("opcB"); */
										
									 $intGenerado=$PeriodoEmi-$Emi;	        			
									 $int_diferido=$PeriodoVen-$PeriodoEmi;			
									 $porpagar=$Ven-$PeriodoVen;	        	
								
								}
								
								
								else if( $F_emi_dpf  >= $F_emi_usu && $F_ven_dpf  > $F_ven_usu  )
								{
									//echo ("opcC"); 
									
									  $intGenerado=0;									
									  $int_diferido=$PeriodoVen-$Emi;						
									  $porpagar=$Ven-$PeriodoVen;		
								
								}
									
									
									
									
									else if( $F_emi_usu  > $F_emi_dpf && $F_ven_usu  >= $F_ven_dpf  )
								{
									//echo ("opcD"); 
									
									 $intGenerado=$PeriodoEmi-$Emi;						
									 $int_diferido=$Ven-$PeriodoEmi;						
									 $porpagar=0;
									 
								}
								
								
								
								mysql_query (" UPDATE  dpf SET Int_abonado =  '$intGenerado' ,	 int_diferido =  '$int_diferido' , int_PorVencer =  '$porpagar'   WHERE  cod_dpf ='$cod_dpf'  ",$conexPres);

							}
							
		
		




}
?>
</div>

<div style=" border:0px solid blue; width:900px; height:200px; overflow-x:hidden; overflow-y:scroll;" >


  <table width="100%" border="1" cellspacing="0" cellpadding="4">
   <tr>
	   <td align="center" colspan="9" id="titulo2" >Depositos A Plazo Fijo</td>
	   <td align="center" colspan="3" id="titulo2" >Intereses</td>
   </tr>
	<tr>
      
      <td bgcolor="#9999CC">N. DBF</td>
	  <td bgcolor="#9999CC">Banco</td>
      <td bgcolor="#9999CC">Fecha Emi.</td>
	  <td bgcolor="#9999CC">Fecha Ven. </td>
      <td bgcolor="#9999CC">N. Capital</td>
      <td bgcolor="#9999CC">Plazo</td>
      <td bgcolor="#9999CC">Tasa</td>
      <td bgcolor="#9999CC">Tipo </td>
	  <td bgcolor="#9999CC">Interes A Obtener </td>
	  <td bgcolor="#9999CC">Abonado</td>
      <td bgcolor="#9999CC">Diferido</td>
	  <td bgcolor="#9999CC">Por Vencer</td>
     
	</tr>
    
	<?
	
			$bamco=$_POST["bamco"];
			$FEmision=$_POST["FEmision"];
			$FVencimiento=$_POST["FVencimiento"];
			

			
			
			
			
include("opciones/conexion_prestamo.php");


			
			
			
			include("opciones/conexion_prestamo.php");
			$buscar = mysql_query ("SELECT * FROM dpf where  emitido1='x' and emitido2='x' ",$conexPres);	
			
				    while($vec1=mysql_fetch_assoc($buscar))
							{
					$vec1["banco"]; 
					$cap= number_format($vec1["nuevo_capital"], 2, ',', '.'); 
					$int= number_format($vec1["interes"], 2, ',', '.'); 	
					$tasa=$vec1["tasa"];
					$abo=$vec1["Int_abonado"];
					$dif=$vec1["int_diferido"];
					$pven=$vec1["int_PorVencer"];
					$cap1= $vec1["nuevo_capital"];
					
		 $Abonado=(($cap1*($tasa/100))*$abo)/360;
		$Diferido=(($cap1*($tasa/100))*$dif)/360;
		$Vencer=(($cap1*($tasa/100))*$pven)/360;
		
?>
      <tr>
		<td><?php echo $vec1["ndpf"]; ?></td>
        <td><?php echo $vec1["banco"]; ?></td>
        <td><?php echo $vec1["femision"]; ?></td>
		<td><?php echo $vec1["fvencimiento"]; ?></td>
		<td><?php echo $cap; //$vec1["nuevo_capital"]; ?></td>
        <td><?php echo $vec1["plazo"]; ?></td>
		<td><?php echo $vec1["tasa"],("%");?></td>
        <td><?php echo $vec1["tipo"]; ?></td>
        <td><?php echo $int;?></td>
		
		
		
		<td><?php echo number_format($Abonado, 2, ',', '.');  ?></td>
		<td><?php echo number_format($Diferido, 2, ',', '.'); ?></td>
        <td><?php echo number_format($Vencer, 2, ',', '.');  ?></td>
		
		
		
		  
      </tr>
							<?}?> 
  </table>
  
  
  
  
  
  
  
  <p>&nbsp;</p>
  
  <table border="0" align="center">
    <tr>
      <td width="10"><a href="dpf1.php"><img src="Imagen/iconos_tablas/icono_add.png" width="44" height="46" alt="Añadir" /></a></td>
      <td width="44"><a href="buscar_paquete.php"><img src="Imagen/iconos_tablas/volver.png" width="44" height="46" alt="atras" /></a></td>
    </tr>
  </table>
  <p>&nbsp;</p>


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
