<?php
require('Funciones/FuncionesApp.php');

$data = json_decode(file_get_contents('php://input'), true);

$rut     	   = $data['rut'];
$email   	   = $data['email'];
$fono    	   = $data['fono'];
$nombre  	   = $data['nombre'];
$apellidoPat   = $data['apellidoPat'];
$apellidoMat   = $data['apellidoMat'];
$direccion     = $data['direccion'];
$sistema_salud = $data['sistema_salud'];

$respuesta = creacionClientes($rut,$email,$fono,$nombre,$apellidoPat,$apellidoMat,$direccion,$sistema_salud);

header('Content-Type: application/json');
print_r($respuesta);

?>