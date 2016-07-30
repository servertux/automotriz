<?php

//Inicializar una sesion de PHP
session_start();

//Validar que el usuario este logueado y exista un UID
if ( ! ($_SESSION['autenticado'] == 'SI' && isset($_SESSION['uid'])) )
{
    //En caso de que el usuario no este autenticado, crear un formulario y redireccionar a la
    //pantalla de login, enviando un codigo de error
?>
        <form name="formulario" method="post" action="index.html">
            <input type="hidden" name="msg_error" value="2">
        </form>
        <script type="text/javascript">
            document.formulario.submit();
        </script>
<?php
}

    //Conectar BD
    // include("conectar_bd.php");
    // conectar_bd();

      include("conectar_robert_bd.php");

    //Sacar datos del usuario que ha iniciado sesion
    $sql = "SELECT  tx_nombre,tx_apellidoPaterno,tx_TipoUsuario,id_usuario,tx_apellidoMaterno
            FROM tbl_users
            LEFT JOIN ctg_tiposusuario
            ON tbl_users.id_TipoUsuario = ctg_tiposusuario.id_TipoUsuario
            WHERE id_usuario = '".$_SESSION['uid']."'";
    $result     =mysql_query($sql);

   

    $nombreUsuario = "";

    //Formar el nombre completo del usuario
    if( $fila = mysql_fetch_array($result) )
        $nombreUsuario = $fila['tx_nombre']." ".$fila['tx_apellidoPaterno']." ".$fila['tx_apellidoMaterno'];

//Cerrrar conexion a la BD
mysql_close($conexio);
?>















<!DOCTYPE html>
<html lang="es">
<head>
	 <meta charset="encoding">
	<title>Ventas</title>

<meta name="Author" content="Robert Elio Aguilar Carrizales - www.servertux.com">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

        <link href="css/justified-nav.css" rel="stylesheet">


        <link rel="shortcut icon" href="img/demopage/favicon.png">
       
        <link rel="stylesheet" href="css/screen.css">
        <link rel="stylesheet" href="css/lightbox.css">







  
	<script>
function confirmDelete(delUrl, codact, codfra) {
  if (confirm("BORRAR LA FACTURA "+codact+codfra+"?"))
  {
    if (confirm("SEGURO "+codact+codfra+"?"))
    document.location = delUrl;
  }
}
</script>

</head>
<body>



<div class="row"><!-- Panel de Bienvenida -->
   <div class="col-sm-5">
      <h5><img src="images/1403443531_user.png">Hola,<strong> <?php echo $nombreUsuario ?> </strong> <a href="cerrarSesion.php">Cerrar Sesi&oacute;n</a></h5>
   </div><!-- /.col-sm-4 -->

<h3 class="text-primary:hover" align="center"><a href="principal.php">Automotriz Electronico "EL VOLANTE S.R.L."</a></h3>

 </div>



     <div class="container">


      <div class="masthead">


        <ul class="nav nav-justified">
          <li><a href="verArticulos.php">Articulos</a></li>
          <li><a href="verProveedor.php">Proveedores</a></li>
          <li><a href="recepcion.php">Recepcion</a></li>
          <li><a href="verClientes.php">Clientes</a></li>
          <li><a href="Reportes.php">Reportes</a></li>
          <li><a href="ventas.php">Ventas</a></li>
        </ul>



      </div>





















	


<div class="row">
  <div class="col-md-8">
  	<span><h3>Elegir un Cliente :</h3></span>


<form action="ventas_2.php" method="post">
		<select name="rz_social" id="rz_social" class="form-control">

		 
		<?php
			 
			 include("conexion.php");
			 $sql="SELECT rz_social,id_clientes,ruc FROM clientes";
			 $result=mysql_query($sql);
			 $fila= mysql_num_rows($result);
			for($i=0; $i<$fila;$i++)
			{
			$fila1 = mysql_fetch_row($result);

		?>

			<option value="<?php echo $fila1[1];?>"><?php echo $fila1[0];?></option>
		 <?php
		}
		?>
	</select>

	<input type="submit" value="SELECCIONAR">

</form>
	





  </div>
  <div class="col-md-4"><h2><span class="label label-info">BOLETASs</span></h2></div>
</div>








	
 


  <table class="table table-bordered">
  <tr>
    <td>CODIGO</td>
    <td>CLIENTE</td>
    <td>FECHA</td>
    <td>TOTAL</td>
  </tr>
<?php
include ("conectar.php");
include ("FUNCIONES/funciones.php");

$sql = "select cod_act, cod_fra, rz_social, fecha, clientes.ruc as RUC  from clientes,facturas where facturas.id_clientes = clientes.id_clientes  order by cod_fra desc;";
  if (isset($_REQUEST['nifx'])) {
      $sql = "select cod_act, cod_fra,rz_social,fecha, clientes.ruc as RUC, fecha from clientes, facturas ";
      $sql .= "where facturas.id_clientes = clientes.id_clientes and clientes.id_clientes = '" . $_REQUEST['nifx'] . "' order by cod_fra desc;";
  }
$query = mysql_query ($sql, $link) or die(mysql_error());

while ($registro = mysql_fetch_array($query, MYSQL_ASSOC)) {
  echo "<tr>";
  echo "<td>" . $registro['cod_act']." ".$registro['cod_fra'] . "</td>";
  echo "<td>" . $registro['rz_social'] . "</td>";
  echo "<td>" . $registro['fecha'] . "</td>";
  echo "<td>S/." . number_format(total($registro['cod_fra'], $registro['cod_act']), 2, ',', '.') . "</td>"; //SOLES TABLA  echo "<td><a href=\"nuevafra.php?detalle&nif=" . $registro['RUC'] . "&codfra=" . $registro['cod_fra'] . "&codact=". $registro['cod_act'] ."\">DETALLE</a></td>";
  echo "<td><input type=\"button\" value=\"BORRAR\" onClick=\"confirmDelete('bajafac.php?cod=" . $registro['cod_fra'] . "&codact=". $registro['cod_act'] ."', '". $registro['cod_act'] ."','" . $registro['cod_fra']."')\"</td>";
  echo "<td><input type=\"button\" value=\"GENERAR PDF\" onClick=\"self.location='generarpdf.php?cod=" . $registro['cod_fra'] . "&codact=".$registro['cod_act']."'\"</td>";
  echo "</tr>";
}

?>

</table>





	
</body>
</html>