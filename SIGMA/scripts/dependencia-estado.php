
<script>
document.form1.ciudad.disabled=true;
document.form1.estado.options[0] = null;

</script>
<?php
/*ESTADO CAMBIA A MUNICIPIO*/
include("clases/class.mysql.php");
include("clases/class.combos.php");
$estados = new selects();
$estados->code = $_GET["code"];
$estados = $estados->cargarEstados();
	echo "<option value=''>Seleccione un municipio</option>";
foreach($estados as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>