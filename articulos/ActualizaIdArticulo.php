<?php
   include "../conectar_bd.php";
   conectar_bd();

   $codigo=$_POST['cod'];
   $codigo2=$_POST['cod2'];
   $cod_int=$_POST['codigointerno'];
   $nombre=$_POST['nombrearticulo'];
   $precio_unitario=$_POST['preciounitario'];
   $precio_costo=$_POST['preciocosto'];
   $caracteristicas=$_POST['caracteristicas'];
   $medidas=$_POST['medidas'];
   //$stock=$_POST['stock'];


    
    
    mysql_query("UPDATE articulos set codigo_interno='$cod_int',nombre='$nombre',precio_costo='$precio_costo',precio_unitario='$precio_unitario',caracteristicas='$caracteristicas',medidas='$medidas',codigo_original='$codigo2'  WHERE codigo_original='$codigo'");

    //mysql_query("UPDATE articulos set codigo_original='0.4774' WHERE codigo_original='$codigo'");

    echo "<h2>Se grabaron los cambios en el Sistema!!!</h>";

    header('Location:../_articulos_eliminar.php');
    echo "<h2>Se grabaron los cambios en el Sistema!!!</h>";
    
    ?>
 