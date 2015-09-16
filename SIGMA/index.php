<?session_start();
	//require_once("opciones/conexion.php");
	//include("opciones/seguridad.php");
	//$_SESSION["nombres_apellidos"];
	//$nivel=$_SESSION["tipo_usu"];
	include("opciones/exit_session.php");
	?>
	
	<link href="Imagen/fondo/SIGMA.ico" type="image/x-icon" rel="shortcut icon" />
	 <meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
	<!--------------quitar el escrol ----------------->
			<style type="text/css">  body {overflow-y:hidden; overflow-x:hidden }</style>


	<?
if($_POST['boton1']=="logueo")
			{
				
				include("opciones/conexion_panel_herramienta.php");
				include("opciones/funciones_consultas.php");
					//$usu = $obj->escapaSQL($_POST["usuario"]);
					//$cla = $obj->escapaSQL($_POST["clave"]);
				$usu=$_POST["usuario"];
				$cla=$_POST["clave"];
				//echo $usu,$cla;
				
				
				
				
				
					$bus = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usu' AND clave = md5('$cla') and status=('activo') ");
				if(mysql_num_rows($bus) > 0)
				{
					$vec = mysql_fetch_row($bus);
					$_SESSION["usuid"] = $vec[0];
					$_SESSION["usuced"] = $vec[1];
					$_SESSION["usunom"] = $vec[2];
					$_SESSION["usuapel"] = $vec[3];
					$_SESSION["usuusu"] = $vec[5];
					$_SESSION["usuclave"] = $vec[6];
					$_SESSION["usustatus"] = $vec[7];
					$nombre_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
					$_SESSION["nombre_pc"]=$nombre_host;
					
				
					date_default_timezone_set("America/Caracas" ) ;
					$hora = date('h:i a',time() - 3600*date('I'));
					//print "&nbsp;$hora&nbsp;";
					$_SESSION["hora"] = $hora;
					
					date_default_timezone_set("America/Caracas" ) ; 
					$fecha_actual = date('d-m-Y',time() - 3600*date('I')); 
					$_SESSION["fecha"] = $fecha_actual;
					
					
					
					echo "<script type='text/javascript'> document.location.href = 'inicio.php'; </script>";
				}else{
						echo "<script type='text/javascript'> alert('Acceso Deneado '); document.location.href = 'index.php'; </script>";
					}

			
								

			}


?>
<html>


<head>
			
              	
				<link rel="stylesheet" href="CSS/index1.css" type="text/css" />
				<script type="text/javascript" src="JavaScript/index.js"></script>
			
			
</head>

<body>

 
	

		
			<div class="div_logueo">
			
				<div style="" >
				
				
					<form id="form1" name="form1" method="post" action="index.php">
						<table BORDER="0px " style="border-color:WHITE; " align="center">
							
								<tr>
									<TH COLSPAN="3" ALIGN="center"  class="titulo" > INGRESE AL SISTEMA  </TH>
								</tr>
							
							
							
							
								<tr>
									<td >Usuario:</td>
									<td ALIGN="center"><input size="11" placeholder="" type="text" value="" name="usuario" id="usuario"  /></td>
								</tr>
							
							
							
								<tr></BR>
									<td >Clave:</td>
									<td ALIGN="center"><input size="11" placeholder=""  type="password" value="" name="clave" id="clave" /></td>
								</tr>
					
							
								<tr>
									<td COLSPAN="3" ALIGN="center">
										<input name="boton1" type="HIDDEN" id="boton1" />
										<input name="logueo" type="button" id="logueo" value="INGRESAR" onclick="ingresar()" /></a>
									</td>
								</tr>
						
							
						</table>
					</form>
				</div>
			</div>
			
	
	    



</body>
</html>
