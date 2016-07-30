<?php include("includes/header.php")?>





<?php

    //session_start();
    include "conexion.php";
    $query = $_GET['cadena']; 

    
    $min_length = 3;
    
     
    if(strlen($query) >= $min_length){ 
        $query = htmlspecialchars($query); 
        $query = mysql_real_escape_string($query);
        $raw_results = mysql_query("SELECT * FROM articulos WHERE codigo_original='$query' OR codigo_interno='$query'") or die(mysql_error());
             
         
        if(mysql_num_rows($raw_results) > 0){ 
         
            while($results = mysql_fetch_array($raw_results)){
             
                ?>

                <form role="form" name="frmArticulos" method="post" action="articulos/ActualizaIdArticulo.php" id="formulario" enctype="multipart/form-data" autocomplete="off">


  <div class="form-group">
      <h4 align="center">MANTENIMIENTO DE ARTICULOS</h4>
        <br>
        
        <table>

          <tr>
            <td>Codigo</td>
            <td>
        
               
              
              <input type="text" name="cod" size="40" id="codigo"  value="<?php echo $results['codigo_original'];?>" class="form-control input-sm" readonly="readonly">
              <input type="text" name="cod2" size="40" id="codigo"  value="<?php echo $results['codigo_original'];?>" class="form-control input-sm"> 


            </td>
            <td rowspan="4" align="center">
              <img src="<?php echo $results['imagen_1'];?>" style="max-width: 50%;" />
            </td>
            <td rowspan="4" align="center">
              <img src="<?php echo $results['diagrama'];?>"/>
            </td>
            <td rowspan="4">
            </td>
            
           
            
      
          </tr>
          <tr>
            <td>Codigo Elvolante</td>
            <td>
              <input type="text"   name="codigointerno" value="<?php echo $results['codigo_interno'];?>"  class="form-control input-sm">
            </td>

          </tr>
          <tr>

            <td>Nombre Articulo</td>
            <td>
              <input type="text"  name="nombrearticulo"  value="<?php echo $results['nombre'];?>"  class="form-control input-sm">
            </td>

          </tr>
           

           <tr>

            <td>Caracteristicas</td>
            <td>
              <input type="text"  name="caracteristicas"  value="<?php echo $results['caracteristicas'];?>"  class="form-control input-sm">
            </td>

          </tr>

          <tr>

            <td>Medidas</td>
            <td>
              <input type="text"  name="medidas"  value="<?php echo $results['medidas'];?>"  class="form-control input-sm">
            </td>

          </tr>
          
           



          




          <tr>

            <td>Precio Unitario</td>
            <td>
              <input type="text" name="preciounitario" value="<?php echo $results['precio_unitario'];?>"  class="form-control input-sm">
            </td>
            
          </tr>

          <tr>

            <td>Precio Costo</td>
            <td>
              <input type="text"  name="preciocosto"  value="<?php echo $results['precio_costo'];?>" class="form-control input-sm"><br>
            </td>
            <td colspan="4" rowspan="4" align="right">
              <img src="<?php echo $results['dimension'];?>" />
            </td>

           
          </tr>

            
            <tr>
            <td></td>  
            </tr>


      


          
            <td colspan="2" align="center">

                  <input type="submit" value="Actualizar Articulo" class="btn btn-primary btn-lg btn-block">

                  <input type="button" value="Cancelar" formaction="verArticulos.php" onclick="window.location='verArticulos.php'" class="btn btn-default btn-lg btn-block">
            </td>


            <tr>
              
            </tr>


            
        </table>
        
        
      



        </div>

        

</form>

<form role="form" name="frmActualizarimagenes" method="post" action="ActualizarImagenesArticulo.php" id="formulario"> 
<input type="hidden" name="cod" size="40" id="codigo"  value="<?php echo $results['codigo_original'];?>">
<input type="submit" value="Actualizar Imagenes..." class="btn btn-deafult btn-sm">

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