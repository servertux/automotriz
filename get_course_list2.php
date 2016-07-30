<?php
require_once "conexion.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

//$sql = "select DISTINCT course_name as course_name,Descripcion as Descripcion, course_id from course where course_name LIKE '%$q%' or Descripcion LIKE '%$q%'";

$sql = "select DISTINCT nombre as nombre,codigo_original as codigo_original, codigo_original,precio_unitario from articulos where nombre LIKE '%$q%' or codigo_original LIKE '%$q%'";

$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cid = $rs['codigo_original'];
	$cname = $rs['nombre'];
	$cdes = $rs['codigo_original'];
	$precio = $rs['precio_unitario'];
	echo "$cname $cdes|$cid|$precio\n";
}
?><p><font color="#000000">recognize </font></p>
