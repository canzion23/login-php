<?php

include ('Conexion.php');
include ('../entity/Usuario.php');

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
		$query = 'SELECT id, nombre, usuario, email, privilegio, fecha_registro 
					FROM usuarios WHERE usuario = :usuario AND password = :password';

		self::getConexion();

		$result = self::$cnx->prepare($query);

		$user = $usuario->getUsuario();
		$pass = $usuario->getPassword();

		//echo $user;
		//echo $pass;
		
		$result->bindParam(':usuario', $user, PDO::PARAM_STR, 15);
		$result->bindParam(':password', $pass, PDO::PARAM_STR, 15);		

		
		
		$result->execute();

		if($result->rowCount() == 1 ) 
		{
			return "Existe 1 Usuario";
		}

		return "Falso";
	}

}

?>