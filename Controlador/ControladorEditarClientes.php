<?php
require("../Conexion/conexion.php");

$id     	   = $_POST['idCliente'];
$rut     	   = $_POST['rut'];
$email   	   = $_POST['email'];
$fono    	   = $_POST['fono'];
$nombre  	   = $_POST['nombre_cliente'];
$apellidoPat   = $_POST['apellidoPat'];
$apellidoMat   = $_POST['apellidoMat'];
$direccion     = $_POST['direccion'];
$sistema_salud = $_POST['sistema_salud'];

editarCliente($id,$rut,$email,$fono,$nombre,$apellidoPat,$apellidoMat,$direccion,$sistema_salud);

?>

<script>
	window.location='../Layout/editarCliente.php?ing=1';
</script>