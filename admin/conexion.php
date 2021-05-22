<?php
class Conexion
{
	public static function Conectar()
	{
		$con = new mysqli("localhost", "root", "", "mecato");
		if ($con->connect_errno)
		{
			exit();
		}
		@mysqli_query($con, "SET NAMES 'utf8'");
		return $con;
	}
}
?>

