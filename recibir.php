
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
$codigointerno=$_POST['codigointerno'];
$nombrearticulo=$_POST['nombrearticulo'];
$preciounitario=$_POST['preciounitario'];
$preciocosto=$_POST['preciocosto'];
$stock=$_POST['stock'];
$caracteristicas=$_POST['caracteristicas'];
$caracteristicas2=$_POST['caracteristicas2'];
$medidas=$_POST['medidas'];
   $fecha=$_POST['fecha'];




$sql="INSERT INTO articulos (codigo_original,codigo_interno,nombre,precio_costo,precio_unitario,imagen_1,imagen_2,imagen_3,diagrama,dimension,caracteristicas,medidas,caracteristicas2)
values('".$codigo."','".$codigointerno."','".$nombrearticulo."',".$preciocosto.",".$preciounitario.", '".$rutaDestino."','".$rutaDestino2."','".$rutaDestino3."','".$rutaDestino4."','".$rutaDestino5."','".$caracteristicas."','".$medidas."','".$caracteristicas2."')";



mysql_query("insert into movimiento (codigo_original,tipo_movimiento,cantidad,fecha)
values ('$codigo','ENTRADA','$stock','$fecha')");


// $sql2="INSERT INTO movimiento (codigo_original,tipo_movimiento,cantidad,fecha)
// values('".$codigo."','ENTRADA','".$stock."','".$fecha."')";




$res=mysql_query($sql,$conexion);

if ($res){
	echo 'inserción con exito';
}else{
  echo 'no se puede insertar';
}
header('Location:articulos.php');
?>
