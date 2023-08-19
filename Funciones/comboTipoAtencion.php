<?php
require('../Conexion/conexion.php');

$listaPrest = obtenerTA();

if ($listaPrest != '')
{
	$tipo_atencion = "";
	while ($rowPrest = mysqli_fetch_assoc($listaPrest))
	{
		if($rowPrest['id'] != "")
		{
			$opcion = "<option value=''>Selecciona una opción</option>";
			$tipo_atencion .="<option value=".$rowPrest['id'].">".$rowPrest['nombre']."</option>"; //Combo que contiene info del titular cuando no tiene cargas.
		}
	}
}

$tipo_atencion = $opcion.$tipo_atencion;
$respuesta = array("tipo_atencion"=>$tipo_atencion);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($respuesta);
exit();