<table class="table table-striped">
  <thead>
    <tr>
      <th>Codigo </th>
      <th>Codigo Original </th>
      <th>TIPO MOV</th>
      <th>Cantidad</th>
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

$result = mysqli_query($con,"Select * From movimiento WHERE DATE(fecha)  BETWEEN  '2014-06-18' AND '2014-07-29';");



while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['id_movimiento'] . "</td>";
  echo "<td>" . $row['codigo_original'] . "</td>";
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