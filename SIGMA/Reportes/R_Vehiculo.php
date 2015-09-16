<?php session_start();
	$usuusu=$_SESSION["usuusu"]; 
	$nombre_pc=$_SESSION["nombre_pc"];
	$hora=$_SESSION["hora"];
	$fecha=$_SESSION["fecha"];	
	
	
	
	$usuced=$_SESSION["usuced"]; 
	$usunom=$_SESSION["usunom"]; 
	$usuapel=$_SESSION["usuapel"];
	
	$da= explode(' ', $usunom);   
	$nomusu = $da[0];  
	
	$da= explode(' ', $usuapel);   
	$apeusu = $da[0];
	
	
//$cedulaS=("7346743");
$cedulaS=$_SESSION["cedulaS"];


$cn = mysql_connect("127.0.0.1","root","1234");
mysql_select_db("capreminfra",$cn);

date_default_timezone_set("America/Caracas" ) ; 
$fecha_actual = date('d-m-Y',time() - 3600*date('I')); 
	



$b = mysql_query ("SELECT * FROM telefono as tel inner join codigo_area as ca on(tel.cod_codigo_area=ca.cod_codigo_area) where cedula='$cedulaS';  ",$cn);
						while($v=mysql_fetch_assoc($b))
								{
									
									$i=$i+1;
									
									$n[$i]=$v['numero1'];
									$a[$i]=$v['n_area'];
									
								}	
								 $n1=$n["1"];
								 $n2=$n["2"];
								 $n3=$n["3"];
								 $n4=$n["4"];
								 
								 $t1=$a["1"];
								 $t2=$a["2"];
								 $t3=$a["3"];
								 $t4=$a["4"];
								

 $personas =mysql_query("SELECT   
nom_ape,nombre1,nombre2, apellido1, apellido2 , nacionalidad, cedula ,sexo ,F_ingreso,N_cuenta, F_nacimiento, correo ,nom_estatus,tipo_nomina,nom_organismo,est_civil,cod_codigo_postal,num_vivienda,estado,municipio,parroquia,tipo_vivienda
 FROM `socios` as soc
Inner join  estatus  as est on (soc. cod_estatus=est. cod_estatus)
Inner join  nomina  as nom  on (nom.cod_socio =soc.cod_socio)
Inner join  tipo_nomina as tip_nom  on (nom. cod_tipo_nomina = tip_nom . cod_tipo_nomina)
Inner join  organismo as org  on (nom.cod_organismo= org.cod_organismo)
Inner join  est_civil as es_ci  on (soc.cod_est_civil= es_ci.cod_est_civil)
Inner join  direccion as dir  on (soc. cod_socio= dir. cod_socio)
Inner join  estado as esta  on (esta. cod_estado= dir. cod_estado)
Inner join  municipio as mun  on (mun. cod_municipio= dir. cod_municipio)
Inner join  parroquia as parr  on (parr. cod_parroquia= dir. cod_parroquia)
Inner join  vivienda as vivi  on (vivi. cod_vivienda= dir. cod_vivienda)

 where cedula='$cedulaS' ",$cn);											
while($vector = mysql_fetch_assoc($personas))
{

$na=$vector['nom_ape'];
$ape1=$vector['nombre1'];
$ape2=$vector['nombre2'];
$nom1=$vector['apellido1'];
$nom2=$vector['apellido2'];
$n=$vector['nacionalidad'];
$cd=$vector['cedula'];
$fec=$vector['F_nacimiento'];
$sexo=$vector['sexo'];
$estatu=$vector['nom_estatus'];
$nomina=$vector['tipo_nomina'];
$cor=$vector['correo'];
$nro=$vector['N_cuenta'];
$EstCivil=$vector['est_civil'];
$img=$vector['imagen'];
$org=$vector['nom_organismo'];
$F_ingreso=$vector['F_ingreso'];

$f_ing = substr($F_ingreso, 0, -9); 

$dir=$vector['direccion'];
$calle=$vector['calle'];
$avenida=$vector['avenida'];
$cp=$vector['cod_codigo_postal'];
$num_vivienda=$vector['num_vivienda'];

$estado=$vector['estado'];
$municipio=$vector['municipio'];
$parroquia=$vector['parroquia'];
$tipo_vivienda=$vector['tipo_vivienda'];

$cdp=$vector['capacidad_descuento_porcentaje'];
}


/*
$b = mysql_query ("SELECT * FROM fecha_afiliacion  where cedula='$cedulaS';  ",$cn);
						while($v=mysql_fetch_assoc($b))
								{
																											
									$f_ing=$v['fecha'];
									
									
								}		

*/								
/*------ sacar edad ------*/
$da= explode('-', $fec);   

   $dia = $da[2];  
   $mes = $da[1]; 
   $anio = $da[0];  

       $diac =date("d"); 
       $mesc =date("m"); 
       $anioc =date("Y"); 
       $edadac =  $anioc-$anio; 

   if($mesc < $mes && $diac < $dia || $mesc < $mes || $diac < $dia){ 
	  $edad_aux = $edadac - 1; 
      $edad_socio = $edad_aux; 
     } 
	 
	 if($edad_socio){ $edad=$edad_socio;} else{$edad=$edadac;}
/*-----------------------*/



$conexSC = mysql_connect("127.0.0.1","root","1234");
mysql_select_db("prestamos",$conexSC);


					$b = mysql_query ("SELECT max(cod_solicitudes) as solicitudes FROM solicitudes WHERE id_solicitudes = '$cedulaS'  ",$conexSC);
					while($v=mysql_fetch_assoc($b))	
					{ 
					  $cod_solicitudes=$v['solicitudes']; 
					}	
					
					$b = mysql_query ("SELECT * FROM solicitudes as sol inner join tipo_prestamos as tp on (sol.cod_tipo_prestamo=tp.cod_tipo_prestamo) WHERE cod_solicitudes = '$cod_solicitudes'  ",$conexSC);
					while($v=mysql_fetch_assoc($b))	
					{
					 $cod_prestamo=$v['cod_tipo_prestamo']; 	
					 $tipo_prestamo=$v['prestamo']; 
					 $ano=$v['tipo_prestamo']; 
					 $numeros_cuotas=$v['numeros_cuotas']; 
					 $porc_prest=$v['porc_prest'];
					 $anos=$numeros_cuotas/12;
					 $monto_avaluo=$v['monto_avaluo'];
					 $monto_solicitado=$v['monto_solicitado'];
					 $mancomunado=$v['mancomunado'];
					$observaciones=$v['observaciones'];
					 }
	
	
	
	
/*-------------------------------------------------------------------------------------------------------------*/		
	/*--------------- Calculo de las deduciones  60% sueldo ------------------------------*/	

	
					
					include("conexion/conexion.php");
					$b = mysql_query (" SELECT Max(cod_sueldo) as cod_sueldo FROM `sueldo` where id_sueldo= '$cedulaS' ",$conex); while($v=mysql_fetch_assoc($b))	{	$cod_sueldo=$v['cod_sueldo']; 	}	
					
				
					
					$b = mysql_query ("SELECT * FROM sueldo WHERE cod_sueldo = '$cod_sueldo'  ",$conexSC);
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
/*-------------------------------------------------------------------------------------------------------------*/
	
	
	
	
		/*--------------- credito ------------------------------*/	

	
					
					$conexSC = mysql_connect("127.0.0.1","root","1234");
					mysql_select_db("prestamos",$conexSC);
					$b = mysql_query ("SELECT Max(cod_analisis_vehiculo) as cod_ana_vehiculo FROM `analisis_vehiculo` where id_analisis_vehiculo= '$cedulaS' and opcion='1' and status_Analisis_vehiculo='Activa' ",$conexSC); while($v=mysql_fetch_assoc($b))	{	$cod_ana_vehiculo=$v['cod_ana_vehiculo']; 	}	
					
				
					
					$b = mysql_query ("SELECT * FROM analisis_vehiculo WHERE cod_analisis_vehiculo = '$cod_ana_vehiculo'  ",$conexSC);
					while($v=mysql_fetch_assoc($b))	
					{  
					$monto=$v['monto'];
					$cut_mensual=$v['cut_mensual'];
					$seg_incendio=$v['seg_incendio'];
					$seg_vida=$v['seg_vida'];
					$total_inc_vid=$v['total_inc_vid'];
					$total_cuo_mens=$v['total_cuo_mens'];
					$total_sobre_neto=$v['total_sobre_neto'];
					$plazo=$v['plazo'];
					
					
					$N_cuota=$plazo*12;
					}
					
					
					
						$conexSC = mysql_connect("127.0.0.1","root","1234");
					mysql_select_db("prestamos",$conexSC);
					$b = mysql_query (" SELECT Max(cod_analisis_vehiculo) as cod_ana_vehiculo FROM `analisis_vehiculo` where id_analisis_vehiculo= '$cedulaS' and opcion='2' and status_Analisis_vehiculo='Activa' ",$conexSC); while($v=mysql_fetch_assoc($b))	{	$cod_ana_vehiculo=$v['cod_ana_vehiculo']; 	}	
					
					$b = mysql_query ("SELECT * FROM analisis_vehiculo WHERE cod_analisis_vehiculo = '$cod_ana_vehiculo' ",$conexSC);
					while($v=mysql_fetch_assoc($b))	
					{  
					$monto1=$v['monto'];
					$cut_mensual1=$v['cut_mensual'];
					$seg_incendio1=$v['seg_incendio'];
					$seg_vida1=$v['seg_vida'];
					$total_inc_vid1=$v['total_inc_vid'];
					$total_cuo_mens1=$v['total_cuo_mens'];
					$total_sobre_neto1=$v['total_sobre_neto'];
					$plazo1=$v['plazo'];
					}
					
					
					$conexSC = mysql_connect("127.0.0.1","root","1234");
					mysql_select_db("prestamos",$conexSC);
					$b = mysql_query ("SELECT Max(cod_analisis_vehiculo) as cod_ana_vehiculo FROM `analisis_vehiculo` where id_analisis_vehiculo= '$cedulaS' and opcion='3' and status_Analisis_vehiculo='Activa' ",$conexSC); while($v=mysql_fetch_assoc($b))	{	$cod_ana_vehiculo=$v['cod_ana_vehiculo']; 	}	
					
					$b = mysql_query ("SELECT * FROM analisis_vehiculo WHERE cod_analisis_vehiculo = '$cod_ana_vehiculo' ",$conexSC);
					while($v=mysql_fetch_assoc($b))	
					{  
					$monto2=$v['monto'];
					$cut_mensual2=$v['cut_mensual'];
					$seg_incendio2=$v['seg_incendio'];
					$seg_vida2=$v['seg_vida'];
					$total_inc_vid2=$v['total_inc_vid'];
					$total_cuo_mens2=$v['total_cuo_mens'];
					$total_sobre_neto2=$v['total_sobre_neto'];
					$plazo2=$v['plazo'];
					}
/*-------------------------------------------------------------------------------------------------------------*/
	$conexSC = mysql_connect("127.0.0.1","root","1234");
					mysql_select_db("administrador",$conexSC);
					
	$b = mysql_query ("SELECT * FROM unidades_tributaria WHERE  cod_unidad_tributaria= '1'  ",$conexSC);
					while($v=mysql_fetch_assoc($b))	
					{ 
					  $unidad_tributaria=$v['monto']; 
					}
	
	
$conexSC = mysql_connect("127.0.0.1","root","1234");
					mysql_select_db("prestamos",$conexSC);
					$b = mysql_query ("SELECT * FROM  `vehiculo`  where id_vehiculo = '$cedulaS'  ",$conexSC); while($v=mysql_fetch_assoc($b))	{	
					$modelo=$v['modelo']; 
					$marca=$v['marca']; 
					
					}	
					
$conexSC = mysql_connect("127.0.0.1","root","1234");
					mysql_select_db("administrador",$conexSC);
					$b = mysql_query ("SELECT * FROM  `marca_vehiculo` WHERE  `cod_marca_vehiculo`  = '$marca'  ",$conexSC); while($v=mysql_fetch_assoc($b))	{	
					
					$marca_carro=$v['marca']; 
					
					}	
					
	
	
	include("fpdf17/fpdf.php");
	class PDF extends FPDF
{
//Cabecera de página
function Header()
   {
   header("Content-Type: text/html; charset=iso-8859-1 ");
    //Logo
    $this->Image("imagen/Captura.png" , 20 ,8, 50 , 35 , "png" ,"http://www.capreminfra.net");
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Ln(-14);
	$this->Cell(83);
    //Título
	$this->Cell(20,30,utf8_decode("ANÁLISIS DE CRÉDITO"),0,0,'C');

	$this->Ln(8);
	$this->Cell(80);
	
	//$this->Cell(20,30,utf8_decode("SOLICITUD Nº: $cod_solicitudes "),0,0,'C');
	//$this->Cell(25,6,utf8_decode("$cod_solicitudes"),0,0,"L",1,"www.google.co.ve");

    //Salto de línea
	
    $this->Ln(-10);
	$this->Cell(150);
	$this->SetFont('Arial','',9);
	$this->Cell(40,40,date('d-m-Y',time() - 3600*date('I')),0,1,'L');
	
	 $this->Ln(-35);
	$this->Cell(150);
	$this->SetFont('Arial','',9);
	$this->Cell(40,40,date('h:i a',time() - 3600*date('I')),0,1,'L');
	
	
	$this->Ln(-35);
	$this->Cell(150);
	$this->SetFont('Arial','',7);
	$this->Cell(40,40,  'Usuario:' . $_SESSION["usuusu"]  ,0,1,'L');
	
	

   }

//Pie de página
 function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-28);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,utf8_decode("- Pág")  .$this->PageNo().'-',0,0,'C');
   }
   
}
															
				
				
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','',12);		

