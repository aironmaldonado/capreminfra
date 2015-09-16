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


<script type="text/javascript">
function guardar(){

	 
	if(document.form1.nombre.value.length==0){
		alert("Defina nombre");
		document.form1.nombre.focus();
	}else if(document.form1.rif.value.length==0){
		alert("Defina RIF.");
		document.form1.rif.focus();
	}
	else if(document.form1.rif.value.length==0){
		alert("Defina RIF.");
		document.form1.rif.focus();
	}
	else if(document.form1.cuenta.value.length==0){
		alert("Defina N° Cuenta.");
		document.form1.cuenta.focus();
	}
	
		else if(document.form1.dir.value.length==0){
		alert("Defina Direccion.");
		document.form1.dir.focus();
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
<?


 if($_POST['boton1']=="entrar")
			{
			$nombre=$_POST["nombre"];
			$rif=$_POST["rif"];
				$cuenta=$_POST["cuenta"];
			$dir=$_POST["dir"];
			
			
include("opciones/conexion_prestamo.php"); 
$b = mysql_query ("INSERT INTO  proveedor (
`cod_proveedor` ,
`nombre_proveedor` ,
`nom_rif` ,
`direccion` ,
`rif` ,
`num_cuenta` ,
`cod_estado`,
`status`
)
VALUES (
NULL ,  '$nombre','$nombre-$rif',  '$dir',  '$rif',  '$cuenta',  'null',  '1'
); ",$conexPres); 



if($b)
	{
echo "<script type='text/javascript'> alert('Cargado correctamente ');  document.location.href = ('Administrador_Proveedores.php'); </script>";
	
	}
else 
	{
	echo "<script type='text/javascript'> alert('Se produjo un error carga del proveedor'); document.location.href = ('inicio.php'); </script>";
	}




/*
while ($v=mysql_fetch_assoc($b))	
{
 $cod_socio=$v['cod_socio'];  
  $cedula=$v['cedula'];  
}
*/




}

?>
<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div>






<form id="form" name="form" method="post" action="Administrador_Proveedores.php">
<table width="200" border="1">
  <tr>
    <th colspan="2" scope="col">Consultar Proveedor</th>
  </tr>
  <tr>
    <td><input name="r"  type="text" title="Ej.: J000701474 / G000701474 " onKeyPress="return permite(event,'rif')" onChange="submit()"> </td>
  </tr>
 </table> 
 </form>
 
 
<?



if($_POST['r']){

$r=$_POST['r'];


include("opciones/conexion_prestamo.php"); 
		

		$buscar = mysql_query ("SELECT * FROM  proveedor   WHERE rif LIKE  '%$r%'    ",$conexPres);
				    while($vec1=mysql_fetch_assoc($buscar))
							{
						$n=$vec1["nombre_proveedor"];
						$d=$vec1["direccion"];
						$rif_actual=$vec1["rif"];
						$nc=$vec1["num_cuenta"];
						$status=$vec1["status"];
                        
                        
     }                   
		switch ($status) {
    case 0:
        $s="inactivo";
		  break;
    case 1:
         $s="Activo";
		  break;
	default:
        $s="No actualizado";
 
}		


}?>
 
 
 

   
<form id="form1" name="form1" method="post" action="Administrador_Proveedores.php">
 <table width="200" border="1">
  <tr>
    <th colspan="2" scope="col">Administrador de Tabla Proveedor</th>
    
  </tr>
  <tr>
    <th scope="row">Nombre Proveedor</th>
    <td><input name="nombre"  type="text" title="Ej.: CAPREMINFRA C.A." maxlength="50"  size="50px" value="<? echo $n; ?>"> </td>
  </tr>
  <tr>
    <th scope="row">RIF/NIT</th>
    <td><input type="text" name="rif" title="Ej.: J000701474" maxlength="10" onKeyPress="return permite(event,'rif')" value="<? echo $rif_actual; ?>" > </td>
  </tr>
  <tr>
    <th scope="row">N° Cuenta 1</th>
    <td><input type="text" name="cuenta" title="Ej.:01340025012579681356" maxlength="20" onKeyPress="return permite(event,'num')" value="<? echo $nc; ?>" ></td>
  </tr>
   <tr>
    <th scope="row">N° Cuenta 2</th>
    <td><input type="text" name="cuenta2" title="Ej.:01340025012579681356" maxlength="20" onKeyPress="return permite(event,'num')" value="<? echo $nc2; ?>" ></td>
  </tr>
   <tr>
    <th scope="row">N° Cuenta 3</th>
    <td><input type="text" name="cuenta3" title="Ej.:01340025012579681356" maxlength="20" onKeyPress="return permite(event,'num')" value="<? echo $nc3; ?>" ></td>
  </tr>
  <tr>
    <th scope="row">Dirección</th>
    <td><textarea name="dir"><? echo $d; ?> </textarea> </td>
  </tr>
		<?if($rif_actual){?>
  <tr>
    <th scope="row">Estatus</th>
    <td> <input type="text"  title="Ej.:01340025012579681356" maxlength="20" onKeyPress="return permite(event,'num')" value="<? echo $s; ?>"  >    </td>
  </tr>  
        
        <?}?>
        
        
        <tr>   
					<td colspan=2 align="center" >
					
						 <input name="boton1" type="HIDDEN" id="boton1" />
						 <input name="modificar" type="button" id="modificar" value="Guardar" onClick="guardar()" />
						 
						 <input name="boton2" type="HIDDEN" id="boton2" />
						 <input name="Regresas" type="button" id="Regresas" value="Regresas" onClick="regresas()" />
						 
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
<marquee  style="position: absolute; text-align: center; width: 100%; bottom: 0px; width: 100%;color:#FFFFFF; " behavior="scroll" direction="left" bgcolor="#000000"  onmouseover="this.stop()" onMouseOut="this.start()" scrollamount="4"> <?echo 	("Bienvenido: "), $usunom,(" "), $usuapel,(" al Sistema de Información Gerencial para el Manejo de Ahorros (S.I.G.M.A.). Usted ingreso con el usuario: "),$usuusu ,(" desde el Equipo: "),$nombre_pc, (" con fecha y hora: "), $fecha,(" "),$hora; ?>  </marquee>
</div>



</body>
</html>
