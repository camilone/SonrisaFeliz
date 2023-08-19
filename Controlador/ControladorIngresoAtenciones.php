<?php
require("../Conexion/conexion.php");

$idCliente	   = $_POST['idCliente'];
$idPres   	   = $_POST['idPres'];
$tipo_atencion = $_POST['tipo_atencion'];
$monto  	   = $_POST['monto'];
$fechahora     = $_POST['fechahora'];
$presupuesto   = $_POST['presupuesto'];
$observacion   = $_POST['observacion'];

ingresoAtencion($idCliente,$idPres,$tipo_atencion,$monto,$fechahora,$presupuesto,$observacion);

?>

<script>
	window.location='../Layout/ingresoAtencion.php?ing=1';
</script>