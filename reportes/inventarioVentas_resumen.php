<table class="table table-striped">
  <thead>
    <tr>
      <th>Numero de Factura</th>
      <th>FECHA</th>
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


$result = mysqli_query($con,"select facturas.cod_fra as factura,facturas.fecha, sum(det_fra.valor_venta)+ sum(det_fra.igv) as Total from det_fra,facturas where det_fra.cod_fra=facturas.cod_fra group by facturas.fecha
	 ORDER BY facturas.fecha DESC

  ");



while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['factura'] . "</td>";
  echo "<td>" . date("d-m-Y",strtotime($row['fecha'])) . "</td>";
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