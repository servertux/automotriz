<?php include("includes/header.php")?>

<div class="flexbox">



<?php

   //ession_start();
    include "conexion.php";
    $query = $_GET['cadena']; 

    
    $min_length = 1;
    
     
    if(strlen($query) >= $min_length){ 
        $query = htmlspecialchars($query); 
        $query = mysql_real_escape_string($query);
        $raw_results = mysql_query("SELECT * FROM clientes WHERE id_clientes='$query'") or die(mysql_error());
             
         
        if(mysql_num_rows($raw_results) > 0){ 
         
            while($results = mysql_fetch_array($raw_results)){
             
                ?>

                <form role="form" name="frmArticulos" method="post" action="clientes/ActualizarIdCliente.php" id="formulario" enctype="multipart/form-data" autocomplete="off">


  <div class="form-group">
      <h4 align="center">MANTENIMIENTO DE CLIENTES</h4>
        <br>
        
        <table >

          <tr>
            <td>Codigo</td>
            <td>
              <input type="text" name="cod" size="40" id="codigo" readonly="readonly" value="<?php echo $results['id_clientes'];?>" class="form-control">
            </td>
           
            
           
            
      
          </tr>
          <tr>
            <td>Nombre Cliente</td>
            <td>
              <input type="text"   name="nombre" value="<?php echo $results['tx_nombre'];?>"  class="form-control">
            </td>

          </tr>
          <tr>

            <td>Apellido Cliente</td>
            <td>
              <input type="text"  name="apellidos"  value="<?php echo $results['tx_apellidos'];?>"  class="form-control">
            </td>

          </tr>

          <tr>

            <td>Razon Social</td>
            <td>
              <input type="text" name="razon" value="<?php echo $results['rz_social'];?>"  class="form-control">
            </td>
            
          </tr>

          <tr>

            <td>RUC</td>
            <td>
              <input type="text"  name="ruc"  value="<?php echo $results['ruc'];?>" class="form-control">
            </td>
            

            


          </tr>

          <tr>

            <td>Direccion</td>
            <td>
              <input type="text" name="direccion" value="<?php echo $results['direccion'];?>" class="form-control">
            </td>



            </tr>

            <tr>

            <td>Telefono</td>
            <td>
              <input type="text" name="telefono" value="<?php echo $results['telefono'];?>" class="form-control">
            </td>



            </tr>



            
            <tr>
            <td></td>  
            </tr>


      


          
            <td colspan="2" align="center">

                  <input type="submit" value="Actualizar Cliente" class="btn btn-primary btn-lg btn-block">

                  <input type="button" value="Cancelar" formaction="_articulos_eliminar.php" onclick="window.location='_clientes_eliminar.php'" class="btn btn-default btn-lg btn-block">
            </td>


            <tr>
              
            </tr>


            
        </table>
        
        
      



        </div>

        

</form>

</div>






         
            
      
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