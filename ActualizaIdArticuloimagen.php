<?php

//include("conectar_robert_bd.php");

 $conexion=mysql_connect('localhost','root',"Flealinux1") or die('No hay conexión a la base de datos');
 $db=mysql_select_db('aeelvola_prueba',$conexion)or die('no existe la base de datos.');


$rutaEnServidor='imagenes';

$rutaTemporal=$_FILES['imagen']['tmp_name'];
$nombreImagen=$_FILES['imagen']['name'];
$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
 move_uploaded_file($rutaTemporal,$rutaDestino);

$rutaTemporal2=$_FILES['imagen2']['tmp_name'];
$nombreImagen2=$_FILES['imagen2']['name'];
$rutaDestino2=$rutaEnServidor.'/'.$nombreImagen2;
 move_uploaded_file($rutaTemporal2,$rutaDestino2);

#$desc=$_POST['descripcion'];
$rutaTemporal3=$_FILES['imagen3']['tmp_name'];
$nombreImagen3=$_FILES['imagen3']['name'];
$rutaDestino3=$rutaEnServidor.'/'.$nombreImagen3;
move_uploaded_file($rutaTemporal3,$rutaDestino3);


$rutaTemporal4=$_FILES['diagrama']['tmp_name'];
$nombreImagen4=$_FILES['diagrama']['name'];
$rutaDestino4=$rutaEnServidor.'/'.$nombreImagen4;
move_uploaded_file($rutaTemporal4,$rutaDestino4);


$rutaTemporal5=$_FILES['dimension']['tmp_name'];
$nombreImagen5=$_FILES['dimension']['name'];
$rutaDestino5=$rutaEnServidor.'/'.$nombreImagen5;
move_uploaded_file($rutaTemporal5,$rutaDestino5);



$codigo=$_POST['cod'];


$sql="UPDATE articulos set imagen_1='".$rutaDestino."',imagen_2='".$rutaDestino2."',imagen_3='".$rutaDestino3."',diagrama='".$rutaDestino4."',dimension='".$rutaDestino5."' WHERE codigo_original='$codigo'";


$res=mysql_query($sql,$conexion);

if ($res){
  echo 'inserción con exito';
}else{
  echo 'no se puede insertar';
}
header('Location:_articulos_eliminar.php');
?>
