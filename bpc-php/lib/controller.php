<?php

	/*
	* redirecciona el navegador hacia una nueva direccion
	* @param string $address
	* @return
	*/
	function redirect_to($address)
	{
		header("location:".WEBSITE.APP_ROOT."/".$address);
		exit();
	}
	
	/*
	* crea un mensaje de error que se almacena en la matriz superglobal SESSION
	* @param string $msg
	* @return bool
	*/
	function save_msg_warnings($msg)
	{
		if(empty($msg))
		{
			return false;
		}
		$_SESSION["msg"]["warnings"] = $msg;
		return true;
	}
	
	/*
	* crea un mensaje de exito que se almacena en la matriz superglobal SESSION
	* @param string $msg
	* @return bool
	*/	
	function save_msg_success($msg)
	{
		if(empty($msg))
		{
			return false;
		}
		$_SESSION["msg"]["success"] = $msg;
		return true;
	}
	
	/*
	* verifica si el usuario ha iniciado sesión y redirecciona el navegador hacia 
	* el formulario de logueo en caso no se haya iniciado sesión.
	* @return bool
	*/
	function check_authentication()
	{
		if($_SESSION["user"])
		{
			return true;
		}
		else
		{
			redirect_to("sessions/new");
			return false;
		}
	}
?>