<?php


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

$desc=$_POST['descripcion'];




$codigo=$_POST['cod'];
$codigointerno=$_POST['codigointerno'];
$nombrearticulo=$_POST['nombrearticulo'];
$preciounitario=$_POST['preciounitario'];
$preciocosto=$_POST['preciocosto'];
$stock=$_POST['stock'];


//
$sql="INSERT INTO articulos (id_articulos,codigo_interno,nombre,precio_costo,precio_unitario,imagen_1,imagen_2,stock,descripcion)
values('".$codigo."','".$codigointerno."','".$nombrearticulo."',".$preciocosto.",".$preciounitario.", '".$rutaDestino."','".$rutaDestino2."',".$stock.",'".$desc."')";
// $sql="INSERT INTO articulos(id_articulos,codigo_interno)
// values('".$codigo."','".$codigointerno."')";


$res=mysql_query($sql,$conexion);

if ($res){
	echo 'inserción con exito';
}else{
  echo 'no se puede insertar';
}

?>
