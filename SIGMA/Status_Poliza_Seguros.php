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
$buscar = mysql_query ("SELECT * FROM `proveedor` where nombre_proveedor like '%$p%' ",$conexPres);


$currentPage = $_SERVER["PHP_SELF"];

$maxRows_editpq = 10;
$pageNum_editpq = 0;
if (isset($_GET['pageNum_editpq'])) {
  $pageNum_editpq = $_GET['pageNum_editpq'];
}
$startRow_editpq = $pageNum_editpq * $maxRows_editpq;

mysql_select_db($database_conexion, $conexPres);
$query_editpq = "SELECT * FROM poliza_seguro where cod_poliza_seguro<>'o' ";
$query_limit_editpq = sprintf("%s LIMIT %d, %d", $query_editpq, $startRow_editpq, $maxRows_editpq);
$editpq = mysql_query($query_limit_editpq, $conexPres) or die(mysql_error());
$row_editpq = mysql_fetch_assoc($editpq);

if (isset($_GET['totalRows_editpq'])) {
  $totalRows_editpq = $_GET['totalRows_editpq'];
} else {
  $all_editpq = mysql_query($query_editpq);
  $totalRows_editpq = mysql_num_rows($all_editpq);
}
$totalPages_editpq = ceil($totalRows_editpq/$maxRows_editpq)-1;

$queryString_editpq = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_editpq") == false && 
        stristr($param, "totalRows_editpq") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_editpq = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_editpq = sprintf("&totalRows_editpq=%d%s", $totalRows_editpq, $queryString_editpq);
?>


<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div>

<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="1" cellspacing="0" cellpadding="4">
    <tr>
      <td bgcolor="#9999CC">N°</td>
      <td bgcolor="#9999CC">N° Credito</td>
      <td bgcolor="#9999CC">Soacio</td>
      <td bgcolor="#9999CC">Cedula</td>
      <td bgcolor="#9999CC">Vehiculo</td>
      <td bgcolor="#9999CC">F. Otorgamiento</td>
	 <td bgcolor="#9999CC">Aseguradora</td>
      <td bgcolor="#9999CC">Desde </td>
	   <td bgcolor="#9999CC">Hasta </td>
      <td bgcolor="#9999CC">Cobertura </td>
	  <td bgcolor="#9999CC">Prima  </td>
	  <td bgcolor="#9999CC">Saldo capital  </td>
	  <td bgcolor="#9999CC">Tipo pago  </td>
	  <td bgcolor="#9999CC">Opciones </td>
	  
	  
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_editpq['destino']; ?></td>
        <td><?php echo $row_editpq['duracion']; ?></td>
        <td><?php echo $row_editpq['tipo_plan']; ?></td>
        <td><?php echo $row_editpq['temporada']; ?></td>
		 <td><?php echo $row_editpq['destino']; ?></td>
        <td><?php echo $row_editpq['duracion']; ?></td>
        <td><?php echo $row_editpq['tipo_plan']; ?></td>
        <td><?php echo $row_editpq['temporada']; ?></td>
		   <td><?php echo $row_editpq['duracion']; ?></td>
        <td><?php echo $row_editpq['tipo_plan']; ?></td>
        <td><?php echo $row_editpq['temporada']; ?></td>
		 <td><?php echo $row_editpq['temporada']; ?></td>
        <td><?php echo $row_editpq['hotel']; ?></td>
        <td><a href="editar_paquete.php?recordID=<?php echo $row_editpq['id_paq']; ?>"><img src="Imagen\iconos_tablas\icono_edit.png" width="16" height="16" alt="editar" /></a> <a href="eliminar_paquete.php?recordID=<?php echo $row_editpq['id_paq']; ?>"><img src="Imagen\iconos_tablas\icono_remove.png" width="16" height="16" alt="eliminar" /></a></td>
      </tr>
      <?php } while ($row_editpq = mysql_fetch_assoc($editpq)); ?>
  </table>
  <p>&nbsp;</p>
  <div align="center">
    <p><a href="<?php printf("%s?pageNum_editpq=%d%s", $currentPage, min($totalPages_editpq, $pageNum_editpq + 1), $queryString_editpq); ?>"> Anterior Siguiente</a></p>
  </div>
  <table border="0" align="center">
    <tr>
      <td width="10"><a href="registrar_paquetes.php"><img src="Imagen/iconos_tablas/icono_add.png" width="44" height="46" alt="Añadir" /></a></td>
      <td width="44"><a href="buscar_paquete.php"><img src="Imagen/iconos_tablas/volver.png" width="44" height="46" alt="atras" /></a></td>
    </tr>
  </table>
  <p>&nbsp;</p>
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
