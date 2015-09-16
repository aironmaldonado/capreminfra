	
<?



$bamco="Activo";
$F_emi_usu="2015-04-12";
$F_ven_usu="2015-06-13";

/*
if($bamco){

include("opciones/conexion_prestamo.php"); 	
mysql_query (" UPDATE  dpf SET Int_abonado =  '' , int_diferido =  '' , int_PorVencer =  ''   WHERE  emitido1='x' and emitido2='x' ",$conexPres);	
mysql_query ("UPDATE  `prestamos`.`dpf` SET  `emitido1` =  '' WHERE   emitido1='x' ;",$conexPres);			
mysql_query ("UPDATE  `prestamos`.`dpf` SET  `emitido2` =  '' WHERE   emitido2='x' ;",$conexPres);							
mysql_query (" UPDATE  dpf SET Int_abonado =  '' , int_diferido =  '' , int_PorVencer =  ''   WHERE  emitido1='x' and emitido2='x' ",$conexPres);	
}
*/




/* ********* Calculo para sacar el periodo en dias *************************** */

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

	 
			
				
				
?>

<table border="1" style="border:1px solid blue; width:500px; height:200px; " > 

<tr>
<td>Banco</td>
<td>F. Emicion</td>
<td>F. Vencimiento</td>
<td>Periodo en dias </td>
</tr>

<tr>
<td><?echo $bamco;?></td>
<td><?echo $F_emi_usu;?></td>
<td><?echo $F_ven_usu;?></td>
<td><?echo $dias;?></td>
</tr>

</table>


<?

$servidor="127.0.0.1";
$usuario="root";
$clave="1234";
$db_nombre="prestamos";


$conexPres=@mysql_connect($servidor,$usuario,$clave) or die(mysql_error());
@mysql_select_db($db_nombre,$conexPres) or die(mysql_error()); 

if (!$conexPres){
echo 'error al conectar';
die;
}
$bd = mysql_select_db($db_nombre,$conexPres);
if (!$bd){
echo 'error al seleccionar la base d datos';
die;
}
mysql_query ("SET NAMES 'utf8'");



	
			

