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

<?/*
<h1><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Buscador - By RogerTM</a></h1>
<form name="buscar" action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
    Buscar: <input type="text" size="50" value="<?php echo $_GET['frase']; ?>" name="frase" />
    <input type="submit" name="buscar" value="Buscar" />
</form>
*/?>



		 <table style="border:0px solid red;">
			 <tr>
				<td>
				Buscar:
				</td>
				<form name="buscar" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
					<td id="titulo3" style="bacagrou:black;"  >
						<IMG VALIGN="middle" SRC="Imagen\iconos_tablas\lupa.png" WIDTH=20 HEIGHT=16 >
						<input style="border:none;" name="cedula" onchange="submit()" type="text"  size="10" maxlength="10" onKeyPress="return permite(event,'car')" >
					</td>
				</form>
			 </tr>
		</table>
		
<?$buscar=$_POST["cedula"];

if($buscar){?>		
		<table id="titulo_t4" >
			 <tr>	<td align="center">Nro.</td>
					<td align="center">Observaciones</td>
					<td align="center">Departamento</td>
					<td align="center">Analista</td>
					<td align="center">Fecha</td>
					
					
			</tr>
			
			
			
		
			
			
			


			
			
			
			
			
			
			
		
















<?php 
//Incluimos la conexion a la base de datos.
//include 'db.php';

$conn = mysql_connect("127.0.0.1","root","1234");
	mysql_select_db("estado_cuenta",$conn);
	

	include("opciones/conexion_prestamo.php"); 
// include("opciones/conexion.php");
//$registros nos entrega la cantidad de registros a mostrar.
$registros = 10;
 
//$contador como su nombre lo indica el contador.	
$contador = 1;
 
/**
 * Se inicia la paginacion, si el valor de $pagina es 0 le asigna el valor 1 e $inicio entra con valor 0.
 * si no es la pagina 1 entonces $inicio sera igual al numero de pagina menos 1 multiplicado por la cantidad de registro
 */
if (!$pagina) { 
    $inicio = 0; 
    $pagina = 1; 
} else { 
    $inicio = ($pagina - 1) * $registros; 
} 

 $buscar=$_POST["cedula"];
include("opciones/conexion_administrador.php"); 




if($buscar){

		$resultados = mysql_query("SELECT * FROM `status_solicitud`  where  id_status_solicitud = '$buscar' ",$conexadmi); 
		
		$total_registros = mysql_num_rows($resultados); 
		$resultados = mysql_query("  SELECT * FROM `status_solicitud`   where id_status_solicitud = '$buscar'  and cod_status_solicitud > '0' ORDER BY cod_status_solicitud ASC LIMIT $inicio, $registros",$conexadmi);	
			 
			} 
else {
		$resultados = mysql_query("SELECT * FROM `status_solicitud`  where id_status_solicitud = '$buscar'  ",$conexadmi); 
		$total_registros = mysql_num_rows($resultados); 
		$resultados = mysql_query("  SELECT * FROM `status_solicitud`   where id_status_solicitud = '$buscar'  and  cod_status_solicitud > '0' ORDER BY cod_status_solicitud ASC LIMIT $inicio, $registros",$conexadmi);	
			
	}		 
			
			 
			 
			 
			 
			//Con ceil redondearemos el resultado total de las paginas 4.53213 = 5
			$total_paginas = ceil($total_registros / $registros); 		  			
			 
			// Si tenemos un retorno en la varibale $total_registro iniciamos el ciclo para mostrar los datos.
			if ($total_registros) {
			
			
			while ($pacientes = mysql_fetch_array($resultados)) {
							$cod=$pacientes["id_solicitudes"];
							$tipo_prestamo1=$pacientes["cod_tipo_prestamo"];
		
				?>		
					
				<!--<tr  onClick="ver_detalles('<? echo $pacientes["id_solicitudes"]; ?>')" style="cursor:pointer" onMouseMove="this.style.backgroundColor='#BFDFFF'" onMouseOut="this.style.backgroundColor='#0a8df2'" >-->
				<tr  onClick="ver_detalles('<? echo $pacientes["id_solicitudes"]; ?>')" style="cursor:pointer" onMouseMove="this.style.backgroundColor='#0a8df2'" onMouseOut="this.style.backgroundColor='#BFDFFF'" >
					  <td  style=" color:red;"><div align="center"><? echo $contador; ?></div></td>
					  <td ><div align="center"><? echo $pacientes["Observaciones"]; ?></div></td>
					    <td ><div align="center"><? echo $pacientes["departamento"]; ?></div></td>
						<td ><div align="center"><? echo $pacientes["analista"]; ?></div></td>
						<td ><div align="center"><? echo $pacientes["fecha_int4"]; ?></div></td>
					  </tr>	
				
					<?php			
					/**horario
					 * La variable $contador es la misma que iniciamos arriba con valor 1, en cada ciclo sumara 1 a este valor.
					 * $contador sirve para mostrar cuantos registros tenemos, es mas que nada una guia.
					 */
			 	   $contador++;
			    }
							
				
			 } else {
			  echo "<font color='darkgray'>(sin resultados)</font>";
			}
				
			mysql_free_result($resultados);	
			?>
		</tbody>
	</table>

	<div align="center">	
		<?php
		if ($total_registros) {
			/**
			 * Aca activamos o desactivamos la opcion "< Anterior", si estamos en la pagina 1 nos dara como resultado 0 por ende NO
			 * activaremos el primer if y pasaremos al else en donde se desactiva la opcion anterior. Pero si el resultado es mayor
			 * a 0 se activara el href del link para poder retroceder.
			 */
			if (($pagina - 1) > 0) {
				echo "<a href='Listado_Solicitudes.php?pagina=".($pagina-1)."'> "?> <img src='Imagen\iconos_tablas\flechaI.png' WIDTH=20 HEIGHT=16  > <?"  </a>";
			} else {
				echo "<a href='#'>"?> <img src='Imagen\iconos_tablas\flechaI.png' WIDTH=20 HEIGHT=16  > <?"</a>";
			}
		
			// Generamos el ciclo para mostrar la cantidad de paginas que tenemos.
			for ($i = 1; $i <= $total_paginas; $i++) {
				if ($pagina == $i) {
					echo "<a href='#'>". $pagina ."</a>"; 
				} else {
					echo "<a href='Listado_Solicitudes.php?pagina=$i'>$i</a> "; 
				}	
			}
	  		
	  		/**
	  		 * Igual que la opcion primera de "< Anterior", pero aca para la opcion "Siguiente >", si estamos en la ultima pagina no podremos
	  		 * utilizar esta opcion.   <IMG VALIGN="middle" SRC="Imagen\iconos_tablas\lupa.png" WIDTH=20 HEIGHT=16 >
	  		 */
			if (($pagina + 1)<=$total_paginas) {
				echo "<a href='Listado_Solicitudes.php?pagina=".($pagina+1)."'>"?> <img src='Imagen\iconos_tablas\flechaD.png' WIDTH=20 HEIGHT=16  > <?"</a>";
			} else {
				echo "<a href='#'>"?> <img src='Imagen\iconos_tablas\flechaD.png' WIDTH=20 HEIGHT=16  > <?"</a>";
			}		 
		}
		?>	
	</div> 
	
	<?php
		// Cerramos conexion con MYSQLI.
		mysql_close($conn);
		
		
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
