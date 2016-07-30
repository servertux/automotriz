<?php include("includes/header.php")?>
<script type="text/javascript">
function confirm_delete(){

    return confirm('¿Esta seguro de Eliminar este Articulo?');
}
</script>


<section  class="flexbox">


<?php include("articulos/menuArticulos.php")?>


</section>


<div class="flexbox">

  <div class="col-lg-6">

     <p><h3> Actualizar/Borrar Articulos</h3></p>
  

  <form name="frmimagenes" method="post" action="">
  <!-- // form name="frmimagenes" method="post" action="articulos/BorrarArticulo.php" */ -->

       <div class="input-group">

              <input type="text" name="cadena" class="form-control">
                 
                  <span class="input-group-btn">
                  
                  <input type="submit" name="submit" value="Enviar" class="btn btn-primary">
                  </span>



      </div>
                
    </form>



    



  </div>
</div>



<table class="table table-striped">
  <tbody>
    <tr>
      <th></th>
      <th>Codigo</th>
      <th>Nombre</th>
      <th><img src="images/_delete.png">ELIMINAR</th>
      <th><img src="images/write.png">MODIFICAR</th>
      
    </tr>
    

<?php

    //session_start();
if( ! $_SESSION)
{
    session_start();
} 


    include "conexion.php";
    //$query = $_POST['cadena']; 
  $query   = (isset($_POST['cadena'])) ? $_POST['cadena'] : 0;
    
    $min_length = 3;
    
     
    if(strlen($query) >= $min_length){ 
        $query = htmlspecialchars($query); 
        $query = mysql_real_escape_string($query);
        $raw_results = mysql_query("SELECT * FROM articulos
            WHERE (`nombre` LIKE '%".$query."%') OR (`codigo_original` LIKE '%".$query."%') OR (`codigo_interno` LIKE '%".$query."%')") or die(mysql_error());
             
         
        if(mysql_num_rows($raw_results) > 0){ 
         
            while($results = mysql_fetch_array($raw_results)){
             
                ?>

          <tr>
                        
                  <td align="center"><img src="<?php echo $results['imagen_1']; ?>" width="26" height="32"/></td>             
                  <td><?php echo $results['codigo_original'];?></td>
                  <td><?php echo $results['nombre'];?></td>
                  <td><a href="articulos/BorrarArticulo.php?cadena=<?php echo $results['codigo_original'];?>" onclick="return confirm_delete()" > <img src="images/_delete.png">Eliminar</a></td>
                  <td><a href="ActualizarArticulo.php?cadena=<?php echo $results['codigo_original'];?>"><img src="images/write.png">Modificar</a></td>
                
                 

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







  </body>
</html>
