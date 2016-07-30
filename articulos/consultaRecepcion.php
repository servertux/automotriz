<table class="table table-striped">
  <thead>
    <tr>
      <th>Codigo Movimiento</th>
      <th>Codigo </th>
      <th>Nombre</th>
      <th>Tipo</th>
      <th>Cantidad Ingresada</th>
      <th>Fecha de Ingreso</th>
      
    </tr>
  </thead>

  <tbody>


<?php
$con=mysqli_connect("localhost","root","Flealinux1","aeelvola_prueba");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM movimiento,articulos WHERE articulos.codigo_original=movimiento.codigo_original ORDER BY id_movimiento DESC");



while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['id_movimiento'] . "</td>";
  echo "<td>" . $row['codigo_original'] . "</td>";
  echo "<td>" . $row['nombre'] . "</td>";
  echo "<td>" . $row['tipo_movimiento'] . "</td>";
  echo "<td>" . $row['cantidad'] . "</td>";
  echo "<td>" . $row['fecha'] . "</td>";
  

  echo "</tr>";
}

mysqli_close($con);
?>
</tbody>
</tbody></tbody>
</table>