<?session_start();

echo  $cedula_s=$_SESSION["cedulaS"];	
echo $cod_socio=$_SESSION["cod_socio"];










?>


<table  border="0" cellpadding="0" cellspacing="0">
				
				<tr>
				  <td id="titulo1"  colspan="1" align="center" bgcolor="#FFFFFF" >Digitalización Cedula</td>
				</tr>

				<tr>
					<td colspan="4" align="center"  >
						<?  $cod_socio=$_SESSION["cod_socio"]; ?>
							  <form action="subir.php" method="POST" enctype="multipart/form-data">
								<label for="imagen">Seleccione Imagen:</label>
								<input type="file" name="imagen" id="imagen" />
								<input type="submit" name="subir" value="Subir"/>
							</form>
						
					</td>
				</tr>
	</table>