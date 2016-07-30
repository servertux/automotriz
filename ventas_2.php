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





<?php 
include ("conectar.php");
require_once "conexion.php";


$_SESSION['id_usuario']=$_REQUEST['rz_social'];


if (isset($_REQUEST['detalle'])) {
  $_SESSION['detalle'] = 1;
  $_SESSION['codfra'] = $_REQUEST['codfra'];
  $_SESSION['codact'] = $_REQUEST['codact'];
  $_SESSION['id_usuario']=$_REQUEST['rz_social'];

}

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









<script type="text/javascript" src="autocompletar/jquery.js"></script>
<script type='text/javascript' src='autocompletar/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="autocompletar/jquery.autocomplete.css" />

<script type="text/javascript">
$().ready(function() {

  $("#course").autocomplete("get_course_list2.php", {
    width: 260,
    matchContains: true,
    mustMatch: true,
    //minChars: 0,
    //multiple: true,
    //highlight: false,
    //multipleSeparator: ",",
    selectFirst: false
  });

  $("#course").result(function(event, data, formatted) {
    $("#codigo_producto").val(data[1]);
    $("#nombre_pro").val(data[0]);
    $("#precio").val(data[2]);
  });
});
</script>





</head>
<body>

<div class="row"><!-- Panel de Bienvenida -->
   <div class="col-sm-5">
      <h5><img src="images/1403443531_user.png">Hola,<strong> <?php echo $nombreUsuario ?> </strong> <a href="cerrarSesion.php">Cerrar Sesi&oacute;n</a></h5>
   </div><!-- /.col-sm-4 -->

<h3 class="text-primary:hover" align="center">Automotriz Electronico "EL VOLANTE S.R.L."</h3>

 </div>

 <div class="container">




<?php

if (!isset($_SESSION['codfra'])) {
      $sql = "SELECT max(cod_fra) as cod_fra FROM facturas where cod_act = 'DOC2';";
      $query = mysql_query($sql, $link) or die ($sql . " " . mysql_error());
      $registro = mysql_fetch_array($query, MYSQL_ASSOC);
      $codfra = $registro['cod_fra'] + 1; //incremento correlativo del código
         
       $sql = "insert into facturas (cod_fra,cod_act, fecha, id_clientes) values ";
       $sql .= "(".$codfra.", 'DOC2', '" . date("Y\/n\/j G:i:s") . "', '" . $_SESSION['id_usuario'] . "');";
       $query = mysql_query($sql, $link) or die ($sql . " " . mysql_error());
       $_SESSION['codfra'] = $codfra;
}

 

?>








<?php

if (isset ($_REQUEST['boton']))
{
  $unidades=$_REQUEST['cantidad'];
  $precio_uni=$_REQUEST['precio'];

  $valorventa = ($unidades*$precio_uni)/1.18;
  $igv=$valorventa*0.18;


  $registro=mysql_fetch_array($query,MYSQL_ASSOC);
  $sql = "insert into det_fra (cod_act,cod_fra, codigo_original, unidades, precio_unitario,valor_venta,igv) values ";
  $sql .= "('" . $_REQUEST['codigo_actividad'] . "',". $_REQUEST['codigo_factura'] .", '" . $_REQUEST['codigo_producto'] . "', " . $_REQUEST['cantidad'] . ", " . $_REQUEST['precio'] . ",". $valorventa . "," . $igv . ");";
  $query = mysql_query($sql, $link) or die ($sql . " " . mysql_error());

 


}


?>

