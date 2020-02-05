<?php 
	require("lib/database.php");
	connect_db();
	session_start();
	
   
	   $sql = "DELETE FROM `comentario` WHERE idComentario = ".$_REQUEST["idComentario"]; 
  $myclave = mysql_query($sql); 
  echo mysql_error();
  
   header("Location: adminComentarios.php");
	   
?>