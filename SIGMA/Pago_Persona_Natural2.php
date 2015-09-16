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
	
	
	/*echo $p=$_SESSION["a1"];
	echo $f=$_SESSION["a2"];
	echo $d=$_SESSION["a3"]-1;
	echo $h=$_SESSION["a4"]+1;
	
	*/
	
	$c=$_SESSION["a1"];
	$f=$_SESSION["a2"];
	$s=$_SESSION["a3"];
	
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


	function Actualizar(){
document.form1.boton3.value="actualizar";
document.form1.submit(); 
	
}	

</script>


<script type="text/javascript">
function guardar(){

	 
	if(document.form1.fecha.value.length==0){
		alert("Defina Fecha");
		document.form1.fecha.focus();
	}
	else if(document.form1.proveedor.value.length==0){
		alert("Defina Tipo proveedor");
		document.form1.proveedor.focus();
	}
			
	else{
		document.form1.boton1.value="entrar";
		document.form1.submit();  
	}
}





	

</script>



<div class="panel"  >
<div  class="panel2"   > 
<div class="panel3" style=" margin:0px 100px;" >
<div>

      

<div align="center" style=" border:0px solid blue; width:500px; height:300px;  overflow-x:hidden; overflow-y:scroll; ">
<?		
		
		if($f) {
		
		
			
			
			
		$f_nacimiento = explode("-",$f);
				$aaaaN=$f_nacimiento[0]; // porción1
				$mmN=$f_nacimiento[1]; // porción2
				$ddN=$f_nacimiento[2];
		
		
		
			
			
			
		
			
			$dsn = "FOX"; 
			$usuario = "";
			$clave="";

			//realizamos la conexion mediante odbc
			$cid=odbc_connect($dsn, $usuario, $clave);
		
			/*if (!$cid){
				exit("<strong>Ya ocurrido un error tratando de conectarse con el origen de datos.</strong>");
			}*/	

			//$sql="Select * from cheques where bene LIKE  '%$pro%' and fecha = CTOD('$mmN/$ddN/$aaaaN')";
			$sql="Select * from cheques where  solicitud='$s' and fecha = CTOD('$mmN/$ddN/$aaaaN')";
			
			$rs1=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
				
				?>
				<table >
					</br>
						<tr>
						  <td id="titulo2" colspan="6" align="center">Solicitud Pago de Proveedor</td>
						</tr>
						
						
						<tr>
						  <td id="titulo1" colspan="6" align="center">Fechar:<?echo $fecha=odbc_result($rs1,"fecha"); ?> Proveedor: <?echo $proveedor=odbc_result($rs1,"bene"); ?></td>
						  
						</tr>
						
						
						<tr>
						<td  id="titulo3"  colspan="1" align="center">N°</td>
						<td  id="titulo3"   colspan="1" align="center">solicitud</td>
						<td  id="titulo3"  colspan="1" align="center">Tipo</td>
						<td  id="titulo3" colspan="1" align="center">Monto</td>
						<td  id="titulo3" colspan="1" align="center">Emitido</td>
						</tr>
		
				<?
				
				
		
			$f = explode("-",$f);
			$a=$f[0]; // porción1
			$m=$f[1]; // porción2
			$d=$f[2];
			
			
			
			include("opciones/conexion_prestamo.php");
				$buscar = mysql_query ("SELECT * FROM cheques  where solicitud='$s'  ",$conexPres);
				while($vec1=mysql_fetch_assoc($buscar)){ 
				$solicitud=$vec1['solicitud'];	
				
				
				
			
				$conexion = odbc_connect("FOX","","","");
				//$sql="Select * from cheques where bene LIKE  '%$p%' and fecha = CTOD('$m/$d/$a') ";
				$sql="Select * from cheques where  solicitud='$s'";
				
				
			$result=odbc_exec($conexion,$sql)or die(exit("Error en odbc_exec"));
		
			
			
			
						while (odbc_fetch_row($result)) {
						?><tr><?
						?><td align="center" ><? ECHO $q=$q+1;?></td><?
						?><td align="center" ><?echo $fiador=odbc_result($result,"solicitud"); ?></td><?
						?><td align="center" ><?echo $monto=odbc_result($result,"concepto1");  ?></td><?
						?><td align="right" ><?echo $monto=odbc_result($result,"cheque"); 		?></td><?
						?><td align="right" ><?echo $emitido=odbc_result($result,"emitido"); 		?></td><?
						?></tr><?
						$total=$monto+$total;
					}}
					?>
					
					<tr>
						<td align="center" ></td>
						<td align="center" ></td>
						<td align="center" ></td>
						<td id="titulo2"  align="center" >Total</td>
						<td id="titulo3"  align="right" ><?echo $total; ?></td>
						<td align="center" ></td>
						</tr>
					

<?  
	include("opciones/conexion.php"); 

			$b = mysql_query ("SELECT * FROM socios where cedula= '$c' ",$conex); while ($v=mysql_fetch_assoc($b))	
			{   $cedula=$v['cedula'];  
				$proveedor=$v['nom_ape']; 
		}
		
		
		
		/*
		
$b = mysql_query ("SELECT * FROM socios where cedula= '$c' ",$conex); while ($v=mysql_fetch_assoc($b))	
			{   
				$cedula=$v['cedula']; 
				echo $proveedor=$v['nom_ape']; 
				$n=$v['nacionalidad']; 
				$n_cuenta=$v['N_cuenta']; 
				$c=("$n$cedula");

			}
			*/
			
			
			

				
				
include("opciones/conexion_prestamo.php");
$buscar = mysql_query ("TRUNCATE TABLE  `cheques` ",$conexPres);
//               KEVES VISION, C.A12012015.txt
//Pago Proveedor/KEVES VISION, C.A12012015.txt
//Pago Proveedor/KEVES VISION, C.A12012015.txt
				$name12="Pago Proveedor/$proveedor$d$m$a.txt"; 
				$name13="$proveedor$d$m$a.txt"; 
				?>
</div>
<div align="center" style=" border:0px solid blue; width:500px; " >
				</table>
				<table >
				<tr>
				<td align="center" > 
					<!--<a href="Pago Proveedor/KEVES VISION, C.A12012015.txt" download="<?echo $name12; ?>"> <input type="button" value="Reporte .TXT" />  </a>-->
					
					<a href="<?echo $name12;?>" download="<?echo $name13; ?>"> <input type="button" value="Reporte .TXT" />  </a>
				</td>
				</tr>
				</table>
				<?}?>
				
</div>	
		
			
				
		
		
		
		
		

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
