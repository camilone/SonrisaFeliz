<?php
require('Funciones/FuncionesApp.php');

$rut = $_GET['rut'];

$respuesta = consultaClientes($rut);

header('Content-Type: application/json');
print_r($respuesta);

?>