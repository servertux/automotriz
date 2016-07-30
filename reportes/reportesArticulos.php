<table class="table table-striped">
  <thead>
    <tr>
      <th>Numero de Documento</th>
      <th>Nombre Producto</th>
      <th>CODIGO</th>
      <th>Cantidad Comprada</th>
      <th>Subtotal</th>
      <th>Igv</th>
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


$result = mysqli_query($con,"select det_fra.cod_fra,articulos.nombre,det_fra.codigo_original,det_fra.unidades,det_fra.valor_venta,det_fra.igv,det_fra.valor_venta+det_fra.igv as Total from det_fra,articulos
where articulos.codigo_original=det_fra.codigo_original order by det_fra.cod_fra
  ");



while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['cod_fra'] . "</td>";
  echo "<td>" . $row['nombre'] . "</td>";
  echo "<td>" . $row['codigo_original'] . "</td>";
  echo "<td>" . $row['unidades'] . "</td>";
  echo "<td>S/." . $row['valor_venta'] . "</td>";
  echo "<td>S/." . $row['igv'] . "</td>";
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