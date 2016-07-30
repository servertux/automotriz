<?php 
// Actualizamos en funcion del id que recibimos 

$id = $_GET['cadena']; 


include "../conexion.php";





$query = 

//"delete from articulos,ficha where articulos.codigo_original=ficha.codigo_original and articulos.codigo_original = '$id'";  

// "
// DELETE FROM articulos,ficha
// USING ficha
// LEFT JOIN articulos 
// ON ficha.codigo_original=articulos.codigo_original

// WHERE ficha.codigo_original='$id'";


"DELETE FROM proveedores WHERE id_proveedores='$id'";





$result = mysql_query($query);  
mysql_close($conexion);
 

echo " 
<p>El registro ha sido eliminado con exito.</p> 

";
header('Location:../_proveedor_eliminar.php'); 
?> 

