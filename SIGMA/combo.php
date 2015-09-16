
<? 

$link=mysql_connect("localhost","root","1234");
mysql_select_db("capreminfra",$link);
$consulta = mysql_query("SELECT
estado.estado,
estado.cod_estado
FROM
estado
INNER JOIN direccion ON estado.cod_estado = direccion.cod_estado
where direccion.cedula_d='$cedulaS'");
$row=mysql_fetch_row($consulta);

$consulta2=mysql_query("SELECT
municipio.municipio,
municipio.cod_municipio
FROM
estado
INNER JOIN direccion ON estado.cod_estado = direccion.cod_estado
INNER JOIN municipio ON municipio.cod_estado = estado.cod_estado
where direccion.cedula_d='$cedulaS'");
$row1=mysql_fetch_row($consulta2);

$consulta3=mysql_query("SELECT
parroquia.cod_parroquia,
parroquia.parroquia
FROM
estado
INNER JOIN direccion ON estado.cod_estado = direccion.cod_estado
INNER JOIN municipio ON municipio.cod_estado = estado.cod_estado
INNER JOIN parroquia ON parroquia.cod_municipio = municipio.cod_municipio
where direccion.cedula_d='$cedulaS'");
$row2=mysql_fetch_row($consulta3);

$consulta4=mysql_query("SELECT
vivienda.cod_vivienda,
vivienda.tipo_vivienda
FROM
vivienda
INNER JOIN direccion ON vivienda.cod_vivienda = direccion.cod_vivienda
WHERE direccion.cedula_d='$cedulaS'");
$row3=mysql_fetch_row($consulta4);


?>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	cargar_paises();
	$("#pais").change(function(){dependencia_estado();});
	$("#estado").change(function(){dependencia_ciudad();});
	$("#estado").attr("disabled",false);
	$("#ciudad").attr("disabled",false);
});

function cargar_paises()
{
	$.get("scripts/cargar-paises.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#pais').append(resultado);			
		}
	});	
}
function dependencia_estado()
{
	var code = $("#pais").val();
	$.get("scripts/dependencia-estado.php", { code: code },
		function(resultado)
		{
				$("#estado").attr("disabled",false);
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
			
				document.getElementById("estado").options.length=1;
				$('#estado').append(resultado);			
			}
		}

	);
}

function dependencia_ciudad()
{
	var code2 = $("#estado").val();
	$.get("scripts/dependencia-ciudades.php?", { code2: code2 }, function(resultado){
		$("#ciudad").attr("disabled",false);
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			
			document.getElementById("ciudad").options.length=1;
			$('#ciudad').append(resultado);			
		}
	});	
	
}


</script>
<style type="text/css">
dt{font-size:200%;}
dd{font-size:150%;}
</style>
	<tr>
	<td>Estado:</td>
    <td>
        <select id="pais" name="pais"  >
            <option value=<? echo $row[1]?>><? echo $row[0] ?></option>
        </select>
    </td>

	<td>Municipio:</td>
    <td>
        <select id="estado" name="estado"  >
            <option value=<? echo $row1[1]?>><? echo $row1[0] ?></option>
        </select>
    </td>
</tr>
<tr>
	<td>Parroquia:</td>
    <td>
        <select id="ciudad" name="ciudad">
            <option value=<? echo $row2[0]?>><? echo $row2[1]?></option>
        </select>
    </td>


