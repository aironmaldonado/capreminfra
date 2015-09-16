<?php session_start();
$dbhost="localhost";
$dbname="capreminfra";
$dbuser="root";
$dbpass="1234";
$db = mysql_connect($dbhost,$dbuser,$dbpass);



if ($_GET[buscar]=="hijos")
{
	
	$_SESSION["idpadre"]=mysql_real_escape_string(intval($_GET[idpadre]));
	
	$consulta="SELECT cod_municipio as idhijo,municipio as hijo  FROM municipio WHERE cod_estado='".mysql_real_escape_string(intval($_GET["idpadre"]))."' order by hijo";
	mysql_select_db($dbname);
	$todos=mysql_query($consulta);
	
	// Comienzo a imprimir el select
	echo "<label></label><select name='idhijo' id='idhijo'>";
	echo "<option value=''>Selecciona un municipio...</option>";
	while($registro=mysql_fetch_array($todos))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		// Imprimo las opciones del select

		echo "<option value='".$registro["idhijo"]."'";
		if ($registro["idhijo"]==$valoractual) echo " selected";
		echo ">".utf8_encode($registro["hijo"])."</option>";
	
	}
	echo "</select>";
}

if ($_GET[buscar]=="nietos")

{
$_SESSION["idhijo"]=mysql_real_escape_string(intval($_GET[idhijo]));
	$consulta="SELECT cod_parroquia as idnieto,parroquia as nieto   FROM parroquia WHERE cod_municipio='".mysql_real_escape_string(intval($_GET[idhijo]))."' order by nieto";
	mysql_select_db($dbname);
	$todos=mysql_query($consulta);
	
	// Comienzo a imprimir el select
	echo "<label></label><select name='idnieto' id='idnieto'>";
	echo "<option value=''>Selecciona una parroquia...</option>";
	while($registro=mysql_fetch_array($todos))
	{
			$registro["idnieto"];
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		// Imprimo las opciones del select
		echo "<option value='".$registro["idnieto"]."'";
		if ($registro["idnieto"]==$valoractual) echo " selected";
		echo ">".utf8_encode($registro["nieto"])."</option>";
	$_SESSION["nieto"]=$registro["idnieto"];
	
	}
	echo "</select>";
}
?>