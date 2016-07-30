<?php
/*     
	Instituto Tecnologico de Zacatepec, Morelos 
Descripcion:   Conecta con el Manejador de Base de Datos (DBMS) y deja disponible una variable global (conexio)
					para ser utilizada posteriormente. 
Author:     Gonzalo Silverio  gonzasilve@gmail.com 
Archivo:    conectar_bd.php 
*/

	//Definir datos de conexion con el servidor MySQL

error_reporting(E_ALL ^ E_DEPRECATED);

	$elUsr = "root";
	$elPw  = "Flealinux1";
	$elServer ="localhost";
	$laBd = "aeelvola_prueba";
	//Conectar
	$conexio = mysql_connect($elServer, $elUsr , $elPw) or die (mysql_error());

	
	

	//Seleccionar la BD a utilizar
	
	mysql_select_db($laBd, $conexio ) or die (mysql_error());

	

	if($conexio == true)

	{
		//echo "La conexion se establecio correctamente<br>";	
	}
		else
	{
	echo "Error la conexion no se pudo establecer. Lea cuidadosamente las causas<br>";

	}

	$result = mysql_select_db($laBd, $conexio);
	
if($result == true)
	{
	//echo "La Base de Datos fue encontrada <br>";
	}
else
	{
	echo "No se encontro la Base de Datos";
	}


	
?>