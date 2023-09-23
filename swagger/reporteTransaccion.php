<?php
require('Funciones/FuncionesApp.php');

$fechaIni = $_GET['fechaInicio'];
$fechaFin = $_GET['fechaFin'];

$respuesta = reporteTransaccion($fechaIni,$fechaFin);

header('Content-Type: application/json');
echo $respuesta;

?>