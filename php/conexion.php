<?php 
	$servidor="localhost";
	$usuario="root";
	$clave="kp198103";
	$bd="pp_conocimientos";

	$conexion=mysqli_connect($servidor, $usuario, $clave, $bd); 

	if (!$conexion)
	{
    	echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    	echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    	exit;
	}
	else //Y si se logra la conexion habilita los caracteres de UTF8 y la zona horaria que corresponde a Honduras
	{
		mysqli_set_charset($conexion,"utf8");
		mysqli_query($conexion,"SET time_zone = '-06:00'");
	}
?>