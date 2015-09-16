<? 


$link=mysql_connect("localhost","root","1234");
mysql_select_db("capreminfra",$link);
$consulta = mysql_query("SELECT
estado.estado,
estado.cod_estado
FROM
estado
INNER JOIN direccion ON estado.cod_estado = direccion.cod_estado
where direccion.cedula_d='$cedula'");
$row=mysql_fetch_row($consulta);

$consulta2=mysql_query("SELECT
municipio.municipio,
municipio.cod_municipio
FROM
estado
INNER JOIN direccion ON estado.cod_estado = direccion.cod_estado
INNER JOIN municipio ON municipio.cod_estado = estado.cod_estado
where direccion.cedula_d='$cedula'");
$row1=mysql_fetch_row($consulta2);
?>