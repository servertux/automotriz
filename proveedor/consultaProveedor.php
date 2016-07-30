<table class="table table-bordered">
  <thead>
    <tr class="default">
      <th>Codigo</th>
      <th>Razon Social</th>
      <th>Direccion</th>
      <th>Ruc</th>
      <th>Telefono</th>
      <th>Nombres</th>
      <th>Apellidos</th>
    </tr>
  </thead>

  <tbody>


<?php 


 $con=mysqli_connect("localhost","root","Flealinux1","aeelvola_prueba");

 //Check connection

 if (mysqli_connect_errno()) {

   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

$result = mysqli_query($con,"SELECT * FROM proveedores ORDER BY rz_social ASC");


while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['id_proveedores'] . "</td>";
  echo "<td>" . $row['rz_social'] . "</td>";
  echo "<td>" . $row['direccion'] . "</td>";
  echo "<td>" . $row['ruc'] . "</td>";
  echo "<td>" . $row['telefono'] . "</td>";
  echo "<td>" . $row['tx_nombre'] . "</td>";
  echo "<td>" . $row['tx_apellidos'] . "</td>";

  echo "</tr>";
}

mysqli_close($con);
?>
</tbody>
</tbody></tbody>
</table>