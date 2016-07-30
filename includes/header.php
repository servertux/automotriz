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
        <title>Sistema AEELVOLANTE</title>
        


        <meta charset="encoding">
        <meta name="Author" content="Robert Elio Aguilar Carrizales - www.servertux.com">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

        <link href="css/justified-nav.css" rel="stylesheet">


        <link rel="shortcut icon" href="img/demopage/favicon.png">
       
        <link rel="stylesheet" href="css/screen.css">
        <link rel="stylesheet" href="css/lightbox.css">




        <!--[if lt IE 9]>
        <script type="text/javascript">
           document.createElement("nav");
           document.createElement("header");
           document.createElement("footer");
           document.createElement("section");
           document.createElement("article");
           document.createElement("aside");
           document.createElement("hgroup");
        </script>
        <![endif]-->
  </head>
  <body>
<div class="row"><!-- Panel de Bienvenida -->
   <div class="col-sm-5">
      <h5><img src="./images/1403443531_user.png">Hola,<strong> <?php echo $nombreUsuario ?> </strong> <a href="cerrarSesion.php">Cerrar Sesi&oacute;n</a></h5>
   </div><!-- /.col-sm-4 -->

<h3 class="text-primary:hover" align="center"><a href="./principal.php">Automotriz Electronico "EL VOLANTE S.R.L."</a></h3>

 </div>



     <div class="container">


      <div class="masthead">


        <ul class="nav nav-justified">
          <li><a href="./verArticulos.php">Articulos</a></li>
          <li><a href="./verProveedor.php">Proveedores</a></li>
          <li><a href="recepcion.php">Recepcion</a></li>
          <li><a href="./verClientes.php">Clientes</a></li>
          <li><a href="Reportes.php">Reportes</a></li>
          <li><a href="ventas.php">Ventas</a></li>
        </ul>



      </div>
