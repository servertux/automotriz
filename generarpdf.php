<?php
/*
  <<Copyright 2012 Jose Joaquin Perez Fuster>>
  peperfus@hotmail.com
  This software is released under the terms of the GNU Affero General Public License.
  Read agpl.txt file for more details.
*/

$BORDE = 0;
include('NUMEROENLETRAS.php');
include ('conectar.php');
include ('FUNCIONES/funciones.php');
include ('fpdf17/fpdf.php');

$cod = $_REQUEST['cod'];
$codact = $_REQUEST['codact'];

$sql = "select fecha from facturas where cod_fra=" . $cod . " and cod_act = '".$codact."';";
$query = mysql_query($sql, $link) or die(mysql_error());
$fecha = mysql_fetch_array($query, MYSQL_ASSOC);

$fra = new FPDF();  //ORIENTACION HORIZONTAL
//$fra = new FPDF('L','mm','A4');
$fra->AddPage();
 
$fra->SetFont('Arial', '', 10);
//$fra->Cell(188, 10, 'Fecha: ' . date("j\/n\/Y", strtotime($fecha['fecha'])) . ' Cod: ' . $codact.$cod, $BORDE, 1, 'R');
$fra->Cell(188, 10, 'Fecha: ' . date("j\/n\/Y", strtotime($fecha['fecha'])) . ' Cod: ' . $codact.$cod, $BORDE, 1, 'R');
$fra->SetFont('Times', 'BU', 24);
//$fra->Cell(188, 10, 'FACTURA', $BORDE, 1, 'C');
$fra->Cell(188, 10, 'FACTURA', $BORDE, 1, 'C');
$fra->SetFont('Times', '', 12);
$fra->Ln();
// Datos de contacto
$texto = "AEELVOLANTE.COM\nAUTOMOTRIZ ELECTRONICO EL VOLANTE S.R.L.\nRUC:20453911676\nParque Industrial Cayro Mz. C Lt. 4 - Paucarpata\nLINEA 2 DIRECCION\n";
$texto .= "Tel. 461645 / www.aeelvolante.com";

$fra->MultiCell(90, 5, $texto, $BORDE, 'L'); // Texto EMPRESA

$sql = "select * from clientes, facturas where cod_fra=" . $cod . " and cod_act = '".$codact."' and clientes.id_clientes like facturas.id_clientes;";
$query = mysql_query($sql, $link) or die (mysql_error());
$registro = mysql_fetch_array($query, MYSQL_ASSOC);


$texto ="Cliente\n" .  utf8_decode($registro['rz_social']) . "\n" . $registro['ruc'] . "\n" . $registro['direccion'] . "\n";
$texto .= $registro['telefono'];
$fra->SetXY(100, 40);
$fra->MultiCell(98, 5, $texto, $BORDE, 'R'); // Texto Cliente

$fra->SetXY(10, 90);
$fra->SetFontSize(12);
$texto = "ARTICULOS FACTURADOS:";
$fra->MultiCell(188, 20, $texto, $BORDE, 'L');
$fra->SetFontSize(11);
  $sql = "select * from articulos, det_fra ";
  $sql .= "where articulos.codigo_original = det_fra.codigo_original and cod_fra = " . $cod . " and cod_act = '".$codact."' ";
  $servicios = mysql_query($sql, $link) or die(mysql_error());
  while ($servicio = mysql_fetch_array($servicios, MYSQL_ASSOC)) {
    $texto = $servicio['codigo_interno'] . " - " . $servicio['nombre'] . " " . $servicio['unidades'] . " unds, " . $servicio['precio_unitario'] . "" ;
    
    //$fra->Cell(20, 5, '', $BORDE, 0);
    $fra->Cell(10, 5, '', $BORDE, 0);
    $fra->Cell(118, 5, $texto, $BORDE, 0);
    //$fra->Cell(20, 5, number_format($servicio['unidades']*$servicio['precio_unitario'], 2, ',', '.') .'' , $BORDE, 1, 'R');
    $fra->Cell(30, 5, number_format($servicio['unidades']*$servicio['precio_unitario'], 2, ',', '.') .'' , $BORDE, 1, 'R');
  }

  $fra->SetFontSize(12);

$fra->MultiCell(188, 20, '', $BORDE);
$fra->SetFontSize(14);
$total=total($cod, $codact);
/*
 factura sin iva
$iva=total($cod) * 0.21;
$totalmasiva=$total + $iva;*/
//$fra->MultiCell(188, 10, 'SUBTOTAL: '.number_format($total, 2, ',', '.') . ' €', $BORDE,'R');
//$fra->MultiCell(188, 10, 'IVA: '.number_format($iva, 2, ',', '.') . ' €', $BORDE,'R');
//$fra->MultiCell(188, 10, 'TOTAL: '.number_format($totalmasiva, 2, ',', '.') . ' €', $BORDE,'R');

$fra->MultiCell(188, 9, 'TOTAL: S/.'.number_format($total, 2, ',', '.') . ' ', $BORDE,'R');


    //$fra->SetY(260);
    //Arial italic 8
    $fra->SetFont('Arial','I',12);

//    $fra->Cell(0,10,'IVA: 16%. Hora de Trabajo: '.$ph.' €',$BORDE,0,'R');

//$fra->SetY(250);
//$fra->Cell(0, 0, 'Operación exenta del I.V.A. en virtud del artículo 20.01.10 de la Ley', $BORDE, 0);

 
  $fra->setY(160);
  $fra->Cell(0, 0, $V->ValorEnLetras($total,""), $BORDE, 0);

 

$fra->Output();

 
?>


