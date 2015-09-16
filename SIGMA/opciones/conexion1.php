<?php

function conexion(){

 $con = mysql_connect("localhost","root","1234");

 if (!$con){

  die('Could not connect: ' . mysql_error());
 }

 mysql_select_db("capreminfra", $con);

 return($con);

}

?>