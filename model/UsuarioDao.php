<?php

require 'Conexion.php';
require '../entity/Usuario.php';

class UsuarioDao extends Conexion 
{
	protected static $cnx;

	private static function getConexion() 
	{
		self::$cnx = Conexion::conectar();
	}

	private static function desconectar() 
	{
		self::$cnx = null;
	}
	
	/**
	 * @param		object	$usuario
	 * @return		boolean
	 */
	public static function login($usuario) 
	{
		$query = "SELECT id, nombre, usuario, email, privilegio, fecha_registro 
		            FROM usuario WHERE usuario = :usuairo AND password = :password";

		self::getConexion();

		$result = self::$cnx->prepare($query);

		$user = $usuario->getUsuario();
		$pass = $usuario->getPassword();

		$result->bindParam(":usuario", $user);
		$result->bindParam(":password", $passs);

		$result->execute();

		if(count($result)) 
		{
			return "OK";
		}

		return "Falso";
	}

}

?>