<?php

/*
  <<Copyright 2012 Jose Joaquin Perez Fuster>>
  peperfus@hotmail.com
  This software is released under the terms of the GNU Affero General Public License.
  Read agpl.txt file for more details.
*/

include ("general/conectar.php");
include ("general/funciones.php");

if (isset($_REQUEST['detalle'])) {
  $_SESSION['detalle'] = 1;
  $_SESSION['codfra'] = $_REQUEST['codfra'];
  $_SESSION['codact'] = $_REQUEST['codact'];
}

if (isset($_REQUEST['nif'])) {
  if (isset($_REQUEST['codfra'])) $_SESSION['codfra'] = $_REQUEST['codfra'];
  if (isset ($_REQUEST['codact'])) $_SESSION['codact'] = $_REQUEST['codact'];
  if (strcmp($_REQUEST['nif'], "") == 0) header("location: cancelar.php");
  $_SESSION['nif'] = $_REQUEST['nif'];
  $sql = "select rz_social from clientes where id_clientes = '" . $_SESSION['nif'] . "';";
  $query = mysql_query ($sql, $link) or die ($sql . " " . mysql_error());
  $registro = mysql_fetch_array($query, MYSQL_ASSOC);
  $_SESSION['rz_social'] = $registro['rz_social'];
}

// INSERTAMOS LA FACTURA (LA CREAMOS)
// Primero averiguamos el �ltimo c�digo de la factura de esa actividad, para incrementarlo
if (!isset($_SESSION['codfra'])) {
  $sql = "SELECT max(cod_fra) as cod_fra FROM facturas where cod_act = '".$_REQUEST['codact']."';";
  $query = mysql_query($sql, $link) or die ($sql . " " . mysql_error());
  $registro = mysql_fetch_array($query, MYSQL_ASSOC);
  $codfra = $registro['cod_fra'] + 1; //incremento correlativo del c�digo

  $sql = "insert into facturas (cod_fra, cod_act, fecha, id_clientes) values ";
  $sql .= "(".$codfra.", '".$_REQUEST['codact']."', '" . date("Y\/n\/j G:i:s") . "', '" . $_SESSION['nif'] . "');";
  $query = mysql_query($sql, $link) or die ($sql . " " . mysql_error());
  $_SESSION['codfra'] = $codfra;
}

// INSERTAMOS UN SERVICIO
if (isset ($_REQUEST['okser']))
{
  // averiguar el precio del servicio en la actualidad
  $sql = "select precio_unitario from articulos where codigo_original = '".$_REQUEST['codigo_original']."' ";
  $query = mysql_query($sql,$link) or die ($sql . " " . mysql_error());
  $registro = mysql_fetch_array($query, MYSQL_ASSOC);
  $pu = $registro['precio_unitario'];
  $sql = "insert into det_fra (cod_fra, cod_act, codigo_original, unidades, precio_unitario) values ";
  $sql .= "(" . $_SESSION['codfra'] . ", '" . $_REQUEST['codact'] . "', '".$_REQUEST['codigo_original']."', " . $_REQUEST['unidades'] . ", ".$pu.")";
  $query = mysql_query($sql, $link) or die ($sql . " " . mysql_error());
}
// QUITAMOS UN SERVICIO
if (isset ($_REQUEST['noser'])) {
  $sql = "delete from det_fra where cod_fra=" . $_SESSION['codfra'] . " and cod_act = '".$_REQUEST['codact']."'  and codigo_original=" . $_REQUEST['codigo_original'] . ";";
  $query = mysql_query($sql, $link) or die(mysql_error());
}


$sql = "select * from clientes where id_clientes like '" . $_REQUEST['nif'] . "';";
$query = mysql_query ($sql, $link) or die($sql . " " . mysql_error());
$registro = mysql_fetch_array($query, MYSQL_ASSOC);

?>
<html>
<body>
<br><br>

<h2 align="center">FACTURA DEL CLIENTE <?php echo $_SESSION['nif'] . " - " . $_SESSION['rz_social'];
?></h2>
<form name="servicio" method="post">
FECHA: <input type="text" name="fecha" value="<?php echo date("j\/n\/Y");
?>">
<input type="button" value="CANCELAR" onClick="self.location='./cancelar.php?codfra=<?php echo $_SESSION['codfra'] ?>&codact=<?php echo $_SESSION['codact'] ?>'">
&nbsp;&nbsp;&nbsp;
<input type="button" value="TERMINAR" onClick="self.location='./cancelar.php'"> <?php // ESTA BIEN, ES CANCELAR, PORQUE AS� DESTRUYE LA SESION (olvida el cliente seleccionado en la sesion) ?>
<div align="right"><?php echo "CODIGO: " . $_SESSION['codact'] . $_SESSION['codfra'] . " TOTAL: " . total($_SESSION['codfra'], $_SESSION['codact']);
?></div>
<br><br>
<?php
$sql = "select * from articulos;";
$query = mysql_query($sql, $link) or die ($sql . " " . mysql_error());
echo "<select name=\"codser\">";
while ($registro = mysql_fetch_array($query, MYSQL_ASSOC)) {
  echo "<option value=\"'" . $registro['codido_original'] . "'\"";
  echo ">" . $registro['nombre'] ."&nbsp;.-&nbsp;". $registro['precio_unitario'] . "&nbsp;&euro;</option>";
}
echo "</select>";

?>
&nbsp;&nbsp;Unidades: <input type="text" name="unidades" size="3">
<input type="submit" name="okser" value="AGREGAR">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="noser" value="QUITAR">
<br><br><br><br>
</form>
<?php
  $sql = "select * from det_fra, facturas, articulos where facturas.cod_fra = " . $_SESSION['codfra'] . " and facturas.cod_act = '".$_REQUEST['codact']."' and facturas.cod_fra = det_fra.cod_fra and det_fra.codigo_original = articulos.codigo_original and facturas.id_clientes = '".$_SESSION['nif']."';";
  $detalles = mysql_query($sql, $link) or die($sql . " " . mysql_error());
  while ($detalle = mysql_fetch_array($detalles, MYSQL_ASSOC)) {

    echo $detalle['nombre'] . " --- Unidades: " . $detalle['unidades'] . "<br>";

      }

?>
</form>

<br><br>
<br><br>


</body>
</html>
