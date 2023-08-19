<?php
require('../Conexion/conexion.php');

$fechaIni = $_GET['fechaInicio'];
$fechaFin = $_GET['fechaFin'];

$funcion = informeTransaccion($fechaIni,$fechaFin);

echo "Rut Cliente;Nombre Cliente;Rut Prestador;Nombre Prestador;Tipo Atencion;Monto;Fecha de Atencion;Observaciones\n";

while($registro = mysqli_fetch_assoc($funcion))
{
	$html1  = $registro['rut_cliente'];
	$html2  = $registro['nombre_cliente'];
	$html3  = $registro['rut_prestador'];
	$html4  = $registro['nombre_prestador'];
	$html5  = $registro['atencion'];
	$html6  = $registro['monto'];
	$html7  = $registro['fecha_atencion'];
	$html8  = $registro['observaciones'];	
  
/* NOMBRE DEL ARCHIVO */
$fileName = 'Reporte_Transacciones_'.$fechaIni.'_'.$fechaFin.'.csv';
 
/* DECLARACION DE CSV */
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="' . $fileName . '"');

/* IMPRIMO LOS DATOS EN EL ORDEN CORRESPONDIENTE */
echo "$html1;$html2;$html3;$html4;$html5;$html6;$html7;$html8\n";

}