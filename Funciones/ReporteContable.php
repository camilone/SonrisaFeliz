<?php
require('../Conexion/conexion.php');

$fechaIni = $_GET['fechaInicio'];
$fechaFin = $_GET['fechaFin'];

$debe = "";
$haber = "";

$funcionDebe = informeContableDebe($fechaIni,$fechaFin);
$funcionHaber = informeContableHaber($fechaIni,$fechaFin);

while($registroDebe = mysqli_fetch_assoc($funcionDebe))
{
	$cuenta_contable = $registroDebe['cuenta_contable'];
	$monto_debe  	 = $registroDebe['monto'];
	$monto_haber 	 = 0;
	$rut  			 = $registroDebe['rut_cliente'];
	$rut_prestador   = $registroDebe['rut_prestador'];
	$centro_costo  	 = $registroDebe['centro_costo'];
	$fecha_mvto  	 = $registroDebe['fecha_atencion'];
	$fechaNoFormat   = date("dmY");
	
	$debe .= $cuenta_contable.";".$monto_debe.";".$monto_haber.";"."RC: ".$rut." - P: ".$rut_prestador.";0;0;0;;;;;;0;;0;'".$centro_costo.";;0;;".$fechaNoFormat.";".$fechaNoFormat.";".$fecha_mvto.";".$fecha_mvto.";;;;0;0;0;0;0;0;0;0;0;0;;;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0\n";
}

while($registroHaber = mysqli_fetch_assoc($funcionHaber))
{
	$cuenta_contable = $registroHaber['cuenta_contable'];
	$monto_debe  	 = 0;
	$monto_haber 	 = $registroHaber['monto'];
	$rut_prestador	 = $registroHaber['rut_prestador'];
	$rut_format 	 = str_replace('-','',$rut_prestador);
	$rut_format      = str_replace('.','',$rut_format);
	$rut_format      = substr($rut_format, 0, -1);
	$fecha_mvto  	 = $registroHaber['fecha_atencion'];
	$fechaNoFormat   = date("dmY");
	
	$haber .= $cuenta_contable.";".$monto_debe.";".$monto_haber.";"."Pago Prestador: ".$rut_prestador.";0;0;0;;;;;;0;;0;;;0;".$rut_format.";RC;".$fechaNoFormat.";".$fecha_mvto.";".$fecha_mvto.";RC;".$fechaNoFormat.";;0;0;0;0;0;0;0;0;0;0;;;;0;;0;;0;;0;;0;;0;;0;;0;;0;;0\n";
}

/* NOMBRE DEL ARCHIVO */
$fileName = 'Reporte_Contable_'.$fechaIni.'_'.$fechaFin.'.csv';
 
/* DECLARACION DE CSV */
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename="' . $fileName . '"');

echo $debe.$haber;

?>