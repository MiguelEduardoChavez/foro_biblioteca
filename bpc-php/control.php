<?php 
	require("lib/database.php");
	connect_db();
	
   
	   $sql = "select idusuario, perfil, imagen from usuario where perfil = '".$_POST["correo"]."' and contrasenia = '".$_POST["contrasenia"]."'"; 
  $myclave = mysql_query($sql); 
  $resultado = mysql_num_rows($myclave);
  
  
  //Si el usuario y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo. 
  if($resultado != 0)
  { 
  	session_start(); 
  	  $fila = mysql_fetch_row($myclave);
      
      //Guardamos dos variables de sesión que nos auxiliará para saber si se está o no "logueado" un usuario 
      $_SESSION["autentica"] = "SI"; 
	  $_SESSION["idusuario"] = $fila[0];
      $_SESSION["usuarioactual"] = $fila[1];
	  $_SESSION["imagen"] = $fila[2]; 
      //nombre del usuario logueado. 
      //Direccionamos a nuestra página principal del sistema. 
	 header("Location:".$_REQUEST["pagina"]."Autentificado.php");
   }
   else{ 
      echo"<script>alert('Usuario o password incorrecto.'); window.location.href=\"".$_REQUEST["pagina"].".php\"</script>";
	  $_SESSION["autentica"] = "NO"; 
   } 
	   
?>