<?php
require('../Conexion/conexion.php');

function getPuntosRut($rut)
{
	$rutTmp = 0;
	$dv = 0;
	$c = strlen($rut);
	if($c == 9)
	{
		$dv = substr($rut, -1, 1);
		$rutTmp = substr($rut, 0, 8);
	}
	if($c == 10)
	{
		$dv = substr($rut, -1, 1);
		$rutTmp = substr($rut, 0, 9);
	}	
	return number_format( $rutTmp, 0, "", ".") . '-' . $dv;
}

$rutBD = 0;
$rut = getPuntosRut($_GET['rut']);

$funcion = validaRut($rut);

while($registro = mysqli_fetch_assoc($funcion))
{
	$rutBD = $registro['rut'];
}

$respuesta = array("Rut"=>$rutBD);
echo json_encode($respuesta);