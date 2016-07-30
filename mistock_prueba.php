<table>

<?php
$con=mysqli_connect("localhost","root","Flealinux1","aeelvola_prueba");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$result = mysqli_query($con,"SELECT * FROM articulos ORDER BY codigo_original ASC");

//$result = mysqli_query($con,"SELECT articulos.codigo_original,articulos.stock-sum(det_fra.unidades) as TOTAL FROM det_fra,articulos,facturas where articulos.codigo_original=det_fra.codigo_original and det_fra.cod_fra=facturas.cod_fra  and facturas.anulada=0;");
$result =mysqli_query($con,"SELECT P.codigo_original,
IFNULL(E.total_entradas,0) entradas,
IFNULL(S.total_salidas,0) salidas,
IFNULL(E.total_entradas,0)-IFNULL(S.total_salidas,0) stock FROM articulos P 
LEFT JOIN 
(SELECT codigo_original,SUM(cantidad) total_entradas FROM movimiento
GROUP BY codigo_original) E
ON P.codigo_original=E.codigo_original
LEFT JOIN 
(SELECT codigo_original, SUM(unidades) total_salidas FROM det_fra
GROUP BY codigo_original) S


ON P.codigo_original=S.codigo_original 

where P.codigo_original=$cadena;



  ");


while($row = mysqli_fetch_array($result)) {
  echo "<tr>";

  echo "<td>" . $row['stock'] . "</td>";

 
  

  



               


  echo "</tr>";
}


?>

</table>