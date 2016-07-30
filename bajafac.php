<?php
/*
  <<Copyright 2012 Jose Joaquin Perez Fuster>>
  peperfus@hotmail.com
  This software is released under the terms of the GNU Affero General Public License.
  Read agpl.txt file for more details.
*/

include ("conectar.php");



$sql = "delete from det_fra where cod_fra=" . $_REQUEST['cod'] . " and cod_act = '". $_REQUEST['codact'] ."' ;";
$query = mysql_query ($sql) or die (mysql_error());


$sql2 = "delete from facturas where cod_fra=" . $_REQUEST['cod'] . " and cod_act = '". $_REQUEST['codact'] ."' ;";
$query2 = mysql_query ($sql2) or die (mysql_error());



header("location:facturas.php")

?>