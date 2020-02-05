<?php 
	require("lib/database.php");
	connect_db();
	session_start();
	
   
	   $sql = "DELETE FROM `gusta` WHERE idUsuario = ".$_SESSION["idusuario"]." and idLibro = ".$_REQUEST["idLibro"]; 
  		$myclave = mysql_query($sql); 
		
		
   header("Location: lecturaAutentificado.php?idLibro=".$_REQUEST["idLibro"]);	   
?>