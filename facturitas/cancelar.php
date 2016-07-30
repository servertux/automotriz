<?php
/*
  <<Copyright 2012 Jose Joaquin Perez Fuster>>
  peperfus@hotmail.com
  This software is released under the terms of the GNU Affero General Public License.
  Read agpl.txt file for more details.
*/

include ("general/conectar.php");

if (isset($_REQUEST['codfra']) && !isset($_SESSION['detalle']))
  mysql_query ("delete from facturas where cod_fra=" . $_REQUEST['codfra']." and cod_act='". $_REQUEST['codact'] ."';", $link) or die (mysql_error());

session_unset();
session_destroy();

header("location:./facturas.php");

?>