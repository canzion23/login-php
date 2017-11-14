<?php

require '../model/UsuarioDao.php';

class UsuarioControlador 
{
	
	public static function login($usuario, $password) 
	{		
		$obj_usuario = new Usuario();
		$obj_usuario->setUsuario($usuario);
		$obj_usuario->setPassword($password);

		return UsuarioDao::login($obj_usuario);
	}

}

?>