/*----------------------------------------------------inicio ---------------------------------------------------------*/
				
			//utf8_decode("$cod_solicitudes")	
	
	
	
	
	$pdf->Ln(-32);
	$pdf->Cell(88);
		$pdf->SetFont('Arial','',15);
	$pdf->Cell(10,10,"$tipo_prestamo",0,0,'C');
	
	$pdf->Ln(12);
	$pdf->Cell(88);
	$pdf->SetFont('Arial','',17);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->Cell(25,6,utf8_decode("SOLICITUD Nº:"),0,0,"R",1);
	
	$pdf->SetFont('Arial','',17);
	$pdf->SetTextColor(216,10,40);
	$pdf->Cell(25,6,utf8_decode("$cod_solicitudes"),0,0,"L",1,"www.google.co.ve");
	
	$pdf->Ln(6);
	$pdf->Cell(130);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",10);	
	if($mancomunado!=0){
	$pdf->Cell(45,4,'Mancomunado: '.$mancomunado,0,0,"C",1);
	} else {$pdf->Cell(45,4,' ',0,0,"C",1);}
	
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",10);	
	$pdf->Cell(160.2,4,"DATOS SOCIO",1,0,"C",1);
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(136,5,"Nombres y Apellidos: $na",1,0,"L",1);
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,5,"Sexo: $sexo",1,0,"C",1);

	
	
	
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",9);	
	$pdf->Cell(40,5,"Cedula: $n-$cd",1,0,"L",1);
	
	

	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$fecha = explode('-', $fec);
	$pdf->Cell(36,5,"Fecha N: $fecha[2]-$fecha[1]-$fecha[0]",1,0,"C",1);
	
	
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(84,5,"Organismo: $org",1,0,"L",1);	

	
	
	/*
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(76,5,"NRO. CUENTA:$nro",1,0,"L",1);
			
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(84,5,"Correo:$cor",1,0,"L",1);
	*/
