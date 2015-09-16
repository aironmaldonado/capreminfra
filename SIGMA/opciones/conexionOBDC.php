<? 
$dsn = "FOX"; 
//debe ser de sistema no de usuario
$usuario = "";
$clave="";

//realizamos la conexion mediante odbc
$conexion=odbc_connect($dsn, $usuario, $clave);

if (!$conexion){
	exit("<strong>Ya ocurrido un error tratando de conectarse con el origen de datos.</strong>");
}	
/*
// consulta SQL a nuestra tabla "usuarios" que se encuentra en la 0001159430 base de datos "db.mdb"
$sql="Select * from analedo where ctaauxi='0006198945' ";

// generamos la tabla mediante odbc_result_all(); utilizando borde 1
$result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
print odbc_result_all($result,"border=1");


*/



?>