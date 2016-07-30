<?php include("includes/header.php")?>

<section  class="flexbox">


<?php include("clientes/menuClientes.php")?>


</section>


<div class="flexbox">

  <div class="col-lg-6">

     <p><h3>Busqueda de Clientes</h3></p>
  

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

    session_start();
    include "conexion.php";
    $query = $_GET['cadena']; 

    
    $min_length = 3;
    
     
    if(strlen($query) >= $min_length){ 
        $query = htmlspecialchars($query); 
        $query = mysql_real_escape_string($query);
        $raw_results = mysql_query("SELECT * FROM clientes
            WHERE (`tx_nombre` LIKE '%".$query."%') OR (`tx_apellidos` LIKE '%".$query."%') OR (`ruc` LIKE '%".$query."%') OR (`rz_social` LIKE '%".$query."%')") or die(mysql_error());
             
         
        if(mysql_num_rows($raw_results) > 0){ 
         
            while($results = mysql_fetch_array($raw_results)){
             
                ?>

          <tr>
                        
                  <td ><h3><a href="FichaTecnica.php?cadena=<?php echo $results['codigo_original'];?>&submit=Enviar" TARGET="_blank"><img src="<?php echo $results['imagen_1']; ?>" width="30" height="36"/><span class="label label-success"><?php echo $results['codigo_original']." - ". $results['nombre']; ?></span></a>   <FONT FACE="arial" SIZE=3 COLOR=black><?php echo $results['marca'] ;?></FONT></h3></td>             

                
                 

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
