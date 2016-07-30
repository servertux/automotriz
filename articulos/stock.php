<?php
   include "../conectar_bd.php";
   conectar_bd();

   $codigo=$_POST['codigo_o'];
   $tipo=$_POST['tipo'];
   $cantidad=$_POST['cantidad'];
   $fecha=$_POST['fecha'];
   


     mysql_query("insert into movimiento (codigo_original,tipo_movimiento,cantidad,fecha)
     values ('$codigo','$tipo','$cantidad','$fecha')");
  
    mysql_query("UPDATE articulos,movimiento set articulos.stock='$cantidad' + articulos.stock WHERE movimiento.codigo_original=articulos.codigo_original and articulos.codigo_original='$codigo'");

    echo "<h2>Se grabaron los cambios en el Sistema!!!</h>";

  header('Location:../recepcion.php');
  echo "<h2>Se grabaron los cambios en el Sistema!!!</h>";
  


?>
 