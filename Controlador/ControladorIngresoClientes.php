<?php
require("../Conexion/conexion.php");

$rut     	   = $_POST['rut'];
$email   	   = $_POST['email'];
$fono    	   = $_POST['fono'];
$nombre  	   = $_POST['nombre_cliente'];
$apellidoPat   = $_POST['apellidoPat'];
$apellidoMat   = $_POST['apellidoMat'];
$direccion     = $_POST['direccion'];
$sistema_salud = $_POST['sistema_salud'];

ingresoCliente($rut,$email,$fono,$nombre,$apellidoPat,$apellidoMat,$direccion,$sistema_salud);

?>

<script>
	window.location='../Layout/crearCliente.php?ing=1';
</script>