<?php include("includes/header.php")?>





<?php

  //  session_start();
    include "conexion.php";
    $query = $_POST['cod']; 

    
    $min_length = 3;
    
     
    if(strlen($query) >= $min_length){ 
        $query = htmlspecialchars($query); 
        $query = mysql_real_escape_string($query);
        $raw_results = mysql_query("SELECT * FROM articulos WHERE codigo_original='$query' OR codigo_interno='$query'") or die(mysql_error());
             
         
        if(mysql_num_rows($raw_results) > 0){ 
         
            while($results = mysql_fetch_array($raw_results)){
             
                ?>

                <form role="form" name="frmArticulos2" method="post" action="ActualizaIdArticuloimagen.php" id="formulario2" enctype="multipart/form-data" autocomplete="off">


  <div class="form-group">
      <h4 align="center">MANTENIMIENTO DE ARTICULOS</h4>
        <br>
        
        <table>
        <tr>
        <input type="text" name="cod" value="<?php echo $results['codigo_original'];?>" class="form-control">
            

            <td>Subir Imagen 1</td>
              <td>
              <input type="file" name="imagen" class="form-control input-sm"/>
              </td>
          </tr>

          <tr>
            <td>Subir Imagen 2</td>
            <td>
            <input  type="file" name="imagen2" class="form-control input-sm"/>
            </td>
          </tr>


          <tr>
            <td>Subir Imagen 3</td>
            <td>
            <input  type="file" name="imagen3" class="form-control input-sm"/>

            </td>
          </tr>



          <tr>

            <td><strong>Subir Diagrama</strong></td>
            <td>
            <input  type="file" name="diagrama" class="form-control input-sm"/>

            </td>
          </tr>

          <tr>

            <td><strong>Subir Dimension</strong></td>
            <td>
            <input  type="file" name="dimension" class="form-control input-sm"/>

            </td>
          </tr>


            <td colspan="2" align="center">

                  <input type="submit" value="Actualizar Articulo" class="btn btn-primary btn-lg btn-block">

                  <input type="button" value="Cancelar" formaction="_articulos_eliminar.php" onclick="window.location='_articulos_eliminar.php'" class="btn btn-default btn-lg btn-block">
            </td>


            <tr>
              
            </tr>


            
        </table>
        
        
      



        </div>

        

</form>







         
            
      
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

     










</body>
</html>