//if($_POST['bamco']=="Todos")
if($banco=="Todos")	
			{ 	
/*---------------------------------- marca los emitidos todos -----------------------------------------*/				
				include("opciones/conexion_prestamo.php"); 	

				$b1 = mysql_query ("Select * From dpf WHERE femision <= '$F_emi_usu'  ",$conexPres); 
				 while ($v1=mysql_fetch_assoc($b1))	
				{
				 $cod_dpf1=$v1["cod_dpf"];
				 mysql_query (" UPDATE  dpf SET emitido1 =  'x' WHERE  cod_dpf ='$cod_dpf1' ; ",$conexPres);

				}



				$b2 = mysql_query ("Select * From dpf WHERE femision BETWEEN '$F_emi_usu' AND '$F_ven_usu'  ",$conexPres); 
				 while ($v2=mysql_fetch_assoc($b2))	
				{
				 $cod_dpf2=$v2["cod_dpf"];
				 mysql_query (" UPDATE  dpf SET emitido1 =  'x' WHERE  cod_dpf ='$cod_dpf2' ; ",$conexPres);

				}

			


				$b = mysql_query ("Select * From dpf WHERE fvencimiento >= '$F_ven_usu'  ",$conexPres); 
				 while ($v=mysql_fetch_assoc($b))	
				{
				 $cod_dpf=$v["cod_dpf"];
				 mysql_query (" UPDATE  dpf SET emitido2 =  'x' WHERE  cod_dpf ='$cod_dpf' ; ",$conexPres);

				}




				$b = mysql_query ("Select * From dpf WHERE fvencimiento BETWEEN '$F_emi_usu' AND '$F_ven_usu'  ",$conexPres); 
				 while ($v=mysql_fetch_assoc($b))	
				{
				 $cod_dpf=$v["cod_dpf"];
				 mysql_query (" UPDATE  dpf SET emitido2 =  'x' WHERE  cod_dpf ='$cod_dpf' ; ",$conexPres);
				} 
		
		
		
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
				
				
$buscar = mysql_query ("SELECT * FROM dpf where  emitido1='x' and emitido2='x'   ",$conexPres);
	
				    while($vec1=mysql_fetch_assoc($buscar))
							{
								include("opciones/conexion_prestamo.php");
								$cod_dpf=$vec1["cod_dpf"]; 
								$F_emi_dpf =$vec1["femision"]; 
								$F_ven_dpf =$vec1["fvencimiento"];
								$plazo=$vec1["plazo"]; 

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
									
									echo ("opcA"); 
									 //$intPeriodo=($Emi-$Ven)*-1;
									//$int_diferido=$Ven-$Emi; 
									$intGenerado=0;
									$porpagar=0;
									
												$int_diferido=$plazo;					
								}
								
								
								else if($F_emi_dpf  <= $F_emi_usu && $F_ven_dpf  > $F_ven_usu )
								{
									echo ("opcB");
										
									 $intGenerado=$PeriodoEmi-$Emi;	        			
									 $int_diferido=$PeriodoVen-$PeriodoEmi;			
									 $porpagar=$Ven-$PeriodoVen;	        	
								
								}
								
								
								else if( $F_emi_dpf  >= $F_emi_usu && $F_ven_dpf  > $F_ven_usu  )
								{
									echo ("opcC"); 
									
									  $intGenerado=0;									
									  $int_diferido=$PeriodoVen-$Emi;						
									  $porpagar=$Ven-$PeriodoVen;		
								
								}
									
									
									
									
									else if( $F_emi_usu  > $F_emi_dpf && $F_ven_usu  >= $F_ven_dpf  )
								{
									echo ("opcD"); 
									
									 $intGenerado=$PeriodoEmi-$Emi;						
									 $int_diferido=$Ven-$PeriodoEmi;						
									 $porpagar=0;
									 
								}
								
								
								
								mysql_query (" UPDATE  dpf SET Int_abonado =  '$intGenerado' ,	 int_diferido =  '$int_diferido' , int_PorVencer =  '$porpagar'   WHERE  cod_dpf ='$cod_dpf'  ",$conexPres);

							}
							
							
		
		
		
		
		
		
		
			}	else 
		{
		
		/* ---------- borra las tabla ---------------*/
		mysql_query (" UPDATE  dpf SET Int_abonado =  '' , int_diferido =  '' , int_PorVencer =  ''   WHERE  emitido1='x' and emitido2='x' ",$conexPres);	
		mysql_query ("UPDATE  `prestamos`.`dpf` SET  `emitido1` =  '' WHERE   emitido1='x' ;",$conexPres);			
		mysql_query ("UPDATE  `prestamos`.`dpf` SET  `emitido2` =  '' WHERE   emitido2='x' ;",$conexPres);	
		
		
		
		
			/*---------------------------------- marca los emitidos por banco  -----------------------------------------*/	
		 
			include("opciones/conexion_prestamo.php"); 	

			$b1 = mysql_query ("Select * From dpf WHERE femision <= '$F_emi_usu' and banco like '%$bamco%' ",$conexPres); 
				 while ($v1=mysql_fetch_assoc($b1))	
				{
				 $cod_dpf1=$v1["cod_dpf"];
				 mysql_query (" UPDATE  dpf SET emitido1 =  'x' WHERE  cod_dpf ='$cod_dpf1' ; ",$conexPres);

				}

			
				$b2 = mysql_query ("Select * From dpf WHERE femision BETWEEN '$F_emi_usu' AND '$F_ven_usu'  and banco like '%$bamco%' ",$conexPres); 
				 while ($v2=mysql_fetch_assoc($b2))	
				{
				 $cod_dpf2=$v2["cod_dpf"];
				 mysql_query (" UPDATE  dpf SET emitido1 =  'x' WHERE  cod_dpf ='$cod_dpf2' ; ",$conexPres);

				}
			



				/*-----------------------------------------*/



				$b = mysql_query ("Select * From dpf WHERE fvencimiento >= '$F_ven_dpf' and banco like '%$bamco%' ",$conexPres); 
				 while ($v=mysql_fetch_assoc($b))	
				{
				 $cod_dpf=$v["cod_dpf"];
				 mysql_query (" UPDATE  dpf SET emitido2 =  'x' WHERE  cod_dpf ='$cod_dpf' ; ",$conexPres);

				}




				$b = mysql_query ("Select * From dpf WHERE fvencimiento BETWEEN '$F_emi_usu' AND '$F_ven_dpf' and banco like '%$bamco%' ",$conexPres); 
				 while ($v=mysql_fetch_assoc($b))	
				{
				 $cod_dpf=$v["cod_dpf"];
				 mysql_query (" UPDATE  dpf SET emitido2 =  'x' WHERE  cod_dpf ='$cod_dpf' ; ",$conexPres);
				}
				
				
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
								$plazo=$vec1["plazo"]; 
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
									
									echo ("opcA"); 
									 //$intPeriodo=($Emi-$Ven)*-1;
									//$int_diferido=$Ven-$Emi; 
									$intGenerado=0;
									$porpagar=0;
									$int_diferido=$plazo;
																	
								}
								
								
								else if($F_emi_dpf  <= $F_emi_usu && $F_ven_dpf  > $F_ven_usu )
								{
									echo ("opcB"); 
										
									 $intGenerado=$PeriodoEmi-$Emi;	        			
									 $int_diferido=$PeriodoVen-$PeriodoEmi;			
									 $porpagar=$Ven-$PeriodoVen;	        	
								
								}
								
								
								else if( $F_emi_dpf  >= $F_emi_usu && $F_ven_dpf  > $F_ven_usu  )
								{
									echo ("opcC"); 
									
									  $intGenerado=0;									
									  $int_diferido=$PeriodoVen-$Emi;						
									  $porpagar=$Ven-$PeriodoVen;		
								
								}
									
									
									
									
									else if( $F_emi_usu  > $F_emi_dpf && $F_ven_usu  >= $F_ven_dpf  )
								{
									echo ("opcD"); 
									
									 $intGenerado=$PeriodoEmi-$Emi;						
									 $int_diferido=$Ven-$PeriodoEmi;						
									 $porpagar=0;
									 
								}
								
								
								
								mysql_query (" UPDATE  dpf SET Int_abonado =  '$intGenerado' ,	 int_diferido =  '$int_diferido' , int_PorVencer =  '$porpagar'   WHERE  cod_dpf ='$cod_dpf'  ",$conexPres);

							}
							
		
		}

				
				
				
				
				
