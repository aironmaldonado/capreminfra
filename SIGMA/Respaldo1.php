<?php




 if($_POST['boton1']=="entrar")
			{
			
			
				switch ($_POST['bd']) {
								case "administrador":
								echo "<script type='text/javascript'> document.location.href = ('Respaldo_administrador.php'); </script>";
						
								break;
								case "capreminfra":
								echo "<script type='text/javascript'> document.location.href = ('Respaldo_Capreminfra.php'); </script>";
						
								
								break;
								
								case "panel_herramienta":
							
								break;
								
								case "prestamos":
								
								break;
								
								case "productos":
								
								break;
								
								case "sigc":
								
								break;
								
								
							
						}
			
			
			
			
			
			
		
			
			
			
}




	
			
date_default_timezone_set("America/Caracas" ) ;
$hora = date('h:i a',time() - 3600*date('I'));




//backup_tables('127.0.0.1','root','1234','capreminfra');


/* backup the db OR just a table */
//En la variable $talbes puedes agregar las tablas especificas separadas por comas:
//profesor,estudiante,clase
//O déjalo con el asterisco '*' para que se respalde toda la base de datos

function backup_tables($host,$user,$pass,$name,$tables = '*')
{
   
   $link = mysql_connect($host,$user,$pass);
   mysql_select_db($name,$link);
   
   //get all of the tables
   if($tables == '*')
   {
      $tables = array();
      $result = mysql_query('SHOW TABLES');
      while($row = mysql_fetch_row($result))
      {
         $tables[] = $row[0];
      }
   }
   else
   {
      $tables = is_array($tables) ? $tables : explode(',',$tables);
   }
   
   //cycle through
   foreach($tables as $table)
   {
      $result = mysql_query('SELECT * FROM '.$table);
      $num_fields = mysql_num_fields($result);
      
      $return.= 'DROP TABLE '.$table.';';
      $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
      
    for ($i = 0; $i < $num_fields; $i++)
      {
         while($row = mysql_fetch_row($result))
         {
            $return.= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j<$num_fields; $j++) 
            {
               $row[$j] = addslashes($row[$j]);
               $row[$j] = ereg_replace("\n","\\n",$row[$j]);
               if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
               if ($j<($num_fields-1)) { $return.= ','; }
            }
            $return.= ");\n";
         }
      }
      $return.="\n\n\n";
   }
   
   //save file
   /* nelson aqui esta donde vas a colocar la ruta de la carpeta dentro de tu www ok 
   donde dice respaldo eso es una carpera */
   $handle = fopen('Base de Datos/Respaldo/'.'-'.date('d-m-Y').'.sql','w+');
   fwrite($handle,$return);
   fclose($handle);
}


?>




<script type="text/javascript">
function guardar(){

	 
	if(document.form1.bd.value.length==0){
		alert("Seleccione la base de datos a respaldar");
		document.form1.bd.focus();
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

  <form id="form1" name="form1" method="post" action="Respaldo1.php">
       
			<table  border="0" cellpadding="0" cellspacing="0">
				</br>
				<tr>
				  <td colspan="2" align="center" bgcolor="#FFFFFF">Respaldar bases de datos</td>
				</tr>
				 
				
				
				<tr>
						
						 
					<td>Bases Datos:</td>
						<td>
							<select name="bd" size="1" id="bd">
								<option value="">seleccione</option>
								<option value="administrador">administrador</option>
								<option value="capreminfra">capreminfra</option>
								<option value="panel_herramienta">panel_herramienta</option>
								<option value="prestamos">prestamos</option>
								<option value="productos">productos</option>
								<option value="sigc">sigc</option>
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