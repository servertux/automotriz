 <script type="text/javascript">
function confirm_delete(){

    return confirm('¿Esta seguro de Eliminar este Articulo?');
}
</script>

 <table class="table table-striped">
  <thead>
    <tr class="success">
      <th>Codigo Original</th>
      <th>Codigo Elvolante</th>
      <th>Nombre del Articulo</th>
      <th>Cantidad</th>
      <th>Precio Unitario</th>
     
      <th ><img src="images/_delete.png"></th>
      <th><img src="images/write.png"></th>
      
      
    </tr>
  </thead>

  <tbody>


<?php
$con=mysqli_connect("localhost","root","Flealinux1","aeelvola_prueba");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$result = mysqli_query($con,"SELECT * FROM articulos ORDER BY codigo_original ASC");

//$result = mysqli_query($con,"SELECT articulos.codigo_original,articulos.stock-sum(det_fra.unidades) as TOTAL FROM det_fra,articulos,facturas where articulos.codigo_original=det_fra.codigo_original and det_fra.cod_fra=facturas.cod_fra  and facturas.anulada=0;");
$result =mysqli_query($con,"SELECT P.codigo_original,P.codigo_interno,P.nombre,P.precio_unitario,P.imagen_1,P.dimension, IFNULL( E.total_entradas, 0 ) entradas, IFNULL( S.total_salidas, 0 ) salidas, IFNULL( E.total_entradas, 0 ) - IFNULL( S.total_salidas, 0 ) stock
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




  ");


while($row = mysqli_fetch_array($result)) {
  
?>

<tr>
<td ><a href="FichaTecnica.php?cadena=<?php echo $row['codigo_original'];?>&submit=Enviar" TARGET="_blank"><?php echo $row['codigo_original'];?></a> 
</td>

<td ><a href="FichaTecnica.php?cadena=<?php echo $row['codigo_original'];?>&submit=Enviar" TARGET="_blank"><?php echo $row['codigo_interno'];?></a> 
</td>

<td ><a href="FichaTecnica.php?cadena=<?php echo $row['codigo_original'];?>&submit=Enviar" TARGET="_blank"><?php echo $row['nombre'];?></a> 
</td>


<td>
<?php echo $row['stock'];?>  
</td>

<td>
<?php echo $row['precio_unitario'];?>  
</td>



<td>
  <a href="articulos/BorrarArticulo2.php?cadena=<?php echo $row['codigo_original'];?>" onclick="return confirm_delete()" >
  <img src="images/_delete.png"></a>
</td>
<td>
  <a href="ActualizarArticulo2.php?cadena=<?php echo $row['codigo_original'];?>">
  <img src="images/write.png"></a>
</td>


  



  <?php       


  echo "</tr>";
}

mysqli_close($con);
?>
</tbody>
</tbody></tbody>
</table>