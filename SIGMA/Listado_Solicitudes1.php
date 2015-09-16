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
<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div>       

<?//echo $cedula;

echo $ced=$CI;
echo $c1=$credito;
echo $cs=$cod_soli;

$_SESSION["cedulaS"]=$CI;
$_SESSION["tipo_prestamo"]=$credito;
$_SESSION["cod_solicitudes"]=$cod_soli;


include("opciones/conexion_administrador.php"); //conexadmi 
include("opciones/conexion_prestamo.php"); //conexPres
 //$b = mysql_query ("SELECT * FROM tipo_prestamos WHERE cod_tipo_prestamo = '$c1'  ",$conexPres);while($v=mysql_fetch_assoc($b))	{  $tipo_prestamo=$v['tipo_prestamo'];   $_SESSION["tipo_prestamo"]=$v['cod_tipo_prestamo'];	}	

	
	
				
				
				
				
				
				

switch ($c1) {
case 8:
case 7:
case 6:
   // echo "<script type='text/javascript'>document.location.href = ('Solicitud_Credito_Hipotecario2.php'); </script>";
    break;
case 10:
case 11:
case 12:
case 13:
case 14:
case 15:
case 16:
  // 	echo "<script type='text/javascript'>document.location.href = ('Solicitud_Credito_Vehiculo2.php'); </script>";
	break;
default:
		//echo "<script type='text/javascript'>document.location.href = ('Solicitud_Prestamos2.php'); </script>";
		
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
