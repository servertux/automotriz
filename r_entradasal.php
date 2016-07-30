<?php include("includes/header.php")?>

<div class="row">
	<div class="col-md-6 col-md-offset-3"> 
<h3><span class="label label-warning">Reporte Recepcion de Entradas</span></h3>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-body">


	<form name="frmEntradas" method="get" action="">
		
		<div class="row">
				<div class="col-md-1">
				<h5><p class="text-right">Desde</p></h5>
				</div>

			 	<div class="col-md-4">
				 	<input type="date"  name="fechaminima" class="form-control">
				</div>

				<div class="col-md-1">
				<h5><p class="text-right">Hasta</p></h5>
				</div>



				<div class="col-md-4">
				 	<input type="date"  name="fechamaxima" class="form-control">
				</div>
		    
			    <div class="col-md-2">
			    	
					  
					  <input type="submit" value="Buscar" class="btn btn-primary" >

					
			    </div>


		</div>
	</form>

	</div>
</div>

<!--

/*

		<div class="row">

		 	<div class="col-md-3">

				
				
				<select name="meses" class="form-control">
						<option value="01">Enero</option>
						<option value="02">Febrero</option>	
						<option value="03">Marzo</option>	
					 	<option value="04">Abril</option>	
					 	<option value="05">Mayo</option>	
					 	<option value="06">Junio</option>	
					 	<option value="07">Julio</option>	
			 		 	<option value="08">Agosto</option>	
						<option value="09">Setiembre</option>
						<option value="10">Octubre</option>
						<option value="11">Noviembre</option>
						<option value="12">Diciembre</option>
				</select>


			</div>
			
			<div class="col-md-3">
			<select name="anios" class="form-control">
						<option value="2010">2010</option>
						<option value="2011">2011</option>
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>



				</select>
			</div>

			<div class="col-md-3">
				<button type="button" class="btn btn-primary">Buscar por Mes</button>
			</div>
		  
		</div>	
		
*/
-->
			
<table class="table table-striped">
  <thead>
    <tr>
      <th>Codigo </th>
      <th>Codigo Original </th>
      <th>Nombre</th>
      <th>Tipo Movimiento</th>
      <th>Cantidad</th>
      <th>Fecha de Ingreso/Egreso</th>
      
    </tr>
  </thead>

  <tbody>




<?php
	//session_start();
    include "conexion.php";
   // $fechamax = $_GET['fechamaxima'];
    $fechamax=(isset($_GET['fechamaxima']))? $_GET['fechamaxima']:0;

    //$fechamin = $_GET['fechaminima'];
    $fechamin=(isset($_GET['fechaminima']))? $_GET['fechaminima']:0;

 //$query   = (isset($_GET['cadena'])) ? $_GET['cadena'] : 0;

$con=mysqli_connect("localhost","root","Flealinux1","aeelvola_prueba");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$result = mysqli_query($con,"Select movimiento.id_movimiento,movimiento.codigo_original,articulos.nombre,movimiento.tipo_movimiento,movimiento.cantidad,movimiento.fecha
From movimiento,articulos WHERE DATE(fecha)  BETWEEN  '$fechamin' AND '$fechamax' AND articulos.codigo_original=movimiento.codigo_original
ORDER BY fecha DESC");

 
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







<?php
echo "<p> <strong>Consulta realizada</strong> - De " . $fechamin ."  Al ". $fechamax."</p>";

?>
					
			



  </body>
</html>