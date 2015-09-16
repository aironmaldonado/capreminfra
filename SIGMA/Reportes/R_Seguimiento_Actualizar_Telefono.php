<?php session_start();
	$usuusu=$_SESSION["usuusu"]; 
	$nombre_pc=$_SESSION["nombre_pc"];
	$hora=$_SESSION["hora"];
	$fecha=$_SESSION["fecha"];	
	
			
	 $analista=$_SESSION["analista"];	
	 $fec=$_SESSION["date"];
		
		
		
		
		 $da= explode('-', $fec);   

		 $dia = $da[2]*1;  
		   $mes = $da[1]*1; 
		   $anio = $da[0];
		
		  
		  
		  
		  

$cn = mysql_connect("127.0.0.1","root","1234");
mysql_select_db("capreminfra",$cn);

date_default_timezone_set("America/Caracas" ) ; 
$fecha_actual = date('d-m-Y',time() - 3600*date('I')); 
	



	
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
    $this->Cell(20,30,utf8_decode("Actualización por Analista"),0,0,'C');


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
	$pdf->Cell(160.2,6,utf8_decode("Listado socios Actualizado") ,1,0,"C",1);
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
	$pdf->Cell(15,7,utf8_decode("N°"),1,0,"L",1);
	
	
	
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(60,7,utf8_decode("Nombres"),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(35,7,utf8_decode("C.I. Socio:"),1,0,"C",1);
	
	$pdf->Cell(0.1);
	$pdf->SetTextColor(8,8,8);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(50,7,"Fecha y Hora",1,0,"C",1);
	
	

	
	

  include("../opciones/conexion_panel_herramienta.php");
		  $b7 = mysql_query ("SELECT * FROM  usuarios where cod_usuarios = $analista ",$conex); 
		  while ($v7=mysql_fetch_assoc($b7)){
		

include("../opciones/conexion_administrador.php");	 


if($fec){

$b6 = mysql_query ("SELECT * FROM actualizacion  where cod_usuario='$analista' and dia='$dia' and mes='$mes' and aaaa='$anio'   ",$conexadmi); 

} else{
$b6 = mysql_query ("SELECT * FROM actualizacion  where cod_usuario='$analista' ",$conexadmi);
}

				while ($v6=mysql_fetch_assoc($b6)){	
	
	
	
	$i=$i+1; 
	$nom = $v7['nombres'];  
	$ape=$v7['apellidos'];	
	$cantidad = $v6['fecha'];	
	
	$cedula_s = $v6['Cedula_Socio'];
	
	
				$pdf->Ln(5.2);
				$pdf->Cell(15);
				$pdf->SetTextColor(8,8,8);
				$pdf->SetFillColor(255,255, 255);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(15,5,utf8_decode("$i"),1,0,"L",1);
				
				$pdf->Cell(0.1);
				$pdf->SetTextColor(8,8,8);
				$pdf->SetFillColor(255,255, 255);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(60,5,utf8_decode("$nom $ape"),1,0,"L",1);
				
				$pdf->Cell(0.1);
				$pdf->SetTextColor(8,8,8);
				$pdf->SetFillColor(255,255, 255);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(35,5,utf8_decode("$cedula_s"),1,0,"R",1);
				
				$pdf->Cell(0.1);
				$pdf->SetTextColor(8,8,8);
				$pdf->SetFillColor(255,255, 255);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(50,5,utf8_decode("$cantidad"),1,0,"R",1);
	
	
	
				
  } }
  
  
  
 include("../opciones/conexion_administrador.php");	 $b6 = mysql_query ("SELECT count(cod_usuario) as actualizado FROM actualizacion  where cod_usuario='$analista' ",$conexadmi); 
while ($v6=mysql_fetch_assoc($b6)){	
 $cantidad = $v6['actualizado'];
 }	


				$pdf->Ln(5.2);
				$pdf->Cell(115);
				$pdf->SetTextColor(8,8,8);
				$pdf->SetFillColor(255,255, 255);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(60,5,utf8_decode("Total Registros Actualizados:$cantidad"),0,0,"R",1);

	


$pdf->Output();
?>
			

	

	
