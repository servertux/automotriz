<?php include("includes/header.php")?>

<section  class="flexbox">


<?php include("clientes/menuClientes.php")?>


</section>


<h3 align="center">Registro de Clientes</h3>
<div class="flexbox">
<form role="form" name="frmCliente" method="post" action="clientes/grabarDatosClientes.php" id="formulario" autocomplete="off">
  <div class="form-group">

        <table>

          
          <tr>
            <td>Nombres</td>
            <td>
              <input type="text"   name="nombre"  size="40" placeholder="Ej. Nombres" class="form-control">
            </td>
          </tr>
          <tr>

            <td>Apellidos</td>
            <td>
              <input type="text"  name="apellido"  placeholder="Ej. Apellidos" class="form-control">
            </td>
          </tr>

          <tr>

            <td>Ruc</td>
            <td>
              <input type="text" name="ruc" placeholder="Ruc" class="form-control">
            </td>
          </tr>

          <tr>

            <td>Direccion</td>
            <td>
              <input type="text"  name="direccion"  placeholder="Direccion" class="form-control">
            </td>
          </tr>

          <tr>

            <td>Razon Social</td>
            <td>
              <input type="text" name="rzsocial" placeholder="Razon Social" class="form-control">
            </td>
          </tr>

          <tr>

            <td>Telefono</td>

            <td>
              <input type="text" name="telefono" placeholder="Telefono" class="form-control">
            </td>
          </tr>

            <td colspan="2" align="center">

                  <input type="submit" value="Registrar Cliente" class="btn btn-primary btn-lg btn-block">

                  <input type="reset" value="Limpiar Datos" class="btn btn-default btn-lg btn-block">
            </td>

        </table>

        
        </div>

</form>

</div>





  </body>
</html>
