<?php 
	require("lib/database.php");
	connect_db();
	session_start();
	
   
	   $sql = "INSERT INTO comentario (`idUsuario`, `idLibro`, `descripcion`) VALUES ".
	   "(".$_SESSION["idusuario"].", ".$_REQUEST["idLibro"].", '".$_POST["comentario"]."' )"; 
  $myclave = mysql_query($sql); 
  echo mysql_error();
  
   header("Location: lecturaAutentificado.php?idLibro=".$_REQUEST["idLibro"]);
	   
?>






INSERT INTO `libro`(`nombre`, `autor`, `editorial`, `idioma`, `fecha`, `categoria`, `descripcion`, `direccion`, `direccionpdf`, `numeroPaginas`,`portada` ) 
VALUES ('pepe', 'pepe','editoria', 'idioma', 'now()', 'categoria', 'El mejor libro', 'libros/elperfume/imagenes/', 'libros/elperfume/imagenes/', 21, 'portada')