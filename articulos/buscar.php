

<?php 
session_start();
include "../conexion.php";

$cadena=$_POST["cadena"];
	if($cadena==null)
	{
		echo "<h1>ERROR!!</h1>";
		echo "<h2>Debe escribir un codigo en la Casilla<br/></h2>";
?>
<?php 

	}
	else
	{
		$sql="select*from articulos where id_articulos='$cadena'";
		$result=mysql_query($sql);
		$rows=mysql_num_rows($result);

		if($rows==0)
		{
			echo "<h2>Vuelva a Intentarlo</h2>";
			echo "El Codigo".$cadena."Ingresado No Existe";
		?>
		<?php 

		}
		else{

			$row=mysql_fetch_row($result);
		?>
		<table >
		<tr><td>Codigo:</td>
		<td><?php echo $row[0];?></tr></td>
		<tr><td>Imagen:</td>
		<td><img src="<?php echo $row[5]; ?>" style="max-width: 50%;"></td></tr>
		

		<tr><td>Imagen 2:</td>
		<td><img src="<?php echo $row[6]; ?>" style="max-width: 50%;"></td></tr>



		<tr><td>Descripcion:</td>
		<td><?php echo $row[2];?></td></tr>


		<?php
		$_SESSION["id_articulos"]=$row[0];
		$_SESSION["imagen_1"]=$row[5];
		$_SESSION["imagen_2"]=$row[6];

		?>

		</table>
		<?php 
		}
	}
	?>
