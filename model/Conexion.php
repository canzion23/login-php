<?php


class Conexion
{

/**
 * Realiza la conexión a la base de datos MySQL devolviendo un objeto de tipo conexión.
 * @return $cn
 */
	public static function conectar() {

		try {
			$cn = new PDO("mysql:host=localhost;dbname=login-php","root","");

			//echo "Conectado";

			return $cn;

		} catch(PDOException $e) {
			die($ex->getMessage());
		}
	}
}
//Conexion::conectar();
?>