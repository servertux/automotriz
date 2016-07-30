<?php
   include "../conectar_bd.php";
   conectar_bd();

   $codigo_act=$_POST['codigo_actividad'];
   $codigo_fac=$_POST['codigo_factura'];
   $codigo_pro=$_POST['codigo_producto'];
   $nombre_pro=$_POST['nombre'];
   $precio_uni=$_POST['precio'];
   $cantidad=$_POST['cantidad'];
   $cod_cli=$_POST['codigo_cliente'];
   $fecha=$_POST['fecha'];

   

   



mysql_query("insert into det_fra (cod_act,cod_fra,codigo_original,unidades,precio_unitario,valor_venta,igv)
   values ('$codigo_act','$codigo_fac','$codigo_pro','$cantidad','$precio_uni','$cantidad'*'$precio_uni',('$cantidad'*'$precio_uni')*0.18)");



  header('Location:../ventas_1.php');
  echo "<h2>Se grabaron los cambios en el Sistema!!!</h>";







?>


 