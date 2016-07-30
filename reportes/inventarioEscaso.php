<table class="table table-striped">
  <thead>
    <tr>
      <th>Codigo Original</th>
      <th>Codigo Elvolante</th>
      <th>Nombre Articulo</th>
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



$result = mysqli_query($con,"select*from articulos where stock<=1");



while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['codigo_original'] . "</td>";
  echo "<td>" . $row['codigo_interno'] . "</td>";
  echo "<td>" . $row['nombre'] . "</td>";
  echo "<td>" . $row['stock'] . "</td>";
               


  echo "</tr>";
}

mysqli_close($con);
?>
</tbody>
</tbody></tbody>
</table>