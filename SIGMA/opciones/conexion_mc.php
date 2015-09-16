<?
$servidor="127.0.0.1";
$usuario="root";
$clave="1234";
$db_nombre="memoria_cuenta";


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
//echo $conex;


/*
	date_default_timezone_set("America/Caracas" ) ; 
				$fecha_actual = date('d-m-Y',time() - 3600*date('I')); 
echo $fecha_actual;
	*/			?>