/*----------------------------------------------------*/
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,"Hab.: $t1-$n1"  ,1,0,"L",1);
		
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,"Cel.: $t2-$n2",1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,"Ofc.: $t3-$n3",1,0,"L",1);
		
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	//f_ing
	$fecha = explode('-', $f_ing);
	$pdf->Cell(40,5,utf8_decode("Fecha Af.: $fecha[2]-$fecha[1]-$fecha[0]"),1,0,"L",1);
	
	
	/*
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(40,7,"Ofc.:$t3-$n3",1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(40,7,"Otro:$t4-$n4",1,0,"L",1);
	
	*/
/*---------------------------------------*/	
	
	
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,"Estatus: $estatu",1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("Nómina: $nomina"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,"Edo. Civil: $EstCivil",1,0,"L",1);
	
	
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("Edad: $edad años"),1,0,"L",1);
	

	
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(54,5,"Estado: $estado",1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53,5,"Municipio: $municipio",1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53,5,"Parroquia: $parroquia",1,0,"L",1);
	
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(160.3,5,utf8_decode("Dirección: $dir $tipo_vivienda N.$num_vivienda "),1,0,"L",1);
	
	
	/*---------  segundo cuadro ------------*/
	
	$pdf->Ln(7);
	$pdf->Cell(10);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",10);	
	$pdf->Cell(160.2,4,"DATOS DEL SUELDO",1,0,"C",1);
	
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(80,5,utf8_decode("Salario Total (según Constancia)."),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(80,5,utf8_decode("Sueldo Total (Obligaciones/Deducciones) "),1,0,"L",1);
	

	
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,"Sueldo Mensual",1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,number_format($d1, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,"Sueldo Neto Mensual",1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,number_format($d8, 2, ",", "."),1,0,"R",1);
	
	
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("Bono de Antiguedad"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,number_format($d2, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("Crédito Hipotecario"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,number_format($h1, 2, ",", "."),1,0,"R",1);
	
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("Prima por Jerarquía"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,number_format($d3, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("Préstamo Personal"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,number_format($h2, 2, ",", "."),1,0,"R",1);
	
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("Prima por Riesgo"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,number_format($d4, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("CAPRESOVIT"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,number_format($h3, 2, ",", ".") ,1,0,"R",1);
	
	
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("Prima por Hijo"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,number_format($d5, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("Suministro"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,number_format($h4, 2, ",", ".") ,1,0,"R",1);
	
	
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("Prima Hogar"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,number_format($d6, 2, ",", ".") ,1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("Proveeduría"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,number_format($h5, 2, ",", "."),1,0,"R",1);
	
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("Prima Profesional"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,number_format($d7, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(40,5,utf8_decode("Neto Mensual"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(40,5,'Bs '.number_format($total_haber, 2, ",", "."),1,0,"R",1);
	
	$pdf->Ln(5);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(40,5,utf8_decode("Total"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(40,5,'Bs '.number_format($total_debe, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(80,5,utf8_decode("Según recibos de pago y movimientos Bancarios"),1,0,"L",1);
	

	
/**-------------------------------fin---------------------------------------------**/	

/*---------tercer cuadro-----------*/



	$pdf->Ln(7);
	$pdf->Cell(10);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",10);	
	$pdf->Cell(160,4,utf8_decode("Datos del Vehiculo"),1,0,"C",1);
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53,4,utf8_decode("Marca: $marca_carro "),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53,4,utf8_decode("Modelo: $modelo"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53.7,4,utf8_decode("Año: $ano"),1,0,"L",1);
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(80,4,utf8_decode("Costo del Vehículo: Bs ").number_format($monto_solicitado, 2, ",", ".") ,1,0,"L",1);
	$mt=$monto_solicitado/100*70;
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(80,4,utf8_decode("70% del Costo: BS ").number_format($mt, 2, ",", ".") ,1,0,"L",1);
	
	
	
	
	
	
	
	
	$pdf->Ln(7);
	$pdf->Cell(10);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",10);	
	$pdf->Cell(160.2,4,utf8_decode("CÁLCULO PARA EL CRÉDITO"),1,0,"C",1);
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(5,5,utf8_decode(""),1,0,"L",1);
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,5,utf8_decode("CRÉDITO"),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(63,5,utf8_decode("SEGURO"),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(52,5,utf8_decode("TOTALES"),1,0,"C",1);
	
	
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(5,4,utf8_decode(""),1,0,"L",1);
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,utf8_decode("Monto Bs."),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,utf8_decode("Cuota M."),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,utf8_decode("Vehiculo (V1)"),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,5,utf8_decode("Vida (V2)"),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(22.7,4,utf8_decode("Total (V1+V2*I) "),1,0,"C",1);
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(27,4,utf8_decode("Cuo. Mensual"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(25.1,4,utf8_decode("% sobre el neto"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(6.4 ,4,"Opc" ,1,0,"C",1);
	
	
	
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(5,4,utf8_decode("S1"),1,0,"L",1);
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,number_format($monto, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,number_format($cut_mensual, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,number_format($seg_incendio, 2, ",", ".") ,1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,number_format($seg_vida, 2, ",", ".") ,1,0,"R",1);
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(22.8,4,number_format($total_inc_vid, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(27,4,number_format($total_cuo_mens, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(25,4,number_format($total_sobre_neto, 2, ",", "."),1,0,"R",1);
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(6.4 ,4,"" ,1,0,"C",1);
	

	
	
	
	
	if($monto1){
	
	
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(5,4,utf8_decode("A"),1,0,"L",1);
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,number_format($monto1, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,number_format($cut_mensual1, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,number_format($seg_incendio1, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,number_format($seg_vida1, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(22.8,4,number_format($total_inc_vid1, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(27,4,number_format($total_cuo_mens1, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(25,4,number_format($total_sobre_neto1, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(6.4 ,4,"" ,1,0,"R",1);
	
	
	}
	
	
	
	
	
	
	if($monto2)
	{
	
	
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(5,4,utf8_decode("B"),1,0,"L",1);
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,number_format($monto2, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,number_format($cut_mensual2, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,number_format($seg_incendio2, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(20,4,number_format($seg_vida2, 2, ",", "."),1,0,"R",1);

	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(22.8,4,number_format($total_inc_vid2, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(27,4,number_format($total_cuo_mens2, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(25,4,number_format($total_sobre_neto2, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(6.4 ,4,"" ,1,0,"R",1);
	}
	
	/*--------------------- quinto cuadro ---------------------------*/
	
	$G_operacionales=$monto/100*0.5;
	
	$pdf->Ln(7);
	$pdf->Cell(10);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",10);	
	$pdf->Cell(160.2,4,utf8_decode("CÁLCULO DE GASTOS"),1,0,"C",1);
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(6,5,utf8_decode(""),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,5,utf8_decode("Monto Apr."),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(27,5,utf8_decode("Gastos Op. 3%"),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,5,utf8_decode("Seguro Vida"),1,0,"C",1);

	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,5,utf8_decode("Notaria"),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(30.5,5,utf8_decode("Traslado (8U.T.)"),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,5,utf8_decode("Total Gasto"),1,0,"C",1);
	
	
	
	
	/*----2-----*/
	$G_operacionales=$monto/100*3;
	$T_poliza=$seg_incendio+$seg_vida;
	$notaria=$unidad_tributaria*7;
	$T_Gastos=$unidad_tributaria*8;
	
	$G_operacionales1=$monto1/100*3;
	$T_poliza1=$seg_incendio1+$seg_vida1;
	$notaria1=$unidad_tributaria*7;
	$T_Gastos1=$unidad_tributaria*8;
	
	
	$G_operacionales2=$monto2/100*3;
	$T_poliza2=$seg_incendio2+$seg_vida2;
	$notaria2=$unidad_tributaria*7;
	$T_Gastos2=$unidad_tributaria*8;
	
	
		//echo $cod_prestamo;
switch ($cod_prestamo) {
    case 6:
       $M_cheque=$monto;
	   $M_cheque1=$monto1;
	   $M_cheque2=$monto2;
        break;
		
    case 7:
       $M_cheque=$monto-($G_operacionales+$T_poliza+$notaria+$T_Gastos);
	    $M_cheque1=$monto1-($G_operacionales1+$T_poliza+$notaria1+$T_Gastos1);
		$M_cheque2=$monto2-($G_operacionales2+$T_poliza+$notaria2+$T_Gastos2);
	   
	  
        break;
		
    case 8:
	
	 $M_cheque=$monto-($G_operacionales+$T_poliza+$notaria+$T_Gastos);
	    $M_cheque1=$monto1-($G_operacionales1+$T_poliza+$notaria1+$T_Gastos1);
		$M_cheque2=$monto2-($G_operacionales2+$T_poliza+$notaria2+$T_Gastos2);
      
	  
        break;
		
		
    default:
		/*$M_cheque=$monto-($G_operacionales+$T_poliza+$notaria+$T_Gastos);
	    $M_cheque1=$monto-($G_operacionales1+$T_poliza+$notaria1+$T_Gastos1);
		$M_cheque2=$monto-($G_operacionales2+$T_poliza+$notaria2+$T_Gastos2);
	  */
}



		$total_gas=($G_operacionales+$T_poliza+$notaria+$T_Gastos+$perito);
	    $total_gas1=($G_operacionales1+$T_poliza+$notaria1+$T_Gastos1+$perito);
		$total_gas2=($G_operacionales2+$T_poliza+$notaria2+$T_Gastos2+$perito);
	

	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(6,4,utf8_decode("S1"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,4,number_format($monto, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(27,4,number_format($G_operacionales, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,4,number_format($T_poliza, 2, ",", ".") ,1,0,"R",1);

	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,4,number_format($notaria, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(30.5,4,number_format($T_Gastos, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,4,number_format($total_gas, 2, ",", "."),1,0,"R",1);
	
	
	
	
	if($monto1){
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(6,4,utf8_decode("A"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,4,number_format($monto1, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(27,4,number_format($G_operacionales1, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,4,number_format($T_poliza1, 2, ",", "."),1,0,"R",1);

	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,4,number_format($notaria1, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(30.5,4,number_format($T_Gastos1, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,4,number_format($total_gas1, 2, ",", "."),1,0,"R",1);
	
	}
	
	
	
	
	
if($monto2){
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(6,4,utf8_decode("B"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,4,number_format($monto2, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(27,4,number_format($G_operacionales2, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,4,number_format($T_poliza2, 2, ",", "."),1,0,"R",1);

	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,4,number_format($notaria2, 2, ",", "."),1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(30.5,4,number_format($T_Gastos, 2, ",", ".") ,1,0,"R",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(24,4,number_format($total_gas2, 2, ",", ".") ,1,0,"R",1);


	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*----------------Sesto cuadro------------------------------- */
	
	$pdf->Ln(7);
	$pdf->Cell(10);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",10);	
	$pdf->Cell(160.2,4,utf8_decode("DATOS DE ELABORACIÓN"),1,0,"C",1);
	
	
	
		
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53.3,5,utf8_decode("Elaborado Por:"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53.3,5,utf8_decode("Dpto. Crédito"),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53.3,5,utf8_decode("Consultor Jurídico"),1,0,"C",1);
	
	/*--------------------------2-------------*/
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53.3,15,utf8_decode(""),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53.3,15,utf8_decode(""),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53.3,15,utf8_decode(""),1,0,"C",1);
	/*------------------------3--------------------*/
	
	$pdf->Ln(15);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53.3,5,utf8_decode("$nomusu $apeusu C.I.:$usuced"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53.3,5,utf8_decode("Licda. Dulce Leon C.I.:15834492"),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53.3,5,utf8_decode("Dr. Gregorio Peralta C.I.:7346743"),1,0,"C",1);
	
	/*Séptimo cuadro */
	
	
	
	
	
	
	
	$pdf->Ln(7);
	$pdf->Cell(10);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",10);	
	$pdf->Cell(160.2,4,utf8_decode("DATOS DE APROBACIÓN"),1,0,"C",1);
	
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(60,4,utf8_decode("REUNIÓN Nº:"),1,0,"L",1);
	
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(40,4,utf8_decode("FECHA:"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(60,4,utf8_decode("OPCIÓN APROBADA: S [ ]. A [ ]. B [ ]."),1,0,"L",1);
	
	/*-------------------------*/
	
	
	$pdf->Ln(4);
	$pdf->Cell(10);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53.3,18,utf8_decode(""),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53.3,18,utf8_decode(""),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(53.3,18,utf8_decode(""),1,0,"C",1);
	/*------------------------3--------------------*/
	
	$pdf->Ln(8);
	$pdf->Cell(11);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(52,5,utf8_decode("COM. GRAL.(TT) José Carreño"),0,0,"C",1);
	
	$pdf->Cell(1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(52,5,utf8_decode("COM. JEFE.(TT) Edgar Mora"),0,0,"C",1);
	
	$pdf->Cell(1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(52,5,utf8_decode("José Canelones"),0,0,"C",1);
	
	
	
	$pdf->Ln(4);
	$pdf->Cell(11);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(52,5,utf8_decode("PRESIDENTE"),0,0,"C",1);
	
	$pdf->Cell(1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(52,5,utf8_decode("SECRETARIO"),0,0,"C",1);
	
	$pdf->Cell(1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(52,5,utf8_decode("TESORERO"),0,0,"C",1);
	
	$pdf->Ln(7);
	$pdf->Cell(9);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',9);
	//$pdf->Cell(163,5,"$observaciones",0,0,'C');
	$pdf->Cell(163,5,utf8_decode("Observaciones:______________________________________________________________________________ "),0,0,"C",1);
	
	if($observaciones){
	$pdf->Ln(6);
	$pdf->Cell(163,5,utf8_decode("-$observaciones."),0,0,"C",1);
	}
	
	if($cdp>$total_sobre_neto2){
	$pdf->Ln(6);
	$pdf->Cell(9);
	$pdf->Cell(163,5,utf8_decode("-Supera el % neto para ese organismo"),0,0,"L",1);
	}
	
	
$pdf->Output();
?>
			

	

	
