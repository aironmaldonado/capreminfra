<?
$servidor="127.0.0.1";
$usuario="root";
$clave="1234";
$db_nombre="prestamos";


$conexPres=@mysql_connect($servidor,$usuario,$clave) or die(mysql_error());
@mysql_select_db($db_nombre,$conexPres) or die(mysql_error()); 

if (!$conexPres){
echo 'error al conectar';
die;
}
$bd = mysql_select_db($db_nombre,$conexPres);
if (!$bd){
echo 'error al seleccionar la base d datos';
die;
}
mysql_query ("SET NAMES 'utf8'");









/*

$servidor="127.0.0.1";
$usuario="root";
$clave="1234";
$db_nombre="estado_cuenta";


$conexSC=@mysql_connect($servidor,$usuario,$clave) or die(mysql_error());
@mysql_select_db($db_nombre,$conexSC) or die(mysql_error()); 

if (!$conexSC){
echo 'error al conectar';
die;
}
$bd = mysql_select_db($db_nombre,$conexSC);
if (!$bd){
echo 'error al seleccionar la base d datos';
die;
}
mysql_query ("SET NAMES 'utf8'");	

*/

?>