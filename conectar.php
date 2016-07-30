<?php
/*
  <<Copyright 2012 Jose Joaquin Perez Fuster>>
  peperfus@hotmail.com
  This software is released under the terms of the GNU Affero General Public License.
  Read agpl.txt file for more details.
*/
  error_reporting(E_ERROR);
  session_start();
  if (!isset($link)) $link=mysql_connect("localhost","root","Flealinux1") or die("Error de conexión");
  if (!isset($db)) $db=mysql_select_db("aeelvola_prueba",$link) or die ("Error de BD");
?>