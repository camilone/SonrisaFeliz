<?php
require('Funciones/FuncionesApp.php');

$data = json_decode(file_get_contents('php://input'), true);

$idCliente	   = $data['idCliente'];
$idPres   	   = $data['idPres'];
$tipo_atencion = $data['tipo_atencion'];
$monto  	   = $data['monto'];
$fechahora     = $data['fechahora'];
$presupuesto   = $data['presupuesto'];
$observacion   = $data['observacion'];

$respuesta = creacionAtenciones($idCliente,$idPres,$tipo_atencion,$monto,$fechahora,$presupuesto,$observacion);

header('Content-Type: application/json');
print_r($respuesta);

?>