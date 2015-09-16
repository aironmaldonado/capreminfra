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
<div>

<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="1" cellspacing="0" cellpadding="4">
   <th colspan="11" id="titulo2" >Depositos A Plazo Fijo</th>
   
    <tr>
      <td bgcolor="#9999CC">N°</td>
      <td bgcolor="#9999CC">N. DBF</td>
	  <td bgcolor="#9999CC">Banco</td>
      <td bgcolor="#9999CC">F. Emision</td>
      <td bgcolor="#9999CC">N. Capital</td>
      <td bgcolor="#9999CC">Plazo</td>
      <td bgcolor="#9999CC">Tasa</td>
	  <td bgcolor="#9999CC">F. Vencimiento </td>
      <td bgcolor="#9999CC">Tipo </td>
	  <td bgcolor="#9999CC">Interes A Octener </td>
      <td bgcolor="#9999CC">Opción</td>
	</tr>
    
	<?

include("opciones/conexion_prestamo.php");
$buscar = mysql_query ("SELECT * FROM dpf where status='a' ",$conexPres);
	
				    while($vec1=mysql_fetch_assoc($buscar))
							{
					$vec1["banco"]; 
						
?>
      <tr>
		<td><?php echo $n=$n+1; ?></td>
		<td><?php echo $vec1["ndpf"]; ?></td>
        <td><?php echo $vec1["banco"]; ?></td>
        <td><?php echo $vec1["femision"]; ?></td>
        <td><?php echo $vec1["nuevo_capital"]; ?></td>
        <td><?php echo $vec1["plazo"]; ?></td>
		 <td><?php echo $vec1["tasa"];?></td>
        <td><?php echo $vec1["fvencimiento"]; ?></td>
        <td><?php echo $vec1["tipo"]; ?></td>
        <td><?php echo $vec1["interes"];?></td>
		  
        <td><!--<a href="editar_paquete.php?Cod_dpf=<?php echo $vec1["cod_dpf"]; ?>"><img src="Imagen\iconos_tablas\icono_edit.png" width="16" height="16" alt="editar" /></a>--> <a href="DPF1.php?ID=<?php echo $vec1["cod_dpf"];  ?>"><img src="Imagen\iconos_tablas\icono_remove.png" width="16" height="16" alt="eliminar" /></a></td>
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
