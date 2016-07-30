<table class="table table-striped">
  <thead>
    <tr>
      <th>Numero de Documento</th>
      <th>Razon Social</th>
      <th>Fecha</th>
      <th>Tipo de Documento</th>
      
      <th>TOTAL</th>
            
    </tr>
  </thead>

  <tbody>


<?php
$con=mysqli_connect("localhost","root","Flealinux1","aeelvola_prueba");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,"select facturas.cod_fra,clientes.rz_social,facturas.fecha,facturas.cod_act,sum(det_fra.valor_venta+det_fra.igv) as Total 
from facturas,clientes,det_fra where facturas.id_clientes=clientes.id_clientes and det_fra.cod_fra=facturas.cod_fra GROUP BY facturas.cod_fra order by facturas.cod_fra DESC

  ");



while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['cod_fra'] . "</td>";
  echo "<td>" . $row['rz_social'] . "</td>";
  echo "<td>" . date("d-m-Y",strtotime($row['fecha'])) . "</td>";
  echo "<td>" . $row['cod_act'] . "</td>";
  echo "<td>S/." . $row['Total'] . "</td>";
 


  echo "</tr>";
}

mysqli_close($con);
?>

<?php
$con=mysqli_connect("localhost","root","Flealinux1","aeelvola_prueba");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,"select (sum(det_fra.valor_venta) + sum(det_fra.igv)) as TOTAL  from det_fra,facturas where det_fra.cod_fra=facturas.cod_fra    
  ");



while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td><strong> TOTAL VENTAS: S/." . $row['TOTAL'] . "</strong></td>";
               


  echo "</tr>";
}

mysqli_close($con);
?>



</tbody>
</tbody></tbody>
</table>