?>

 <table width="100%" border="1" cellspacing="0" cellpadding="4">
   <tr>
	   <td align="center" colspan="9" id="titulo2" >Depositos A Plazo Fijo</td>
	   <td align="center" colspan="3" id="titulo2" >Intereses</td>
	   <td align="center" colspan="3" id="titulo2" >Dias</td>
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
	  
	   <td bgcolor="#9999CC">pasado</td>
      <td bgcolor="#9999CC">Presente</td>
	  <td bgcolor="#9999CC">Futuro</td>
     
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
		
		
		$F_emi_dpf=$vec1["femision"];
		$F_ven_dpf= $vec1["fvencimiento"];
		
		
		
									$FEmision1 = explode("-",$F_emi_dpf);
								$feaaaa=$FEmision1[0]; 	$femm=$FEmision1[1]; $fedd=$FEmision1[2];
								$fvencimiento1 = explode("-",$F_ven_dpf);
								$fvaaaa=$fvencimiento1[0]; $fvmm=$fvencimiento1[1]; $fvdd=$fvencimiento1[2];
		
?>
      <tr>
		<td><?php echo $vec1["ndpf"]; ?></td>
        <td><?php echo $vec1["banco"]; ?></td>
        <td><?php echo $fedd,("-"),$femm,("-"),$feaaaa; ?></td>
		<td><?php echo $fvdd,("-"),$fvmm,("-"),$fvaaaa;  ?></td>
		<td><?php echo $cap; //$vec1["nuevo_capital"]; ?></td>
        <td><?php echo $vec1["plazo"]; ?></td>
		<td><?php echo $vec1["tasa"],("%");?></td>
        <td><?php echo $vec1["tipo"]; ?></td>
        <td><?php echo $int;?></td>
		
		
		
		<td><?php echo number_format($Abonado, 2, ',', '.');  ?></td>
		<td><?php echo number_format($Diferido, 2, ',', '.'); ?></td>
        <td><?php echo number_format($Vencer, 2, ',', '.');  ?></td>
		
	<td><?php echo $abo ?></td>
	<td><?php echo $dif; ?></td>
    <td><?php echo  $pven;?></td>
		
		  
      </tr>
							<?}?> 
  </table>
  
  
