<?php include("includes/header.php")?>

<section  class="flexbox">

</section>



      
     <div class="flexbox">

  <div class="col-lg-6">

     <p><h3>Recepcion de Articulos</h3></p>


		<form name="frmRecepcion" method="get" autocomplete="off">

			 <div class="input-group">

              <input type="text" name="cadena" class="form-control">
                 
                  <span class="input-group-btn">
                  
                  <input type="submit" name="submit" value="Buscar" class="btn btn-primary">
                  </span>



      </div>
		
		</form>



<form name="frmrecepcion" method="post" action="articulos/stock.php">


<table >
  <tbody>


<?php

    //session_start();

if( ! $_SESSION)
{
    session_start();
} 




	

    include "conexion.php";
    
    //$variable = (isset($_GET['variable'])) ? $_GET['variable'] : 0;

    	//$query = $_GET['cadena']; 
     $query   = (isset($_GET['cadena'])) ? $_GET['cadena'] : 0;

    $min_length = 3;
    
     
    if(strlen($query) >= $min_length){ 
        $query = htmlspecialchars($query); 
         
        $query = mysql_real_escape_string($query);
         //HACE LA BUSQUEDA DEL ARTICULO PARA LA RECEPCION
        $raw_results = mysql_query("SELECT * FROM articulos WHERE codigo_original='$query' or codigo_interno='$query'") or die(mysql_error());
             
         
        if(mysql_num_rows($raw_results) > 0){ 
            while($results = mysql_fetch_array($raw_results)){
             
                ?>

                  
                    <tr>
                        
<td><h4>

	<tr>
		<td>

			Codigo:
		</td>
		<td>
			<input type="text" name="codigo_o" readonly="readonly" value="<?php echo $results['codigo_original']; ?>"  class="form-control">
			<?php echo $results['nombre']; ?> 
		</td>
	</tr>

	<tr>
		<td>
			Tipo:
		</td>
	
		<td>
				<select name="tipo" class="form-control">
					<option value="ENTRADA">Entrada</option>
				 	<option value="SALIDA">Salida</option>	
				</select>
		</td>

	</tr>
	
	<tr>
	<td>
	Cantidad:
	</td>
	<td>
	<input type="text" name="cantidad" class="form-control">
	</td>
	</tr>
	<tr>
		<td>
		Fecha:
		</td>

		<td>
			<input type="datetime" name="fecha"  value="<?php
		        // Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
		        date_default_timezone_set('America/Lima');
		        //Imprimimos la fecha actual dandole un formato
		       //echo date("Ymd");
		       echo date("Y-m-d H:i:s");       
		        ?>" class="form-control">
		</td>
		
	</tr>

	
		<tr>                  
    


			<td>
            <input type="submit" name="submit" value="Guardar" class="btn btn-primary btn-lg btn-block">
            </td>	
                    
		</tr>
            <?php 


                     
                        

                       










               
            }
             
        }
        else{ 
            echo "No se encontro coincidencias";
        }
         
    }
    else{ 
    }
?>






</tbody>

</table>

</form>






</div>
</div>

<?php include("articulos/consultaRecepcion.php")?>

</body>
</html>


