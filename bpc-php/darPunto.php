<?php 
	require("lib/database.php");
	connect_db();
	session_start();
	
   
	   $sql = "SELECT * FROM `gusta` WHERE idLibro = ".$_REQUEST["idLibro"]." and idUsuario = ".$_SESSION["idusuario"]; 
  $myclave = mysql_query($sql); 
  $resultado = mysql_num_rows($myclave);
  
  
  //Si el usuario y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo. 
  if($resultado == 0)
  { 
  	$insertar = "INSERT INTO `gusta`(`idLibro`, `idUsuario`) VALUES (".$_REQUEST["idLibro"].", ".$_SESSION["idusuario"]." )";
	$ejecutar = mysql_query($insertar); 
   }
   echo mysql_error();
   header("Location: lecturaAutentificado.php?idLibro=".$_REQUEST["idLibro"]);	   
?>