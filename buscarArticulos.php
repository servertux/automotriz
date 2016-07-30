 <script type="text/javascript">
function confirm_delete(){

    return confirm('¿Esta seguro de Eliminar este Articulo?');
}
</script>

<?php include("includes/header.php")?>



<section  class="flexbox">


<?php include("articulos/menuArticulos.php")?>


</section>


<div class="flexbox">

  <div class="col-lg-6">

     <p><h3>Busqueda de Articulos</h3></p>
  

  <form name="frmimagenes" method="get" action="">

       <div class="input-group">

              <input type="text" name="cadena" class="form-control">
                 
                  <span class="input-group-btn">
                  
                  <input type="submit" name="submit" value="Enviar" class="btn btn-primary">
                  </span>



      </div>
                
    </form>

  </div>
</div>


<table >
  <tbody>




<?php

    //session_start();
    include "conexion.php";
   
   // $query = $_GET['cadena']; 
    $query   = (isset($_GET['cadena'])) ? $_GET['cadena'] : 0;
    
    $min_length = 2;
    
     
    if(strlen($query) >= $min_length){ 
        $query = htmlspecialchars($query); 
        $query = mysql_real_escape_string($query);
        $raw_results = mysql_query("SELECT * FROM articulos
         
            WHERE (`nombre` LIKE '%".$query."%') OR (`codigo_original` LIKE '%".$query."%') OR (`codigo_interno` LIKE '%".$query."%') OR (`marca` LIKE '%".$query."%') OR (`caracteristicas` LIKE '%".$query."%') OR (`medidas` LIKE '%".$query."%')") or die(mysql_error());


         //WHERE (`nombre` LIKE '%".$query."%') OR (`codigo_original` LIKE '%".$query."%') OR (`codigo_interno` LIKE '%".$query."%') OR (`marca` LIKE '%".$query."%')") or die(mysql_error());
             
         
        if(mysql_num_rows($raw_results) > 0){ 
         
            while($results = mysql_fetch_array($raw_results)){
             
                ?>

          <tr>
                        
                  <td ><h3><a href="FichaTecnica.php?cadena=<?php echo $results['codigo_original'];?>&submit=Enviar" TARGET="_blank"><img src="<?php echo $results['imagen_1']; ?>" width="30" height="36"/><span class="label label-success"><?php echo $results['codigo_original']." - ". $results['nombre']; ?></span></a>   <FONT FACE="arial" SIZE=3 COLOR=black> <?php echo $results['caracteristicas']." - ". $results['medidas'];?> </FONT></h3></td>             

                
                 

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
