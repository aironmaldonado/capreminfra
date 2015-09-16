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
document.form2.boton2.value="Regresas";
	

	document.location.href = ('inicio.php');
document.form2.href = ('inicio.php'); 
	
}





function guardar1(){

		window.open('Reportes/R_Seguimiento_Actualizar_Telefono.php','nuevaVentana','width=300, height=400')

}
</script>



<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div>








	 <table id="titulo2" class="titulo2" align="center" style="border:0px solid red;">
			 <tr>
				
				<form name="buscar" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
					<td id="titulo3" style="bacagrou:black;"  >
							Analista: 
								<select  name="analista"    id="analista" >
								  <option required value=""> </option>
								  <?require_once("opciones/conexion_panel_herramienta.php");
								  $buscar = mysql_query ("SELECT * FROM usuarios WHERE cod_departamento=1 ",$conex);?>
								  <?php while($vec1=mysql_fetch_row($buscar)){?>
								  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[2];  ?> </option>
								  <?php } ?>
								</select>
					</td>
					<td>
						Fecha:<input style="border:none;" name="date"  type="date"  size="10" maxlength="10" onKeyPress="return permite(event,'car')" >
					</td>
					<td>
					<input name="boton"  type="submit"   >
						
						 
					</td>
				</form>
			 </tr>
			 
		</table>
		
		
		<?
		 $analista=$_POST["analista"];	
		 $fec=$_POST["date"];	
		
		
		$_SESSION["analista"]=$_POST["analista"];	
		$_SESSION["date"]=$_POST["date"];	
		
		
		
		
		 $da= explode('-', $fec);   

		   $dia = $da[2]*1;  
		   $mes = $da[1]*1; 
		   $anio = $da[0];
		
		
		?>
<div style="width: 840px; height: 200px; overflow-y: scroll;">
<?if($_POST["analista"]){?>

<table align="center" width="600" border="1" cellspacing="0" cellpadding="1">
  <tr>
    <th scope="col">N°</th>
    <th scope="col">Nombre</th>
    <th scope="col">Fecha </th>
  </tr>	
  
  <?
  require_once("opciones/conexion_panel_herramienta.php");
		  $b7 = mysql_query ("SELECT * FROM  usuarios where cod_usuarios = $analista ",$conex); 
		  while ($v7=mysql_fetch_assoc($b7)){
		

require_once("opciones/conexion_administrador.php");	 
if($fec){

$b6 = mysql_query ("SELECT * 
FROM actualizacion
WHERE cod_usuario =  '$analista'
AND dia =  '$dia'
AND mes =  '$mes'
AND aaaa =  '$anio'  ",$conexadmi); 

//$b6 = mysql_query ("SELECT * FROM actualizacion  where cod_usuario='$analista' and dia='$dia' and mes='$mes' and aaaa='$anio'   ",$conexadmi); 

} else{
$b6 = mysql_query ("SELECT * FROM actualizacion  where cod_usuario='$analista' ",$conexadmi);
}

				while ($v6=mysql_fetch_assoc($b6)){	?>
	
	
	
	<tr>
			
	<td><?echo  $i=$i+1; ?></td>
			
							
	<td><? echo $nom = $v7['nombres'];  echo $ape=$v7['apellidos'];?></td>	
	<td><? echo $cantidad = $v6['fecha'];?></td>	
	
	
	
	</tr>			
  <? } }?> 
  
  
	  <tr>
		
						<?require_once("opciones/conexion_administrador.php");	 $b6 = mysql_query ("SELECT count(cod_usuario) as actualizado FROM actualizacion  where cod_usuario='$analista' ",$conexadmi); 
								while ($v6=mysql_fetch_assoc($b6)){	?>
		<td colspan="3" align="center" >Total: <? echo $cantidad = $v6['actualizado'];}	?> Registros Actualizado. </td>
	  </tr>	
</table>
	
<?}?>	
</div>	
	
	
	
	
<div  align="center" style="width: 840px; ">	
	<form id="form2" name="form2" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">		
	<table colspan="4" align="center"  style="float:right; border-color: red;   " >
				<tr>   
					<td align="center" >
						 
						 <input name="boton2" type="HIDDEN" id="boton2" />
						 <input name="Regresas" type="button" id="Regresas" value="Regresar" onclick="regresas()"  />
						
						
						<?if($_POST["analista"]){?> 
						
						 <input name="boton1" type="HIDDEN" id="boton1" />
						  <input name="modificar" type="image" id="modificar" value="Reporte" src="Imagen/iconos_tablas/impre.png" width="35" height="35" onClick="guardar1()" />
					<?}?>
					</td>                                
				</tr>
	</table>			

</form>
	
</div>		
	
	
	
	
<!--
<table width="400" border="1" cellspacing="0" cellpadding="1">
  <tr>
    <th scope="col">N°</th>
    <th scope="col">Nombre</th>
    <th scope="col">Nro Registro Act</th>
  </tr>
  

  
  
  
  
 
			
			<?
		require_once("opciones/conexion_panel_herramienta.php");
		  $b7 = mysql_query ("SELECT * FROM roles_usuarios as ru inner join usuarios as  usu on(ru.cod_usuarios=usu.cod_usuarios) where 'usuarios'.'cod_usuarios' = $analista ",$conex); 
		  while ($v7=mysql_fetch_assoc($b7)){
		  
		  /*$b8 = mysql_query ("SELECT * FROM usuarios  where cod_usuarios='$cod_usuarios' ",$conex); 
		  require_once("opciones/conexion_administrador.php");	
		$b6 = mysql_query ("SELECT count(cod_usuario) as actualizado FROM actualizacion  where cod_usuario='$cod_usuarios' ",$conexadmi); 
				*/
		   ?> 
<tr>
			
	<td><?echo  $cod=$v7['cod_usuarios']; ?></td>
			
							
	<td><? echo $nom = $v7['nombres'];  echo $ape=$v7['apellidos'];?></td>		
	
				<?require_once("opciones/conexion_administrador.php");	 $b6 = mysql_query ("SELECT count(cod_usuario) as actualizado FROM actualizacion  where cod_usuario='$cod' ",$conexadmi); 
				while ($v6=mysql_fetch_assoc($b6)){	?>
	<td><? echo $cantidad = $v6['actualizado'];}	?></td>	
</tr>			
  <? }?> 
  
</table>

-->













</div>
</div>
</div>
<?include ("menu.php");?>
</div>


<div style="margin-left:-8px; ">
<marquee  style="position: absolute; text-align: center; width: 100%; bottom: 0px; width: 100%;color:#FFFFFF; " behavior="scroll" direction="left" bgcolor="#000000"  onmouseover="this.stop()" onMouseOut="this.start()" scrollamount="4"> <?echo 	("Bienvenido: "), $usunom,(" "), $usuapel,(" al Sistema de Información Gerencial para el Manejo de Ahorros (S.I.G.M.A.). Usted ingreso con el usuario: "),$usuusu ,(" desde el Equipo: "),$nombre_pc, (" con fecha y hora: "), $fecha,(" "),$hora; ?>  </marquee>
</div>



</body>
</html>
