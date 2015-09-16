<script>
document.form1.ciudad.options[0] = null;
</script>
<?php
/*MUNICIPIO CAMBIA A PARROQUIA*/
include("clases/class.mysql.php");
include("clases/class.combos.php");
$ciudades = new selects();
$ciudades->code2 = $_GET["code2"];
$ciudades = $ciudades->cargarCiudades();
	echo "<option value=''>Seleccione una parroquia</option>";
foreach($ciudades as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>