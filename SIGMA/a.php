<?


$servidor="127.0.0.1";
$usuario="root";
$clave="1234";
$db_nombre="prestamo";


$conex=@mysql_connect($servidor,$usuario,$clave) or die(mysql_error());
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








include("opciones/conexion_prestamo.php");
				
				
				
				
				
				
				
				$buscar = mysql_query ("SELECT * FROM  `tipo_prestamos`   ",$conex);
				while($vec1=mysql_fetch_assoc($buscar)){ 
				
				echo $banco=$vec1['tipo_prestamo'];		
			
				}

?>