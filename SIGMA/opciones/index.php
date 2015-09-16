

<table>
				<tr>
					<td>Estado Civil (actual):</td>
					<td> 
											  <select  name="est_civil"  id="est_civil">
											  <option required value="<?php echo $meses; ?>"> <?php echo $meses;  ?> </option>;
											  <?include("conexion.php"); $buscar = mysql_query ("SELECT * FROM `estado`; ",$conex);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
											  <?php } ?>
											  </select>	
					</td>
				</tr>
				
				<tr>
					<td>Estado Civil (actual):</td>
					<td> 
											  <select  name="est_civil"  id="est_civil">
											  <option required value="<?php echo $meses; ?>"> <?php echo $meses;  ?> </option>;
											  <?include("conexion.php"); $buscar = mysql_query ("SELECT * FROM `municipio`; ",$conex);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[1];  ?> </option>;
											  <?php } ?>
											  </select>	
					</td>
				</tr>
				
				<tr>
					<td>Estado Civil (actual):</td>
					<td> 
											  <select  name="est_civil"  id="est_civil">
											  <option required value="<?php echo $meses; ?>"> <?php echo $meses;  ?> </option>;
											  <?include("conexion.php"); $buscar = mysql_query ("SELECT * FROM `parroquia`; ",$conex);?>
											  <?php while($vec1=mysql_fetch_row($buscar)){?>
											  <option required value="<?php echo $vec1[0];?>"> <?php echo $vec1[2];  ?> </option>;
											  <?php } ?>
											  </select>	
					</td>
				</tr>
</table>