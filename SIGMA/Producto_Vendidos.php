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
function guardar1(){

		window.open('Reportes/Inventario_productos_n.php','nuevaVentana','width=300, height=400')

}
</script>






<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div>


<table align="center">
		
				
				
				<tr>
				  <td colspan="7" align="center" id="titulo2">PRODUCTOS DISPONIBLES</td>
				</tr>
				
				<tr id="titulo3" >
					<td style=" width:15px; ">Nº</td>
					<td style=" width:350px; ">Producto</td>
					<td style="width:60px;" >Cantidad</td>
					<td style="width:110px;">Precio x Unidad</td>
					<td style="width:120px;">Peso Apróximado</td>
					<td style="width:50px;" >Solicitud</td>
					<td style="width:100px;" >Cant Exis</td>
				<tr>
			
			
			<?
			
			$servidor="127.0.0.1";
			$usuario="root";
			$clave="1234";
			$db_nombre="productos";


			$conexPres=@mysql_connect($servidor,$usuario,$clave) or die(mysql_error());
			@mysql_select_db($db_nombre,$conex) or die(mysql_error()); 

			if (!$conex){
			echo 'error al conectar';
			die;
			}
			$bd = mysql_select_db($db_nombre,$conex);
			if (!$bd){
			echo 'error al seleccionar la base d datos';
			die;
			}
			mysql_query ("SET NAMES 'utf8'");




				
				$resultados = mysql_query("SELECT * FROM  `ProductosN`",$conexPres);	
			 
				while ($pacientes = mysql_fetch_array($resultados)) {
							
		
				?>		
					
				<tr  onClick="ver_detalles('<? echo $pacientes["cod_producto"]; ?>')" style="cursor:pointer" onMouseMove="this.style.backgroundColor='#0a8df2'" onMouseOut="this.style.backgroundColor='#BFDFFF'" >
					  <td  style=" width:15px; color:red;"><div align="center"><? echo $cod_p=$pacientes["cod_producto"]; ?></div></td>
					  <td style=" width:380px; " ><div align="center"><? echo $pacientes["nombre"]; ?></div></td>
					  <td style="width:65px;" ><div align="center"><? echo $pacientes["cantidad"]; ?></div></td>
					  <td style="width:125px;"><div align="center"><? echo $pacientes["precio"]; ?></div></td>
					  <td style="width:125px;"><div align="center"><? echo $pacientes["peso"]; ?></div></td>
					<td style="width:50px;" ><div align="center"><?include("opciones/conexion_producto.php");  $b1 = mysql_query ("SELECT sum(cantidad) as cantidad FROM  `solicitud` where  cod_producto='$cod_p' LIMIT 0,1  ",$conex); while($v1=mysql_fetch_assoc($b1))	{  echo $v1['cantidad']; }    ?></div></td>
					 <td style="width:50px;" ><div align="center"><?include("opciones/conexion_producto.php");  $b1 = mysql_query ("SELECT sum(cantidad) as cantidad FROM  `solicitud` where  cod_producto='$cod_p' LIMIT 0,1  ",$conex); while($v1=mysql_fetch_assoc($b1))	{  $cantidad=$v1['cantidad']; }  echo $t=$pacientes["cantidad"]-$cantidad ; ?></div></td>
					
				</tr>	
				
					<?php  }
					//right?>
				
				
			<?$resultados = mysql_query("SELECT sum(precio) as total_p    FROM  solicitud as sol inner join productosn as pro on(sol.cod_producto=pro.cod_producto)  ",$conexPres);	while ($pacientes = mysql_fetch_array($resultados)) {  $total_precio=$pacientes["total_p"];  }?>
			
			<? $resultados = mysql_query("SELECT sum(cantidad) as cant FROM  solicitud   ",$conexPres);	while ($pacientes = mysql_fetch_array($resultados)) { $cantidad=$pacientes["cant"];  }?>






<table colspan="4" align="center"  style="float:right; border-color: red;   " >
		
				
				
				<tr>
					<td>Total de articulos:</td>
					<td style="color:red;"><?echo $cantidad;?></td>
					<td>Montos Total:</td>
					<td style="color:red;" ><?echo $total_precio;?></td>
					
				<tr>


</table>
 <form id="form2" name="form2" method="post" action="Producto_Vendidos.php">		
	<table colspan="4" align="center"  style="float:left; border-color: red;   " >
				<tr>   
					<td align="center" >
						 
						 <input name="boton2" type="HIDDEN" id="boton2" />
						 <input name="Regresas" type="button" id="Regresas" value="Regresar" onclick="regresas()"  />
						 
						
						 <input name="boton1" type="HIDDEN" id="boton1" />
						  <input name="modificar" type="image" id="modificar" value="Reporte" src="Imagen/iconos_tablas/impre.png" width="35" height="35" onClick="guardar1()" />
					</td>                                
				</tr>
	</table>			

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