<!-- mysql_query("insert into det_fra (cod_act,cod_fra,codigo_original,unidades,precio_unitario,valor_venta,igv)
   values ('$codigo_act','$codigo_fac','$codigo_pro','$cantidad','$precio_uni','$cantidad'*'$precio_uni',('$cantidad'*'$precio_uni')*0.18)");
. $_SESSION['codfra'] .
 -->


<div class="row">
  
<form autocomplete="off">

  <div class="col-md-3">

<p class="navbar-text"> ENCONTRAR ARTICULOS</p>
  
  </div>
  <div class="col-md-7">
    
  
    <p>
    
      <input type="text" name="course" id="course" class="form-control"/>
      <!--input type="button" value="Get Value" /-->
     <!--  <input type="text" name="course_val" id="course_val" /> -->
    </p>

    


  </div>
</div>
  </form>








<div class="row">
  <div class="col-md-6">
    

  <form name="insertar" action="" method="post" role="form" autocomplete="off">

    
    
    <p>CODIGO ACTIVIDAD<input type ="text" name="codigo_actividad" value="DOC1" readonly="readonly" class="form-control"></p>
    <p>CODIGO FACTURA<input type="text" name="codigo_factura" value="<?php echo $_SESSION['codfra']; ?>" class="form-control"></p>
    <p>CODIGO PRODUCTO<input type="text" name="codigo_producto" readonly="readonly" id="codigo_producto" class="form-control"></p>
    <p>NOMBRE PRODUCTO<input type="text" name="nombre_pro" readonly="readonly" id="nombre_pro" class="form-control"></p>
    <p>PRECIO UNITARIO<input type="text" name="precio" readonly="readonly" id="precio" class="form-control"></p>
    <p>CANTIDAD<input type="text" name="cantidad" size="3 " class="form-control"></p>
    <input type="hidden"  name="codigo_cliente" value="<?php echo $_SESSION['id_usuario']; ?>">
    <p>FECHA<input type="text" name="fecha" value="<?php echo date("Y\/n\/j G:i:s"); ?>" class="form-control"></p>

     
    <input type="submit" value="AGREGAR" name="boton">



  </form>




  </div>
 



  <div class="col-md-6">
    

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Cantidad</th>
      <th>Producto </th>
      <th>Precio Unitario </th>
      <th>Total </th>
      
    </tr>
  </thead>

  <tbody>

<?php
$con=mysqli_connect("localhost","root","Flealinux1","aeelvola_prueba");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT precio_unitario*unidades as total,unidades,codigo_original,precio_unitario FROM det_fra,facturas where facturas.cod_fra=".$_SESSION['codfra']." and det_fra.cod_fra=".$_SESSION['codfra']."");



while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['unidades'] . "</td>";
  echo "<td>" . $row['codigo_original'] . "</td>";
  echo "<td> S/. " . $row['precio_unitario'] . "</td>";
  echo "<td> S/. " . $row['total'] . "</td>";
  

  echo "</tr>";
}

mysqli_close($con);
?>
</tbody>
</tbody></tbody>
</table>



<table>
  
  
  <tbody>

<?php
$con=mysqli_connect("localhost","root","Flealinux1","aeelvola_prueba");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT SUM(valor_venta) as valor_venta,SUM(igv) as igv, SUM(valor_venta)+SUM(igv) as total FROM det_fra WHERE cod_fra=".$_SESSION['codfra']."");





while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>VALOR VENTA</td>";
  echo "<td>S/. " . $row['valor_venta'] . "</td>";
  echo "</tr>";

  echo "<tr>";
  echo "<td>IGV</td>";
  echo "<td> S/. " . $row['igv'] . "</td>";
  echo "</tr>";



  echo "<tr>";
  echo "<td> TOTAL </td> ";
  echo "<td>S/. " . $row['total'] . "</td>";
  echo "</tr>";


  
}

mysqli_close($con);
?>
</tbody>
</tbody></tbody>
</table>









  </div>
</div>






<input type="button" value="TERMINAR" onClick="self.location='./cancelar.php'"> <?php // ESTA BIEN, ES CANCELAR, PORQUE ASÍ DESTRUYE LA SESION (olvida el cliente seleccionado en la sesion) ?>
  
</div>





















  
</body>
</html>