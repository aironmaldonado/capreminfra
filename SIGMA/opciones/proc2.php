<?php session_start();
include 'conexion1.php';

$r=$_POST['r'];
$con=conexion();
$_SESSION["municipio"]=$_POST['r'];
$res=mysql_query("select * from parroquia where cod_municipio=".$r."",$con);

?>

<select id="estado" name="parroquia" >

<option value="">Seleccione</option>
<?php while($fila=mysql_fetch_array($res)){ ?>
 <option value="<?php echo $fila['cod_parroquia']; ?>"><?php echo $fila['parroquia']; ?></option>
<?php } ?>

</select>

