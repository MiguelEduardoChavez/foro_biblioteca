<?php 
	require("lib/database.php");
	connect_db();
	session_start();
	
   
  $sql = "DELETE FROM `libro` WHERE idLibro = ".$_REQUEST["idLibro"]; 
  $myclave = mysql_query($sql); 
  echo mysql_error();
  
   header("Location: adminLibros.php");
	   
?>