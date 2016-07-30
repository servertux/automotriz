<?php
   include "../conectar_bd.php";
   conectar_bd();

   $codigo=$_POST['cod'];
   $nombrecliente=$_POST['nombre'];
   $apellidoscliente=$_POST['apellidos'];
   $rz_social=$_POST['razon'];
   $ruc=$_POST['ruc'];
   $dir=$_POST['direccion'];
   $tel=$_POST['telefono'];


    
    mysql_query("UPDATE proveedores set tx_nombre='$nombrecliente',tx_apellidos='$apellidoscliente',rz_social='$rz_social',ruc='$ruc',direccion='$dir',telefono='$tel' WHERE id_proveedores='$codigo'");

    echo "<h2>Se grabaron los cambios en el Sistema!!!</h>";

    header('Location:../_proveedor_eliminar.php');
    echo "<h2>Se grabaron los cambios en el Sistema!!!</h>";
    
 
 ?>