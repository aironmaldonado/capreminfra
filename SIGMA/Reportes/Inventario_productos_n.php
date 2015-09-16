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
    $this->Cell(20,30,utf8_decode("Productos  Navideños"),0,0,'C');


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
	$pdf->Cell(160.2,6,utf8_decode("Inventario de Productos  Navideños") ,1,0,"C",1);

	$pdf->Ln(5);
	$pdf->Cell(1);
	$pdf->SetTextColor(0,0,128);
	$pdf->SetFillColor(255,255, 255);
	$pdf->SetFont("arial","",12);	
	$pdf->Cell(191,5,utf8_decode("Lista Producto"),1,0,"C",1);
	
	
	$pdf->Ln(5);
	$pdf->Cell(1);
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
	$pdf->Cell(18,5,utf8_decode("Cant Exis"),1,0,"L",1);
	
	
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
				$cantidad1=$pacientes["cantidad"];
				
				
				
				
				$pdf->Ln(5);
				$pdf->Cell(1);
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
			$b1 = mysql_query ("SELECT sum(cantidad) as cantidad FROM  `solicitud` where  cod_producto='$cod_producto' LIMIT 0,1  ",$conex); while($v1=mysql_fetch_assoc($b1))	{   $cantidad=$v1['cantidad'];    	
			

				$pdf->Cell(0.1);
				$pdf->SetTextColor(8,8,8);
				$pdf->SetFillColor(255,255, 255);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(18,5,utf8_decode("$cantidad"),1,0,"L",1);
				
				$pdf->Cell(0.1);
				$pdf->SetTextColor(8,8,8);
				$pdf->SetFillColor(255,255, 255);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(18,5,$cantidad1-$cantidad,1,0,"L",1);
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
	$pdf->Cell(158.6,5,utf8_decode("Total:"),1,0,"R",1);
	
	include("../opciones/conexion_producto.php"); 
	$resultados = mysql_query("SELECT sum(precio) as total_p    FROM  solicitud as sol inner join productosn as pro on(sol.cod_producto=pro.cod_producto)  ",$conex);
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
			

	

	
