<table class="table table-bordered">
  <thead>
    <tr class="danger">
      <th>Codigo</th>
      <th>Razon Social</th>
    
      <th>Ruc</th>
      <th>Nombre Contacto</th>
      <th>Apellidos Contacto</th>
    </tr>
  </thead>

  <tbody>


<?php 


 $con=mysqli_connect("localhost","root","Flealinux1","aeelvola_prueba");

 //Check connection

 if (mysqli_connect_errno()) {

   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

$result = mysqli_query($con,"SELECT * FROM clientes ORDER BY tx_apellidos ASC");


while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['id_clientes'] . "</td>";
  echo "<td>" . $row['rz_social'] . "</td>";
  
  echo "<td>" . $row['ruc'] . "</td>";
  echo "<td>" . $row['tx_nombre'] . "</td>";
  echo "<td>" . $row['tx_apellidos'] . "</td>";

  echo "</tr>";
}

mysqli_close($con);
?>
</tbody>
</tbody></tbody>
</table>