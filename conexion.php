<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$dbhost = "localhost";
$dbusuario = "root";
$dbpassword = "Flealinux1";
$db = "aeelvola_prueba";
$conexion = mysql_connect($dbhost, $dbusuario, $dbpassword);
mysql_select_db($db, $conexion);
if($conexion == true)

	{
	//echo "La conexion se establecio correctamente<br>";	
	}
else
	{
	echo "Error la conexion no se pudo establecer. Lea cuidadosamente las causas<br>";

	}
	$result = mysql_select_db($db, $conexion);
	
if($result == true)
	{
	//echo "La Base de Datos fue encontrada <br>";
	}
else
	{
	echo "No se encontro la Base de Datos";
	}
?>