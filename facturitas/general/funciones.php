<?php

/*
  <<Copyright 2012 Jose Joaquin Perez Fuster>>
  peperfus@hotmail.com
  This software is released under the terms of the GNU Affero General Public License.
  Read agpl.txt file for more details.
*/

function total($codfra, $codact) // CALCULA Y DEVUELVE EL TOTAL DE LA FACTURA
{
  global $link;
  $resultado = 0;
  $sql1 = "select * from det_fra where cod_fra = ".$codfra." and cod_act = '".$codact."';";
  $query1 = mysql_query ($sql1, $link) or die (mysql_error());
  while ($registro1 = mysql_fetch_array($query1, MYSQL_ASSOC))
  {
    $resultado += $registro1['unidades'] * $registro1['precio_unitario'];
    
  }
  return ($resultado);
}

function igv($codfra, $codact) // CALCULA Y DEVUELVE EL IGV DE LA FACTURA
{
  global $link;
  $resultado = 0;
  $sql1 = "select * from det_fra where cod_fra = ".$codfra." and cod_act = '".$codact."';";
  $query1 = mysql_query ($sql1, $link) or die (mysql_error());
  while ($registro1 = mysql_fetch_array($query1, MYSQL_ASSOC))
  {
    $resultado += $registro1['unidades'] * $registro1['precio_unidad'];
    $igv=$resultado*0.18;
  }
  return ($igv);
}


?>