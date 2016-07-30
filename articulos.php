<?php include("includes/header.php")?>
<SCRIPT LANGUAGE="JavaScript">
function mi_alerta () {
alert ("El Articulo ha sido ingresado correctamente!");
}
</SCRIPT>
<section  class="flexbox">


<?php include("articulos/menuArticulos.php")?>


</section>


<div class="row">
  <div class="col-md-9">
    
    <div class="row">
      <div class="col-md-5">
       
      </div>
     

      <div class="col-md-7">
        


 <form role="form" name="frmArticulos" method="post" action="recibir.php" id="formulario" enctype="multipart/form-data" autocomplete="off">


  <div class="form-group">
      <h4 align="center">REGISTRO DE ARTICULOS</h4>
        
        
        <table>

          <tr>
            <td><strong>Codigo</strong></td>
            <td>
              <input type="text" name="cod" placeholder="Codigo Original" size="40" id="codigo"  class="form-control input-sm">
            </td>

        
          </tr>
          <tr>
            <td>Codigo Elvolante</td>
            <td>
              <input type="text"   name="codigointerno"  placeholder="Codigo Interno" class="form-control input-sm">
            </td>
          </tr>
          
          <tr>

            <td>Nombre Articulo</td>
            <td>
              <input type="text"  name="nombrearticulo"  placeholder="Nombre del Articulo" class="form-control input-sm">
            </td>
          </tr>

          <tr>

            <td>Caracteristicas 1</td>
            <td>
              <input type="text"  name="caracteristicas"  placeholder="Caracteristicas 1" class="form-control input-sm">
            </td>
          </tr>

          <tr>

            <td>Caracteristicas 2</td>
            <td>
              <input type="text"  name="medidas"  placeholder="Caracteristicas 2" class="form-control input-sm">
            </td>
          </tr>

          <tr>

            <td>Caracteristicas 3</td>
            <td>
              <input type="text"  name="caracteristicas2"  placeholder="Caracteristicas 3" class="form-control input-sm">
            </td>
          </tr>




          <tr>

            <td>Precio Unitario</td>
            <td>
              <input type="text" name="preciounitario" value="0.00" class="form-control input-sm">
            </td>
          </tr>

          <tr>

            <td>Precio Costo</td>
            <td>
              <input type="text"  name="preciocosto"  value="0.00" class="form-control input-sm">
            </td>
          </tr>

          <tr>

            <td>Stock</td>
            <td>
              <input type="text" name="stock" placeholder="0" value="0" class="form-control input-sm">
            </td>
          </tr>


      


          <tr>


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

          <tr>
    <td>
    Fecha
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







            <td colspan="2" align="center">

                  <input type="submit" value="Registrar Articulo" class="btn btn-primary btn-lg btn-block" onClick="mi_alerta()">

                  <input type="reset" value="Limpiar Datos" class="btn btn-default btn-lg btn-block">
            </td>

        </table>





        </div>

        

</form>


      </div>
    </div>
  </div>
</div>







  





  </body>
</html>
