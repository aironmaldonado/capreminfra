<?session_start();?>
  <script type="text/javascript">
function guardar(){

	 
	if(document.form1.cedula.value.length==0){
		alert("Defina Numero de Cedula");
		document.form1.cedula.focus();
	}
	else if(document.form1.reporte.value.length==0){
		alert("Defina Tipo reporte");
		document.form1.reporte.focus();
	}
			
	else{
		document.form1.boton1.value="entrar";
		document.form1.submit();  
	}
}


	function regresas(){
document.form1.boton2.value="Regresas";
	

	document.location.href = ('inicio.php');
document.form1.href = ('inicio.php'); 
	
}	

</script>
<?
 if($_POST['boton1']=="entrar")
			{
			 $_SESSION["cedulaS"]=$_POST["cedula"];
			$reporte=$_POST["reporte"];
	

	

	switch ($reporte) {
		case "HIPOTECARIO":
			echo "<script type='text/javascript'>document.location.href = ('R_Hipotecario.php'); </script>";
			//echo "HIPOTECARIO";
			break;
		case "VEHICULO":
			echo "<script type='text/javascript'>document.location.href = ('R_Vehiculo.php'); </script>";
			//echo "VEHICULO";
			break;
		case "PRODUCTOS":
			echo "<script type='text/javascript'>document.location.href = ('R_Productos_N.php'); </script>";
			//echo "VEHICULO";
			break;	
			
			
			
		default:
				echo "<script type='text/javascript'>document.location.href = ('Solicitud_Prestamos2.php'); </script>";
		
   				}
			







		
			
}


?>




  <form id="form1" name="form1" method="post" action="reporte_perdidos.php">
       
			<table  border="0" cellpadding="0" cellspacing="0">
				</br>
				<tr>
				  <td colspan="2" align="center" bgcolor="#FFFFFF">Solicitud de Préstamo o Crédito </td>
				</tr>
				 
				
				
				<tr>
						
						 
					<td>Cedula:</td>
						<td>
							<input name="cedula"  type="text" id="cedula" size="19" maxlength="10" onKeyPress="return permite(event,'num')">
						</td>
				</tr>
				<tr>
					<td>Solicitud:</td>
							<td>
							<select name="reporte" size="1" id="reporte">
								<option value=""></option>
								<option value="PERSONAL">PERSONAL</option>
								<option value="SUMINISTRO">SUMINISTRO</option>
								<option value="UTILES ESCOLARES">UTILES ESCOLARES</option>
								<option value="PROVEEDURIA">PROVEEDURIA</option>
								<option value="HIPOTECARIO">HIPOTECARIO</option>
								<option value="VEHICULO">VEHICULO</option>
								<option value="PRODUCTOS">PRODUCTOS NAVIDEÑOS</option>
							 </select>
							 </td>
            
				</tr>
				
				
				
				<tr>   
					<td colspan=4 align="center" >
						 <input name="boton1" type="HIDDEN" id="boton1" />
						 <input name="modificar" type="button" id="modificar" value="Siguiente" onClick="guardar()" />
						 
						 <input name="boton2" type="HIDDEN" id="boton2" />
						 <input name="Regresas" type="button" id="Regresas" value="Regresas" onclick="regresas()" />
					</td>                                
				</tr>
			</table>
        </form>