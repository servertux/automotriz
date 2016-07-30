<?php include("includes/header.php")?>
<script type="text/javascript">
function confirm_delete(){

    return confirm('¿Esta seguro de Eliminar este Proveedor?');
}
</script>


<section  class="flexbox">


<?php include("proveedor/menuproveedor.php")?>


</section>


<div class="flexbox">

  <div class="col-lg-6">

     <p><h3> Actualizar/Borrar Proveedores</h3></p>
  

  <form name="frmproveedor" method="post" action="">
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
      
      
      <th>Razon Social</th>
      <th>RUC</th>
      <th>Direccion</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Codigo</th>
      
      <th><img src="images/_delete.png">ELIMINAR</th>
      <th><img src="images/write.png">MODIFICAR</th>
      
    </tr>
    

<?php

    //session_start();
    include "conexion.php";
    //$query = $_POST['cadena']; 

$query   = (isset($_POST['cadena'])) ? $_POST['cadena'] : 0;

    
    $min_length = 3;
    
     
    if(strlen($query) >= $min_length){ 
        $query = htmlspecialchars($query); 
        $query = mysql_real_escape_string($query);
        $raw_results = mysql_query("SELECT * FROM proveedores
            WHERE (`tx_nombre` LIKE '%".$query."%') OR (`rz_social` LIKE '%".$query."%') OR (`ruc` LIKE '%".$query."%')") or die(mysql_error());
             
         
        if(mysql_num_rows($raw_results) > 0){ 
         
            while($results = mysql_fetch_array($raw_results)){
             
                ?>

          <tr>
                        
                               
                  
                  <td><?php echo $results['rz_social'];?></td>
                  <td><?php echo $results['ruc'];?></td>
                  <td><?php echo $results['direccion'];?></td>
                  <td><?php echo $results['tx_nombre'];?></td>
                  <td><?php echo $results['tx_apellidos'];?></td>
                  <td><?php echo $results['id_proveedores'];?></td>
                 
                  
                  <td><a href="proveedor/BorrarProveedor.php?cadena=<?php echo $results['id_proveedores'];?>" onclick="return confirm_delete()" > <img src="images/_delete.png">Eliminar</a></td>
                  <td><a href="ActualizarProveedor.php?cadena=<?php echo $results['id_proveedores'];?>"><img src="images/write.png">Modificar</a></td>
                
                 

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
