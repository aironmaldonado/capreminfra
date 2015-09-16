<?php session_start();
include 'conexion1.php';

$q=$_POST['q'];
$con=conexion();
$_SESSION["estado"]=$_POST['q'];
$res=mysql_query("select * from municipio where cod_estado=".$q."",$con);

?>

<select id="pais" name="municipio" onchange="myFunction2(this.value)"><!--cuando seleccionan un pais se ejecuta la funcion myFunction2() ubicada en el archivo index.php-->

<option value="">Seleccione</option>
<?php while($fila=mysql_fetch_array($res)){ ?>
 <option value="<?php echo $fila['cod_municipio']; ?>"><?php echo $fila['municipio']; ?></option>
<?php } ?>

</select>

