<?php
	require("lib/database.php");
	connect_db();
	
	if($_POST["genero"] == '01')
		$genero = "masculino";
		
	if($_POST["genero"] == '02')
		$genero = "femenino";
		
		
	
	$consultaGusta = "INSERT INTO usuario (`nombre`, `apellidoMaterno`, `apellidoPaterno`, `correo`, `contrasenia`, `genero`, `fechaNacimiento`, `imagen`, `perfil`)".
	" VALUES ('".$_POST["nombre"]."', '".$_POST["ap_paterno"]."', '".$_POST["ap_materno"]."' , '".$_POST["email"]."' ,'".$_POST["contrasenia"]."' , '".$genero.
	"', '".$_POST["anio"]."-".$_POST["mes"]."-".$_POST["dia"]."', 'usuarios/uspepe.jpg', '".$_POST["perfil"]."' )";
		 $resultadoGusta = mysql_query($consultaGusta);
	
	header("Location: inicio.php");
		 
?>