<?php
/*
  <<Copyright 2012 Jose Joaquin Perez Fuster>>
  peperfus@hotmail.com
  This software is released under the terms of the GNU Affero General Public License.
  Read agpl.txt file for more details.
*/

include ("general/conectar.php");
include ("general/funciones.php");

if (isset($_REQUEST['terminado'])) unset($_SESSION['nif']);

if (isset($_SESSION['nif']))
{
  header ("location: nuevafra.php?nif=" . $_SESSION['nif'] . "&codact=".$_SESSION['codact']);
}

if (isset($_REQUEST['ok2'])) header ("location: nuevafra.php?nif=" . $_REQUEST['cliente'] . "&codact=".$_REQUEST['codact']);
?>

<html>
<head>
<script>
function confirmDelete(delUrl, codact, codfra) {
  if (confirm("¿BORRAR LA FACTURA "+codact+codfra+"?"))
  {
    if (confirm("¿SEGURO "+codact+codfra+"?"))
    document.location = delUrl;
  }
}
</script>
</head>
<body>
<br><br>

<h2 align="center">FACTURAS
<?php
if (isset($_REQUEST['nifx'])) {
  $sql = "select rz_social from clientes where id_clientes like '" . $_REQUEST['nifx'] . "';";
  $query = mysql_query($sql, $link) or die (mysql_error());
  $registro = mysql_fetch_array($query, MYSQL_ASSOC);
  echo " DEL CLIENTE " . $_REQUEST['nifx'] . " - " . $registro['rz_social'];
}

?>
</h2>
<form name="form1" method="post">
Buscar Cliente:
<input type="text" name="patron"> <input type="submit" name="ok1" value="Buscar">
<select name="cliente" size="5">
<?php
$sql = "select * from clientes;";
if (isset($_REQUEST['ok1']))
  $sql = "select * from clientes where rz_social like '%" . $_REQUEST['patron'] . "%' or nif_cli like '%".$_REQUEST['patron']."%';";
$query = mysql_query ($sql, $link) or die(mysql_error());

while ($registro = mysql_fetch_array($query, MYSQL_ASSOC)) {

  ?>

	<option value="<?php echo $registro['id_clientes'];

  ?>"
	<?php
  if (isset($_REQUEST['nif'])) echo " selected";

  ?>
	 >
	 <?php
  echo $registro['id_clientes'] . " - " . $registro['rz_social'];

  ?>


	 </option> <?php
}

?>
</select>
<select name="codact">
  <?php
    $sql = "select cod_act from actividades;";
	$query = mysql_query ($sql, $link) or die (mysql_error());
	while ($registro = mysql_fetch_array($query, MYSQL_ASSOC))
	{
      ?><option value="<?php echo $registro['cod_act']; ?>"><?php echo $registro['cod_act']; ?></option>
    <?php }     ?>
</select>
<input type="submit" name="ok2" value="NUEVA">

<br><br><br><br><br><br>

  <table border="2" cellpadding="12" cellspacing="5">
  <tr>
    <td>CODIGO</td>
    <td>CLIENTE</td>
    <td>FECHA</td>
    <td>TOTAL</td>
  </tr>
<?php
$sql = "select cod_act, cod_fra, rz_social, fecha, clientes.id_clientes as NIF from clientes, facturas where facturas.id_clientes = clientes.id_clientes order by cod_fra desc;";
if (isset($_REQUEST['nifx'])) {
  $sql = "select cod_act, cod_fra, nombre, clientes.id_clientes as NIF, fecha from clientes, facturas ";
  $sql .= "where facturas.id_clientes = clientes.id_clientes and clientes.id_clientes = '" . $_REQUEST['nifx'] . "' order by cod_fra desc;";
}
$query = mysql_query ($sql, $link) or die(mysql_error());

while ($registro = mysql_fetch_array($query, MYSQL_ASSOC)) {
  echo "<tr>";
  echo "<td>" . $registro['cod_act'].$registro['cod_fra'] . "</td>";
  echo "<td>" . $registro['NIF'] . "<br>" . $registro['rz_social'] . "</td>";
  echo "<td>" . $registro['fecha'] . "</td>";
  echo "<td>S/." . number_format(total($registro['cod_fra'], $registro['cod_act']), 2, ',', '.') . "</td>"; //SOLES TABLA
  echo "<td><a href=\"nuevafra.php?detalle&nif=" . $registro['NIF'] . "&codfra=" . $registro['cod_fra'] . "&codact=". $registro['cod_act'] ."\">DETALLE</a></td>";
  echo "<td><input type=\"button\" value=\"BORRAR\" onClick=\"confirmDelete('bajafac.php?cod=" . $registro['cod_fra'] . "&codact=". $registro['cod_act'] ."', '". $registro['cod_act'] ."','" . $registro['cod_fra']."')\"</td>";
  echo "<td><input type=\"button\" value=\"GENERAR PDF\" onClick=\"self.location='generarpdf.php?cod=" . $registro['cod_fra'] . "&codact=".$registro['cod_act']."'\"</td>";
  echo "</tr>";
}

?>

</table>
</form>

</body>
</html>