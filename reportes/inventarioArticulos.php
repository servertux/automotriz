<table class="table table-striped">
  <thead>
    <tr>
      <th>Codigo Original</th>
      <th>Codigo Elvolante</th>
      <th>Nombre Articulo</th>
      <th>Total Entradas</th>
      <th>Total Salidas</th>
      
      <th>Cantidad</th>
            
    </tr>
  </thead>

  <tbody>


<?php
$con=mysqli_connect("localhost","root","Flealinux1","aeelvola_prueba");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,"SELECT P.codigo_original,P.codigo_interno,P.nombre,P.precio_unitario,P.imagen_1,P.dimension, IFNULL( E.total_entradas, 0 ) entradas, IFNULL( S.total_salidas, 0 ) salidas, IFNULL( E.total_entradas, 0 ) - IFNULL( S.total_salidas, 0 ) stock
FROM articulos P
LEFT JOIN (

SELECT codigo_original, SUM( cantidad ) total_entradas
FROM movimiento
GROUP BY codigo_original
)E ON P.codigo_original = E.codigo_original
LEFT JOIN (

SELECT codigo_original, SUM( unidades ) total_salidas
FROM det_fra
GROUP BY codigo_original
)S ON P.codigo_original = S.codigo_original


 ORDER BY P.nombre

  ");

//
//084 059 033  

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['codigo_original'] . "</td>";
  echo "<td>" . $row['codigo_interno'] . "</td>";
  echo "<td>" . $row['nombre'] . "</td>";
  echo "<td>" . $row['entradas'] . "</td>";
  echo "<td>" . $row['salidas'] . "</td>";
  echo "<td>" . $row['stock'] . "</td>";
               


  echo "</tr>";
}

mysqli_close($con);
?>
</tbody>
</tbody></tbody>
</table>