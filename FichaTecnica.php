
<?php include("includes/MenuFicha.php")?>



<section  class="flexbox">
<img src="images/configurar.png">
<br>

<p><h2> Ficha del Producto </h2></p>

</section>




<section id="examples" class="examples-section">
    <div class="container">
      
            <div class="row">
 
      



     

<?php 

if ($_GET["submit"])
{


session_start();
include "conectar_robert_bd.php";  
  


$cadena=$_GET["cadena"];
  if($cadena==null)
  {
    echo "<h1>ERROR!!</h1>";
    echo "<h2>Debe escribir un codigo en la Casilla<br/></h2>";
?>

<?php 


  }
  else
  {


   # $sql="select articulos.codigo_original,articulos.nombre,articulos.stock,articulos.imagen_1,articulos.imagen_2,articulos.imagen_3,ficha.T,ficha.G,ficha.L,ficha.SPL,ficha.ID,ficha.D,articulos.codigo_interno,articulos.precio_unitario from articulos,ficha where articulos.codigo_original = ficha.codigo_original and articulos.codigo_original='$cadena'";
    
    
    $sql="select articulos.codigo_original,articulos.nombre,articulos.stock,articulos.imagen_1,articulos.imagen_2,articulos.imagen_3,articulos.codigo_interno,articulos.precio_unitario,articulos.diagrama,articulos.dimension,articulos.caracteristicas,articulos.medidas,articulos.caracteristicas2 from articulos where  articulos.codigo_original='$cadena'";
    $sql2="SELECT P.codigo_original,
          IFNULL(E.total_entradas,0) entradas,
          IFNULL(S.total_salidas,0) salidas,
          IFNULL(E.total_entradas,0)-IFNULL(S.total_salidas,0) stock FROM articulos P 
          LEFT JOIN 
          (SELECT codigo_original,SUM(cantidad) total_entradas FROM movimiento
          GROUP BY codigo_original) E
          ON P.codigo_original=E.codigo_original
          LEFT JOIN 
          (SELECT codigo_original, SUM(unidades) total_salidas FROM det_fra
          GROUP BY codigo_original) S


          ON P.codigo_original=S.codigo_original 

          where P.codigo_original='$cadena';";


    $result=mysql_query($sql);
    
    $result2=mysql_query($sql2);

    

    $rows=mysql_num_rows($result);

    if($rows==0)
    {
      echo "<h2>Vuelva a Intentarlo</h2>";
      echo "El Codigo <strong>".$cadena."</strong> Ingresado No Existe";
    ?>
    <?php 

    }
    else{

      $row=mysql_fetch_row($result);

      $row2=mysql_fetch_row($result2);


    ?>
    <table>
    <tr><td><FONT COLOR="#F16919"><h4>Codigo :</h4></td>
    <td><?php echo "<h4>";?><?php echo $row[0];?><?php echo "</h4>";?></td></tr>
    <tr><td><FONT COLOR="#F16919"><h4>Nombre :</h4></td>
    <td><?php echo "<h4>";?><?php echo $row[1];?><?php echo "</h4>";?></td></tr>


    <tr><td><FONT COLOR="#F16919"><h4>Cod. AE :</h4></td>
    <td><?php echo "<h4>";?><?php echo $row[6];?><?php echo "</h4>";?></td></tr>

    <tr><td><FONT COLOR="#F16919"><h4>Precio :</h4></td>
    <td><?php echo "<h4>S/.";?><?php echo $row[7];?><?php echo "</h4>";?></td></tr>
  
  

    <tr><td><FONT COLOR="#F16919"><h4>Caracteristica 1:</h4></td>
    <td><?php echo "<h4>";?><?php echo $row[10];?><?php echo "</h4>";?></td></tr>

    <tr><td><FONT COLOR="#F16919"><h4>Caracteristica 2 :</h4></td>
    <td><?php echo "<h4>";?><?php echo $row[11];?><?php echo "</h4>";?></td></tr>

    <tr><td><FONT COLOR="#F16919"><h4>Caracteristica 3 :</h4></td>
    <td><?php echo "<h4>";?><?php echo $row[12];?><?php echo "</h4>";?></td></tr>




    <tr>
    <td><FONT COLOR="#F16919"><h4>Cantidad :</h4></td>
   
    <td><?php echo "<h4>";?>


  <?php echo $row2[3];?>


     <?php echo "</h4>";?></td>
    </tr>

    








    <?php
    $_SESSION["id_articulos"]=$row[0];
    $_SESSION["imagen_1"]=$row[4];
    $_SESSION["imagen_2"]=$row[5];

    ?>

    </table>
    <?php 
    }
  }

}
  ?>


  

<div>
  
      
                
            

          <aside>

      <img src="<?php echo $row[8]; ?>">            










             <!--  <table   class="table table-bordered">
              <caption><h4><strong>Dimensiones</strong></h4></caption>
              <tr>
              <td>T</td> <td><?php echo $row[6];?></td> <td> # de los Dientes</td>
              </tr>
              <tr>
              <td>G</td> <td><?php echo $row[7];?></td> <td>Piñón - Dimensión Externa (mm)</td>
              </tr>
              <tr>
              <td>L</td> <td><?php echo $row[8];?></td> <td>Largo (mm)</td>
              </tr>
              <tr>
              <td>SPL</td> <td><?php echo $row[9];?></td> <td># de Estrías</td>
              </tr>
              <tr>
              <td>ID</td> <td><?php echo $row[10];?></td> <td>Piñón - Dimensión Interna (mm)</td>
              </tr>
              <tr>
              <td>D</td> <td><?php echo $row[11];?></td> <td>Impulsor - Dimensión Externa (mm)</td>
              </tr>


              </table> -->





        </aside>
        
  </div>














     

      <div class="image-row">
        <p> </p>
        <div class="image-set">
          <a class="example-image-link" href="<?php echo $row[3]; ?>" data-lightbox="example-set" data-title=""><img class="example-image" src="<?php echo $row[3]; ?>" style="max-width: 9%;" /></a>
          <a class="example-image-link" href="<?php echo $row[4]; ?>" data-lightbox="example-set" data-title=""><img class="example-image" src="<?php echo $row[4]; ?>" style="max-width: 9%;" /></a>
          <a class="example-image-link" href="<?php echo $row[5]; ?>" data-lightbox="example-set" data-title=""><img class="example-image" src="<?php echo $row[5]; ?>" style="max-width: 9%;" /></a>
        </div>
      </div>
    </div>

  <div align="center">

    <img src="<?php echo $row[9]; ?>" >


  </div>




  </section>



 










  

  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/lightbox.js"></script>

    </body>
</html>