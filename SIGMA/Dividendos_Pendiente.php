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






<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div align="center">
<script type="text/javascript">
function guardar(){

	 
	if(document.form1.cedula.value.length==0){
		alert("Defina Numero de Cedula");
		document.form1.cedula.focus();
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
       
 <form id="form1" name="form1" method="post" action="Dividendos_Pendiente.php">
       
			<table  border="0" style="border: #35a3de 1px solid;   border-collapse: separate;  border-spacing:  5px 15px; border-radius: 30px 30px 30px 30px; -moz-border-radius: 30px 30px 30px 30px; -webkit-border-radius: 30px 30px 30px 30px;" cellpadding="0" cellspacing="0">
				
				
				<tr>
				  <td colspan="2" align="center" id="titulo1">Dividendos Pendiente </td>
				</tr>
				 
				
				
				<tr>
						
						 
					<td>Cedula:</td>
						<td>
							<input name="cedula"  type="text" id="cedula" size="19" maxlength="10" onKeyPress="return permite(event,'num')" onchange="guardar()">
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
			
			
			
			$cedula_socio=$_POST["cedula"];
			
			
	   
	   
													
	   
	   include("opciones/conexion.php"); 

			$b = mysql_query ("SELECT * FROM nomina as n inner join organismo as org on(n.cod_organismo=org.cod_organismo) where N_cedula= '$cedula_socio' LIMIT 0 , 1 ",$conex); while ($v=mysql_fetch_assoc($b))	
			{   
			$nom_organismo=$v['nom_organismo'];  	
		
			}
			
			  include("opciones/conexion.php"); 

			$soc = mysql_query ("SELECT * FROM socios where cedula= '$cedula_socio'  ",$conex); while ($ven=mysql_fetch_assoc($soc))	
			{   
			$n=$ven['nacionalidad'];  	
		
			}
			
			
			
			
			
			
			
														if(trim($cedula_socio))
															{

																switch(strlen($cedula_socio)){
																case "1" : $ced1 = "000000000" . $cedula_socio; break;
																case "2" : $ced1 = "00000000" . $cedula_socio; break;
																case "3" : $ced1 = "0000000" . $cedula_socio; break; 
																case "4" : $ced1 = "000000" . $cedula_socio; break; 
																case "5" : $ced1 = "00000" . $cedula_socio; break; 
																case "6" : $ced1 = "0000" . $cedula_socio; break; 
																case "7" : $ced1 = "000" . $cedula_socio; break; 
																case "8" : $ced1 = "00" . $cedula_socio; break; 
																case "9" : $ced1 = "0" . $cedula_socio; break; 
																}
															}
			
			
						
						
						
						
			$conexion = odbc_connect("FOX","","","");
			$sql="Select * from socios where cedula ='$ced1'  ";
			$result=odbc_exec($conexion,$sql)or die(exit("Error en odbc_exec"));
                                
                                while (odbc_fetch_row($result)) {
                                
                                $nombre=odbc_result($result,"nombre"); 
                                $ctaban=odbc_result($result,"ctaban");  
                                $organismo=odbc_result($result,"organismo"); 
								
																}
																
						switch ($organismo) {
						case 03:
						case 04:
						case 05:
							$ctacontable="31301002";
							break;
						case 6:
							$ctacontable="31301004";
							break;
						default:
						$ctacontable="31301001";
							
						}
			
			
			
			
			
			
			
	   
	     $conexion = odbc_connect("FOX","","","");
         $sql="Select * from analedo where ctamayor ='$ctacontable' and ctaauxi='$ced1'  ";
         $result=odbc_exec($conexion,$sql)or die(exit("Error en odbc_exec"));
                                
                                while (odbc_fetch_row($result)) {
                                
                                $haber=odbc_result($result,"haber"); 
                                $debe=odbc_result($result,"debe");  
                               
							   $suma_haber=$suma_haber+$haber;		
                               $suma_debe=$suma_debe+$debe;		
								 
								$total_dividendo=$suma_haber-$suma_debe;
								 
								
        
                               }
							   
							   
							  date_default_timezone_set("America/Caracas" ) ; 
								$fecha = date('d-m-Y'); 
								
							    $f = explode("-",$fecha);
                     $a=$f[0]; // porción1
                    $m=$f[1]; // porción2
                    $d=$f[2];
								 
                                include("opciones/conexion_administrador.php"); 
                            $consulta1=mysql_query("INSERT INTO dividendos_pendiente (
`cod_dividendos_pendiente` ,
`cedula` ,
`nacionalidad` ,
`nombre` ,
`organismo` ,
`N_cuenta` ,
`monto` ,
`ctamayor` ,
`dd` ,
`mm` ,
`aaaa`,
`banco`,
`estatus`

)
VALUES (
NULL , '$cedula_socio', '$n',  '$nombre',  '$nom_organismo',  '$ctaban',  '$total_dividendo',  '$ced1', '$a',  '$m',  '
$d', '$ctaban', 'a'
)",$conexadmi);
							   
							   
							   
							   
							   
							   
							   
							   
							   
							   
							   
							   
							   
							   
							   
							   
}  
	 
	  ?>
	  </div>
	  </br></br>
	
	  
	   
	  <div>
	   
<table width="600" border="1"  style="border: #35a3de 1px solid;   border-collapse: separate;  border-spacing:  5px 15px; border-radius: 30px 30px 30px 30px;-moz-border-radius: 30px 30px 30px 30px; -webkit-border-radius: 30px 30px 30px 30px;">
  <tr>
    <th scope="col"id="titulo1" >&nbsp;Cedula</th>
    <th scope="col" id="titulo1">&nbsp;Nombre y Apellido</th>
    <th scope="col" id="titulo1">&nbsp;Organismo</th>
    <th scope="col" id="titulo1">&nbsp;N° De Cuenta</th>
    <th scope="col" id="titulo1">&nbsp;Monto</th>
	<th scope="col" id="titulo1">&nbsp;Cuenta contable</th>
   
  </tr>
  <tr>
    <th scope="row"><? echo $ced1; ?></th>
    <td>&nbsp;<? echo $nombre_s; ?></td>
    <td>&nbsp;<? echo $nom_organismo; ?></td>
    <td>&nbsp;<? echo $ctaban; ?></td>
    <td>&nbsp;<? echo $total_dividendo; ?></td>
	<td>&nbsp;<? echo $ctacontable; ?></td>
  </tr>
  
</table>
	   
	
<script>

function guardar1(){
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=408, height=500, top=85, left=140, Text-align=left";
window.open('Dividendos_Pendiente2.php','SIGMA',opciones);	
	//window.open('BASSugerencias.php','Capreminfra','width=300, height=400')

}




</script>	

	<form id="form2" name="form2" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">		
						
						<!--<input name="boton2" type="HIDDEN" id="boton2" />
						<input name="Regresas" type="button" id="Regresas" value="Regresar" onclick="regresas()"  />
						-->
						
						 <input name="boton1" type="HIDDEN" id="boton1" />
						 <input name="modificar" type="button" id="modificar"  value="Consultar Listado" Title="Ver listado"  onClick="guardar1()" />
						
						
						
	</form>
						
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
