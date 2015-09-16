<?php session_start();

		require_once("opciones/conexion.php");
		
					 $cedula_socio='21535615';	
					 $cod_socio="28868";
				
	date_default_timezone_set("America/Caracas" ) ; 
	$fecha_actual = date('d-m-Y',time() - 3600*date('I'));
	
	
	

	$b = mysql_query ("SELECT * FROM socios  where cod_socio='$cod_socio';  ",$conex);
						while($v=mysql_fetch_assoc($b))
								{	$ced_socio=$v['cedula'];  $_SESSION["cedulaS"]=$v['cedula']; }	
				
				
				
//conexion a la base de datos
mysql_connect("127.0.0.1", "root", "1234") or die(mysql_error()) ;
mysql_select_db("capreminfra") or die(mysql_error()) ;
$t=$_FILES["imagen"];
//comprobamos si ha ocurrido un error.
if ($_FILES["imagen"]["error"] > 0){
	echo "ha ocurrido un error";
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 1000;
	
	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "archivo/" . $_FILES['imagen']['name'];
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){
				$nombre = $_FILES['imagen']['name'];
				@mysql_query("INSERT INTO imagenes (`id_imagenes` ,`imagen` ,`cod_socio`,`cedula_i`) VALUES (NULL , '$nombre', '$cod_socio','$ced_socio')") ;
				?><script type="text/javascript">				
				window.open("reportes/r_socio.php","mywindow","location=1,status=1,scrollbars=1,width=100,height=100");
				</SCRIPT>
				<?
				echo "<script type='text/javascript'> alert('el archivo ha sido movido exitosamente.');document.location.href = ('inicio.php'); </script>";
								
			} else {
				echo "ocurrio un error al mover el archivo.";
			}
		} else {
			echo $_FILES['imagen']['name'] . ", este archivo existe";
		}
	} else {
		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}

?>