<?php session_start();
	$usuusu=$_SESSION["usuusu"]; 
	$nombre_pc=$_SESSION["nombre_pc"];
	$hora=$_SESSION["hora"];
	$fecha=$_SESSION["fecha"];	
	
			
 //$cedula_socio=("21535615");
 $cedula_socio=$_SESSION["cedulaS"];

$cn = mysql_connect("127.0.0.1","root","1234");
mysql_select_db("capreminfra",$cn);

date_default_timezone_set("America/Caracas" ) ; 
$fecha_actual = date('d-m-Y',time() - 3600*date('I')); 
	



$b = mysql_query ("SELECT * FROM telefono as tel inner join codigo_area as ca on(tel.cod_codigo_area=ca.cod_codigo_area) where cedula='$cedula_socio';  ",$cn);
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
								
/*
 $personas =mysql_query("SELECT nom_ape,nombre1,nombre2, apellido1, apellido2 , nacionalidad, cedula ,sexo ,N_cuenta, F_nacimiento, correo ,nom_estatus,tipo_nomina,nom_organismo,est_civil,direccion,calle,avenida,cod_codigo_postal,num_vivienda,estado,municipio,parroquia,tipo_vivienda,imagen
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
Inner join  imagenes as img  on (img.cod_socio=soc.cod_socio)
 where cedula='$cedula_socio' ",$cn);*/	

 $personas =mysql_query("SELECT * FROM socios as soc 
 inner join  nomina  as nom  on (nom.cod_socio =soc.cod_socio)
Inner join  organismo as org  on (nom.cod_organismo= org.cod_organismo) 
Inner join  est_civil as es_ci  on (soc.cod_est_civil= es_ci.cod_est_civil)
Inner join  direccion as dir  on (soc. cod_socio= dir. cod_socio)
Inner join  estado as esta  on (esta. cod_estado= dir. cod_estado)
Inner join  municipio as mun  on (mun. cod_municipio= dir. cod_municipio)
Inner join  parroquia as parr  on (parr. cod_parroquia= dir. cod_parroquia)
Inner join  vivienda as vivi  on (vivi. cod_vivienda= dir. cod_vivienda)

where cedula='$cedula_socio' ",$cn);
while($vector = mysql_fetch_assoc($personas))
{

$nom_ape=$vector['nom_ape'];
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



$dir=$vector['direccion'];
$calle=$vector['calle'];
$avenida=$vector['avenida'];
$cp=$vector['cod_codigo_postal'];
$num_vivienda=$vector['num_vivienda'];

$estado=$vector['estado'];
$municipio=$vector['municipio'];
$parroquia=$vector['parroquia'];
$tipo_vivienda=$vector['tipo_vivienda'];


}
/*												
include("../opciones/conexion_producto.php");  
$b1 = mysql_query ("SELECT *  FROM  solicitud as sol inner join delegados as del  on(sol.cod_delegados=del.cod_delegados) where cedula='$cedula_socio'  LIMIT 0,1  ",$conex); 
while($v1=mysql_fetch_assoc($b1))	{   $nombre_delegado=$v1['nombre'];  }  	
	*/		
	
/*-------------------------------------------------------------------------------------------------------------*/		
	include("fpdf17/fpdf.php");
	class PDF extends FPDF
{
//Cabecera de página
function Header()
   {
   header("Content-Type: text/html; charset=iso-8859-1 ");
    //Logo
    $this->Image("imagen/Captura.png" , 10 ,8, 50 , 35 , "png" ,"http://www.capreminfra.net");
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(85);
    //Título
    $this->Cell(20,30,utf8_decode("Solicitud de Productos Navideños"),0,0,'C');


    //Salto de línea
	
    $this->Ln(-10);
	$this->Cell(150);
	$this->SetFont('Arial','B',9);
	$this->Cell(40,40,date('d-m-Y',time() - 3600*date('I')),0,1,'L');
	
	 $this->Ln(-35);
	$this->Cell(150);
	$this->SetFont('Arial','B',9);
	$this->Cell(40,40,date('h:i a',time() - 3600*date('I')),0,1,'L');
	
	
	$this->Ln(-35);
	$this->Cell(150);
	$this->SetFont('Arial','B',7);
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
    $this->Cell(0,10,'- Pag '.$this->PageNo().'-',0,0,'C');
   }
   
}
															
				
				
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','',12);		

/*----------------------------------------------------inicio ---------------------------------------------------------*/
				
				
	$pdf->Ln(-15);
	$pdf->Cell(127);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(25,6,"",0,0,"R",1);
	$pdf->SetFont('Arial','B',15);
	$pdf->SetTextColor(216,10,40);
	$pdf->Cell(25,6,'',0,0,"L",1,"www.google.co.ve");
	
	$pdf->Ln(19);
	$pdf->Cell(15);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",12);	
	$pdf->Cell(160.2,6,utf8_decode("DATOS DEL NUEVO SOCIO") ,1,0,"C",1);
	/*
	$pdf->Ln(6);
	$pdf->Cell(15);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(136,7,"APELLIDO y NOMBRES: $nom_ape",1,0,"L",1);
	*/
	
	$pdf->Ln(6);
	$pdf->Cell(15);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(136,7,"APELLIDO y NOMBRES: $nom1 $ape1",1,0,"L",1);
	
	
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(24,7,"SEXO:$sexo",1,0,"C",1);

	
	
	
	$pdf->Ln(7);
	$pdf->Cell(15);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",10);	
	$pdf->Cell(40,7,"CEDULA:$n-$cd",1,0,"L",1);
	
	

	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$fecha = explode('-', $fec);
	$pdf->Cell(36,7,"Fecha N:$fecha[2]-$fecha[1]-$fecha[0]",1,0,"C",1);
	
	
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(84,6,"ORGANISMO:$org",1,0,"L",1);	

	
	
	
	$pdf->Ln(6.2);
	$pdf->Cell(15);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->Cell(76,6,"NRO. CUENTA:$nro",1,0,"L",1);
			
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->Cell(84,6,"Correo:$cor",1,0,"L",1);
	
/*----------------------------------------------------*/
	$pdf->Ln(6.2);
	$pdf->Cell(15);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(40,7,"Loc:$t1-$n1"  ,1,0,"L",1);
		
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(40,7,"Cel.:$t2-$n2",1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(40,7,"Ofc.:$t3-$n3",1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(40,7,"Otro:$t4-$n4",1,0,"L",1);
	
/*---------------------------------------*/	
	/*$pdf->Ln(7);
	$pdf->Cell(15);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(40,7,"Estatus:$estatu",1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(40,7,"Nomina:$nomina",1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(40,7,"E. Civil:$EstCivil",1,0,"L",1);
	*/
/*---------------------------------------*/	
	//$dir,$calle,$avenida,$cp,$num_vivienda,$estado,$municipio,$parroquia,$tipo_vivienda;
	$pdf->Ln(7);
	$pdf->Cell(15);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(160,16,"",1,0,"L",1);
	
	
	$pdf->Ln(1);
	$pdf->Cell(16);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(158,7,"DIRECCION: EDO.$estado Mcpio.$municipio Prrquia.$parroquia ",0,0,"L",1);
	
	$pdf->Ln(7);
	$pdf->Cell(16);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(158,7,"Av. $avenida Calle. $calle, $dir $tipo_vivienda N.$num_vivienda ",0,0,"L",1);
	
	include("../opciones/conexion_producto.php");  
$b1 = mysql_query ("SELECT *  FROM  solicitud as sol inner join delegados as del  on(sol.cod_delegados=del.cod_delegados) where cedula='21535615'  LIMIT 0,1  ",$conex); 
while($v1=mysql_fetch_assoc($b1))	{   $nombre_delegado=$v1['nombre'];  }  
	
	
	
	
	
	
	
	/*dos lista de productos */
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$pdf->Ln(19);
	$pdf->Cell(8);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",12);	
	$pdf->Cell(173,5,utf8_decode("Delegado: $nombre_delegado"),0,0,"R",1);
	
	$pdf->Ln(5);
	$pdf->Cell(8);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",12);	
	$pdf->Cell(173,5,utf8_decode("Lista Producto"),1,0,"C",1);
	
	
	$pdf->Ln(5);
	$pdf->Cell(8);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(7,5,utf8_decode("Nº"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(80,5,utf8_decode("Producto"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(12,5,utf8_decode("Peso "),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,5,utf8_decode("Precio x Unidad"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(18,5,utf8_decode("Solicitud"),1,0,"L",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(25,5,utf8_decode("Sub-Total"),1,0,"L",1);
	
		include("../opciones/conexion_producto.php");
		$resultados = mysql_query("SELECT * FROM  `productosn`",$conex);	
			 
				while ($pacientes = mysql_fetch_array($resultados)) {
				$cod_producto=$pacientes["cod_producto"];
				$nombre=$pacientes["nombre"];
				$precio=$pacientes["precio"]; 
				$peso=$pacientes["peso"];
				
				
				
				
				$pdf->Ln(5);
				$pdf->Cell(8);
				$pdf->SetTextColor(8,8,8);
				$pdf->SetFillColor(255,255, 255);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(7,5,utf8_decode("$cod_producto"),1,0,"L",1);
				
				$pdf->Cell(0.1);
				$pdf->SetTextColor(8,8,8);
				$pdf->SetFillColor(255,255, 255);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(80,5,utf8_decode("$nombre"),1,0,"L",1);
				
				$pdf->Cell(0.1);
				$pdf->SetTextColor(8,8,8);
				$pdf->SetFillColor(255,255, 255);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(12,5,utf8_decode("$peso"),1,0,"L",1);
				
				$pdf->Cell(0.1);
				$pdf->SetTextColor(8,8,8);
				$pdf->SetFillColor(255,255, 255);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(30,5,utf8_decode("$precio"),1,0,"L",1);
			
			include("../opciones/conexion_producto.php");  
			$b1 = mysql_query ("SELECT sum(cantidad) as cantidad FROM  `solicitud` where cedula='$cedula_socio' and cod_producto='$cod_producto' LIMIT 0,1  ",$conex); while($v1=mysql_fetch_assoc($b1))	{   $cantidad=$v1['cantidad'];    	
			

				$pdf->Cell(0.1);
				$pdf->SetTextColor(8,8,8);
				$pdf->SetFillColor(255,255, 255);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(18,5,utf8_decode("$cantidad"),1,0,"L",1);
				}
				$SubTotal=$precio*$cantidad;
				$pdf->Cell(0.1);
				$pdf->SetTextColor(8,8,8);
				$pdf->SetFillColor(255,255, 255);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(25,5,utf8_decode("$SubTotal"),1,0,"L",1);
				}
	
	$pdf->Ln(5);
	$pdf->Cell(8);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",12);	
	$pdf->Cell(147.3,5,utf8_decode("Total:"),1,0,"R",1);
	
	include("../opciones/conexion_producto.php"); 
	$resultados = mysql_query("SELECT sum(precio) as total_p    FROM  solicitud as sol inner join productosn as pro on(sol.cod_producto=pro.cod_producto) where cedula='$cedulaS' ",$conex);
	while ($pacientes = mysql_fetch_array($resultados)) {  $total_precio=$pacientes["total_p"];  }
		
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(25,5,utf8_decode("$total_precio"),1,0,"L",1);
	
	
	
	/*
	$this->Image("img/Captura.png" , 10 ,8, 50 , 35 , "png" ,"http://www.capreminfra.net");
/*----------------------------------------------------TABLA DE ESTADO DEL SOCIO ---------------------------------------------------------*/

	


	$pdf->Ln(30);
	$pdf->Cell(15);
	$pdf->SetTextColor(0);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(158,6,"__________________________________________________________________________________",0,0,"L",1);

	
	$pdf->Ln(5);
	$pdf->Cell(23);
	$pdf->SetTextColor(0);
	$pdf->SetFillColor(255,255,255);
	//$pdf->Cell(25,6,"Elaborado Por:                   Revisado                    Procesado                 Verificado            Re ",0,0,"L",1);
	$pdf->Cell(25,6,"Elaborado Por:                           											                                                        	   Firma y Huella :",0,0,"L",1);
	
	$pdf->Ln(5);
	$pdf->Cell(23);
	$pdf->SetTextColor(0);
	$pdf->SetFillColor(255,255,255);
	//$pdf->Cell(25,6,"Elaborado Por:                   Revisado                    Procesado                 Verificado            Re ",0,0,"L",1);
	$pdf->Cell(25,6,"     Analista                       											                                                                         	   Socio ",0,0,"L",1);
	
	
/*
		
	$pdf->Ln(12);
	$pdf->Cell(15);
	$pdf->SetTextColor(0);
	$pdf->SetFont('Arial','B',7);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(25,6,"Todas estas cifras son expresadas en Bs.",0,0,"L",1);
*/


$pdf->Output();
?>
			

	

	
