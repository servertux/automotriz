<table class="table table-striped">
  <thead>
    <tr>
      <th>ID Proveedor</th>
      <th>Razon Social</th>
      <th>RUC</th>
      <th>Direccion</th>
      <th>Telefono</th>
      
            
    </tr>
  </thead>

  <tbody>


<?php
$con=mysqli_connect("localhost","root","Flealinux1","aeelvola_prueba");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,"select id_proveedores,rz_social,ruc,direccion,telefono from proveedores
  ");



while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['id_proveedores'] . "</td>";
  echo "<td>" . $row['rz_social'] . "</td>";
  echo "<td>" . $row['ruc'] . "</td>";
  echo "<td>" . $row['direccion'] . "</td>";
  echo "<td>" . $row['telefono'] . "</td>";
  
               


  echo "</tr>";
}

mysqli_close($con);
?>





</tbody>
</tbody></tbody>
</table>