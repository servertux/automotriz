<?php
   include "../conectar_bd.php";
   conectar_bd();

   
   $apellido=$_POST['apellido'];
   $nombre=$_POST['nombre'];
   $ruc=$_POST['ruc'];
   $direccion=$_POST['direccion'];
   $rzsocial=$_POST['rzsocial'];
   $telefono=$_POST['telefono'];


     mysql_query("insert into proveedores (rz_social,direccion,ruc,telefono,tx_nombre,tx_apellidos)
     values ('$rzsocial','$direccion','$ruc','$telefono','$nombre','$apellido')");
    echo "<h2>Se grabaron los cambios en el Sistema!!!</h>";

  header('Location:../nuevoProveedor.php');
  echo "<h2>Se grabaron los cambios en el Sistema!!!</h>";
  ?>
